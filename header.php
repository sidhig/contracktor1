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
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon3.ico"/>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" href="css/bootstrap-multiselect.css"> 
  
<link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  

 
 <script src="js/bootstrap-multiselect.js"></script> 
 
 <style>
    body{
  /*background-color: #d6dce2;*/
 }
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 86.5vh;}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      min-height: 100%;
      height: auto
    }
    
    /* Set black background color, white text and some padding */
   footer {
     width:100%;
      margin-top:.2vh;
      border: 1px solid #BBBBBB;
      height:auto;
      font-size:.9vw;
      padding: 1vh;
      background-color: white;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
    
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
/*    .row.content {
        height: 450vh;
    }*/
     .form-control {
         display:initial;
        height: 30px;
        padding: 3px 6px; 
    }  
    .col-sm-3{
            width: 20%;
    }
    .col-sm-9{
            width: 80%;
    }

  </style>
  
  <script>
     $(document).ready(function() {
      $('#area,#supervisor').multiselect({
        includeSelectAllOption: true,
        selectAllText: 'All',
         numberDisplayed: 1
      }); 
  
  $("#view").change(function(){ 
      view_change($("#view").val());
  });
  });
  </script>
 
 
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <!-- <a class="navbar-brand" href="#">Portfolio</a> -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <!-- <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><img src="image/cont.png" style="width: 15vw;margin-right: 67vw;"></li>
        <li><a href="#">Gallery</a></li>
        <li><a href="#">Contact</a></li>
      </ul> -->
     <ul class="nav navbar-nav navbar-right">
        <li><img src="image/cont.png" style="width: 15vw;margin-right: 67vw;"></li>
        <li><a href="" style="margin-left: -58px;"><b><?=" Welcome   ".$_SESSION["username"]?></b></a></li>
        <li><a href="logout.php"><span  style="margin-top: -2px;
    margin-right: -1px;"class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <ul class="nav nav-pills nav-stacked" style="margin-top:.2vh;">
        <li><a ><b style='margin-right: 2.5vw;'>View :</b>
                <select id="view" name="view"  class="form-control" style="width: 9.5vw;" >
                    <?
                        $r = $conn->query("select * from tbl_view order by name asc");
                        while($res = $r->fetch_object())
                        {?>
                        <option "<?=$res->name?>" <? if($res->name == 'Map'){ echo "selected";}?>> <?=$res->name?> </option>
                       <? }
                    ?>
                </select>
            </a></li>
        <li><a ><b style='margin-right: 2.5vw;'>Area :</b>
            <select id="area" name="area" multiple="multiple">
                    <?
                        $r = $conn->query("select * from tbl_area order by name asc");
                        while($res = $r->fetch_object())
                        {?>
                        <option <? if($res->name){ echo "selected";}?>> <?=$res->name?> </option>
                       <? }
                    ?>
                </select>

            </a>
        </li>
        <li><a><b>Supervisor : </b>
            <select id="supervisor" name="supervisor" multiple="multiple">
                    <?
                        $r = $conn->query("select * from tbl_supervisor order by name asc");
                        while($res = $r->fetch_object())
                        {?>
                        <option <? if($res->name){ echo "selected";}?>> <?=$res->name?> </option>
                       <? }
                    ?>
            </select>
          </a>
        </li>
      </ul>
    </div>

    <div class="col-sm-9">

    

