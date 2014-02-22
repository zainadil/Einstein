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
          <form class="form-signin" method="POST" action="../../Einstien/index.php/searchResults/processSearch">
            <input type="text" class="form-control input-lg search-bar" name="query" id="query" placeholder="Disover and Learn"autofocus=""></input>
              <br/><br/>
              <input type="hidden" id = "long" name="long" value='45.99'/>
              <input type="hidden" id = "lat" name="lat" value='-70.22'/>
             <button class="btn btn-default" type="submit" name="loginButton" value="Login">Search</button>
            </form>
           </div> 
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">

    // Script that gets the Location and then forwards it to the backend.

    //Populate Hiddent Fields within the form, update the query field with the remaing and send to Controller - Leave this to Zahid.

    // Only disect out the Location, do the rest in PHP in the Backend.

    </script>

  </body>
</html>
