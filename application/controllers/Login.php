<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Login page
 */
class Login extends CI_Controller {
    
    /*
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        
        // Load necessary models
        $this->load->model('user_model');
    }
    
    /*
     * Index for this controller
     */
    public function index() {
        // Build an array of data to send to the view, if necessary
        $aData = array();
        
        // If we received POST data, we're logging in        
        if(isset($_POST) && !empty($_POST)) {
            // Make sure username AND password were provided
            if(empty($_POST['username']) || empty($_POST['username'])) {
                $aData['error'] = 'Username and password are required!';
            } else {
                // Try to log the user in
                $result = $this->user_model->login($_POST['username'], $_POST['username']);
                
                // If there was an error with the login
                if($result['error']) {
                    // Display it to the user
                    $aData['error'] = $result['message'];
                } else {
                    // Otherwise, set the session info for this user
                    $_SESSION['user'] = $result['user'];
                }                                
            }
        }
        
        // If the session is already set, no need to login
        if(isset($_SESSION['user'])) {
            redirect('/stuff/');
        }
        
        // Load views
        $this->load->view('header');
        $this->load->view('login', $aData);
        $this->load->view('footer');
    }
}

