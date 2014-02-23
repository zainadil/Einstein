  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
    
        <?php 
            if (strcmp(basename($this->router->fetch_class()), 'searchResults') == 0) {
                echo "<title>Einstein // (CORE SEARCH TERM)</title>";
            }
            else {
                echo "<title>Einstein</title>";
            } 
        ?> 

    <!-- Bootstrap core CSS - MUST COME FIRST -->
    <link href="http://localhost:8888/Einstien/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://localhost:8888/Einstien/css/ceeko.css" rel="stylesheet">
  </head>
