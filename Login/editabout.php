<!-- About me edit button -->
<?php
include("Navbar.html");
session_start();
$user = $_SESSION['email'];

				$link = mysqli_connect("localhost", "root", "");
				$link -> select_db("login");
				$sql = "SELECT  * FROM users WHERE email = '$user' ";
				$result = $link->query($sql);
					if ($result->num_rows > 0) 
					{
						 while($row = $result->fetch_assoc()) 
						 {  $about= $row["about"];
						 	

  						 }
					} 
					
?>
<!DOCTYPE html>
<html>
<head>
	<style>
		
body{
   height: 200px;
   background-image:url(images/Pink2.png);
	background-size: 1550px 800px;
	background-repeat: no-repeat;
 	background-attachment: fixed;
}

#frn{ /*background box*/
 
  width : 230px;
  height: 290px ;
  border-radius: 5px;
  margin: 100px auto ;
  background: #ffffff;
  padding : 100px;

}
#label{ /*About me label*/
  font-family:'Edwardian Script ITC'; 
  font-weight: bold;
  color: black;
  font-size: 220%; 
  text-align: center;
  line-height: 1;
  display: inline-block;
  vertical-align: top;

}
.input-container { 
  display: -ms-flexbox; 
  display: flex;
  width: 500px;
  margin-bottom: 15px;
   margin-top: -40px;
}

#input{/* input texts*/
  background: #fbeeee;
  font-family: "MV Boli" ;
  font-size: 105%;
  border:none;
  color:gray;
  width :265px;
  height: 250px;
  margin-top: -10px;


}
.icon {
  padding: 10px;
  background: #fbeeee;
  color: black;
  min-width: 10px;
  margin-left:-40px;
  text-align: center;
   margin-top: -10px;
  
  
}
/* save button */
#aboutBtn {
  background-color: #e89591;/*#CF196E;*/
  color: white;
  font-family: 'Edwardian Script ITC';
  font-weight: bold;
  font-size: 160%;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 302px;
  opacity: 0.9;
  margin-left:-40px;
  
  
}

#aboutBtn:hover { /*save button hover effect*/
  opacity: 1;
  color:black;
}
#count{ /*friend requests count*/
      color:white;
      font-family: 'MV Boli';
      position: fixed;
      margin-top: -102px;
      margin-left: 1295px;
      font-weight: bold;
    }
#retrievebtn{ /* friend requests button */
		position:fixed; 
		margin-top :-98px;
		margin-left: 1240px; 
		border:none; 
		
	}
</style> 
	<title> About me</title>

	<!-- icon library-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 


</head>
<body>
	 <header>
    		<label id="count">
     			   <?php echo $_SESSION['requests']; ?>
    	 	</label>

     </header>

	<div id = "frn" >
		<form  action ="editaboutprocess.php"  method ="POST"> 
			<div>
				<label id ="label" style="margin-left: 60px;margin-top: -50px;"> About me  </label> <br><br>
		    </div>
			<p>
				 <div class="input-container"  >
				    <i class="fa fa-info icon "></i>
			    	<textarea type="user"  name = "about" id ="input">
			    		<?php echo $about;?>
			    	</textarea>
				</div>
			</p>

			 <p>
				
				<button type="submit" name = "save"  class = "btn"  id ="aboutBtn"> Save </button>	

			</p>		   
		 </form>

	</div>

</body>
</html>