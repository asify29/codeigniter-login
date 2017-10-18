<?php
  /**
  * 
  */
  class User_model extends CI_Model
  {
  	
  	function __construct()
  	{
  		parent::__construct();
  		$this->load->database();
  	}

    public function getAll(){
      return $this->db->select('id,username,email')->get('users')->result_array();
    }

    public function getUser($id){

      return $this->db->select('id,username,email')->where('id',$id)->get('users')->result_array();
    }
    // create new user

     public function createUser(Array $data){

      return $this->db->insert('users',$data);
    }
  }
?>