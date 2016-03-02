<?php require_once '../session.php' ?>
<!DOCTYPE html>
	<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">       
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
		<body>
			<form method="post" action="auth.php" enctype="multipart/form-data">
			  		<div class="control-group">
			    		<label class="control-label" for="inputUsername">Username</label>
			    		<div class="controls">
			      			<input type="text" id="inputUser" name="username" placeholder="Username">
			    		</div>
			  		</div>
			  		<div class="control-group">
			    		<label class="control-label" for="inputPassword">Password</label>
			    		<div class="controls">
			      			<input type="password" name="password" id="inputPass" placeholder="Password">
			    		</div>
			  		</div>
			  		<div class="control-group">
			    		<div class="controls">
			      			<label class="checkbox">
			        			<input type="checkbox"> Remember me
			      			</label>
			      			<button id="send" type="submit" class="btn">Sign in</button>
			    		</div>
			  		</div>
			  	</form>	


		</body>
	</html>