<!DOCTYPE HTML> 
<html>
	<head>
		<meta charset = "utf-8"/>
		<title>Login</title>
		<meta name="description" content="Engineers without borders">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="<?=base_url(); ?>public/style.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">

	</head>

	<body>
		
		<div class="container">
			<div class="header">
				<div class="row">
				  <div class="col-xs-offset-2 col-xs-4 col-sm-offset-4 col-sm-2"><h1> Login</h1></div>
				</div>
			</div>
	
			<div class="row">
				<div class="col-xs-offset-2 col-xs-4 col-sm-offset-4 col-sm-6">

			<!-- success message from registration process
 -->			 <?php if( isset($err_msg) ){ ?>
                <div class="alert-error"><?= $err_msg; ?>
                </div>
                <?php } ?> 
                </div>
            </div>

			<div class="row">
				<div class="col-xs-offset-2 col-xs-4 col-sm-offset-4 col-sm-6">
			<!-- validation errror message from form
 -->
					<?php
						$err = validation_errors('<li>', '</li>');
						if ( $err ) {
						?>
							<ul class="alert-error"> 
							<?php echo $err; ?>
							</ul>
					<?php } ?>	
				</div>
			</div>

			<form method="post" action="<?=base_url(); ?>login">

			  <div class="form-group row">
			    <label for="inputUserName" class="col-sm-offset-2 col-sm-2 col-form-label">User Name</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" name="inputUserName">
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="inputPassword" class="col-sm-offset-2 col-sm-2 col-form-label">Password</label>
			    <div class="col-sm-4">
			      <input type="password" class="form-control" name="inputPassword">
			    </div>
			  </div>
				
				<div class="form-group row">
				    <div class="form-check">
				      <label class="form-check-label" class="col-sm-offset-2 col-sm-2 col-form-label"> 
				      </label>
				      <div class="col-sm-offset-4 col-sm-4">
				        <input class="form-check-input" type="checkbox" class="form-control" name="robotCheck"> I am not a Robot
				      </div>
				    </div>
				</div>

			  <div class="form-group row">
			    <div class="col-xs-offset-2 col-xs-4 col-sm-offset-4 col-sm-4">
           		<button type="submit" name="submit" class="button_style btn"> Login </button>
          		</div>
			  </div>
			</form>


			<div class="row">
			  <div class="col-sm-offset-4 col-sm-8"> <p> Don't have an account yet? </p></div>
			</div>

			<div class="row">
			  <div class="col-sm-offset-5 col-sm-6"> <a href="#"> Register </a></div>
			</div>

		</div>
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
	</html>