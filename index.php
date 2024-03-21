<?php
require 'connection.php';

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $latitude = $_POST["latitude"];
  $longitude = $_POST["longitude"];

  $query = "INSERT INTO tb_data VALUES('', '$name', '$email', '$latitude', '$longitude')";
  mysqli_query($conn, $query);

  echo
  "<script>
  alert('Data Added Successfully');
  document.location.href = 'data.php';
  </script>"
  ;
}
?>

<html lang="en">
<head>
<title>Add Member</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
</head>
<body onload = "getLocation();">

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="data.php" class="w3-bar-item w3-button w3-padding-large w3-white">Database Page</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="data.php" class="w3-bar-item w3-button w3-padding-large">Database Page</a>
    
  </div>
</div>

<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:30 16px">
  <h1 class="w3-margin w3-xlarge">
  <p class="w3-xlarge">Add new member</p>
  <form class="myForm" action="" method="post" autocomplete="off">
    <div style="text-align: center;">
      <label for="fullname" style="width: 120px; display: inline-block;">FullName</label>
      <input type="text" id="fullname" name="name" required value="" style="margin-bottom: 10px;"> <br>
      <label for="email" style="width: 120px; display: inline-block;">Email</label>
      <input type="email" id="email" name="email" required value="" style="margin-bottom: 10px;"> <br>
    </div>
      <input type="hidden" name="latitude" value="">
      <input type="hidden" name="longitude" value="">
      <button type="submit" name="submit" class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Submit</button>
    </form>
  </h1>
  
  
</header>
<script>
      function getLocation(){
        if(navigator.geolocation){
          navigator.geolocation.getCurrentPosition(showPosition,showError);
        }
      }
      function showPosition(position){
        document.querySelector('.myForm input[name="latitude"]').value = position.coords.latitude;
        document.querySelector('.myForm input[name="longitude"]').value = position.coords.longitude;
      }
      function showError(error){
        switch(error.code){
          case error.PERMISSION_DENIED:
          alert("You Must Allow The Request For Geolocation To Fill Out The Form");
          location.reload();
          break;
        }
      }
    </script>
    <br>
<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1>A few things about this page </h1>
      <h5 class="w3-padding-32"></h5>

      <p class="w3-text-grey">This page,mainly conducted with HTML and PHP,focuses on the insertion
        of new members and their personal information to a database.
        This database is conducted by the member's fullname,email and their geographic info .
        The geographic info is automaticly inserted as longitude and altitude to the database system.
        Hence, if you click on the database page in the top-right of the page you will see the members' geographic info being displayed
        alongside with their name and email.</p>
    </div>

    <div class="w3-third w3-center">
      <i class="fa fa-anchor w3-padding-64 w3-text-red"></i>
    </div>
  </div>
</div>


<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
</div>


<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity">  
  <div class="w3-xlarge w3-padding-32">
    <a href="https://www.facebook.com/vaggelis.xatziantoniou/">
    <i class="fa fa-facebook-official w3-hover-opacity"></i></a> 
    <a href="https://www.instagram.com/vangelis_chznt/">
    <i class="fa fa-instagram w3-hover-opacity"></i></a>
    <a href="https://twitter.com/greenpain13">
    <i class="fa fa-twitter w3-hover-opacity"></i></a>
    
    <a href="https://www.linkedin.com/in/vangelis-chatziantoniou-6a1792155/">
    <i class="fa fa-linkedin w3-hover-opacity"></i></a>
 </div>
 <p>Powered by Greenpain</p>
</footer>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>