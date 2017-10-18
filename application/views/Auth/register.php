
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">

	<style>
		#login { padding-top: 150px; }
		#login input { border:0 0 1px 0; border-radius: 0; }
    .weak { background-color: orange; color: #fff; padding: 10px; }
    .normal { background-color: green; color: #fff; padding: 10px; }
    .strong { background-color: blue; color: #fff; padding: 10px; }
    .ps { margin-top:10px; }
	</style>
  <script   src="https://code.jquery.com/jquery-3.2.1.slim.min.js"   integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="   crossorigin="anonymous"></script>
  <script>
    
    $(document).ready(function(){
        $("#status").keyup(function(){
           var len = $('#status').val().length;
           if(len==0){
              $('.ps').text('');
              $('.ps').removeClass('weak');
              $('.ps').removeClass('normal');
              $('.ps').removeClass('strong');
           }
           else if(len<5){
                 $('.ps').text('Weak');
                 $('.ps').addClass('weak');
                  $('.ps').removeClass('normal');
              $('.ps').removeClass('strong');
           }
           else if(len<8){
                 $('.ps').text('Normal');
                 $('.ps').addClass('normal');
                 $('.ps').removeClass('strong');
           }
           else if(len>=9){
                 $('.ps').text('strong');
                 $('.ps').addClass('strong');
           }
        });
    });
  </script>
</head>
<body>
      <section id="login">	
        <div class="continer">
      	<div class="row">
      		<div class="col-md-4 col-md-offset-4">
                  <h2 align="center"> CREATE NEW ACCOUNT </h2>
                 
                  
      		
      			<form method="POST" action="<?php echo base_url('index.php/RegisterUser/createuser');?>">
            <div class="form-group">
                 <label>Username</label>
              <input type="text" name="username" class="form-control" value="<?php echo set_value('username');?>"  />
              <p style=" color:red !important; font-family: camberia;"><?php echo form_error('username');?></p>
            </div>

      			<div class="form-group">
      			     <label>E-mail</label>
      				<input type="email" name="email" class="form-control" value="<?php echo set_value('email');?>" />
              <p style=" color:red !important; font-family: camberia;"><?php echo form_error('email');?></p>
      			</div>
      				<div class="form-group">
      			     <label>Password</label>
      				<input type="password" name="pwd" class="form-control" id="status" required/>
              <br/><br/>
              <span class="ps"></span>
              <p style=" color:red !important; font-family: camberia;"><?php echo form_error('pwd');?></p>
      			     </div>
      			<div class="form-group">
      				<input type="submit" name="lBtn" class="btn btn-primary" value="CREATE ACCOUNT" />
      			</div>

      			</form>

                        <div class="form-group">
                             <label>Already Have An Account?</label>
                              <a href="<?php echo base_url();;?>"> Login</a>
                             </div>
      		</div>
      	</div>
      </div>
      </section>
</body>
</html>