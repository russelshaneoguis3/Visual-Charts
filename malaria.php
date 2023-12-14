<?php 

session_start();

include("connection.php");

// Malaria cases and deaths by distinct year
$query = "SELECT DISTINCT Year, SUM(malaria_deaths) AS total_deaths FROM malaria GROUP BY Year";
$result = mysqli_query($conn, $query);

// Create arrays to store data for the line chart
$years = [];
$deaths = [];

while ($row = mysqli_fetch_assoc($result)) {
    $years[] = $row['Year'];
    $deaths[] = $row['total_deaths'];
}


// Encode data as JSON for JavaScript
$chart_data = [
    'years' => $years,
    'deaths' => $deaths,
];
$chart_json = json_encode($chart_data);

// Query to get counts of distinct Years for each Entity
$query = "SELECT Entity, COUNT(DISTINCT Year) AS year_count FROM malaria GROUP BY Entity";
$result = mysqli_query($conn, $query);

// Create arrays to store data for the radar chart
$entities = [];
$yearCounts = [];

while ($row = mysqli_fetch_assoc($result)) {
    $entities[] = $row['Entity'];
    $yearCounts[] = $row['year_count'];
}

// Encode data as JSON for JavaScript
$radarChartData = [
    'entities' => $entities,
    'yearCounts' => $yearCounts,
];
$radarChartJson = json_encode($radarChartData);

// Query to get counts of distinct Entity values
$query = "SELECT Entity, COUNT(*) AS entity_count FROM malaria GROUP BY Entity";
$result = mysqli_query($conn, $query);

// Create arrays to store data for the pie chart
$entities = [];
$entityCounts = [];

while ($row = mysqli_fetch_assoc($result)) {
    $entities[] = $row['Entity'];
    $entityCounts[] = $row['entity_count'];
}

// Encode data as JSON for JavaScript
$pieChartData = [
    'entities' => $entities,
    'entityCounts' => $entityCounts,
];
$pieChartJson = json_encode($pieChartData);

// Query to get counts of malaria_deaths for each distinct Entity
$query = "SELECT Entity, SUM(malaria_deaths) AS total_deaths FROM malaria GROUP BY Entity";
$result = mysqli_query($conn, $query);

// Create arrays to store data for the area chart
$entities = [];
$deaths = [];

while ($row = mysqli_fetch_assoc($result)) {
    $entities[] = $row['Entity'];
    $deaths[] = $row['total_deaths'];
}

// Encode data as JSON for JavaScript
$areaChartData = [
    'entities' => $entities,
    'deaths' => $deaths,
];
$areaChartJson = json_encode($areaChartData);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>World Malaria Data</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="mozkitow.png" rel="icon">
  <link href="mozkitow.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="https://doh.gov.ph/central-office-directory" target="_blank">callcenter@doh.gov.ph</a>
        <i class="bi bi-phone"></i>(632) 8651-7800; local 5003-5004 (632) 165-364
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="https://twitter.com/DOHgovph" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/DOHgovPH" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/doh.philippines/" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="malaria.php">Malaria World Data</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#departments">Data</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="malaria_data.php" class="appointment-btn scrollto" target="_blank"><span class="d-none d-md-inline">Data Table</span></a>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>World Malaria Cases</h1>
      <h2>Yearly Cases (2000 - 2020)</h2>
      <a href="#about" class="btn-get-started scrollto">See Info</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>What is malaria?</h3>
              <p>
              Malaria is a mosquito-borne infectious disease that affects humans and other animals. It is caused by parasites belonging to the genus Plasmodium. These parasites are transmitted to humans through the bites of infected female Anopheles mosquitoes
              </p>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bxs-detail"></i>
                    <h4>Symptom 1</h4>
                    <p>Fever: High fever is a hallmark symptom of malaria, often accompanied by chills and rigors.<br>
                    Headache: Severe headache is common, often accompanied by a general feeling of malaise.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bxs-detail"></i>
                    <h4>Symptom 2</h4>
                    <p>Muscle aches and pains: Body aches and pains are frequent, particularly in the joints and muscles.<br>
                    Fatigue: Feeling tired and drained is a common symptom of malaria.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bxs-detail"></i>
                    <h4>Symptom 3</h4>
                    <p>Nausea and vomiting: Gastrointestinal issues can occur, including nausea, vomiting, and diarrhea.<br>
                    In severe cases: Complications like seizures, coma, and organ failure can occur, necessitating immediate medical attention.</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <a href="https://www.youtube.com/watch?v=81om0ujOVmc" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Global Response to Malaria</h3>
            <p>The global response to malaria involves a combination of efforts from governments, international organizations, non-governmental organizations (NGOs), researchers, and communities. Here are some key aspects of the world's response to malaria:</p>
            <div class="icon-box">
              <div class="icon"><i class="bx bxs-error-alt"></i></div>
              <h4 class="title"><a href="#about">1. Global Partnerships and Organizations:</a></h4>
              <p class="description">The World Health Organization (WHO) plays a central role in coordinating global efforts to combat malaria. Various partnerships and initiatives, such as the Roll Back Malaria (RBM) partnership, have been established to bring together governments, organizations, and communities to work collectively.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bxs-add-to-queue"></i></div>
              <h4 class="title"><a href="#about">2. Preventive Measures:</a></h4>
              <p class="description">Malaria prevention involves the use of insecticide-treated bed nets, indoor residual spraying, and preventive medications, such as antimalarial drugs for vulnerable populations. These measures aim to reduce the transmission of the malaria parasite.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title"><a href="#about">3. Diagnosis and Treatment:</a></h4>
              <p class="description">Timely and accurate diagnosis is crucial for effective malaria control. Rapid diagnostic tests and microscopy are commonly used to identify and confirm malaria cases. Antimalarial medications are prescribed for treatment, with an emphasis on combination therapies to prevent drug resistance.</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="fas fa-city"></i>
              <span data-purecounter-start="0" data-purecounter-end="6" data-purecounter-duration="1" class="purecounter"></span>
              <p>Regions Affected</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="far fa-hospital"></i>
              <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="1" class="purecounter"></span>
              <p>Years</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="far fa-clipboard"></i>
              <span data-purecounter-start="0" data-purecounter-end="126" data-purecounter-duration="1" class="purecounter"></span>
              <p>Case Recorded</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-clipboard-list"></i>
              <span data-purecounter-start="0" data-purecounter-end="14563556" data-purecounter-duration="1" class="purecounter"></span>
              <p>Deaths</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Dengue Data</h2>
          <p></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Line Chart - Yearly Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Radar Chart - Region Years Affected</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Pie Chart - Region Affected Count</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Area Chart - Deaths by Region</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row gy-4">
                  <div class="col-lg-14 details order-1 order-lg-1">

                      <canvas id="malariaChart" width="800" height="400"></canvas>

                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                        <!-- Radar Chart Canvas -->
                        <canvas id="radarChart" width="1000" height="600"></canvas>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row gy-4">
                  <div class="col-lg-6 details order-2 order-lg-1">
                      <!-- Pie Chart Canvas -->
                      <canvas id="pieChart" width="400" height="400"></canvas>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row gy-4">
                  <div class="col-lg-14 details order-2 order-lg-1">
                        <!-- Area Chart Canvas -->
                        <canvas id="areaChart" width="800" height="400"></canvas>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Departments Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-7 col-md-6 footer-contact">
            <h3>World Malaria Cases (2000-2020)</h3>
            <p>
              MSU-Iligan Institute of Technology <br>
              Tibanga, Iligan City, 9200<br>
              Mindanao, Philippines
            </p>
          </div>


    <div class="container d-md-flex">

      <div class="me-md-auto text-center text-md-start">
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


<!-- Add this JavaScript code after fetching the JSON data -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Assuming $chart_json contains the JSON-encoded data from PHP

    const chartData = JSON.parse('<?php echo $chart_json; ?>');

    // Create the line chart
    const ctx = document.getElementById('malariaChart').getContext('2d');
    const myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: chartData.years,
        datasets: [
          {
            label: 'Malaria Deaths',
            borderColor: 'rgba(75, 192, 192, 1)',
            data: chartData.deaths,
            fill: false,
          },
        ],
      },
    });
  });

  document.addEventListener('DOMContentLoaded', function () {
        // Assuming $radarChartJson contains the JSON-encoded data from PHP
        const radarChartData = JSON.parse('<?php echo $radarChartJson; ?>');

        // Create the radar chart
        const ctx = document.getElementById('radarChart').getContext('2d');
        const myRadarChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: radarChartData.entities,
                datasets: [{
                    label: 'Distinct Years Count',
                    data: radarChartData.yearCounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Assuming $pieChartJson contains the JSON-encoded data from PHP
        const pieChartData = JSON.parse('<?php echo $pieChartJson; ?>');

        // Create the pie chart
        const ctx = document.getElementById('pieChart').getContext('2d');
        const myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: pieChartData.entities,
                datasets: [{
                    data: pieChartData.entityCounts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)'
                        // Add more colors as needed
                    ],
                }],
            },
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Assuming $areaChartJson contains the JSON-encoded data from PHP
        const areaChartData = JSON.parse('<?php echo $areaChartJson; ?>');

        // Create the area chart
        const ctx = document.getElementById('areaChart').getContext('2d');
        const myAreaChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: areaChartData.entities,
                datasets: [{
                    label: 'Malaria Deaths Count',
                    data: areaChartData.deaths,
                    backgroundColor: 'red',
                    borderColor: 'red',
                    borderWidth: 1,
                    fill: true, // This fills the area under the line
                }],
            },
        });
    });

</script>

</body>

</html>

</body>
</html>