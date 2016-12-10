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

        $searchInput = strip_tags(strtolower($_POST["search"])); // change this
        $addressRepo = RepositoryFactory::createRepository("address");
        $listingImageRepo = RepositoryFactory::createRepository("listing_image");

        $listingRepo = RepositoryFactory::createRepository("listing");
        $listingDetailRepo = RepositoryFactory::createRepository("listing_detail");
        

        // $addresses = $addressRepo->find($city, "city"); //this is the search line

        if(is_numeric($searchInput)) $addresses = $addressRepo->find($searchInput, "zipcode");
        else{
            $thresh = 80; // threshold for percentage of similar_text
            $addresses = array(); //prepare array

            // If searchInput ends in street or avenue, reduce
            if(strcmp(substr($searchInput, -6),"street")==0 || strcmp(substr($searchInput, -6),"st")==0 || strcmp(substr($searchInput, -6),"avenue")==0 || strcmp(substr($searchInput, -6),"ave")==0){
                $searchInput = substr($searchInput, 0, -6);
            } elseif (strcmp(substr($searchInput, -2),"st")==0 || strcmp(substr($searchInput, -3),"ave")==0) {
                    $searchInput = substr($searchInput, 0, -3);
            }


            $addressArray = $addressRepo->fetch();// find other way to fetch all

            foreach($addressArray as $address){
    
                // Compare search query to city
                $compareCity = strtolower($address->getCity());
                similar_text($compareCity , $searchInput, $percentageCity);
                if($percentageCity > $thresh){
                    $addresses[] = $address;
                    continue;
                }

                // Compare search query to street name
                $compareStreetName = strtolower($address->getStreetName());

                // Check for street and avenue in compareStreetName
                if(strcmp(substr($compareStreetName, -6),"street")==0 || strcmp(substr($compareStreetName, -6),"avenue")==0){
                    $compareStreetName = substr($compareStreetName, 0, -6);
                } elseif (strcmp(substr($compareStreetName, -2),"st")==0 || strcmp(substr($compareStreetName, -3),"ave")==0) {
                    $compareStreetName = substr($compareStreetName, 0, -3);
                }

                // check for house number and remove
                $compareStreetNameNoNumbers = trim(str_replace(range(0,9),'',$compareStreetName));

                similar_text($compareStreetName , $searchInput, $percentageStreetName);
                similar_text($compareStreetNameNoNumbers , $searchInput, $percentageStreetNameNoNumbers);
                if($percentageStreetName > $thresh || $percentageStreetNameNoNumbers > $thresh){
                    $addresses[] = $address;
                    continue;
                }

                // Compare search query to state
                $compareState = strtolower($address->getState());
                similar_text($compareState , $searchInput, $percentageState);
                if($percentageState > $thresh){
                    $addresses[] = $address;
                    continue;
                }

            }
        }


        $returnArray = array();

        // fetch all fields and make ready for return
        foreach ($addresses as $address) {
            $listingID = $address->getListingId();

            $tempHash = $address->jsonSerialize();

            // Add listing info to array
            $listings = $listingRepo->find($listingID, "listingID");
            foreach ($listings as $listing) {
                $tempHash = array_merge($listing->jsonSerialize(),$tempHash);
            }

            // Add listing details to array
            $listingDetails = $listingDetailRepo->find($listingID, "listingID");
            foreach ($listingDetails as $listingDetail) {
                $tempHash = array_merge($listingDetail->jsonSerialize(),$tempHash);
            }

            // Add image thumbnail to array
            $imageThumbnail = $listingImageRepo->find($listingID, "listingID");
            if(!empty($imageThumbnail)) {
                $tempHash["imageThumbnail"] =
                                        base64_encode($imageThumbnail[0]->getImageThumbnail());
            }

            $returnArray[] = $tempHash;
        }
        echo json_encode($returnArray);
    }



}