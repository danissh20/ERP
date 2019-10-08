<?php
	
//database connection
    require 'db_connection.php';

	$fullname= $_POST['name'];
	$branch  =  $_POST['branch'];
	
	echo $fullname;
	
	$sql_add = "INSERT into employee(e_name, e_department) VALUES('$fullname', '$branch')";
	if( $connect->query($sql_add) )
	{
		echo '<script>
		alert("Added Employee!");
		</script>';
		header("Refresh:1; url=admin_dash.php");
	}
	else{
		echo $connect->error;
	}
	
?>