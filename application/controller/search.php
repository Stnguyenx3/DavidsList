<?php

/*
 * What these test methods show is that:
 *   1) for functions with a parameter, you must append the parameter into the url;
 *      however, you can choose to omit appending the parameter to the url
 *      and choose to send JSON to the controller;
 *   
 *   2) if you choose to send JSON, you must use $_POST or $_GET, depending on your
 *      HTTP request, to access the elements in the JSON;
 *
 *   3) You can send data back using echo, or send JSON back using echo json_encode
 */
class Search extends Controller {

    public function testGet($param) {
        echo $param;
    }

    public function testPost() {
        // echo htmlspecialchars($_POST); #This is for trying to read a string from the POST variable
        header('Content-Type: application/json');
        echo json_encode($_POST);
    }

    public function sendJson() {
        $data = array(
            'userID' => 'a7664093-502e-4d2b-bf30-25a2b26d6021',
            'itemKind' => 0,
            'value' => 1,
            'description' => 'Boa saudaÁ„o.',
            'itemID' => '03e76d0a-8bab-11e0-8250-000c29b481aa'
        );

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function testImage() {
        $test = htmlspecialchars($_POST["imageData"]);
        echo base64_decode($test);
    }

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
        else $addresses = $addressRepo->find($searchInput, "city");

        $returnArray = array();

        // foreach($addressRepo as $address) {
        //     $compareCity = $address->getCity();
        //     echo '<script>';
        //     echo 'console.log('. json_encode( $address ) .')';
        //     echo '</script>';
        //     $percentage = 80;
        //     // similar_text($compareCity , $city, &$percentage);
        //     if($percentage>$thresh){
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

    public function testInsert() {
        $testUser = new User();
        $testUser->setEmail("thomastse@gmail.com");
        $testUser->setStudentId("912332325");
        $testUser->setPassword("afdafafsa");
        $testUser->setPhone("5102835566");
        $testUser->setBiography("SFDJFJIAIFAIAIFA");
        $testUser->setVerified(0);

        $usersRepo = RepositoryFactory::createRepository("user");
        $usersRepo->save($testUser);

    }

    public function testDelete() {
        $usersRepo = RepositoryFactory::createRepository("user");
        $testUser = new User();
        $testUser->setId("1");
        $testUser->setVerified(0);
        $usersRepo->remove($testUser);
    }

    public function testUpdate() {
        $usersRepo = RepositoryFactory::createRepository("user");
        $testUser = new User();
        $testUser->setId("4");
        $testUser->setEmail("thomastse@gmail.com");
        $testUser->setUsername("hoothott");
        $testUser->setStudentId("912332325");
        $testUser->setPassword("afdafafsa");
        $testUser->setPhone("5102835566");
        $testUser->setBiography("SFDJFJIAIFAIAIFA");
        $testUser->setVerified(0);

        $usersRepo->update($testUser);
    }
}
