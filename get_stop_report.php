<?
session_start();
include_once('connect.php');
$array = $_POST;
$array_val=array_values($array)[0];
$array_val2=array_values($array)[1];
//echo $array_val;
//echo $array_val2;
///print_r($_POST);


?>
 <?date_default_timezone_set('US/Eastern');?>


<html>
<head>
	<script>
$(document).ready(function(){ //alert(data); 
	var timestamp = '<? echo $array_val; ?>' ;
	var IMEI = '<? echo $array_val2; ?>';
	$.ajax({ //alert(data);
		type:'post',
		url:'report1.php',
		data:'timestamp='+timestamp+'&imei='+IMEI
	}).done(function(data){ 
		//alert(data);
		var data_arr = data.split(',');
		//$('#1').html('<b>'+data_arr[0]);
		$('#2').html('<b>'+data_arr[1]);
		$('#3').html('<b>'+data_arr[2]);
		$('#4').html('<b>'+data_arr[3]);
		$('#5').html('<b>'+data_arr[9]);
		$('#6').html('<b>'+data_arr[4]);
		$('#7').html('<b>'+data_arr[10]);
		$('#tab_list_spinner').show();
	});
	  var trHTML = '<tr>';
	  
	$.ajax({
		type:'post',
		url:'reporttemp.php',
		data:'timestamp='+timestamp+'&imei='+IMEI
	}).done(function(data){ //alert(data);
		var res_str = data.replace(/##+$/g,"");//alert(res_str);
		$.each(res_str.split('##'), function( index, value ) {
			if(index % 6 == 0){
			  trHTML +='</tr><tr>'
			}
			
		  trHTML += '<td style="text-align:center;color:black;">' + value + '</td>';
		  
		});
		$('#records_table').append(trHTML);
		$('#tab_list_spinner').hide(); 
		$('#records_table').show();
	});
	
});
 </script>
<style>
 html, body, #map-canvas {
				height: 100%;
				margin: 0px;
				padding: 0px
			  }
.trip{
margin:10px;
border:2px solid black;
padding:10px;
font-weight:600;
align:center;
}
div#cost input{
width:90px;
}
footer {
      color:black;
      padding-top: 1vh;
      padding-bottom: 0vh;
      background-color: white;
      border: 1px solid #BBBBBB;
      width:100%;
    }
th{
	text-align: center;
	padding-bottom: 3vh;
	font-weight: initial;
}
#report_head{
	color: white;
    background-color: #49b5e4;
    padding: 0.1vh;
    width: 20vw;
    height: 6vh;
    text-align: center;
}
#report_head1{
    background-color: #49b5e4;
    width: 75vw;
    height: 1.2vh;
}
  


</style>
<script type="text/javascript" src="js/jquery.min.1.12.0.js"></script>
</head>
<body>

<!-- <div class="col-sm-9"> -->

	
		 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaL0ieAkLhzy1rDoLifajeowdXPwTvzmI"></script>
 
      <!-- <form id="report_data" > -->
<center>
	<!-- <div id="container" style="width:70%;height:auto;">
<div id="wrappermap" style="width:98%;height:auto;">
</div></div> -->
</center>
<h2 style="color:#2196F3;">Daily Report</h2>
<h4 style="color:#2196F3;">Created:<? echo date("m/d/y h:i:sa"); ?></h4>
<?
 $result = $conn->query("select driver_name from tbl_device_det where OBDType = 'OBDII' and DeviceIMEI ='".$_POST["driver_name"]."'")->fetch_object(); 
 ?>
<h4 style="color:#2196F3;"><? ?><?=$result->driver_name?></h4>

<div id="report_head">
<h4>Report Totals for: <? echo $array_val; ?> 
</h4>
</div>
<div id="report_head1">
</div>
<style>
.tb_span{
	font-size:small;
	display:none;
}
.table{
	width: 90%;
	border-color: none;
	color:#2196F3;
}
#main_det>tbody>tr>td{
	width:9vw;
	border-top: none;
	
}
#records_table>tbody>tr>td{
    border-top: 1px solid #49b5e4;
    border-right: 1px solid #49b5e4;
	border-bottom: 1px solid #49b5e4;
}
#records_table>tbody>tr>th{
    border-top: 1px solid #49b5e4;
    border-right: 1px solid #49b5e4;
}
.tab_td{
	border-right: 1px solid #49b5e4;
}
</style>
<div id="hidden_add" style="display:none;"></div>
<table id="main_det" class="table">
	<tbody><tr>
		<td class="tab_td">Total Stop Duration:</td>
		<td class="tab_td">Total Idle Time:</td>
		<td>Total Travel Duration:</td>
	</tr>
	<tr>
		<td id="5" class="tab_td"><b><?php echo $total_idletime; ?></b></td>
		<td id="2" class="tab_td"><b><?php echo $total_idletime; ?></b></td>
		<td id="3"><b><?php echo $total_dtime; ?></b></td>
	</tr>
	<tr>
		<td class="tab_td">Total Distance Traveled(Miles):</td>
		<td class="tab_td">Number Of Stops:</td>
		<td>Idle(%):</td>
	</tr>
	<tr>
		<td id="6" class="tab_td"><b><?php echo $totalmilesval;?></b></td>
		<td id="7" class="tab_td"><b><?php  echo $varStoptotal; ?>
</b></td>
		<td id="4"><b><?php echo $total_idletime; ?></b></td>
	</tr>
</tbody></table>
<center>
	<div id="tab_list_spinner" style="color: red; clear: both; display: none;"><img src="image/spinner.gif" width="20px">Please wait for Report List...</div>
</center>
 <table id="records_table" class="table" style="">

<tbody>
	<tr>
		<th><b>Start Time</b></th><th><b>Distance(Miles) Duration</b></th><th><b>Stop Location</b></th><th><b>Arrival Time</b></th><th><b>Idle Duration</b></th><th><b>Stop Duration</b></th></tr>
<tr></tr>
</tbody>
</table>
 

<!---wrappermap close -->

		<!--- container close -->
<!-- </form> -->
<!-- </div>
 -->	
<!-- </div> -->
<body>
</html>