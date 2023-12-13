<?php 

session_start();

include("connection.php");

// cases and deaths by year
$query = "SELECT YEAR(STR_TO_DATE(date, '%d/%m/%Y')) AS year, SUM(cases) AS total_cases, SUM(deaths) AS total_deaths FROM dengue_data GROUP BY year LIMIT 1000000121121 OFFSET 1";
$result = mysqli_query($conn, $query);

// Create arrays to store data for the line chart
$years = [];
$cases = [];
$deaths = [];

while ($row = mysqli_fetch_assoc($result)) {
    $years[] = $row['year'];
    $cases[] = $row['total_cases'];
    $deaths[] = $row['total_deaths'];
}

// Encode data as JSON for JavaScript
$chart_data = [
    'years' => $years,
    'cases' => $cases,
    'deaths' => $deaths,
];
$chart_json = json_encode($chart_data);

//----------------------------------------------------------------------------------------------------------------
//loc data set
// first 25 loc
$queryLoc = "SELECT loc, SUM(cases) AS total_cases, SUM(deaths) AS total_deaths FROM dengue_data GROUP BY loc LIMIT 25";
$resultLoc = mysqli_query($conn, $queryLoc);

// Create arrays to store data for the bar chart
$locNames = [];
$totalCasesLoc = [];
$totalDeathsLoc = [];

while ($rowLoc = mysqli_fetch_assoc($resultLoc)) {
    $locNames[] = $rowLoc['loc'];
    $totalCasesLoc[] = $rowLoc['total_cases'];
    $totalDeathsLoc[] = $rowLoc['total_deaths'];
}

// Encode data as JSON for JavaScript
$chartDataLoc = [
    'locNames' => $locNames,
    'totalCasesLoc' => $totalCasesLoc,
    'totalDeathsLoc' => $totalDeathsLoc,
];
$chartJsonLoc = json_encode($chartDataLoc);


$queryLocNext25 = "SELECT loc, SUM(cases) AS total_cases, SUM(deaths) AS total_deaths FROM dengue_data GROUP BY loc LIMIT 25 OFFSET 25";
$resultLocNext25 = mysqli_query($conn, $queryLocNext25);

// Create arrays to store data for the bar chart
$locNamesNext25 = [];
$totalCasesLocNext25 = [];
$totalDeathsLocNext25 = [];

while ($rowLocNext25 = mysqli_fetch_assoc($resultLocNext25)) {
    $locNamesNext25[] = $rowLocNext25['loc'];
    $totalCasesLocNext25[] = $rowLocNext25['total_cases'];
    $totalDeathsLocNext25[] = $rowLocNext25['total_deaths'];
}

// Encode data as JSON for JavaScript
$chartDataLocNext25 = [
    'locNamesNext25' => $locNamesNext25,
    'totalCasesLocNext25' => $totalCasesLocNext25,
    'totalDeathsLocNext25' => $totalDeathsLocNext25,
];
$chartJsonLocNext25 = json_encode($chartDataLocNext25);

//data by 51 to 75------------------------------------------------------------------------------------------------

// Fetch data from your database (Replace 'your_table' with the actual table name)
$queryLocNext51 = "SELECT loc, SUM(cases) AS total_cases, SUM(deaths) AS total_deaths FROM dengue_data GROUP BY loc LIMIT 25 OFFSET 50";
$resultLocNext51 = mysqli_query($conn, $queryLocNext51);

// Create arrays to store data for the bar chart
$locNamesNext51 = [];
$totalCasesLocNext51 = [];
$totalDeathsLocNext51 = [];

while ($rowLocNext51 = mysqli_fetch_assoc($resultLocNext51)) {
    $locNamesNext51[] = $rowLocNext51['loc'];
    $totalCasesLocNext51[] = $rowLocNext51['total_cases'];
    $totalDeathsLocNext51[] = $rowLocNext51['total_deaths'];
}

// Encode data as JSON for JavaScript
$chartDataLocNext51 = [
    'locNamesNext51' => $locNamesNext51,
    'totalCasesLocNext51' => $totalCasesLocNext51,
    'totalDeathsLocNext51' => $totalDeathsLocNext51,
];
$chartJsonLocNext51 = json_encode($chartDataLocNext51);

//from 75-100 data

$queryLocNext71 = "SELECT loc, SUM(cases) AS total_cases, SUM(deaths) AS total_deaths FROM dengue_data GROUP BY loc LIMIT 30 OFFSET 70";
$resultLocNext71 = mysqli_query($conn, $queryLocNext71);

// Create arrays to store data for the bar chart
$locNamesNext71 = [];
$totalCasesLocNext71 = [];
$totalDeathsLocNext71 = [];

while ($rowLocNext71 = mysqli_fetch_assoc($resultLocNext71)) {
    $locNamesNext71[] = $rowLocNext71['loc'];
    $totalCasesLocNext71[] = $rowLocNext71['total_cases'];
    $totalDeathsLocNext71[] = $rowLocNext71['total_deaths'];
}

// Encode data as JSON for JavaScript
$chartDataLocNext71 = [
    'locNamesNext71' => $locNamesNext71,
    'totalCasesLocNext71' => $totalCasesLocNext71,
    'totalDeathsLocNext71' => $totalDeathsLocNext71,
];
$chartJsonLocNext71 = json_encode($chartDataLocNext71);

// last locs ------------------------------------------------------------------------------------------
$queryLocLast101 = "SELECT loc, SUM(cases) AS total_cases, SUM(deaths) AS total_deaths FROM dengue_data GROUP BY loc LIMIT 26 OFFSET 100";
$resultLocLast101 = mysqli_query($conn, $queryLocLast101);

// Create arrays to store data for the bar chart
$locNamesLast101 = [];
$totalCasesLocLast101 = [];
$totalDeathsLocLast101 = [];

while ($rowLocLast101 = mysqli_fetch_assoc($resultLocLast101)) {
    $locNamesLast101[] = $rowLocLast101['loc'];
    $totalCasesLocLast101[] = $rowLocLast101['total_cases'];
    $totalDeathsLocLast101[] = $rowLocLast101['total_deaths'];
}

// Encode data as JSON for JavaScript
$chartDataLocLast101 = [
    'locNamesLast101' => $locNamesLast101,
    'totalCasesLocLast101' => $totalCasesLocLast101,
    'totalDeathsLocLast101' => $totalDeathsLocLast101,
];
$chartJsonLocLast101 = json_encode($chartDataLocLast101);

// Fetch data from your database (Replace 'your_table' with the actual table name)
$queryRadar = "SELECT MONTH(STR_TO_DATE(date, '%d/%m/%Y')) AS month, SUM(cases) AS total_cases, SUM(deaths) AS total_deaths FROM dengue_data GROUP BY month limit 12312312 offset 1";
$resultRadar = mysqli_query($conn, $queryRadar);

// Create arrays to store data for the radar chart
$monthsRadar = [];
$totalCasesRadar = [];
$totalDeathsRadar = [];

while ($rowRadar = mysqli_fetch_assoc($resultRadar)) {
    // Get month name based on the month number
    $monthName = date("F", mktime(0, 0, 0, $rowRadar['month'], 1));
    
    $monthsRadar[] = $monthName;
    $totalCasesRadar[] = $rowRadar['total_cases'];
    $totalDeathsRadar[] = $rowRadar['total_deaths'];
}

// Encode data as JSON for JavaScript
$chartDataRadar = [
    'months' => $monthsRadar,
    'totalCasesRadar' => $totalCasesRadar,
    'totalDeathsRadar' => $totalDeathsRadar,
];
$chartJsonRadar = json_encode($chartDataRadar);

//cities count every region---------------------------------------------------------------------------

// Fetch data from your database (Replace 'your_table' with the actual table name)
$queryPie = "SELECT Region, COUNT(DISTINCT loc) AS loc_count FROM dengue_data GROUP BY Region";
$resultPie = mysqli_query($conn, $queryPie);

// Create arrays to store data for the pie chart
$regionPie = [];
$locCountPie = [];

while ($rowPie = mysqli_fetch_assoc($resultPie)) {
    $regionPie[] = $rowPie['Region'];
    $locCountPie[] = $rowPie['loc_count'];
}

// Encode data as JSON for JavaScript
$chartDataPie = [
    'regionPie' => $regionPie,
    'locCountPie' => $locCountPie,
];
$chartJsonPie = json_encode($chartDataPie);

//Distict regions cases and deaths -----------------------------------------------------------------------------
$queryLine = "SELECT Region, SUM(cases) AS total_cases, SUM(deaths) AS total_deaths FROM dengue_data GROUP BY Region";
$resultLine = mysqli_query($conn, $queryLine);

// Create arrays to store data for the line chart
$regionsLine = [];
$casesLine = [];
$deathsLine = [];

while ($rowLine = mysqli_fetch_assoc($resultLine)) {
    $regionsLine[] = $rowLine['Region'];
    $casesLine[] = $rowLine['total_cases'];
    $deathsLine[] = $rowLine['total_deaths'];
}

// Encode data as JSON for JavaScript
$chartDataLine = [
    'regionsLine' => $regionsLine,
    'casesLine' => $casesLine,
    'deathsLine' => $deathsLine,
];
$chartJsonLine = json_encode($chartDataLine);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dengue Data Philippines</title>
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

      <h1 class="logo me-auto"><a href="index.php">Dengue Cases</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Cases (City)</a></li>
          <li><a class="nav-link scrollto" href="#departments">Data</a></li>
          <li><a class="nav-link scrollto" href="#faq">Prevention</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="data.php" class="appointment-btn scrollto" target="_blank"><span class="d-none d-md-inline">Data Table</span></a>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Philippine Dengue Data</h1>
      <h2>Dengue cases from 2016 to 2021.</h2>
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
              <h3>What is dengue?</h3>
              <p>
              Dengue is a mosquito-borne viral infection that can cause severe flu-like symptoms and, in some cases, lead to severe complications. The incidence of dengue fever can vary from year to year and is influenced by factors such as climate, mosquito populations, and public health measures.
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
                    <p>Sudden High Fever: A high fever is often one of the first symptoms of dengue fever. The fever may be as high as 104°F (40°C) and typically lasts 2 to 7 days.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bxs-detail"></i>
                    <h4>Symptom 2</h4>
                    <p>Severe Headache: Dengue fever is often associated with severe headaches, which can be debilitating.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bxs-detail"></i>
                    <h4>Symptom 3</h4>
                    <p>Skin Rash: Some individuals may develop a rash, which can vary in appearance and may be itchy</p>
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
            <a href="https://www.youtube.com/watch?v=EqCOqaTfsIA" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Government Response to Dengue in the Philippines (2016-2021)</h3>
            <p>The Philippine government has implemented various strategies to combat dengue throughout 2016-2021. Here's a breakdown of some key initiatives:</p>

            <div class="icon-box">
              <div class="icon"><i class="bx bxs-error-alt"></i></div>
              <h4 class="title"><a href="#about">1. Surveillance and Early Warning:</a></h4>
              <p class="description">Enhanced disease surveillance: Expanded data collection and monitoring systems to track cases, identify outbreaks early, and inform proactive responses.<br>
              Public awareness campaigns: Launched nationwide campaigns to educate communities about dengue prevention, symptoms, and treatment.<br>
              Hotspot identification: Pinpointed areas with high caseloads and targeted interventions there.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bxs-add-to-queue"></i></div>
              <h4 class="title"><a href="#about">2. Clinical Management:</a></h4>
              <p class="description">Training healthcare personnel: Trained healthcare workers on effective dengue diagnosis, management, and patient care protocols.<br>
              Blood donation drives: Organized blood donation drives to ensure adequate blood supply for severe dengue cases.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title"><a href="#about">3. Legislation and Advocacy:</a></h4>
              <p class="description">Dengue Prevention and Control Act of 2019: Enacted legislation mandating coordinated efforts across government agencies for dengue prevention and control.<br>
              Advocacy for international collaboration: Collaborated with international health organizations to share best practices and access research advancements.</p>
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
              <span data-purecounter-start="0" data-purecounter-end="17" data-purecounter-duration="1" class="purecounter"></span>
              <p>Regions Affected</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="far fa-hospital"></i>
              <span data-purecounter-start="0" data-purecounter-end="126" data-purecounter-duration="1" class="purecounter"></span>
              <p>Cities with Cases</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="far fa-clipboard"></i>
              <span data-purecounter-start="0" data-purecounter-end="32701" data-purecounter-duration="1" class="purecounter"></span>
              <p>Case Recorded</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-clipboard-list"></i>
              <span data-purecounter-start="0" data-purecounter-end="1166364" data-purecounter-duration="1" class="purecounter"></span>
              <p>Overall Cases + Deaths</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Dengue Data in The Philippines</h2>
          <p>This Bar Charts Shows the cases and deaths in different cities in the Philippines</p>
        </div>

        <div class="row">
          <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
          <div class="container mt-5">
            <!-- Bar Graph Chart Container for first 25 Distinct Loc -->
          <canvas id="barChartLoc" width="800" height="400"></canvas>
          </div>
          </div>

          <div class="col-lg-6 col-md-6 align-items-stretch">
          <!-- Bar Graph Chart Container for Next 25 Distinct Loc -->
          <div class="container mt-5">
              <canvas id="barChartLocNext25" width="800" height="400"></canvas>
          </div>
          </div>


          <div class="col-lg-6 col-md-6 d-flex align-items-stretch mt-4">
          <!-- Bar Graph Chart Container for Next 25 Distinct Loc (51-75) -->
          <div class="container mt-5">
              <canvas id="barChartLocNext51" width="800" height="400"></canvas>
          </div>
          </div>

          <div class="col-lg-6 col-md-6 d-flex align-items-stretch mt-4">
            <!-- Bar Graph Chart Container for Next 30 Distinct Loc (71-100) -->
            <div class="container mt-5">
                <canvas id="barChartLocNext71" width="800" height="400"></canvas>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 d-flex align-items-stretch mt-4">
          <!-- Bar Graph Chart Container for Last 26 Distinct Loc (101-126) -->
          <div class="container mt-5">
          <canvas id="barChartLocLast101" width="800" height="400"></canvas>
          </div>
          </div>
          
        </div>

      </div>
    </section><!-- End Services Section -->

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
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Radar Chart - Data by Month</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Pie Chart - Cities count by Region</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Area Chart - Cases by Region</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row gy-4">
                  <div class="col-lg-14 details order-1 order-lg-1">

                            <canvas id="lineChart" width="800" height="300"></canvas>

                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row gy-4">
                  <div class="col-lg-14 details order-2 order-lg-1">
                      <!-- Radar Chart Container -->

                          <canvas id="radarChart" width="1000" height="600"></canvas>

                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row gy-4">
                  <div class="col-lg-14 details order-2 order-lg-1">
                    <!-- Pie Chart Container for all the region counts -->
                          <canvas id="pieChart" width="400" height="400"></canvas>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row gy-4">
                  <div class="col-lg-14 details order-2 order-lg-1">
                    <!-- Line Chart Container for Region Data -->
                      <canvas id="lineChartRegion" width="800" height="500"></canvas>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                    <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                    <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-5.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Departments Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Dengue Prevention</h2>
          <p>While there is currently no specific cure for dengue, there are effective ways to manage the symptoms and prevent future infection. Here's an overview of current approaches:.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bxs-pencil icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Early diagnosis and supportive care: <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                This is crucial for preventing complications. It involves monitoring vital signs, managing fever and pain, and ensuring adequate hydration and electrolyte balance. Pain relievers like acetaminophen can help manage the discomfort.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bxs-pencil icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Fluid therapy & Blood transfusion:  <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                Intravenous fluids may be necessary if the patient is dehydrated or has severe vomiting. In severe cases, blood transfusions may be needed to replace lost platelets or red blood cells.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bxs-pencil icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Mosquito control: This is the most effective way to prevent dengue.  <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                Eliminating mosquito breeding grounds: Stagnant water in containers, tires, and plants can be breeding grounds for mosquitoes. It's crucial to keep such areas clean and dry.<br>
                Using mosquito nets and repellents: Sleeping under mosquito nets and applying insect repellents containing DEET or picaridin can help protect against mosquito bites. <br>
                Promoting community-based mosquito control initiatives: Encouraging neighbors to participate in clean-up drives and mosquito control measures can significantly reduce mosquito populations.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bxs-pencil icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Dengue vaccination: <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                A partially effective vaccine called Dengvaxia is available in some countries. It provides some protection against the four serotypes of dengue virus.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bxs-pencil icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Community awareness and education: <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                Raising awareness about dengue symptoms, prevention methods, and early medical attention can help reduce the impact of the disease.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-7 col-md-6 footer-contact">
            <h3>Dengue Cases in the Philippines (2016-2021)</h3>
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

//by year cases line chart//

document.addEventListener("DOMContentLoaded", function () {
    // Get chart data from PHP
    var chartData = <?php echo $chart_json; ?>;

    // Get canvas element
    var ctx = document.getElementById('lineChart').getContext('2d');

    // Create Line Chart
    var lineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartData.years.map(String), // Convert years to strings
            datasets: [{
                label: 'Cases',
                borderColor: 'purple',
                backgroundColor: 'transparent',
                data: chartData.cases,
                pointRadius: 5,
                pointHoverRadius: 8,
            }, {
                label: 'Deaths',
                borderColor: 'red',
                backgroundColor: 'transparent',
                data: chartData.deaths,
                pointRadius: 5,
                pointHoverRadius: 10,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: false, // Adjusted to start at the first year
                },
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Count of Cases and Deaths by Year'
                }
            }
        }
    });
});

//By 25 locations cases ----------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
    // Get chart data for the bar graph from PHP
    var chartDataLoc = <?php echo $chartJsonLoc; ?>;

    // Get canvas element for the bar graph
    var ctxLoc = document.getElementById('barChartLoc').getContext('2d');

    // Create Bar Graph Chart for First 25 Distinct Loc
    var barChartLoc = new Chart(ctxLoc, {
        type: 'bar',
        data: {
            labels: chartDataLoc.locNames,
            datasets: [{
                label: 'Total Cases',
                backgroundColor: 'olive',
                data: chartDataLoc.totalCasesLoc,
            }, {
                label: 'Total Deaths',
                backgroundColor: 'orangered',
                data: chartDataLoc.totalDeathsLoc,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true,
                },
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Total Cases and Deaths for First 25 Distinct Loc (1-25)'
                }
            }
        }
    });
});

//By 25 locations cases ----------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
    // Get chart data for the bar graph from PHP
    var chartDataLocNext25 = <?php echo $chartJsonLocNext25; ?>;

    // Get canvas element for the bar graph
    var ctxLocNext25 = document.getElementById('barChartLocNext25').getContext('2d');

    // Create Bar Graph Chart for Next 25 Distinct Loc
    var barChartLocNext25 = new Chart(ctxLocNext25, {
        type: 'bar',
        data: {
            labels: chartDataLocNext25.locNamesNext25,
            datasets: [{
                label: 'Total Cases',
                backgroundColor: 'olive',
                data: chartDataLocNext25.totalCasesLocNext25,
            }, {
                label: 'Total Deaths',
                backgroundColor: 'orangered',
                data: chartDataLocNext25.totalDeathsLocNext25,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true,
                },
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Total Cases and Deaths for Next 25 Distinct Loc (26-50)'
                }
            }
        }
    });
});


//51-75 loc data cases and deaths-----------------------------------------------------------------------------------

document.addEventListener("DOMContentLoaded", function () {
    // Get chart data for the bar graph from PHP
    var chartDataLocNext51 = <?php echo $chartJsonLocNext51; ?>;

    // Get canvas element for the bar graph
    var ctxLocNext51 = document.getElementById('barChartLocNext51').getContext('2d');

    // Create Bar Graph Chart for Next 25 Distinct Loc (51-75)
    var barChartLocNext51 = new Chart(ctxLocNext51, {
        type: 'bar',
        data: {
            labels: chartDataLocNext51.locNamesNext51,
            datasets: [{
                label: 'Total Cases',
                backgroundColor: 'olive',
                data: chartDataLocNext51.totalCasesLocNext51,
            }, {
                label: 'Total Deaths',
                backgroundColor: 'orangered',
                data: chartDataLocNext51.totalDeathsLocNext51,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true,
                },
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Total Cases and Deaths for Next 25 Distinct Loc (51-75)'
                }
            }
        }
    });
});

//75-100 data loc
document.addEventListener("DOMContentLoaded", function () {
    // Get chart data for the bar graph from PHP
    var chartDataLocNext71 = <?php echo $chartJsonLocNext71; ?>;

    // Get canvas element for the bar graph
    var ctxLocNext71 = document.getElementById('barChartLocNext71').getContext('2d');

    // Create Bar Graph Chart for Next 30 Distinct Loc (71-100)
    var barChartLocNext71 = new Chart(ctxLocNext71, {
        type: 'bar',
        data: {
            labels: chartDataLocNext71.locNamesNext71,
            datasets: [{
                label: 'Total Cases',
                backgroundColor: 'olive',
                data: chartDataLocNext71.totalCasesLocNext71,
            }, {
                label: 'Total Deaths',
                backgroundColor: 'orangered',
                data: chartDataLocNext71.totalDeathsLocNext71,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true,
                },
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Total Cases and Deaths for Next 30 Distinct Loc (71-100)'
                }
            }
        }
    });
});

//last 26----------------------------------------------------------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
    // Get chart data for the bar graph from PHP
    var chartDataLocLast101 = <?php echo $chartJsonLocLast101; ?>;

    // Get canvas element for the bar graph
    var ctxLocLast101 = document.getElementById('barChartLocLast101').getContext('2d');

    // Create Bar Graph Chart for Last 26 Distinct Loc (101-126)
    var barChartLocLast101 = new Chart(ctxLocLast101, {
        type: 'bar',
        data: {
            labels: chartDataLocLast101.locNamesLast101,
            datasets: [{
                label: 'Total Cases',
                backgroundColor: 'olive',
                data: chartDataLocLast101.totalCasesLocLast101,
            }, {
                label: 'Total Deaths',
                backgroundColor: 'orangered',
                data: chartDataLocLast101.totalDeathsLocLast101,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true,
                },
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Total Cases and Deaths for Last 26 Distinct Loc (101-126)'
                }
            }
        }
    });
});

//cases and deaths each of the month_-------------------------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
    // Get chart data for the radar chart from PHP
    var chartDataRadar = <?php echo $chartJsonRadar; ?>;

    // Get canvas element for the radar chart
    var ctxRadar = document.getElementById('radarChart').getContext('2d');

    // Create Radar Chart
    var radarChart = new Chart(ctxRadar, {
        type: 'radar',
        data: {
            labels: chartDataRadar.months,
            datasets: [{
                label: 'Total Cases',
                borderColor: 'skyblue',
                backgroundColor: 'rgba(135, 206, 235, 0.2)',
                data: chartDataRadar.totalCasesRadar,
            }, {
                label: 'Total Deaths',
                borderColor: 'red',
                backgroundColor: 'rgba(255, 0, 0, 0.2)',
                data: chartDataRadar.totalDeathsRadar,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                r: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Sum of Cases and Deaths by Month'
                }
            }
        }
    });
});

//Region count cities----------------------------------------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
    // Get pie chart data from PHP
    var chartDataPie = <?php echo $chartJsonPie; ?>;

    // Get canvas element
    var ctxPie = document.getElementById('pieChart').getContext('2d');

    // Create Pie Chart
    var pieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: chartDataPie.regionPie,
            datasets: [{
                data: chartDataPie.locCountPie,
                backgroundColor: [
                    'red',
                    'blue',
                    'green',
                    'palegreen',
                    'orange',
                    'palevioletred',
                    'saddlebrown',
                    'seagreen',
                    'salmon',
                    'silver',
                    'tan',
                    'tomato',
                    'violet',
                    'yellowgreen',
                    'antiquewhite',
                    'coral',
                    'brown',
                    // Add more colors as needed
                ],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: true,
                position: 'right',
            },
            title: {
                display: true,
                text: 'Distinct Loc Count by Region',
            },
        }
    });
});

//sum of cases by region ------------------------------------------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
    // Get line chart data from PHP
    var chartDataLine = <?php echo $chartJsonLine; ?>;

    // Get canvas element
    var ctxLine = document.getElementById('lineChartRegion').getContext('2d');

    // Create Line Chart with Shaded Area
    var lineChartRegion = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: chartDataLine.regionsLine,
            datasets: [{
                label: 'Cases',
                borderColor: 'skyblue',
                backgroundColor: 'rgba(135, 206, 235, 0.2)',
                data: chartDataLine.casesLine,
                pointRadius: 5,
                pointHoverRadius: 8,
                fill: true, // Enable fill for the area beneath the line
            }, {
                label: 'Deaths',
                borderColor: 'chocolate',
                backgroundColor: 'rgba(255, 165, 0, 0.2)',
                data: chartDataLine.deathsLine,
                pointRadius: 5,
                pointHoverRadius: 10,
                fill: true, // Enable fill for the area beneath the line
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    type: 'category',
                    labels: chartDataLine.regionsLine,
                },
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Sum of Cases and Deaths by Region'
                }
            }
        }
    });
});

</script>

</body>

</html>

</body>
</html>