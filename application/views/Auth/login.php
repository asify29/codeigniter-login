
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">

	<style>
		#login { padding-top: 150px; }
		#login input { border:0 0 1px 0; border-radius: 0; }
	</style>
</head>
<body>
      <section id="login">	
        <div class="continer">
      	<div class="row">
      		<div class="col-md-4 col-md-offset-4">
                  <h3 style=" color:red !important; font-family: camberia;"><?php echo $this->session->flashdata('msg');?></h3>
      		<p style="color:red;"><?php echo validation_errors(); ?></p>
      			<form method="POST" action="<?php echo base_url('index.php/Login/authenticate');?>">
      			<div class="form-group">
      			     <label>E-mail</label>
      				<input type="email" name="email" class="form-control" value="<?php echo set_value('field name');?>"  required/>
      			</div>
      				<div class="form-group">
      			     <label>Password</label>
      				<input type="password" name="pwd" class="form-control" required/>
      			     </div>
      			<div class="form-group">
      				<input type="submit" name="lBtn" class="btn btn-primary" value="Login" />
      			</div>

      			</form>

                        <div class="form-group">
                             <label>Create New Account!</label>
                              <a href="<?php echo base_url('index.php/RegisterUser/');?>"> Register</a>
                             </div>
      		</div>
      	</div>
      </div>
      </section>
</body>
</html>