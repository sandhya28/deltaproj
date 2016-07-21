<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div id="jsonchk"></div>
</body>
<script type="text/javascript">
$(document).ready(function(){

var url="testjson.php";

$.getJSON(url,function(data){
	
$.each(data, function(i,user){
var k=user.TYPE;
console.log(user.TYPE);
if(i%3==0)
  		{
  			console.log(i);
  			document.getElementById('jsonchk').innerHTML+= '<div class="row text-center">';
  		}
document.getElementById('jsonchk').innerHTML+='<div class="col-sm-4"><div class="thumbnail" id = "'+user['SNO']+'"><p align=\'center\'><img style\'display:block; width:200px;height:250px;\' id=\'base64image\'src="data:image/jpeg;base64,'+user['PIC']+'" ></p><p><strong><a>'+user['BRAND']+'</a></strong></p><p>'+user['DESCRIPTION']+'</p><p><strike>Rs.'+user['OLDPRICE']+'</strike><br>Rs.'+user['NEWPRICE']+'</p></div></div>';
if(i%3==0)
{
	document.getElementById('jsonchk').innerHTML += '</div>';
}

});
});
});
</script>
</html>
