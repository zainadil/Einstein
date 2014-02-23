<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Einstein // (CORE SEARCH TERM)</title>

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
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"></button>
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
          <?php if($login < 1) 
            echo "<a href='$login_url' class='btn btn-primary navbar-btn'>Sign in</a>";
            else { ?> 
              <img class = "navbar-user-image" src="http://graph.facebook.com/<?php echo $user_profile['id']?>/picture">
              <div class = "navbar-user-name"><?php echo $user_profile['name']; ?></div>
            <?php
              }
            ?>  
        </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

       <!-- Main component for a primary marketing message or call to action -->
         <div id="map-canvas" class = "img-thumbnail" style = " height : 500px; width : 100%;"></div>



<!-- This SHOULD BE IN A LOOP FOR THE DATA -->

<!-- ZAIN -->
      <div class = "jumbotron" id="master001" onclick="expand_selected_master(this.id)">
        <div class = "active-master">
            
            <div id = "master-img">
              <img src="../../images/zainlarge.png" alt="Zain Adil" class="active-master-image">
            </div>
            
            <div id = "master-details">
              <div class = "active-master-name" > Zain Adil</div> <div id="zainadil"></div>
            </div>
        </div>

        <div id = "master-details-page">
          <a href = "../../../Einstien/index.php/masterProfile" class="btn btn-default">More..</a>
        </div>

        <div class="jumbotron2" id="master001-extended" style="display:none;">
          <p>abcd</p>
          <p>abcd</p>
          <p>abcd</p>
           <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://google.ca" data-via="Einstien" data-lang="en" data-text = "Checkout Joh Doe, He's giving guitar Lessons" data-hashtags = "GuitarLessons" data-related="anywhereTheJavascriptAPI" data-count="vertical">Tweet</a>
        </div>

      </div>

<!-- NIDALE -->
      <div class = "jumbotron master-after-first" id="master002" onclick="expand_selected_master(this.id)">
        <div class = "active-master">
            
            <div id = "master-img">
              <img src="../../images/nidalelarge.png" alt="Nidale Hajjar" class="active-master-image">
            </div>
            
            <div id = "master-details">
              <div class = "active-master-name" > Nidale Hajjar</div> <div id="nidalehajjar"></div>
            </div>
        </div>

        <div id = "master-details-page">
          <a href = "../../../Einstien/index.php/masterProfile" class="btn btn-default">More..</a>
        </div>

        <div class="jumbotron2" id="master002-extended" style="display:none;">
          <p>abcd</p>
          <p>abcd</p>
          <p>abcd</p>
        </div>

    </div>



<!-- END OF PAGE EMPTY SPACE JUNK -->
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

    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


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
            ['Vadim Stark',     '../../images/vadim.png', 39.208518, -94.512635, "master004"],
            ['You', '../../images/zain.png', 39.241116, -94.51759, "master001"],
            ['Nidale Hajjar', '../../images/nidale.png', 39.246116, -94.57759, "master002"],
            ['Mehsum Mansoor', '../../images/mehsum.png', 39.246472, -94.443878, "master003"]
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


      function expand_selected_master(master_id)
      {
          var num = master_id.substring(6, master_id.length); // master001 -> 001
          $("#master" + num + "-extended").slideToggle();
      }


      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
    <!-- Star ratings for masters -->
    <script src="../../js/jquery.raty.min.js"></script>
    <script type="text/javascript">
    // Change to ID and Do this in a LOOP for all the masters on screen
        $('#zainadil').raty({ path: '../../js/img',readOnly: true, score: 4.5});
         $('#nidalehajjar').raty({ path: '../../js/img',readOnly: true, score: 2});

    </script>

    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>
