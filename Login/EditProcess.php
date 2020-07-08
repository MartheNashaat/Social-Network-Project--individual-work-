<?php
session_start();
//edit profile info
$user= $_SESSION['email'];
$link = mysqli_connect("localhost", "root", "");
$link -> select_db("login");
$fname= $_POST['firstname'];
$lname= $_POST['lastname'];
$email=$_POST['email'];
$phonenumber=$_POST['phonenumber'];
$hometown=$_POST['home'];
$country=$_POST['country'];
$password=$_POST['pass'];
$confirmpassword=$_POST['confirmpass']; 
$gender=$_POST['gender'];
$marital=$_POST['marital'];
$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];
if ($_SERVER["REQUEST_METHOD"] == "POST")
{ 
	// if empty don't update
	if (!empty($fname)){
		$result ="UPDATE users SET fname='$fname' WHERE email='$user'";
		mysqli_query($link, $result) ;	
	}
	if (!empty($lname))
	{
		$result ="UPDATE users SET lname='$lname' WHERE email='$user'";
		mysqli_query($link, $result) ;	
	}
	if (!empty($password) && !empty($confirmpassword))
	{
		if ($password== $confirmpassword)
			{	$result ="UPDATE users SET password='$password' WHERE email='$user'";
				mysqli_query($link, $result) ;	
			}
		else echo "passwords don't match";	
	}
	if (!empty($hometown))
	{
		$result ="UPDATE users SET hometown='$hometown' WHERE email='$user'";
		mysqli_query($link, $result) ;	
	}
	if (!empty($phonenumber))
	{
		$result ="UPDATE users SET phonenumber='$phonenumber' WHERE email='$user'";
		mysqli_query($link, $result) ;	
	}
	if (!empty($country))
	{
		$result ="UPDATE users SET country='$country' WHERE email='$user'";
		mysqli_query($link, $result) ;	
	}
	if (!empty($gender))
	{
		$result ="UPDATE users SET gender='$gender' WHERE email='$user'";
		mysqli_query($link, $result) ;	
	}
	if (!empty($marital))
	{
		$result ="UPDATE users SET marital='$marital' WHERE email='$user'";
		mysqli_query($link, $result) ;	
	}
	if (!empty($day))
	{
		$result ="UPDATE users SET day='$day' WHERE email='$user'";
		mysqli_query($link, $result) ;	
	}
	if (!empty($month))
	{
		$result ="UPDATE users SET month='$month' WHERE email='$user'";
		mysqli_query($link, $result) ;	
	}
	if (!empty($year))
	{
		$result ="UPDATE users SET year='$year' WHERE email='$user'";
		mysqli_query($link, $result) ;	
	}

	header("location: profile.php",  true,  301 );  exit;
}
?>