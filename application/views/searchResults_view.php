<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>CeeKo - Discover and Learn</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/ceeko.css" rel="stylesheet">

  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../../Einstien">CeeKo</a>
        </div>
        
        <!-- Search Bar on the Top Nav-->
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control search-bar-top-nav" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>


          <ul class="nav navbar-nav navbar-right">
            <button type="button" class="btn btn-primary navbar-btn">Sign in</button>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

       <!-- Main component for a primary marketing message or call to action -->
         <div id="map-canvas" class = "img-thumbnail" style = " height : 500px; width : 100%;"></div>

      <div class = "jumbotron">
        <div class = "active-master">
            
            <div id = "master-img">
              <img src="../images/zainlarge.png" alt="Zain Adil" class="active-master-image">
            </div>
            
            <div id = "master-details">
              <div class = "active-master-name" > Zain Adil</div> <div id="star"></div>
            </div>

         </div>

            <div id = "master-details-page">
              <button type="button" class="btn btn-default">Message</button>
            </div>
      </div>

      <div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
      </div>
         
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgegoVE4gn1zEC06gILV77MdfbNybUO3E&sensor=false">
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(39.241116, -94.51759),
          zoom: 12 // Load this value based on the search result
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);

        // Load this from an XML/JSON File that's sent from the controller
        var business_locations = 
            [
                ['Vadim Stark',     '../images/vadim.png',        39.208518, -94.512635],
                ['You', '../images/zain.png', 39.241116, -94.51759],
                ['Nidale Hajjar', '../images/nidale.png',     39.246116, -94.57759],
                ['Mehsum Mansoor',         '../images/mehsum.png',          39.246472, -94.443878]
            ];

        for(var i = 0; i < business_locations.length; i++)
            {

              var image = business_locations[i][1];
              var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(business_locations[i][2], business_locations[i][3]),
                    map: map,
                    icon: image,
                    title: business_locations[i][0],
                });

                google.maps.event.addListener(marker, "click", function() {
                   alert("Hi I am a tutor");
                });    
          }
      }

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
    <!-- Star ratings for masters -->
    <script src="../js/jquery.raty.min.js"></script>
    <script type="text/javascript">
        $('#star').raty({ path: '../js/img',readOnly: true, score: 4.5});

    </script>

    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
