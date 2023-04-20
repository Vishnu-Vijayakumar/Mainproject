<!DOCTYPE html>
<html>
<head>
  
<title><b><center>Payment and Order Details</center></b></title>

<div class="col-md-12 text-right mb-3">
                <button class="btn btn-primary" id="download"> download pdf</button>
            </div>

	<style>
		body {
			font-family: Arial, sans-serif;
		}
		table {
			border-collapse: collapse;
			width: 100%;
			margin-top: 20px;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border: 1px solid #ddd;
		}
		th {
			background-color: #f2f2f2;
			color: #333;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
		h1 {
			margin-top: 0;
			text-align: center;
			font-size: 32px;
			color: #333;
		}
		.container {
			max-width: 1200px;
			margin: 0 auto;
			padding: 20px;
		}
	</style>
</head>
<body>



	<div class="container" id="invoice">
		<h1>Payment and Order Details</h1>
	<?php
		// Connect to the MySQL database
		include 'connection.php';

		// Retrieve data from the MySQL tables
		$sql = "SELECT * FROM payments INNER JOIN orders ON payments.order_id = orders.order_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Payment ID</th><th>Name</th><th>Amount</th><th>Payment Status</th><th>Payment ID</th><th>Ad ID</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["pay_id"] . "</td>";
            echo "<td>" . $row["pay_name"] . "</td>";
            echo "<td>" . $row["amount"] . "</td>";
            echo "<td>" . $row["payment_status"] . "</td>";
            echo "<td>" . $row["payment_id"] . "</td>";
            echo "<td>" . $row["ad_id"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        echo "<table>";
        echo "<tr><th>Order ID</th><th>Name</th><th>Phone</th><th>Country</th><th>Address</th><th>City</th><th>State</th><th>Pincode</th><th>Email</th><th>Message</th><th>Order Date</th></tr>";
        mysqli_data_seek($result, 0); // reset pointer to beginning of result set
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["order_id"] . "</td>";
            echo "<td>" . $row["order_name"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["country"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["city"] . "</td>";
            echo "<td>" . $row["state"] . "</td>";
            echo "<td>" . $row["pincode"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["message"] . "</td>";
            echo "<td>" . $row["order_date"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found";
    }

		// Close the database connection
		$conn->close();





    
	?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  
window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'report.pdf',
                image: { type: 'jpeg', quality: 0.99 },
                html2canvas: { scale: 3 },
                jsPDF: { unit: 'in', format: 'a3', orientation: 'l' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
</script>
  
</body>
</html>
