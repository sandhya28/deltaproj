<?php

  	$conn = mysql_connect('localhost','root','');
  	mysql_select_db('stallstop');

  	$idbuy = "";

  session_start();
  if(isset($_SESSION['username']))
  {
    
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $typeofuser = $_SESSION['usertype'];
  }

  if (isset($_GET['logout'])) 
  {
      
    session_unset();
    session_destroy();
     header('location:menswear.php');
   }

  	if(!$conn)
  	{
  		echo "failed to connect with the server";
  	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>StallStop:Shopping</title>
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
  .thumbnail
  {
    cursor: pointer;
  }
</style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

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
              <li><a href="stallstop.php" >HOME</a></li>

              <li><a href="menswear.php?wear=menswear" class="1">MEN'S CORNER</a></li>
              <li><a href="menswear.php?wear=womenswear" class="2">WOMEN'S CORNER</a></li>
              <li><a href="menswear.php?wear=kidswear-boys" class="3">KIDS CORNER</a></li>
 				<?php 
                if(isset($_SESSION['username']))
                {
              
                  echo '<li><a href = "stallstop.php?logout=true"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';

                }
                else
                {
                  echo '<li><a href="signuppage.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li><li><a href="loginpage.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                }
              
               if(isset($_SESSION['username']))
                {
                  echo '<li><a href="display.php"><span class="glyphicon glyphicon-user"></span><strong> '.$username.'</strong></a></li>';
                }?>

      			</ul>
    		</div>
  		</div>
	</nav>


<div class="container text-center bg-grey">
<div id="jsonchk">
  
</div>
</div>
 <?php 
 /* $rowtype = mysql_query("SELECT DISTINCT TYPE FROM stock"); 
  while ($rowname = mysql_fetch_assoc($rowtype))
  {
    $rowtype1 = $rowname['TYPE'];
    $rowdisp = strtoupper($rowtype1);
    echo "<p align = 'center'><strong>".$rowdisp."</strong><p><br>";
  $column = mysql_query("SELECT DISTINCT TYPE1 FROM stock");
  while ($columnname = mysql_fetch_assoc($column)) {
      $columntype = $columnname['TYPE1'];

      $result = mysql_query("SELECT * FROM stock WHERE type =\"$rowtype1\" AND type1 = \"$columntype\"")or die(mysql_error());
      while($row = mysql_fetch_assoc($result))     
      
      thumbout($row);
  }
  }

  function thumbout($row)
  	{
  		$count = 0;
  $type1 = "";
	$image = $row['PIC'];

	$imag = base64_encode($image);
	 /*if ($row['TYPE1']!=$type1) 
	 {
	 	$type1 = $row['TYPE1'];
	 	echo "<p id = \"type1\"><strong>".$type1."</strong><p><br>";
	 }*/

  	/*	$count++;
  		if($count%3==0)
  		{
  			echo '<div class="row text-center">';
  		}
 		echo '<div class="col-sm-4">
      			<div class="thumbnail" id = "'.$row['SNO'].'">
    				<p align=\'center\'><img style=\'display:block; width:200px;height:250px;\' id=\'base64image\'                 
       				src="data:image/jpeg;base64,'.$imag.'" ></p>
        			<p><strong><a>'.$row['BRAND'].'</a></strong></p>
        			<p>'.$row['DESCRIPTION'].'</p>
        			<p><strike>Rs.'.$row['OLDPRICE'].'</strike><br>Rs.'.$row['NEWPRICE'].'</p>';
 				 if(isset($_SESSION['username']))
                {
                  echo '<a href = "womenswear.php?idis=true&&no='.$row['SNO'].'&&buynow=true"><button type="submit" class="btn btn-danger" name=\''.$row['SNO'].' id = "confirmbuying"\'>BUY NOW</button></a>';
                }
  			             
        			
      	echo '</div>
    		</div>';
    	if ($count%3==0) 
    	{
    		echo "</div>";
    	}
  	}*/


?>
<?php
  if (isset($_GET['wear'])&&($_GET['wear']=="menswear")) {
    echo "<script>
            var url='';
            $('li a').removeClass('activemem');
            $('.1').addClass('activemem');
            url='testjson.php?type=men';
          </script>";
  }

  if (isset($_GET['wear'])&&($_GET['wear']=="womenswear")) {
    echo "<script>
            var url='';
            $('li a').removeClass('activemem');
            $('.2').addClass('activemem');
            url='testjson.php?type=women';
          </script>";
  }

  if (isset($_GET['wear'])&&($_GET['wear']=="kidswear-boys")) {
    echo "<script>
            var url='';
            $('li a').removeClass('activemem');
            $('.3').addClass('activemem');
            url='testjson.php?type=kids';
          </script>";
  }


?>
<script type="text/javascript">

$.getJSON(url,function(data){
  
$.each(data, function(i,user){            
console.log("success");

if(i%3==0)
      {
       document.getElementById('jsonchk').innerHTML+= '<div class="row text-center">';
      }

console.log("successwriting");
if(<?php echo (isset($_SESSION['username'])&&($typeofuser)=="public")?'true':'false'; ?>)
{
  document.getElementById('jsonchk').innerHTML+='<div class="col-sm-4"><div class="thumbnail" onclick = "fun('+user['SNO']+')"><p align=\'center\'><img src="'+user['FILENAME']+'"></p><p><strong><a>'+user['BRAND']+'</a></strong></p><p>'+user['DESCRIPTION']+'</p><p><strike>Rs.'+user['OLDPRICE']+'</strike><br>Rs.'+user['NEWPRICE']+'</p><a href = "womenswear.php?idis=true&&no='+user['SNO']+'&&buynow=true"><button type="submit" class="btn btn-danger" name=\''+user['SNO']+' id = "confirmbuying"\'>BUY NOW</button></a></div></div>';
 // document.getElementById('jsonchk').innerHTML+='<a href = "womenswear.php?idis=true&&no='+user['SNO']+'&&buynow=true"><button type="submit" class="btn btn-danger" name=\''+user['SNO']+' id = "confirmbuying"\'>BUY NOW</button></a></div></div>';
  console.log("readsuccess");
}
else
{
  document.getElementById('jsonchk').innerHTML+='<div class="col-sm-4"><div class="thumbnail" onclick = "fun('+user['SNO']+')"><p align=\'center\'><img src="'+user['FILENAME']+'"></p><p><strong><a>'+user['BRAND']+'</a></strong></p><p>'+user['DESCRIPTION']+'</p><p><strike>Rs.'+user['OLDPRICE']+'</strike><br>Rs.'+user['NEWPRICE']+'</p>';
}
    //document.getElementById('jsonchk').innerHTML+='</div></div>';
if(i%3==0)
{
  document.getElementById('jsonchk').innerHTML += '</div>';
}

});
});
  


 function fun(id){
    
    window.location.href = 'womenswear.php?idis=true&&no='+id;
  }

</script>
</body>
</html>