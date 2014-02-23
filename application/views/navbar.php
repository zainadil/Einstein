    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"></button>
          <a class="navbar-brand" href="../../../Einstien" id = "header-text">Einstein</a>
        </div>
       
        <?php 
            if (strcmp(basename($this->router->fetch_class()), 'landingpage') != 0) { ?>
                <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control search-bar-top-nav" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
                </form>
        <?php } ?> 


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
