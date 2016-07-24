<?php

header('Content-Type: application/json');

$conn = mysql_connect('localhost','root','');
mysql_select_db('stallstop');

$sql="";
$var = array();
if($_GET['type']=="men")
{
 $sql = "SELECT * FROM stock WHERE TYPE='menswear'";
}
if ($_GET['type']=="women") {
 $sql = "SELECT * FROM stock WHERE TYPE='womenswear'";
}
if ($_GET['type']=="kids") {
$sql = "SELECT * FROM stock WHERE TYPE='kidswear-boys'";
}
$result = mysql_query($sql);

while($obj = mysql_fetch_assoc($result)) {


$var[] = $obj;

}

echo json_encode($var);

/*
if($_GET['type']=="women")
{
 $sql = "SELECT * FROM stock WHERE TYPE='womenswear'";

$result = mysql_query($sql);

while($obj = mysql_fetch_assoc($result)) {
$obj1 = $obj;
$img = base64_encode($obj['PIC']);

$obj1['PIC']=$img;

$var[] = $obj1;

}

echo '{"women":'.json_encode($var).'}';
}*/
//make men women and children load separately using get requests
?>
