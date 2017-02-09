<?php
session_start();
?>
<html>
<body>
<?php
$_SESSION["user"]="sidhig";
echo"session information are set successfully.<br/>";
?>
<a href="session2.php">Visit next page</a>  
</body>
</html>