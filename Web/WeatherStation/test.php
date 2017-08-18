<!DOCTYPE html>
<html>
<head>
<title>Submit Form Using AJAX PHP and javascript</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="Chart.min.js"></script>
            
</head>
<body>

<div class="row">
    <div class="col-sm-2">
        <form class="form "action="" onsubmit="return myFunction()" method="">
          <fieldset>
            <div class="form-group">
              <label class="control-label" for="focusedInput">From</label>
             <input type="text" name="ToDate" id="FromDate" size="30" class="ddd form-control" placeholder="Enter start time" >
            </div>
            <div class="form-group">
              <label class="control-label" for="focusedInput">To</label>
             <input type="text" name="FromDate" id="ToDate" size="30" class="ddd form-control" placeholder="Enter end time" >
            </div>
            <div class="form-group">
              <label class="control-label" for="focusedInput">Place</label>
             <input type="text" name="Place" id="Place" size="30" class="ddd form-control" placeholder="Enter the place" >
            </div>
            <div class="form-group">
                <button type="submit"  class="btn btn-primary">Submit</button>
            </div>
          </fieldset>  
        </form>
    </div>
    <div class="col-sm-10">
        <div class="chart-container well col-sm-12 " style="height:700px">
            <canvas id="mycanvas" "></canvas>
            <p id="setPlace"></p>
        </div>
    </div>
</div>
<script>
function myFunction() {
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
            url: "http://localhost/WeatherStation/TemperatureData1.php",
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
                type: 'bar',
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


