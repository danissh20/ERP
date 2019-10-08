<!DOCTYPE HTML>
<html>
	<head> 
		<title> Administrator Panel </title>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="styletable.css">
	</head>
	
	<body>
	<h1 style='width:100%; text-align:center; font-variant:small-caps;'>Admin Panel</h1>
	<ul>
	<li> <a href='admin_addemp.html'> Add New Employee </a>
	</ul>
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
	}

//database connection
    require 'db_connection.php';


$sql_display = "SELECT id, e_name, e_department, feedback
FROM employee LIMIT $start, $size";
$result = $connect->query($sql_display);

if ($result->num_rows > 0) {
	
	echo "<table class='table-top' border='1' width='100%' > 
	<tr> <th>Name</th> <th>Department</th> <th>Feedback</th> <th>Action</th> </tr>";
	
     while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row['e_name'] ;
		echo "</td><td>";
			echo $row['e_department'];
		echo "</td><td>";
			echo $row['feedback'];
		echo "</td><td>";
		include 'delete_emp.php';
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

	echo "<br/><ul style='background-color:transparent'>";
	for ($i=0; $i <= $pages; $i++){
		$j = $i+1;
	echo "<li> <a href='admin_dash.php?page=".$i."' style='color:black'> ".$j."</a>";
	}
	
	$connect->close();
	
?>
