<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('head'); ?>
  
    <body>

    <?php $this->load->view('navbar'); ?>
    
    <div class="container">

      <div class = "jumbotron" style = "height : 900px;margin-top:60px">
        <div class = "active-master">
               <?php
                    $pieces = explode('ABCDE', $endorsement['id']);
                  echo '<img src="http://localhost:8888/Einstien/images/processed/' . $pieces[0] . '_200.png" alt="' . $endorsement['name'] . '" class="active-master-profile-image">';
                ?>
                
                <br/>
               <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <th><?php echo $endorsement['name']; ?></th>
                        </tr>
                        <tr>
                            <td>Rating</td>
                            <td><?php echo $endorsement['rating']; ?></td>
                        </tr>
                        <tr>
                            <td>Endorsement(s)</td>
                            <td><?php echo $endorsement['backers']; ?></td>
                        </tr>
                    </tbody>
                </table>
        </div>
          <p><?php echo $endorsement['detail']; ?></p>
        <br />

            <div id="endorse-button-parent">
              <form method="POST" class="form-inline" role="form" id="id-form-endorse" action="../../Einstien/index.php/masterProfile?id=<?php echo $endorsement['id']; ?>">
                <div class="form-group">
                    <input type="hidden" id="loggedInStatus" name="loggedInStatus" value="<?php echo $login >= 1 ? 1 : 0; ?>" />
                    <input type="hidden" id="backersCount" name="backersCount" value="<?php echo $endorsement['backers']; ?>" />
                    <input type="hidden" id="userid" name="userid" value="<?php echo $endorsement['id']; ?>" />
                </div>
                <input type="submit" name="endorseButton" value="Endorse" class="btn btn-primary btn-lg" id="endorse-button"/>
                <input type="submit" value="Contact" class="btn btn-primary btn-lg"/>
                <div id="warning-login" style="display:none">You must be logged in to endorse!</div>
              </form> 
            </div>
        
            <br/>

        <h2><b>Location</b></h2>
        <div id="map-canvas" class = "img-thumbnail" style = "height : 200px; width : 80%;">

        </div>
        <br/>
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://google.ca" data-via="Einstien" data-lang="en" data-text = "Checkout Joh Doe, He's giving guitar Lessons" data-hashtags = "GuitarLessons" data-related="anywhereTheJavascriptAPI" data-count="vertical">Tweet</a>  
         
    </div> <!-- /container -->

    <?php $this->load->view('footer'); ?>

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
                ['You', '../images/zain.png', <?php ?>39.241116, -94.51759]
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
          $('#endorse-button').attr('disabled','disabled');
          $("#warning-login").css('display', '').delay(3000).fadeOut();
          //alert("You must be logged in to endorse!");
          return;
        }


        $('#id-form-endorse').submit();

      });
    </script>
  </body>
</html>
