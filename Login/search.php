<?php
session_start();
include ("Navbar.html");
$count=$_SESSION['requests'];

	$link = mysqli_connect("localhost", "root", "");
	$link -> select_db("login");
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
		.search-box{
			padding:12px;

		}
		#searchres{
			position: fixed;
			margin-top: 50px;
			font-size:400%;
			color:black;
			font-family: 'Edwardian Script ITC';
			font-weight: bold;
			margin-left: 590px;
		}
		#search a{
			font-size:140%;
			color:black;
			font-family: 'MV Boli';
			margin-left: 700px;
			margin-top: 110px;
			text-align: center;
	 		line-height: 2.7;
  			display: inline-block;
  			vertical-align: bottom;
		}
		#btn{
			 margin-left: 230px; 
  			 margin-top:-10px;

		}
		#count{
			color:white;
			font-family: 'MV Boli';
			position: fixed;
			margin-top: -40px;
			margin-left: 495px;
			font-weight: bold;
		}
	</style>
	<title>Search</title>
</head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<body>
	<label id = "searchres">Search Results </label>
	
	<label id ="search">
	
<?php
if (isset($_POST['search']))
{ 
	if (empty($_POST['search']) ){
		header("Location:profile.php");
		echo "no res";
	}
	else{
	$search=$_POST['search'];

	$sql = "SELECT * FROM users WHERE CONCAT(fname, ' ', lname, ' ', email, ' ', phonenumber,' ',hometown) LIKE '%$search%'" ;
	$result = $link->query($sql); 
		if ($result->num_rows == 0)
		{
	 //	echo "no resultss";
	 	}
		else {
	 		while ($row = $result ->fetch_assoc())
	 		{
	 		
          	  $fname=$row["fname"];
	 		  $lname=$row["lname"];
	 		  $email=$row["email"];
	 		  echo "<br>";
	 		  echo "<a href=\"userprofile.php?link=$email\">$fname</a>";
			}

	  	}
	}
}
?>

</label>
<label>
	<label id="count">
		<?php echo $count; ?>
	</label>
</label>
</body>
</html>