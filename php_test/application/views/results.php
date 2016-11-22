<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="utf-8">
	<title>Submitted Information</title>
	<style type="text/css">
	.submit {
		1px solid black;
		width: 200px;
		padding-left: 35px;
		margin-left: 450px;
		padding-bottom: 35px;
	}
	.title {
		font-size: 25px;
		font-family: verdana;
	}
	</style>
</head>
<body>
<div id="container">
	<div class="alert alert-success">
	<p class='title'>Welcome <?php echo $data['first_name']; ?>!</p>
	<p>Your registration was successfully submitted!</p>
	</div>
	<div id="body">
		<fieldset>
		<legend>User Information</legend>
		<p>First Name: <?php echo $data['first_name']; ?></p>
		<p>Last Name: <?php echo $data['last_name']; ?></p>
		<p>Email Address: <?php echo $data['email']; ?></p>
		<a href="/" class="btn btn-primary">Log Out</a>
		</fieldset>
		<br>
	</div>
</div>
</body>
</html>