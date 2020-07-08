<?php
session_start();
$user=$_SESSION['user'];
$email= $_SESSION["email"];
$FriendsArray=$_SESSION['friends'];
if (!isset($_SESSION["loggedin"])){
	header("Location: login.php");
}
//Create a Connection
$link = mysqli_connect("localhost", "root", "");
$link -> select_db("login");


	if(isset($_GET['value'])) 
	{//delete friend from database 
 
			if (in_array($user, $FriendsArray))
  			{
 				 unset($FriendsArray[array_search($user,$FriendsArray)]);
	     	}
 

			$sql= "SELECT*FROM friends WHERE userid='$user'  AND friendid= '$email' ";
			$sql1="SELECT*FROM friends WHERE userid='$email'  AND friendid='$user' ";

			$query = $link ->query($sql);
			$query1 = $link ->query($sql1);
			
			if ($query->num_rows ) 
		    {
					
					 while($row = $query->fetch_assoc()) 
					 { $requester = $row['userid'];
						$sender=$row["friendid"];

						$statusChange="DELETE FROM friends WHERE  userid='$user' AND friendid='$email'";
	 					mysqli_query($link, $statusChange) ;
	 			
	 				}
	 		}
	 		if ($query1->num_rows ) 
			{
					
					 while($row1 = $query1->fetch_assoc()) 
					 { $sender1 = $row1['userid'];
						$requester1=$row1["friendid"];

						$statusChange1="DELETE FROM friends WHERE  userid='$email' AND friendid='$user'";
	 				mysqli_query($link, $statusChange1) ;
	 			
	 				}
	 		}
	 		$_SESSION['friends']=$FriendsArray;
	

	       header("Location: userprofile.php?link=$user" );
	  
	}

?>	