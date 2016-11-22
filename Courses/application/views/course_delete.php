<!DOCTYPE html>
<html>
<head>
	<title>Course Delete</title>
</head>
<body>
	<h2>Are you sure you want to delete the following course?</h2>
	<p>Name: <?= $course['title'] ?></p>
	<p>Description: <?= $course['description'] ?></p>
	<?php $id = intval($course['id']);?>
	<form action = '/' method = 'post'>
		<button name='no'>No</button>
	</form>
	<form action = '/Courses/destroy/<?= $id ?>' method = 'post'>
		<button name='yes'>Yes! I want to delete this</button>
	</form>
</body>
</html>