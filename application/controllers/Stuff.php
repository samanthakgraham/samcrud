<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * List of stuff page
 */

class Stuff extends CI_Controller {
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
        
    }

}
