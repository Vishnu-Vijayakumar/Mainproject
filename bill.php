<?php
session_start();
$pay_id=$_SESSION['pay_id'];
echo "pay_id: ".$pay_id;
if(isset($_SESSION['user_emailid'])){
	$email=$_SESSION['user_emailid'];
	//$pid=$_SESSION['pid'];
	//$pname=$_SESSION['name'];
	//$rid=$_SESSION['rid'];	

	$conn=mysqli_connect("localhost","root","","bookstore")or die ("Couldn't connect");

	if(strlen($_SESSION['user_emailid'])==0){
	   header('location:index.php');
	   exit();
	}

	$date=date("Y-m-d");
	$disp="SELECT  * FROM tbl_order";
	$disp_result=mysqli_query($conn,$disp);

	if (isset($pay_id)) {
		$login=$_SESSION['user_emailid'];
		$disp="SELECT *FROM tbl_order JOIN tbl_payment ON tbl_order.pay_id=tbl_payment.pay_id WHERE tbl_payment.payment_id='$pay_id'";
		$disp_result=mysqli_query($conn,$disp);
	}
}
else
{
	// header('Location:login.php');
}

?>

<!-- HTML code here -->

<?php
// mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <style>
    button {
      background-color:#fff;
      border:none;
      cursor:pointer;
    }

    button:hover {
      background-color:#fff;
      border:none;
      cursor:pointer;
      color:green;
    }

    #pdfdiv {
      color:green;
    }
  </style>

  <script type="text/javascript" src="jspdf.min.js"></script>
  <script type="text/javascript" src="jquery-git.js"></script>
  
  <title>Order Summary</title>

  <script type='text/javascript'>
    $(window).on('load', function() {
      var doc = new jsPDF();
      var specialElementHandlers = {
          '#editor': function (element, renderer) {
              return true;
          }
      };

      $('#pdfview').click(function () {
          doc.fromHTML($('#pdfdiv').html(), 15, 15, {
              'width': 700,
                  'elementHandlers': specialElementHandlers
          });
          doc.save('file.pdf');
      });
    });
  </script>
</head>

<body>
  <div id="pdfdiv">
   <center>
    <table style="width:40%;border:solid black">
<?php
$book_total_price = 0;

// Make sure $disp_result is defined and has a valid value
if(isset($disp_result)) {
    while($array=mysqli_fetch_array($disp_result)) {
?>
    <tr>
    <th>Customer Name:</th>
    <td><?php echo $array['name'] ?></td>
</tr>
<tr>
    <th>Customer mail id:</th>
    <td><?php echo $array['email']; ?></td>
</tr>
<!-- <tr><th>Product Name:</th><td><?php echo $array['book_name']; ?></td></tr>
<tr><th>Ordered Quantity:</th><td><?php echo $array['purchase_qty'] ?></td></tr> -->
<tr>
    <th>Payid</th>
    <td><?php echo $pay_id; ?></td>
</tr>
<tr>
    <th>Ordered date:</th>
    <td><?php echo $array['order_date'] ?></td>
</tr>
<tr>
    <th>Shipping Address:</th>
    <td><?php echo $array['address'] ?></td>
</tr>
<tr>
    <th>Pincode:</th>
    <td><?php echo $array['pincode'] ?></td>
</tr>
<tr>
    <th>Total Amount:</th>
    <td>₹<?php echo $array['amount']; ?></td>
</tr>
<tr>
    <td rowspan="1" colspan="2">&nbsp;</br></td>
</tr>

<?php
    }
}
?>
</table> 
    </center>
  </div>

  <div id="editor"></div>
  <center>
    <button id="pdfview">Download PDF</button>
  </center>
</body>
</html>

<?php
// }
// else
{
	// header('Location:login.php');
}
?>
