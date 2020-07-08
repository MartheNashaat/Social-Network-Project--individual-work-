<?php
session_start();
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$password =$_POST['pass'];
$confirm_password = $_POST['confirmpass'];
$email =$_POST['email'];
$gender = $_POST['gender'];
$day = $_POST['day'];
$month = $_POST['month'];
$year =$_POST['year'];
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
	if ($result = $link -> query("SELECT DATABASE()")) 
	{
  		$row = $result -> fetch_row();
		//echo "Default database is " . $row[0];
		//$result -> close();
	} 


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	
// empty inputs
//first name 
	if (empty(trim($fname))){
		array_push($errors, "First name required!!");
		$fname= "Enter first name";
	}
	else
		 $fname = trim($fname);
//last name
	if (empty(trim($lname))){
		array_push($errors, "Last name required!!");
		$lname= "Enter last name";
	}
	else 
		 $lname = trim($lname);
//password	
	if (empty(trim($password))){
		array_push($errors, "Password required!!");
		$password= "Enter password";
	}
	else
		$password = trim($password);
// Validate confirm password
	if (empty(trim($confirm_password)))
	{
		array_push($errors, "Confirm Password!!");
		$password= "Confirm password";
	}
	else{
			$confirm_password = trim($confirm_password);

			if ($password != $confirm_password)
			{				
				array_push($errors, "Passwords do not match!");
			}
			//else 
			//	  	echo "Passwords match.";
				
		}

//email
		
	if (empty(trim($email))){
		$email= "Enter email";
	}
	else{
		$email = trim($email);
		
	}
//gender
	
	if (!isset ($gender))
	{
		array_push($errors, "No gender!!");
	}
	else 
	{
		$selected= $gender;
	}
	if (!isset($day) )
	{
		array_push($errors, "No day selected!!");	
	}
	else 
	{
		$selected_day = $day;  // Storing Selected Value In Variable
	}
	if (!isset($month))
	{
		array_push($errors, "No month selected!!");
	}
	else
	{
		$selected_month = $month; 
	}
	if (!isset($year) )
	{
		array_push($errors, "No year selected!!");
	}
	else
	{	
		$selected_year = $year;  // Storing Selected Value In Variable
	}

	
if (count($errors) == 0)
	{
		$result ="INSERT INTO users (fname, lname, password, email, gender, day, month, year) VAlUES ('$fname','$lname','$password','$email', '$selected','$selected_day','$selected_month' ,'$selected_year') ";
		$query = $link ->query( "SELECT * FROM users WHERE email = '$_POST[email]");
		
		 mysqli_query($link, $result);
		
		header("location: homepage.php",  true,  301 );  exit;
	
	}
	else if (count ($errors) != 0)
	{
		header("location: signup.php",  true,  301 );  exit;
  		
	}
	
	
}


?>
