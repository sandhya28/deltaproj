
<?php

  	$conn = mysql_connect('localhost','root','');
  	mysql_select_db('stallstop');

	
  	if(!$conn)
  	{
  		echo "failed to connect with the server";
  	}

if(isset($_POST['submit']))
{
	$username = $_POST['Name'];
	$password = sha1($_POST['loginpass']);
	
	$result = mysql_query("SELECT * FROM stallstop WHERE password =\"$password\" AND username = \"$username\" ")or die(mysql_error());
					
				$count = mysql_num_rows($result);
					
				if($count == 1)
				{	
					session_start();
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					echo "<script>alert('Login Successful');document.location='stallstop.php';</script>";
					
				}

				else 
				{
					echo "<script>alert('User Name and Password didnt match');document.location='loginpage.php';</script>";
				}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>StallStop:Login</title>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		body
		{
			background-image: url('back.jpg');
		}
		.jumbotron
		{
			background: transparent;
			color: #002200;

		}
		#log
		{
			color: #ffffff;	
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
        			<li><a href="signuppage.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        			<li><a href="loginpage.php" class="activemem"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      			</ul>
    		</div>
  		</div>
	</nav>
<div id="container">
<h1 id="log">LOGIN</h1>
<div id="login_page">

<form action="loginpage.php" method = "post" role="form">
	
	<br><input type="text" name="Name" placeholder="Username" required class="form-control">
		<br><input type="password" name="loginpass" placeholder="Password" required class="form-control"><br>
		<input type="submit" name="submit" value="Login" class="loginbutton">
</form>
</div>
</div>

</body>
</html>