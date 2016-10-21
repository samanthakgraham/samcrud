<?php

/*
 * Model for the thing table
 */
class Thing_model extends Parent_model {
    /*
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        
        // Set the table variable
        $this->table = 'things';
        
        // Load database
        $this->load->database();
    }
    
}

