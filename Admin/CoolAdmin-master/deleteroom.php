<?php
$conn =mysqli_connect("localhost","fypmhpbs","iDRIS@976","sdmarrio_mhpbs");

error_reporting(0);

$room_number = $_GET['rn'];

$query = "DELETE FROM rooms WHERE room_number = '$room_number'";

$data  = mysqli_query($conn,$query);

if ($data){
	
	echo "Succesfully Deleted";
}else{
	echo " Failed to Delete";
}
?>