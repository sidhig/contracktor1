<? 
 session_start();
include'connect.php';
if ($result = $conn->query("select * from tbl_device_det where DeviceIMEI = '".$_REQUEST['imei']."'")) { 
        $obj = $result->fetch_object();
        //echo $obj;
  }
?>
<html lang="en">
<head>
  <title>tracker</title>
 <link rel="shortcut icon" type="image/x-icon" href="image/favicon3.ico"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">

<link rel="stylesheet" href="css/bootstrap.min.css">

<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<!-- multiselect-->
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">

<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>

</head>
<body>
  
    <center>
      <div class="container" id="modal"style="position: fixed; top: 0; right: 0; bottom: 0; left: 0; width: 100%; height: 100%; overflow: auto;
    z-index: 3; padding: 20px; box-sizing: border-box; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.75); text-align: center;font-weight: bold;
    margin-top: 30px;
    color: grey;
    border: 1px solid;
    background: white;
    font-size: 1.5rem;
    width: 50%;
    border-radius: 15px;
    padding: 16px;
    border: 2px solid #969090;">
        <div class="row>"
      <label style="font-size:16px;font-weight:bold;margin-top:30px;color:grey;">Edit Tracker</label>
       <div id='track_add_spinner' style="color:red; clear: both; display:none;font-weight: bold;
    margin-top: 30px;
    color: grey;
     margin-left:50px;
   
    background: white;
    font-size: 1.5rem;
    width: 50%;
    border-radius: 15px;
    padding: 16px;
    border: 2px solid #969090;"><img src="image/spinner.gif" width="20px">Please wait...</div>
       <br> <br>
    <form class="form-horizontal" id='new_tracker_form' name="new_tracker_form">

   <div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic"> Area:</label>
  <div class="col-md-4">
    <select id="area" name="area" class="form-control input-md" style="background-color:#D3D3D3;">
       <?  
                  $sql = $conn->query("select * from tbl_area order by name asc");
                  while($obj_role = $sql->fetch_object()){
              ?>
                  <option <?=($obj->opco==$obj_role->name)?'selected':''?> ><?=$obj_role->name?></option>
              <?   } 
              ?>
      
    </select>
  </div>

</div>
  <div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic"> Supervisior:</label>
  <div class="col-md-4">
    <select id="supervisior" name="supervisior" class="form-control input-md" style="background-color:#D3D3D3;" >
     <?  
                  $sql = $conn->query("select * from tbl_supervisor order by name asc");
                  while($obj_role = $sql->fetch_object()){
              ?>
                  <option <?=($obj->primary==$obj_role->name)?'selected':''?> ><?=$obj_role->name?></option>
              <?   } 
              ?>
      
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Tracker Name:</label>  
  <div class="col-md-4">
  <input id="trackername" name="trackername"  value='<?=($obj->DeviceName)?>' type="text" placeholder="Tracker Name" class="form-control input-md" required=""> 
  </div>
</div><br>
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Driver Name:</label>  
  <div class="col-md-4">
  <input id="drivername" name="drivername" type="text" value='<?=($obj->driver_name)?>' placeholder="Driver Name" class="form-control input-md" required=""> 
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Driver Phone:</label>  
  <div class="col-md-4">
  <input id="driverphone" name="driverphone" value='<?=($obj->driver_phone)?>' type="number" placeholder="Driver Phone:" class="form-control input-md" required="">
  </div>
</div><br>
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Tracker IMEI:</label>  
  <div class="col-md-4">
  <input id="trackerimei" name="trackerimei"  value='<?=($obj->DeviceIMEI)?>' type="text" placeholder="Tracker IMEI " readonly class="form-control input-md" required=""> 
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Tracker Type:</label>
  <div class="col-md-4">
    <select id="trackertype" name="trackertype"  class="form-control input-md" style="background-color:#D3D3D3;">
       <?
           $result = $conn->query("SELECT OBDType FROM `tbl_device_det` group by OBDType");
           while($vehicle  = $result->fetch_object())
           {
          ?>
           <option <?=($vehicle->OBDType==$obj->OBDType)?'selected':''?> ><?=$vehicle->OBDType?></option>
          <?  } 
          ?>
    </select>
  </div>
</div>
 <div class="form-group">
  <label class="col-md-4 control-label" for="fn">Tracker Phone:</label>  
  <div class="col-md-4">
  <input id="trackerphone" name="trackerphone"  value='<?=($obj->DevicePhone)?>' type="number" placeholder="Tracker Phone:" class="form-control input-md" required="">  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Tag #:</label>  
  <div class="col-md-4">
  <input id="tag" name="tag"  value='<?=($obj->tag)?>'  type="text" placeholder="Tag #:" class="form-control input-md" required=""> 
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Odometer:</label>  
  <div class="col-md-4">
  <input id="odometer" name="odometer"  value='<?=($obj->odometer)?>' type="text" placeholder="Odometer:" class="form-control input-md" required="">
  </div>
</div>

 <div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Is Forwarded to gpc:</label>
  <div class="col-md-4">
    <select id="isforwardedtogpc" name="isforwardedtogpc"  class="form-control input-md" style="background-color:#D3D3D3;">
       <option  value='0' <? if($obj->isforwardedtogpc=='0'){ ?> selected <? } ?>>Disable</option>
                   <option  value='1' <? if($obj->isforwardedtogpc=='1'){ ?> selected <? } ?>>Enable</option>
      
    </select>
  </div>
</div> 
<input type='hidden'  name='qry_type' value='edit'>
  </form> 
</div>
<br><br> 
       
         <input onclick='validateForm()' type='button'  value="Save Tracker" class="btn btn-danger" style="margin-bottom:1vh;height:5vh;">  
        <a onclick='$("#trip_sheet_div").hide();$("#trip_sheet_div").html("");' ><input type="button" class="btn btn-danger" value="Close"  style="margin-bottom:1vh;height:5vh;"></a><br>
</div>

</center>

    
    
</body>
</html>
