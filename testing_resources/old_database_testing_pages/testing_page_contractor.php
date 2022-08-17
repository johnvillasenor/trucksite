<?php

// connect to database
  include('config/db_connect.php');

  //write query for all trucks
  $sql = 'SELECT * FROM contractors ORDER BY date_created';

  // get results of query
  $result = mysqli_query($conn, $sql);

  //fetch rows (records) as array
  $contractors = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>

        <title>Testing Page</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>

      <h4 class="center grey-test"> Truck database display </h4>

    <div class="container">
      <div class="row">

        <?php foreach($contractors as $contractor){ ?>

          <div class="col s6 md3">
            <div class="card z-depth-9">
              <div class="card-content center">
                🚚
                <h6> <?php echo htmlspecialchars($contractor['fname']); ?> </h6>
            </div>
            <div class="card-action center-align">
              <a class= "brand-text" href="#">Click here for more info (wip)</a>
              </div>
           </div>
         </div>

       <?php } ?>

       </div>
      </div>

      </body>

    <?php include('templates/footer.php'); ?>
</html>
