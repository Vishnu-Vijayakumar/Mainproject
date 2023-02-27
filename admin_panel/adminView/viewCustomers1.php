<div >
  <h2>All Sellers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Username </th>
        <th class="text-center">company</th>
        <th class="text-center">email</th>
        <th class="text-center">phone number</th>
        <!-- <th class="text-center">State</th> -->
      </tr>
    </thead>
    <?php
      // include_once "../connection.php";
      $server = "localhost";
      $user = "root";
      $password = "";
      $db = "bookstore";

      $conn = mysqli_connect($server,$user,$password,$db);

      if(!$conn) {
        die("Connection Failed:".mysqli_connect_error());
      }
      $sql="SELECT * from tbl_sellerregistration";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["Username"]?></td>
      <td><?=$row["company"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["phone number"]?></td> 
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>