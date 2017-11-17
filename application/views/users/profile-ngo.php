<!DOCTYPE html>
<html>
<head>
	<title>Forum-Question</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="http://localhost/Something/MVC/EWB/public/main.css">
</head>
<body>
	<nav class="navbar sticky-top nave-barC">
		<!-- <span class="navbar-brand mb-0 h1">Navbar</span> -->
		<p class="history">to date .. amount of .. and total project </p>
		<a href="">Logout</a>
	</nav>
	<div class="container ">
		<div class="row">
			<div class="col-md-2 side-bar bd-sidebar">
				<div class="col-2">
					<a href="">Answers#</a><br>
					<p>Contacts</p>
					<a class="btn btn-primary" href="#" role="button">Add Project</a>
					<div class="row">
						<div class=" offset-lg-3">
							<div class="input-group search-div">
								<input type="text" class="search-topic" placeholder="Search" aria-label="Product name">
								<span class="input-group-btn">
									<button class="btn btn-secondary" type="button">Go</button>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-offset-2 col-md-8 justify-content-md-center">
				<form method="post" action="<?= base_url();?>update_ngoprofile">
					<div class="row">
						<div class="col-sm-4 col-md-4">
							<img class="profile-pic" src="http://localhost/Something/MVC/EWB/public/test-pic.jpg" alt="profile-pic-thumbnail" class="img-thumbnail">
						</div>
					</div>
					<!-- <div "col-4">	 -->
					<div class="form-group row">
						<label for="inputPic" class="col-sm-offset-4 col-sm-6 col-form-label">Name: </label>
						<div class="col-sm-4">
							<input type="text" name="name" value="<?= $details['name']; ?>" class="form-control" style="width:200px;" id="inputPic" accept="image/*">
						</div>
					</div>

					<div class="form-group row">
						<label for="inputPic" class="col-sm-offset-4 col-sm-6 col-form-label">Email: </label>
						<div class="col-sm-4">
							<input type="text" name="email" value="<?= $details['email']; ?>" class="form-control" style="width:200px;" id="inputPic" accept="image/*">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPic" class="col-sm-offset-4 col-sm-6 col-form-label">Contact Person:</label>
						<div class="col-sm-4">
							<input type="text" name="contact-person" value="<?= $details['contact_person']; ?>" class="form-control" style="width:200px;" id="inputPic" accept="image/*">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPic" class="col-sm-offset-4 col-sm-6 col-form-label">Fields of Activities: </label>
						<div class="col-sm-4">
							<input type="text" name="field-of-activities" value="<?= $details['field_of_activities']; ?>" class="form-control" style="width:200px;" id="inputPic" accept="image/*">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPic" class="col-sm-offset-4 col-sm-6 col-form-label">Website</label>
						<div class="col-sm-4">
							<input type="text" name="website" value="<?= $details['website']; ?>" class="form-control" style="width:200px;" id="inputPic" accept="image/*">
						</div>
					</div>
					<div class="form-group row">
						<input type="hidden" name="userid" value="<?= $details['id']; ?> ">
						<input type="submit" value="update">
					</div>
				</form>
			</div>
			
		</div>
	</div>





</body>

</html>