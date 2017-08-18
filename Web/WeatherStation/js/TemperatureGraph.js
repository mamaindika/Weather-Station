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
