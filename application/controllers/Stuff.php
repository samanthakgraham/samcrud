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
        $this->load->model('category_model');
        $this->load->model('thing_model');
    }
    
    /*
     * Index for this controller
     */
    public function index() {
        // Build an array of data to send to the view
        $aData = array();
        
        // Get everything from the category and things table, to display to the user
        $aData['categories'] = $this->category_model->getAll();
        $aData['things'] = $this->thing_model->getAll();
        
        // Load views
        $this->load->view('header');
        $this->load->view('stuff', $aData);
        $this->load->view('footer');
    }

}
