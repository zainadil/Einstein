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
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/ceeko.css" rel="stylesheet">

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
          <a class="navbar-brand" href="../../../Einstien" id = "header-text">Einstein</a>
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



      <div class = "jumbotron" id="tutor001">
        <div class = "active-master">
            
            <div id = "master-img">
              <img src="../../images/zainlarge.png" alt="Zain Adil" class="active-master-image">
            </div>
            
            <div id = "master-details">
              <div class = "active-master-name" > Zain Adil</div> <div id="star"></div>
            </div>
      </div>

            <div id = "master-details-page">
              <a href = "../../../Einstien/index.php/masterProfile" class="btn btn-default">More..</a>
            </div>
      </div>



      <div class = "jumbotron" id="tutor002">
        <div class = "active-master">
            
            <div id = "master-img">
              <img src="../../images/nidalelarge.png" alt="Nidale Hajjar" class="active-master-image">
            </div>
            
            <div id = "master-details">
              <div class = "active-master-name" > Nidale Hajjar</div> <div id="star"></div>
            </div>
      </div>

            <div id = "master-details-page">
              <a href = "../../../Einstien/index.php/masterProfile" class="btn btn-default">More..</a>
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




    //GLOBAL VARIABLES
    var allow_scrolling_to_div = true;

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
            ['Vadim Stark',     '../../images/vadim.png', 39.208518, -94.512635, "tutor004"],
            ['You', '../../images/zain.png', 39.241116, -94.51759, "tutor001"],
            ['Nidale Hajjar', '../../images/nidale.png', 39.246116, -94.57759, "tutor002"],
            ['Mehsum Mansoor', '../../images/mehsum.png', 39.246472, -94.443878, "tutor003"]
        ];


        var markers = [];
        var master_ids = [];

        for(var i = 0; i < business_locations.length; i++)
        {

              var image = business_locations[i][1];
              var id_of_master = business_locations[i][4];

              marker = new google.maps.Marker({
                    position: new google.maps.LatLng(business_locations[i][2], business_locations[i][3]),
                    map: map,
                    icon: image,
                    title: business_locations[i][0],
                });

              markers.push(marker);
              master_ids.push(id_of_master);

              var addListener = function (i) {
              google.maps.event.addListener(marker, 'click', function(){
                  // infoWindows[i].open(map, positions[i]);
                  // alert(id_of_tutor);                 
                  // alert(master_ids[i]);
                  scroll_to_master(master_ids[i]);                 
              });
              }

              addListener(i);

        }

      }

      function scroll_to_master(id)
      {
        if (allow_scrolling_to_div)
        {
          var concat_id = '#' + id;
          var top = $(concat_id).position().top;
          var start_y = $(window).scrollTop();
          do_the_scroll(top-55, 1, 1, start_y);
          allow_scrolling_to_div = false;
        }
      }

      function do_the_scroll(desired_y, speed, direction, start_y)
      {
        var current_y = $(window).scrollTop();
      
        speed +=2;

        if (current_y + speed < desired_y)
        {
           $("html, body").scrollTop(current_y+speed);
           setTimeout( function() {  do_the_scroll(desired_y, speed, direction) } ,15);
        }
        else
        {
          //done scrolling
          $("html, body").scrollTop(desired_y);
          allow_scrolling_to_div = true;
        }
      }




      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
    <!-- Star ratings for masters -->
    <script src="../../js/jquery.raty.min.js"></script>
    <script type="text/javascript">
        $('#star').raty({ path: '../../js/img',readOnly: true, score: 4.5});

    </script>

    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>
