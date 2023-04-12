<html>
  <body>
  <section class="">
    <nav>
  <div class="profile-details">
        <!-- <img src="images/profile.jpg" alt=""> -->
        
        <i class='bx bx-chevron-down' ></i>
      </div>
    <h4>Articles<h4>
<table style="width:100%"cellpadding="10" cellspacing="4" border="3" align="center">          
              <tr>
                  <th>No</th>
                  <th>Article Author</th>
                  <th>Article Name</th>
                  <!-- <th>Title</th> -->
                  <th>Download</th>
              </tr>  
              
              
              <?php
              include 'connection.php';
              $query=mysqli_query($con,"select * from tbl_articlepdf");             
$cnt=1;
while($row=mysqli_fetch_array($query))
{
 
?>                                  
              <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <!-- < <td><?php echo htmlentities($row['Title']);?></td> -->
                  <td><?php echo htmlentities($row['article_author']);?></td>
                  <td><?php echo htmlentities($row['article_name']);?></td>
                  <!-- <td><?php echo htmlentities($row['pdf']);?></td> -->
                  <td><a href="..\admin_panel\articlepdf\display_pdf.php?id=<?php echo $row['id']?>">View</a></td>
              </tr>
              <?php $cnt=$cnt+1; } ?>    
      </table>
      
        <a href="..\admin_panel\articlepdf\insert.php"><button type="submit"  class="btn btn-primary" >You can upload here!</button>
      

      


      
    </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  

</body>
</html>
