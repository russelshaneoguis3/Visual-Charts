<?php 

session_start();

include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITD-112</title>

     <!-- CSS Style -->
    <link rel="stylesheet" type="text/css" href="index.css">

    <link href="mozkitow.png" rel="icon">
    <link href="mozkitow.png" rel="apple-touch-icon">

    <!-- Bootstrap Style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>

<!-- Navbar START -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand text-light" href="index.php">&nbsp ITD-112 Project</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <ul class="navbar-nav ms-auto mb-2 mb-lg-1" >
      <li class="nav-item active">
        <a class="nav-link" style = "color: #ffffff;" href="index.php">Home</a>
      </li>
      <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style = "color: #ffffff;">
            Project 1
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="project1.php">Data</a>
            <a class="dropdown-item" href="project1-chart.php">Charts</a>
        </div>
    </div>

      <li class="nav-item">
        <a class="nav-link" style = "color: #ffffff;" href="#">Project 2</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style = "color: #ffffff;" href="#">Project 3</a>
      </li>

    </ul>
    
</nav>  
<!-- Navbar end -->

<script>
    
// JavaScript to open the dropdown
document.addEventListener("DOMContentLoaded", function () {
    var dropdownButton = document.getElementById("dropdownMenuButton");
    var dropdownMenu = document.querySelector(".dropdown-menu");

    dropdownButton.addEventListener("click", function () {
        // Toggle the 'show' class to display or hide the dropdown
        dropdownMenu.classList.toggle("show");
    });
});
</script>

</body>
</html>