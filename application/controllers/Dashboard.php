<?php
  class Dashboard extends CI_Controller{
    
        function __construct(){
       	       parent::__construct();
       	       $this->load->library('form_validation');
       	       $this->load->helper('url');
       	      $this->load->model('User_model');

              if(!$this->session->userdata('user_email')){ redirect('login');}
           }


  	public function index(){
       $this->load->view('dashboard');
  	}

  }
  ?>