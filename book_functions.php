<?php
    
    session_start();
    $server = "localhost";
      $user = "root";
      $password = "";
      $db = "bookstore";

      $conn = mysqli_connect($server,$user,$password,$db);

      if(!$conn) {
        die("Connection Failed:".mysqli_connect_error());
      }
    $errors = array();

    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $pass= md5($password);
        $check_email = "SELECT * FROM tbl_login WHERE email = '$email' AND password='$pass'";
        $res = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($res) > 0){
            $login_details= mysqli_fetch_array($res);
            $user_details_sql= mysqli_query($conn,"SELECT * from tbl_registration where email='$email'");
            if(mysqli_num_rows($user_details_sql) > 0){
                $user_details_res= mysqli_fetch_array($user_details_sql);
                $_SESSION['user_loginid']=$login_details['login_id'];
                $_SESSION['user_emailid']=$user_details_res['email'];
                $_SESSION['user_username']=$user_details_res['username'];
                echo "<script>alert('Success !!!');</script>";
                header('location:index.php');
            }
        }else{
            // $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
            $errors['email']= "Invalid Username or password !!";
        }
    }

    if(isset($_POST['signup'])){
        $FirstName = $_POST['first_name'];
        $LastName = $_POST['last_name'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $dob = $_POST['date'];
        $Adress = $_POST['address'];
        $Pin = $_POST['Pin'];
        $gender= $_POST['gender'];
        $Phone = $_POST['phone'];
        $State = $_POST['State'];
    
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }
        $email_check = "SELECT * FROM tbl_login WHERE email = '$email'";
        $res = mysqli_query($conn, $email_check);
        if(mysqli_num_rows($res) > 0){
            $errors['email'] = "Email that you have entered is already exist!";
        }
        if(count($errors) === 0){
            $encpass= md5($password);
            // $encpass = password_hash($password, PASSWORD_BCRYPT);
            $insert_data = "INSERT INTO tbl_registration values('$email', '$FirstName', '$LastName','$name','$dob','$gender','$Adress', '$State',
            '$Phone',$Pin)";
            $data_check = mysqli_query($conn, $insert_data);
            if($data_check){
                // $login_insert= "INSERT INTO tbl_login ('login_id','email','password') VALUES (null,'$email','$encpass')";
                $login_insert= "INSERT INTO `tbl_login`(`login_id`, `email`, `password`) VALUES (null,'$email','$encpass')";
                $login_res= mysqli_query($conn,$login_insert);
                if($login_insert){
                    $log_details= mysqli_fetch_array($login_res);
                    $_SESSION['user_loginid']=$log_details['login_id'];
                    $_SESSION['user_emailid']=$email;
                    $_SESSION['user_username']=$name;
                    echo "<script>alert('Success !!!');</script>";
                    header('location:index.php');
                }
                else{
                    echo "<script>alert('Registration Failed !!!');</script>";
                }
            }else{
                $errors['db-error']= "Unable to register !!";
                 $errors['db-error'] = "Failed while inserting data into database!";
            }
        }    
    }

?>