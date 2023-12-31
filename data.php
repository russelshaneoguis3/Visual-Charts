<?php 

session_start();

include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dengue Data Philippines</title>

     <!-- CSS Style -->
     <link rel="stylesheet" type="text/css" href="index.css">

    <link href="mozkitow.png" rel="icon">
    <link href="mozkitow.png" rel="apple-touch-icon">

 <!-- data table -->
 <!-- bootstrap css -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Include the DataTables library -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<!-- Include the DataTables Bootstrap 4 integration library -->
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<!-- Include the DataTables Bootstrap 4 stylesheet -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

</head>
<body>
<!-- table start -->
<br>
<section>    
  <div class="card" style="width: 70%; margin: 0 auto; background-color: #C5D7F2">
  <div class="card-body">
    <div class="card-title" style = "text-align: center;"><h3><strong>Dengue Data in the Philippines <span> 2016-2021 </span> </strong></h3></div>
    <table class="table table-striped table-primary my-3">
    <thead>
      <tr>
        <th>Location</th>
        <th>Cases</th>
        <th>Deaths</th>
        <th>Date</th>
        <th>Region</th>

      </tr>
    </thead>
    <tbody>
      <?php
        include "connection.php";
        $sql = "select * from dengue_data";
        $result = $conn->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=$result->fetch_assoc()){
          echo "
      <tr>
        <th>$row[loc]</th>
        <th>$row[cases]</th>
        <th>$row[deaths]</th>
        <th>$row[date]</th>
        <th>$row[Region]</th>
      </tr>
      ";
        }
      ?>
    
    </tbody>
  </table>
  </div>
  </div>
  </div>
  </section>
<!-- table end -->
<script>
$(document).ready(function() {
    $('.table').DataTable({
        "paging": true,
        "searching": true
    });
});
</script>

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
