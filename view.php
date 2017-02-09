 <? 
  session_start();
  include_once('connect.php'); 
  ?>
 <html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>

<table style="width:100%">
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
  </tr>
  <tr>
    <td><?php echo $username; ?></td>
    <td><?php echo $usermail; ?></td>
    <td><?php echo $usermobile; ?></td>
    <td><?php echo $created; ?></td>
    <td><?php echo $username; ?></td>
    <td><?php echo $usermail; ?></td>
    <td><?php echo $usermobile; ?></td>
    <td><?php echo $created; ?></td>
    <td>
    <image onclick="edit_tracker('<?=($obj->DeviceIMEI)?>')" style='cursor: pointer;'src="image/edit.png" >
        <image src="image/deny.png" style='cursor: pointer;' onclick=del_tracker('<?=($obj->DeviceIMEI)?>') >
       <!--  <?if($obj->OBDType=='OBDII'){?>
          <input type="button" value="CONFIG" id='config_tracker' onclick="config_tracker('<?=($obj->DeviceIMEI)?>')" style="margin-top:1vh;">
        <?}?> -->
    </td>
  </tr>
  <tr>
    <td><?php echo $username; ?></td>
    <td><?php echo $usermail; ?></td>
    <td><?php echo $usermobile; ?></td>
    <td><?php echo $created; ?></td>
    <td><?php echo $username; ?></td>
    <td><?php echo $usermail; ?></td>
    <td><?php echo $usermobile; ?></td>
    <td><?php echo $created; ?></td>
    <td>
    <image onclick="edit_tracker('<?=($obj->DeviceIMEI)?>')" style='cursor: pointer;'src="image/edit.png" >
        <image src="image/deny.png" style='cursor: pointer;' onclick=del_tracker('<?=($obj->DeviceIMEI)?>') >
       <!--  <?if($obj->OBDType=='OBDII'){?>
          <input type="button" value="CONFIG" id='config_tracker' onclick="config_tracker('<?=($obj->DeviceIMEI)?>')" style="margin-top:1vh;">
        <?}?> -->
    </td>
  </tr>
  <tr>
    <td><?php echo $username; ?></td>
    <td><?php echo $usermail; ?></td>
    <td><?php echo $usermobile; ?></td>
    <td><?php echo $created; ?></td>
    <td><?php echo $username; ?></td>
    <td><?php echo $usermail; ?></td>
    <td><?php echo $usermobile; ?></td>
    <td><?php echo $created; ?></td>
    <td>
    <image onclick="edit_tracker('<?=($obj->DeviceIMEI)?>')" style='cursor: pointer;'src="image/edit.png" >
        <image src="image/deny.png" style='cursor: pointer;' onclick=del_tracker('<?=($obj->DeviceIMEI)?>') >
       <!--  <?if($obj->OBDType=='OBDII'){?>
          <input type="button" value="CONFIG" id='config_tracker' onclick="config_tracker('<?=($obj->DeviceIMEI)?>')" style="margin-top:1vh;">
        <?}?> -->
    </td>
  </tr>
</table>

    
  
</body>
</html>