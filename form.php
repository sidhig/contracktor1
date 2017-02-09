<? session_start();
include'connect.php';

If(isset($_REQUEST['submit'])!='')
{
  If($_REQUEST['DeviceName']=='' || $_REQUEST['DeviceIMEI']=='' || $_REQUEST['DevicePhone']==''|| $_REQUEST['driver_name']==''|| $_REQUEST['driver_phone']=='' || $_REQUEST['tag']==''|| $_REQUEST['odometer']=='')
{
Echo "please fill the empty field.";
}
Else
{
 
  $sql = "INSERT INTO  `tbl_device_det` (`DeviceName`, `DeviceIMEI`,  `DevicePhone`,  `odometer`, `driver_name`, `driver_phone`, `tag`,  ) VALUES('".$_REQUEST['DeviceName']."', '".$_REQUEST['DeviceIMEI']."', '".$_REQUEST['DevicePhone']."', '".$_REQUEST['driver_name']."''".$_REQUEST['driver_phone']."''".$_REQUEST['tag']."''".$_REQUEST['odometer']."')" ;
    $result=$conn->query($sql);
    echo $result;
 } 
}
?>


<html>
<head>
  </head>
<body>
  
    <center>
      <div class="container">
        <div class="row>"
      <label style="font-size:16px;font-weight:bold;margin-top:30px">Add Tracker</label>
       <br> <br>
    <form class="form-horizontal" method="POST"  id="mytracker">

   <!-- <div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic"> Area:</label>
  <div class="col-md-4">
    <select id="area"  class="form-control input-md">
       
  </div>
</div> -->
  <!-- <div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic"> Supervisior:</label>
  <div class="col-md-4">
    <select id="supervisior"  class="form-control input-md">
      
      
    </select>
  </div>
</div> -->
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Tracker Name:</label>  
  <div class="col-md-4">
  <input id="DeviceName"  value="" type="text" placeholder="Tracker Name" class="form-control input-md" required=""> 
  </div>
</div><br>
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Driver Name:</label>  
  <div class="col-md-4">
  <input id="driver_name" type="text" value="" placeholder="Driver Name" class="form-control input-md" required=""> 
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Driver Phone:</label>  
  <div class="col-md-4">
  <input id="driver_phone"  value="" type="text" placeholder="Driver Phone:" class="form-control input-md" required="">
  </div>
</div><br>
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Tracker IMEI:</label>  
  <div class="col-md-4">
  <input id="DeviceIMEI"   value=""  type="text" placeholder="Tracker IMEI:" class="form-control input-md" required=""> 
  </div>
</div>

 <div class="form-group">
  <label class="col-md-4 control-label" for="fn">Tracker Phone:</label>  
  <div class="col-md-4">
  <input id="DevicePhone"  value="" type="text" placeholder="Tracker Phone:" class="form-control input-md" required="">  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Tag #:</label>  
  <div class="col-md-4">
  <input id=" tag"  value=""  type="text" placeholder="Tag #:" class="form-control input-md" required=""> 
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Odometer:</label>  
  <div class="col-md-4">
  <input id="Odometer"  value="" type="text" placeholder="Odometer:" class="form-control input-md" required="">
  </div>
</div>

 <div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Is Forwarded to gpc:</label>
  <div class="col-md-4">
    <select id="UserName"  class="form-control input-md">
      <option value=""><!--select section--></option>
       <option  value="Disable" selected>Disable</option>
       <option value="">Enable</option>
      
    </select>
  </div>
</div>
  </form> 
</div>
<br><br>
<input type="submit" name="Add Trackert" value="submit">
 <!--  <input type="button" class="btn-danger" value="submit" name="Add Tracker" id="add_tracker" > -->
  <input type="button" class="btn-danger"  value="Close" onclick='$("#tracker").show();'>
</div>

</center>
</body>
</html>