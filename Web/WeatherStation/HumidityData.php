<?php
 
$FromDate= "'".$_GET['fromdate']."'";
$ToDate = "'".$_GET['todate']."'";
$Place = "'".$_GET['place']."'";

//setting header to json
header('Content-Type: application/json');
//database
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '123');
define('DB_NAME', 'WeatherStation');
//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}
//query to get data from the table
$query = sprintf("SELECT hmdt,DateAndTime,place FROM weatherData,WeatherStations  WHERE  DateAndTime between DATE(".$FromDate.") AND DATE(".$ToDate.") AND place =".$Place." AND lon = longitude AND lat=latitude ORDER BY  DateAndTime");

//execute query
$result = $mysqli->query($query);
//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
//free memory associated with result
$result->close();
//close connection
$mysqli->close();
//now print the data
print json_encode($data);
