<!DOCTYPE html>
<html>
<head>
	<title>Forum-Main</title>
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
	        <li><a href="<?=base_url('login'); ?>">Login</a></li>
	        <li><a href="#">Become a partner</a></li>
           	<button type="submit" name="submit" class=" btn" id="donate"> DONATE </button>
	      	</ul>
  		<!-- <span class="navbar-brand mb-0 h1">Navbar</span> -->
		</nav>

		<div class="header-img">
			<img src="<?=base_url(); ?>public/images2.jpg" alt="image">
		</div>
	
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-2 side-bar bd-sidebar">
				<div class="col-2">
					<a href="">Top Projects</a>
					<a href="">New Projects</a>
					<form method="post" action="<?= base_url();?>post-question">
						<input type="submit" class="btn btn-primary" value="Post a Question">
					</form>	
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
			<div class="col-10 project-view ">

			<div class="row">
				<div class="col-xs-offset-2 col-xs-4 col-sm-offset-4 col-sm-6">
			<!-- ERROR message 
 -->			 <?php if( isset($error_msg) ){ ?>
                <div class="alert-error"><?= $error_msg; ?>
                </div>
                <?php } ?> 
				</div>
			</div>

			<?php foreach( $listOfAllUsersToView as $item ) { ?>
                    <h4><?= $item['question'];  ?></h4>
                    <p class="project-text"> <?= $item['description'];  ?> </p>
                    <p class="project-date"> <?= $item['deadline'];  ?> </p>

                    <form method="post" action="<?= base_url();?>form-question">
                    	<input type="hidden" name="questionId" value="<?= $item['id'];  ?>">
						<input type="submit" value="More..">
					</form>	
              		<hr>
            <?php } ?>

			</div>

		</div>
	</div>
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