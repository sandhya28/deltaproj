<?php 
  session_start();
  if(isset($_SESSION['username']))
  {
    
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
  }

  if (isset($_GET['logout'])) 
  {
      
    session_unset();
    session_destroy();
     header('location:stallstop.php');
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
              <li><a href="stallstop.php" class="activemem">HOME</a></li>
        			<li><a href="menswear.php">MEN'S CORNER</a></li>
			        <li><a href="menswear.php">WOMEN'S CORNER</a></li>
        			<li><a href="menswear.php">KIDS CORNER</a></li>
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
                }?>
      			</ul>
    		</div>
  		</div>
  	</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <a href="menswear.php"><img src="menshirtnature.jpg"></a>
      <div class="carousel-caption">
        <h3>Men's Collection</h3>
        
      </div> 
    </div>

    <div class="item">
      <a href="kidswear.php"><img src="kids nature.jpg"></a>
      <div class="carousel-caption">
        <h3>Kids Wear</h3>
        
      </div> 
    </div>

    <div class="item">
      <a href="womenswear.php"><img src="womennature.jpg"></a>
      <div class="carousel-caption">
        <h3>Women's Collection</h3>
        
      </div> 
    </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<script type="text/javascript">
</script>
</body>
</html>