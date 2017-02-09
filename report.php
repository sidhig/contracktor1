<? 
session_start(); 
include_once('connect.php'); ?>
<div id="reports" style="">
<center><h3>Reports</h3></center>

<center>

           
            <a href="report_form.php" target="blank"><input type="button" class="btn btn-danger" value="Daily Report" style="width: 15vw; height:5vh; color:black; margin: 5px;"><br><br>
           
         
</a></center><a href="stop_report_form.php" target="blank">
</a></div>

// <script>
// function sch_back() {
//   //alert('test');
//   $("#spin_loading").show();
//   $("#admin").load('admin.php');
//   //$("#spin_loading").hide();
// }
// function show_tracker_mgmt(){
//       $("#user_btn,#hrchy_btn").hide();
//     $("#tracker_mgmt_btn").hide();
//     $("#setting_btn").hide();
//     $("#tracker").show();
//     $("#tracker_conf_btn").hide();
//     $("#user_role").hide();
//     $("#tracker").html("");
//     $("#tracker").load('tracker_list.php');
// }


// function show_user(){
//       $("#user_btn,#hrchy_btn").hide();
//     $("#tracker_mgmt_btn").hide();
//     $("#setting_btn").hide();
//     $("#tracker_conf_btn").hide();
//     $("#user").show();
//     $("#user_role").hide();
//     //$("#tracker").html("");
//     $("#user").load('user_details.php');
// }
// /*function showsetting(){
//     $("#tracker_mgmt_btn,#hrchy_btn").hide();
//      $("#user_btn").hide();
//     $("#setting_btn").hide();
//     $("#settings").show();
//     $("#user_role").hide();
//     $("#tracker_conf_btn").hide();
// }
// */
// function set_close(){
//     $("#settings").hide();
//     $("#tracker_mgmt_btn").show();
//     $("#setting_btn").show();
//      $("#user_btn").show();
//      $("#tracker_conf_btn").show();
//      $('#hrchy_btn').show();
//      $("#user_role").hide();
// }

// </script>
<!-- <div id='report' style="display:none; margin-top: 3vh;" >
<center><img src='image/spinner.gif'> <strong>Please wait while getting Reports...</strong></center>
</div> -->
