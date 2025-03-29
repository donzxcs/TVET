<?php
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
</head>
<body>
    <h1>Inventory</h1>
    <form action="process.php" method="POST">
        <label>Brand Name</label>
        <input type="text" name="brand_name" placeholder="Enter Brand Name" required></p>

        <label>Model</label>
        <input type="text" name="model" placeholder="Enter Model" required></p>

        <label>Type</label>
        <select name="type">
        <?php
        $option_select ="SELECT * FROM `category`";
            $query = mysqli_query($conn, $option_select);
            while($category =mysqli_fetch_array($query)){
                ?>
    <option value="<?php echo $category['label'];?>">
                    <?php echo $category['label']; ?>
    </option>
 <?php  }   ?>
 </select></p>

        <label>Serial Number</label>
        <input type="text" name="snumber" placeholder="Enter Serial Number" required></p>

        <input type="submit" name="add_item" value="Add Item">
    </form>
    
</body>
</html>