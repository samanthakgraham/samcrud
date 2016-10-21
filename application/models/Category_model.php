<?php

/*
 * Model for the category table
 */
class Category_model extends Parent_model {
    /*
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        
        // Set the table variable
        $this->table = 'categories';
        
        // Load database
        $this->load->database();
    }
    
}

