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

        if ($arrayOfUserObjects == null) {
            $errorMessage = "User not found";
            require APP . "view/_templates/header.php";
            require APP . "view/problem/error_page.php";
            require APP . "view/_templates/footer.php";
            
        } else {
            // The folowing three lines send back the header, body, and footer
            // of the user_body.php webpage
            require APP . "view/_templates/header.php";
            require APP . "view/users/user_body.php";   // a file that for now
                                                        // just displays the
                                                        // user's email address.
            require APP . "view/_templates/footer.php";
        }
    }

// end function getUserProfilePage

    /**
     * Deletes a user from the database.
     * 
     * @param int $userID
     * 
     * @todo Fix this function. It doesn't work (user doesn't get deleted).
     */
    public function deleteUser($userID) {

        $userRepo = RepositoryFactory::createRepository("user");
        $arrayOfUserObjects = $userRepo->find($userID, "userid"); // an array of 
                                                                  // User objects
        
        // If the array of User objects is empty, that means the given userID was
        // not found in the databese.
        if ($arrayOfUserObjects == null) {
            $errorMessage = "This userID ({$userID}) was not found in the database";
            require APP . "view/_templates/header.php";
            // TODO add more detail to the error page            
            require APP . "view/problem/error_page.php";
            require APP . "view/_templates/footer.php";
        }

        // If here, then the userID was found in the database.
        else {
            // remove the user from the database
            $userRepo->remove($arrayOfUserObjects[0]);

            // check whether or not the removal was successful by once again
            // searchign the users repository
            $newArrayOfUserObjects = $userRepo->find($userID, "userid");

            // If the userID was not found, then this confirms that the user was
            // deleted.
            if ($newArrayOfUserObjects == null) {
                require APP . "view/_templates/header.php";
                require APP . "view/users/user_delete_success.php"; // this page
                                                                    // confirms the 
                                                                    // deletion of 
                                                                    // the user
                require APP . "view/_templates/footer.php";
            }

            // Otherwise, the search resulted in a match, but the user has not been
            // deleted.
            else {
                $errorMessage = "The user with the userID ({$userID}) was found but not deleted!";
                require APP . "view/_templates/header.php";
                require APP . "view/problem/error_page.php";
                require APP . "view/_templates/footer.php";
            } // end inner else
        } // end outer else
    }// end function deleteUser
    
    
    /**
     * Edits a user's profile. Uses external information in the form of JSON encoded
     * data that contains information on which part of the profile to change.
     * 
     * @param int $userID
     */
    public function editUser($userID){
        
    }
} // end class User
