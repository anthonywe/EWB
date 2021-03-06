<!DOCTYPE HTML> 
<html>
	<head>
		<meta charset = "utf-8"/>
		<title>Engineer Registration</title>
		<meta name="description" content="Engineers without borders">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="<?=base_url(); ?>public/style.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">

	</head>

	<body>

		<nav class="navbar sticky-top nave-barC">
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
           	<button type="submit" name="submit" class=" btn" id="donate"> DONATE </button>
	      	</ul>
  		<!-- <span class="navbar-brand mb-0 h1">Navbar</span> -->
		</nav>

		<div class="header-img">
			<img src="<?=base_url(); ?>public/images2.jpg" alt="image">
		</div>
		
		<div class="container">
			<div class="header">
				<div class="row">
				  <div class="col-xs-offset-2 col-xs-4 col-sm-offset-3 col-sm-6"><h1> Registration Form </h1></div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-offset-2 col-xs-4 col-sm-offset-4 col-sm-6">
			<!-- success message from registration process
 -->			 <?php if( isset($suc_msg) ){ ?>
                <div class="alert-success"><?= $suc_msg; ?>
                </div>
                <?php } ?> 
				</div>
			</div>

			<div class="row">
				<div class="col-xs-offset-2 col-xs-4 col-sm-offset-4 col-sm-6">
			<?php
                    $err = validation_errors('<li>', '</li>');
                    if( $err ) {
                ?>
                    <ul class="alert-error">
                    <?php echo $err; ?>
                    </ul>
                <?php } ?>
            	</div>
        	</div>


			<form method="post" action="<?= base_url(); ?>engg_register" enctype="multipart/form-data">
			  <div class="form-group row">
			    <label for="inputUserName" class="col-sm-offset-2 col-sm-2 col-form-label">User Name</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" name="inputUserName">
			    </div>
			  </div>
			  
			  
			  <input type="hidden" name="ngo_eng" value="1">
			  
			
				<div class="form-group row">
				    <label for="inputPassword" class="col-sm-offset-2 col-sm-2 col-form-label">Password</label>
				    <div class="col-sm-4">
				      <input type="password" class="form-control" name="inputPassword">
				    </div>
			  	</div>
			  
			    <div class="form-group row">
				    <label for="inputCPassword" class="col-sm-offset-2 col-sm-2 col-form-label">Confirm Password</label>
				    <div class="col-sm-4">
				      <input type="password" class="form-control" name="inputCPassword">
				    </div>
			  	</div>

			  	<div class="form-group row">
				    <label for="inputName" class="col-sm-offset-2 col-sm-2 col-form-label">Name</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="inputName">
				    </div>
			  	</div>

				<div class="form-group row">
				    <label for="inputEmail" class="col-sm-offset-2 col-sm-2 col-form-label">Email</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="inputEmail">
				    </div>
			  	</div>

			  	<div class="form-group row">
				    <label for="inputExpertise" class="col-sm-offset-2 col-sm-2 col-form-label">Field of Expertise</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="inputExpertise">
				    </div>
			  	</div>

			  	<div class="form-group row">
				    <label for="inputPhone" class="col-sm-offset-2 col-sm-2 col-form-label">Phone Number</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="inputPhone">
				    </div>
			  	</div>

			  	<div class="form-group row">
				    <label for="inputLinkedin" class="col-sm-offset-2 col-sm-2 col-form-label">Linkedin Profile URL</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" name="inputLinkedIn">
				    </div>
			  	</div>

			  	<div class="form-group row">
				    <label for="inputPic" class="col-sm-offset-2 col-sm-2 col-form-label">Profile Picture</label>
				    <div class="col-sm-4">
				    <input type="file" name="inputProfilePic" class="form-control" id="inputPic" accept="image/*">
				    </div>
			  	</div>

			  	<div class="form-group row">
				    <label for="inputAbout" class="col-sm-offset-2 col-sm-2 col-form-label">About Me</label>
				    <div class="col-sm-4">
				      <textarea name="inputAboutMe" rows="5" cols="100"></textarea>
				    </div>
			  	</div>

			  	<div class="form-group row">
				    <div class="form-check">
				      <label class="form-check-label" class="col-sm-offset-2 col-sm-2 col-form-label"> 
				      </label>
				      <div class="col-sm-offset-4 col-sm-4">
				        <input class="form-check-input" type="checkbox" name="inputNotRobot" class="form-control"> I am not a Robot
				      </div>
				    </div>
				</div>

			 <div class="form-group row">
			    <div class="col-xs-offset-2 col-xs-4 col-sm-offset-4 col-sm-4">
           		<button type="submit" name="submit" class="button_style btn"> Register </button>
           		</div>
			 </div>
			</form>

		</div>

		<div class="footer">
			<div id="first_col">
				<h4>Stay connected </h4>
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