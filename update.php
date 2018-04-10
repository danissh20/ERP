<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //something posted
    
	//checking which button clicked
    if (isset($_POST['verify_it'])) {
	$connect=mysqli_connect('localhost','root', '' ,'erp');

	$var_id = $_POST['id'];
	
	$status_check = "SELECT warn FROM employee WHERE id = '$var_id' LIMIT 1";
	$s_check = $connect->query($status_check);
	$s_value = $row = $s_check->fetch_assoc();
	
	if($s_value['warn'] == "0")
	{
	$sql_update_status = "UPDATE employee SET warn= 1 WHERE id='$var_id' ";
	$connect->query($sql_update_status);
	
	$sql_display = "SELECT id, e_name, warn FROM employee WHERE id='$var_id' LIMIT 1" ;
	$result = $connect->query($sql_display);

	if($row = $result->fetch_assoc()){
	
	echo "<table border='1' width='100%'> <tr> <th>ID</th> <th>Name</th> <th>Status</th>
	</tr>";
	echo "<tbody><tr><td>". $var_id ;
		echo "</td><td>";
			echo $row['e_name'];
		echo "</td><td>";
			if($row['warn']=="1" )
				echo "Issued";
			else
				echo "Not Issued";
		echo "</td></tr></tbody></table>";
	
	header("Location: http://localhost/ERP%20System/man_dash.php");
	}
	}
	else{
		echo "<script>alert('Already Warned')</script>";
		}
	//header("Location: http://localhost/ERP%20System/man_dash.php");
	}
	
	elseif(isset($_POST['cancel_verify'])) {
		$connect=mysqli_connect('localhost','root', '' ,'erp');
		$var_id = $_POST['id'];
		
		$status_check = "SELECT warn FROM student WHERE id = '$var_id' LIMIT 1";
		$s_check = $connect->query($status_check);
	    $s_value = $row = $s_check->fetch_assoc();
	
		if($s_value['warn'] == "1")
		{
		$sql_update_status = "UPDATE employee SET warn = 0 WHERE id='$var_id' ";
		$connect->query($sql_update_status);
		}
		
		//header to redirect previous page
		header("Location: http://localhost/ERP%20System/man_dash.php");
	}
	
}// requested Method call
?>