<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>CeeKo - Discover and Learn</title>

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
          <a class="navbar-brand" href="../Einstien">CeeKo</a>
        </div>
        
          <ul class="nav navbar-nav navbar-right">
            <button type="button" class="btn btn-primary navbar-btn">Sign in</button>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
          <div class="centered">
            <h1>CeeKo</h1>
          <br/>
          <form class="form-signin" method="POST" action="../../Einstien/index.php/searchResults">
            <input type="text" class="form-control input-lg search-bar" name="username" id="username" placeholder="Disover and Learn"autofocus=""></input>
              <br/><br/>
             <button class="btn btn-default" type="submit" name="loginButton" value="Login">Search</button>
            </form>
           </div> 
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
