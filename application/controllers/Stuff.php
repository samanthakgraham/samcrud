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
        // Make sure we're logged in first
        if(!isset($_SESSION['user'])) {
            redirect('/login/');
        }
        // Build array of data to send to the view
        $aData = array('user' => $_SESSION['user']);
        
        // Load views
        $this->load->view('header');
        $this->load->view('stuff', $aData);        
        $this->load->view('footer');
    }
    
    public function users() {
        // Get everything from the users table, to display to the user
        $crud = new grocery_CRUD();
        $crud->set_table('users');
        $crud->set_subject('User');
        $crud->columns('username', 'email');        
        $crud->required_fields(array('username', 'password', 'email'));
        $crud->change_field_type('password','password');
        
        $crud->callback_before_insert(array($this,'encrypt_password_callback'));
        $crud->callback_before_update(array($this,'encrypt_password_callback'));

        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        $output = $crud->render();
        
        // Load views
        $this->load->view('header');
        $this->load->view('users', $output);        
        $this->load->view('footer');
    }
    
    function encrypt_password_callback($post_array, $primary_key = null) {
        $post_array['password'] = md5($post_array['password']);
        return $post_array;
    }

    public function categories() {
        // Get everything from the category table, to display to the user
        $crud = new grocery_CRUD();
        $crud->set_table('categories');
        $crud->set_subject('Category');
        $crud->columns('id', 'name');
        $crud->display_as('id', 'ID');
        $crud->required_fields('name');
        
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        $output = $crud->render();
        
        // Load views
        $this->load->view('header');
        $this->load->view('categories', $output);        
        $this->load->view('footer');
    }
    
    public function things() {
        // Get everything from the category table, to display to the user
        $thingCrud = new grocery_CRUD();
        $thingCrud->set_table('things');
        $thingCrud->set_subject('Thing');
        $thingCrud->set_relation('category', 'categories', '{name}');
        $thingCrud->columns('id', 'name', 'category');
        $thingCrud->display_as('id', 'ID');
        $thingCrud->required_fields('name', 'category');        
        
        $thingCrud->unset_export();
        $thingCrud->unset_print();
        $thingCrud->unset_read();
        $thingOutput = $thingCrud->render();
        
        // Load views
        $this->load->view('header');        
        $this->load->view('things', $thingOutput);
        $this->load->view('footer');
    }
}
