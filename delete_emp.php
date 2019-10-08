<?php
	if( isset($_POST['emp_id']) ){
	require 'db_connection.php';
	$sql_del = "DELETE FROM employee WHERE id = ".$_POST['emp_id']."";
		if( $connect->query($sql_del) )
	{
		echo '<script>
		alert("Employee Removed");
		</script>';
		header("Refresh:1; url=admin_dash.php");
	}
	else{
		echo $connect->error;
	}
	
	echo "Redirecting";
	}
	else{
?>
<form name="action" action="delete_emp.php" method="post">
  <input hidden type="number" name="emp_id" id="emp_id" value="<?php echo $row['id'] ?>"/>
  <button>Delete</button>
</form>
<?php		
	}
?>