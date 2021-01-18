<?php

 class Register_model extends CI_Model
  {

      function __construct()
      {
           parent::__construct();
      } 
    /**
     * Check wheather user exixts function 
     *
     * @author InfoStride.com
     */

      function check_user($username)  
      {
          $query = $this->db->get_where('user', array('Username' => $username));
          $num = $query->num_rows();
          return $num;
      } 

    /**
     * Save User Register form Data 
     *
     * @author InfoStride.com
     */
      function saverecords($data)
      {
              $this->db->insert('user',$data);
              return $this->db->insert_id();
      }
  }

