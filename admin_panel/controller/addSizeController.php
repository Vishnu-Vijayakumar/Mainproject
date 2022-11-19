<?php
   
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "bookstore";

    $conn = mysqli_connect($server,$user,$password,$db);

    if(!$conn) {
      die("Connection Failed:".mysqli_connect_error());
    }

    
    if(isset($_POST['book_lang_upload']))
    {
       
        $language = $_POST['book_lang'];      
        $insert = mysqli_query($conn,"INSERT INTO tbl_language VALUES (null,'$language')");
 
        if(!$insert){
            echo mysqli_error($conn);
            header("Location: ../index.php?size=error");
        }
        else{
            echo "<script>alert('Records added successfully.');</script>";
            // header("Location: ../index.php?size=success");
            header("Location: ../index.php#sizes");
        }
    }
        
?>