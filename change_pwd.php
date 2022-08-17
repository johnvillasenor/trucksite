
<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>
    <?php
        if(!isset($_SESSION["username"])){
            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
            else{
                header("Location: index.php");
                exit();
            }
        }
    ?>
        <title>Registration Form</title>
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

    <body>
        <div class="register-form">
			<h1>Change Password</h1>
			<form action="config/change_pwd-run.php" method="POST">
				<input type="password" name="oldpassword" placeholder="Old Password" required>
				<input type="password" name="newpassword" placeholder="New Password" required>
				<input type="password" name="newpasswordconfirm" placeholder="Confirm New Password" required>
                <?php
                    echo "<input type='hidden' name='username' value='{$_SESSION['username']}' >";
                    echo "<input type='hidden' name='account' value='{$_SESSION['account']}' >";
                ?>
				<input type="submit" name="submit">
			</form>
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "wrongOldPwd"){
                        echo "<p class='error'>Old password is incorrect<p>";
                    }
                    if($_GET["error"] == "pwdMatch"){
                        echo "<p class='error'>New passwords do not match<p>";
                    }
                    else if($_GET["error"] == "stmtFailed"){
                        echo "<p class='error'>Something went wrong, try again<p>";
                    }
                    else if($_GET["error"] == "shortPassword"){
                        echo "<p class='error'>New password must be at least 8 characters<p>";
                    }
                    else if($_GET["error"] == "noUpper"){
                        echo "<p class='error'>New password must contain uppercase character<p>";
                    }
                    else if($_GET["error"] == "noLower"){
                        echo "<p class='error'>New password must contain lowercase character<p>";
                    }
                    else if($_GET["error"] == "noDigit"){
                        echo "<p class='error'>New password must contain a number<p>";
                    }
                    else if($_GET["error"] == "noSpecChar"){
                        echo "<p class='error'>New password must contain one special character<p>";
                    }
                    else if($_GET["error"] == "none"){
                        echo "<p class='success'>Password has been changed!<p>";
                    }
                }
            ?>
            <p>New password must contain:</p>
            <ol>
                <li>At least 8 characters</li>
                <li>At least one uppercase letter</li>
                <li>At least one lowercase letter</li>
                <li>At least one number</li>
                <li>At least one special character</li>
            </ol>
		</div>
	</body>

    <?php include('templates/footer.php'); ?>\
  
</html>