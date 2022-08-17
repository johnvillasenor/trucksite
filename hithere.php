<?php
// include Formr
require_once 'Formr/class.formr.php';

// create our form object and use Bulma as our form wrapper
$form = new Formr\Formr('bootstrap');

// make all fields required
$form->required = '*';

// check if the form has been submitted
if ($form->submitted())
{
    // get our form values and assign them to a variable
    $data = $form->validate('Name, Email, Comments');

    // show a success message if no errors
    if($form->ok()) {
        $form->success_message = "Thank you, {$data['name']}!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('templates/header.php'); ?>
  <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <style>
  .our-form {
    width: 30%;
    margin: 0 auto;
    font-family: Tahoma, Geneva, sans-serif;
    margin-top: 5%;
  }
  </style>
</head>

<body class="container">
  <div class="our-form">
    <?php $form->messages(); ?>
    <?php $form->create_form('Name, Email, Comments|textarea'); ?>
  </div>
</body>
<?php include('templates/footer.php'); ?>
</html>
