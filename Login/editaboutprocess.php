<?php
session_start();
//edit about page 
$user = $_SESSION['email'];
$about=$_POST['about'];
$link = mysqli_connect("localhost", "root", "");
$link -> select_db("login");
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$sql = "SELECT  * FROM users WHERE email = '$user' ";
	$result = $link->query($sql);
   if (!empty($about))
	{
		$result ="UPDATE users SET about='$about' WHERE email='$user'";
		mysqli_query($link, $result) ;	
	}
	header("location: profile.php",  true,  301 );  exit;
}
?>