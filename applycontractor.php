<?php

// Connection to database
include('config/db_connect.php');

// Setting up variables to send to SQL
$fname = $lname = $address = $city = $state =
  $zip = $phone = $email = $license = $social = '';

$errors = array('fname' => '', 'lname' => '', 'address' => '',
'city' => '', 'state' => '', 'zip' => '',
'phone' => '', 'email' => '', 'license' => '','social' => '');

// Some minor error checking
// we could use an array and a loop for this couldn't we..
if(isset($_POST['submit'])){

  if(empty($_POST['fname'])){
    $errors['fname'] = 'Entering a fname is required.';
  } else {
    $fname = $_POST['fname'];
  }

  if(empty($_POST['lname'])){
    $errors['lname'] = 'Entering a lname is required.';
  } else {
    $lname = $_POST['lname'];
  }

  if(empty($_POST['address'])){
    $errors['address'] = 'Entering a address is required.';
  } else {
    $address = $_POST['address'];
  }

  if(empty($_POST['city'])){
    $errors['city'] = 'Entering a city is required.';
  } else {
    $city = $_POST['city'];
  }

  if(empty($_POST['state'])){
    $errors['state'] = 'Entering a state is required.';
  } else {
    $state = $_POST['state'];
  }

  if(empty($_POST['zip'])){
    $errors['zip'] = 'Entering a zip is required.';
  } else {
    $zip = $_POST['zip'];
  }

  if(empty($_POST['phone'])){
    $errors['phone'] = 'Entering a phone is required.';
  } else {
    $zip = $_POST['phone'];
  }

  if(empty($_POST['email'])){
    $errors['email'] = 'Entering a email is required.';
  } else {
    $zip = $_POST['email'];
  }

  if(empty($_POST['license'])){
    $errors['license'] = 'Entering a license is required.';
  } else {
    $zip = $_POST['license'];
  }

  if(empty($_POST['social'])){
    $errors['social'] = 'Entering a social is required.';
  } else {
    $zip = $_POST['social'];
  }


  // Send to database if there's no error
  if(array_filter($errors)){
    //error!!!
    mysqli_close($conn); // close connection if there's issues
  } else{

    //get rid of characters that shouldnt' be here
    $fname = mysqli_real_escape_string($conn, $_POST['fname'] );
    $lname = mysqli_real_escape_string($conn, $_POST['lname'] );
    $address = mysqli_real_escape_string($conn, $_POST['address'] );
    $city = mysqli_real_escape_string($conn, $_POST['city'] );
    $state = mysqli_real_escape_string($conn, $_POST['state'] );
    $zip = mysqli_real_escape_string($conn, $_POST['zip'] );
    $phone = mysqli_real_escape_string($conn, $_POST['phone'] );
    $email = mysqli_real_escape_string($conn, $_POST['email'] );
    $license = mysqli_real_escape_string($conn, $_POST['license'] );
    $social = mysqli_real_escape_string($conn, $_POST['social'] );

    //create sql to send to server
    $sql = "INSERT INTO contractors(fname,lname,address,city,state,zip,phone,email,license,social) VALUES('$fname','$lname',
      '$address','$city','$state','$zip','$phone','$email','$license','$social')";

      //send to db and then check it by sending to testing page
      if(mysqli_query($conn,$sql)){
        //successful!
        mysqli_close($conn);
        header('Location: successful_submission.php');
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
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <style>
        .contractor{
            color: #FFFFFF;
            font-family: calibri;
            border: 10px grey;
            font-size: 30px;
            text-align: center;
            background: #7399D5;
        }

      .label{
        font-size: 20px;
        color: #000000;
        text-align: left;
        display: block;
      }

      .upload{
        text-align: left;
        display: block;
      }

      .apply-form {
        width: 50%;
        margin: 0 auto;
        font-family: Tahoma, Geneva, sans-serif;
      }

    </style>

    <body>
        <div class="contractor">
            Contractor Information Sheet
        </div>
        <form class="apply-form" action="applycontractor.php" method="POST">
          <br>
            <label for="fname" class="label">First name:</label>
            <input type="text" id="fname" name="fname"  value="<?php echo htmlspecialchars($fname) ?>" ><br><br>
            <div class="red-text"><?php echo $errors['fname']; ?></div>

            <label for="lname" class="label">Last name:</label>
            <input type="text" id="lname" name="lname" value="<?php echo htmlspecialchars($lname) ?>" ><br><br>
            <div class="red-text"><?php echo $errors['lname']; ?></div>

            <label for="address" class="label">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($address) ?>" ><br><br>
            <div class="red-text"><?php echo $errors['address']; ?></div>

            <label for="city" class="label">City:</label>
            <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($city) ?>" ><br><br>
            <div class="red-text"><?php echo $errors['city']; ?></div>

            <label for="state" class="label">State:</label>
            <input type="text" id="state" name="state" value="<?php echo htmlspecialchars($state) ?>" ><br><br>
            <div class="red-text"><?php echo $errors['state']; ?></div>

            <label for="address" class="label">Zip Code:</label>
            <input type="number" id="zip" name="zip" value="<?php echo htmlspecialchars($zip) ?>" ><br><br>
            <div class="red-text"><?php echo $errors['zip']; ?></div>

            <label for="phone" class="label">Phone Number:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($phone) ?>" ><br><br>
            <div class="red-text"><?php echo $errors['phone']; ?></div>

            <label for="email" class="label">Email Address:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email) ?>" ><br><br>
            <div class="red-text"><?php echo $errors['email']; ?></div>

            <label for="license" class="label">Driver's License Number:</label>
            <input type="number" id="license" name="license" value="<?php echo htmlspecialchars($license) ?>" ><br><br>
            <div class="red-text"><?php echo $errors['license']; ?></div>

            <label for="social" class="label">Social Security Number/Proof EIN Number:</label>
            <input type="number" id="social" name="social" value="<?php echo htmlspecialchars($social) ?>" ><br><br>
            <div class="red-text"><?php echo $errors['social']; ?></div>

            <label for="w9" class="label">Upload W-9:</label>
            <input type="file" id="w9" name="w9" class="upload">
            <br>

            <label for="licenseUpload" class="label">Upload Driver's License:</label>
            <input type="file" id="licenseUpload" name="licenseUpload" class="upload">
            <br>

            <label for="ssEin" class="label">Upload Social Security Card or EIN Proof:</label>
            <input type="file" id="ssEin" name="ssEin" class="upload">
            <br>

            <label for="insurance" class="label">Upload Insurance:</label>
            <input type="file" id="insurance" name="insurance" class="upload">
            <br>

            <label for="registration" class="label">Upload Registration:</label>
            <input type="file" id="registration" name="registration" class="upload">
            <br>

            <label for="subcontract" class="label">Upload Sub Contractor Agreement:</label>
            <input type="file" id="subcontract" name="subcontract" class="upload">
            <br>

          <center><input type="submit" name="submit" class="btn brand z-depth-0" value="Submit"></center><br>
        </form>
    </body>

    <?php include('templates/footer.php'); ?>



</html>
