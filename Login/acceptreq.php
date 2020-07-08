<?php
session_start();

$user=$_GET["link"]; 
$email= $_SESSION["email"]; //logged in email
$FriendsArray=$_SESSION['friends'];

if (!isset($_SESSION["loggedin"])){
	header("Location: login.php");
}
//Create a Connection
$link = mysqli_connect("localhost", "root", "");
$link -> select_db("login");



	if(isset($_GET['value'])) 
		{
			//delete this request and add this user to the friends table
			$sql1="DELETE FROM friendrequests WHERE userid='$user'  AND friendid='$email'";
			mysqli_query($link, $sql1);
			$sql2="INSERT INTO friends (userid, friendid) VALUES ('$user', '$email')";
			mysqli_query($link, $sql2) ;
			array_push($FriendsArray, $user);
			
				$sql="SELECT* FROM friends WHERE userid='$user'  AND friendid='$email' ";
				$result = $link->query($sql); 
				header("refresh:0.1; url=retrieverequest.php?value=1" );				
	    }
?>	