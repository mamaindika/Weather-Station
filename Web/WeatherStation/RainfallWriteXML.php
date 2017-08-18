<?php
$FromDate = "'".$_POST["FromDate"]."'";
$ToDate = "'".$_POST["ToDate"]."'";

$books = array();
$books [] = array(
'fromdate' => $FromDate,
'todate' => $ToDate

);

 
$doc = new DOMDocument();
$doc->formatOutput = true;
$doc->load("rainfall.xml"); 
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
  
$r->appendChild( $b );
}
 
 $doc->saveXML();
 $doc->save('rainfall.xml');
 header("Location:Rainfall.php");
?>
