<?php
    session_start();
    include_once "connection.php";
    if(isset($_POST["admin_name"]) && isset($_POST["admin_password"])) {
        $name = $_POST["admin_name"];
        $password = $_POST["admin_password"];

        $sql = "SELECT * FROM tbl_adminlogin WHERE admin_name='$name' AND admin_password='$password' AND isAdmin=1";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            $_SESSION["admin_name"] = $name;
            header("location: admin.php");
        } else {
            echo "Invalid login credentials";
        }
    }
?>
