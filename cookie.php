<?php
setcookie("user","sonu");
?>
<html>
<body>
<?php
if(!isset($_COOKIE["user"])){
	echo"sorry cookie is not found";
	}
	else{
	echo"cookie value:".$_COOKIE["user"];
	}

?>
</body>
</html>