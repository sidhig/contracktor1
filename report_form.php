<?
session_start();
include_once('connect.php');
$cur_date= date("Y/m/d");
$date = date_create($cur_date);
date_modify($date, '-1 day');
?>

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
      height: auto;
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
     
  .ScrollStyle
  {
    min-height: 550px;
    max-height: 550px;
    overflow-y: scroll;
  }

  </style>
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
        <li><img src="image/cont.png" style="width: 15vw;margin-right: 80vw;"></li>
        <!-- <li><a href=""><b><?=" Welcome   ".$_SESSION["username"]?></b></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li> -->
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <form id="get_stop_report" >
      <ul class="nav nav-pills nav-stacked" style="margin-top:.2vh;">
        <li><a><b style="margin-right: 2.5vw;">Driver : </b>
      <input list="browsers" class="intp" style="width: 11.5vw;" id="driver_name" >
             <input type="hidden" name="driver_name" id="hidden_driver_name">   
            </a>
            <datalist id="browsers">
              <?
       
          $res = $conn->query("select if(driver_name = '' ,concat(trim(DeviceName ),'(DNM)'), concat(trim(driver_name),'(',trim(DeviceName),')')) as Deviceanddriver,DeviceName, DeviceIMEI from tbl_device_det order by driver_name");
               while($cam = $res->fetch_object())
               {
               ?><option data-value="<?=$cam->DeviceIMEI?>" value="<?=$cam->Deviceanddriver?>" >
               
               
              <?  }  //$con->close();   ?>
            </dtalist></li>

        <li><a ><b style='margin-right: 2.5vw;'>For Date:</b>
            <input type="date"  id="for_date" name="for_date" value= "<?  echo date_format($date, 'Y-m-d'); ?>" />  
            </a>
        </li>
        <li>
          <a>
        <input type="button"  onclick=" validateForm()" value="Get Report"  class="btn btn-info" style="margin-left: 6vw; color:black;"/><input type="button" onclick="window.close()" value="Back"  class="btn btn-info" style="float:left;  color:black;margin-top:-33px;" />
      </a>
    </li>
      </ul>
    </form>
</div>
    
<script>
    $("#driver_name").on('input', function() {
        var data = {};
        $("#browsers option").each(function(i,el) {  
               data[$(el).data("value")] = $(el).val();
        });
        console.log(data, $("#browsers option").val());
        var value = $('#driver_name').val();
        //alert(value);
        if(typeof ($('#browsers [value="' + value + '"]').data('value')) === "undefined")
        {
              
        }
        else
        {
              
              var v_imei = ($('#browsers [value="' + value + '"]').data('value'));
              $("#hidden_driver_name").val(v_imei);
              
        }

    });
    
    function validateForm() {
      if (($( "#for_date" ).val() == "") || ($( "#from_time" ).val() == "")) {
      alert("All fields must be filled out");
      return false;
      }
      else if ($( "#hidden_driver_name" ).val() == "") {
      alert("Please select Driver");
      return false;
      }
      else { 

        //$("#get_stop_report").show();
        var date= $("#for_date").val();
        var driver_name = $("#hidden_driver_name").val();
        //alert(date);

        /*$.ajax({ 
          url:'report1.php',
          type:'post',
          data:"timestamp="+date+"&imei="+driver_name
        }).done(function(data){ 
          //$('#report_data').html('');
          //$('#report_data').html(data);
          $('#test').val(data);
           //$("#report_data").html('get_stop_report.php');
        });*/
        $.ajax({ 
          url:'get_stop_report.php',
          type:'post',
          data:"timestamp="+date+"&imei="+driver_name
        }).done(function(data){ //alert(data);
            $('#report_data').html(data);
        });

      }
  //     
}


    </script>


       <div class="col-sm-9">
           <div class="ScrollStyle" id="report_data">
           </div>
        
      </div>

 
</div>
</div>

<? include_once('fotter.php'); ?>
</body>
</html>

    

