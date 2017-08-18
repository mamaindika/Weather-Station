
$(document).ready(function(){
	$.ajax({
		url : "http://localhost/WeatherStation/HumidityData1.php",
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
				temp1.push(data[i].temp);
				hmdt1.push(data[i].hmdt);
				prss1.push(data[i].prss);
				RFall1.push(data[i].RFall);
				WndSpeed1.push(data[i].WndSpeed);
				WndDir1.push(data[i].WndDir);
				if(data[i].WndDir =="East"){
				    WndDir1.push("100");
				}
				else if(data[i].WndDir =="West"){
				    WndDir1.push("200");
				}
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

			var ctx = $("#mycanvas1");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error : function(data) {

		}
	});
});
