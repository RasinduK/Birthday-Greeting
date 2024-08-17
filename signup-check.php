<?php
session_start();
include "db_conn.php";

if (isset($_POST['name']) && isset($_POST['uname']) && isset($_POST['Email']) && isset($_POST['password']) && isset($_POST['re_password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $uname = validate($_POST['uname']);
    $Email = validate($_POST['Email']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);

    $user_data = 'name=' . $name . '&uname=' . $uname . '&Email=' . $Email;

    if (empty($name)) {
        header("Location: index.php?error=Name is required&$user_data");
        exit();
    } else if (empty($uname)) {
        header("Location: index.php?error=User Name is required&$user_data");
        exit();
    } else if (empty($Email)) {
        header("Location: index.php?error=Email is required&$user_data");
        exit();
    } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?error=Invalid email format&$user_data");
        exit();
    } else if (empty($pass)) {
        header("Location: index.php?error=Password is required&$user_data");
        exit();
    } else if (empty($re_pass)) {
        header("Location: index.php?error=Re Password is required&$user_data");
        exit();
    } else if ($pass !== $re_pass) {
        header("Location: index.php?error=The confirmation password does not match&$user_data");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_name='$uname'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: index.php?error=The username is taken try another&$user_data");
            exit();
        } else {
            $sql2 = "INSERT INTO users(name, user_name, Email, password) VALUES('$name', '$uname', '$Email', '$pass')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("Location: index.php?success=Your account has been created successfully");
                exit();
            } else {
                header("Location: index.php?error=Unknown error occurred&$user_data");
                exit();
            }
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
