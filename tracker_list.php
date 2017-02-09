  <? 
  session_start();
  include_once('connect.php'); 
  ?>
  <!--<link rel="stylesheet" type="text/css" href="tracker.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
  
  <!--modal box-->
  <!--modal box-->
  <!--<script type="text/javascript" src="js/jquery.reveal.js"></script>modal box
  <script src="js/jquery.min.1.12.0.js"></script>-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.6.min.js"></script>
  <link rel="stylesheet" href="css/jquery.modal.css">
  <script src="js/jquery.modal.js"></script>
      <script>

// $(document).ready(function(){
//   $("#search_filter").on('input',function(){
//      $("#clearsearchtext").show();
//      filter_table($("#opco_filter option:selected").val(),
//       $("#primary_filter option:selected").val(),
//       $("#equipment_filter option:selected").val(),
//       $("#search_filter").val(),
//       $("#trackertype_filter option:selected").val(),
//       '',
//       '',
//       $("#tracker_body"));
//      if($("#search_filter").val()==''){
//       $("#clearsearchtext").hide();
//      }
//   });

//   $("#opco_filter,#primary_filter,#equipment_filter,#trackertype_filter").on('change', function() {
//      filter_table($("#opco_filter option:selected").val(),
//       $("#primary_filter option:selected").val(),
//       $("#equipment_filter option:selected").val(),
//       $("#search_filter").val(),
//       $("#trackertype_filter option:selected").val(),
//       '',
//       '',
//       $("#tracker_tbl_body"));
//   });

//    filter_table($("#opco_filter option:selected").val(),
//       $("#primary_filter option:selected").val(),
//       $("#equipment_filter option:selected").val(),
//       $("#search_filter").val(),
//       $("#trackertype_filter option:selected").val(),
//       '',
//       '',
//       $("#tracker_body"));
// });

// $("#clearsearchtext").on("click", function(){
//    $('#search_filter').val('');
//    $("#clearsearchtext").hide();
//    //$("#tracker_tbl_body").load('tracker_tbl_body.php');
//    filter_table($("#opco_filter option:selected").val(),
//       $("#primary_filter option:selected").val(),
//       $("#equipment_filter option:selected").val(),
//       $("#search_filter").val(),
//       $("#trackertype_filter option:selected").val(),
//       '',
//       '',
//       $("#tracker_body"));
//   });
 $("#new_tracker").click(function(){
    $("#tracker_load_spinner").show();
    $("#trip_sheet_div").load("tracker.php");  
    $("#trip_sheet_div").show();
   $( "#tracker_add_btn" ).hide();
       $("#tracker_load_spinner").hide();
  });
 
</script>
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
    //alert(req);
   $.ajax({
            type: "POST",
            url: "trace_query.php", 
            data: req,
            success: function(data) {
              alert(data);
               $("#track_add_spinner").html(data);
               $("#trip_sheet_div").html(""); 
        $("#trip_sheet_div").hide();
        $("#tracker_add_btn").show();
        $("#tracker_body").load('tracker_body.php');
              // $("#new_tracker_form")[0].reset();
            }
        });

    }
}
  /*function setattr(){
  //
  var selected = $("#equipment option:selected").val();
    if($("#equipment option:selected").val() =='Mobile Switch' || $("#equipment option:selected").val() =='Mobile Substation') {
    
   $(".tr_mobile").show();} 
    else
    {
     $(".tr_mobile").hide();
    }
  var selected = $("#ownedby option:selected").val();
    if($("#ownedby option:selected").val() =='Rental Company') {
    
   $(".tr_ren").show();} 
    else
    {
     $(".tr_ren").hide();
    }
}*/
  
function del_tracker(imei){
  if(confirm("Are you sure to delete this tracker with MEID DEC: "+imei+ "?")){
    $("#tracker_load_spinner").show(); 
      $.ajax({
        type: "POST",
        url: "trace_query.php",
        data: "del_qry=delete db_contracktor.tbl_device_det,db_admin.tbl_deviceinfo from `db_contracktor`.`tbl_device_det` INNER JOIN  `db_admin`.`tbl_deviceinfo` on  tbl_device_det.DeviceIMEI=tbl_deviceinfo.DeviceIMEI where tbl_deviceinfo.DeviceIMEI='"+imei+"';",
        success: function(data) {
          alert(data);
          $("#tracker_body").load('tracker_body.php');
          $("#tracker_load_spinner").hide();
        }
      });
  }
}
function edit_tracker(tsn){
    $("#tracker_load_spinner").show(); 
   
  $.ajax({
            type: "POST",
            url: "tracker_edit.php",
            data: "imei="+tsn,
            success: function(data) { 

         $("#track_add_spinner").html(data);
        $("#trip_sheet_div").html(data); 
        $("#trip_sheet_div").show();
        $("#tracker_load_spinner").hide();
            }
        });
  }

/*function config_tracker(tsn){
   $("#tracker_load_spinner").show();
     $.ajax({
            type: "POST",
            url: "add_conf_tracker.php",
            data: "imei="+tsn,
            success: function(data) {
        $("#trip_sheet_div").html(data); 
        $("#trip_sheet_div").show();
        $("#tracker_load_spinner").hide();
            }
        });
}*/

</script>
<style>
 body{
  background-color: #d6dce2;
 }
 td{
  padding-bottom: .8vh;
  text-align: center;
 }
  .stg{
    margin-left: 2vw;
    margin-right: 1vw;
   }
.sel{
  width:15vw;
  border-radius: 4px;
  padding: 6px 12px;
  height: 34px;
  border: 1px solid #ccc;
}
 .intp{
  width:15vw;
   border-radius: 4px;
  padding: 6px 12px;
  height: 34px;
  border: 1px solid #ccc;
  color: black;
}

.modal {
  width:40vw;
}
.modal a.close-modal {
    top: 0.5px;
    right: 0.5px;
  }
 
th {
    text-align: center;
  }

@media only screen and (max-width: 768px) {
    /* For mobile phones: */
   
    .intp {
        width: 100%;
    }
    .sel {
        width: 100%;
    }
  .modal {
  width:90vw;
  }
}
.btn{
  /*background: url(image/close.png) no-repeat;*/
}

 </style>
</head>
<body>
<button onclick="sch_back();" style="position: absolute; left: 2vw;margin-top: -4vh;">Back</button>
<!--<a href="Admin.php" class="btn btn-default" style="float:left;margin-top:-3vh;">Back</a><a href="tracker_add_form.php" rel="modal:open"></a>-->
<? //if($_SESSION['ROLE_can_edit']){ ?>
<input type="button" id='new_tracker' value="Add New Tracker"   class="btn btn-danger" style="color:black; margin-bottom:.3vh; padding: 1vh;" /><br>
<div id='tracker_load_spinner' style="color:red; clear: both; display:none;"><img src="image/spinner.gif" width="20px">Please wait...</div>
 <? //} ?>
  <center>
    <div id='tracker_loading' style="color:red; clear: both; display:none;"><img src="image/spinner.gif" width="20px">Please wait...</div>
 <table border="1" style="width:98%; margin-top:10px; font-size: smaller; ">
 
  <tr>
    <th>Tracker Name</th>
    <th>Driver Name</th>
    <th>Driver Phone #</th>
    <th>Tracker MEID DEC</th>
    <!-- <th>Equipment</th> -->
    <th>Tracker Type</th>
    <th>Area</th>
    <th>Supervisor</th>
    <th>is forwarded to gpc</th> 
    <th>edit/delete</th> 
  </tr>
 

   <tbody id="tracker_body">
<? include_once('tracker_body.php'); ?>
</tbody>
</table>
  </body>
  </html>