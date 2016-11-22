<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Survey Form</title>
	<style type="text/css">
	#container {
		1px solid black;
		width: 1024px;
		padding-left: 80px;
		padding-bottom: 35px;
	}
	h3{
		padding-left: 50px;
	}
	#warning{
		font-size: 10px;
	}
	#left, #right{
		display:inline-block;
	}
	#right{
		margin-left: 20px;
		margin-bottom: 20px;
		vertical-align: top;
	}

	</style>
</head>
<body>
<?php echo $this->session->flashdata('errors');?>
<h3>Welcome!</h3>
<div id='container'>
	<div id='left'>
			<form action = "/Users/process_form" method="Post">
			<fieldset>
			<legend>Register</legend>
			<label>First Name: </label>
			<input type = 'text' name='first_name' ><br>
			<label>Last Name: </label>
			<input type = 'text' name='last_name' ><br>
			<label>Email Address: </label>
			<input type = 'text' name='email' ><br>
			<label>Password: </label>
			<input type = 'password' name='password' ><br>
			<p id='warning'>*Password should be at least 8 characters</p>
			<label>Confirm Password: </label>
			<input type = 'password' name='confirm_password' ><br>
			<br>
			<label>Date of Birth: </label>
			<input type ='date' name='birthday' max= <?= date('Y-m-d'); ?>
			<br>
			<input type ='submit' value='Register'><br>
			</fieldset>
			</form>
	</div>
	<div id='right'>
		<form action = "/Users/login" method="Post">
			<fieldset>
			<legend>Login</legend>
			<label>Email: </label>
			<input type = 'text' name='email'><br>
			<label>Password</label>
			<input type = 'text' name='password'><br>
			<br>
			<input type ='submit' value='Login'><br>
			</fieldset>
		</form>
	</div>
</div>
</body>
</html>