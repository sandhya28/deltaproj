<?php 
	
	$conn = mysql_connect('localhost','root','');
  	mysql_select_db('stallstop');
  
  	session_start();
    if(!isset($_SESSION['username']))
  header('location:stallstop.php');
else
	{$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	}	
  	if(!$conn)
  	{
  		echo "failed to connect with the server";
  	}

{

	$result = mysql_query("SELECT * FROM stallstop WHERE password =\"$password\" AND username = \"$username\" ")or die(mysql_error());
					
				$count = mysql_num_rows($result);
					
				if($count == 1)
				{	
					$user = mysql_fetch_array($result);
				} 
				else 
				{
					
					echo "<script>alert('Something went wrong. SORRY!');document.location='display.php';</script>";
				}
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Stall Stop: Online Shopping Site</title>
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
      font-family: "Comic Sans MS";
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
              <?php 
                if(isset($_SESSION['username']))
                {
              
                  echo '<li><a href = "stallstop.php?logout=true"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';

                }
                else
                {
                  echo '<li><a href="signuppage.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li><li><a href="loginpage.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                }
              ?>
               <?php 
                if(isset($_SESSION['username']))
                {
                  echo '<li><a href="display.php"><span class="glyphicon glyphicon-user"></span><strong> '.$username.'</strong></a></li>';
                  echo '<li><a href="edit.php" class = "activemem"><span class="glyphicon glyphicon-user"></span>Edit Details</a></li>';
                }?>
      			</ul>
    		</div>
  		</div>
  	</nav>

<div id="signup_page" class="form-group">

<p>USERNAME : <?php echo $username;?> </p>

<form action = "form.php" method = "post" enctype="multipart/form-data">

	PROFILE PICTURE<br><input type="file" name="image" oninvalid="setCustomValidity('Enter a valid file. Can\'t be left blank')"
	 onchange="try{setCustomValidity('')}catch(e){}" class="form-control"><br>

	FIRSTNAME<input type="text" name="firstname" required value = "<?php echo $user['FIRSTNAME'];?>" oninvalid="setCustomValidity('Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}" class="form-control"><br>

	LASTNAME<br><input type="text" name="lastname" value = "<?php echo $user['LASTNAME'];?> " class="form-control"><br>

	OLD PASSWORD(Min. 8 characters)<br><input type="password" name="oldpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required 
	oninvalid="setCustomValidity('Password should contain min. 8 characters with atleast one capital letter and number E.g.Banana12.Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}" class="form-control">
	<br>


	NEW PASSWORD(Min. 8 characters)<br><input type="password" name="newpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required 
	oninvalid="setCustomValidity('Password should contain min. 8 characters with atleast one capital letter and number E.g.Banana12.Can\'t be left blank')" 
	onchange="try{setCustomValidity('')}catch(e){}" class="form-control">
	<br>

	CONFIRM PASSWORD(Min. 8 characters)<br><input type="password" name="confirmnewpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required 
	oninvalid="setCustomValidity('Password should contain min. 8 characters with atleast one capital letter and number E.g.Banana12.Can\'t be left blank')" class="form-control"
	onchange="try{setCustomValidity('')}catch(e){}">
	<br>

	NATIONALITY<br><input type="text" name="nationality" required value = "<?php echo $user['NATIONALITY'];?>"
	oninvalid="setCustomValidity('Can\'t be left blank)" class="form-control"
	onchange="try{setCustomValidity('')}catch(e){}"><br>

	E-MAIL<br><input type="email" name="email" placeholder="e.g. user@example.com" required  value = "<?php echo $user['EMAIL'];?>"
	oninvalid="setCustomValidity('Fill in a valid e-mail address E.g. user@example.com.Can\'t be left blank.')" class="form-control"
	onchange="try{setCustomValidity('')}catch(e){}"><br>

	ADDRESS<br><textarea name="address" rows="7" cols="50" required
	 oninvalid="setCustomValidity('Can\'t be left blank')" class="form-control"
	onchange="try{setCustomValidity('')}catch(e){}"><?php echo $user['ADDRESS'];?></textarea><br>

	MOBILE NUMBER(10 digit)<br><input type="number" name="phoneno" min="1000000000" max="9999999999" value = "<?php echo $user['PHONENO'];?>"
	oninvalid="setCustomValidity('Enter a valid 10 digit number. Can\'t be left blank')" class="form-control"
	onchange="try{setCustomValidity('')}catch(e){}" required><br>

	<input type="submit" name="details_submit" value="Submit" class="submitbuttonforsignup">

</form>
 

</div>
</body>
</html>