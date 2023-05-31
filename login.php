<?php
session_start();
include "php/conn.php";

if (isset($_POST['uname']) && isset($_POST['pass'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['pass']);

    if (empty($uname)) {
        header("Location: masuk.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: masuk.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM admin WHERE username='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['id_admin'] = $row['id_admin'];
                header("Location: admin-dashboard.html");
                exit();
            } else {
                header("Location: masuk.php?error=Incorect User name or password");
                exit();
            }
        } else {
            header("Location: masuk.php?error=Incorect User name or password");
            exit();
        }
    }

} else {
    header("Location: masuk.php");
    exit();
}