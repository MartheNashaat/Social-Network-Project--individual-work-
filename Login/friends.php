<?php
include 'Navbar.html';
session_start();

$user=$_GET["link"];
$email= $_SESSION["email"];
$count=$_SESSION['requests'];
$data = array(); //friends array

if (!isset($_SESSION["loggedin"])){
	header("Location: login.php");
}

//Create a Connection
$link = mysqli_connect("localhost", "root", "");
$link -> select_db("login");


	if(isset($_GET['value'])) 
		{
				$sql="SELECT* FROM friends WHERE userid='$email' OR friendid='$email' ";
				$result = $link->query($sql); 					
	    }
?>	
<!DOCTYPE html>
<html>
<head>
	<style>
		body{
			background-image:url(images/Pink2.png);
			background-size: 1550px 800px;
			background-repeat: no-repeat;
 			background-attachment: fixed;
			padding: 0px;
			margin: 0px;
		}
		#reqLabel{
			position: fixed;
			margin-top: 15px;
			font-size:400%;
			color:black;
			font-family: 'Edwardian Script ITC';
			font-weight: bold;
			margin-left: 680px;
		}
		#friendreq a{
			position: fixed;
			margin-top:100px;
			font-size:140%;
			color:black;
			font-family: 'MV Boli';
			margin-left: 680px;
			text-align: center;
	 		line-height: 2.7;
  			display: inline-block;
  			vertical-align: bottom;

		}
		 #count{
      		color:white;
     		font-family: 'MV Boli';
     		position: fixed;
     		margin-top: -58px;
     		margin-left: 1305px;
      		font-weight: bold;
    }
	</style>
	<title>Friends</title>
</head>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<body>
	<header>
      <label id="count">
        <?php echo $count; ?>
     </label>

    </header>
	<label id ="reqLabel"> Friends</label>
	<label id= "friendreq">
		<?php 
			
		  if ($result->num_rows > 0) 
			{
					 while($row = $result->fetch_assoc()) 
					 {
					 	$userid= $row["userid"];
					 	$friendid= $row["friendid"];

					    if ($userid== $email)
					    {
					   		echo "<a href=\"userprofile.php?link=$friendid\">$friendid </a>"; 
					   		array_push($data, $row["friendid"]);
	 						echo "<br> <br> <br>"; 
	 					}
	 					if ($friendid==$email)
	 					{
	 						echo "<a href=\"userprofile.php?link=$userid\">$userid </a>";
	 						array_push($data, $row["userid"]); 
	 						echo "<br> <br> <br>";
	 					}

					 	
					 }
			}
				 array_push($data, $email); 

				$_SESSION['friends']=$data;

		?>
	</label>

</body>
</html>
