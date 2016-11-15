<?php

/*
 * Class Users
 * 
 * Controller for the User class (model/user.php)
 * 
 * This class provides the following functionality:
 *   1) A function to display a user's profile page;
 *   2) A function to delete a user;
 *   3) A function to modify a user's profile;
 *   4) A function to create a new user;
 *   5) A function to log a user in.
 * 
 * The first two functions, getUser() and deleteUser(), have been tested and are
 * working; the other three functions need to be tested.
 */

class Users extends Controller {

	/**
     * Loads a user's profile page.
     * 
     * @param int $userID The integer ID of the user
     */
    public function getUser($userID) {
        $userRepo = RepositoryFactory::createRepository("user");
        $arrayOfUserObjects = $userRepo->find($userID, "userid"); // an array of 
																  // User objects

        if ($arrayOfUserObjects == null) {
            $errorMessage = "User not found";
            require APP . "view/_templates/header.php";
            require APP . "view/problem/error_page.php";
            require APP . "view/_templates/footer.php"; 
        }
		else {
            // The folowing three lines send back the header, body, and footer
            // of the user_body.php webpage
            require APP . "view/_templates/header.php";
            require APP . "view/users/user_body.php";   // a file that for now
                                                        // just displays the
                                                        // user's email address.
            require APP . "view/_templates/footer.php";
        }
    } // end function getUser

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
     * Edits a user's profile. 
	 * 
	 * External information is JSON encoded data that contains all fields of a
	 * User object. This function creates a new User object from that JSON data
	 * and replaces the target user's current User object with the once created
	 * here.
     * 
     * @param int $userID
	 * 
	 * @todo Test this function.
     */
    public function editUser($userID){
		$userRepo = RepositoryFactory::createRepository("user");
        $arrayOfUserObjects = $userRepo->find($userID, "userid");
		
        if ($arrayOfUserObjects == null) {
            $errorMessage = "User not found";
            require APP . "view/_templates/header.php";
            require APP . "view/problem/error_page.php";
            require APP . "view/_templates/footer.php";
		}
		
		else{
			// Create a new User object from the external JSON data; then replace
			// the target userID's current User Object with the new one
			
			$user = new User();

			$user->setId($userID);
			$user->setEmail($_POST["email"]);
			$user->setUsername($_POST["username"]);
			$user->setStudentId($_POST["studentID"]);
			$user->setPhone($_POST["phone"]);
			$user->setBiography($_POST["bio"]);
			$user->setPassword($_POST["password"]);
			$user->setVerified($_POST["verified"]);
			
			$userRepo->update($user);
		}// end else		
    } // end function editUser
	
	
	/**
	 * Creates a new user.
	 * 
	 * External information is JSON encoded data which contains new user information.
	 * The new user information includes all of the user variables except for the
	 * userid
	 * 
	 * Loads the newly created user's HTML page.
	 * 
	 * @todo Add validation to the function (check to make sure user was
	 * successfully added); test the function.
	 */
	public function newUser(){
		$userRepo = RepositoryFactory::createRepository("user");
		
		// create new user
		$user = new User();
		
		// add all of the externally supplied data to the new user
		$user->setEmail($_POST["email"]);
		$user->setUsername($_POST["username"]);
		$user->setStudentId($_POST["studentID"]);
		$user->setPhone($_POST["phone"]);
		$user->setBiography($_POST["bio"]);
		$user->setPassword($_POST["password"]);
		$user->setVerified($_POST["verified"]);
		
		// save the new user to the database
		$userRepo->save($user);
				
		//TODO test to make sure that the user was successfully added to the database
		
		// Call find based on the username of the user to get the userid:
		//   get the user object
		$arrayOfResults = $userRepo->find($_POST["username"], "username");
		$user = $arrayOfResults[0];
		
		//   get the userID from the user object
		$userID = $user->getId();
		
		// display the user's page
		getUser($userID);
	} // end function newUser
	
	
	/**
	 * Logs a user in.
	 * 
	 * External information is JSON encoded data which contains login data
	 * 
	 * @todo 1) Finish this method--I have no idea what's supposed to happen after
	 * we receive and validate the username and password; 2) when a use enters an 
	 * invalid username/passowrd combination, should we give a generic error saying
	 * "Invalid username or password"? Or should we specify which was incorrect?
	 */
	public function login(){
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$userRepo = RepositoryFactory::createRepository("user");
		
		// Validate the login credentials
		
		$isValidLogin = false;
		$arrayOfResults = $userRepo->find($username, "username");
		
		// if no such username exists in the database, display error
		if ($arrayOfResults == null){
            $errorMessage = "Invalid username or password."; //TODO - do we want to specify which of the two is invalid?
            require APP . "view/_templates/header.php";
            require APP . "view/problem/error_page.php";
            require APP . "view/_templates/footer.php"; 			
		}
		else{
			$user = $arrayOfResults[0];
			// if the username exists, but the password entered doesn't match the
			// one stored in the user's User object, display error
			if ($passord != $user->getPassword()){
				$errorMessage = "Invalid username or password."; //TODO - do we want to specify which of the two is invalid?
				require APP . "view/_templates/header.php";
				require APP . "view/problem/error_page.php";
				require APP . "view/_templates/footer.php"; 					
			}
			
			// else username exists AND the password entered matches the one on file
			else{
				$isValidLogin = true;
				//TODO - do somethign (I don't know what!)
				// for now, will just load a page confirming successful login:
				require APP . "view/_templates/header.php";
				require APP . "view/users/user_login_success.php";
				require APP . "view/_templates/footer.php"; 				
			} // end inner else
		} // end outer else
	} // end function login()
} // end class User
