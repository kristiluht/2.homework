<?php require_once("header.php"); ?>


	<?php
	//require another php file
	//../../ means go to folders back
	require_once("../../../config.php");
	
	
	//******************************
	//******** SAVE TO DB **********
	//******************************
		
		
		//connection with username and password
		//access username from config
		//echo $db_username;
		
		//1 server name
		//2 username
		//3 password
		//4 database
		
		
	
	//*****************
	//TO validation
	//*****************
	if(isset($_GET["day"])){
		
		//only if there is message in the URL
		//echo "there is message";
		
		//if its empty
		if(empty($_GET["day"])){
			//it is empty
			echo "Please enter the date!";
		}else{
			//its not empty
			echo "🏃: ".$_GET["day"]."<br>";
		}
		
	}
	
	//check if there is variable in the URL
	if(isset($_GET["name"])){
		
		//only if there is message in the URL
		//echo "there is message";
		
		//if its empty
		if(empty($_GET["name"])){
			//it is empty
			echo "Please enter your name!";
		}else{
			//its not empty
			echo "Person: ".$_GET["name"]."<br>";
		}
		
	}
	
	
	
	if(isset($_GET["comment"])){
		
		//only if there is message in the URL
		//echo "there is message";
		
		//if its empty
		if(empty($_GET["comment"])){
			//it is empty
			echo "Please enter the message!";
		}else{
			//its not empty
			echo "📓: ".$_GET["comment"]."<br>";
		}
		
	}
	
	if(isset($_GET["mood"])){
		

			echo "Mood: ".$_GET["mood"]."<br>";

		}
	
	
	//Getting the message from the address
	//if there is $name= .. then $_GET ["name"]
	//$my_message = $_GET ["message"];
	//$to = $_GET ["to"];
	//$urgency = $_GET ["urgency"];
	//echo "My message is " .$my_message. " and it is to " .$to;
	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_kriluh");
	
		$stmt = $mysql->prepare("INSERT INTO messages_sample (time, name, comment, mood)VALUES (?, ?, ?, ?)");
		
		//We are replacing question marks with values
		//s - string, date or smth that is based on characters and numbers
		//i - integer, number
		//d - decimal, float
		
		//for each question mark its type with one letter
		$stmt->bind_param("ssss", $_GET["day"], $_GET["name"], $_GET["comment"], $_GET["mood"]);
		
		//echo error
		echo $mysql->error;
		
		//save
		if ($stmt->execute()){
			echo "saved successfully";
		}else{
			echo $stmt->error;
		}
	


?>


	<link href="css/stylecss" rel="stylesheet">


<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">Mood Generator</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		
		  <ul class="nav navbar-nav">
			
			<li class="active">
				<a href="app_b.php">
					Generator
				</a>
			</li>
			
			
			<li>
				<a href="table_b.php">
					Mood Base
				</a>
			</li>
			
		  </ul> 
		  
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">

		<h1> GENERATE YOUR MOOD </h1>
		
	<form>
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="form-group">
					<label for="time">Time: </label>
					 <input type="date" name="day" max="date("Y/m/d")"><br>
				</div>
			</div>
		</div>
		
		<div class="row">
		<div class="col-md-3 col-sm-6">
				<div class="form-group">
					<label for="name">Name: </label>
					<input name="name" id="name" type="text" class="form-control">
				</div>
			</div>
		
		</div>
		
		<div class="row">
		<div class="col-md-3 col-sm-6">
				<div class="form-group">
					<label for="commment">Comment: </label>
					<input name="comment" id="comment" type="text" class="form-control">
				</div>
			</div>
		
		</div>
		
		<div class="row">
		<div class="col-md-3 col-sm-6">
				<div class="form-group">
					<label for="punishment">Mood: </label>
					<input type="radio" name="mood" value="angry">Red
					<input type="radio" name="mood" value="ok">Green
					<input type="radio" name="mood" value="sad">Blue
					<input type="radio" name="mood" value="happy">Yellow<br>
				</div>
			</div>
		
		</div>
		
		<div class="row">
			<div class="col-md-3 col-sm-6">
			<input class="btn btn-success hidden-xs btn-md-3" type="submit" value="Submit">
			<input class="btn btn-success visible-xs-inline btn-block" type="submit" value="Submit">
		</div>
		
		

  
	</div>
  
  </body>