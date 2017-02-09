<? 
session_start();
//echo $_SESSION["db_name"];

//print_r($_POST);

if(empty($_POST)){
  $_SESSION["db_name"]='db_admin';
 
}
else{
  $_SESSION["db_name"]=$_POST['cmpnyname'];

}
 include_once('connect.php');
if(!empty($_POST))
{
  //echo "SELECT  * FROM tbl_user where username='".$_POST['username']."' AND password ='".md5($_POST['password'])."'";
    $sql = ("SELECT  * FROM tbl_user where username='".$_POST['username']."' AND password ='".md5($_POST['password'])."'");
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
     // $row = $result->fetch_object();
      $row = $result->fetch_object();
      $_SESSION["username"]=$row->username;
      header("location: home.php");
    }
  else
  {
    $err="1";
  } 
  //unset($_POST);
 $conn->close();    
//$conn = null;   
}
else
{
  $err ="";
}

?> 


<html>
<head>
  <title>Main</title>
  <link rel="image icon" type="image/png" sizes="160x160" href="image/iocn.png">
<style>
body{
   background: url(image/bgmap.png); 
}
</style>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.1.12.0.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

<!-- //paste this code under the head tag or in a separate js file.
  // Wait for window load -->
  <script type="text/javascript">
  $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
  </script>
<script>
  function validateForm() {
    if ($("#comp_name").val().trim() == "") 
    {
      $("#comp_name").css('border','1px solid red');
      $("#comp_name").focus();
      /*if ($("#password").val().trim() == "")
        $("#password").css('border','2px solid red');*/
    }     
   else if ($("#username").val().trim() == "") 
    {
        $("#username").css('border','2px solid red');
        $("#username").focus();
    }
    else if ($("#password").val().trim() == "") 
    {
        $("#password").css('border','2px solid red');
        $("#password").focus();
    }
    else
    {    
      $("#spinner").show();
      $("#myform").submit();
    }
  }

  $(document).ready(function(){
    $("#comp_name").focus();
      $("#comp_name").on('input',function(e){
         $("#comp_name").css('border','1px solid #CCC');
          $("#error").hide();
        });
    //$("#username").focus();
      $("#username").on('input',function(e){
         $("#username").css('border','1px solid #CCC');
          $("#error").hide();
        });
      $("#password").on('input',function(e){
         $("#password").css('border','1px solid #CCC');
          $("#error").hide();
      });
  });
$(function() {

    //$("#button").click(function() {
    $("#comp_name").on('input', function () {
        var val = $('#comp_name').val()
        var xyz = $('#CompanyName option').filter(function() {
            return this.value == val;
        }).data('xyz');
        var msg = xyz ? xyz : 'No Match';
        $('#cmpnyname').val(msg);

    })

})

</script>
<style>
body{
background-image: url(image/bg.jpg);
background-size: 100%;
}
.log {
        width: 11vw;
        background: url(logo/login_login_button.png) no-repeat;
        background-size: 100% 100%;
        height: 37px;
        border: transparent;
        
    }
.int {
        width: 20vw;
    }
    .index{
   /*background-color: #ffffff;
 background: url(logo/login_column_popup.png) no-repeat;*/
  background-size: 100% 100%;
  width:45vw; height: auto;
}
@media only screen and (max-width: 768px) {
        .int {
        width: 100%;
    }
   .index{
     width: 90vw;
   } 
   .log {
        width: 60%;

    }
}


.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(images/loader-64x/Preloader_2.gif) center no-repeat #fff;
}
</style>
</head>
<body>
<div class="se-pre-con"></div>
  <div class="container" style="">
 <center><div class='index' style="  padding:10px;margin-top:50px;">
  <div class="row content">
    <div class="col-sm-3 sidenav" style="margin-top: 25vh;">
    <h2 style='color:white;'>Contractor</h2>
    </div>

    <div class="col-sm-9" style="margin-top:6vh;">
      <form id='myform' name="myform" method="POST"  class="form-horizontal" onSubmit="return validateForm()">
      <div id="test" style="border: 3px ridge red; <?  if($err!='1'){ echo "display:none;"; }?> width:86%; height:48px; padding:3px;  background-color:#F5A9A9;margin-top: -  5px;margin-bottom: 5px;"> 
          <h5 style="width: 107%;">Please enter valid Username & password.<h5>
      </div>
       <div style="margin-top:15vh;margin-bottom:3vh;">
       </div>
        <input type="text" class="form-control int" id="username" name="username" placeholder='USERNAME' style="border-radius: 1px;background-color:#f6f6f6;margin-top:1vh;margin-bottom:1vh;">
        <div id="text1" style="color:red; display:none;">Please fill Username </div>

        <input type="password" class="int" id="password" name="password" placeholder='PASSWORD' style="border-radius: 1px;background-color:transparent;border:1px solid white;margin-top:1vh;margin-bottom:1vh;color:white;">
        <div id="text2" style="color:red; display:none;">Please fill Password</div>
            </div>
           
        <center><input type="submit" id="submit" class="log" style="margin-top:2vh;margin-bottom:3vh;margin-left: 12vw;" value=""></center>
      </form>
    
  </div>
</div>

 </div> </center>
</div>
<script>
$('#uname,#password').on('keypress', function (e) {
  if (e.which == 13) {
   validateForm();
    return false;    //<---- Add this line onclick="validateForm()"
  }
});
</script>
</body>
</html>