<?php session_start();
	//check if the username & password is right or not
	if ($_SESSION["check"] != "checked") {
		if ($_POST["username"] == "a@a.a" && $_POST["pw"] == "aaa") {
			$_SESSION["check"] = "checked";
		} else {
			$err = "<p style='color:red;'>invalid username/password</p>";
			header("Location: login.php?err=$err");
			die();
		} 
	}
	//declare the variables 
	extract($_POST);
	//declare the massage
	$msg = "";

	if (isset($answer)) {
		//check the operator and calculate the result;
		if ($operation == 0) {
			$result = $first_num + $second_num;
		} else if ($operation == 1) {
			$result = $first_num - $second_num;
		}	
		//check the answer if it is right
		if ($answer == $result) {
			$msg = "<p class='text-success'>the answer is correct</p>";
			$_SESSION["count"]++;
			$_SESSION["correct"]++;
		} else {
			$msg = "<p class='text-danger'>the answer is wrong</p>";
			$_SESSION["count"]++;
		}


	}
	$first_num = Rand(0,20);
	$second_num = Rand(0,20);
	$operation = Rand(0,1);
	
 ?>
<html>
	<head>
		<title>Math Game</title>
		<link rel="stylesheet" href="style/bootstrap.min.css" >
		<meta charset="utf-8" />
	</head>

	<body class="container content">
		<div class="row" style="text-align:right;">
			<a class="col-xs-12 btn btn-danger" href="login.php">log out</a>
		</div>
		<div class="row" style="text-align: center;">
		<h1>Math Game</h1>
		</div>
		<div class="row" style="text-align: center;">
			<div class="col-xs-4 first_num" name="first_num"><?php 
				echo $first_num;
			?></div>
			<div class="col-xs-4 operation" name="operation"><?php 
			if ($operation == 0) {
				echo "<p>+</p>";
			} else {
				echo "<p>-</p>";
			}
			 ?>
			 </div>
			<div class="col-xs-4 second_num" name="second_num"><?php
				echo $second_num;
			?></div>
		</div>
		<form method="post" action="index.php" style="text-align: center;">
			<!--hidden field to store numbers and count -->
			<input type="hidden" name="first_num" value="<?php echo $first_num ?>"> 
			<input type="hidden" name="second_num" value="<?php echo $second_num ?>"> 
			<input type="hidden" name="operation" value="<?php echo $operation?>">
			<!-- answer box -->
			<input type="text" name="answer" placeholder="answer here" >
			<br/>
			<br/>
			<input type="submit" class="btn btn-primary" value="submit">
 		</form>
			<hr/>
			<div style="text-align: center;">
				<?php echo $msg?>
			</div">
<!-- 			<p>result: <?php echo $result;?></p>
			<p>first number from hidden fiedl: <?php echo $first_num;?></p>
			<p>second number from hiddden field: <?php echo $second_num;?></p>
			<p>isset: <?php echo isset($answer);?></p>
			<p>answer: <?php echo $answer;?></p>
			<p>operation: <?php echo $operation;?></p>	
 -->		<div  style="text-align: center;">		
			<p><?php 
			echo "score ". $_SESSION["correct"] . "/" . $_SESSION["count"];?></p>
			</div>
		<div>
	</body>
</html>