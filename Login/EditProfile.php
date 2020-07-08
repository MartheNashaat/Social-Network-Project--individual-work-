<!-- Edit profile button -->
<?php 
include("Navbar.html");
session_start();
$email = $_SESSION['email'];
$count=$_SESSION['requests'];

				$link = mysqli_connect("localhost", "root", "");
				$link -> select_db("login");
				$sql = "SELECT  * FROM users WHERE email = '$email' ";
				$result = $link->query($sql);
					if ($result->num_rows > 0) 
					{
						 while($row = $result->fetch_assoc()) 
						 {  $firstname= $row["fname"];
						 	$lastname= $row["lname"];
						 	$password= $row["password"];
						 	$email=$row["email"];
						 	$gender=$row["gender"];
						 	$day=$row["day"];
						 	$month=$row["month"];
						 	$year=$row["year"];
						 	$phonenumber=$row["phonenumber"];
						 	$hometown=$row["hometown"];
						 	$country=$row["country"];
						 	$marital=$row["marital"];

  						 }
					} 
					else echo "0 rows foundddddd";

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
	margin:  0px;
	height: 200px;
	}
 
#frn{
	border: none 1px;
	width : 20%;
	height: 740px;
	border-radius: 5px;
	margin: 80px auto;
	background: #ffffff;
	padding : 50px;

}
#saveBtn { /*save button*/
  background-color: #e89591;
  color: white;
  font-family: 'Edwardian Script ITC';
  font-weight: bold;
  font-size: 160%;
  padding: 11px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
#saveBtn:hover{
	color: black;
	opacity: 1;

}

.input-container {
  display: -ms-flexbox;
  display: flex;
  width: 500px;
  margin-bottom: 15px;
}
#input 
{
  background: #fbeeee;
  font-family: 'MV Boli';
  font-size: 100%;
  border:none;
  color:gray;
  width :265px;
  height: 40px;


}
#edit{
  font-family: 'Edwardian Script ITC';
  font-weight: bold;
  font-size: 180%;
  margin-left: 95px;
}

.icon {
  padding: 10px;
  background: #fbeeee;
  color: black;
  min-width: 10px;
  text-align: center;
  
}

#count{
      color:white;
      font-family: 'MV Boli';
      position: fixed;
      margin-top: -82px;
      margin-left: 1295px;
      font-weight: bold;
    }
#retrievebtn{
		position:fixed; 
		margin-top :-78px;
		margin-left: 1240px; 
		border:none; 
	
	}


	</style>
	<title>Edit Profile </title>

	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	
</head>
	<body>
		 <header>
    		  <label id="count">
     			   <?php echo $_SESSION['requests']; ?>
    	 	</label>

   		 </header>



		<div id = "frn" >
			<form action ="EditProcess.php" method ="POST">
			<p>
				<label id ="edit" >Edit Profile </label>
					<br> <br>
				 	<div class="input-container">
    					<i class="fa fa-user icon"></i>
						<input type="text"  name = "firstname" placeholder='<?php echo $firstname; ?>' id="input"/>
					</div>
			</p>
			<p>
				<div class="input-container">
    				<i class="fa fa-user icon"></i>
					<input type="text"  name = "lastname" placeholder='<?php echo $lastname; ?>'  id ="input"/>
					
				</div>
			</p>
			<p>
				 <div class="input-container">
					<i class="fa fa-key icon"></i>
					<input type="password"  name = "pass" placeholder='<?php echo $password; ?>' id ="input"/>
				</div>		
			</p>
			<p>
				 <div class="input-container">
					<i class="fa fa-key icon"></i>
					<input type="password" name = "confirmpass"  placeholder='<?php echo $password; ?>' id ="input" />
				</div>
			</p>
			<p>
				<div class="input-container"  > 
				    <i class="fa fa-phone icon "></i>
					<input type="text"  name = "phonenumber" placeholder='<?php echo $phonenumber; ?>' id ="input" />
				</div>  
			</p>
			<p>
				<div class="input-container"  > 
				    <i class="fa fa-home icon "></i>
					<input type="text"  name = "home" placeholder='<?php echo $hometown; ?>' id ="input" />
				</div>  
			</p>
			<p>
				<div class="input-container"  > 
				    <i class="fa fa-globe icon "></i>
					<input type="text"  name = "country" placeholder='<?php echo $country; ?>' id ="input" />
				</div>  
			</p>
			<p>
				<div class="input-container"  > 
				    <i class="fas fa-venus-mars icon"></i>
					<input type="text"  name = "gender" placeholder='<?php echo $gender; ?>' id ="input" />
				</div>  
			</p>
			<p>
				<div class="input-container" style="font-family: 'Forte';" >
				    <i class="fas fa-heart icon"></i>
					<input type="text"  name = "marital" placeholder='<?php echo $marital; ?>' id ="input"/>
  				</div> 
			</p>
  			<p>
  				 <div class="input-container"  >
  					 <i class="fa fa-birthday-cake icon"></i>
  					 <input type="text"  name = "day" placeholder='<?php echo "" .$day;?>' id ="input" style="width:86px; text-align: center;"/>
  					 <input type="text"  name = "month" placeholder='<?php echo "" .$month;?>' id ="input" style="margin-left:3px; width:86px; text-align: center;"/>
  				 	<input type="text"  name = "year" placeholder='<?php echo "" .$year;?>' id ="input" style="margin-left:4px; width:86px; text-align: center;"/>
  			
  				</div>
 			
			</p>
				<button type="submit" name = "save"  class = "btn" id ="saveBtn"> Save </button>				
			</p>
 		</form>
		</div>

	</body>
</html>
