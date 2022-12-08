<?php
include "config.php";
if(isset($_POST['btupdate'])){

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$nic = $_POST['nic'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$city = $_POST['city'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];

$sql = "UPDATE register SET firstname='$firstname',lastname='$lastname',nic='$nic',gender='$gender',age='$age',city='$city',mobile='$mobile' WHERE email='$email'";
    
    if(mysqli_query($con,$sql)) {
        header("Location: dashboard.php?email=$email");
        
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }


}
?>