<!DOCTYPE HTML>
<html>
	<head> 
		<title> Employee </title>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" type="text/css" href="indadmstu.css">
	</head>
	
	<body>
	<h1 style='width:100%; text-align:center; font-variant:small-caps;'>Employee</h1>
	</body>
	
</html>

<?php

/*//$ipaddress = $_SERVER['REMOTE_ADDR']; //ip address*/

//database connection
    require 'db_connection.php';


$user = $_POST['user'];
$pass = $_POST['pass'];

if(isset($_POST['passchange']) ){
$newpass = $_POST['passchange'];
$changepass = "UPDATE employee SET e_password = '$newpass' WHERE e_name='$user' LIMIT 1";
$connect->query($changepass);
echo "Password Changed, Login Again";
}

$q = $connect->prepare("SELECT id, e_name, e_password, warn, feedback FROM employee WHERE e_name=?") OR die('query preparation failed');
	$q->bind_param('s',$user);
	$q->execute();
	$q->bind_result($id,$dbuser,$dbpass,$warn,$feedback);
	$q->fetch();
	
	if($dbuser == $user && $dbpass == $pass)
	{
		$_SESSION['user'] = $dbuser;
		
		echo "
		<fieldset>
		<ul class='form-style-1'>
		<li><strong>Name:</strong> ".$user."</li>
		";
		echo "<li><strong>Password: </strong>".$pass."</li>";
		
		echo '
		<form name="update" action="emp_dash.php" method="POST" >
			<li><input type="text" name="passchange" placeholder="New Password"> </input>
			<input type="hidden" name="user" value="'.$user.'"></input>
			<input type="hidden" name="pass" value="'.$pass.'"></input>
			<input type = "submit" value="Change Password"></li>
		</form>';
		
		echo "<li><strong>Warning: </strong>";
		if($warn==1) echo "You are Warned";
		else echo "No Warning </li>";
		
		echo "<li><strong>Feedback: </strong>";
			echo $feedback;
		echo "</li>";
	   
	}//login
	else
	{
	echo "<script> alert('Incorrect Login Credentials'); </script> </h2>";
	header("Refresh:1; url=emp_login.html");
	}
$q->free_result();
$q->close();
$connect->close();
?>