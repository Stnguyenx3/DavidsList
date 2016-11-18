<?php

/*
 *  Class: Users
 *   File: application/controller/users.php
 * Author: Paul Derugin
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
 * 
 * Copyright (C) 2016, Paul Derugin
 */

class Users extends Controller {

	/**
     * Loads a user's profile page.
     * 
     * @param int $userID The integer ID of the user.
	 * 
	 * @status Tested and working.
     */
    public function getUser($userID) {
    	//Get the user object corresponding to the user id
       	$userResponse = UserResponseCreator::createGetUserProfileResponse($userID);

        if ($userResponse == null) {
            $errorMessage = "User not found";
            require APP . "view/_templates/header.php";
            require APP . "view/problem/error_page.php";
            require APP . "view/_templates/footer.php"; 
        }
		else {
            // The folowing three lines send back the header, body, and footer
            // of the index.php webpage
            require APP . "view/_templates/header.php";
            require APP . "view/users/index.php";
            require APP . "view/_templates/footer.php";
        }
    } // end function getUser

	
	//Seems unsafe to publically have this available for anyone to delete a user from
	//the database
	//Maybe have it send a json to validate that this is the correct user
    /**
     * Deletes a user from the database.
     * 
     * @param int $userID
	 * 
	 * @status Tested and working.
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
            $removedCorrectly = $userRepo->remove($arrayOfUserObjects[0]);

            // If $removedCorrectly is true, then return this page
            //Redirect to new page.
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
     * Edits a user's profile. Creates a new User object from external JSON data
	 * and replaces the target user's current User object with the once created
	 * here.
	 * 
	 * External information is JSON encoded data that contains all fields of a
	 * User object.
     * 
     * @param int $userID
     */
    public function editUser($userID){
		// Create a new User object from the external JSON data; then replace
		// the target userID's current User Object with the new one
		
		$userResponse = UserResponseCreator::createEditUserProfileResponse($userID, $_POST);
		//TODO: Send a response back saying it saved	
    } // end function editUser
	
	/**
	 * Creates a new user.
	 * 
	 * External information is JSON encoded data which contains new user information.
	 * The new user information includes all of the user variables except for the
	 * userid.
	 * 
	 * Loads the newly created user's HTML page.
	 * 
	 */
	public function newUser(){

		// Call UserResponseCreator::createNewUserProfileResponse to
		// create a new user, passing in the JSON object
		$userResponse = UserResponseCreator::createNewUserProfileResponse($_POST);

		if($userResponse == null) {
			//TODO do something to alert that the user cannot use this email
		}

		// Call find based on the username of the user to get the userid:
		//   get the user object
		$userRepo = RepositoryFactory::createRepository("user");
		$arrayOfResults = $userRepo->find($_POST["username"], "username");
		$user = $arrayOfResults[0];
		
		//   get the userID from the user object
		$userID = $user->getId();
		//Save the email and password into $_SESSION
		
		// display the user's page
		//Change it to home page?
		header('Location: ' . URL . 'users/getuser/' . $userID);

	} // end function newUser
	
	/**
	 * Validates user-entered username/password combination.
	 * 
	 * External information is JSON encoded data that contains a "username" and
	 * "password".
	 * 
	 * Displays a generic error message if the supplied username/password 
	 * combination is invalid. Displays a message indicating success if the
	 * supplied username/password combination is valid.
	 * 
	 * @status Needs to be tested.
	 */
	public function login(){
		$email = $_POST["email"];
		$password = $_POST["password"];
		
		$userRepo = RepositoryFactory::createRepository("user");
		
		// Validate the login credentials
		
		$arrayOfResults = $userRepo->find($email, "email");
		
		// if no such username exists in the database, return back the word null
		//to render
		if ($arrayOfResults == null){
            echo "null";			
		}
		else{
			$user = $arrayOfResults[0];
			// if the username exists, but the password entered doesn't match the
			// one stored in the user's User object, display error
			$verifyPassword = password_verify($password, $user->getPassword());
			if (!$verifyPassword){
				echo "wrong";					
			}
			
			// else username exists AND the password entered matches the one on file
			else{
				//Save the email and password into $_SESSION
				//Don't need to do anything else as the ajax callback will redirect
				//Maybe have it redirect to user page than homepage
			
			} // end inner else
		} // end outer else
	} // end function login()

	public function logout() {
		$_SESSION = array();
		session_destroy();

		header('refresh: 0; URL=' . URL . 'home');
	}

	public function favorites($userID) {
		$userResponse = UserResponseCreator::createGetUserProfileResponse($userID);
		if($userResponse != null) {
			require APP . 'view/_templates/header.php';
        	require APP . 'view/users/favorites.php';
        	require APP . 'view/_templates/footer.php';
		} else {
			//error page
		}
    }

    public function listings($userID) {
    	$userResponse = UserResponseCreator::createGetUserProfileResponse($userID);
    	if($userResponse != null) {
    		require APP . 'view/_templates/header.php';
        	require APP . 'view/users/listings.php';
        	require APP . 'view/_templates/footer.php';
    	} else {
    		//error page
    	}
    }

} // end class User
