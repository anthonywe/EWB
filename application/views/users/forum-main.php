<!DOCTYPE html>
<html>
<head>
	<title>Forum-Main</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="<?=base_url(); ?>public/main.css">
	<link rel="stylesheet" href="<?=base_url(); ?>public/style.css">

</head>
<body>
	<nav class="navbar sticky-top nave-barC">
		<!-- <span class="navbar-brand mb-0 h1">Navbar</span> -->
		<p class="history">to date .. amount of .. and total project </p>
		<a href="<?=base_url(); ?>login">Login</a>
	</nav>
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
						<input type="submit" value="More..">
					</form>	
              		<hr>
            <?php } ?>

			</div>

		</div>
	</div>
</div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>