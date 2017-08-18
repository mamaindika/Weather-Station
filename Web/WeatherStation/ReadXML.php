<?php
$doc = new DOMDocument();
$doc->load( 'books.xml' );
 
$books = $doc->getElementsByTagName( "timerange" );
foreach( $books as $book )
{
$todates = $book->getElementsByTagName( "todate" );
$todate = $todates->item(0)->nodeValue;
  
$fromdates = $book->getElementsByTagName( "fromdate" );
$fromdate = $fromdates->item(0)->nodeValue;
 

}
echo "$fromdate - $todate\n";
?>
