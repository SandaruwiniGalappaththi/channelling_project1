<?php

include "config.php";

if(isset($_POST["btsubmit"])){

    $email = $_POST['email'];
	$feedback = $_POST['feedback'];
	


	$sql = "INSERT INTO feedback(id,email,feedback) VALUES('','$email' ,'$feedback')";
	if(mysqli_query($con,$sql)) {
        header("Location: dashboard.php?email=$email");
		
	}else{
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
}

?>
