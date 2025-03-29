<?php 
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs Form</title>
</head>
<body>
    <form action="process.php" method="POST">
    <label>Item ID:</label>
    <select name="itemID">
        <?php
        $option_select ="SELECT * FROM `tool_item`";
            $query = mysqli_query($conn, $option_select);
            while($category =mysqli_fetch_array($query)){
                ?>
    <option value="<?php echo $category['tool_name'];?>">
                    <?php echo $category['tool_name'];?>
            </option>
    <?php  }  ?> 
    </select></p>

    <label>Quantity</label>
    <input type="text" name="qty" placeholder="Enter Quantity" required></p>

    <label>Category ID:</label><br>
      <input type="radio" name="categoryID" value="return">
      <label for="css">RETURN</label><br>
      <input type="radio" name="categoryID" value="borrow">
      <label for="javascript">BORROW</label><br>
      <input type="radio" name="categoryID" value="dispose">
      <label for="javascript">DISPOSE</label></p>


    <label>Relevant Name</label>
    <input type="text" name="relevantName" placeholder="Enter Name" required></p>

    <label>Department</label>
    <input type="text" name="dept" placeholder="Enter Your Department" required></p>

    <label>Contact Number</label>
    <input type="text" name="contactNumber" placeholder="Enter Contact Number" required></p>

    <label>Email</label>
    <input type="email" name="logEmail" placeholder="Enter Email" required></p>

    <input type="hidden" name="userID" value="<?php echo ['user_id'] ?>"></p>

    <input type="submit" name="submitLogs" value="Submit">
    </form>
    
</body>
</html>