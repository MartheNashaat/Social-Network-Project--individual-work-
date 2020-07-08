<?php 
include('Navbar.html');
session_start();
if (!isset($_SESSION["loggedin"])){
  header("Location: login.php");
}

$count=$_SESSION['requests'];
$user = $_SESSION['email'];


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
  								  $day=$row["day"];
  								  $month=$row["month"];
  								  $year=$row["year"];
  								  $about=$row["about"];
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

   body{
      background-image:url(images/Pink2.png);
      background-size: 1550px 800px;
      background-repeat: no-repeat;
      background-attachment: fixed;
      padding: 0px;
      margin: 0px;
    }
   .search-box{
      padding:14px;

    }
   
    #btn{
       margin-left: 210px; 
         margin-top:-14px;

    }
    #count{
      color:white;
      font-family: 'MV Boli';
      position: fixed;
      margin-top: -22px;
      margin-left: 1305px;
      font-weight: bold;
    }

    #editabout a {
      margin-top: -60px; 
      margin-left:-25px;
      font-family:'MV Boli';
      font-size: 140%;
      color:black;
    }
    #editabout a:hover{
      color:white;
    }
    #edit a{
      color:black;
      float: right; 
      margin-top: -12px; 
      margin-right: 15px; 
      font-family:'MV Boli';
    }
    #edit a:hover{
      color:white;
    }
 
    



/* Create two columns/boxes that floats next to each other */
section {
  float: left;
  width: 250px;
  height: 300px; 
  box-sizing: border-box;
  padding: 20px;  
  border: 10px solid #e3b6b3;
}


/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

article {
	margin-left: 270px;
	margin-top: 50px;
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
  background: none;
  color: black;
  min-width: 10px;
  text-align: center;
  
}
img {
  border-radius: 50%;
}

/*  makes the two boxes on top of each other instead of next to each other */
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
       <?php echo $count; ?>
    </label> 

</header>


<!-- profile section -->
<div  style ="float: left; position: fixed; width: 250px; height: 300px;box-sizing: border-box; border: 10px solid #e3b6b3; padding: 20px;margin-top: 50px; margin-left: 9px; ">
    <ul>

        <!-- Profile picture   -->
          <form class="post_form"  method="POST" enctype="multipart/form-data" style ="position:fixed;"    >  
            <input  type ="file" name ="image" style=" position : fixed; left:2%; bottom : 55%; ">
            <input  type="submit" name="sub" value="Post" style=" position : fixed; left:2%; bottom : 52%;   ">
        
            <input  type="submit" name="bb" value="x" style=" position : fixed; width:30; height: 30; margin-top: 20px; margin-left: 125px; font-size: 120%; background-color: transparent; border:none;">
            <label>
              <?php
               
               if (!$pic)
              {
                  if ($gender =='male' ) 
                  {
                      echo '<img src="images/profileman2.png" width="170 " height="170" style="position:fixed; margin-top :2px;margin-left: -26px; border:none; ">';
                     $pic='profileman2.png';

                     $sql ="UPDATE users SET profilepic='$pic'  WHERE email='$user'";
                     mysqli_query($link, $sql);
                  }
              else if ($gender=='female' )
              {
                   echo '<img src="images/profilewoman2.png" width="170 " height="170" style="position:fixed; margin-top :2px;margin-left: -26px; border:none; ">';
                   $pic='profilewoman2.png';

                   $sql ="UPDATE users SET profilepic='$pic'  WHERE email='$user'";
                   mysqli_query($link, $sql);
              

              }
            }
       
       else {
               if (isset($_POST['sub'])){
                 $target = "images/".basename($_FILES['image']['name']);
                 $image = $_FILES['image']['name'];
      
               if ( !empty ($image) )
              {  
                $sql ="UPDATE users SET profilepic='$image'  WHERE email='$user'";
                mysqli_query($link, $sql);
              }

              if (move_uploaded_file($_FILES['image']['tmp_name'], $target)  ) 
                 $msg= "Image uploaded";
              else 
                 $msg= "Error in image";
        

              $query= "SELECT * FROM users WHERE email ='$user'"; 
              $res=$link->query($query);

              if ($res)
             {
                  while ($row = $res -> fetch_row() ){
                      $newimage=$row[14];
                      $pic=$newimage;
                      $result ="INSERT INTO posts(body,image,postdate,poster,public) VALUES ('New profile picture!', '$newimage' ,NOW(),'$user','private' )";
                       mysqli_query($link, $result);      
                  }
    
             }
           } 
   echo '<img src="images/' . $pic . '" width="170 " height="170" style="position:fixed; margin-top :2px;margin-left: -30px; border:none; ">'; 
  }
          ?>
  </label>

    <label>
        <?php
          if (isset($_POST['bb'])){
             echo '<img src="images/' . $pic . '" width="175 " height="175" style="position:fixed; margin-top :2px;margin-left: -30px; border:none; background-color:transparent; ">'; 

             if ($gender =='male'  )
          {
               echo '<img src="images/profileman2.png" width="175 " height="175" style="position:fixed; margin-top :2px;margin-left: -30px; border:none; ">';
               $pic='profileman2.png';

          }
          else if ($gender=='female' )
          {
            echo '<img src="images/profilewoman2.png" width="175 " height="175" style="position:fixed; margin-top :2px;margin-left: -30px; border:none; ">';
            $pic='profilewoman2.png';

          }
          $sql ="UPDATE users SET profilepic='$pic'  WHERE email='$user'";
                mysqli_query($link, $sql);
          echo "<script>window.location.href='profile.php';</script>";
    exit;
         
           }

        ?>

      </label>
    
   </form> 
     </ul>
  </div>

   <!-- section el profile info -->
   <div style =" float: left; position: fixed; width: 250px; height: 300px; box-sizing: border-box; padding: 20px; border: 10px solid #e3b6b3; margin-top: 360px;margin-left: 9px;font-family: 'MV Boli';">
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
				<div class="input-container" style=" margin-left: 3px;padding: 7px;"> 
				 <i class="fa fa-birthday-cake" style="margin-top: -5px;"></i>
				 <label style="margin-left: 5px; margin-top:-9px; ">
				    	<?php  echo "".$day. "-" .$month ."-" . $year; ?>
				    </label>
				</div>
        <label id="edit">
            <a href= "EditProfile.php">Edit </a>
        </label>
			</div>
  		



  <article >
    
    <!--About me label -->
     <p > 
    	  <label id="editabout"> 
         	  <a href= "editabout.php"  > About me </a> 
    	  </label>
      </p>
    <p>
    	<label id ="about">
    			<?php  echo "".$about ?>
    	</label>
    </p>
     </article>


 <!-- buttons section -->

  <div style ="float: right; width: 250px; height: 300px; padding: 20px;margin-top: 10px;margin-left: 1276.5px; box-sizing: border-box; border: 10px solid #e3b6b3;">

      <a href= "userslist.php"> 
        <img src="images/pickpngg.png" width =90px; alt= "pick" style=" margin-top :20px;margin-left: 120px; border:none; "></a>

     <a href= "friends.php?value=1"> 
         <img src="images/party.png" width =93px; height="96px"; alt= "friends" style="margin-top :-120px;margin-bottom: 20px; margin-left: 5px; border:none; "></a>
 
    
</div>
     

<div>
  <label >   
    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br><br> <br><br> <br><br> <br>
    <?php
       $query= "SELECT * FROM posts WHERE poster ='$user'  ORDER BY postdate DESC"; 
        $res=$link->query($query);

       if ($res)
       {
             while ($roww = $res -> fetch_row() ){
                echo "<div  style=' width: 750px; height: 610px; padding: 100px;  
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
                             echo "<br>";
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
