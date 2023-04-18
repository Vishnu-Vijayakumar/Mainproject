<?php
        include 'connection.php';
        if (isset($_POST['submit'])) {
         
          $pdf=$_FILES['pdf']['name'];
          $articlename=$_POST['pname'];
          $author=$_POST['pauthor'];
          $pdf_type=$_FILES['pdf']['type'];
          $pdf_size=$_FILES['pdf']['size'];
          $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
          $pdf_store="pdf/".$pdf;
          move_uploaded_file($pdf_tem_loc,$pdf_store);
          $sql="INSERT INTO tbl_articlepdf(`article_name`,`article_author`,`pdf`) values('$articlename','$author','$pdf')";
          $query=mysqli_query($con,$sql);
        }

        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form class="form" action="insert.php" method="post" enctype="multipart/form-data">
            <div class="form__group">
                <h2 class="form__title">Upload Article</h2>
                <label for="pName" class="form__label">Article Name:</label>
                <input type="text" name="pname" id="pName" autofocus="false" autocomplete="off" class="form__input" placeholder="Enter Article Name" required>
            </div>

            <div class="form__group">
                <label for="pOffer" class="form__label">Article Author:</label>
                <input type="text" name="pauthor" id="pOffer" autofocus="false" autocomplete="off" class="form__input" placeholder="Enter Article Author" required>
            </div>

            <div class="form__group">
                <label for="pdf" class="form__label">Choose Your File</label>
                <input id="pdf" type="file" name="pdf" class="form__input--file" value="" required>
            </div>

            <div class="form__group">
                <input id="upload" type="submit" name="submit" value="Upload" class="btn">
            </div>

            <script>
                function addpdf() {
                    alert("Pdf uploaded Successfully!!");
                }
            </script>
        </form>
    </div>
</body>
</html>
