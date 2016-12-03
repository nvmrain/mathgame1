<?php session_start();
	$_SESSION["count"] = 0;
	$_SESSION["correct"] = 0;
	$_SESSION["check"] = "";
?>
<html>
	<head>
		<title>Math Game</title>
		<link rel="stylesheet" href="style/bootstrap.min.css" >
		<meta charset="utf-8" />
	</head>
	<body class="container">
		<header class="jumbotron">
			<h1>Please login and enjoy our game!<h1>
		</header>
		<section>
			<form action="index.php" method="post">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-xs-2">Email:</label>
						<input class="col-xs-6" type="email" name="username" id="username" placeholder="Email here">
					</div>
					<div class="form-group">
						<label class="col-xs-2">Password:</label>
						<input class="col-xs-6" type="password" name="pw" id="pw" placeholder="Password">
					</div>
					<div>
						<input type="submit" name="submit" class="btn-primary" value="log in">
					</div>
				</div>
				<div>
				</div>
			</form>
			<?php 
                if (isset($_GET["err"])) {
                   	echo $_GET["err"]; 	
                }			
			?>
		</section>
		
	</body>
</html>