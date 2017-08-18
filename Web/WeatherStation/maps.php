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
    <div class="col-sm-2  well" style="height:100%;background-color:#c2c2a3;">
        <a href="mapTemperature.php" class="btn btn-default btn-lg btn-block btnColor" >Temperature</a>
        <a href="mapHumidity.php" class="btn btn-default btn-lg btn-block btnColor" >Humidity</a>
        <a href="mapRainfall.php" class="btn btn-default btn-lg btn-block btnColor" >Rainfall</a>
        <a href="mapPressure.php" class="btn btn-default btn-lg btn-block btnColor" >Atmospheric Pressure</a>
        <a href="mapWindSpeed.php" class="btn btn-default btn-lg btn-block btnColor" >Wind Speed</a>
        <a href="mapWindDiretion.php" class="btn btn-default btn-lg btn-block btnColor" >Wind Diretion</a>
        <br>
        <div class="panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title">Weather Status</h3>
          </div>
          <div class="panel-body">
            <img src="images/weather.jpg" class="img-responsive" alt="Cinque Terre" width="304" height="236"><br>
            <img src="images/weather.jpg" class="img-responsive" alt="Cinque Terre" width="304" height="236"><br>
            
          </div>
        </div>
    </div>
    <div class="col-sm-10" id="pages_about" style="height:100%;padding:0px;"> 
        <div class="well" style="height:100%;background-color:#c2c2a3;">
            <h1 style="height:5%;"><center><b>WEATHER MAP</b></center></h1>
            <div class="chart-container well" style="height:91%;" id="map">
	            
            </div>
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
          var temp= markerElem.getAttribute('temp');
          var hmdt = markerElem.getAttribute('hmdt');
          var prss = markerElem.getAttribute('prss');
          var RFall = markerElem.getAttribute('RFall');
          var WndSpeed = markerElem.getAttribute('WndSpeed');
          var WndDir = markerElem.getAttribute('WndDir');
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

          var textTemp = document.createElement('text');
          textTemp.textContent = 'Temperature = '+temp
          infowincontent.appendChild(textTemp);
          infowincontent.appendChild(document.createElement('br'));
          
          var textHmdt = document.createElement('text');
          textHmdt.textContent = 'Humidity = '+hmdt
          infowincontent.appendChild(textHmdt);
          infowincontent.appendChild(document.createElement('br'));
          
          var textPrss = document.createElement('text');
          textPrss.textContent = 'Pressure = '+prss
          infowincontent.appendChild(textPrss);
          infowincontent.appendChild(document.createElement('br'));
          
          var textRFall = document.createElement('text');
          textRFall.textContent = 'Rainfall = '+RFall
          infowincontent.appendChild(textRFall);
          infowincontent.appendChild(document.createElement('br'));
          
          var textWndSpeed = document.createElement('text');
          textWndSpeed.textContent = 'Wind Speed = '+WndSpeed
          infowincontent.appendChild(textWndSpeed);
          infowincontent.appendChild(document.createElement('br'));
          
          var textWndDir = document.createElement('text');
          textWndDir.textContent = 'Wind Direction = '+WndDir
          infowincontent.appendChild(textWndDir);
          infowincontent.appendChild(document.createElement('br'));
          
          var textDateAndTime = document.createElement('text');
          textDateAndTime.textContent = 'Date and Time = '+DateAndTime
          infowincontent.appendChild(textDateAndTime);
          infowincontent.appendChild(document.createElement('br'));
          
          var icon = customLabel[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            label: icon.label
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
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvo3qULJfUyT1RQqEsfeYfkqQcy60oFSg&callback=initMap">
</script>
