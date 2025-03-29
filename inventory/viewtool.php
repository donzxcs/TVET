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
                <th>Tool ID</th>
                <th>Quantity</th>
                <th>Tool Description</th>
                <th>Tool Name</th>
                <th>Status</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $itemdisplay = "SELECT * FROM `tool_item`";
            $itemresult = mysqli_query($conn, $itemdisplay);
            if($itemresult){
                while($row = mysqli_fetch_assoc($itemresult)){
                    $id = $row['tool_id'];
                    $qty = $row['qty'];
                    $description = $row['tool_description'];
                    $toolName = $row['tool_name'];
                    $toolStatus = $row['tool_status'];

                    echo '<tr>
                    <th>'.$id.'</th>
                    <td>'.$qty.'</td>
                    <td>'.$description.'</td>
                    <td>'.$toolName.'</td>
                    <td>'.$toolStatus.'</td>
                    <td>
                    <button><a href="toolupdate.php?toolupdate='.$id.'">Update</a></button>
                    <button><a href="tooldelete.php?tooldelete='.$id.'">Delete</a></button>
                    </td>
                    </tr>';
                }
            }
            
            ?>
            
        </tbody>
    </table>
    
</body>
</html>