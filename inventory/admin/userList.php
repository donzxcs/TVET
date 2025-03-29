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
                    <div class="mb-3">
                    </div>
                    <div class="row">

                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-2">
                                                Total of Secretaries
                                            </h4>
                                            <p class="mb-2">
                                                Registered
                                            </p>
                                            <div class="mb-0">
                                                <span class="badge text-success me-2">
                                                    <?php
                                                $count = mysqli_query($conn, "SELECT * FROM `user_info`");
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
                                List of Secretaries
                                <button type="submit" class="btn btn-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#add">Add User</button>

                                <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="process.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter Email" required></p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Name" required></p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="pass" placeholder="Enter Password" required></p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Student ID</label>
                                        <input type="text" class="form-control" name="student_id" placeholder="Enter Student ID" required></p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Given Name</label>
                                        <input type="text" class="form-control" name="gname" placeholder="Enter Given Name" required></p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" name="mname" placeholder="Enter Middle Name" required></p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Family Name</label>
                                        <input type="text" class="form-control" name="fname" placeholder="Enter Family Name" required></p>
                                    </div>
                                    <button type="button" class="btn btn-danger" name="clear">Close</button>
                                    <button type="submit" class="btn btn-primary" name="register">Register</button>
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
                                        <th scope="col">#</th>
                                        <th scope="col">Student ID</th> 
                                        <th scope="col">Given Name</th>
                                        <th scope="col">Middle Name</th>
                                        <th scope="col">Family Name</th>
                                        <th scope="col">Date Created</th>
                                        <th scope="col">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $display = "SELECT * FROM `users` `t1` INNER JOIN `user_info` `t2` ON `t1`.`user_id`=`t2`.`user_id`;";

                                    $result = mysqli_query($conn, $display);
                                    if($result) {
                                        while($row = mysqli_fetch_assoc($result)){
                                        $id=$row['user_id'];
                                        $student_id=$row['student_id'];
                                        $gname=$row['name_given'];
                                        $mname=$row['name_middle'];
                                        $fname=$row['name_family'];
                                        $users_time=$row['registration_date'];
                                        
                                        echo '<tr>
                                        <th>'.$id.'</th>
                                        <td>'.$student_id.'</td>
                                        <td>'.$gname.'</td>
                                        <td>'.$mname.'</td>
                                        <td>'.$fname.'</td>
                                        <td>'.date("m-d-Y h:i:s A", $users_time).'</td>
                                        <td>
                                        <button type="button" class="btn btn-primary editbtn" data-bs-toggle="modal" data-bs-target="#editUserModal-'.$id.'"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger editbtn" data-bs-toggle="modal" data-bs-target="#deleteUser-'.$id.'"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                        </tr>';
                                        
                                        ?>

                                    <!-----------------------------Update User Modal--------------------------------->
                                    <div class="modal fade" id="editUserModal-<?php echo $id; ?>"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h3 class="modal-title text-white" style="font-weight: bold;"
                                                        id="staticBackdropLabel">
                                                        Update User Account</h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-----------------------------FORM USER MODAL--------------------------------->
                                                    <form action="process.php" method="POST">

                                                        <input type="hidden" name="updateid"
                                                            value="<?php echo $row['user_id']; ?>">
                                                        <div class="input-group"
                                                            style="border: 2px solid; padding: 1px;">
                                                            <div class="input-group-text bg-primary text-white">
                                                                <i class="bi bi-person-circle"></i>
                                                            </div>
                                                            <input type="text" class="form-control" name="student_id"
                                                                placeholder="Student ID:" value="<?php echo $student_id; ?>" required>
                                                        </div><br>
                                                        <div class="input-group"
                                                            style="border: 2px solid; padding: 1px;">
                                                            <div class="input-group-text bg-primary text-white">
                                                                <i class="bi bi-person-check-fill"></i>
                                                            </div>
                                                            <input type="text" class="form-control" name="gname"
                                                                placeholder="First Name:"
                                                                value="<?php echo $gname; ?>" required>
                                                        </div><br>
                                                        <div class="input-group"
                                                            style="border: 2px solid; padding: 1px;">
                                                            <div class="input-group-text bg-primary text-white">
                                                                <i class="bi bi-envelope-arrow-up-fill"></i>
                                                            </div>
                                                            <input type="text" class="form-control" name="mname"
                                                                placeholder="New Middle Name:"
                                                                value="<?php echo $mname; ?>" required>
                                                        </div><br>
                                                        <div class="input-group"
                                                            style="border: 2px solid; padding: 1px;">
                                                            <div class="input-group-text bg-primary text-white">
                                                                <i class="bi bi-lock-fill"></i>
                                                            </div>
                                                            <input type="text" class="form-control" name="lname"
                                                                placeholder="New Last Name:"
                                                                value="<?php echo $fname; ?>" required>
                                                        </div><br>
                                                        <div class="input-group"
                                                            style="border: 2px solid; padding: 1px;">
                                                            <div class="input-group-text bg-primary text-white">
                                                                <i class="bi bi-clipboard-check-fill"></i>
                                                            </div>
                                                            <input type="text" class="form-control" name="pass"
                                                                placeholder="New Password:"
                                                                value="<?php echo $row['password']; ?>" required>
                                                        </div><br>

                                                        <div class="modal-footer">
                                                            <input type="reset" class="btn btn-secondary btn-lg "
                                                                value="Cancel">
                                                            <input type="submit" name="update"
                                                                class="btn btn-success btn-lg" value="Save Update">
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>

                                        
                                        
                                    </div>

                                    <!-----------------------------Delete User Modal--------------------------------->
                                    <div class="modal fade" id="deleteUser-<?php echo $id; ?>"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h3 class="modal-title text-white" style="font-weight: bold;"
                                                        id="staticBackdropLabel">
                                                        Delete this User?</h3>
                                                        
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="process.php" method="POST">
                                                <input type="hidden" name="deleteid"
                                                            value="<?php echo $row['user_id']; ?>">
                                                    
                                                <div class="modal-footer">
                                                            <input type="reset" class="btn btn-secondary btn-lg "
                                                                value="Cancel">
                                                            <input type="submit" name="delete_id"
                                                                class="btn btn-danger btn-lg" value="Delete User">
                                                        </div>    
                                        </div>
                                        </form>
                                    <?php 
                                        }//Close loop          
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
</body>

</html>
<?php
}
?>