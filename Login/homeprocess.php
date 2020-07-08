<?php
session_start();
$FriendsArray=$_SESSION['friends'];
include ("homepage.php");
if (!isset($_SESSION["loggedin"])){
  header("Location: login.php");
}

  $user = $_SESSION['email'];

$msg="";
// Create connection
$link = mysqli_connect("localhost", "root", "");
$link -> select_db("login");
$errors = array();

  if ($link->connect_error)
  {
       die("Connection failed: " . $link->connect_error);
  }
  if ($result = $link -> query("SELECT DATABASE()")) 
  {
      $row = $result -> fetch_row();
   // echo "Default database is " . $row[0];
    //$result -> close();
  } 

//post button 
if($_SERVER["REQUEST_METHOD"] == "POST" )
{ 
  $target = "images/".basename($_FILES['image']['name']);
  $image = $_FILES['image']['name'];
  $text="";
  if ($_POST['text'] != "")
     $text=$_POST['text'];

if ( !empty ($image) && !empty($text)  )
{
  if (isset($_POST['private'] )) 
      $result ="INSERT INTO posts (body,image,postdate,poster,public) VALUES ('$text', '$image',NOW(),'$user','private') ";
else 
  $result ="INSERT INTO posts (body,image,postdate,poster,public) VALUES ('$text', '$image',NOW(),'$user','public') ";
  mysqli_query($link, $result);
}
if (!empty($text) && empty($image) )
{
  if (isset($_POST['private'] )) 
     $result ="INSERT INTO posts (body ,postdate,poster,public) VALUES ('$text', NOW(),'$user','private' ) ";
  else
     $result ="INSERT INTO posts (body ,postdate,poster,public) VALUES ('$text', NOW(),'$user','public' ) ";
  mysqli_query($link, $result);
}
if (!empty($image) && empty($text) )
{ if (isset($_POST['private'] )) 
    $result  ="INSERT INTO posts (image,postdate,poster,public) VALUES ('$image', NOW(),'$user','private' ) ";
  else 
      $result  ="INSERT INTO posts (image,postdate,poster,public) VALUES ('$image', NOW(),'$user','public' ) ";
  mysqli_query($link, $result);
}
if (empty($image) && empty ($text) ){
  array_push($errors,"Empty post");

}
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)  ) 
      $msg= "Image uploaded";
    else $msg= "Error in image";

if (count ($errors)!=0)
  {
  //  echo "no errors";  
  }
 
}
 $sql = "SELECT * FROM posts  ORDER BY postdate DESC ";
$result = $link->query($sql);

echo "<br><br><br><br><br>";
 if ($result )
  {
    
      while ($row = $result -> fetch_row() ){
           if ($row[5] == "private" )
           { 
               //if (array_search($row[4],$FriendsArray,true) )
            if (in_array($row[4], $FriendsArray))
                {  echo "<div style=' width: 530px; height: 350px; padding: 100px;  
                border: 4px solid black; margin-left:480px;'>";
                echo   "<div align='center' style='font-family:MV Boli; '>";

                echo "<div style='font-size:65%;'>";
                echo $row[5];
       
                echo "</div>";

                echo "<div style='color:#563E49;'>";
                echo "Posted by: " .$row[4]."<br>"; //posted by
                echo "</div>";
                echo $row[1] ."<br>"; 
        
      
                 if ($row[2]!=NULL){
                   echo '<img src="images/' . $row[2] . '" style="max-width:200px">'; 
                   echo '<br>';
                }

                echo "<div style='font-size:55%;'>";
                echo $row[3]."<br>"; //post date
                echo "</div>";

       
        echo "</div>";
        echo "</div>";
        echo "<br>";

      }

        }
      else{
                 
    // echo '_______________________________________________';
        echo "<div style=' width: 530px; height: 350px; padding: 100px;  
                border: 4px solid black; margin-left:480px;'>";
        echo   "<div align='center' style='font-family:MV Boli; '> ";

        echo "<div style='font-size:65%;'>";
        echo $row[5]; //public or private
       
        echo "</div>";

        echo "<div style='color:#563E49;'>";
        echo "Posted by: " .$row[4]."<br>"; //posted by
        echo "</div>";
        echo $row[1] ."<br>"; 
        
      
      if ($row[2]!=NULL){
        echo '<img src="images/' . $row[2] . '" style="max-width:200px">'; 
        echo '<br>';
     }

        echo "<div style='font-size:55%;'>";
        echo $row[3]."<br>"; //post date
        echo "</div>";

        //echo '_______________________________________________';
        echo "</div>";
        echo "</div>";
        echo "<br>";

      }
    }
   
  } 


?>
