<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Database Page</title>
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
<style>
        body {
            background-color: #f0f0f0; /* Set background color of the page */
            color:black; /* Set default text color */
          }
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 150;
        }
        table {
            border: 1px solid black; /* Set border color */
            border-collapse: collapse; /* Collapse table borders */
            width: 65%; /* Set width of the table */
            margin: 0 auto; /* Center the table horizontally */
            background-color: white; /* Set background color of the table */
            color:black;
        }
        th, td {
            border: 1px solid black; /* Set border color for table cells */
            padding: 10px; /* Add padding to table cells */
            text-align: left; /* Align text to the left within table cells */
        }
        
    </style>
  </head>
  <body>
  <div class="w3-top">
    <div class="w3-bar w3-red w3-card w3-left-align w3-large">
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home Page</a>
    </div>

  <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
      <a href="data.php" class="w3-bar-item w3-button w3-padding-large">Database Page</a>
    
      </div>
    </div>
    <header class="w3-container w3-red w3-center" style="padding:30 16px">
  <h1 class="w3-margin w3-xlarge">
  
  <p class="w3-xlarge">Add new member</p>
  <p class="w3-xlarge">Listed Members</p>
  
  </h1>
  
  
  <div class="table-container">
    <table border = 1 cellspacing = 0 cellpadding = 10>
      <div style="overflow-x: auto;">
        <tr>
          <th bgcolor="white">#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Maps</th>
        </tr>
    
      <?php
      require 'connection.php';
      $rows = mysqli_query($conn, "SELECT * FROM tb_data ORDER BY id DESC");
      $i = 1;

      foreach($rows as $row) :
      ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td style = "width: 450px; height: 450px;"><iframe style = "width: 100%; height: 100%;" src="https://www.google.com/maps?q=<?php echo $row["latitude"]; ?>,<?php echo $row["longitude"]; ?>&hl=es;z=14&output=embed"></iframe></td>
      </tr>
      <?php endforeach; ?>
    </table>
    <br>
        </div>      
    </div>
  </header>
        
  </body> 
</html>
