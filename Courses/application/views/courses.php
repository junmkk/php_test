<!DOCTYPE html>
<html>
<head>
	<title>Courses</title>
</head>
<body>
<div id = 'wrapper'>
	<div id = 'addbox'>
		<h3>Add a new course</h3>
		<form action='Courses/add' method='post'>
			Title: <input type="text" name="title">
			Description: <input type="text" name="description">
		<button>Add</button>
		</form>
	</div>
	<br>
	<br>
	<div id = 'coursebox'>
		<table>
			<thead>
			<tr>
				<th>Course Name</th>
				<th>Description</th>
				<th>Date Added</th>
				<th>Actions</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($courses as $course){ ?>
				<tr>
					<td><?= $course['title']; ?></td>
					<td><?= $course['description'] ?></td>
					<td><?= $course['created_at'] ?></td>
					<td><a href="Courses/show/<?= $course['id'] ?>">remove</a></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>