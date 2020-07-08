  <?php
include ("Navbar.html");
session_start();
$count=$_SESSION['requests'];
$myemail=$_SESSION['email'];
$link = mysqli_connect("localhost", "root", "");
$link -> select_db("login");
if (!isset($_SESSION["loggedin"])){
	header("Location: login.php");
}
$sql = "SELECT *FROM users";
$result = $link->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
	<style>
		body{
			background-image:url(images/Pink2.png);
			background-size: 1550px 800px;
			padding: 0px;
			margin:  0px;
		}
	
		#userslist{
			position: fixed;
			margin-top: 35px;
			font-size:400%;
			color:black;
			font-family: 'Edwardian Script ITC';
			font-weight: bold;
			margin-left: 620px;
		}
		#users a{
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
		.search-box{
    		 padding:10px;
		}
   
 	   #btn{
     	    margin-left: 230px; 
            margin-top:-10px;
	    }
	    #retrievebtn{
		position:fixed; 
		margin-top :-18px;
		margin-left: 1250px; 
		border:none; 
		
	}
	#count{
			color:white;
			font-family: 'MV Boli';
			position: fixed;
			margin-top: -22px;
			margin-left: 1305px;
			font-weight: bold;
		}
	</style>
	<title>Users List</title>
</head>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<body> 

<header>
	<label id="count">
		<?php echo $_SESSION['requests']; ?>
	</label>
 	<label id="userslist" >Users List</label>
	<label id="users" >
		
		<?php
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
			$fname=$row["fname"];
			$lname=$row["lname"];
			$email=$row["email"];
		
	 		 echo "<a href=\"userprofile.php?link=$email\">$fname</a>"; 
	 		 echo "<br><br><br>";
			}  
		}
		?>
		
	
	</label>
</header>
</body>
</html>
