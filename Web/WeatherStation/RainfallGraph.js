
$(document).ready(function(){
	$.ajax({
		url : "http://localhost/WeatherStation/RainfallData.php",
		type : "GET",
		success : function(data){
			console.log(data);

			
			var temp1 = [];
			var hmdt1 = [];
			var prss1 = [];
			var RFall1 = [];
			var WndSpeed1 = [];
			var WndDir1 = [];
			var DateAndTime1 = [];

			for(var i in data) {
				
				RFall1.push(data[i].RFall);
				DateAndTime1.push(data[i].DateAndTime);
			}

			var chartdata = {
				labels: DateAndTime1,
				datasets: [
					
					{
						label: "Rainfall",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(29, 202, 255, 0.75)",
						borderColor: "rgba(29, 202, 255, 1)",
						pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
						pointHoverBorderColor: "rgba(29, 202, 255, 1)",
						data: RFall1
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
});
