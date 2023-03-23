<?php 
include('connection.php');
 

// include('inc/header.php');  


// include('inc/nav.php'); 
session_start();
 

 
 



?>
 
 
 
 
<div class="container text-white">
    <h2 class='text-center text-white'>My Wishlist</h2>

    <section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
				 
					<div class="col-md-12">

		 
			<br>
			<table class="cart-table account-table table table-bordered bg-white text-dark">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Price</th>
						<th>Date and Time</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$loginid = $_SESSION['user_emailid']; 
  
				$sql = "SELECT * FROM tbl_wishlist JOIN tbl_bookinfo on tbl_bookinfo.book_id=tbl_wishlist.book_id";
				$result = mysqli_query($conn, $sql);
			  
				if (mysqli_num_rows($result) > 0) {
				 // output data of each row
				 while($row = mysqli_fetch_assoc($result)) {
 			?>
					<tr>
						<td>
                        <a href="shop-details.php?id=<?php echo $row["book_id"] ?>">	<?php echo $row["book_name"] ?></a>
						
						</td>
						<td>
						<?php echo $row["book_price"] ?>
						</td>
					 
						<td>
						

						<?php echo date('M j g:i A', strtotime($row["time"]));  ?>		
						</td>
						<td>
							<a href="delete-wishlist.php?pid=<?php echo $row["book_id"] ?>&login_id=<?php echo $_SESSION['user_emailid'] ?>">Delete</a> 
							 
						</td>
					</tr>
				 
			
			<?php
				}
			   } else {
				 echo "0 results";
			   }
			 
			 
			 ?>




				
				</tbody>
			</table>		

		 
 



			</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	
 
</div>







<!-- <?php include('inc/footer.php');  ?> -->


