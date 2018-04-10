<!DOCTYPE HTML>
<html>
	<head> 
		<title> Manager Panel </title>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" type="text/css" href="styletable.css">
	</head>
	
	<body>
	<h1 style='width:100%; text-align:center; font-variant:small-caps;'>Manager Panel</h1>
	</body>
</html>

<?php
session_start();
$_SESSION['dashboard']="true";

/*//$ipaddress = $_SERVER['REMOTE_ADDR']; //ip address*/

$size = 10;

if(isset($_GET['page'])){
	$start = $_GET['page']*$size;
	}
else{
	$start=0;
	//$_SESSION['page']=1;
	}

//database connection
$connect=mysqli_connect('localhost','root', '' ,'erp');
if(mysqli_connect_errno($connect))
		echo 'Failed to connect';

$sql_display = "SELECT id, e_name, e_department,e_feedback
FROM employee LIMIT $start, $size";
$result = $connect->query($sql_display);

if ($result->num_rows > 0) {
	
	echo "<table class='table-top' border='1' width='100%' > 
	<tr> <th>Name</th> <th>Department</th> <th>Feedback</th> <th>Generate Feedback</th> <th>Warning</th></tr>";
	
     while($row = $result->fetch_assoc()) {
		 $idd = $row['id'];
        echo "<tr><td>". $row['e_name'] ;
		echo '</td><td>';
			echo $row['e_department'];
		echo '</td><td>';
			echo $row['e_feedback'];
		echo '</td><td>';
			echo "
			<form id='Remarks' method='POST' action='update_remark.php'>
			<input type='text' name='remark' placeholder='Enter Remarks' style='width:90%'/>
			<input type='hidden' name = 'id' value = ".$idd."></input>
			<input type='submit' name='update_remark' value='Remark' style='width:50%;'/>
			</form>";
 
		echo '</td><td>';
			echo '<form action="update.php" method="POST">
			<input type="hidden" name = "id" value = '.$idd .'>
			<input type = "submit" name= "verify_it" value="Warn"><br/>
			<input type = "submit" name= "cancel_verify" value="Cancel Warn">
			</form>';
		echo "</td>";
	 }
}
else{
	echo "<br/>No records";
}

	$sql_query = "SELECT e_name FROM employee";
	$result = $connect->query($sql_query);
	$total_records = $result->num_rows;
	$pages = intval($total_records / $size);

	echo "<br/><ul style='background-color:#FE642E; border-radius:10px;'>";
	for ($i=0; $i <= $pages; $i++){
	echo "<li> <a href='admin_dash.php?page=".$i."'> $i </a>";
	}
	
	$connect->close();
	
?>
