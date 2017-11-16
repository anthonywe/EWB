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


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>