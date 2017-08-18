<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="jquery/jquery-1.10.2.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="NivoSlider/themes/default/default.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="NivoSlider/themes/light/light.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="NivoSlider/themes/dark/dark.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="NivoSlider/themes/bar/bar.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="NivoSlider/nivo-slider.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="NivoSlider/style.css" type="text/css" media="screen" />

  <link rel="stylesheet" href="css/Style.css">

  <style>
 
  </style>
</head>
<body >
<div class="NavBar">
    <?php include 'DIV/navBar.php';?>
</div>


<div class="middlerow">  
  <div class="row" style="height:100%;width:100%;margin:0px;">
    <div class="col-sm-2  well" style="height:100%;">
      <?php include 'DIV/sideNav.php';?>
    </div>
    <div class="col-sm-8" style="height:100%;">         
        
        <div class="well" style="height:30%;padding-top:40px;">
            Welcome

        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
        deserunt mollit anim id est laborum consectetur adipiscing elit, 
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

        </div>
    <script type="text/javascript" src="NivoSlider/scripts/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="NivoSlider/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
    </div>
    <div class="col-sm-2  well" style="height:100%;">
     
        <?php //include 'DIV/rightSideNav.php';?>
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


