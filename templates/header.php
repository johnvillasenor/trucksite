<?php
    session_start();
?>

<head>
    <title>Roadrunners</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css" href="css/style.css">
        .brand{
            background: #cbb09c !important;
        }
        .brand-text{
            color: #cbb09c !important;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<!-- Body -->
<body class="grey lighten-4">

  <nav>
      <div class="nav-wrapper">
        <ul class="right hide-on-med-and-down">
                <li><a href="index.php" >Home</a></li>
                <li><a href="aboutus.php" >About Us</a></li>
                <li><a href="applycustomer.php" >Customers</a></li>
                <li><a href="applycontractor.php" >Contractor</a></li>
                <?php
                    if(isset($_SESSION["username"])){
                        echo "<li><a href='profile.php' >Profile</a></li>";
                        if($_SESSION["account"] === "Admin"){
                            echo "<li><a href='admin_db.php' >View Data</a></li>";
                            echo "<li><a href='admin_create.php' >Create Account</a></li>";
                        }
                        echo "<li><a href='config/logout-run.php' >Log out</a></li>";
                    }
                    else{
                        echo "<li><a href='register.php' >Register</a></li>";
                        echo "<li><a href='login.php' >Login</a></li>";
                    }
                ?>
            </ul>
        </div>
    </nav>

      
