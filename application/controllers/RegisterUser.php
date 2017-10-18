<?php
  class RegisterUser extends CI_Controller{
    
        function __construct(){
       	       parent::__construct();
       	       $this->load->library('form_validation');
       	       $this->load->helper('url');
       	      $this->load->model('User_model');
           }


  	public function index(){
       $this->load->View('Auth/register');
  	}
    

    public function createuser(){
        
    	$cardential = [
                      'username' => $this->input->post('username'),
                       'email' => $this->input->post('email'),
                       'password' => md5($this->input->post('pwd'))
    	              ];

                    // set formvalidation rules
                     $this->form_validation->set_rules('username', 'Username', array('required'));
                    $this->form_validation->set_rules('email', 'E-mail', array('required')); // |valid_email|callback_email_check
             $this->form_validation->set_rules('pwd', 'Password', array('required', 'min_length[6]'));

             // check form validation
                     if($this->form_validation->run() ===FALSE){
               $this->load->View('Auth/register');
             }

             // if form validation success........

             else{
              if($this->User_model->createUser($cardential)){
                          $this->session->set_userdata('user_email', $cardential['email']);
                     //$this->session->set_userdata('user_id', $user['id']);
                     redirect("dashboard/");
                    }
                    else { die('Registration Error.');}
             }
                    
          
    }


    // Checks that Email Address is not in use
  public function email_check($em)
    {
        // return true if the address is indeed a new address
        $this -> db -> where('email', $em);
        $found = $this -> db -> get('users') -> num_rows(); // this returns the number of rows having the same address.

        if ($found!=0)
        {
            $this -> form_validation -> set_message('email_check', 'Email Address is already in use');
            return false;  // more than 0 rows found. the callback fails.
        }
        else
        {
            return true;   // 0 rows found. callback is ok.
        }
    }

  }
?>