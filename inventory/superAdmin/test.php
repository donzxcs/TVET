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
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#logs"
                        aria-expanded="false">
                        <i class="fas fa-file-alt pe-2"></i> Logs
                    </a>
                    <ul id="logs" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#master-item-logs" aria-expanded="false">
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
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#tools-equipments-logs" aria-expanded="false">
                                Tools & Equipments Logs
                            </a>
                            <ul id="tools-equipments-logs" class="sidebar-sub-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="displayLogsItem.php" class="sidebar-link">View Tools & Equipments Logs</a>
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
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                List of Data Logs

                                    <button type="button" style="float:right;" class="btn btn-primary editbtn" data-bs-toggle="modal" data-bs-target="#editItemModal-<?php echo $id111; ?>"><i class="fas fa-edit"></i></button>

                                    <div class="modal fade" id="editItemModal-<?php echo $id111; ?>"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h3 class="modal-title text-white" style="font-weight: bold;"
                                                        id="staticBackdropLabel">
                                                        Audit Action</h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-----------------------------FORM USER MODAL--------------------------------->
                                                    <form action="process.php" method="POST">

                                                        <input type="hidden" name="logID"
                                                            value="<?php echo $row['log_id']; ?>">

                                                        <input type="hidden" name="userID"
                                                            value="<?php echo $loggedInID; ?>">

                                                            <div class="input-group"
                                                            style="border: 2px solid; padding: 1px;">
                                                            <div class="input-group-text bg-primary text-white">
                                                                <i class="bi bi-person-check-fill"></i>
                                                            </div>
                                                            <input type="text" class="form-control" name="borrower"
                                                                placeholder="Name of the Borrower:"
                                                             required>
                                                        </div><br>

                                                            <div class="input-group"
                                                            style="border: 2px solid; padding: 1px;">
                                                            <div class="input-group-text bg-primary text-white">
                                                                <i class="bi bi-person-check-fill"></i>
                                                            </div>
                                                            <select type="text" class="form-control" name="compParts" placeholder="Part Name:">
                                                                <?php
                                                                $option_select ="SELECT * FROM `category`";
                                                                $query = mysqli_query($conn, $option_select);
                                                                while($category =mysqli_fetch_array($query)){
                                                                ?>
                                                                <option value="<?php echo $category['label']; ?>">
                                                                                <?php echo $category['label']; ?>
                                                                </option>
                                                                <?php  }   ?>
                                                            </select>
                                                            </div><br>
                                                        <div class="input-group"
                                                            style="border: 2px solid; padding: 1px;">
                                                            <div class="input-group-text bg-primary text-white">
                                                                <i class="bi bi-person-check-fill"></i>
                                                            </div>
                                                            <input type="text" class="form-control" name="qty23"
                                                                placeholder="Enter Quantity"
                                                             required>
                                                        </div><br>
                                                        <div class="input-group"
                                                            style="border: 2px solid; padding: 1px;">
                                                            <div class="input-group-text bg-primary text-white">
                                                                <i class="bi bi-envelope-arrow-up-fill"></i>
                                                            </div>
                                                            <select type="text" class="form-control" name="actionAudit"
                                                                placeholder="Type:">
                                                                <?php
                                                                        $option_select ="SELECT * FROM `log_action_category`";
                                                                            $query = mysqli_query($conn, $option_select);
                                                                            while($category =mysqli_fetch_array($query)){
                                                                                ?>
                                                                <option value="<?php echo $category['label'];?>">
                                                                    <?php echo $category['label']; ?>
                                                                </option>
                                                                <?php  }   ?>
                                                            </select>
                                                        </div><br>

                                                        <div class="input-group"
                                                            style="border: 2px solid; padding: 1px;">
                                                            <div class="input-group-text bg-primary text-white">
                                                                <i class="bi bi-person-check-fill"></i>
                                                            </div>
                                                            <input type="text" class="form-control" name="qty23"
                                                                placeholder="Remarks:"
                                                             required>
                                                        </div><br>
                                                        <div class="modal-footer">
                                                            <input type="button" class="btn btn-secondary btn-lg "
                                                                value="Cancel">
                                                            <input type="submit" name="auditAction"
                                                                class="btn btn-success btn-lg" value="Audit">
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                        </div>
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Personnel Incharge</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Names</th>
                                    <th scope="col">Date Time Added</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Contact Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $logdisplay = "SELECT * FROM `logs_info_master` t1 
                                 INNER JOIN `user_info` t2 ON t1.`user_id` = t2.`user_id` 
                                 INNER JOIN `master_item` t3 ON t1.`item_id` = t3.`item_id` 
                                 INNER JOIN `log_action_category` t4 ON t1.`category_id` = t4.`id`";
                     
                                 
                                 $logresult = mysqli_query($conn, $logdisplay);
                                 if($logresult){
                                     while($row = mysqli_fetch_array($logresult)){
                                         $id111 = $row['log_id'];
                                         $qty = $row ['quantity'];
                                         $relevantName = $row ['relevant_names'];
                                         $department = $row ['department'];
                                         $contactNumber = $row ['contact_number'];
                                         $logEmail = $row ['contact_email'];
                                         $time_date_added = $row ['date_time'];
                                         $userID = $row ['user_id'];
                                         $itemID = $row ['item_id'];
                                         $categoryID = $row ['category_id'];
                     
                                         $toolName = $row['part_name'];
                                         $categoryLabel = $row['label'];
                                         $name_given = $row['name_given'];
                                         $name_family = $row['name_family'];
                     
                                         echo '<tr>
                                         <td>'.$name_given.' '.$name_family.'</td>
                                         <td>'.$toolName.'</td>
                                         <td>'.$qty.'</td>
                                         <td>'.$categoryLabel.'</td>
                                         <td>'.$relevantName.'</td>
                                         <td>'.date("m-d-Y H:i A",$time_date_added).'</td>
                                         <td>'.$department.'</td>
                                         <td>'.$contactNumber.'</td>
                                         <td>'.$logEmail.'</td>';
                                         ?>
                                            
                                </tr>
                                
                                <?php
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