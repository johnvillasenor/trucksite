<?php
	include_once 'config/db_connect.php';
?>
<!-- login forms-->
<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>
        <title>Login Form</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<style>
		.login-form {
			width: 300px;
			margin: 0 auto;
			font-family: Tahoma, Geneva, sans-serif;
		}
		.login-form h1 {
			text-align: center;
			color: #4d4d4d;
			font-size: 24px;
			padding: 20px 0 20px 0;
		}
		.login-form input[type="password"],
		.login-form input[type="text"] {
			width: 100%;
			padding: 15px;
			border: 1px solid #dddddd;
			margin-bottom: 15px;
			box-sizing:border-box;
		}
		.login-form input[type="submit"] {
			width: 100%;
			padding: 15px;
			background-color: #535b63;
			border: 0;
			box-sizing: border-box;
			cursor: pointer;
			font-weight: bold;
			color: #ffffff;
		}
		.error {
            color: red;
		}
		</style>
	<!-- form entries-->
    <body>
        <div class="login-form">
                <h1>Login Form</h1>
                <form action="config/login-run.php" method="POST">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" name="submit">
                </form>
				<?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "wronglogin"){
                        echo "<p class='error'>Incorrect username or password<p>";
                    }
					else if($_GET["error"] == "didntwork"){
                        echo "<p class='error'>hey this didn't work!<p>";
                    }
                }
            ?>
            </div>
    </body>

    <?php include('templates/footer.php'); ?>
	
</html>
