<?php
//xml data start
$doc = new DOMDocument();
$doc->load( 'humidity.xml' );
 
$books = $doc->getElementsByTagName( "timerange" );
foreach( $books as $book )
{
$todates = $book->getElementsByTagName( "todate" );
$todate = $todates->item(0)->nodeValue;
  
$fromdates = $book->getElementsByTagName( "fromdate" );
$fromdate = $fromdates->item(0)->nodeValue;
 
}
//xml data end
//echo "$fromdate - $todate\n";

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
$query = sprintf("SELECT * FROM weatherData  WHERE DateAndTime between DATE(".$todate.") AND DATE(".$fromdate.")ORDER BY  DateAndTime");
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
