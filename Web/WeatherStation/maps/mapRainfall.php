<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/Style.css">
  
 
  <style>
  </style>

</head>
<body>
<div class="NavBar">
    <?php include 'DIV/navBar.php';?>
</div>


<div class="middlerow">  
  <div class="row" style="height:100%;width:100%;margin:0px;">
    <?php include 'DIV/sideNav.php';?>
    <div class="col-sm-12" id="pages_about" style="height:95%;padding:0px;"> 
        <div class="well" style="height:100%;background-color:#c2c2a3;padding:3px;">
            <div class="chart-container well" style="height:91%;" id="map">
	            
            </div>
            <h1 style="height:5%;"><center><b>RAINFALL MAP</b></center></h1>
        </div>
     </div>
    
  </div>
</div>
   

<div class="footerrow">
    <footer class="container-fluid text-center">
      <p>Footer Text</p>
    </footer>
</div>
</body>
</html>


<script>
  var customLabel = {
   
    WeatherStation: {
      label: 'ws'
    }
  };

    function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: new google.maps.LatLng(7.292948,80.638258),
      zoom: 8
    });
    var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP or XML file
      //downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
      downloadUrl('setXML.php', function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('wData');
        Array.prototype.forEach.call(markers, function(markerElem) {
          var RFall = markerElem.getAttribute('RFall');
          var DateAndTime = markerElem.getAttribute('DateAndTime');
          var latitude = markerElem.getAttribute('latitude');
          var longitude = markerElem.getAttribute('longitude');
          var type = 'WeatherStation';
          var point = new google.maps.LatLng(
              parseFloat(markerElem.getAttribute('latitude')),
              parseFloat(markerElem.getAttribute('longitude')));

          var infowincontent = document.createElement('div');
          var strong = document.createElement('strong');
          
          if(latitude==7.254042 && longitude==80.591469){
            strong.textContent = "Peradeniya";
          }
          else if(latitude==7.292948 && longitude==80.638260){
            strong.textContent = "Kandy";
          }
          else if(latitude==6.050445 && longitude==80.225685){
            strong.textContent = "Galle";
          }
          
          
          infowincontent.appendChild(strong);
          infowincontent.appendChild(document.createElement('br'));
          
          var textRFall = document.createElement('text');
          textRFall.textContent = 'Rainfall = '+RFall
          infowincontent.appendChild(textRFall);
          infowincontent.appendChild(document.createElement('br'));
          
          var textDateAndTime = document.createElement('text');
          textDateAndTime.textContent = 'Date and Time = '+DateAndTime
          infowincontent.appendChild(textDateAndTime);
          infowincontent.appendChild(document.createElement('br'));
          
          var image = {
            url: 'images/rainfall.png', // url
            scaledSize: new google.maps.Size(25, 40), // scaled size
            
          };
          var marker = new google.maps.Marker({
          position: point,
          map: map,
          icon: image
          });
          marker.addListener('click', function() {
            infoWindow.setContent(infowincontent);
            infoWindow.open(map, marker);
          });
        });
      });
    }



  function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
      if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
    };

    request.open('GET', url, true);
    request.send(null);
  }

  function doNothing() {}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIS_f4MNWrPBasYx9xAQukt-1l56rnk6A&callback=initMap">
</script>
