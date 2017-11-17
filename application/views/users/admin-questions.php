<!DOCTYPE HTML> 
<html>
<head>
	<meta charset = "utf-8"/>
	<title>Delete-Questions</title>
	<meta name="description" content="Engineers without borders">
	<meta name="viewport" content="width=device-width, initial-scale=1">		
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?=base_url(); ?>public/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">

</head>
<body>

	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-10">
				<table class="table table-dark" style="width: 75%;">
					<thead>
						<tr>
							<th scope="col">Question ID</th>
							<th scope="col">Question</th>
							<th scope="col">Description</th>
						</tr>
					</thead>
					<tbody>
						<!-- foreach.. -->
						<?php foreach($allQuestions as $info) { ?>
						<tr>
							<th scope="row"><?= $info['id']; ?></th>
							<td><?= $info['question']; ?></td>
							<td><?= $info['description']; ?></td>

							
							<td><form method="post" action="<?=base_url(); ?>admin/delete_question"><input type="hidden" name="thisid" value="<?= $info['id']; ?>"><input class="btn btn-danger btn-md" type="submit" value="Delete"></form></td>
							<!-- <td><a class='btn btn-primary btn-md'  href='send.php?name=".$row['name']."'>Approve</a></td> -->
						</tr>
						<?php } ?>

					</tbody>
				</table>
				<a href="<?=base_url(); ?>admin/home">Home</a>
			</div>
		</div>
	</div>


</body>

</html>