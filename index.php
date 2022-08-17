<?php

?>
<!--home page of website -->
<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>Trucking Website</title>

    </head>

    <body>
    <style>
      .header-bar{
          color: #FFFFFF;
          width: 100%;
            font-family: calibri;
            border: 10px grey;
            font-size: 75px;
            text-align: center;
            background: #7399D5;
            min-height:90px;
            height:auto;

        }

        .column {
          float: left;
          width: 33.33%;
          padding: 5px;
          image-rendering: auto;
          image-rendering: crisp-edges;
          image-rendering: smooth;
        }

        .row::after {
          content: "";
          clear: both;
          display: table;
        }

        .cont {
          width: 100%;
          margin: auto;
          overflow: hidden;
        }

        .main {
          background-color: #fff;
          float: left;
          width: 70%;
          padding: 30px;
          box-sizing: border-box;
        }

        .sidebar {
          float: right;
          width: 30%;
          background: #333;
          color: #fff;
          padding: 10px;
          box-sizing: border-box;
        }

    </style>

    <body>
          <div class="header-bar">
            <br>
              ★ Roadstar
          </div>

    <section id="cont">
      <h1>Dallas Best Truck Transportation Company.</h1>
    </section>

    <div class="row">
      <div class="column">
        <img src="img/dallas.jpg" alt="Dallas" style="width:100%; height:300px; object-fit:cover;"/>
      </div>
      <div class="column">
        <img src="img/dirttruck.png" alt="Dirttruck" style="width:100%; height:300px; object-fit:cover;"/>
      </div>
      <div class="column">
        <img src="img/truckwithdirt.jpg" alt="Truckwithdirt" style="width:100%; height:300px; object-fit:cover;"/>
      </div>
    </div>




    <div class="cont">
      <section id="main">
        <h1>Updates</h1>
        <p>Updates will be displayed here.</p>
      </section>

      <aside id="sidebar">
        <h1>Welcome</h1>
        <p>welcome text will be display here.</p>
      </aside>
    </div>
    </body>

    <?php include('templates/footer.php'); ?>


</html>
