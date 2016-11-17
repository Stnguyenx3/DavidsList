<?php

/*
 * Controller specifically for searching by address, possibly either returning
 * HTML for the page to render the search or returning JSON for the front-end to
 * do it manually
 */
class Search extends Controller {

    /*
     * Creates repositories for address and images
     * Does a database call for cities
     * Loops through the results and finds the first image thumbnails of the cities
     * returns as a json encoded array
     */
    public function searchApartments() {
        $thresh = 70;

        $searchInput = $_POST["city"]; // change this
        $addressRepo = RepositoryFactory::createRepository("address");
        $listingImageRepo = RepositoryFactory::createRepository("listing_image");
        // $addresses = $addressRepo->find($city, "city"); //this is the search line

        if(is_numeric($searchInput)) $addresses = $addressRepo->find($searchInput, "zipcode");
        else{
            $thresh = 80; // threshold for percentage of similar_text
            $addresses = array(); //prepare array

            // If searchInput ends in street or avenue, reduce to str or ave
            if(strcmp(substr($searchInput, -6),"street")==0 || strcmp(substr($searchInput, -6),"avenue")==0){
                $searchInput = substr($searchInput, 0, -3);
                echo $searchInput;
            }


            $addressDummy = $addressRepo->find("0", "approximateAddress");// find other way to fetch all

            foreach($addressDummy as $address){
    
                // Compare search query to city
                $compareCity = $address->getCity();
                similar_text($compareCity , $searchInput, $percentageCity);
                if($percentageCity > $thresh){
                    $addresses[] = $address;
                    continue;
                }

                // Compare search query to street name
                $compareStreetName = $address->getStreetName();

                // Check for street and avenue in compareStreetName
                if(strcmp(substr($compareStreetName, -6),"street")==0 || strcmp(substr($compareStreetName, -6),"avenue")==0){
                    $compareStreetName = substr($compareStreetName, 0, -3);
                }

                similar_text($compareStreetName , $searchInput, $percentageStreetName);
                if($percentageStreetName > $thresh){
                    $addresses[] = $address;
                    continue;
                }

                // Compare search query to state
                $compareState = $address->getState();
                similar_text($compareState , $searchInput, $percentageState);
                if($percentageState > $thresh){
                    $addresses[] = $address;
                    continue;
                }

            }
        }


        $returnArray = array();

        foreach ($addresses as $address) {

                $tempHash = $address->jsonSerialize();
                $imageThumbnail = $listingImageRepo->find($address->getListingId(), "listingID");
                if(!empty($imageThumbnail)) {
                    $tempHash["imageThumbnail"] =
                                            base64_encode($imageThumbnail[0]->getImageThumbnail());
                }

                $returnArray[] = $tempHash;
            }
        // }
        echo json_encode($returnArray);
    }

    // public function compareSearchInput($address, $searchInput){
    //     $thresh = 80;

    //     // Compare search query to city
    //     $compareCity = $address->getCity();
    //     similar_text($compareCity , $searchInput, $percentageCity);
    //     if($percentageCity > $thresh) return True;

    //     // Compare search query to street name
    //     $compareStreetName = $address->getStreetName();
    //     similar_text($compareStreetName , $searchInput, $percentageStreeName);
    //     if($percentageStreetName > $thresh) return True;

    //     // Compare search query to state
    //     $compareState = $address->getState();
    //     similar_text($compareState , $searchInput, $percentageState);
    //     if($percentageState > $thresh) return True;

    //     return False;

    // }

}