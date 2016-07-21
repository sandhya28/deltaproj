<?php

  	$conn = mysql_connect('localhost','root','');
  	mysql_select_db('stallstop');
session_start();
if(!isset($_SESSION['username']))
  header('location:stallstop.php');
	

	$username = $_SESSION['username'];
	$password = $_SESSION['password'];


  	if(!$conn)
  	{
  		echo "failed to connect with the server";
  	}

if(isset($_SESSION['username']))
{

	$result = mysql_query("SELECT * FROM stallstop WHERE password =\"$password\" AND username = \"$username\" ")or die(mysql_error());
					
					$count = mysql_num_rows($result);
					
				if($count == 1)
				{	
					$user = mysql_fetch_array($result);
				} 
				else 
				{
					echo "<script>alert('User Name and Password didn\'t match');document.location='display.php';</script>";
				}
}
else
{
	echo "sorry";
}

if (isset($_GET['logout'])) 
  {
    session_unset();
    session_destroy();
    header('location:stallstop.php');
   }

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $type = test_input($_POST['type']);
    $subtype = test_input($_POST['type1']);
    $brand = test_input($_POST['brand']);
    $description = test_input($_POST['description']);
    $oldprice = test_input($_POST['oldprice']);
    $newprice = test_input($_POST['newprice']);
}

function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);

        $data = htmlspecialchars($data);
          $data = mysql_real_escape_string($data);
        return $data;
    }

      if(isset($_POST['submitdetails']))
      {   

        $file = $_FILES['image']['tmp_name'];
        
        if(isset($file))
        {
          $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
          $file_name = addslashes($_FILES['image']['name']);
          $image_size = getimagesize($_FILES['image']['tmp_name']);

          if($image_size == FALSE)
          {
          
            echo  "<script> 

            history.go(-1);
            alert('File has to be an image file');

            </script>";
            exit();
            echo "Enter a valid file";
          }
        }
        mysql_query("INSERT INTO stock VALUES (
                    NULL,
                    '$type',
                    '$subtype',
                    '$brand',
                    '$description',
                    '$oldprice',
                    '$newprice',
                    '$image'
                    )")or die(mysql_error()) ;
      }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Stall Stop: USER DETAILS</title>
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
#adminonly
{
    background:  #ffb833;
    color: black;
}
form
{
  padding: 4vw;
}
input[type="file"]
{
  background: #ffb833;
}
</style>
</head>
<body>
<div class="jumbotron">

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
                	echo '<li><a href="display.php" class="activemem"><span class="glyphicon glyphicon-user" ></span><strong> '.$username.'</strong></a></li>';
                  echo '<li><a href="edit.php"><span class="glyphicon glyphicon-user"></span>Edit Details</a></li>';
                }
                ?>
      			</ul>
    		</div>
  		</div>
  	</nav>

<div id=user_login>
	
	<p>
	<?php
	$image = $user['PROFILEPIC'];

	$imag = base64_encode($image);

	echo "<p align='center'>"."<img style='display:block; width:200px;height:200px;' id='base64image'                 
       src='data:image/jpeg;base64,$imag' >"."</p>";
   ?>
	<?php echo "<table><tr><td>NAME </td><td>: ".$user['FIRSTNAME']." ".$user['LASTNAME']."</td></tr><tr><td></td><td></td></tr>";?>
	<?php echo "<tr><td>USER NAME </td><td>:     ".$user['USERNAME']."</td></tr><tr><td></td><td></td></tr>";?>
	<?php echo "<tr><td>GENDER </td><td>:        ".$user['GENDER']."</td></tr><tr><td></td><td></td></tr>";?>
	<?php echo "<tr><td>NATIONALITY </td><td>:   ".$user['NATIONALITY']."</td></tr><tr><td></td><td></td></tr>";?>	
	<?php echo "<tr><td>EMAIL </td><td>:         ".$user['EMAIL']."</td></tr><tr><td></td><td></td></tr>";?>
	<?php echo "<tr><td>ADDRESS </td><td>:       ".$user['ADDRESS']."</td></tr><tr><td></td><td></td></tr>";?>
	<?php echo "<tr><td>MOBILE NUMBER </td><td>: ".$user['PHONENO']."</td></tr></table>";?>
	<?php 
      if($user['USERTYPE']=="Admin")
          {
            echo '<button type="button" id ="add" class="btn btn-success">ADD ITEMS</button>
            <button type="button" id ="edit" class="btn btn-danger">DELETE</button>
            <br><br>'; 
          }      
  ?>
  <div id = "adminonlyadd">
  <div class="form-group">
<form action="display.php" method = "post" enctype="multipart/form-data" >
  TYPE<br><input type="text" name="type" required class="form-control"><br>
  SUBTYPE<br><input type="text" name="type1" required class="form-control"><br>
  BRAND<br><input type="text" name="brand" required class="form-control"><br>
  DESCRIPTION<br><input type="text" name="description" required class="form-control"><br>
  OLD PRICE<br><input type="number" name="oldprice" required class="form-control"><br>
  NEW PRICE<br><input type="number" name="newprice" required class="form-control"><br>
  IMAGE<br><input type="file" name="image" required class="form-control"><br>
  <input type="submit" name="submitdetails" class = "btn btn-danger" value="ADD"></form>
</form></div>
</div>
<div id="adminonlyedit">
</p>  
</div>
<script type="text/javascript">
$('#adminonlyadd').hide();
  $('#add').click(function(){
    $('#adminonly').show();
  });
</script>
</body>
</html>
