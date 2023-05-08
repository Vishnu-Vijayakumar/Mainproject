<?php 
include "connection.php";
session_start();

if (!isset($_SESSION['user_emailid'])) {
    header("Location: index.php");
}
$amt = $_GET['amount'];

$username=$_SESSION['user_emailid'];
$queryy = "SELECT * FROM tbl_registration Where `username`= '$username'";
$resultz= mysqli_query($conn, $queryy);
while ($rowa = $resultz->fetch_assoc()) {
 $uid = $rowa['id'];

}
$sq = "SELECT * from tbl_registration INNER JOIN donation ON users.id=donation.names Where users.id='$uid' ORDER BY donation.date DESC LIMIT 1;";
$resul = $conn->query($sq);
$row = $resul->fetch_assoc();
$date_str = $row['date'];
$date_arr = explode('-', $date_str);
$day = $date_arr[2];
$month = date('F', mktime(0, 0, 0, $date_arr[1], 10));
$year = $date_arr[0];

$date_formatted = $day . ' - ' . $month . '-' . $year;

?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- fontawesome link here -->
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    
    <!-- style link here -->
    <link rel="stylesheet" href="../styless.css">
    
</head>
<body>
<header class="header">
    <div class="logo" style ="color: #fff;font-size: 35px;font-weight: 600;">
    bon appetit
    </div>

    <nav class="navbar">
        
        <a href="../ind.php" style="font-size:16px;">Home</a>
        
        <a href="../rec.php" style="font-size:16px;">Recipes</a>
        <a href="../rec/fav.php" style="font-size:16px;">Favourites</a>
        <a href="inde.php" style="font-size:16px;">Donation</a>
        </nav>
       

  
   
</header>
<br><br><br><br>
<div class="col-md-12 text-right mb-3">
                <button class="btn btn-primary" id="download"> download pdf</button>
            </div>
<br><br><br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3" id="invoice"> 
            <div class="row">
                
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>BA Foundation</strong>
                        <br>
                        bafoundation@gmail.com
                        <br>
                        Delhi
                        <br>
                        +91 9845673498
                    </address>
                </div>
               <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        Date: <?php echo $date_formatted;?>
                    </p>
                   <!-- <p>
                        <em>Receipt #: 34522677W</em>
                    </p>-->
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                <tbody>
                       
                       <tr>
                            <td class="col-md-9">Name</h4></td>
                            <td class="col-md-1" style="text-align: left"> <?php echo $row['name']; ?> </td>
                            
                        </tr>
                        <tr>
                            <td class="col-md-9">Email</h4></td>
                            <td class="col-md-1" style="text-align: left"> <?php echo $row['email']; ?> </td>
                            
                        </tr>
                        <tr>
                            <td class="col-md-9">Phone No</h4></td>
                            <td class="col-md-1" style="text-align: left"> <?php echo $row['phone']; ?> </td>
                        
                        </tr>
                        <tr>
                            <td class="col-md-9">Amount</h4></td>
                            <td class="col-md-1" style="text-align: left"> Rs.<?php echo $row['amount']; ?> </td>
                        
                        </tr>
                        
                    </tbody>
                </table>
                
                
                
            </div>
        </div>
    </div>
    <script>
window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'receipt.pdf',
                image: { type: 'jpeg', quality: 0.99 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'a3', orientation: 'p' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
</script>