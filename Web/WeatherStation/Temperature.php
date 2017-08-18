<!DOCTYPE html>
<html lang="en">
<head>
<title>Bootstrap Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/Style.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>


<style>
</style>

</head>
<body>
<div class="NavBar">
    <?php include 'DIV/navBar.php';?>
</div>


<div class="middlerow">  
  <div class="row" style="height:100%;width:100%;margin:0px;">
    <div class="col-sm-2  well" style="height:100%">
      <?php include 'DIV/sideNav.php';?>
    </div>
    <div class="col-sm-8" style="height:100%;"> 

        <div class="well" style="height:100%;padding-top:40px;">
            <div class="card card-inverse card-primary text-xs-center">
              <div class="card-block">
                  <h1><center><b> TEMPERATURE </b></center></h1>
              </div>
            </div>
            <div id="pages">
                <div id="1" class="chart-container well">
	                <canvas id="mycanvas1"></canvas>
	                <script type="text/javascript" src="js/TemperatureGraph1.js"></script>
                </div>
                <div id="2" class="chart-container well">
	                <canvas id="mycanvas"></canvas>
	                               
                </div>
                
            </div>
            <script>
            $("#pages div").css("display", "none");
            $("#pages div#1").css("display", "block");
            
            </script>
        </div>
    
    </div>
    <div class="col-sm-2  well" style="height:100%;">
     
        Search from time range
        <div class="well">
            <form class="form"action="" onsubmit="return myFunction()"  method="">
                <?php include 'DIV/rightSideNav.php';?>
            </form>
        </div>
    </div>
  </div>
</div>
   

<div class="footerrow">
    <footer class="container-fluid text-center">
      <p>Footer Text</p>
    </footer>
</div>

<script>
function myFunction() {
    $("#pages div").css("display", "none");
    $("#pages div#2").css("display", "block");

    var FromDate = document.getElementById("FromDate").value;
    var ToDate = document.getElementById("ToDate").value;
    var Place = document.getElementById("Place").value;

    // Returns successful text submission message when the entered information is stored in database.
    var dataString = {fromdate:FromDate,todate:ToDate ,place:Place};
    if (FromDate == '' || ToDate == '' || Place == '') {
        alert("Please Fill All Fields");
    } else {
        // AJAX code to submit form.
        $.ajax({
            type: "GET",
            url: "http://localhost/WeatherStation/TemperatureData.php",
            data: dataString,
            
            success : function(data){
                console.log(data);


                var temp1 = [];
                var hmdt1 = [];
                var prss1 = [];
                var RFall1 = [];
                var WndSpeed1 = [];
                var WndDir1 = [];
                var DateAndTime1 = [];
                var place1 = [];

                for(var i in data) {

                    temp1.push(data[i].temp);
                    DateAndTime1.push(data[i].DateAndTime);
                    place1.push(data[i].place);
                }
                
                var chartdata = {
                    labels: DateAndTime1,
                    datasets: [
	
	                    {
		                    label: "Temperature",
		                    fill: false,
		                    lineTension: 0.1,
		                    backgroundColor: "rgba(29, 202, 255, 0.75)",
		                    borderColor: "rgba(29, 202, 255, 1)",
		                    pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
		                    pointHoverBorderColor: "rgba(29, 202, 255, 1)",
		                    data: temp1
	                    }
                    ]
                };

            var ctx = $("#mycanvas");

            var LineGraph = new Chart(ctx, {
                type: 'line',
                data: chartdata
            });
        },
        error : function(data) {

        }
        });
    }
  return false;  
}
</script>


</body>
</html>



