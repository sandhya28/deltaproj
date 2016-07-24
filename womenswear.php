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

  if(isset($_GET['idis']))
  {

  	$idbuy = $_GET['no'];

    	$result = mysql_query("SELECT * FROM stock WHERE SNO =$idbuy")or die(mysql_error());
    	$res = mysql_fetch_array($result);
       $weartype=mysql_query("SELECT TYPE FROM stock where SNO=$idbuy");
  $weartype=mysql_fetch_assoc($weartype);
 
    	
		echo  '	<div class="displaydiv">
    				<p align = "center"><p id = "img"><img src="'.$res['FILENAME'].'" width=326vw height=440vw></p>
              <div class="col-sm-4" class = "display">
        			<p><strong><a>'.$res['BRAND'].'</a></strong></p>
        			<p>'.$res['DESCRIPTION'].'</p>
        			<p><strike>Rs.'.$res['OLDPRICE'].'</strike><br>Rs.'.$res['NEWPRICE'].'</p>';
  }
if (isset($_SESSION['username']))
if (isset($_GET['confirm'])&&$usertype=="public")
 {
 	$idbuy = $_GET['sno'];
 	 $weartype=mysql_query("SELECT TYPE FROM stock where SNO=$idbuy");
  $weartype=mysql_fetch_assoc($weartype);
  if(isset($_SESSION['username']))
  {
	$results = mysql_query("SELECT * FROM stallstop WHERE password =\"$password\" AND username = \"$username\" ");
	$buyer = mysql_fetch_array($results);
	$addr = $buyer['ADDRESS'];
	$phoneno = $buyer['PHONENO'];
	$idno = $buyer['ID'];

	mysql_query(" INSERT INTO myorder 
							VALUES (NULL,
									'$idno',
									'$username',
									'$idbuy',
									'$addr',
									'$phoneno',
                  'PENDING'
							 		) ") or die(mysql_error()) ;
  
	echo "<script>alert('ORDER PLACED');
	document.location = 'menswear.php?wear=".$weartype['TYPE']."';
	</script>";
}
}
if (isset($_SESSION['username']))
{ if(isset($_GET['buynow']))
{
      echo '<a href="womenswear.php?confirm=true&&sno='.$idbuy.'"><button type="button" id ="confirm" class="btn btn-success">Confirm</button></a>
    <a href="menswear.php?wear='.$weartype['TYPE'].'"><button type="button" id="cancel" class="btn btn-info">Cancel</button></a></div></p></div>';
}
else if (!isset($_SESSION['buynow']))
echo '<a href="menswear.php?wear='.$weartype['TYPE'].'"><button type="button" class="btn btn-success">Back</button></a></div></p></div>';
}
else if (!isset($_SESSION['buynow']))
echo '<a href="menswear.php?wear='.$weartype['TYPE'].'"><button type="button" class="btn btn-success">Back</button></a></div></p></div>';
?>
<!DOCTYPE html>
<html>
<head>
	<title>StallStop:Confirm</title>
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

</body>
</html>