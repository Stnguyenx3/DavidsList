<?php

/*
 * What these test methods show is that:
 * for functions with a parameter, you must append the parameter into the url
 * however, you can choose to omit appending the parameter to the url
 * and choose to send JSON to the controller
 * if you choose to send JSON, you must use $_POST or $_GET, depending on your
 * HTTP request, to access the elements in the JSON
 *
 * You can send data back using echo. Or send JSON back using echo json_encode
 */
class Search extends Controller {

	public function testGet($param){
        echo $param;
    }

    public function testPost() {
    	// echo htmlspecialchars($_POST); #This is for trying to read a string from the POST variable
    	header('Content-Type: application/json');
    	echo json_encode($_POST);
    }

    public function sendJson() {
    	$data = array(
		    'userID'      => 'a7664093-502e-4d2b-bf30-25a2b26d6021',
		    'itemKind'    => 0,
		    'value'       => 1,
		    'description' => 'Boa saudaÁ„o.',
		    'itemID'      => '03e76d0a-8bab-11e0-8250-000c29b481aa'
		);

		header('Content-Type: application/json');
		echo json_encode($data);
    }

    public function testImage() {
    	$test = htmlspecialchars($_POST["imageData"]);
    	echo base64_decode($test);

    }

    public function searchApartments() {
        $city = $_POST["city"];
        $addressRepo = RepositoryFactory::createRepository("address");
        $addressRepo->find($city);
    }
}