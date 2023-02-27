<?php
  include('header.php');
  if($_SERVER["REQUEST_METHOD"]=="POST"){
  session_start();

  }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>cart</title>
		<style>
			#mycart_div{
				display: flex;
			}

			#mycart-table{
				flex: 3;
			}
			
			#mycart-total{
				flex: 1;
				margin-left: 30px;
			}

			#prod_name{
				overflow: hidden;
				width:90%;
				display: -webkit-box;
				-webkit-line-clamp: 1;
				-webkit-box-orient: vertical;
			}
			.form-check-label{
				margin-left: -25px;
				font-family: monospace;
				font-size: 20px;
			}
			.btnbtn-smbtn-outline-danger{

			}
			

		</style>
	</head>

	<body>

		<div class="text-center border rounded bg-light my-5 m-5">
			<h1>MY CART</h1>
		</div>

		<div id="mycart_div" class="m-5">
			<table class="table" id="mycart-table">
				<thead class="text-center">
					<tr>
						<th scope="col">Sr.No.</th>
						<th scope="col">ProductName</th>
						<th scope="col">Price</th>
						<th scope="col">Quantity</th>
						<th scope="col">Action</th>
					</tr>
				</thead>

				<tbody class="text-center">
					<?php
						$total=0;
						$sr=0;
						include 'connection.php';
						$login_id= $_SESSION['login_id'];
						$mycart_record_res= mysqli_query($conn,"SELECT * from tbl_cart WHERE login_id=$login_id");
						if(mysqli_num_rows($mycart_record_res) > 0)
						{
							
							foreach($mycart_record_res as $row){
								$sr++;
								$pid= $row['product_id'];
								$prod_sql= mysqli_query($conn,"SELECT * from tbl_bookinfo WHERE product_id=$pid");
								if(mysqli_num_rows($prod_sql) == 1){
									$pred_details_res= mysqli_fetch_array($prod_sql);
									$total=$total+$pred_details_res['prod_price'];
								
									echo"
										<tr>
											<td>$sr</td>
											<td><p id='prod_name'>".$pred_details_res["prod_name"]."</p></td>
											<td>".$pred_details_res["prod_price"]."</td>
											<td><input class='text-center' type='number' value='".$row["quantity"]."' min='1' max='10'></td>
											<td>
												<form action='manage_cart.php' method='POST'>
													<input type='text' name='pname' value=".$row["product_id"]." hidden>
													<button name='Remove_Item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
												</form>
												<form action='manage_cart.php' method='POST'>
													<input type='text' name='pname' value=".$row["product_id"]." hidden>
													<button name='Remove_Item' class='btn btn-sm btn-outline-danger' onclick=''>Update</button>
												</form>
											</td>
										</tr>
									";
								}
								else{

								}
							}
						}
					?>
					
				</tbody>

			</table>

			<div class="col-lg-4" id="mycart-total">
				<div class="border bg-light rounded p-4">
					<h3>Total:</h3>
					<h5 class="text-right"><?php echo $total?></h5>
					<br>
					<form>
						<div class="form-check">
							<!-- <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"> -->
							<label class="form-check-label" for="flexRadioDefault1">Make Purchase</label>
							
						</div>
						<br>
						<button class="btn btn-primary btn-block">Cash On Delivery</button>
						<br><br>
						<button class="btn btn-primary btn-block">Online Payment</button>
					</form>
				</div>
			</div>
		</div>
		
	</body>
</html>