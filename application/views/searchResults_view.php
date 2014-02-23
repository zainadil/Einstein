<!DOCTYPE html>
<html lang="en">

  <?php 
    $data['topic']= $topic;
    $this->load->view('head', $data);
   ?>
  
  <body>

    <?php $this->load->view('navbar'); ?>
    
    <div class="container">
        <br/>
        <br/>
        <?php echo "<h1>Results for ".ucfirst($topic)." near ".$searchLocation."</h1>";?>
        <div id="map-canvas" class = "img-thumbnail" style = "height : 500px; width : 100%;"></div>

      <!-- php this one -->
    <?php
    $temp_i = 1;

    foreach($results as $row)
    {
      $id_num = '000' . $temp_i;
      $id_num = substr($id_num, -3, 3);
      

      echo '<div class = "jumbotron master-after-first" id="master' . $id_num . '" onclick="expand_selected_master(this.id)">';

      ?>
          <div class = "active-master">
              <div id = "master-img">
                <?php
                $pieces = explode("ABCDE", $row['id']);
                  echo '<img src="../../images/processed/' . $pieces[0] . '_200.png" alt="' . $row['name'] . '" class="active-master-image">';
                ?>
              </div>
          </div>

          <?php
              echo '<div class="jumbotron2" id="master' . $id_num . '-extended" style="display:none;">';
          ?>
               <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <th><?php echo $row['name']; ?></th>
                        </tr>
                        <tr>
                            <td>Rating</td>
                            <td><?php echo $row['rating']; ?></td>
                        </tr>
                        <tr>
                            <td>Endorsement(s)</td>
                            <td><?php echo $row['backers']; ?></td>
                        </tr>
                        <tr>
                            <td>Distance</td>
                            <td><?php echo $row['dist']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <a href = "../../../Einstien/index.php/masterProfile?id=<?php echo $row['id']; ?>" class="btn btn-default btn-lg">More  <span class="ion-chevron-right"></span></a>
                <br/>
          </div>
        </div>

      <?php

      $temp_i++;
    }
    ?>
    <br/>
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
          center: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $long?>),
          zoom: 12 // Load this value based on the search result
        };

        var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);
        var markers = [];
        var master_ids = [];

        myMarker = new google.maps.Marker({
                    position: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $long?>),
                    map: map,
                    title: "You"
                });

        markers.push(myMarker);

       <?php
       $i = 0;
        foreach($results as $row)
        {

          echo 'var name = "' . $row['name'] . '";';
          $pieces = explode("ABCDE", $row['id']);
          echo 'var image = "../../images/processed/' . $pieces[0] . '_circle.png";';

          $i++;
          $id_num = '000' . $i;
          $id_num = substr($id_num, -3, 3);
          $i--;

          $master_id = "master" . $id_num;
          echo 'var id_of_master = "' . $master_id . '";';

          echo 'var latitude = ' . $row['lat'] . ';';
          echo 'var longitude = ' . $row['long'] . ';';

          echo 'var i = ' . $i . ';';

          ?>

                    var imagex = {
                      url: image,
                      origin: new google.maps.Point(0,0), //origin is where the picture starts getting drawn, so 0,0 == draw the whole picture
                      anchor: new google.maps.Point(50,50),//offset_avatar_middlepoint,offset_avatar_middlepoint),//anchor is the middle point for drawing the marker
                      // scaledSize: new google.maps.Size(desired_avatar_width,desired_avatar_height)

                      <?php
                      if ($i == 0)
                      {
                        echo 'scaledSize: new google.maps.Size(90,90)';
                      }
                      else if ($i == 1)
                      {
                        echo 'scaledSize: new google.maps.Size(75,75)';
                      }
                      else
                      {
                        echo 'scaledSize: new google.maps.Size(60,60)';
                      }

                      ?>

                    };


                    marker = new google.maps.Marker({
                    position: new google.maps.LatLng(latitude, longitude),
                    map: map,
                    icon: imagex,
                    title: "<?php echo $row['name'];?>"
                    });

                    markers.push(marker);
                    master_ids.push(id_of_master);

                    var addListener = function (i) {
                    google.maps.event.addListener(marker, 'click', function(){
                    scroll_to_master(master_ids[i]);                 
               });
              }

              addListener(i);

          <?php          

            $i++;
        }
        ?>



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
