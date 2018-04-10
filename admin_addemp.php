<?php
	$db = new mysqli("localhost","root","","erp");
	if($db->connect_errno)
	{	die("Database Connection failed"); }

	$fullname= $_POST['name'];
	$branch  =  $_POST['branch'];
	
	echo $fullname;
	
	$sql_add = "INSERT into employee(e_name, e_department) VALUES('$fullname', '$branch')";
	if( $db->query($sql_add) )
	{
		echo '<script>
		alert("Added Employee!");
		</script>';
		header("Refresh:1; url=admin_dash.php");
	}
	else{
		echo $db->error;
	}
	
?>