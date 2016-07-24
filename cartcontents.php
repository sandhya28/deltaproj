<?php

$conn = new mysqli('localhost','root','','stallstop');

session_start();
if(isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$typeofuser = $_SESSION['usertype'];
}
else
{
	header("location:stallstop.php");
}
if($typeofuser=="admin")
{
	header("location:stallstop.php");
}
$stmt = $conn->prepare("SELECT * FROM myorder WHERE (STATUS = ? AND USERNAME = ?) ORDER BY ORDERNO DESC");
$stmt->bind_param('s', 'PENDING','s', $username);
$stmt->execute();
$result = $stmt->get_result();
//$cartcontent = mysql_query("") or die(mysql_error());

echo "<table><tr><th>ORDER NO</th><th>TYPE</th><th>SUBTYPE</th><th>BRAND</th><th>DESCRIPTION</th><th></th></tr>";

while($cart = mysqli_fetch_assoc($cartcontent))
{
	$sno = $conn->prepare("SELECT * FROM stock WHERE SNO = ?");
	$sno->bind_param('i', $cart['SNO']);
	$sno->execute();
	$snodata = $sno->get_result();
	
	$snodata = mysqli_fetch_assoc($sno);
	echo '<tr><td>'.$cart['ORDERNO'].'</td><td>'.$snodata['TYPE'].'</td><td>'.$snodata['TYPE1'].'</td><td>'.$snodata['BRAND'].'</td><td>'.$snodata['DESCRIPTION'].'</td><td><button type="button" id ="'.$cart['SNO'].'" class="btn btn-success">CANCEL</button></td></tr>';
}
echo "</table>";

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<script type="text/javascript">
	
</script>
</html>