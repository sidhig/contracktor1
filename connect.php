<?
 error_reporting(0);
$db = $_SESSION['db_name'];
//$conn = new mysqli('localhost', 'root', '', $db);
 $conn = new mysqli('132.148.86.127', 'contracktor', 'Uve52^s6', $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   }
?>