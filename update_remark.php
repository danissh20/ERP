<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	if (isset($_POST['remark'])){
	
	if( $connect=mysqli_connect('localhost','root', '' ,'erp') ){
		
	$remark = $_POST['remark'];	
	$var_id	= $_POST['id'];
		
		echo $var_id;
		
	$sql_update_status = "UPDATE employee
	SET feedback = '$remark' 
	WHERE id='$var_id' ";
	if( $connect->query($sql_update_status) )
	{
		echo '<script>
		alert("Remark Successful!");
		</script>';
		header("Refresh:1; url=man_dash.php");
	
	}
	else{
		echo '<script>
		alert("Error in Remark!");
		</script>';
		header("Refresh:1 ; url=man_dash.php");
	}
	}
	else{
		echo "Error";
		}
	
	}//connect if
	
	
} //POST

?>