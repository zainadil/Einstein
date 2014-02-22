<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <!-- Using this Style Sheet for the Einstien Font - Not sure if it flows with the complete theme - Ask Omeed for suggestions -->
    <!-- http://designshack.net/articles/css/the-10-best-script-and-handwritten-google-web-fonts/ -->
    <link href="http://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet" type="text/css">

    <title>Einstein - Discover and Learn</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/ceeko.css" rel="stylesheet">

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
          <!-- <img src = "images/mustache-header.png" class "navbar-btn" id = "header-img"> -->
          <a class="navbar-brand" href="../Einstien" id = "header-text">Einstein</a>
        </div>
        
          <ul class="nav navbar-nav navbar-right">
            <button type="button" class="btn btn-primary navbar-btn">Sign in</button>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
          <div class="centered">

            <div id = "landing-page-header">
              <!-- <img src = "images/mustache-header.png" class "navbar-btn" id = "lading-page-image">   -->
              Einstein
            </div>
          <br/>
          <form id="id-form-landing" class="form-signin" method="POST" action="../../Einstien/index.php/searchResults/processSearch">
            <input type="text" class="form-control input-lg search-bar" name="query" id="query" placeholder="Disover and Learn"autofocus=""></input>
              <br/><br/>
              <input type="hidden" id = "long" name="long" value='45.99'/>
              <input type="hidden" id = "lat" name="lat" value='-70.22'/>
              <input type="hidden" id = "ulearnTopic" name="ulearnTopic" value="userskill" />
             <button class="btn btn-default" type="button" name="loginButton" value="Login" id="submit-button">Search</button>
            </form>
           </div> 
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgegoVE4gn1zEC06gILV77MdfbNybUO3E&sensor=false"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">


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

          var searchQuery = $('#query').val();
          var modifiedQuery = "";
          var searchLocation = "";
          var learnTopic = "";
          var locationFound = false;
          var userLongitude = 0;
          var userLatitude = 0;
          //alert(searchQuery);

          if(searchQuery == '')
          {
            alert('Must enter a search term!');
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
              learnTopic = (modifiedQuery.split("how to "))[1];
              locationFound = true;
            }
            else if (indexAround > 1) 
            {
              // keyword around is found in query
              searchLocation = (searchQuery.split("around"))[1];
              modifiedQuery = (searchQuery.split(" around"))[0];
              learnTopic = (modifiedQuery.split("how to "))[1];
              locationFound = true;
            }
            else if(indexBy > 1)
            {
              searchLocation = (searchQuery.split("by"))[1];
              modifiedQuery = (searchQuery.split(" by"))[0];
              learnTopic = (modifiedQuery.split("how to "))[1];
              locationFound = true;
            }
            else
            {
              searchLocation = "navigator";
              locationFound = false;
              modifiedQuery = searchQuery;
              learnTopic = (modifiedQuery.split("how to "))[1];
            }

            // if user did not enter a skill, then remind
            if(learnTopic == "")
            {
              alert("Please enter a skill to learn");
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

                  //console.log("latitude  : " + userLatitude + "  longitude   : " + userLongitude);

                  if(userLongitude == 0 && userLatitude == 0)
                  {
                    alert("Unable to find the specified location. Please try again!");
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
                alert("Geolocation API is not supported in your browser. Please specify a location in your search!")
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
                        alert("Unable to find the specified location. Please try again!");
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
                    alert("No Results founds");
                  }
              });

            } // end else

            //alert("learnTopic : " + learnTopic + " at searchLocation: " + searchLocation);

          }  // end else query

      }); // end submit 


    </script>

  </body>
</html>
