<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reg_style.css">
    <title>Register</title>
</head>
<body>
<div class="container">
    <h1 class="form-title">Create an Account</h1>
    <form action="process.php" method="POST">

    <div class="main-user-info">
    <div class="user-input-box">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter Email" required></p>
    </div>

    <div class="user-input-box">
        <label>Name</label>
        <input type="text" name="name" placeholder="Enter Name" required></p>
    </div>

    <div class="user-input-box">
        <label>Password</label>
        <input type="password" name="pass" placeholder="Enter Password" required></p>
    </div>
    <div class="user-input-box">
        <label>Student ID</label>
        <input type="text" name="student_id" placeholder="Enter Student ID" required></p>
    </div>
    <div class="user-input-box">
        <label>Given Name</label>
        <input type="text" name="gname" placeholder="Enter Given Name" required></p>
    </div>
    <div class="user-input-box">
        <label>Middle Name</label>
        <input type="text" name="mname" placeholder="Enter Middle Name" required></p>
    </div>
    <div class="user-input-box">
        <label>Family Name</label>
        <input type="text" name="fname" placeholder="Enter Family Name" required></p>
    </div>
</div>
<div class="form-submit-btn">
        <a href="loginpage.php">Back</a>
        <input type="submit" name="register" value="Register">
</div>
    </form>
</div>
</body>
</html>