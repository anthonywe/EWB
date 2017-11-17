<!DOCTYPE HTML> 
<html>
<head>
	<meta charset = "utf-8"/>
	<title>Admin-home</title>
	<meta name="description" content="Engineers without borders">
	<meta name="viewport" content="width=device-width, initial-scale=1">		
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?=base_url(); ?>public/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">

</head>
<body>


	<div class="container">
		<div class="row">
			<div class="col-2">
				<a href="<?=base_url(); ?>admin">Approvals Pending</a><br>
				<a href="<?=base_url(); ?>admin/answers">Delete Answers</a><br>
				<a href="<?=base_url(); ?>admin/comments">Delete Comments</a><br>
				<a href="<?=base_url(); ?>admin/questions">Delete Questions</a><br>
			</div>
		</div>
	</div>

</body>

</html>