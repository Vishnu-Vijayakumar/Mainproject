<?php session_start();
include ('connection.php');
$sql="select * from tbl_registration where username='".$_SESSION['user_username']."'";
$rs= mysqli_query($conn,$sql);
$r= $_SESSION['user_username'];
// $user=$_SESSION['user'];
// $name = $_POST['name'];

//  echo($r);
//  $idcc= $_POST['idb'];

 if($r!="")
 {

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Review & Rating 
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<a href="shop-details.php"></a>
    <div class="container">
    	<h1 class="mt-5 mb-5">Review & Rating </h1>
    	<div class="card">
    		<div class="card-header">Users</div>
    		<div class="card-body">
            <form action="feedbackaction.php" method="post">
    			<div class="row">
                <h3><input type="radio" name="star" value="5">
							<a href="#">
								<i class="fa fa-star" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star" aria-hidden="true" style="color:yellow;"></i>
								
							</a>&nbsp&nbsp&nbsp&nbsp
							<input  type="radio" name="star" value="4">
							<a href="#">
								<i class="fa fa-star" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star-o" aria-hidden="true" style="color:yellow;"></i>
								
							</a>&nbsp&nbsp&nbsp&nbsp
							<input  type="radio" name="star" value="3">
							<a href="#">
								<i class="fa fa-star" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star-o" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star-o" aria-hidden="true" style="color:yellow;"></i>
								
							</a>&nbsp&nbsp&nbsp&nbsp
							<input  type="radio" name="star" value="2">
							<a href="#">
								<i class="fa fa-star" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star-o" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star-o" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star-o" aria-hidden="true" style="color:yellow;"></i>
								
							</a>
							&nbsp&nbsp&nbsp&nbsp
							<input  type="radio" name="star"  value="1">
							<a href="#">
								<i class="fa fa-star" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star-o" aria-hidden="true"style="color:yellow;"></i>
								<i class="fa fa-star-o" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star-o" aria-hidden="true" style="color:yellow;"></i>
								<i class="fa fa-star-o" aria-hidden="true" style="color:yellow;"></i>
								
							</a>
						</li></h3>
						</ul>
                        </p>
    				</div>
    				<div class="col-sm-4 text-center">
    					<h3 class="mt-4 mb-3">Write Review Here</h3>
    					<button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
        
    </div>
    <div class="container">
    	<div class="card">
    		<div class="card-header"><h5 class="tittle-w3l">Feedback</h5></div>
    		<div class="card-body">
    			
                    <?php 
                    $select_query="select * from tbl_feedback where busername='$user'";
                    $result=mysqli_query($conn,$select_query);
                    while($row=mysqli_fetch_assoc($result)){
                        $name=$row['username'];
                        $feedback=$row['feedback'];
                        $star=$row['star'];                 
                     ?>
                	    <div class="row">	           
                        <table>
                            <tr>
                                <td>
                                    <h6>
                                        <?php echo $name?>
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6><?php echo$feedback?></h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6 style='aligin:center;' ><i class='fa fa-star' aria-hidden='true' style='color:yellow';></i><?php echo$star?></h5></ul></li></div>
                                </td>
                            </tr>
                        </table>
                        </div>

                        <?php
                            }
                        ?>
    				
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
        
    </div>
</body>
</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	        	<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button> -->
	      	 </div>
	      	  <div class="modal-body">
	      		<div class="form-group">
                    <?php
                        // echo $_SESSION['user_name'];
                     ?>
                     </td>
                     </tr>
                     <?php 
                        while($row = mysqli_fetch_array($rs)) {
                      ?>
	        		<input type="text"class="form-control" name="fname" id="name" value="<?php echo $row['username'];?>"  placeholder="Enter Your Name" />
	        	      </div>
                    <!-- <input type="text"class="form-control" name="fname" id="name" value="<?php echo $user;?>"  placeholder="Enter Your Name" />
	        	      </div> -->
	            	<div class="form-group">
	        		<textarea name="feedback" id="feedback" class="form-control" placeholder="Type Review Here"></textarea>
	              	</div>
                     <?php
                         }?>
	        	    <div class="form-group text-center mt-4">
	        	    <input class="btn btn-primary" type="submit" name="btnsubmit" value="Submit">
                     <?php
                         $_SESSION['usern']=$user;

                     ?>
						</form>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>

<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
</style>

<script>

$(document).ready(function(){

	var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
        $.ajax({
            url:"submit_rating.php",
            method:"POST",
            data:{action:'load_data'},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

});
<?php
 }
 else
 {
	//  die(header("location:../Guest/index.php"));
 }
?>

</script>

