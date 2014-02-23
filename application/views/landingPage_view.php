<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('head'); ?>
 
    <body>
    
    <?php $this->load->view('navbar'); ?>
        
        <div class="intro-header">
            <div class="container">
                <div class="centered">
                    <h1>Einstein</h1>
                    <h3>Discover & Learn</h3>
                    <br/>

		            <form method="POST" class="form-inline" role="form" id="id-form-landing" action="../../Einstien/index.php/searchResults/processSearch">
					    <div class="form-group">
						    <input type="text" name="query" id="query" autofocus="" value="" class="form-control input-lg search-bar" placeholder="Learn how to ____"/>
                            <input type="hidden" id = "long" name="long" value='45.99'/>
                            <input type="hidden" id = "lat" name="lat" value='-70.22'/>
                            <input type="hidden" id = "ulearnTopic" name="ulearnTopic" value="userskill" />
					    </div>
					    <input type="submit" name="loginButton" value="Search" class="btn btn-primary btn-lg" id="submit-button"/>
				    </form>
                    <br/>
                    <div class="alert alert-danger" id="alert-message" style="display:none;max-width:800px;margin:auto">Error!</div>
                
                    <?php 
                        if (strcmp($error, "") != 0) { ?>
                            <div class="alert alert-danger" id="error-query" style="max-width:800px;margin:auto">
                                <?php echo $error; ?>
                            </div>
                            <?php 
                        } 
                         ?>
                </div> 
            </div> <!-- END container -->
        </div> <!-- END intro-header -->

         <?php $this->load->view('footer'); ?>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgegoVE4gn1zEC06gILV77MdfbNybUO3E&sensor=false"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">

      // if the error is shown then hide it
      $('#error-query').delay(4000).fadeOut();

      /*
      var availableAutosuggestions = [
        "Learn how to",
        "Learn",
        "Learn to",
        "near",
        "around",
        "by"
      ];

      $('#query').autocomplete({
        source : availableAutosuggestions

      });
      */

    // Script that gets the Location and then forwards it to the backend.

    //Populate Hiddent Fields within the form, update the query field with the remaing and send to Controller - Leave this to Zahid.

    // Only disect out the Location, do the rest in PHP in the Backend.

      // we first grab the search query
      //$('#id-form-landing').submit(function(e){
        $('#submit-button').click(function(e){
          //alert('Handler for submit called');
          // prevent the default submission, dissect the query, get the latitude and longitude and then finally
          // submit using jquery post
          e.preventDefault();

          //var regex = /learn ?| ?how ?| ?to ?| ?play ?| ?ride?| a ?/
          var regex = /learn to ?|learn ?| ?how to ?| ?how ?| to | ?play a ?| ?ride a ?| a ?/

          var searchQuery = ($('#query').val()).toLowerCase();
          var modifiedQuery = "";
          var searchLocation = "";
          var learnTopic = "";
          var locationFound = false;
          var userLongitude = 0;
          var userLatitude = 0;

          var alertMessage = $('#alert-message');

          if(searchQuery == '')
          {
            alertMessage.text("Must enter a search term, I'm no Einstein!").show().delay(3000).fadeOut();
            //alert('Must enter a search term!');
            return;
          }
          else
          {
            //alert(searchQuery);
            // see if any of near, by or around keyword is in the query
            var indexNear = 0;
            var indexAround = 0;
            var indexBy = 0;

            indexNear = (searchQuery.split("near")).length;
            indexAround = (searchQuery.split("around")).length;
            indexBy = (searchQuery.split("by")).length;

            if(indexNear > 1)
            {
              // we found near in the query
              searchLocation = (searchQuery.split("near"))[1];
              modifiedQuery = (searchQuery.split(" near"))[0];
              //learnTopic = (modifiedQuery.split("how to "))[1] ? (modifiedQuery.split("how to "))[1] : (modifiedQuery.split(" to "))[1];
              modifiedQuery2 = modifiedQuery.split(regex);
              learnTopic = modifiedQuery2[modifiedQuery2.length - 1];
              locationFound = true;
            }
            else if (indexAround > 1) 
            {
              // keyword around is found in query
              searchLocation = (searchQuery.split("around"))[1];
              modifiedQuery = (searchQuery.split(" around"))[0];
              //learnTopic = (modifiedQuery.split("how to "))[1] ? (modifiedQuery.split("how to "))[1] : (modifiedQuery.split(" to "))[1];
              modifiedQuery2 = modifiedQuery.split(regex);
              learnTopic = modifiedQuery2[modifiedQuery2.length - 1];
              locationFound = true;
            }
            else if(indexBy > 1)
            {
              searchLocation = (searchQuery.split("by"))[1];
              modifiedQuery = (searchQuery.split(" by"))[0];
              //learnTopic = (modifiedQuery.split("how to "))[1] ? (modifiedQuery.split("how to "))[1] : (modifiedQuery.split(" to "))[1];
              modifiedQuery2 = modifiedQuery.split(regex);
              learnTopic = modifiedQuery2[modifiedQuery2.length - 1];
              locationFound = true;
            }
            else
            {
              searchLocation = "navigator";
              locationFound = false;
              modifiedQuery = searchQuery;
              //learnTopic = (modifiedQuery.split("how to "))[1] ? (modifiedQuery.split("how to "))[1] : "";
              modifiedQuery2 = modifiedQuery.split(regex);
              learnTopic = modifiedQuery2[modifiedQuery2.length - 1];
              console.log(learnTopic);
            }

            // if user did not enter a skill, then remind
            if(learnTopic == "")
            {
              alertMessage.text("Oops! Can't really understand what you're tryin to say, maybe e = mc^2?").show().delay(3000).fadeOut();
              return;
            }

            // now check if user location if provided or not and depending on that 
            // get the latitude and longitude, or use the nagivator location to use 
            // as current user location
            if(!locationFound)
            {
              //alert("User did not specify a location");
              //return;
              if(navigator.geolocation)
              {
                navigator.geolocation.getCurrentPosition(function (position) {
                  var latitude = position.coords.latitude;
                  var longitude = position.coords.longitude;

                  userLatitude = latitude;
                  userLongitude = longitude;

                  if(userLongitude == 0 && userLatitude == 0)
                  {
                    alertMessage.text("Unable to find the specified location. Please try again!").show().delay(3000).fadeOut();
                    return;
                  }
                  else
                  {
                    $('#lat').val(userLatitude);
                    $('#long').val(userLongitude);
                    $('#ulearnTopic').val(learnTopic);
                    $('#id-form-landing').submit();
                  }

                });
              }
              else
              {
                alertMessage.text("Geolocation API is not supported in your browser. Please specify a location in your search!").show().delay(3000).fadeOut();
                return;
              }

            }
            else
            {

              var geocoder = new google.maps.Geocoder();
              var address = searchLocation;
              geocoder.geocode({
                'address': address
              }, function (results, status) {
                  if (status == google.maps.GeocoderStatus.OK) {

                      userLatitude = results[0].geometry.location.lat();
                      userLongitude = results[0].geometry.location.lng();

                      console.log("latitude: " + userLatitude + "  longitude: " + userLongitude);

                     if(userLongitude == 0 && userLatitude == 0)
                      {
                        alertMessage.text("Unable to find the specified location. Please try again!").show().delay(3000).fadeOut();
                        return;
                      }
                      else
                      {
                        $('#lat').val(userLatitude);
                        $('#long').val(userLongitude);
                        $('#ulearnTopic').val(learnTopic);
                        $('#id-form-landing').submit();
                      }

                  } else
                  {
                    alertMessage.text("No results found!").show().delay(3000).fadeOut();
                    return;
                  }
              });

            } // end else

          }  // end else query

      }); // end submit 


    </script>

  </body>
</html>
