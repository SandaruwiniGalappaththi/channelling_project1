<?php

include "config.php";

if(isset($_POST["btsubmit"])){


	$fristname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$nic = $_POST['nic'];
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];
	


	$sql = "INSERT INTO appointment(id,firstname,lastname,nic,doctor,date) VALUES('','$fristname' ,'$lastname','$nic','$doctor','$date')";
	if(mysqli_query($con,$sql)) {
        header("Location: appointment_preview.php?nic=$nic");
		
	}else{
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
}

?>
