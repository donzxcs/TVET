<?php
include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Item</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Brand Name</th>
                <th>Model</th>
                <th>Type</th>
                <th>Serial Number</th>
                <th>Time Date Added</th>
                <th>Date of Update</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $itemdisplay = "SELECT * FROM `master_item`";
            $itemresult = mysqli_query($conn, $itemdisplay);
            if($itemresult){
                while($row = mysqli_fetch_assoc($itemresult)){
                    $id = $row['item_id'];
                    $brandname = $row['item_brand'];
                    $model = $row['model'];
                    $type = $row['type'];
                    $serial_number = $row['serial_number'];
                    $time_date_added = $row['time_date_added'];
                    $item_update = $row['date_update'];

                    echo '<tr>
                    <th>'.$id.'</th>
                    <td>'.$brandname.'</td>
                    <td>'.$model.'</td>
                    <td>'.$type.'</td>
                    <td>'.$serial_number.'</td>
                    <td>'.date("m-d-Y h:i:s A",$time_date_added).'</td>
                    <td>'.date("m-d-Y h:i:s A",$item_update).'</td>
                    <td>
                    <button><a href="itemupdate.php?itemupdateid='.$id.'">Update</a></button>
                    <button><a href="itemdelete.php?itemdeleteid='.$id.'">Delete</a></button>
                    </td>
                    </tr>';
                }
            }
            
            ?>
            
        </tbody>
    </table>
    
</body>
</html>