<? 
$cur_date= date("Y/m/d");
$date = date_create($cur_date);
date_modify($date, '-1 day');



?>

<input type="date"  name="for_date" value= "<?  echo date_format($date, 'Y-m-d'); ?>" /> 