<!-- registration form-->
<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>
        <title>Registration Form</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
            <style>
            .register-form {
                width: 300px;
                margin: 0 auto;
                font-family: Tahoma, Geneva, sans-serif;
            }
            .register-form h1 {
                text-align: center;
                color: #4d4d4d;
                font-size: 24px;
                padding: 20px 0 20px 0;
            }
            .register-form input[type="password"],
            .register-form input[type="confirm password"],
            .register-form input[type="text"] {
                width: 100%;
                padding: 15px;
                border: 1px solid #dddddd;
                margin-bottom: 15px;
                box-sizing:border-box;
            }
        
            .register-form input[type="submit"] {
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
            .success {
                color: green;
            }
            </style>
<!-- form entries-->	
    <body>
        <div class="register-form">
			<h1>Registration Form</h1>
			<form action="config/register-run.php" method="POST">
				<input type="text" name="username" placeholder="Username" required>
				<input type="password" name="password" placeholder="Password" required>
				<input type="password" name="passwordconfirm" placeholder="Confirm Password" required>
				<input type="submit" name="submit">
			</form>
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "pwdMatch"){
                        echo "<p class='error'>Passwords do not match<p>";
                    }
                    else if($_GET["error"] == "stmtFailed"){
                        echo "<p class='error'>Something went wrong, try again<p>";
                    }
                    else if($_GET["error"] == "nameTaken"){
                        echo "<p class='error'>Choose another username<p>";
                    }
                    else if($_GET["error"] == "shortPassword"){
                        echo "<p class='error'>Password must be at least 8 characters<p>";
                    }
                    else if($_GET["error"] == "noUpper"){
                        echo "<p class='error'>Password must contain uppercase character<p>";
                    }
                    else if($_GET["error"] == "noLower"){
                        echo "<p class='error'>Password must contain lowercase character<p>";
                    }
                    else if($_GET["error"] == "noDigit"){
                        echo "<p class='error'>Password must contain a number<p>";
                    }
                    else if($_GET["error"] == "noSpecChar"){
                        echo "<p class='error'>Password must contain one special character<p>";
                    }
                    else if($_GET["error"] == "none"){
                        echo "<p class='success'>Account has be created!<p>";
                    }
                }
            ?>
		<!-- password constraints-->
            <p>Password must contain:</p>
            <ol>
                <li>At least 8 characters</li>
                <li>At least one uppercase letter</li>
                <li>At least one lowercase letter</li>
                <li>At least one number</li>
                <li>At least one special character</li>
            </ol>
		</div>
	</body>

    <?php include('templates/footer.php'); ?>
  
</html>
