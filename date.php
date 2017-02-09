
<script>
var d = new Date();
d.setDate(d.getDate() - 1);
alert(d);
var val = d;
</script>


<?php
   $variable = "<script>document.write(val)</script>";
?>
echo date_format($variable, 'Y-m-d');



<input type="date" id="for_date" name="for_date" value="<? echo date_format($variable, 'Y-m-d');
 ?>" /> 


<!-- 
 <!DOCTYPE html>
<html>
<body>

<input type="date" id="myDate" value="2017-02-01">






<p id="demo"></p>

<script>
function myFunction() {
    var d = new Date();
d.setDate(d.getDate() - 1);
}
</script>

</body>
</html>
 -->

 <!-- <input id="date" name="date">

<script type="text/javascript">
  document.getElementById('date-1').value = Date();
</script> -->