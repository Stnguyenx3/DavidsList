<?php

/*
 * Class Users
 * 
 * Controller for the User class (model/user.php)
 * 
 * This class provides the following functionality:
 *   1) Gets a User profile page;
 *   2) Handles login;
 *   3) Handles registration.
 */

class Users extends Controller {

    /**
     * Returns a user's profile page.
     * 
     * @param int $userID The integer ID of the user
     * 
     * @return The user's HTML profile page
     */
    public function getUserProfilePage($userID) {
        $userRepo = RepositoryFactory::createRepository("user");
        $arrayOfUserObjects = $userRepo->find($userID, "userid"); // an array of User objects
        // Now how to return an HTML page from a User object?
        // Do somethign along the lines of:
        //What these three lines will do is, it will send back the header, body, and footer of a webpage. # which webpage?
        require APP . "view/_templates/header.php";
        require APP . "view/users/user_body.php"; // create this
        require APP . "view/_templates/footer.php";
    }

}
