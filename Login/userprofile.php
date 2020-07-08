<?php
include ("Navbar.html");
session_start();
$user=$_GET["link"];
$email= $_SESSION["email"];
$count=$_SESSION['requests'];
$public="true";
$private="false";
$_SESSION['user'] =$user;
$FriendsArray=$_SESSION['friends'];
if (!isset($_SESSION["loggedin"])) 
  header("Location: login.php");// if not logged in -> go to login page


//if the user searched for their account , redirect to my profile 
if ( $email && $user == $email ){
     echo "<script>window.location.href='profile.php';</script>";
    exit;
}
if ( in_array($user, $FriendsArray)) // redirect to friend's profile
{
     echo "<script>window.location.href='redirectFriends.php?link=$user';</script>";
    exit;
}


		$link = mysqli_connect("localhost", "root", "");
		$link -> select_db("login");
		$sql = "SELECT  * FROM users WHERE email = '$user' ";
		$result = $link->query($sql); 					
		if ($result->num_rows > 0) 
			{
				 while($row = $result->fetch_assoc()) 
				 {
  						  $fname=$row["fname"];
  						  $lname=$row["lname"];
  						  $email=$row["email"] ;
  						  $phonenumber=$row["phonenumber"];
  						  $hometown=$row["hometown"];
  						  $country=$row["country"];
  						  $gender=$row["gender"] ;
  						  $marital= $row["marital"] ;
                $pic=$row["profilepic"];
  						
  				 }
			} 
			else echo "0 rows foundddddd";
  

?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Profile</title>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
* {
  box-sizing: border-box;
}

    body {
    	background-image:url(images/Pink2.png);
      background-size: 1550px 800px;
      background-repeat: no-repeat;
      background-attachment: fixed;
      padding: 0px;
      margin: 0px;
    }
/* Create two boxes that are next to each other */
section {
  float: left;
  width: 250px;
  height: 300px;
  background: #ccc;
  padding: 20px;
}


/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}


article {
  margin-left: 235px;
  margin-top: -559px;
  float: left;
  box-sizing: border-box;
  width: 1250px;
  height: 300px;
  padding: 80px;  
  border: 10px solid #e3b6b3;
}

/* Clear floats after the columns */
section:after {
  content: "";
  display: table;
  clear: both;
}
.input-container {
  display: -ms-flexbox; 
  display: flex;
  width: 500px;
  margin-bottom: 5px;
}

.icon {
  padding: 7px;
  color: black;
  min-width: 10px;
  text-align: center;
  
}

  #count{
      color:white;
      font-family: 'MV Boli';
      position: fixed;
      margin-top: -22px;
      margin-left: 1305px;
      font-weight: bold;
    }
/* makes the two boxes  on top of each other instead of next to each other */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}

	</style>
	</head>
	<body>
    <header>
      <label id="count">
        <?php echo $_SESSION['requests']; ?>
     </label>

    </header>

<!-- profile section -->
<div  style ="float: left; position: fixed; width: 250px; height: 300px;box-sizing: border-box; border: 10px solid #e3b6b3; padding: 20px;margin-top: 50px; margin-left: 9px; ">
   <ul>
    	
    
  <form action="request.php" method="POST"> 
      <a href= "request.php?value=1"  >        
        <img src="images/addFriend1.png" width=50px;  height="50px;" id="friends" alt= "friends"  style="position:fixed; margin-top :180px;margin-left: 110px; border:none; filter: invert(); " ></a>

         <label>
        <?php
        if ($pic==NULL)
        {
          if ($gender =='male')
          {
             echo '<img src="images/profileman2.png" width="140 " height="140" style="position:fixed; margin-top :30px;margin-left: -15px; border:none; ">';

          }
          else if ($gender=='female')
          {
            echo '<img src="images/profilewoman2.png" width="140 " height="140" style="position:fixed; margin-top :30px;margin-left: -15px; border:none; ">';
          }
        }
        else {
            echo '<img src="images/' . $pic . '" width="140 " height="140" style="position:fixed; margin-top :10px;margin-left: -15px; border:none; ">'; 
          }
        ?>
      </label>
    
    
     </form>
  </ul>
  </div>
   <!-- section el profile info -->
  <div style =" float: left; position: fixed; width: 250px; height: 300px; box-sizing: border-box; padding: 20px; border: 10px solid #e3b6b3; margin-top: 360px;margin-left: 9px;font-family: 'MV Boli';">
  	
			<div style="margin-top:17px;font-family: 'MV Boli';">
	       	<div class="input-container">
    				<i class="fa fa-user icon"></i>
    				 <label >
    				 	<?php  echo "".$fname ." " . $lname; ?>
    				 </label>
				</div>
				<div class="input-container"  > 
				    <i class="fa fa-envelope icon "></i>
				    <label>
				    	<?php  echo "".$email; ?>
				    </label>
				  
				</div>
				<div class="input-container"  > 
				    <i class="fa fa-phone icon "></i>
				    <label>
				    	<?php  echo "".$phonenumber; ?>
				    </label>
				</div>
				<div class="input-container"  > 
				    <i class="fa fa-home icon "></i>
				    <label>
				    	<?php 
              if ($hometown || $country != null)
               echo "".$hometown." , " .$country ;
             else echo "";

               ?>
				    </label>
				</div>
				<div class="input-container" style="margin-left: 9px;" >
				    <i class="fas fa-venus-mars " style="margin-top: 5px;"></i>
				    <label style="margin-left: 5px;">
				    	<?php  echo "  ".$gender; ?>
				    </label>
				</div>
				<div class="input-container"  style="margin-left: 7.5px; padding: 2px; ">
				    <i class="fas fa-heart" style="margin-top:3px;" ></i>
				    <label style="margin-left: 5px; margin-top:-3px; ">
				    	<?php  echo "".$marital; ?>
				    </label>
				</div>
      </div>
  </div>
  

<div>
  <br> <br> <br>
  <label >   
    <?php
    $query= "SELECT * FROM posts WHERE poster ='$user' AND public='public' ORDER BY postdate DESC";
$res=$link->query($query);

 if ($res)
  {
        while ($roww = $res -> fetch_row() ){
            echo "<div  style=' width: 750px; height: 610px; padding: 120px;  
                border: 4px solid black; margin-left:450px;'>";
               echo   "<div align='center' style='font-family:MV Boli; '>  ";

                     echo "<div style='font-size:65%;'>";
                        echo $roww[5];
                     echo "</div>";
                     echo "<div style='color:#563E49;'>";
                        echo "Posted by: " .$roww[4].""; //posted by
                     echo "</div>";
                     echo $roww[1] ."<br>"; 
        
      
                     if ($roww[2]!=NULL){
                       echo '<img src="images/'. $roww[2] . '" style="max-width:200px">';
                       echo "<br><br>";
                     }

                     echo "<div style='font-size:65%;'>";
                        echo $roww[3]."<br>"; //post date
                     echo "</div>";
               echo "</div>";
        echo "</div>";
       echo "<br> <br>";

      }  
   }

?>
    
   </label>
  </div> 

</body>
</html>
