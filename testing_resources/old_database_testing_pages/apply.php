<?php
include('config/db_connect.php');
$miles = $model = $year = '';
$errors = array('miles' => '', 'year' => '', 'model' => '');

if(isset($_POST['submit'])){

  if(empty($_POST['model'])){
    $errors['model'] = 'Model is required.';
  } else {
    $model = $_POST['model'];
  }

  if(empty($_POST['miles'])){
    $errors['miles'] = 'Miles is required.';
  } else {
    $miles = $_POST['miles'];
    if(preg_match('/^[a-zA-Z\s]+$/', $miles)){
      $errors['miles'] = 'Miles must be an integer.';
    }
  }

  if(empty($_POST['year'])){
    $errors['year'] = 'Year is required.';
  } else {
    $year = $_POST['year'];
    if(preg_match('/^[a-zA-Z\s]+$/', $year)){
      $errors['miles'] = 'Year must be an integer.';
    }
  }

  if(array_filter($errors)){
    //error!!!
    mysqli_close($conn);
  } else{
    $miles = mysqli_real_escape_string($conn, $_POST['miles'] );
    $year = mysqli_real_escape_string($conn, $_POST['year'] );
    $model = mysqli_real_escape_string($conn, $_POST['model'] );

    //create sql to send to server
    $sql = "INSERT INTO trucks(model,year,miles) VALUES('$model','$year','$miles')";

    //send to db and then check it
    if(mysqli_query($conn,$sql)){
      //successful!
      mysqli_close($conn);
      header('Location: testing_page.php');
    } else {
      echo 'query error: ' . mysqli_error($conn);
      mysqli_close($conn);
    }

  }

}
?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>
<title>Apply</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<style>
.applynow{
  color: #FFFFFF;
  font-family: calibri;
  border: 10px grey;
  font-size: 75px;
  text-align: center;
  background: #7399D5;
}


.topbar a.active{
  background-color: #6EA4CF;
  color:white;
}

.apply{
  text-align: center;
  font-size:20px;
  padding-top:100px;
  padding-bottom:100px;
  max-width:460px;
  margin: 20px auto;
  padding: 20px;
  color: #808080;
}

.appinfo{
  text-align: center;
  font-size:20px;
  padding-top:0px;
  padding-bottom:15px;
  padding-right:200px;
  padding-left:200px;
}
</style>

<body>
  <body style="background-color: #d9e0e8">
    <div class="applynow">
      Apply Now
    </div>

    <div class="appinfo">
      Roadstar Trucking has been serving the DFW area for 20 years. With unmatched customer service, we are dedicated to delivering high quality materials with excellent customer service on every single job.<br>
      <center><img src="img/dallas.jpg" alt="dallas" style ="width:550px; height:500px; display:block; text-align:center; padding-top:25px">
        Our drivers are required to have a valid CDL license and all other valid, up-to-date documents in order to drive for Roadstar trucking.
        <center><img src="img/driver.jpg" alt="driver" style ="width:550px; height:500px; display:block; text-align:center; padding-top:25px">
          Roadstar Trucking offers the following benefits to all of our hired drivers:<br>
          <center><img src="img/benefits.jpg" alt="benefits" style ="width:700px; height:600px; display:block; text-align:center;">
            -one<br>
            -two<br>
            -three<br>
            -etc<br>
            Fill out our application form with current contact information. An employee will review your application and contact you within 48 hours to update you on the status of your work application
          </div>
          <div class ="apply">
            <form class="white" action="apply.php" method="POST">
              <label for="truck model">Truck Model:</label>
              <input type="text" id="model" name="model" value="<?php echo htmlspecialchars($model) ?>"><br><br>
              <div class="red-text"><?php echo $errors['model']; ?></div>
              <label for="year">Year:</label>
              <input type="text" id="year" name="year" value="<?php echo htmlspecialchars($year) ?>"><br><br>
              <div class="red-text"><?php echo $errors['year']; ?></div>
              <label for="miles">Miles:</label>
              <input type="text" id="miles" name="miles" value="<?php echo htmlspecialchars($miles) ?>"><br><br>
              <div class="red-text"><?php echo $errors['miles']; ?></div>
              <div class="center">
                <input type="submit" name="submit" class="btn brand z-depth-0" value="Submit">
              </div>
            </form>
          </div>
        </body>
      </body>

      <?php include('templates/footer.php'); ?>
      </html>
