<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="process.php" method="POST">

        <Label>Brand Name</Label><br>
        <input type="text" name="brand_name" placeholder="Brand Name" required>

        <label>Model</label><br>
        <input type="text" name="model" placeholder="Model Type" required>

        <label>Part Name</label></p>
        <select type="text" class="form-control" name="type"
           placeholder="Part Name">
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
        <label>Description</label></p>
        <input type="text" name="description" placeholder="Description" required>

        <label>Status</label>
        

    </form>
    
</body>
</html>