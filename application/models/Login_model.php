<?php
  /**
  * 
  */
  class Login_model extends CI_Model
  {
  	
  	function __construct()
  	{
  		parent::__construct();
  		$this->load->database();
  	}

    public function get_user_cardential(Array $data){
      return $this->db->where($data)->get('users')->result_array();
    }
  }
?>