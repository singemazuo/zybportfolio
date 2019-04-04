<?php

class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Verify the login's data with the database
     * @param string $user_name
     * @param string $password
     * @return void
     */
    public function verify($user_name, $password)
    {
        $this->db->where('username', $user_name);
        $this->db->where('password', $password);
        $query = $this->db->get('administrators');

        if($query->result())
        {
            return true;
        }
    }
}