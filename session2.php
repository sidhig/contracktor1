<?php
session_start();
?>
<html>
<body>
<?php
// $_SESSION["user"]="sidhig";
// echo"user is:".$_SESSION["user"];
  if (!isset($_SESSION['counter'])) {  
      $_SESSION['counter'] = 1;  
   } else {  
      $_SESSION['counter']++;  
   }  
   echo ("Page Views: ".$_SESSION['counter']);  
?>
</body>
</html>