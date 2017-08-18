<?php
$username="root";
$password="123";
$database="WeatherStation";
// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("wData");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server

$connection=mysql_connect ('127.0.0.1', $username, $password);
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database

$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table

$query = "SELECT * FROM weatherData ORDER BY DateAndTime ";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = @mysql_fetch_assoc($result)){
  // Add to XML document node
  $node = $dom->createElement("wData");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("temp",$row['temp']);
  $newnode->setAttribute("hmdt",$row['hmdt']);
  $newnode->setAttribute("prss",$row['prss']);
  $newnode->setAttribute("RFall",$row['RFall']);
  $newnode->setAttribute("WndSpeed",$row['WndSpeed']);
  $newnode->setAttribute("WndDir",$row['WndDir']);
  $newnode->setAttribute("DateAndTime",$row['DateAndTime']);
  $newnode->setAttribute("longitude",$row['longitude']);
  $newnode->setAttribute("latitude",$row['latitude']);
}

echo $dom->saveXML();

?>

