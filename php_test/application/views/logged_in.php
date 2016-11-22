<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="utf-8">
	<title>Logged In</title>
	<style type="text/css">
	/*.submit {
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
	div {
		width: 960px;
		height: 350px;
		border: 1px solid gray;
		font-family: monospace;
		padding-left: 50px;
		margin: 50px;
		margin-left: 100px;
	}*/
	</style>
</head>
<body>
<?php 
	$count = 0;
	foreach($pokeusers as $pokeuser){ 
	if($pokeuser['poked'] == $this->session->userdata('id'))
	{ $count++; }
	} ?>
<div id="container">
	<h3>Welcome, <?= $this->session->userdata('firstname') ?>!</h3>
	<h5><?= $count ?> people poked you!</h5>
	<div id = 'pokeinfo'>
	<?php foreach($pokeusers as $pokeuser){ 
	if($pokeuser['poker'] == $this->session->userdata('id'))
	{ continue; }
	if($pokeuser['poked'] == $this->session->userdata('id'))
	{ ?>
		<p><?= $pokeuser['name'] ?> poked you <?= 	$pokeuser['poke_count'] ?> times.</p>
	<?php }} ?>
	</div>
	<br>
	<br>
	<div id = 'pokebox'>
	<p>People you may want to poke:</p>
		<table>
			<thead>
			<tr>
				<th>Name</th>
				<th>Alias</th>
				<th>Email Address</th>
				<th>Poke History</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php 
				foreach($users as $user){
				if( $user['id'] == $this->session->userdata('id') ) { continue; } ?>
				<tr>
					<td><?= $user['first_name'] . " " . $user['last_name']; ?></td>
					<td><?= $user['first_name'] ?></td>
					<td><?= $user['email'] ?></td>
					<td><?= $user['total_pokes'] ?> pokes</td>
					<td><form action="/Users/poke/<?= $user['id'] ?>"><button>Poke</button></form>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>

	<a href="/" class="btn btn-primary">Log Out</a>
</div>
</body>
</html>