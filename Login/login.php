<!DOCTYPE html>
<html>
<head>
	<style>
		
body{
   height: 200px;
   background-color: lightblue;
   background-image: url("images/pinklogin1.jpg");
   background-size: 1550px 800px;
   background-repeat: no-repeat;
   background-attachment: fixed;
}

#frn{
  border: red 1px;
  width : 230px;
  height: 310px;
  border-radius: 5px;
  margin: 100px auto ;
  background: white;
  padding : 100px;

}
#label{ /*login to ur acc label*/
  font-family: 'Edwardian Script ITC';
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
}
/* input texts*/
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
  background: #fbeeee;
  color: black;
  min-width: 10px;
  margin-left:-40px;
  text-align: center;
  
  
}
/* Set a style for the submit button */
#login {
  background-color: #e89591;
  color: white;
  font-family: 'Edwardian Script ITC';
  font-weight: bold;
  font-size: 160%;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
  width: 302px;
  opacity: 0.9;
  margin-left:-40px;
  
  
}

#login:hover {
  opacity: 2;
  color:black;
}


#signup /* not a member label */
{
	margin-left: -38px ;
	font-family: 'Edwardian Script ITC';
  	font-weight: bold;
	font-size: 130%; 
	color:gray;
	bottom: 20px;/*10%;*/
	line-height: 5.5;
  	display: inline-block;
  	vertical-align: bottom;

}
#signup2{ /*singup redirect*/
	margin-left: 5px;
	font-family: 'Edwardian Script ITC';
 	font-weight: bold;
	font-size: 130%; 
	color:gray;
	line-height: 5.5;
  	display: inline-block;
  	vertical-align: bottom;

}
#signup2:hover{
	color:black;
}


	</style> 
	<title> Login Page</title>
	<!-- icon library-->
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>

</head>
<body>
	
	<div id = "frn" >
	 	
		<form action ="process.php" method ="POST">
			<div>
				<label id ="label"> Login to your account </label> <br><br>
		    </div>
			<p>
				 <div class="input-container"  >
				    <i class="fa fa-envelope icon "></i>
			    	<input type="user"  name = "email" placeholder="Email" id ="input"/>
				</div>
			</p>
			<p>
				 <div class="input-container">
						<i class="fa fa-key icon"></i>
						<input  type="password" name = "pass" placeholder="Password" id="input" />
					</div>
			</p>
			 <p>
				<button type="submit" name = "Login"  class = "btn"  id ="login"> Login </button>	

			</p>
			
			<label id ="signup"> Not a member? </label>
			 <a href="signup.php" id ="signup2"> Sign up <a/>
		   
		 </form>

	</div>

</body>
</html>
