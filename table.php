<?php
	// table.php
	
	//getting our config
	require_once("../../../config.php");
	
	//create connection
	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_kriluh");
	
	//SQL sentence
	$stmt = $mysql->prepare("SELECT id, time, name, comment, mood, created FROM messages_sample ORDER BY created DESC LIMIT 10");
	
	//if error in sentence
	echo $mysql->error;
	
	//variables for data for each row we will get
	$stmt->bind_result($id, $time, $name, $comment, $mood, $created);
	
	//query
	$stmt->execute();
	
	$table_html = "";
	
	//add smth to string .=
	$table_html .= "<table>";
		$table_html .= "<tr>";
			$table_html .= "<th>ID</th>";
			$table_html .= "<th>Time</th>";
			$table_html .= "<th>Name</th>";
			$table_html .= "<th>Comment</th>";
			$table_html .= "<th>Mood</th>";
			$table_html .= "<th>Created</th>";
		$table_html .= "</tr>";
	
	// GET RESULT 
	//we have multiple rows
	while($stmt->fetch()){
		
		//DO SOMETHING FOR EACH ROW
		//echo $id." ".$message."<br>";
		$table_html .= "<tr>"; //start new row
			$table_html .= "<td>".$id."</td>"; //add columns
			$table_html .= "<td>".$time."</td>";
			$table_html .= "<td>".$name."</td>";
			$table_html .= "<td>".$comment."</td>";
			$table_html .= "<td>".$mood."</td>";
			$table_html .= "<td>".$created."</td>";
		$table_html .= "</tr>"; //end row
	}
	$table_html .= "</table>";
	echo $table_html;
	
	
	
?>
<a href="app.php">app</a>