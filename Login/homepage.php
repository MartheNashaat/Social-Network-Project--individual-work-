<?php 
include ("Navbar.html");
$user=$_SESSION['email'];
$count=$_SESSION['requests'];
//link to db
$link = mysqli_connect("localhost", "root", "");
$link -> select_db("login");

if (!isset($_SESSION["loggedin"])){
  header("Location: login.php");
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
   .search-box{
      padding:10px;

    }
   
    #btn{
       margin-left: 230px; 
         margin-top:-10px;

    }
    #count{
      color:white;
      font-family: 'MV Boli';
      position: fixed;
      margin-top: -20px;
      margin-left: 1305px;
      font-weight: bold;
      position: fixed;
    }
    #createpost
    {
      position: fixed;
      margin-top: 60px;
      font-size:200%;
      color:black;
      font-family: 'Edwardian Script ITC';
      font-weight: bold;
      margin-left: 80px;
      
    }
    #post
    {
      position : fixed;
      left:27.2%; 
      bottom : 48%; 
    }
    #file{
      position : fixed; 
      left:15%; 
      bottom : 48%;
    }
    #postText{
      position :fixed; 
      margin-top: 134px; 
      margin-left: 5px;
      box-shadow: 5px 7px #9d6a6a;

    }
    #oldBox a{ 
      margin-left: 2px; 
      margin-top:-10px;  
      position: fixed;
      color:black;
      font-family: 'Edwardian Script ITC';
      font-size:130%;
    }
     #oldBox a:hover{ 
      color:white;
    }
   
    #oldBox{
      width: 120px; 
      height: 10px; 
      padding: 20px;  
      border: 2px solid black; 
      margin-left:1320px; 
      margin-top:610px; 
      position: fixed;
                    
    }

    #priv{
      margin-top: 110px; 
      margin-left: 370px;
      font-size:60%;
      font-family: 'MV Boli';
    }

 </style>
<title>Homepage</title>
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

<h2>
<!-- posts -->
     <div class="post-body"> 
      
         <form class="post_form" action="homeprocess.php" method="POST"  enctype="multipart/form-data" style ="position:fixed;"> 
              <!-- create post box -->
                  <label id ="createpost" > Create Post: </label>
                      <input type ="file" name ="image" id ="file">
                      <textarea class="status" name="text" id="postText" placeholder="Write Anything!" rows="10" cols="60"></textarea>
                      <input type="submit" name="post" value="Post"id="post" >
                      <div id="priv">
                          <input type="checkbox" name="private" value="Private">
                          <label for="private">Private</label><br>
                    </div>
                   
   
           </form>  
        </div> 
    </div>
   
</body>
</html>
