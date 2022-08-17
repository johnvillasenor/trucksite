<?php
// connect to database
  include('config/db_connect.php');

  //write query for all trucks
  $sql = 'SELECT * FROM trucks ORDER BY date_created';

  // get results of query
  $result = mysqli_query($conn, $sql);

  //fetch rows (records) as array
  $trucks = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);

  //print
  // print_r($trucks);

  // echo $sql;

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

        <?php foreach($trucks as $truck){ ?>

          <div class="col s6 md3">
            <div class="card z-depth-9">
              <div class="card-content center">
                🚚
                <h6> <?php echo htmlspecialchars($truck['model']); ?> </h6>
                <div><b>Year: </b><?php echo htmlspecialchars($truck['year']);?></div>
                <div><b>Miles: </b><?php echo htmlspecialchars($truck['miles']);?></div>
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
