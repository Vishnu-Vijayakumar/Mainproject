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
        $check_email = "SELECT * FROM tbl_sellerlogin WHERE email = '$email' AND password='$pass'";
        $res = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($res) > 0){
            $login_details= mysqli_fetch_array($res);
            $seller_details_sql= mysqli_query($conn,"SELECT * from tbl_sellerregistration where email='$email'");
            if(mysqli_num_rows($seller_details_sql) > 0){
                $seller_details_res= mysqli_fetch_array($seller_details_sql);
                $_SESSION['seller_loginid']=$login_details['login_id'];
                $_SESSION['seller_emailid']=$sller_details_res['email'];
                $_SESSION['seller_username']=$seller_details_res['username'];
                echo "<script>
                    alert('Loggin Successfully completed !!!');
                    window.location.href='../sellerindex.php';
                </script>";
                // header('location:../sellerindex.php');
                // echo "<script>alert('Success !!!');</script>";
                // header('location: ../sellerindex.php');
            // }
            // else{
            }
        }else{
            // $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
            $errors['email']= "Invalid Username or password !!";
            echo "<script>alert('Loggin not completed !!!');</script>";

        }
    }

    if(isset($_POST['Register'])){
        $FirstName = $_POST['first_name'];
        $LastName = $_POST['last_name'];
        $Username = $_POST['Username'];
        $email = $_POST['email'];
        $Password = $_POST['Password'];
        $cpassword = $_POST['Confirm_Password'];
        $Company= $_POST['company'];
        $Areacode= $_POST['area_code'];
        $phone= $_POST['phone'];
        $Sellerid= $_POST['file_cv'];
        // $Adress = $_POST['address'];
        // $Pin = $_POST['Pin'];
        // $gender= $_POST['gender'];
        // $Phone = $_POST['phone'];
        // $State = $_POST['State'];
        // $dob = $_POST['date'];
    
        if($Password != $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }
        $email_check = "SELECT * FROM tbl_sellerlogin WHERE email = '$email'";
        $res = mysqli_query($conn, $email_check);
        if(mysqli_num_rows($res) > 0){
            $errors['email'] = "Email that you have entered is already exist!";
            echo "<script>
                alert('Email that you have entered is already exist!');
                window.location.href='sellerregistration.php';
            </script>";
        }
        else if(count($errors) === 0){
            $encpass= md5($Password);
            // $encpass = password_hash($password, PASSWORD_BCRYPT);
            $insert_data = "INSERT INTO tbl_sellerregistration values('$email','$FirstName','$LastName','$Company',$Areacode,$phone,'$Sellerid','$Username' )";
            $data_check = mysqli_query($conn, $insert_data);
            if($data_check){
                // $login_insert= "INSERT INTO tbl_login ('login_id','email','password') VALUES (null,'$email','$encpass')";
                $login_insert= "INSERT INTO `tbl_sellerlogin`(`id`, `email`, `password`) VALUES (null,'$email','$encpass')";
                $login_res= mysqli_query($conn,$login_insert);
                if($login_insert){
                    $_SESSION['seller_loginid']= $conn->insert_id;
                    $_SESSION['seller_emailid']=$email;
                    $_SESSION['seller_username']=$name;
                    echo "<script>alert('Registered Successfully !!!');
                    window.location.href='../sellerindex.php';</script>";
                }
                else{
                    echo "<script>alert('Registration Failed !!!');</script>";
                }
            }else{
                $errors['db-error']= "Unable to register !!";
                 $errors['db-error'] = "Failed while inserting data into database!";
                 echo '<script>alert("Failed while inserting data into database!");</script>';
            }
        }
        else{
            echo '<script>alert("Failed - '.implode(",", $errors).'");</script>';
        }    
    }

?>
