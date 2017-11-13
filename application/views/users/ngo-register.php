<!DOCTYPE HTML> 
<html>
	<head>
		<meta charset = "utf-8"/>
		<title>NGO Registration</title>
		<meta name="description" content="Engineers without borders">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="<?=base_url(); ?>public/style.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">

	</head>

	<body>

		<nav class="navbar sticky-top nave-barC">
  		<!-- <span class="navbar-brand mb-0 h1">Navbar</span> -->
  		<p class="history"> amount of .. and total project </p>
		</nav>
		
		<div class="header-img">
			<img src="<?=base_url(); ?>public/tulips.jpg" alt="image">
		</div>

		<div class="container">
			<div class="header">
				<div class="row">
				  <div class="col-xs-offset-2 col-xs-4 col-sm-offset-3 col-sm-6"><h1> Registration Form </h1></div>
				</div>
			</div>

			<form>
			  <div class="form-group row">
			    <label for="inputUserName" class="col-sm-offset-2 col-sm-2 col-form-label">User Name</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="inputUserName">
			    </div>
			  </div>
			
				<div class="form-group row">
				    <label for="inputPassword" class="col-sm-offset-2 col-sm-2 col-form-label">Password</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="inputPassword">
				    </div>
			  	</div>
			  
			    <div class="form-group row">
				    <label for="inputCPassword" class="col-sm-offset-2 col-sm-2 col-form-label">Confirm Password</label>
				    <div class="col-sm-4">
				      <input type="password" class="form-control" id="inputCPassword">
				    </div>
			  	</div>

			  	<div class="form-group row">
				    <label for="inputName" class="col-sm-offset-2 col-sm-2 col-form-label">Name</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="inputName">
				    </div>
			  	</div>

			  	<div class="form-group row">
				    <label for="inputCperson" class="col-sm-offset-2 col-sm-2 col-form-label">Contact Person</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="inputCperson">
				    </div>
			  	</div>

			  	<div class="form-group row">
				    <label for="inputActivities" class="col-sm-offset-2 col-sm-2 col-form-label">Fields of Activities</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="inputActivities">
				    </div>
			  	</div>

			  	<div class="form-group row">
				    <label for="inputWebsite" class="col-sm-offset-2 col-sm-2 col-form-label">Website</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="inputWebsite">
				    </div>
			  	</div>

			  	<div class="form-group row">
				    <label for="inputEmail" class="col-sm-offset-2 col-sm-2 col-form-label">Email</label>
				    <div class="col-sm-4">
				      <input type="text" class="form-control" id="inputEmail">
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
			 <h3>Contact us </h3>
				<p> <span>
				Stichting Ingenieurs zonder Grenzen <br>
				projects@ewbnl.org <br>
				CIC Rotterdam, Stationsplein 45, 4th floor <br>
				3013 AK Rotterdam <br>
				KvK 65174275 – RSIN 856007638 <br>
				Read our policy <br>
				</span></p>
		</div>
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
	</html>