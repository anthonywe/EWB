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
	        <li><a href="<?=base_url('login'); ?>">Login</a></li>
	        <li><a href="#">Become a partner</a></li>
           	<button type="submit" name="submit" class=" btn" id="donate"> DONATE </button>
	      	</ul>
  		<!-- <span class="navbar-brand mb-0 h1">Navbar</span> -->
		</nav>

		<div class="header-img">
			<img src="<?=base_url(); ?>public/images2.jpg" alt="image">
		</div>
	
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
					</div>
				</div>
			</div>
			<div class="col-10 project-view ">

                   <h4 class="thread-title"><?= $listOfAllUsersToView['question'];  ?></h4>
                    <p class="project-text"> <?= $listOfAllUsersToView['description'];  ?> </p>
                    <p class="project-date"> <?= $listOfAllUsersToView['deadline'];  ?> 
                    </p>
                    <p class="project-date"> posted by <?= $listOfAllUsersToView['name'];  ?> </p>
                    <p> <?= $listOfAllUsersToView['attachment'];  ?> </p>


                    <form method="post" action="<?= base_url();?>takeThisQuestion">
                    	<input type="hidden" name="questionId" value="<?= $listOfAllUsersToView['id'];  ?>">
						<input type="submit" value="Take this Question">
					</form>	
              		<hr>

        		<form method="post" action="<?= base_url();?>insert_answer">

				  	<div class="form-group row">
					    <div class="col-sm-4">
					      <textarea name="inputAnswer" rows="5" cols="100" placeholder="Add an Answer!"></textarea>
					    </div>
				  	</div>	

				  	<input type="hidden" name="inputUserid" value="<?= $cUser['users_id'];  ?>">

				  	<input type="hidden" name="questionId" value="<?= $listOfAllUsersToView['id'];  ?>">

				  	<div class="form-group row">
					    <div class="col-xs-offset-2 col-xs-4 col-sm-offset-4 col-sm-4">
		           		<button type="submit" name="submit" class="button_style btn"> Submit </button>
		           		</div>
					 </div>
          		</form>

          			<h4>Answers of this question</h4>

					<?php foreach( $listOfAllAnswers as $item ) { ?>
	                    <p class="project-text"> <?= $item['answer'];  ?> </p>
	                    <p class="project-date"> <?= $item['created_at'];  ?> </p>
	                    <p class="project-date"> posted by <?= $item['name'];  ?> </p>

	                    <form method="post" action="<?= base_url();?>get_comments">
	                    <input type="hidden" name="questionId" value="<?= $item['questions_id']; ?>">
                    	<input type="hidden" name="answerId" value="<?= $item['id'];  ?>">
						<input type="submit" value="Show Comments">
					</form>

					<form method="post" action="<?= base_url();?>insert_comment">
				  	<div class="form-group row">
					    <div class="col-sm-4">
					      <textarea name="InputComment" rows="2" cols="100" placeholder="Add a comment!"></textarea>
					    </div>
				  	</div>

				  	<input type="hidden" name="inputUserid" value="<?= $cUser['users_id'];  ?>">

				  	<input type="hidden" name="answerId" value="<?= $item['id'];  ?>">
				  	
	                    <input type="hidden" name="questionId" value="<?= $item['questions_id']; ?>">
					
					<div class="form-group row">
					    <div class="col-xs-offset-2 col-xs-4 col-sm-offset-4 col-sm-4">
		           		<button type="submit" name="submit" class="button_style btn"> Send </button>
		           		</div>
					 </div>
					</form>

					<?php } ?>


	                <?php if( isset($comments_ans) ){ ?>
                    <h4>Show the comments</h4>

					<?php foreach( $comments_ans as $item ) { ?>
	                    <p class="project-date"> <?= $item['comment'];  ?> </p>
	                    <p class="project-date"> <?= $item['created_at'];  ?> </p>
	                    <p class="project-date"> posted by <?= $item['name'];  ?> </p>
	                    <hr>
           			 <?php } ?>
           			 <?php } ?>
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