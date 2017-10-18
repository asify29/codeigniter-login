<?php
  class Login extends CI_Controller{
    
        function __construct(){
       	       parent::__construct();
       	       $this->load->library('form_validation');
       	       $this->load->helper('url');
       	        $this->load->model('Login_model','login');
           }


  	public function index(){
       $this->load->View('Auth/login');
  	}
    

    public function authenticate(){
        
    	$cardential = ['email' => $this->input->post('email'),
                       'password' => md5($this->input->post('pwd'))
    	              ];
             $this->form_validation->set_rules('email', 'E-mail', array('required'));
             $this->form_validation->set_rules('pwd', 'Password', array('required', 'min_length[6]'));

             if($this->form_validation->run() ===FALSE){
               $this->load->View('Auth/login');
             }
             else{
             	$u = $this->login->get_user_cardential($cardential);
                if($u) {
               		foreach($u as $user){
               			$this->session->set_userdata('user_email', $user['email']);
               			$this->session->set_userdata('user_id', $user['id']);
               		  redirect("dashboard/");
               		}
               }
               else
               {
               	$this->session->set_flashdata('msg',"Error! Your cardential is incorrect!");
               	redirect('login/');

               }
             	
             }
    	      
    }

    // Email test
      
       public function sendm(){
        // Please specify your Mail Server - Example: mail.yourdomain.com.
ini_set("SMTP","smtp.googlemail.com");

// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
ini_set("smtp_port","465");

// Please specify the return address to use
ini_set('sendmail_from', 'erabalti@gmail.com');
        $config = array(
                         'protocol' => 'smtp',
                         'smtp_host' => 'ssl://smtp.googlemail.com',
                         'smtp_port' => 465,
                         'smtp_user' =>'erabalti@gmail.com' ,
                         'smtp_pass' => '[erabalti@686]' );

        $this->load->library('email',$config);
        $this->email->set_newline('\r\n');

            $subject = 'This is a test';
            $message = '<p>This message has been sent for testing purposes.</p>';

            // Get full html:
            $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
                <title>' . html_escape($subject) . '</title>
                <style type="text/css">
                    body {
                        font-family: Arial, Verdana, Helvetica, sans-serif;
                        font-size: 16px;
                    }
                </style>
            </head>
            <body>
            ' . $message . '
            </body>
            </html>';
            // Also, for getting full html you may use the following internal method:
            //$body = $this->email->full_html($subject, $message);

            $result = $this->email
                ->from('erabalti@gmail.com')
                ->reply_to('xfthalavi@yahoo.com')    // Optional, an account where a human being reads.
                ->to('xfthalavi@gmail.com')
                ->subject($subject)
                ->message($body)
                ->send();

        var_dump($result);
        echo '<br />';
        echo $this->email->print_debugger();

        exit;
       }

  } // end of class
?>