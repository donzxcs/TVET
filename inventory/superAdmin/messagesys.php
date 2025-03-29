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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
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
                    <h4 style="color: white;">Welcome Back, SuperAdmin</h4>
                    <p class="mb-0" style="color: white;">SuperAdmin Dashboard, UI-TVET CSS AUDIT</p>
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
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#logs" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="fas fa-file-alt pe-2"></i> Logs
                        </a>
                        <ul id="logs" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#master-item-logs" aria-expanded="false">
                                    Computer Parts Logs
                                </a>
                                <ul id="master-item-logs" class="sidebar-sub-dropdown list-unstyled collapse">
                                    <li class="sidebar-item">
                                        <a href="logsComputerParts.php" class="sidebar-link">View Computer Parts Logs</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="borrowComputerParts.php" class="sidebar-link">Borrowed</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="returnComputerParts.php" class="sidebar-link">Returned</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="disposeComputerParts.php" class="sidebar-link">Dispose</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#tools-equipments-logs" aria-expanded="false">
                                    Tools & Equipments Logs
                                </a>
                                <ul id="tools-equipments-logs" class="sidebar-sub-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="displayLogs.php" class="sidebar-link">View Tools & Equipments Logs</a>
                                </li>
                                    <li class="sidebar-item">
                                        <a href="borrow.php" class="sidebar-link">Borrowed</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="return.php" class="sidebar-link">Returned</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="dispose.php" class="sidebar-link">Dispose</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
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
                    <div class="row">
                        <div class="container">
                        <?php
                            $loggedInID = $_SESSION['sessionID'];
                            ?>   
                        <?php
                            $msg = mysqli_query ($conn, "SELECT * FROM `msg_posts` `t1` INNER JOIN `user_info` `t2` ON `t1`.`user_id` = `t2`.`user_id`"); //ari ang query
                            $result = mysqli_num_rows($msg); //ang muni, para lang mag-isip kung pila kabilog ang data
                            
                            if($result > 0){
                                while($row = mysqli_fetch_assoc($msg)){
                                ?>
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="card chat-app">
                                        </div>
                                        <div class="chat">
                                            </div>
                                            <div class="chat-history">
                                                <ul class="m-b-0">
                                                    <li class="clearfix">
                                                        <div class="message other-message float-right"><?php echo $row['name_given'] . ":" .$row['msg']; ?></div>
                                                    </li>
                                                    <li class="clearfix">
                                                        <div class="message-data">
                                                            <span class="message-data-time"><?php echo date("m-d-Y h:i A", $row['msg_date']); ?></span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php
                            }
                            ?>
                                                    <form action="process.php" method="POST">
                                            <div class="chat-message clearfix">
                                                <div class="input-group mb-0">
                                                <textarea name="msg" placeholder="Type your message here..." class="form-control" required></textarea></p>
                                                <input type="hidden" name="send" value="<?php echo $loggedInID?>"> 
                                                        <div class="input-group-prepend">
                                                        <input type="submit" name="send_message" class="input-group-text" value="Send">
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                            <?php
                            }
                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                
        </div>
        </main>
        <footer class="footer">
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <p class="mb-0">
                            <a href="#" class="text-muted">
                                <strong>UI-TVET</strong>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
<?php
}
?>