<?php
	  	$conn = mysql_connect('localhost','root','');
  	mysql_select_db('stallstop');

$select = mysql_query("SELECT * FROM stock");
while($row = mysql_fetch_assoc($select))
{
	file_put_contents('\images\ '+$row['SNO']+'.jpg', $row['PIC']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<img src="images/ 2.jpg">
</body>
</html>