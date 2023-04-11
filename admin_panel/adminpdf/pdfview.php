<html>
  <body>
  <section class="">
    <nav>
  <div class="profile-details">
        <!-- <img src="images/profile.jpg" alt=""> -->
        
        <i class='bx bx-chevron-down' ></i>
      </div>
    <h4>UPDATED PDF<h4>
<table style="width:100%"cellpadding="10" cellspacing="4" border="3" align="center">          
              <tr>
                  <th>No</th>
                  <th>Book Author</th>
                  <th>Book Name</th>
                  <!-- <th>Title</th> -->
                  <th>Download</th>
              </tr>  
              
              
              <?php
              include 'connection.php';
              $query=mysqli_query($con,"select * from pdf_file");             
$cnt=1;
while($row=mysqli_fetch_array($query))
{
 
?>                                  
              <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <!-- < <td><?php echo htmlentities($row['Title']);?></td> -->
                  <td><?php echo htmlentities($row['book_author']);?></td>
                  <td><?php echo htmlentities($row['book_name']);?></td>
                  <!-- <td><?php echo htmlentities($row['pdf']);?></td> -->
                  <td><a href="..\admin_panel\adminpdf\display_pdf.php?id=<?php echo $row['id']?>">View</a></td>
              </tr>
              <?php $cnt=$cnt+1; } ?>    
      </table>
      
        <a href="..\admin_panel\adminpdf\insert.php"><button type="submit"  class="btn btn-primary" >You can upload here!</button>
      

      


      
    </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  

</body>
</html>
