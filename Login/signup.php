<!DOCTYPE html>
<html>
<head>
	<style>
body{
   height: 200px;
   background-color: lightpink;
 /*  background-image: linear-gradient(to right, #c33764  , #1d2671); */
   background-image: url("images/pinklogin1.jpg");
   background-size: 1550px 800px;
   background-repeat: no-repeat;
   background-attachment: fixed;
}
 
#frn{
	border: blue 1px;
	width : 20%;
	height: 530px;
	border-radius: 5px;
	margin: 45px auto;
	background: white;
	padding : 50px;

}
#submit { /*register button*/
  background-color: #e89591;
  color: white;
  font-family: 'Edwardian Script ITC';
  font-size: 160%;
  padding: 11px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
	 
}
#submit:hover{
	color:black;
	opacity: 2;
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
  font-family: "MV Boli" ;
  border:none;
  color:gray;
  width :265px;
  height: 40px;


}

.icon {
  padding: 10px;
  background:#fbeeee; /*lightgray;*/
  color: black;
  min-width: 10px;
  text-align: center;
  
}

#signup{ /*signup label*/
	
	 font-family: 'Edwardian Script ITC';
	 font-size: 250%; 
	 font-weight: bold;
     color: black;
     text-align: center;
    margin-right: -20px;


}
#member{ /*already a member label*/
	margin-left: -0.5px ;
	font-family: 'Edwardian Script ITC';
	font-size: 130%;  
	color:gray;
	bottom: 20px;
	line-height: 1.5;
  	display: inline-block;
  	vertical-align: bottom;
}
#log {/*login redirect*/
	margin-left: 2px;
	font-family: 'Edwardian Script ITC';
	font-size: 130%; 
	color:gray;
	line-height: 1.5;
  	display: inline-block;
  	vertical-align: bottom;
}
#log:hover{
	color:black;
}



	</style>
	<title>Sign Up </title>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	
</head>
	<body>

		<div id = "frn" >
			<form action ="SignupProcess.php" method ="POST">
			<p>
				<label id ="signup">Sign up </label>
					<br><br>
				 <div class="input-container">
    				<i class="fa fa-user icon"></i>
					<input type="text"  name = "firstname" placeholder="First name"  id="input"/>
				</div>
			</p>
			<p>
				<div class="input-container">
    				<i class="fa fa-user icon"></i>
					<input type="text"  name = "lastname" placeholder="Last name" id ="input"/>
				</div>
			</p>
			<p>
				 <div class="input-container">
					<i class="fa fa-key icon"></i>
					<input type="password"  name = "pass" placeholder="Password" id ="input"/>
				</div>		
			</p>
			<p>
				 <div class="input-container">
					<i class="fa fa-key icon"></i>
					<input type="password" name = "confirmpass"  placeholder="Confirm password" id ="input" />
				</div>
			</p>
			<p>
				<div class="input-container"  > 
				    <i class="fa fa-envelope icon "></i>
					<input type="text"  name = "email" placeholder="Email" id ="input" />
				</div>  
			</p>
			<p>
				<div class="input-container"  style="font-family: 'MV Boli';">
				    <i class="fas fa-venus-mars " style="margin-left: 3px;"></i>
				
  					<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female")?> value="female">Female 
  					<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") ?> value="male">Male
  				</div> 
			</p>

  			<p >
  				
  				 <i class="fa fa-birthday-cake" style="margin-left: 3px;"></i>
 				 <select id = "day" name="day"  style="font-family: 'MV Boli'; background-color: #fbeeee;">
 				 	<option value= disable selected hidden>Day</option>
					  	<?php					  	
					  	for($i=1;$i<=31;$i++)
							 echo '<option value='.$i.'>'.$i.'</option>';
					  	?>
					   					
  				</select>
  				<select id = "month" name = "month"  style="font-family: 'MV Boli'; background-color: #fbeeee;">
  						<option value= disable selected hidden>Month</option>
						<option value="1">January</option>
						<option value="2">February</option>
						<option value="3">March</option>
						<option value="4">April</option>
						<option value="5">May</option>
						<option value="6">June</option>
						<option value="7">July</option>
						<option value="8">August</option>
						<option value="9">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>	

  				</select>
  				<select name="year"  style="font-family: 'MV Boli'; background-color: #fbeeee;">
  					<option value = disable selected hidden >Year</option>
  						<?php		
  							  	
					  	for($year=1920; $year <= 2020; $year++)
					  	{							
							echo '<option value= '.$year.' > '.$year.' </option>';
						}
					  	?>
  				</select>
  				
			</p>
				<button type="submit" name = "Sign up"  class = "btn" id ="submit"> Register 
				</button>				
			</p>
			<label id="member"> Already a member? </label>
			<a href="login.php" id ="log"> Login <a/>
 		</form>
		</div>

	</body>
</html>





