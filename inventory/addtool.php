<?php
include "conn.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tool</title>
</head>
<body>
    <h1>Add Tool</h1>
    <form action="process.php" method="POST">
        <Label>Quantity</Label>
        <input type="text" name="qty" placeholder="Quantity" required><p>

        <label>Tool Name</label>
        <input type="text" name="toolName" placeholder="Tool Name" required><p>

        <label>Tool Status</label>
        <select name="toolStatus">
        <?php
        $option_select ="SELECT * FROM `item_condition`";
            $query = mysqli_query($conn, $option_select);
            while($category =mysqli_fetch_array($query)){
                ?>
    <option value="<?php echo $category['label'];?>">
                    <?php echo $category['label'];?>
            </option>
    <?php  }  ?> 
    </select><p>

        <label>Tool Description</label>
        <input type="text" name="toolDescription" placeholder="Description of a Tool" required><br/>

        <input type="hidden" name="userID" value="<?php echo $userID; ?>">

        <input type="submit" name="toolSubmit" value="Add Tool">
    </form>
    
</body>
</html>