<?php
include 'Navbar.html';
session_start();
if (!isset($_SESSION["loggedin"])){
	header("Location: login.php");
}
//Create a Connection
$link = mysqli_connect("localhost", "root", "");
$link -> select_db("login");

$email= $_SESSION["email"];

	if(isset($_GET['value'])) 
		{
				$sql="SELECT* FROM friendrequests WHERE friendid='$email'";
				$result = $link->query($sql); 

				$count = $result->num_rows;
				$_SESSION['requests']= $count;
        }
	    
?>	
<!DOCTYPE html>
<html>
<head>
	<style>
		body{
			background-image:url(images/Pink2.png);
            background-size: 1550px 800px;
			padding: 0;
			margin: 0;
		}
		#reqLabel{
			position: fixed;
			margin-top: 35px;
			font-size:400%;
			color:black;
			font-family: 'Edwardian Script ITC';
			font-weight: bold;
			margin-left: 580px;
		}
		#friendreq a {
			position: fixed;
			margin-top:100px;
			font-size:140%;
			color:black;
			font-family: 'MV Boli';
			margin-left: 650px;
			text-align: center;
	 		line-height: 2.7;
  			display: inline-block;
  			vertical-align: bottom;

		}
	
		#count{
			color:white;
			font-family: 'MV Boli';
			position: fixed;
			margin-top: -130px;
			margin-bottom: 65px;
			margin-left: 1305px;
			font-weight: bold;
		}

	</style>
	<title>Friend Requests</title>
</head>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<body>
	<label id ="reqLabel"> Friend Requests </label>
	<label id= "friendreq">
		<?php 

		if ($result->num_rows > 0) 
		{
					 while($row = $result->fetch_assoc()) 
					 {
					 	$userid= $row["userid"];
					 	$friendid= $row["friendid"];
					 	echo "<a href=\"userprofile.php?link=$userid\">$userid  </a>";  //those who added this logged in user 
					 
					 	echo " <a href= \"acceptreq.php?value=1&link=$userid\"> 
						 <img src=\"images/accept.png\" width =40px; height=40px;  style=\"position:fixed; margin-top :17px;margin-left: 200px; border:none; \"></a>";
 
 						echo " <a href= \"deletereq.php?value=1&link=$userid\"> 
 						<img src=\"images/delete.png\" width =40px; height=40px;  style=\"position:fixed; margin-top :17px;margin-left: 250px; border:none; \"></a>";
	 				    echo "<br> <br> <br>";

					 }
		}
		?>
	</label>
	<label id="count">
		<?php echo $count; ?>
	</label>

</body>
</html>
