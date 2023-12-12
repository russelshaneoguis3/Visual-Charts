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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITD-112</title>

    <!-- CSS Style -->
    <link rel="stylesheet" type="text/css" href="index.css">

    <link href="mozkitow.png" rel="icon">
    <link href="mozkitow.png" rel="apple-touch-icon">

    <!-- Bootstrap Style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="chart.js"></script>
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

<!-- Line Chart Container -->
<div class="container mt-5">
    <canvas id="lineChart" width="800" height="400"></canvas>
</div>

<div class="container mt-5">
    <canvas id="barChartLoc" width="800" height="400"></canvas>
</div>

<!-- Bar Graph Chart Container for Next 25 Distinct Loc -->
<div class="container mt-5">
    <canvas id="barChartLocNext25" width="800" height="400"></canvas>
</div>

<!-- Bar Graph Chart Container for Next 25 Distinct Loc (51-75) -->
<div class="container mt-5">
    <canvas id="barChartLocNext51" width="800" height="400"></canvas>
</div>

<!-- Bar Graph Chart Container for Next 30 Distinct Loc (71-100) -->
<div class="container mt-5">
    <canvas id="barChartLocNext71" width="800" height="400"></canvas>
</div>

<!-- Bar Graph Chart Container for Last 26 Distinct Loc (101-126) -->
<div class="container mt-5">
    <canvas id="barChartLocLast101" width="800" height="400"></canvas>
</div>

<!-- Radar Chart Container -->
<div class="container mt-5">
    <canvas id="radarChart" width="800" height="400"></canvas>
</div>

<!-- Pie Chart Container for all the region counts -->
<div class="container mt-5">
    <canvas id="pieChart" width="400" height="400"></canvas>
</div>

<!-- Line Chart Container for Region Data -->
<div class="container mt-5">
    <canvas id="lineChartRegion" width="800" height="400"></canvas>
</div>

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
                    text: 'Total Cases and Deaths for First 25 Distinct Loc'
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
