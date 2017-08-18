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
    .intro{
        overflow: scroll;
        margin-top:40px;
        margin-bottom:10px;
        font-size:14px;
    }
    p {
        font-size: 18px;
        
    }
  </style>
  
<script>
    $(document).ready(function(){
        setInterval(function() {
            $("#rightSide").load("RandomImage.php");
        }, 3000);
    });

</script>

</head>
<body >


<div class="NavBar" style="background-color:#1affff;">
    <?php include 'DIV/navBar.php';?>
</div>


<div class="middlerow" style="background-color:#1affff;>  
  <div class="row" style="height:100%;width:100%;margin:0px;">
    <div class="col-sm-2  well" style="height:100%;background-color:#00e6e6;">
      <?php include 'DIV/sideNav.php';?>
    </div>
    <div class="col-sm-8" style="height:100%;"> 
        <div id="wrapper well" style="height:70%;border: 3px solid black;">
        
        
            <div id="slider" class="nivoSlider">
               
                <img src="images/wind.jpg"  alt=""  />
                <img src="images/humidity.jpg"  alt=""/>
                <img src="images/thunder.jpg"  alt=""/>
            </div>
            <div id="htmlcaption" class="nivo-html-caption">
                <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
            </div>
        

        </div>
        
        <div class="well intro" style="height:24%;padding:4px;background-color:#99FFFF">
        <p class="" style="height:90%;padding:4px;">Weather is the state of the atmosphere, to the degree that it is hot or cold, wet or dry, calm or stormy, clear or cloudy. Most weather phenomena occur in the lowest level of the atmosphere, the troposphere,just below the stratosphere. Weather refers to day-to-day temperature and precipitation activity, whereas climate is the term for the averaging of atmospheric conditions over longer periods of time. When used without qualification, "weather" is generally understood to mean the weather of Earth.
        Weather is driven by air pressure, temperature and moisture differences between one place and another. These differences can occur due to the sun's angle at any particular spot, which varies with latitude. The strong temperature contrast between polar and tropical air gives rise to the largest scale atmospheric circulations: the Hadley Cell, the Ferrel Cell, the Polar Cell, and the jet stream. Weather systems in the mid-latitudes, such as extratropical cyclones, are caused by instabilities of the jet stream flow. Because the Earth's axis is tilted relative to its orbital plane, sunlight is incident at different angles at different times of the year. On Earth's surface, temperatures usually range ±40 °C (−40 °F to 100 °F) annually. Over thousands of years, changes in Earth's orbit can affect the amount and distribution of solar energy received by the Earth, thus influencing long-term climate and global climate change.

Surface temperature differences in turn cause pressure differences. Higher altitudes are cooler than lower altitudes as most atmospheric heating is due to contact with the Earth's surface while radiative losses to space are mostly constant. Weather forecasting is the application of science and technology to predict the state of the atmosphere for a future time and a given location. The Earth's weather system is a chaotic system; as a result, small changes to one part of the system can grow to have large effects on the system as a whole. Human attempts to control the weather have occurred throughout history, and there is evidence that human activities such as agriculture and industry have modified weather patterns.

Studying how the weather works on other planets has been helpful in understanding how weather works on Earth. A famous landmark in the Solar System, Jupiter's Great Red Spot, is an anticyclonic storm known to have existed for at least 300 years. However, weather is not limited to planetary bodies. A star's corona is constantly being lost to space, creating what is essentially a very thin atmosphere throughout the Solar System. The movement of mass ejected from the Sun is known as the solar wind.</p>


        </div>
    <script type="text/javascript" src="NivoSlider/scripts/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="NivoSlider/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
    </div>
    <div class="col-sm-2  well" id="" style="height:100%;background-color:#00e6e6;">
        <div class="panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title">Weather Status</h3>
          </div>
          <div class="panel-body" id="rightSide">
            <!-- <img src="images/weather1.jpg" class="img-responsive" alt="Cinque Terre" width="100%" >
            <img src="images/weather2.jpg" class="img-responsive" alt="Cinque Terre" width="100%" >
            <img src="images/weather3.jpg" class="img-responsive" alt="Cinque Terre" width="100%" >
            <img src="images/weather4.jpg" class="img-responsive" alt="Cinque Terre" width="100%" >
            <img src="images/weather5.jpg" class="img-responsive" alt="Cinque Terre" width="100%" >
            <img src="images/weather6.jpg" class="img-responsive" alt="Cinque Terre" width="100%" > -->
            
          </div>
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


