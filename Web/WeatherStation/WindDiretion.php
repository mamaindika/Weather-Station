<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="jquery/jquery-1.10.2.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/Style.css">

  <style>
 
  </style>
</head>
<body>
<div class="NavBar">
    <?php include 'DIV/navBar.php';?>
</div>


<div class="middlerow">  
  <div class="row" style="height:100%;width:100%;margin:0px;">
    <div class="col-sm-2  well" style="height:100%">
      <?php include 'DIV/sideNav.php';?>
    </div>
    <div class="col-sm-8" style="height:100%;"> 

        <div class="well" style="height:100%;padding-top:40px;">
            <div class="card card-inverse card-primary text-xs-center">
              <div class="card-block">
                  <h1><center><b> WIND DIRECTION </b></center></h1>                  
              </div>
            </div>
            <div class="chart-container well">
	            <canvas id="mycanvas"></canvas>
            </div>
	        <br>
            <!-- javascript -->
            <script type="text/javascript" src="js/jquery.min.js"></script>
            <script type="text/javascript" src="js/Chart.min.js"></script>
            <script type="text/javascript" src="js/WindDirectionGraph.js"></script>
        <div class="">
            <div class="col-sm-3">
                <p style="font-family:arial; color:green;font-size:20px;"><B>north&nbsp;==> 1<B> </p>
                <p style="font-family:arial; color:#FF0000;font-size:20px;"><B>South==> 2<B> </p>
            </div>
            <div class="col-sm-3">
                <p style="font-family:arial; color:Purple;font-size:20px;"><B>East&nbsp;&nbsp;==> 3<B> </p>
                <p style="font-family:arial; color:Gray;font-size:20px;"><B>West&nbsp;==> 4 </p>
            </div>
            <div class="col-sm-3">
                <p style="font-family:arial; color:Olive;font-size:20px;"><B>North-West&nbsp;==> 5 <B><p>
                <p style="font-family:arial; color:Blue;font-size:20px;"><B>North-East&nbsp;&nbsp;==> 6 <B><p>
            </div>
            <div class="col-sm-3">
                <p style="font-family:arial; color:Maroon;font-size:20px;"><B>South-West&nbsp;==> 7 <B><p>
                <p style="font-family:arial; color:Teal;font-size:20px;"><B>South-East&nbsp;&nbsp;==> 8 <B><p>
            </div>
        </div>
        </div>
    
    </div>
    <div class="col-sm-2  well" style="height:100%;">
     
        Search from time range
        <div class="well">
            <form class="form"action="WindDirectionWriteXML.php" method="post">
                <?php include 'DIV/rightSideNav.php';?>
            </form>
        </div>
    </div>
  </div>
</div>

<div class="footerrow">
    <footer class="container-fluid text-center">
      <p>Footer Text</p>
    </footer>
</div>
</body>
</html>



