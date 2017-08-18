<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/Chart.min.js"></script>

  <link rel="stylesheet" href="css/Style.css">
  
 
  <style>
  </style>

</head>
<body>
<div class="NavBar" >
    <?php include 'DIV/navBar.php';?>
</div>


<div class="middlerow">  
  <div class="row" style="height:100%;width:100%;margin:0px;">
    <?php include 'DIV/sideNav.php';?>
    <div class="col-sm-12" id="pages_about" style="height:95%;padding:0px;"> 
        <div class="" style="height:100%;background-color:#c2c2a3;padding:3px;">
            <div class="chart-container well" style="height:91%;" id="map">
	            
            </div>
            <h1 style="height:5%;"><center><b>HUMIDITY MAP</b></center></h1>
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
      center: new google.maps.LatLng(7.892948,80.638258),
      zoom: 8
    });
    var infoWindow = new google.maps.InfoWindow({ width:300,height:200});

  // Change this depending on the name of your PHP or XML file
  //downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
  downloadUrl('setXML.php', function(data) {
    var xml = data.responseXML;
    var markers = xml.documentElement.getElementsByTagName('wData');
    Array.prototype.forEach.call(markers, function(markerElem) {
        var hmdt = markerElem.getAttribute('hmdt');
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

        var textHmdt = document.createElement('text');
        textHmdt.textContent = 'Humidity = '+hmdt
        infowincontent.appendChild(textHmdt);
        infowincontent.appendChild(document.createElement('br'));

        var textDateAndTime = document.createElement('text');
        textDateAndTime.textContent = 'Date and Time = '+DateAndTime
        infowincontent.appendChild(textDateAndTime);
        infowincontent.appendChild(document.createElement('br'));

        var a = document.createElement('a');
        var linkText = document.createTextNode("See Graph");
        a.appendChild(linkText);
        a.title = "Link for graph";
        a.href = "http://localhost/WeatherStation/Humidity.php";
        infowincontent.appendChild(a);
        infowincontent.appendChild(document.createElement('br'));

        var my_form=document.createElement('FORM');
        my_form.name='myForm';
        var my_tb=document.createElement('INPUT');
        my_tb.type='TEXT';
        my_tb.name='myInput';
        my_tb.value='Values of my Input';

        var _button = document.createElement("button");
        _button.data = "hi";
        _button.innerHTML = 'click me';
        //_button.onclick = markerCoords;
        my_form.appendChild(_button);

        infowincontent.appendChild(my_form);
        infowincontent.appendChild(document.createElement('br'));


        var imported = document.createElement('script');
        imported.src = 'jquery.min.js';
        infowincontent.appendChild(imported);

        var imported1 = document.createElement('script');
        imported1.src = 'Chart.min.js';
        infowincontent.appendChild(imported1);

        var canvas = document.createElement('canvas');
        canvas.id = 'mycanvas';
        canvas.style.cssText = 'width:auto;height:auto;';
        infowincontent.appendChild(canvas);

        var image = {
        url: 'images/humidity.png', // url
        scaledSize: new google.maps.Size(25, 40), // scaled size

        };
        var marker = new google.maps.Marker({
        position: point,
        map: map,
        icon: image
        });

        marker.addListener('mouseover', function() {
        infoWindow.setContent(infowincontent);
        var lat = this.getPosition().lat().toFixed(6);
        var lng = this.getPosition().lng().toFixed(6);
        infoWindow.open(map, marker);
        markerCords(lat,lng);
            google.maps.event.addListener(map, 'mousemove', function(){
                infoWindow.close();
            });
        });
    });
  });
  
}

function markerCords(lat,lng){
    var dataString ={ latitude: lat , longitude: lng };
    $.ajax({
        url : "http://localhost/WeatherStation/maps/HumidityDataMap.php",
        type : "GET",
        data : dataString,
        success : function(data){
            console.log(data);

            var hmdt1 = [];

            var DateAndTime1 = [];

            for(var i in data) {
	
	            hmdt1.push(data[i].hmdt);
	            DateAndTime1.push(data[i].DateAndTime);
            }

            var chartdata = {
	            labels: DateAndTime1,
	            datasets: [
		
		            {
			            label: "Humidity",
			            fill: false,
			            lineTension: 0.1,
			            backgroundColor: "rgba(29, 202, 255, 0.75)",
			            borderColor: "rgba(29, 202, 255, 1)",
			            pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
			            pointHoverBorderColor: "rgba(29, 202, 255, 1)",
			            data: hmdt1
		            }
	            ]
            };
            
            var ctx = $("#mycanvas");

            var LineGraph = new Chart(ctx, {
	            type: 'line',
	            data: chartdata,
	            options: {
                scales: {
                
                xAxes: [{
                    ticks: {
                        fontSize: 4
                    }
                }]
                }
                }
            });
             
        },
        error : function(data) {
           
        }
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
