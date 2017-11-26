<!DOCTYPE html>
<html>
<head>
	<title>Forum-Question</title>
	<meta name="description" content="Engineers without borders">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	 <link rel="stylesheet" href="<?=base_url(); ?>public/main.css"> 
	<link rel="stylesheet" href="<?=base_url(); ?>public/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">
</head>
<body>

	<nav class="navbar sticky-top nave-barC ">
			<ul class="nav navbar-nav navbar-left">
				<li> <img src="<?=base_url(); ?>public/logo.jpg" id="logo"></li>
			</ul>
			<ul class="nav navbar-nav nav_style navbar-right">
	        <li><a href="#">About</a></li>
	        <li><a href="#">Projects</a></li>
	        <li><a href="#">Events</a></li>
	        <li><a href="#">Blog</a></li>
	        <li><a href="#">Join us</a></li>
	        <li><a href="<?=base_url(); ?>">Forum</a></li>
	        <?php if( isset($cUser) ){ ?>
               <li><a href="<?=base_url('logout'); ?>">Logout</a></li>
                <?php } ?>
            <?php if( !isset($cUser) ){ ?>
               	<li><a href="<?=base_url('login'); ?>">Login</a></li>
                <?php } ?>
	        <li><a href="#">Become a partner</a></li>
	    	<li><a href="<?= base_url(); ?>logout">log out</a></li>
           	<button type="submit" name="submit" class=" btn" id="donate"> DONATE </button>
	      	</ul>
  		<!-- <span class="navbar-brand mb-0 h1">Navbar</span> -->
		</nav>

		<div class="header-img">
			<img src="<?=base_url(); ?>public/images2.jpg" alt="image">
		</div>
	
	<div class="container ">
		<div class="row">
			<div class="col-sm-2 side-bar bd-sidebar">
				<div class="col-2">
					
					
				</div>
			</div>
			<div class="col-md-offset-2 col-md-8 justify-content-md-center">
				<form method="post" action="<?= base_url();?>update_engprofile">
					<div class="row">
						<div class="col-sm-4 col-md-4">
							<img class="profile-pic" src="http://localhost/Something/MVC/EWB/public/test-pic.jpg" alt="profile-pic-thumbnail" class="img-thumbnail">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPic" class="col-sm-offset-2 col-sm-6 col-form-label">Name: </label>
						<div class="col-sm-4">
							<input type="text" name="name" value="<?= $details['name']; ?>" class="form-control" style="width:200px;" id="inputPic" accept="image/*">
						</div>
					</div>

					<div class="form-group row">
						<label for="inputPic" class="col-sm-offset-2 col-sm-6 col-form-label">Email: </label>
						<div class="col-sm-4">
							<input type="text" name="email" value="<?= $details['email']; ?>" class="form-control" style="width:200px;" id="inputPic" accept="image/*">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPic" class="col-sm-offset-2 col-sm-6 col-form-label">Phone Number:</label>
						<div class="col-sm-4">
							<input type="text" name="phone" value="<?= $details['phone']; ?>" class="form-control" style="width:200px;" id="inputPic" accept="image/*">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPic" class="col-sm-offset-2 col-sm-6 col-form-label">Fields of Expertise: </label>
						<div class="col-sm-4">
							<input type="text" name="expertise" value="<?= $details['field_of_expertise']; ?>" class="form-control" style="width:200px;" id="inputPic" accept="image/*">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPic" class="col-sm-offset-2 col-sm-6 col-form-label">LinkedIn Profile: </label>
						<div class="col-sm-4">
							<input type="text" name="linkedin-profile" value="<?= $details['linkedin_url']; ?>" class="form-control" style="width:200px;" id="inputPic" accept="image/*">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPic" class="col-sm-offset-2 col-sm-6 col-form-label">About Me: </label>
						<div class="col-sm-4">
							<input type="text" name="about-me" value="<?= $details['about_me']; ?>" class="form-control" style="width:200px;" id="inputPic" accept="image/*">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-offset-8 col-sm-4">
						<input type="hidden" name="userid" value="<?= $details['id']; ?> ">
						<input type="submit" value="update">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div class="footer">
			<div id="first_col">
				<h4>Stay connected here</h4>
				<p>Get updates about projects, activities, events, vacancies and more.</p>
				<button type="submit" name="submit" class="button_style btn"> GET OUR NEWSLETTER </button>
			</div>

			<div id="sec_col">
				<h4>Follow Us</h4>
				<a href="#"><img src="<?=base_url(); ?>public/fb.svg"></a>
				<a href="#"><img src="<?=base_url(); ?>public/in.svg"></a>
				<a href="#"><img src="<?=base_url(); ?>public/tw.svg"></a>
			</div>
			
			<div id="third_col">
			 <h4>Contact us </h4>
				<p> <span>
				Stichting Ingenieurs zonder Grenzen <br>
				projects@ewbnl.org <br>
				CIC Rotterdam, Stationsplein 45, 4th floor <br>
				3013 AK Rotterdam <br>
				KvK 65174275 – RSIN 856007638 <br>
				Read our policy <br>
				</span></p>
			</div>
		</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	

</body>
</html>