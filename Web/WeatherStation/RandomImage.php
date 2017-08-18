<?php
$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpass = "123";
$dbname = "WeatherStation";
mysql_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
mysql_select_db($dbname) or die('database selection problem');
?>
<?php
	$sql="SELECT * FROM WeatherImage ORDER BY RAND() LIMIT 1;";
	$result_set=mysql_query($sql);
	while($row=mysql_fetch_array($result_set)){?>
		<img class="" src="images/<?php echo $row['name']?>"style="width:100%;height:100%">
	<?php
			}
?>
