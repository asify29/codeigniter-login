<?php

 /**
 * 
 */
 class Authenticate 
 {
 	
 	function __construct()
		{
		    $this->CI =& get_instance();
		}


	function loginCheck()
		{
		    if($this->session->userdata('user_email')==''){ 
		    redirect('login');
		    }

		}
		

 }  // end of class

?>