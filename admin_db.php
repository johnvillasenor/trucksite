
<?php
  include('config/db_connect.php');

  //write query for all trucks
  $sql = 'SELECT * FROM contractors ORDER BY date_created';

  // get results of query
  $result = mysqli_query($conn, $sql);

  //fetch rows (records) as array
  $contractors = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);

  //write query for all trucks
  $sql = 'SELECT * FROM customers ORDER BY id';

  // get results of query
  $result = mysqli_query($conn, $sql);

  //fetch rows (records) as array
  $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);

  //write query for all trucks
  $sql = 'SELECT * FROM users ORDER BY id';

  // get results of query
  $result = mysqli_query($conn, $sql);

  //fetch rows (records) as array
  $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);

  //write query for all trucks
  $sql = 'SELECT * FROM employees ORDER BY id';

  // get results of query
  $result = mysqli_query($conn, $sql);

  //fetch rows (records) as array
  $employees = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>

        <title>Testing Page</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
	<style>
		.card-content {
		    text-align: left !important;
		}
        </style>
    </head>
    <body>
        <h4 class="center grey-test"> Customer Accounts </h4>
        <div class="container">
            <div class="row">
                <?php foreach($users as $user){ ?>

                <div class="col s6 md3">
                    <div class="card z-depth-9">
                        <div class="card-content">
                            <h5> <?php echo htmlspecialchars($user['user_uid']); ?> </h5>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <h4 class="center grey-test"> Contractor Accounts </h4>
        <div class="container">
            <div class="row">
                <?php foreach($employees as $employee){ ?>

                <div class="col s6 md3">
                    <div class="card z-depth-9">
                        <div class="card-content">
                            <h5> <?php echo htmlspecialchars($employee['emp_uid']); ?> </h5>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <h4 class="center grey-test"> Customer Applications </h4>
        <div class="container">
            <div class="row">
                <?php foreach($customers as $customer){ ?>

                <div class="col s6 md3">
                    <div class="card z-depth-9">
                        <div class="card-content">
                            <h5> <?php echo htmlspecialchars($customer['cname']); ?> <div id="name<?php echo $customer['id']; ?>" style="display:none;" class="register-form">
                                                                                            <form action="config/admin_db-run.php" method="POST">
                                                                                                <input type="text" name="val1" placeholder="New Name" required>
                                                                                                <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
                                                                                                <input type="hidden" name="field" value="name">
                                                                                                <input type="hidden" name="table" value="customer">
                                                                                                <input type="submit" name="submit">
                                                                                                <input style="float:right;" type="button" name="cancel" value="Cancel" onclick="CloseName(<?php echo $customer['id']; ?>)" />
                                                                                            </form>
		                                                                                </div>
                                                                                        <input style="float:right;" type="button" id="nameBut<?php echo $customer['id']; ?>" name="Edit" value="Edit" onclick="EditName(<?php echo $customer['id']; ?>)" /> </h5>
                            <h6> <?php echo htmlspecialchars($customer['address']); ?> <div id="add<?php echo $customer['id']; ?>" style="display:none;" class="register-form">
                                                                                            <form action="config/admin_db-run.php" method="POST">
                                                                                                <input type="text" name="val1" placeholder="New Address" required>
                                                                                                <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
                                                                                                <input type="hidden" name="field" value="address">
                                                                                                <input type="hidden" name="table" value="customer">
                                                                                                <input type="submit" name="submit">
                                                                                                <input style="float:right;" type="button" name="cancel" value="Cancel" onclick="CloseAdd(<?php echo $customer['id']; ?>)" />
                                                                                            </form>
		                                                                                </div>
                                                                                        <input style="float:right;" type="button" id="addBut<?php echo $customer['id']; ?>" name="Edit" value="Edit" onclick="EditAdd(<?php echo $customer['id']; ?>)" /> </h6>
                            <h6> <?php echo htmlspecialchars($customer['city']); ?>, <?php echo htmlspecialchars($customer['state']); ?>  <?php echo htmlspecialchars($customer['zip']); ?> <div id="csz<?php echo $customer['id']; ?>" style="display:none;" class="register-form">
                                                                                            <form action="config/admin_db-run.php" method="POST">
                                                                                                <input type="text" name="val1" placeholder="New City" required>
                                                                                                <input type="text" name="val2" placeholder="New State" required>
                                                                                                <input type="text" name="val3" placeholder="New Zip" required>
                                                                                                <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
                                                                                                <input type="hidden" name="field" value="csz">
                                                                                                <input type="hidden" name="table" value="customer">
                                                                                                <input type="submit" name="submit">
                                                                                                <input style="float:right;" type="button" name="cancel" value="Cancel" onclick="CloseCSZ(<?php echo $customer['id']; ?>)" />
                                                                                            </form>
		                                                                                </div>
                                                                                        <input style="float:right;" type="button" id="cszBut<?php echo $customer['id']; ?>" name="Edit" value="Edit" onclick="EditCSZ(<?php echo $customer['id']; ?>)" />  </h6>
                            <h6> <?php echo htmlspecialchars($customer['phone']); ?> <div id="phone<?php echo $customer['id']; ?>" style="display:none;" class="register-form">
                                                                                            <form action="config/admin_db-run.php" method="POST">
                                                                                                <input type="text" name="val1" placeholder="New Phone Number" required>
                                                                                                <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
                                                                                                <input type="hidden" name="field" value="phone">
                                                                                                <input type="hidden" name="table" value="customer">
                                                                                                <input type="submit" name="submit">
                                                                                                <input style="float:right;" type="button" name="cancel" value="Cancel" onclick="ClosePhone(<?php echo $customer['id']; ?>)" />
                                                                                            </form>
		                                                                                </div>
                                                                                        <input style="float:right;" type="button" id="phoneBut<?php echo $customer['id']; ?>" name="Edit" value="Edit" onclick="EditPhone(<?php echo $customer['id']; ?>)" /> </h6>
                            <h6> <?php echo htmlspecialchars($customer['email']); ?> <div id="email<?php echo $customer['id']; ?>" style="display:none;" class="register-form">
                                                                                            <form action="config/admin_db-run.php" method="POST">
                                                                                                <input type="text" name="val1" placeholder="New Email" required>
                                                                                                <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
                                                                                                <input type="hidden" name="field" value="email">
                                                                                                <input type="hidden" name="table" value="customer">
                                                                                                <input type="submit" name="submit">
                                                                                                <input style="float:right;" type="button" name="cancel" value="Cancel" onclick="CloseEmail(<?php echo $customer['id']; ?>)" />
                                                                                            </form>
		                                                                                </div>
                                                                                        <input style="float:right;" type="button" id="emailBut<?php echo $customer['id']; ?>" name="Edit" value="Edit" onclick="EditEmail(<?php echo $customer['id']; ?>)" /> </h6>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <h4 class="center grey-test"> Contractor Applications </h4>
        <div class="container">
            <div class="row">
                <?php foreach($contractors as $contractor){ ?>

                <div class="col s6 md3">
                    <div class="card z-depth-9">
                        <div class="card-content">
                            <h5> <?php echo htmlspecialchars($contractor['fname']); ?>  <?php echo htmlspecialchars($contractor['lname']); ?> <div id="conName<?php echo $contractor['id']; ?>" style="display:none;" class="register-form">
                                                                                            <form action="config/admin_db-run.php" method="POST">
                                                                                                <input type="text" name="val1" placeholder="New First Name" required>
                                                                                                <input type="text" name="val2" placeholder="New Last Name" required>
                                                                                                <input type="hidden" name="id" value="<?php echo $contractor['id']; ?>">
                                                                                                <input type="hidden" name="field" value="name">
                                                                                                <input type="hidden" name="table" value="contractor">
                                                                                                <input type="submit" name="submit">
                                                                                                <input style="float:right;" type="button" name="cancel" value="Cancel" onclick="CloseConName(<?php echo $contractor['id']; ?>)" />
                                                                                            </form>
		                                                                                </div>
                                                                                        <input style="float:right;" type="button" id="conNameBut<?php echo $contractor['id']; ?>" name="Edit" value="Edit" onclick="EditConName(<?php echo $contractor['id']; ?>)" /> </h5>
                            <h6> <?php echo htmlspecialchars($contractor['address']); ?> <div id="conAdd<?php echo $contractor['id']; ?>" style="display:none;" class="register-form">
                                                                                            <form action="config/admin_db-run.php" method="POST">
                                                                                                <input type="text" name="val1" placeholder="New Address" required>
                                                                                                <input type="hidden" name="id" value="<?php echo $contractor['id']; ?>">
                                                                                                <input type="hidden" name="field" value="address">
                                                                                                <input type="hidden" name="table" value="contractor">
                                                                                                <input type="submit" name="submit">
                                                                                                <input style="float:right;" type="button" name="cancel" value="Cancel" onclick="CloseConAdd(<?php echo $contractor['id']; ?>)" />
                                                                                            </form>
		                                                                                </div>
                                                                                        <input style="float:right;" type="button" id="conAddBut<?php echo $contractor['id']; ?>" name="Edit" value="Edit" onclick="EditConAdd(<?php echo $contractor['id']; ?>)" /> </h6>
                            <h6> <?php echo htmlspecialchars($contractor['city']); ?>, <?php echo htmlspecialchars($contractor['state']); ?>  <?php echo htmlspecialchars($contractor['zip']); ?> <div id="conCSZ<?php echo $contractor['id']; ?>" style="display:none;" class="register-form">
                                                                                            <form action="config/admin_db-run.php" method="POST">
                                                                                                <input type="text" name="val1" placeholder="New City" required>
                                                                                                <input type="text" name="val2" placeholder="New State" required>
                                                                                                <input type="text" name="val3" placeholder="New Zip" required>
                                                                                                <input type="hidden" name="id" value="<?php echo $contractor['id']; ?>">
                                                                                                <input type="hidden" name="field" value="csz">
                                                                                                <input type="hidden" name="table" value="contractor">
                                                                                                <input type="submit" name="submit">
                                                                                                <input style="float:right;" type="button" name="cancel" value="Cancel" onclick="CloseConCSZ(<?php echo $contractor['id']; ?>)" />
                                                                                            </form>
		                                                                                </div>
                                                                                        <input style="float:right;" type="button" id="conCSZBut<?php echo $contractor['id']; ?>" name="Edit" value="Edit" onclick="EditConCSZ(<?php echo $contractor['id']; ?>)" /> </h6>
                            <h6> <?php echo htmlspecialchars($contractor['phone']); ?> <div id="conPhone<?php echo $contractor['id']; ?>" style="display:none;" class="register-form">
                                                                                            <form action="config/admin_db-run.php" method="POST">
                                                                                                <input type="text" name="val1" placeholder="New Phone Number" required>
                                                                                                <input type="hidden" name="id" value="<?php echo $contractor['id']; ?>">
                                                                                                <input type="hidden" name="field" value="phone">
                                                                                                <input type="hidden" name="table" value="contractor">
                                                                                                <input type="submit" name="submit">
                                                                                                <input style="float:right;" type="button" name="cancel" value="Cancel" onclick="CloseConPhone(<?php echo $contractor['id']; ?>)" />
                                                                                            </form>
		                                                                                </div>
                                                                                        <input style="float:right;" type="button" id="conPhoneBut<?php echo $contractor['id']; ?>" name="Edit" value="Edit" onclick="EditConPhone(<?php echo $contractor['id']; ?>)" /> </h6>
                            <h6> <?php echo htmlspecialchars($contractor['email']); ?> <div id="conEmail<?php echo $contractor['id']; ?>" style="display:none;" class="register-form">
                                                                                            <form action="config/admin_db-run.php" method="POST">
                                                                                                <input type="text" name="val1" placeholder="New Email" required>
                                                                                                <input type="hidden" name="id" value="<?php echo $contractor['id']; ?>">
                                                                                                <input type="hidden" name="field" value="email">
                                                                                                <input type="hidden" name="table" value="contractor">
                                                                                                <input type="submit" name="submit">
                                                                                                <input style="float:right;" type="button" name="cancel" value="Cancel" onclick="CloseConEmail(<?php echo $contractor['id']; ?>)" />
                                                                                            </form>
		                                                                                </div>
                                                                                        <input style="float:right;" type="button" id="conEmailBut<?php echo $contractor['id']; ?>" name="Edit" value="Edit" onclick="EditConEmail(<?php echo $contractor['id']; ?>)" /> </h6>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </body>

    <script>
        function EditName(id) {
            document.getElementById('name'+id).style.display = "block";
            document.getElementById('nameBut'+id).style.display = "none";
        }  
        function CloseName(id) {
            document.getElementById('name'+id).style.display = "none";
            document.getElementById('nameBut'+id).style.display = "block";
        }  
        function EditAdd(id) {
            document.getElementById('add'+id).style.display = "block";
            document.getElementById('addBut'+id).style.display = "none";
        } 
        function CloseAdd(id) {
            document.getElementById('add'+id).style.display = "none";
            document.getElementById('addBut'+id).style.display = "block";
        }  
        function EditCSZ(id) {
            document.getElementById('csz'+id).style.display = "block";
            document.getElementById('cszBut'+id).style.display = "none";
        }
        function CloseCSZ(id) {
            document.getElementById('csz'+id).style.display = "none";
            document.getElementById('cszBut'+id).style.display = "block";
        }  
        function EditPhone(id) {
            document.getElementById('phone'+id).style.display = "block";
            document.getElementById('phoneBut'+id).style.display = "none";
        } 
        function ClosePhone(id) {
            document.getElementById('phone'+id).style.display = "none";
            document.getElementById('phoneBut'+id).style.display = "block";
        }  
        function EditEmail(id) {
            document.getElementById('email'+id).style.display = "block";
            document.getElementById('emailBut'+id).style.display = "none";
        } 
        function CloseEmail(id) {
            document.getElementById('email'+id).style.display = "none";
            document.getElementById('emailBut'+id).style.display = "block";
        }
        function EditConName(id) {
            document.getElementById('conName'+id).style.display = "block";
            document.getElementById('conNameBut'+id).style.display = "none";
        } 
        function CloseConName(id) {
            document.getElementById('conName'+id).style.display = "none";
            document.getElementById('conNameBut'+id).style.display = "block";
        }
        function EditConAdd(id) {
            document.getElementById('conAdd'+id).style.display = "block";
            document.getElementById('conAddBut'+id).style.display = "none";
        } 
        function CloseConAdd(id) {
            document.getElementById('conAdd'+id).style.display = "none";
            document.getElementById('conAddBut'+id).style.display = "block";
        }
        function EditConCSZ(id) {
            document.getElementById('conCSZ'+id).style.display = "block";
            document.getElementById('conCSZBut'+id).style.display = "none";
        } 
        function CloseConCSZ(id) {
            document.getElementById('conCSZ'+id).style.display = "none";
            document.getElementById('conCSZBut'+id).style.display = "block";
        }
        function EditConPhone(id) {
            document.getElementById('conPhone'+id).style.display = "block";
            document.getElementById('conPhoneBut'+id).style.display = "none";
        } 
        function CloseConPhone(id) {
            document.getElementById('conPhone'+id).style.display = "none";
            document.getElementById('conPhoneBut'+id).style.display = "block";
        }
        function EditConEmail(id) {
            document.getElementById('conEmail'+id).style.display = "block";
            document.getElementById('conEmailBut'+id).style.display = "none";
        } 
        function CloseConEmail(id) {
            document.getElementById('conEmail'+id).style.display = "none";
            document.getElementById('conEmailBut'+id).style.display = "block";
        }
    </script>

    <?php include('templates/footer.php'); ?>
</html>
