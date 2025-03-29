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
                        <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#logs" aria-expanded="false">
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
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-2">
                                                Total of Items
                                            </h4>
                                            <p class="mb-2">
                                                Audit
                                            </p>
                                            <div class="mb-0">
                                                <span class="badge text-success me-2">
                                                <?php
                                                $count = mysqli_query($conn, "SELECT * FROM `master_item`");
                                                $count_display = mysqli_num_rows($count);
                                                echo $count_display;
                                                ?>
                                                </span>
                                                <span class="text-muted">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                List of Items Listed <div class="container nt-4">
                            <button type="submit" class="btn btn-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#add">Add Item</button>
                            <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="process.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="userID"
                                            value="<?php echo $loggedInID; ?>">

                                    <input type="hidden" name="qty1"
                                            value="<?php echo $qty; ?>">

                                    <div class="mb-3">
                                        <label class="form-label">Brand Name</label>
                                        <input type="text" class="form-control" name="brand_name" placeholder="Enter Brand Name" required></p>
                                    </div>
                                        <label class="mb-3">Model</label>
                                        <input type="text" class="form-control" name="model" placeholder="Enter Model" required></p>

                                        <div class="mb-1">
                                            <label>Part Name</label></p>
                                        <select type="text" class="form-control" name="partName"
                                            placeholder="Part Name:">
                                            <?php
                                        $option_select ="SELECT * FROM `category`";
                                        $query = mysqli_query($conn, $option_select);
                                        while($category =mysqli_fetch_array($query)){
                                            ?>
                                        <option value="<?php echo $category['label'];?>">
                                        <?php echo $category['label']; ?>
                                        </option>
                                <?php  }   ?>
                                     </select>
                                </div><br>

                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <input type="text" class="form-control" name="snumber" placeholder="Enter Serial Number" required></p>
                                    </div>
                                    <div class="mb-1">
                                            <label>Status</label></p>
                                        <select type="text" class="form-control" name="status"
                                            placeholder="Status">
                                            <?php
                                            $option_select ="SELECT * FROM `item_condition`";
                                            $query = mysqli_query($conn, $option_select);
                                            while($category =mysqli_fetch_array($query)){
                                                ?>
                                            <option value="<?php echo $category['label'];?>">
                                                           <?php echo $category['label'];?>
                                             </option>
                                            <?php  }  ?>
                                        </select>
                                </div><br>
                                    <button type="button" class="btn btn-danger" name="clear">Close</button>
                                    <input type="submit" class="btn btn-primary" name="add_item" value="Add Item">
                                    </form>
                                            </div>
                                    </div>
                                    </div>
                                </div>
                            </h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Brand Name</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Serial Number</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Time Date Added</th>
                                        <th scope="col">Date of Update</th>
                                        <th scope="col">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $itemdisplay = "SELECT * FROM `master_item`";
                                $itemresult = mysqli_query($conn, $itemdisplay);
                                if($itemresult){
                                    while($row = mysqli_fetch_assoc($itemresult)){
                                        $id = $row['item_id'];
                                        $qty = $row['quantity_p'];
                                        $brandname = $row['item_brand'];
                                        $model = $row['model'];
                                        $type = $row['part_name'];
                                        $serial_number = $row['description'];
                                        $status = $row['part_status'];
                                        $time_date_added = $row['time_date_added'];
                                        $item_update = $row['date_update'];
                                        
                                        echo '<tr>
                                        <th>'.$id.'</th>
                                        <td>'.$qty.'</td>
                                        <td>'.$brandname.'</td>
                                        <td>'.$model.'</td>
                                        <td>'.$type.'</td>
                                        <td>'.$serial_number.'</td>
                                        <td>'.$status.'</td>
                                        <td>'.date("m-d-Y h:i A",$time_date_added).'</td>
                                        <td>'.date("m-d-Y h:i A",$item_update).'</td>
                                        <td>
                                        <button type="button" class="btn btn-primary editbtn" data-bs-toggle="modal" data-bs-target="#editItemModal-'.$id.'"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger editbtn" data-bs-toggle="modal" data-bs-target="#deleteItemModal-'.$id.'"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                        </tr>';

                                        ?>
                                    <!-----------------------------Update Item Modal--------------------------------->
                                        <div class="modal fade" id="editItemModal-<?php echo $id; ?>"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h3 class="modal-title text-white" style="font-weight: bold;"
                                                        id="staticBackdropLabel">
                                                        Update Item</h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-----------------------------FORM USER MODAL--------------------------------->
                                                    <form action="process.php" method="POST">

                                                        <input type="hidden" name="itemupdateid"
                                                            value="<?php echo $row['item_id']; ?>">
                                                        <div class="input-group"
                                                            style="border: 2px solid; padding: 1px;">
                                                            <div class="input-group-text bg-primary text-white">
                                                                <i class="bi bi-person-circle"></i>
                                                            </div>
                                                            <input type="text" class="form-control" name="brand_name"
                                                                placeholder="Brand Name:" value="<?php echo $brandname; ?>" required>
                                                        </div><br>
                                                        <div class="input-group"
                                                            style="border: 2px solid; padding: 1px;">
                                                            <div class="input-group-text bg-primary text-white">
                                                                <i class="bi bi-person-check-fill"></i>
                                                            </div>
                                                            <input type="text" class="form-control" name="model"
                                                                placeholder="Model:"
                                                                value="<?php echo $model; ?>" required>
                                                        </div><br>
                                                        <div class="input-group"
                                                            style="border: 2px solid; padding: 1px;">
                                                            <div class="input-group-text bg-primary text-white">
                                                                <i class="bi bi-envelope-arrow-up-fill"></i>
                                                            </div>
                                                            <select type="text" class="form-control" name="type"
                                                                placeholder="Type:">
                                                                    <?php
                                                                    $option_select ="SELECT * FROM `category`";
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
                                                                <i class="bi bi-lock-fill"></i>
                                                            </div><br>
                                                            <input type="text" class="form-control" name="snumber"
                                                                placeholder="Serial Number:"
                                                                value="<?php echo $serial_number; ?>" required>
                                                        </div><br>

                                                        <div class="modal-footer">
                                                            <input type="reset" class="btn btn-secondary btn-lg "
                                                                value="Cancel">
                                                            <input type="submit" name="update_item"
                                                                class="btn btn-success btn-lg" value="Save Update">
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                          </div>
                                          <div class="modal fade" id="deleteItemModal-<?php echo $id; ?>"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h3 class="modal-title text-white" style="font-weight: bold;"
                                                        id="staticBackdropLabel">
                                                        Remove this Item?</h3>
                                                        
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="process.php" method="POST">
                                                <input type="hidden" name="item_id"
                                                            value="<?php echo $row['item_id']; ?>">
                                                    
                                                <div class="modal-footer">
                                                            <input type="reset" class="btn btn-secondary btn-lg "
                                                                value="Cancel">
                                                            <input type="submit" name="itemDeleteID"
                                                                class="btn btn-danger btn-lg" value="Remove Item">
                                                        </div>    
                                        </div>
                                        </form>
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
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
<?php
}
?> 