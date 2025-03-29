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
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                            List of Return Items & Tools
                                </div>
                            </h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Personnel Incharge</th>
                                    <th scope="col">Item ID</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Category ID</th>
                                    <th scope="col">Names</th>
                                    <th scope="col">Date Time</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Contact Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $logdisplay = "SELECT * FROM `logs_info` t1 
                                 INNER JOIN `user_info` t2 ON t1.`user_id` = t2.`user_id` 
                                 INNER JOIN `tool_item` t3 ON t1.`item_id` = t3.`tool_id` 
                                 INNER JOIN `log_action_category` t4 ON t1.`category_id` = t4.`id`
                                 WHERE t1.`category_id`='3'";
                     
                                 
                                 $logresult = mysqli_query($conn, $logdisplay);
                                 if($logresult){
                                     while($row = mysqli_fetch_assoc($logresult)){
                                         $qty = $row ['quantity'];
                                         $relevantName = $row ['relevant_names'];
                                         $department = $row ['department'];
                                         $contactNumber = $row ['contact_number'];
                                         $logEmail = $row ['contact_email'];
                                         $time_date_added = $row ['date_time'];
                                         $userID = $row ['user_id'];
                                         $itemID = $row ['item_id'];
                                         $categoryID = $row ['category_id'];
                     
                                         $toolName = $row['tool_name'];
                                         $categoryLabel = $row['label'];
                                         $name_given = $row['name_given'];
                                         $name_family = $row['name_family'];
                     
                                         echo '<tr>
                                         <th>'.$name_given.' '.$name_family.'</th>
                                         <td>'.$toolName.'</td>
                                         <td>'.$qty.'</td>
                                         <td>'.$categoryLabel.'</td>
                                         <td>'.$relevantName.'</td>
                                         <td>'.date("m-d-Y h:i A",$time_date_added).'</td>
                                         <td>'.$department.'</td>
                                         <td>'.$contactNumber.'</td>
                                         <td>'.$logEmail.'</td>
                                         </tr>';
                                     }
                                 }
                                 
                                 ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
<?php
}
?> 