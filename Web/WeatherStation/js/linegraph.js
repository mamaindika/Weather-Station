
$(document).ready(function(){
	$.ajax({
		url : "http://localhost/WeatherStation/data.php",
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
						label: "Temperature",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: temp1
					},
					{
						label: "Humidity",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(29, 202, 255, 0.75)",
						borderColor: "rgba(29, 202, 255, 1)",
						pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
						pointHoverBorderColor: "rgba(29, 202, 255, 1)",
						data: hmdt1
					},
					{
						label: "Pressure",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(211, 72, 54, 0.75)",
						borderColor: "rgba(211, 72, 54, 1)",
						pointHoverBackgroundColor: "rgba(211, 72, 54, 1)",
						pointHoverBorderColor: "rgba(211, 72, 54, 1)",
						data: prss1
					},
					{
						label: "Rainfall",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(0, 128, 0, 0.75)",
						borderColor: "rgba(0, 128, 0, 1)",
						pointHoverBackgroundColor: "rgba(0, 128, 0, 1)",
						pointHoverBorderColor: "rgba(0, 128, 0, 1)",
						data: RFall1
					},
					{
						label: "Wind Speed",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(139, 0, 139, 0.75)",
						borderColor: "rgba(139, 0 ,139, 1)",
						pointHoverBackgroundColor: "rgba(139 , 0 , 139 , 1)",
						pointHoverBorderColor: "rgba(139, 0, 139, 1)",
						data: WndSpeed1
					},
					{
						label: "Wind Direction",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(139, 0, 139, 0.75)",
						borderColor: "rgba(139, 0, 139, 0.75)",
						pointHoverBackgroundColor: "rgba(139, 0, 139, 0.75)",
						pointHoverBorderColor: "rgba(139, 0, 139, 0.75)",
						data: WndDir1
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
