
<!DOCTYPE html>
<html>
<head>
	<title>StallStop:SignUp</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
body
{
	background-color: #ffeccc;
}

   #signup_page
    {
      margin-right: 23%;
      margin-left: 23%;
      font-family: "Calibri";
      border: 1px solid black;
      font-size: 1.7vw;
      padding: 2vw;
      padding-left: 4vw;
      padding-right: 4vw;
      padding-top: 1vw;
      padding-bottom: 1vw;
      background: #ffc14d;
      color:  #b37400;
    }

	</style>

	
  
</head>
<body>
<div class="jumbotron">
  <br>
		<h1 align="center">Stall Stop</h1>
		<p>Shop till you drop</p>
	</div>
	<nav class="navbar navbar-inverse navbar-fixed-top">
  		<div class="container">
    		<div class="navbar-header">
      			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menubar">
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span> 
      			</button>
      			<a class="navbar-brand" href="#">Shopping Site</a>
		    </div>
    		<div class="collapse navbar-collapse" id="menubar">
      			<ul class="nav navbar-nav navbar-right">
      				<li><a href="stallstop.php">HOME</a></li>
        			<li><a href="menswear.php">MEN'S CORNER</a></li>
			        <li><a href="womenswear.php">WOMEN'S CORNER</a></li>
        			<li><a href="kidswear.php">KIDS CORNER</a></li>
        			<li><a href="signuppage.php" class="activemem"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        			<li><a href="loginpage.php" ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      			</ul>
    		</div>
  		</div>
	</nav>

<div id="signup_page" class="form-group">

<form action = "action.php" method = "post" enctype="multipart/form-data" role = "form">

	PROFILE PICTURE<br><input type="file" name="image" required oninvalid="setCustomValidity('Enter a valid file. Can\'t be left blank')"
	 onchange="try{setCustomValidity('')}catch(e){}" class="form-control"><br>

	USER TYPE<br><input type="radio" name="usertype" value="Admin" required 
	oninvalid="setCustomValidity('Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}">Admin<br>
			  <input type="radio" name="usertype" value="Public">Public<br><br>

	FIRSTNAME<input type="text" name="firstname" required oninvalid="setCustomValidity('Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}" class="form-control"><br>

	LASTNAME<br><input type="text" name="lastname" class="form-control"><br>
	USERNAME(Min. 4 characters)<br><input type="text" name="username"  required pattern="([a-zA-Z][a-zA-Z0-9\s]*).{3,}" oninvalid="setCustomValidity('Can only be alphanumeric.Can\'t be left blank')" onchange="try{setCustomValidity('')}catch(e){}" class="form-control"><br>

	PASSWORD(Min. 8 characters)<br><input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required 
	oninvalid="setCustomValidity('Password should contain min. 8 characters with atleast one capital letter and number E.g.Banana12.Can\'t be left blank')" onchange="try{setCustomValidity('')}catch(e){}" class="form-control">
	<br>

	CONFIRM PASSWORD(Min. 8 characters)<br><input type="password" name="confirmpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required 
	oninvalid="setCustomValidity('Password should contain min. 8 characters with atleast one capital letter and number E.g.Banana12.Can\'t be left blank')" onchange="try{setCustomValidity('')}catch(e){}" class="form-control">
	<br>

	GENDER<br><input type="radio" name="gender" value="Female" required 
	oninvalid="setCustomValidity('Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}">Female<br>
			  <input type="radio" name="gender" value="Male">Male<br><br>

	NATIONALITY<br><input type="text" name="nationality" required 
	oninvalid="setCustomValidity('Can\'t be left blank)" class="form-control"
	onchange="try{setCustomValidity('')}catch(e){}"><br>

	E-MAIL<br><input type="email" name="email" placeholder="e.g. user@example.com" required  class="form-control"
	oninvalid="setCustomValidity('Fill in a valid e-mail address E.g. user@example.com.Can\'t be left blank.')" 
	onchange="try{setCustomValidity('')}catch(e){}"><br>

	ADDRESS<br><textarea name="address" rows="7" cols="50" required class="form-control"
	 oninvalid="setCustomValidity('Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}"></textarea><br>

	MOBILE NUMBER(10 digit)<br><input type="number" name="phoneno" min="1000000000" max="9999999999" class="form-control"
	oninvalid="setCustomValidity('Enter a valid 10 digit number. Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}" required><br>

	<input type="submit" name="details_submit" value="Submit" class="submitbuttonforsignup" class="form-control">

</form>
</div>
</body>
