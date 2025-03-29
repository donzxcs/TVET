<?php
include "conn.php";
session_start();
if(!isset($_SESSION['sessionID'])){
include "index.php";
}else{
    $loggedInID = $_SESSION['sessionID'];
    $fetchUserInfoStatement = "SELECT * FROM `user_info` WHERE `user_id` = $loggedInID";
    $fetchUserQuery = mysqli_query($conn, $fetchUserInfoStatement);
    $sessionData = mysqli_fetch_array($fetchUserQuery);

        $sessionNameFirst = $sessionData['name_given'];
        $sessionNameLast = $sessionData['name_family'];
        $testID = $_GET['updateid'];
            echo $testID;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <h1>Update</h1>
    <form action="process.php" method="POST">
        <label>Name</label>
        <input type="text" name="name" placeholder="Enter Name" required></p>

        <label>Password</label>
        <input type="password" name="pass" placeholder="Enter Password" required></p>

        <label>Student ID</label>
        <input type="text" name="student_id" placeholder="Enter Student ID" required></p>

        <label>Given Name</label>
        <input type="text" name="gname" placeholder="Enter Given Name" required></p>

        <label>Middle Name</label>
        <input type="text" name="mname" placeholder="Enter Middle Name" required></p>

        <label>Family Name</label>
        <input type="text" name="fname" placeholder="Enter Family Name" required></p>

        <input type="hidden" name="updateid" value="28">


        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
<?php
}
?>

