<?
session_start();
include_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contractor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" href="css/bootstrap-multiselect.css"> 
  
<link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
 <script src="js/bootstrap-multiselect.js"></script> 
 
 <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {min-height: 70vh}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      min-height: 85.5%;
    }
    
    /* Set black background color, white text and some padding */
   footer {
      margin-top:.2vh;
      border: 1px solid #BBBBBB;
      height:auto;
      font-size:.9vw;
      padding: 1vh;
    }
     .int {
    /* display: block; */
    width:9.5vw;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
   }
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
       
    }
    
   @media only screen and (max-width: 768px) {
        .int {
        width: 30vw;
    }
   
}

  </style>


</head>
<body>
 <div class="col-sm-9" > 
   <center><input type="button" value="Tracker Management" onclick="window.location.href='tracker.php'" class="btn btn-danger" style="width:20vw; height:4rem; color:black;margin-top:3rem;" /><br /></center>
</div>
</body>
</html>

    

