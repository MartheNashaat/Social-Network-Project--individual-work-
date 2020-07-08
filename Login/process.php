<?php
session_start();
$email = $_POST['email'];
$password = $_POST['pass'];
$count=$_SESSION['requests'];
$data=$_SESSION['friends'];
$loggedin=false;
$errors = array();

// Create connection
$link = mysqli_connect("localhost", "root", "");
$link -> select_db("login");

// Check connection
	if ($link->connect_error)
	{
   		 die("Connection failed: " . $link->connect_error);
	}
	else 
		echo "Connected successfully <br>";
//check name of database
	if ($result = $link -> query("SELECT DATABASE()")) 
	{
  		$row = $result -> fetch_row();
		echo "Default database is " . $row[0];
		//$result -> close();
	} 
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
// check whether the email and password are found in the database
		$query = $link ->query( "SELECT * FROM users WHERE email = '$_POST[email]' AND password = '$_POST[pass]'");
			if (empty(trim($email)) )
	{
		array_push($errors, "Username required!!");
		$email= "Enter email";
	}
	else
	  $email = trim($email);

	if (empty(trim($password)) )
	{
		array_push($errors, "Password required!!");
		echo "<br>no password";
		$password= "Enter password";
	}
	else
		 $password = trim($password);

	if (count($errors) == 0)
	{
		$res = $link ->query( "SELECT * FROM users WHERE email = '$_POST[email]' AND password = '$_POST[pass]'");
		$_SESSION['firstname']=$res;
		$_SESSION['email'] =$email;
		$_SESSION['login'] = true;
	
	}
	else if (count ($errors) != 0)
	{
		$message = "Please enter email";
  		echo "<script type='text/javascript'> alert('$message');  </script>" ;
	}

	if(!$query->num_rows)
	{	$loggedin=false;
		header("Location: login.php");
    }
 	else 
   	{	
   	echo "<br> Welcomee";
   	$loggedin=true;
   	$_SESSION["loggedin"]=$loggedin;
 
   	header("Location: profile.php ");
	}


 }
?>
