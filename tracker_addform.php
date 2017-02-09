<? 
 session_start();
include'connect.php';
?>
<html lang="en">
<head>
  <title>tracker</title>
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
      <div class="container">
        <div class="row>"
      <label style="font-size:16px;font-weight:bold;margin-top:30px">Add Tracker</label>
       <div id='track_add_spinner' style="color:red; clear: both; display:none;"><img src="image/spinner.gif" width="20px">Please wait...</div>
       <br> <br>
    <form class="form-horizontal" id='new_tracker_form' name="new_tracker_form">

   <div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic"> Area:</label>
  <div class="col-md-4">
    <select id="area" name="area" class="form-control input-md">
      <?  
                  $sql = $conn->query("select * from tbl_area order by name asc");
                  while($obj = $sql->fetch_object()){
              ?>
                  <option  ><?=$obj->name?></option>
              <?   } 
              ?>
      
    </select>
  </div><!-- while ($row = mysql_fetch_array($result))
                                        {
                                            echo "<option value='".$row['id']."'>'".$row['category']."'</option>";
                                        } -->

</div>
  <div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic"> Supervisior:</label>
  <div class="col-md-4">
    <select id="supervisior" name="supervisior" class="form-control input-md">
     <?  
                  $sql = $conn->query("select * from tbl_supervisor order by name asc");
                  while($obj = $sql->fetch_object()){
              ?>
                  <option  ><?=$obj->name?></option>
              <?   } 
              ?>
      
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Tracker Name:</label>  
  <div class="col-md-4">
    <!-- <input type='hidden' name='qry_type' value='new'> -->
  <input id="trackername" name="trackername"  value="" type="text" placeholder="Tracker Name" class="form-control input-md" required=""> 
  </div>
</div><br>
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Driver Name:</label>  
  <div class="col-md-4">
  <input id="drivername" name="drivername" type="text" value="" placeholder="Driver Name" class="form-control input-md" required=""> 
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Driver Phone:</label>  
  <div class="col-md-4">
  <input id="driverphone" name="driverphone" value="" type="number" placeholder="Driver Phone:" class="form-control input-md" required="">
  </div>
</div><br>
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Tracker IMEI:</label>  
  <div class="col-md-4">
  <input id="trackerimei" name="trackerimei"  value=""  type="text" placeholder="Tracker IMEI:" class="form-control input-md" required=""> 
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Tracker Type:</label>
  <div class="col-md-4">
    <select id="trackertype" name="trackertype"  class="form-control input-md">
      <?
           $result = $conn->query("SELECT OBDType FROM `tbl_device_det` group by OBDType");
           while($vehicle  = $result->fetch_object())
           {
          ?>
           <option <? if($vehicle->OBDType=='OBDII'){ echo 'selected'; } ?> > <?=$vehicle->OBDType?></option>
          <?  } 
          ?>
    </select>
  </div>
</div>
 <div class="form-group">
  <label class="col-md-4 control-label" for="fn">Tracker Phone:</label>  
  <div class="col-md-4">
  <input id="trackerphone" name="trackerphone"  value="" type="number" placeholder="Tracker Phone:" class="form-control input-md" required="">  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Tag #:</label>  
  <div class="col-md-4">
  <input id="tag" name="tag"  value=""  type="text" placeholder="Tag #:" class="form-control input-md" required=""> 
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="fn">Odometer:</label>  
  <div class="col-md-4">
  <input id="odometer" name="odometer"  value="" type="text" placeholder="Odometer:" class="form-control input-md" required="">
  </div>
</div>

 <div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Is Forwarded to gpc:</label>
  <div class="col-md-4">
    <select id="isforwardedtogpc" name="isforwardedtogpc"  class="form-control input-md">
      <option value=""><!--select section--></option>
       <option  value="0" selected>Disable</option>
       <option value="1">Enable</option>
      
    </select>
  </div>
</div>
  </form> 
</div>
<br><br>
  <input type='hidden' id='qry_type' name='qry_type' value='add'>
         
       
         <input onclick='validateForm();' type='button' value="Add Tracker" class="btn btn-warning" style="margin-bottom:1vh;height:5vh;"> 
        <a onclick="window.location.href='admin.php'" ><input type="button" class="btn btn-warning" value="Close"  style="margin-bottom:1vh;height:5vh;"></a><br>
</div>

</center>
<script>
function validateForm(){
    if ($("#trackername").val().trim() == ''){
        alert('Please Fill Tracker Name');
        $("#trackername").focus();
        
      }
      else if ($("#trackerimei").val().trim() == ''){
        alert('Please Fill Tracker MEID DEC');
        $("#trackerimei").focus();
        
      }
      else if ($("#trackerphone").val().trim() == ''){
        alert('Please Fill Tracker Phone');
        $("#trackerphone").focus();
        
      }
    else {
     $("#track_add_spinner").show();
     var req = $('#new_tracker_form').serialize();
     alert(req);
   $.ajax({
            type: "POST",
            url: "tracker_query.php",
            data: req,
            success: function(data) {
        // alert(data);
        
            }
        });
    }
}
    </script>
    
    
</body>
</html>
