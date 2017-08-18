<?php
$FromDate = "'".$_POST["FromDate"]."'";
$ToDate = "'".$_POST["ToDate"]."'";
$Place = $_POST["Place"];

$books = array();
$books [] = array(
'fromdate' => $FromDate,
'todate' => $ToDate,
'place' => $Place

);

 
$doc = new DOMDocument();
$doc->formatOutput = true;
$doc->load("temperature.xml"); 
//==================
foreach ($doc->getElementsByTagName('timeranges') as $timeranges)
{
    $timeranges->parentNode->removeChild($timeranges);
}

//==================
$r = $doc->createElement( "timeranges" );
$doc->appendChild( $r );
 
foreach( $books as $book )
{
$b = $doc->createElement( "timerange" );
 
$todate = $doc->createElement( "todate" );
$todate->appendChild(
    $doc->createTextNode( $book['todate'] )
);
$b->appendChild( $todate );
 
$fromdate = $doc->createElement( "fromdate" );
$fromdate->appendChild(
    $doc->createTextNode( $book['fromdate'] )
);
$b->appendChild( $fromdate );

$place = $doc->createElement( "place" );
$place->appendChild(
    $doc->createTextNode( $book['place'] )
);
$b->appendChild( $place );

  
$r->appendChild( $b );
}
 
 $doc->saveXML();
 $doc->save('temperature.xml');
 header("Location:Temperature.php");
?>
