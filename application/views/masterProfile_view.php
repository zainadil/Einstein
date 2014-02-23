<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Using this Style Sheet for the Einstien Font - Not sure if it flows with the complete theme - Ask Omeed for suggestions -->
    <!-- http://designshack.net/articles/css/the-10-best-script-and-handwritten-google-web-fonts/ -->
    <link href="http://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet" type="text/css">
    
    <title>Einstein - Discover and Learn</title>

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
          <a class="navbar-brand" href="../../Einstien" id = "header-text">Einstein</a>
        </div>
        
        <!-- Search Bar on the Top Nav-->
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control search-bar-top-nav" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>


          <ul class="nav navbar-nav navbar-right">
            <?php if($login < 1) 
              echo "<a href='$login_url' class='btn btn-primary navbar-btn'>Sign in</a>";
              else { ?> 
              <img class = "navbar-user-image" src="http://graph.facebook.com/<?php echo $user_profile['id']?>/picture"><div class = "navbar-user-name"><?php echo $user_profile['name']; ?></div>
            <?php
              }
            ?>  
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class = "jumbotron" style = "height : 700px;">
        <div class = "active-master">
            
            <div id = "master-img">
              <img src="../images/zainlarge.png" alt="Zain Adil" class="active-master-profile-image">
            </div>
            
            <div id = "master-profile-details">
              <div class = "active-master-profile-name" > Zain Adil </div> <div id="star"></div>
            </div>

            <div id="endorse-button-parent">

              <div id="endorsementCount" data-count="0">Endorsement: 0</div>

              <form method="POST" class="form-inline" role="form" id="id-form-endorse" action="../../Einstien/index.php/masterProfile/">
                <div class="form-group">
                    <input type="hidden" id="loggedInStatus" name="loggedInStatus" value="<?php echo $login >= 1 ? 1 : 0; ?>" />
                </div>
                <input type="submit" name="endorseButton" value="Endorse" class="btn btn-primary btn-lg" id="endorse-button"/>
              </form> 


            </div>
        </div>
        <h2> Location </h2>
        <div id="map-canvas" class = "img-thumbnail" style = " height : 200px; width : 80%;">

        </div>
        <br/>
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://google.ca" data-via="Einstien" data-lang="en" data-text = "Checkout Joh Doe, He's giving guitar Lessons" data-hashtags = "GuitarLessons" data-related="anywhereTheJavascriptAPI" data-count="vertical">Tweet</a>  
         
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- Twiiter API Function -->
     <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

    <!-- Google Maps API function -->
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgegoVE4gn1zEC06gILV77MdfbNybUO3E&sensor=false">
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          scrollwheel: false,
          center: new google.maps.LatLng(39.241116, -94.51759),
          zoom: 12 // Load this value based on the search result
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);

        // Load this from an XML/JSON File that's sent from the controller
        var business_locations = 
            [
                ['You', '../images/zain.png', 39.241116, -94.51759]
            ];

        for(var i = 0; i < business_locations.length; i++)
            {

              var image = business_locations[i][1];
              var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(business_locations[i][2], business_locations[i][3]),
                    map: map,
                    //icon: image,
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

    <script type="text/javascript">
      $('#endorse-button').click(function(e){
        e.preventDefault();
        var userStatus = parseInt($('#loggedInStatus').val());
        var endorsementCount = parseInt($('#endorsementCount').data('count'));
        //alert(endorsementCount);
        if(userStatus == 0)
        {
          alert("You must be logged in to endorse!");
          return;
        }


      });
    </script>
  </body>
</html>
