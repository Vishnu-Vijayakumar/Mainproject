<?php

//submit_rating.php


$server = "localhost";
$user = "root";
$password = "";
$db = "bookstore";

$conn = mysqli_connect($server,$user,$password,$db);

if(!$conn) {
    die("Connection Failed:".mysqli_connect_error());
}


if(isset($_POST["save_review"]))
{
	// echo"hi";
	// $data = array(
		$user_name=$_POST['user_name'];
		$user_rating=$_POST['rating_data'];
		$user_review=$_POST['user_review'];
		echo"<script>alert($user_name); </script>";
		// $datetime=$_POST['datetime'];

	$query = "INSERT INTO tbl_review( 'user_name', 'user_rating', 'user_review')VALUES('$user_name', '$user_rating', '$user_review')";

	$statement = mysqli_query($conn,$query);
	if($statement)
	{
		echo "Your Review & Rating Successfully Submitted";

	}
	else
	{
		echo "Your Review & Rating not Submitted";

	}

	// $statement->execute($data);


}

if(isset($_POST["action"]))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "
	SELECT * FROM tbl_review 
	ORDER BY review_id DESC
	";

	$result = $conn->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		// $review_content[] = array(
			$user_name=$row["user_name"];
			$user_review=$row["user_review"];
			$rating=$row["user_rating"];
			$datetime=$row["datetime"];
		

		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}

?>