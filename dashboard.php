<?php
include "config.php";
session_start();
if(isset($_GET['email'])){
    $loginEmail = $_GET['email'];

    $query = mysqli_query($con,"SELECT * FROM register WHERE email='$loginEmail'");
    $row = mysqli_fetch_array($query);
    
    $id = $row['id'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $nic = $row['nic'];
    $gender = $row['gender'];
    $age = $row['age'];
    $city = $row['city'];
    $mobile = $row['mobile'];
    $email = $row['email'];
    
  
 


}else{
    header("Location: register.php");
}


?>


<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">



<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}


table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.bk{
    position: absolute;
    left: 90%;
    background-color: black;
    top: 10%;
    color: aliceblue;
    border-radius:5% ;
    width: 100px;
    height: 50px;
  }

  #form{

    display: none;
  }

  #feedbk{
    display: none;
  }
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
  
  input[type=text], select, textarea ,input[type=date], input[type=email]{
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
    top:16%;
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

/* The Modal (background) */
.modal,.modal1,.modal2,.modal3,.modal4 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close,.close1,.close2,.close3,.close4 {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: lightskyblue;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: lightskyblue;
  color: white;
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

.side{
    position: absolute;
    left: 60%;
}
.styl{
    background-color: darkblue;
    color: #f2f2f2;
    font-weight: bold;
    height: 60px;
    margin: 6%;
    width: 450px;
    border-radius: 3%;
    
}

.styl:hover {
  box-shadow: 0 12px 16px 0 rgba(7, 9, 122, 0.24),0 17px 50px 0 rgba(1, 4, 21, 0.19);
  cursor: pointer;
}

.inp {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    
    .bt {
      width: 100%;
      background-color: darkblue;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .bt1 {
      width: 100%;
      background-color: black;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    .bt:hover {
      background-color: darkblue;
    }
    
    .con {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
      width: 50%;
      position: absolute;
      left: 22.7%;;
    }
#popup{
    display: none;
}

.con input[type=text], .con input[type=email] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}
#tb{
  display: block;
  top: 20%;
}
#tb.td{
height: 10px;
}

</style>
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
<img src="images/lg.png" height="45px;" width="45px; left:60%;" >
<b class="w3-wide">HEALTH PARTNER</b>
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  
  
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="images/P9.jpg" class="w3-circle w3-margin-right" style="width:70px; height: 70px;">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong style="font-size:18px ;"><?php echo $firstname; ?>! </strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue" ><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="#" class="w3-bar-item w3-button w3-padding" id="appointment"><i style='font-size:19px' class='fas'>&#xf0f3;</i> Make Appointment</a>

<div id="form">

<form method="POST" action="appointment.php">
<div class="row">
      <div class="col-25">
    
      </div>
      <div class="col-75">
        <input required type="hidden" id="fname" name="firstname" value="<?php echo $firstname; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        
      </div>
      <div class="col-75">
        <input required type="hidden" id="lname" name="lastname" value="<?php echo $lastname; ?>">
      </div>
    </div>

    <div class="row">
        <div class="col-25">
          
        </div>
        <div class="col-75">
          <input required type="hidden"id="nic" name="nic" value="<?php echo $nic; ?>">
        </div>
      </div>

<div class="row">
      <div class="col-25">
        <label for="country">Doctor</label>
      </div>
      <div class="col-75">
        <select required id="country" name="doctor">
            <option disabled >Select Doctor</option>
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
          <input required type="date"id="date" name="date">
        </div>
      </div>
<br><br>
      <div class="row">
       <center>
      <input style="background-color: darkblue;left: 10%;" type="submit" id="sbmt" name="btsubmit" value="Submit">
      <a href=""><button class="lpt1"id="back" type="button">Cancel</button></a></center>
    </center><br>
    </div>
</form>
</div>


    <a href="#" class="w3-bar-item w3-button w3-padding" id="feedback"><i class="fa fa-users fa-fw"></i>  Feedback</a>
    
<div id="feedbk"><form action="feedback.php" method="post">
    <br><center>
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <textarea type="text" id="form2Example2"name="feedback" class="form-control" required></textarea>
    <br>
      <input style="background-color: darkblue;left: 10%;" type="submit" id="sbmt1" name="btsubmit" value="Submit">
      <a href=""><button class="lpt1"id="back1" type="button">Cancel</button></a></center>
    </center><br></form>
</div>   
   
   
    <a href="#" class="w3-bar-item w3-button w3-padding" id="updat"><i style="font-size:19px" class="fa">&#xf0fe;</i>  Profile Update</a>
 


  <a href="#" class="w3-bar-item w3-button w3-padding" id="uu"><i class="fa fa-bullseye fa-fw"></i>  You</a>
<div id="tb">
        <table>
        <tr><td>Last Name</td><td><?php echo $lastname; ?></td></tr>
        <tr><td>NIC</td><td><?php echo $nic; ?></td></tr>
        <tr><td>Email</td><td><?php echo $email; ?></td></tr>
        <tr><td>Age</td><td><?php echo $age; ?></td></tr>
        <tr><td>City</td><td><?php echo $city; ?></td></tr>
        <tr><td>Mobile</td><td><?php echo $mobile; ?></td></tr>
        <tr><td>email</td><td><?php echo $email; ?></td></tr>
    </table>
    </div>
    </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <a href="register.html"><button class="bk">BACK</button></a>
  <div id="popup" class="con" style="background-color: lightblue;">
   <center>

    <img src="images/P9.jpg" width="20%" height="20%">
   </center>
  
    <form method="post" action="profile.php">
      <label for="fname">First Name</label>
      <input  type="text" id="fname" name="firstname" value="<?php echo $firstname; ?>" required>
  <br>
      <label for="lname">Last Name</label>
      <input  type="text" id="lname" name="lastname" value="<?php echo $lastname; ?>" required>
      <br>
      <label for="nc">NIC</label>
      <input type="text" value="<?php echo $nic; ?>" name="nic" required>
      <br>
      <label for="gnd">Gender</label><br><br>
      Male
      <input type="radio" value="male" checked name="gender">
      Female 
      <input type="radio" value="female"name="gender"><br><br>
      <br>
      <label for="ag">Age</label>
      <input type="text" value="<?php echo $age; ?>" name="age" required>
      <br>
      <label for="cty">City</label>
      <input type="text" value="<?php echo $city; ?>" name="city" required>
      <br>
      <label for="mob">Mobile</label>
      <input type="text" value="<?php echo $mobile; ?>" name="mobile" pattern="[0-9]{10}"required>
      <br>
      <label for="emal">Email</label>
      <input type="email" value="<?php echo $email; ?>" name="email" readonly>

    <br>
      <input class="bt" type="submit" name="btupdate" value="Update">
      <input id="canc" class="bt1" type="button" value="Cancel">
    </form>

</div>
        
     
    </div>
  </div>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
      
        <img src="/w3images/region.jpg" style="width:100%" alt="Google Regional Map">
      </div>
      <div class="w3-twothird">
        <h5>Appointments</h5>
        <table class="w3-table w3-striped w3-white">
        <?php
$sql3 = "SELECT doctor, date, time FROM appointment where nic='$nic'";
$result1 = $con->query($sql3);

if ($result1->num_rows > 0) {
    echo "<table><tr><th>Channelled Doctor</th><th>Date</th><th>Time</th></tr>";
    // output data of each row
    while($row3 = $result1->fetch_assoc()) {
      echo "<tr><td>".$row3["doctor"]."</td><td>".$row3["date"]."</td><td>".$row3["time"]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
         
    ?>      
        
      </div>
    </div>
  </div>
  <hr>

  
  <div class="w3-container">
    <h5>General Stats</h5>
    <p>New Visitors</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-green" style="width:25%"></div>
    </div>

    <p>New Users</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-orange" style="width:50%"></div>
    </div>

    <p>Bounce Rate</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:75%"></div>
    </div>
  </div>
  <hr>

  

 

  <!-- End page content -->
</div>

<script>
    var youu = document.getElementById("uu");

youu.onfocus = function() {
  document.getElementsById("tb").style.display = "block";
}

// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}

var myInput = document.getElementById("appointment");
var myInput1 = document.getElementById("feedback");
var back = document.getElementById("back");
var back1 = document.getElementById("back1");
var updat = document.getElementById("updat");
var canc = document.getElementById("canc");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("form").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
back.onfocus = function() {
  document.getElementById("form").style.display = "none";

}
myInput1.onfocus = function() {
  document.getElementById("feedbk").style.display = "block";
}

back1.onfocus = function() {
  document.getElementById("feedbk").style.display = "none";

}

updat.onfocus = function() {
  document.getElementById("popup").style.display = "block";
}

canc.onfocus = function() {
  document.getElementById("popup").style.display = "none";

}

</script>

</body>
</html>

