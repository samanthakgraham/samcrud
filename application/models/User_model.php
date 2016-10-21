<?php

/*
 * Model for the user table
 */
class User_model extends Parent_model {
    /*
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        
        // Set the table variable
        $this->table = 'users';
        
        // Load database
        $this->load->database();
    }
    
    /*
     * Function for validating a user's username and password and logging them in
     */
    public function login($username, $password) {
        // Build an array to return
        $aReturn = array('error' => true);
        
        // Try to get the user in the table by username
        $aUser = parent::getByField('username', $username);
        
        // If no user has this username
        if(empty($aUser)) {            
            $aReturn['message'] = 'That username does not exsit in the database';
        } else {            
            // If the password doesn't match the one provided
            if(md5($password) !== $aUser[0]['password']) {
                $aReturn['message'] = 'Your password is incorrect';
            } else {
                // Otherwise we're good!
                $aReturn['error'] = false;
                
                // Send back the username for the session
                $aReturn['user'] = $aUser[0]['username'];
            }
        }
        
        // Return
        return $aReturn;
    }
    
}

