
$(document).ready(function(){
	$.ajax({
		url : "http://localhost/WeatherStation/WindDiretionData.php",
		type : "GET",
		success : function(data){
			console.log(data);
			var WndDir1 = [];
			var DateAndTime1 = [];

			for(var i in data) {
		
			    WndDir1.push(data[i].WndDir);
			    DateAndTime1.push(data[i].DateAndTime);
			}

			var chartdata = {
				labels: DateAndTime1,
				datasets: [
					
					{	
						label: "Wind Direction",
						
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(29, 202, 255, 0.75)",
						borderColor: "rgba(29, 202, 255, 1)",
						pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
						pointHoverBorderColor: "rgba(29, 202, 255, 1)",
						data: WndDir1
					},
					
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
