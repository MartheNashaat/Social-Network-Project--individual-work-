<?php
session_start();
if (!isset($_SESSION["loggedin"])){
	header("Location: login.php");
}
//Create a Connection
$link = mysqli_connect("localhost", "root", "");
$link -> select_db("login");

$user=$_SESSION['user'];
$email= $_SESSION["email"];
$FriendsArray=$_SESSION['friends'];
	
	if(isset($_GET['value'])) 
		{
			$sql= "SELECT*FROM friendrequests WHERE userid='$user'  AND friendid= '$email' ";
			$sql1="SELECT*FROM friendrequests WHERE userid='$email'  AND friendid='$user' ";

			$query = $link ->query($sql);
			$query1 = $link ->query($sql1);
			

if (in_array($user, $FriendsArray))
  {
 	//echo "You are already friends";
  }
else
  { //if the request is not found in the database , send the request..
  	if (!$query->num_rows){
			if(!$query1->num_rows)
			{	$add= "INSERT INTO friendrequests (userid,  friendid) VALUES ('$email','$user') ";
				mysqli_query($link, $add);
					
				
			}
		}
 
  }
  	header("refresh:0.1; url=userprofile.php?link=$user" );
}
	
?>	

