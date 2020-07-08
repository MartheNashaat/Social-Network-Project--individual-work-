<?php
session_start();
$user=$_GET['link'];
$email= $_SESSION["email"];
if (!isset($_SESSION["loggedin"])){
	header("Location: login.php");
}
//Create a Connection
$link = mysqli_connect("localhost", "root", "");
$link -> select_db("login");



	if(isset($_GET['value'])) 
		{ //delete request from database
				$statusChange="DELETE FROM friendrequests WHERE userid='$user' AND friendid='$email'";
  			    mysqli_query($link, $statusChange) ;
  			    header("refresh:0.1; url=retrieverequest.php?value=1" );			
	    }
?>	