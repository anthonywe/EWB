<!DOCTYPE HTML> 
<html>
<head>
	<meta charset = "utf-8"/>
	<title>Admin</title>
	<meta name="description" content="Engineers without borders">
	<meta name="viewport" content="width=device-width, initial-scale=1">		
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?=base_url(); ?>public/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">
	<style>
	table {
		border-collapse: separate;
		width: 100%;
		border: 1px solid black;
	} 

	td {
		border: 1px solid black;
	}


	</style>

</head>
<body>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-10">
				<table class="table table-dark" style="width: 75%;">
					<thead>
						<tr>
							<th scope="col">User ID</th>
							<th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">Field Of Expertise</th>
							<th scope="col">Field Of Activities</th>
							<th scope="col">LinkedIn url</th>
							<th scope="col">Website</th>
							<th scope="col">Phone Number</th>
							<th scope="col">Approval</th>
						</tr>
					</thead>
					<tbody>
						<!-- foreach.. -->
						<?php foreach($details as $info) { ?>
						<tr>
							<th scope="row"><?= $info['id']; ?></th>
							<td><?= $info['name']; ?></td>
							<td><?= $info['email']; ?></td>
							<td><?= $info['field_of_expertise']; ?></td>
							<td><?= $info['field_of_activities']; ?></td>
							<td><?= $info['linkedin_url']; ?></td>
							<td><?= $info['website']; ?></td>
							<td><?= $info['phone']; ?></td>
							<td><?= $info['approved']; ?></td>
							<td><form method="post" action="<?=base_url(); ?>admin/approve_user"><input type="hidden" name="thisid" value="<?= $info['id']; ?>"><input class="btn btn-primary btn-md" type="submit" value="Approve"></form></td>
							<!-- <td><a class='btn btn-primary btn-md'  href='send.php?name=".$row['name']."'>Approve</a></td> -->
						</tr>
						<?php } ?>

					</tbody>
				</table>
				<a href="admin/home">Home</a>
			</div>
		</div>
	</div>

</body>

</html>
