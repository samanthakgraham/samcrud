<?php

/*
 * Model for all tables
 * 
 */

class Parent_model extends CI_Model {
    protected $table;
    
    /*
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        
        // Load database
        $this->load->database();
    }
    
    /*
     * Add
     * Adds a new entry to the db table
     * 
     * @name add
     * @param $data The data to add
     * @return int
     * 
     */
    public function add($data) {        
        $this->db->insert($this->table, $data);
        
        // Return the id
        return $this->db->insert_id();
    }
    
    /*
     * Update
     * Updates an entry in the db table
     * 
     * @name update
     * @param $data The data to update
     * @return void
     * 
     */
    public function update($data) {
        $this->db->update(  $this->table, 
                            $data, 
                            array('id' => $data['id'])
        );
    }
    
    /*
     * Delete
     * Deletes an entry in the db table
     * 
     * @name delete
     * @param $id The entry to delete
     * @return void
     * 
     */
    public function delete($id) {
        $this->db->delete(  
            $this->table,
            array('id' => $id)
        );
    }
    
    /*
     * Get All
     * Returns all entries in the database table
     * 
     * @name getAll
     * @return array
     * 
     */
    public function getAll() {        
        $query = $this->db->get($this->table);        
        $aReturn = array();        
        
        // Return each row as a nice array
        foreach ($query->result() as $row) {            
            $aReturn[] = (array)$row;
        }
        
        return $aReturn;
    }
    
    /*
     * Get By Field
     * Returns entry corresponding to the given field
     * 
     * @name getByField
     * @data $field The field to search for (username, email, etc)
     * @data $value The value to search for
     * @data $where Extra where clauses
     * @return array | null
     * 
     */
    public function getByField($field, $value, $where = array()) {
        // Build query
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where(array($field => $value));
        if(!empty($where)) {
            $this->db->where($where);
        }
        
        // Run query
        $query = $this->db->get();
        
        // Return each row as a nice array
        $aReturn = array();
        
        foreach ($query->result() as $row) {            
            $aReturn[] = (array)$row;
        }
        
        return $aReturn;
    }
    
    /*
     * Get Count
     * Returns a count of the number of rows in the table
     * 
     * @name getCount
     * @return int
     */
    public function getCount() {
        return $this->db->count_all($this->table);
    }
    
    /*
     * Set Table
     * Sets the $table variable for the class
     * 
     * @name setTable
     * @param $table The table name
     * @return void
     */
    public function setTable($table) {
        $this->table = $table;
    }
}
