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
     * Loads a user's profile page.
     * 
     * @param int $userID The integer ID of the user
     */
    public function getUserProfilePage($userID) {
        $userRepo = RepositoryFactory::createRepository("user");
        $arrayOfUserObjects = $userRepo->find($userID, "userid"); // an array of 
                                                                  // User objects
        
        if ($arrayOfUserObjects == null){
            // TODO add more detail to the error page
            require APP . "view/problem/error_page.php";
        }
        
        else{
            // The folowing three lines send back the header, body, and footer
            // of the user_body.php webpage
            require APP . "view/_templates/header.php";
            require APP . "view/users/user_body.php"; // a file that for now
                                                      // just displays the
                                                      // user's email address.
            require APP . "view/_templates/footer.php";            
        } 
    } // end function getUserProfilePage
    
    
    /**
     * Deletes a user from the database.
     * 
     * @param int $userID
     * 
     * @todo test this function.
     */
    public function deleteUser($userID) {
        $userRepo = RepositoryFactory::createRepository("user");
        $arrayOfUserObjects = $userRepo->find($userID, "userid"); // an array of 
                                                                  // User objects
        if ($arrayOfUserObjects == null){
            // TODO add more detail to the error page            
            require APP . "view/problem/error_page.php";
        }
        
        else{
            $userRepo->remove($arrayOfUserObjects[0]);
            
            require APP . "view/_templates/header.php";
            require APP . "view/users/user_delete_success.php"; // this page
                                                                // confirms the 
                                                                // deletion of 
                                                                // the user
            require APP . "view/_templates/footer.php";               
        }
    }
    
}
