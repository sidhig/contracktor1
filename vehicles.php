<?session_start();
include 'connect.php';
$data="select  *,IF((TIME_TO_SEC(TIMEDIFF(now(),maxdata.timestamp))/7200000)>1,2,0) as timediff, (tbl_event_data_last_view.`timestamp` -interval 0 hour) as 'timestamp' from (select MAX(tbl_event_data_last_view.timestamp) as timestamp , tbl_event_data_last_view.deviceid from tbl_event_data_last_view where  tbl_event_data_last_view.DeviceImei group by tbl_event_data_last_view.deviceid) as maxdata, tbl_event_data_last_view where tbl_event_data_last_view.timestamp = maxdata.timestamp  and maxdata.deviceid = tbl_event_data_last_view.deviceid 
 group by tbl_event_data_last_view.deviceid order by tbl_event_data_last_view.deviceid";

$data = $conn->query($data);
$rows = array();
      while($r = $data->fetch_object())
    {
      $rows[] = (array)$r;

    }
     $string = "";
    foreach ($rows as $value) {
       $string.="[\"". ( implode("\",\"",array_values($value)))."\"]" . ","; 
    }
  //$finalString = "[".rtrim($string, ",")."]";
    if(@$_REQUEST['fromajax'])
  {
      echo $finalString = "[".rtrim($string, ",")."]";
  }
  else
  {
      $finalString = "[".rtrim($string, ",")."]";
  }
    //echo json_encode($rows);
  ?>