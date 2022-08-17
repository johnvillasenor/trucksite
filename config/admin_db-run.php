<?php
    if(isset($_POST['submit'])){
        $value1 = $_POST['val1'];
        $value2 = $_POST['val2'];
        $value3 = $_POST['val3'];
        $id = $_POST['id'];

        require_once 'db_connect.php';

        if($_POST['table'] === "customer"){
            if($_POST['field'] === "name"){
                $sql = "UPDATE customers SET cname = ? WHERE id = ?;";
            }
            else if($_POST['field'] === "address"){
                $sql = "UPDATE customers SET address = ? WHERE id = ?;";
            }
            else if($_POST['field'] === "csz"){
                $sql = "UPDATE customers SET city = ?, state = ?, zip = ? WHERE id = ?;";
            }
            else if($_POST['field'] === "phone"){
                $sql = "UPDATE customers SET phone = ? WHERE id = ?;";
            }
            else if($_POST['field'] === "email"){
                $sql = "UPDATE customers SET email = ? WHERE id = ?;";
            }
        }
        else if($_POST['table'] === "contractor"){
            if($_POST['field'] === "name"){
                $sql = "UPDATE contractors SET fname = ?, lname = ? WHERE id = ?;";
            }
            else if($_POST['field'] === "address"){
                $sql = "UPDATE contractors SET address = ? WHERE id = ?;";
            }
            else if($_POST['field'] === "csz"){
                $sql = "UPDATE contractors SET city = ?, state = ?, zip = ? WHERE id = ?;";
            }
            else if($_POST['field'] === "phone"){
                $sql = "UPDATE contractors SET phone = ? WHERE id = ?;";
            }
            else if($_POST['field'] === "email"){
                $sql = "UPDATE contractors SET email = ? WHERE id = ?;";
            }
        }

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../admin_db.php?register=stmtFailed");
            exit();
        }

        if($_POST['table'] === "customer"){
            if($_POST['field'] === "csz"){
                mysqli_stmt_bind_param($stmt, "ssss", $value1, $value2, $value3, $id);
            }
            else{
                mysqli_stmt_bind_param($stmt, "ss", $value1, $id);
            }
        }
        else if($_POST['table'] === "contractor"){
            if($_POST['field'] === "name"){
                mysqli_stmt_bind_param($stmt, "sss", $value1, $value2, $id);
            }
            else if($_POST['field'] === "csz"){
                mysqli_stmt_bind_param($stmt, "ssss", $value1, $value2, $value3, $id);
            }
            else{
                mysqli_stmt_bind_param($stmt, "ss", $value1, $id);
            }
        }

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Location: ../admin_db.php?error=none");
        exit();
    }
?>