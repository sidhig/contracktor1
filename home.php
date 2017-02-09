<?
session_start();
if($_SESSION['username']==''){
  header("location: index.php");
}
include_once('connect.php');
include_once('vehicles.php');
?>
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon3.ico"/>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaL0ieAkLhzy1rDoLifajeowdXPwTvzmI"></script>
   <script type="text/javascript" src="js/date.js"></script>
   <script src="js/function.js"></script>
   
 <script>
     
  var LocationData = <?=$finalString?>;
  //alert(LocationData);
  var image;
  var zoomval = 7;
  var mapLat; 
  var mapLng;
  var map; 

function initialize()
{
	//alert(LocationData);
     map = new google.maps.Map(document.getElementById('map'),{
      mapTypeId: google.maps.MapTypeId.ROADMAP,
    mapTypeControl: true
  });
    var bounds = new google.maps.LatLngBounds();
    var infowindow = new google.maps.InfoWindow();
    
     
    for (var i = 0; i < LocationData.length; i++)
    { 

        var sites = LocationData[i];
        
        var ingstatus;
        var latlng = new google.maps.LatLng(sites[3], sites[4]);
        bounds.extend(latlng);
         html = '<b>Name:</b> '+sites[1]+
                '<br> <strong>Equipment Type:</strong> '+sites[21]+
                '<br> <strong>Last Location:</strong> '+(new Date(sites[0].replace("-", "/")).toString("MM-dd-yyyy hh:mm tt"));
        
        var marker = new google.maps.Marker({
            position: latlng,
            zoom: 7,
            map: map,
            icon: setimage(sites[25],sites[2],sites[10]),
            title: sites[2],
            html: html
        });
    
        google.maps.event.addListener(marker, 'click', function() {
       infowindow.setContent(this.html);
            infowindow.open(map, this);
        });
    }
    map.fitBounds(bounds);
    //alert(map.getZoom());
}
 
google.maps.event.addDomListener(window, 'load', initialize);

</script>
<script>
setInterval(function(){
  //alert();
  map_refresh();
 }, 30000);
 function map_refresh()
      {
   // alert('test');
             $.ajax({
               type: "POST",
               url: "vehicles.php",
               data: 'fromajax=true',
               cache: false,
               success: function(result)
               {
                //alert(result);
                var myMapType = map.getMapTypeId();
                var savedMapZoom=map.getZoom(); 
                var mapCentre=map.getCenter(); 
                mapLat=mapCentre.lat(); 
                mapLng=mapCentre.lng();
                LocationData = $.parseJSON(result);
                 initialize();
              map.setCenter(new google.maps.LatLng(mapLat,mapLng));
              map.setZoom(savedMapZoom);
          } //sucess close
               });
}

</script>
   
<?include_once('header.php');?>
<div id='trip_sheet_div' style='display:none;position: fixed; top: 0; right: 0; bottom: 0; left: 0; width: 100%; height: 100%; overflow: auto;
    z-index: 3; padding: 20px; box-sizing: border-box; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.75); text-align: center;'></div>
    <div id='record_data' style='display:none;position: fixed; top: 0; right: 0; bottom: 0; left: 0; width: 100%; height: 100%; overflow: auto;
    z-index: 3; padding: 20px; box-sizing: border-box; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.75); text-align: center;'></div>

<div id="main">
    
   <div id="map" class='current_view' style="width:100%;height:97%;margin-top:1vh; color:black;display:block; "></div>
 <div id="admin" class='current_view' style="width:100%;min-height: 84.5vh;
    height: auto; color:black;display:none;z-index: 3; padding: 20px; box-sizing: border-box;background-color: white; " ></div>
   <div id="history" class='current_view' style="width:100%;min-height: 84.5vh;
    height: auto; color:black;display:none;background-color: white;">
   </div>
   <div id="manage_poi" class='current_view' style="height: auto;
    margin-top: 0vh;
    background-image: url(image/bgmap.png);
    background-size: cover;
    color: black;
    background-color: white;
    min-height: 84vh;"></div>
    
   <div id="report" class='current_view'  style="width:100%;min-height: 84.5vh;
    height: auto; color:black;display:none;z-index: 3; padding: 20px; box-sizing: border-box;background-color: white;">
   </div>
</div>
<? include_once('fotter.php'); ?>


