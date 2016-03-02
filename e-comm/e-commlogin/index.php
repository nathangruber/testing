<?php  require_once '../session.php'; ?>
<!DOCTYPE html>
	<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">       
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
		<body>
			<div class="results"></div>	
			<div id="content">

				<?php echo $_SESSION['username']; ?>

				</div>
		
		</body>
	</html>