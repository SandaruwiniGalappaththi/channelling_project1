<?php
include "config.php";

if(isset($_GET['isfound'])){
    $isfound = $_GET['isfound'];

}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    .bk{
    position: absolute;
    right: 5%;
    background-color: black;
    top: 10%;
    color: aliceblue;
    border-radius:5% ;
    width: 100px;
    height: 50px;
  }
</style>
</head>
<body>
<div id="alt" class="alert alert-success alert-dismissible lp">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Appointment is Done Successfully!</strong> 
  </div>

  <a href="register.html"><button class="bk">BACK</button></a>
</body>
</html>