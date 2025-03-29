<?php
include "conn.php";
session_start();
if(!isset($_SESSION['sessionID'])){
    include "loginpage.php";
}else{
    $loggedInID = $_SESSION['sessionID'];
    $fetchUserInfoStatement = "SELECT * FROM `user_info` WHERE `user_id` = $loggedInID";
    $fetchUserQuery = mysqli_query($conn, $fetchUserInfoStatement);
    $sessionData = mysqli_fetch_array($fetchUserQuery);
    

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UI-TVET Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">UI-TVET CSS AUDIT</a></p>
                    <h4 style="color: white;">Welcome Back, Admin</h4>
                    <p class="mb-0" style="color: white;">Admin Dashboard, UI-TVET CSS AUDIT</p>
                </div>

                                              
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Admin Elements
                    </li>
                    <li class="sidebar-item">
                        <a href="dashboard.php" class="sidebar-link">
                            <i class="fas fa-tachometer-alt pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="userList.php" class="sidebar-link">
                            <i class="fas fa-users pe-2"></i>
                            List of User
                        </a>
                    </li>
                    <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fas fa-boxes pe-1"></i>
                            Inventory
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="itemInventory.php" class="sidebar-link">Items</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="toolsInventory.php" class="sidebar-link">Tools</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="messagesys.php" class="sidebar-link collapsed" data-bs-target="#posts"
                            aria-expanded="false"><i class="fas fa-comment pe-1"></i>
                            Messages
                        </a>
                        </li>
                        <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#logs" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fas fa-file-alt pe-2"></i>
                            Logs
                        </a>
                        <ul id="logs" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                                <a href="displayLogs.php" class="sidebar-link">View Tools & Equipments Logs</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="displayLogsItem.php" class="sidebar-link">View Master Item Logs</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="borrow.php" class="sidebar-link">Borrow</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="return.php" class="sidebar-link">Returned</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="dispose.php" class="sidebar-link">Dispose</a>
                            </li>

            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="img/logo.jpg" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Chart HTML -->
            <div class="container-fluid">
                <div class="mb-3">
                    <h1 class="mt-5">Charts</h1>
                    <div class="row">
                        <div class="col-lg-6">
                            <canvas id="myChart"></canvas>
                        </div>
                        <div class="col-lg-6">
                            <canvas id="myChart1"></canvas>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <canvas id="myChart2"></canvas>
                        </div>
                        <div class="col-lg-6">
                            <canvas id="myChart3"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>UI-TVET</strong>
                                </a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted"></a>
                    </div>
                </div>
            </footer>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Chart initialization code
            const ctx = document.getElementById('myChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Mouse', 'Keyboard', 'Monitor', 'Laptop', 'RAM', 'CPU', 'Power Supply Unit','HDD/SSD','Motherboard'],
                    datasets: [{
                        label: '# of Items Added',
                        data: [12, 19, 3, 5, 2, 3, 5, 7, 4],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const ctx1 = document.getElementById('myChart1').getContext('2d');
      new Chart(ctx1, {
        type: 'bar',
        data: {
          labels: ['Crimping Tool', 'Lan Tester', 'Screwdriver', 'Pliers', 'Wire Cutter', 'Compressed Air'],
          datasets: [{
            label: '# of Tools Added',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });

      const ctx2 = document.getElementById('myChart2').getContext('2d');
      new Chart(ctx2, {
        type: 'bar',
        data: {
          labels: ['Orange', 'Banana', 'Apple', 'Mango', 'Watermelon', 'Melon'],
          datasets: [{
            label: '# of who prefer each fruit',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });

      const ctx3 = document.getElementById('myChart3').getContext('2d');
      new Chart(ctx3, {
        type: 'bar',
        data: {
          labels: ['Orange', 'Banana', 'Apple', 'Mango', 'Watermelon', 'Melon'],
          datasets: [{
            label: '# of who prefer each fruit',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
        });
    </script>
</body>

</html>
<?php
}
?>