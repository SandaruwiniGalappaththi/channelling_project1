<?php
include "config.php";
if(isset($_POST["btsubmit"])){

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
    $nic = $_POST['nic'];
	$gender = $_POST['gender'];
    $age = $_POST['age'];
	$city = $_POST['city'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];
	$sql = "INSERT INTO register VALUES('','$firstname' ,'$lastname','$nic' ,'$gender','$age','$city' ,'$mobile','$email','$pwd','$pwdrepeat')";
	if(mysqli_query($con,$sql)) {
		header("Location: register.html");
	}else{
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
}
?>