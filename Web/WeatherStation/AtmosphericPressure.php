<!DOCTYPE html>
<html lang="en">
<head>
<title>Bootstrap Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/Style.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>


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
                  <h1><center><b> ATMOSPHERIC PRESSURE </b></center></h1>
              </div>
            </div>
            <div class="chart-container well">
	            <canvas id="mycanvas"></canvas>
	            <p id="setPlace"></p>
            </div>
        </div>
    
    </div>
    <div class="col-sm-2  well" style="height:100%;">
     
        Search from time range
        <div class="well">
            <form class="form"action="" onsubmit="return myFunction()"  method="">
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

<script type="text/javascript" src="js/PressureGraph.js"></script>
<script>

</script>

</body>
</html>



