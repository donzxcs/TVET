<?php $catID = $_GET['labelupdateid']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Label Update</title>
</head>
<body>
    <form action="process.php" method="POST">
        <label>Label</label>
        <input type="text" name="category" placeholder="Add Label"></p>

        <input type="hidden" name="labelupdateid" value="<?php echo $catID; ?>">

        <input type="submit" name="LabelUpdate" value="Update">        
    </form>
    
</body>
</html>