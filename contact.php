<?php
include "config.php";
if(isset($_POST["btsubmit"])){

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$writeus = $_POST['writeus'];
	

	$sql = "INSERT INTO contact VALUES('','$firstname' ,'$lastname','$email','$writeus')";
	if(mysqli_query($con,$sql)) {
		header("Location: contactus.html");
	}else{
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
}

?>