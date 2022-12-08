<?php
include "config.php";

if(isset($_GET['nic'])){
    $nic = $_GET['nic'];
    $m = 'insert';


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

if (isset($_GET['unic'])) {
  $unic = $_GET['unic'];
  $m = 'update';


  $query = mysqli_query($con, "SELECT * FROM appointment WHERE nic='$unic'");
  $row = mysqli_fetch_array($query);

  $id = $row['id'];
  $firstname = $row['firstname'];
  $lastname = $row['lastname'];
  $nic = $row['nic'];
  $doctor = $row['doctor'];
  $date = $row['date'];

  $query1 = mysqli_query($con, "SELECT * FROM available WHERE doctor='$doctor' and date='$date'");
  $row1 = mysqli_fetch_array($query1);
  $starttime = $row1['starttime'];
  $endtime = $row1['endtime'];
}



if(isset($_POST['btupdate'])){

    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
	  $lastname = $_POST['lastname'];
	  $unic = $_POST['nic'];
	  $doctor = $_POST['doctor'];
	  $date = $_POST['date'];
    
	
    $sql = "UPDATE appointment SET firstname='$firstname',lastname='$lastname',nic='$unic',doctor='$doctor',date='$date' WHERE id='$id'";
        
        if(mysqli_query($con,$sql)) {
            header("Location: appointment_preview.php?unic=$unic");
            
        } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

	
}

if(isset($_POST['delete'])){

    $id = $_POST['id'];
    $sql = "DELETE FROM appointment WHERE id='$id'";
        
    if(mysqli_query($con,$sql)) {
        header("Location: register.html?id=$id");
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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


body {
font-family: Arial, Helvetica, sans-serif;
background-image: url("images/p7.jpg");
background-size: cover;
}

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

.lp{
  position: relative;
  left: 0%;
  width:100%;
  display: none;
}

</style>
</head>
<body>
<div id="alt" class="alert alert-success alert-dismissible lp">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success! Appointment is Scheduled</strong> 
  </div>
  <div id="altu" class="alert alert-success alert-dismissible lp">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success! Appointment is Updated</strong> 
  </div>
    <div class="container">
<h2>You can Update</h2>

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
            <option value="M.T.Jayathissa">Dr. M.T.Jayathissa</option>
            <option value="G.L.Dissanayake">Dr. G.L.Dissanayake</option>
            <option value="P.Subramanium">Dr. P.Subramanium</option>
            <option value="D.P.L.Fernando">Dr. D.P.L.Fernando</option>
            <option value="I.P.Rathnayake">Dr. I.P.Rathnayake</option>
            <option value="A.Sirimanna">Dr. A.Sirimanna</option>
            <option value="M.B.Kumarasiri">Dr. M.B.Kumarasiri</option>
            <option value="J.Withanage">Dr. J.Withanage</option>
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
    <p><?php echo $doctor; ?>is available on <?php echo $date; ?> from <?php echo $starttime; ?> to <?php echo $endtime; ?></p>
  </div>
</div>
<script>
// then echo it into the js/html stream
// and assign to a js variable
spge = '<?php echo $m ;?>';

// then
if(spge =='insert'){
  document.getElementById("alt").style.display = "block";
}

if(spge =='update'){
  document.getElementById("altu").style.display = "block";
}
document.write('<?php echo $doctor ;?>');
console.log('<?php echo $doctor ;?>');
</script>

</body>
</html>
