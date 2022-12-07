<?php

include "config.php";

if(isset($_POST["btsubmit"])){


	$fristname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
    $writeus = $_POST['writeus'];
	


	$sql = "INSERT INTO contact VALUES('','$fristname' ,'$lastname','$email','$writeus')";
	if(mysqli_query($con,$sql)) {

		echo 'success';
	}else{
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
}

?>