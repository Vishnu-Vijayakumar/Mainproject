<?php
    include('connection.php');
    session_start();

    if(isset($_POST['text'])){
        $text= $_POST['text'];
        $query = "SELECT * FROM tbl_bookinfo WHERE book_name LIKE '%$text%' OR book_price LIKE '%$text%' OR book_language LIKE '%$text%' OR book_author LIKE '%$text%' OR category_name LIKE '%$text%'";
        $result = mysqli_query($conn,$query);

        if($result){
            while($q = mysqli_fetch_array($result)){
              
  $book_id=$q['book_id'];
  $book_category_id=$q['book_category_id'];
  $book_name=$q['book_name'];
  $book_num=$q['book_num'];
  $book_img=$q['book_img'];
  $book_des=$q['book_des'];
  $book_stock=$q['book_stock'];
  $book_price=$q['book_price'];
  $book_language=$q['book_language'];
  $book_year=$q['book_year'];
  $book_author=$q['book_author'];
  $seller_id=$q['seller_id'];
  $category_name=$q['category_name'];
//   $new_file_path = '../uploaded_images/'.$file_name;


              echo '
                <div class="serch_result_row">
                    <a href="./shop-details.php?id='.$book_id.'" target="_blank">
                        <div class="db_img"><img src="'.$book_img.'" alt="'.$book_name.'"></div>
                        <div class="db_pname">'.$book_name.'</div>
                    </a>
                </div>
                ';
            }
          }
    }
?>
