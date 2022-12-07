<?php
include "config.php";

if(isset($_GET['nic'])){
    $nic = $_GET['nic'];

    $query = mysqli_query($con,"SELECT * FROM appointment WHERE nic='$nic'");
    $row = mysqli_fetch_array($query);

    $id = $row['id'];
    $firstname = $row['firstname'];
	  $lastname = $row['lastname'];
	  $nic = $row['nic'];
	  $doctor = $row['doctor'];
	  $date = $row['date'];

    $query1 = mysqli_query($con,"SELECT * FROM available WHERE doctor='$doctor' and date='$date'");
    $row1 = mysqli_fetch_array($query1);
    $doctor1 = $row1['doctor'];
	  $date1 = $row1['date'];
    $starttime = $row1['starttime'];
	  $endtime = $row1['endtime'];



}else{
  $firstname = "";
	$lastname = "";
	$nic = "";
	$doctor = "";
	$date ="";
}

if(isset($_POST['btupdate'])){

    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
	  $lastname = $_POST['lastname'];
	  $nic = $_POST['nic'];
	  $doctor = $_POST['doctor'];
	  $date = $_POST['date'];
	
	
    $sql = "UPDATE appointment SET firstname='$firstname',lastname='$lastname',nic='$nic',doctor='$doctor',date='$date' WHERE id='$id'";
        
        if(mysqli_query($con,$sql)) {
            echo 'Appointment Updated Sucessfully';
            header("Location: register.html");
            
        } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

	
}

if(isset($_POST['delete'])){

    $id = $_POST['id'];
    $sql = "DELETE FROM appointment WHERE id='$id'";
        
    if(mysqli_query($con,$sql)) {
        echo 'Appointment Cancelled';
        header("Location: register.html");
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

}
	
	
?>





<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="appointment.css">
<link rel="stylesheet" href="app_preview.css">
<style>


h2{
    font-family: "Montserrat", sans-serif;
    text-align:center;

}
.outline{
    position: absolute;
    width: 40%;

}
label{
    font-weight:500;
}
* {
    box-sizing: border-box;
    
  }
  
  input[type=text], select, textarea ,input[type=date]{
    width: 70%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;

  }
  body{
    background-color: darkblue;
  }
  label {
    padding: 12px 12px 12px 0;
    display: inline-block;
  }
  
  input[type=submit] {
    background-color: darkblue;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: none;
  }
  
  input[type=submit]:hover {
    background-color: #45a049;
  }
  
  .container {
    position:absolute;
    top:11%;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 40px;
    width: 60%;
    
  }
  
  .col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
  }
  
  .col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
  }
  
  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
  
  /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
      width: 100%;
      margin-top: 0;
    }
}


body {font-family: Arial, Helvetica, sans-serif;}

.lpt1{
    background-color:black;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 4px;
}
.lpt2{
    background-color:red;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 4px;
}



</style>
</head>
<body>
    <div class="container">
<h2>Make an Appointment</h2>

  <form method = "POST" action="appointment_preview.php">
  <input type="hidden" class="input" name="id" value="<?php echo $id; ?>" >
    <div class="row">
      <div class="col-25">
        <label for="fname">First Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="firstname" value="<?php echo $firstname; ?>" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="lastname" value="<?php echo $lastname; ?>">
      </div>
    </div>

    <div class="row">
        <div class="col-25">
          <label for="subject">NIC</label>
        </div>
        <div class="col-75">
          <input type="text"id="nic" name="nic" value="<?php echo $nic; ?>">
        </div>
      </div>

    <div class="row">
      <div class="col-25">
        <label for="country">Doctor's Name</label>
      </div>
      <div class="col-75">
      <select required id="doct" name="doctor">
            <option disabled >Select Doctor</option>
            <option selected value="<?php echo $doctor; ?>"><?php echo $doctor; ?></option>
            <option value="Dr. M.T.Jayathissa">Dr. M.T.Jayathissa</option>
            <option value="Dr. G.L.Dissanayake">Dr. G.L.Dissanayake</option>
            <option value="Dr. P.Subramanium">Dr. P.Subramanium</option>
            <option value="Dr. D.P.L.Fernando">Dr. D.P.L.Fernando</option>
            <option value="Dr. I.P.Rathnayake">Dr. I.P.Rathnayake</option>
            <option value="Dr. A.Sirimanna">Dr. A.Sirimanna</option>
            <option value="Dr. M.B.Kumarasiri">Dr. M.B.Kumarasiri</option>
            <option value="Dr. J.Withanage">Dr. J.Withanage</option>
          </select>
       
      </div>
    </div>

    <div class="row">
        <div class="col-25">
          <label for="date">Date</label>
        </div>
        <div class="col-75">
          <input type="date"id="date" name="date" value="<?php echo $date; ?>">
        </div>
      </div>
    <br>
    <div class="row">
<center>
      <input style="background-color: darkblue;left: 10%;" type="submit" name="btupdate" value="Update">
      <button type="submit" class="lpt2" background-color="red" name="delete" class="delete" >Cancel Appointment</button>
      <a href="register.html"><button class="lpt1" type="button">Back</button></a>
</center>
    </div>
  </form>
</div>

<div class="callout">
  <div class="callout-header">Available time</div>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">×</span>
  <div class="callout-container">
    <p><?php echo $doctor; ?>is available on <?php echo $date1; ?> from <?php echo $starttime; ?> to <?php echo $endtime; ?></p>
  </div>
</div>


</body>
</html>
