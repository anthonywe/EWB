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
		<a href="">Login/Logout</a>
	</nav>
	<div class="container main-content">
		<div class="row justify-content-end">
			<div class="col-2 side-bar bd-sidebar">
				<div class="col-2">
					<a href="">Top Projects</a>
					<a href="">New Projects</a>
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
						<div>
							<form method="post" action="<?= base_url();?>profile-ngo">
								<input type="hidden" name="userid" value="<?= $cUser['users_id']; ?>">
								<input type="submit" value="profile">
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-10 project-view ">
				<div>
					<div class="thread-img">
						<img class="thread-profile-img" src="http://localhost/Something/MVC/EWB/public/test-pic.jpg" alt="profile-pic-thumbnail" class="img-thumbnail">
					</div>
					<h5 class="thread-title">Topic name</h5><br>
					<p class="project-text"> What all those different measuring units mean can 
						be a bit confusing, which is why many developers stick to the known, pixel 
						height. That said, what EMs, percentages, and straight numbers have going 
						for them is that they are all relative measurements, which can be super 
						useful when your site needs to look great across a variety of browsers
						and devices.
					</p>
					<div class="thread-added-pic">
						<img src="">
					</div>
					<p class="project-date"> 12/03/1999 </p>
					<a class="btn btn-primary main-more" href="#" role="button">Take this question</a>
					<form method="post" action="">
						<div class="row">
							<div class="col-lg-9 offset-lg-3">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Have a question?" aria-label="Product name">
									<span class="input-group-btn">
										<button class="btn btn-secondary" type="button">Send</button>
									</span>
								</div>
							</div>
						</div>
					</form>
					<hr>
					<div class="question-box">
						<p> questions should land here</p>
						<form method="post" action="">
							<div class="row">
								<div class="col-lg-9 offset-lg-3">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Comment?" aria-label="Product name">
										<span class="input-group-btn">
											<button class="btn btn-secondary" type="button">Send</button>
										</span>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			
		</div>


	</div>
</div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>