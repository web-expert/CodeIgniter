<?php

 class User_model extends CI_Model
  {
  	protected $primary_key = 'id';
	protected $table_name = 'user';


      function __construct()
      {
           parent::__construct();
      }

	/**
	 * Fetch user model
	 *
	 * @author InfoStride.com
	 */

    public function get_user_list()
    {
    	$query=$this->db->get('user');
        $return = $query->result();
        $query=$this->db->get($this->table_name);
        return $query->result();
    }
  }

