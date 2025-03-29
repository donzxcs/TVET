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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th scope="col">Personnel Incharge</th>
                <th scope="col">Item ID</th>
                <th scope="col">Quantity</th>
                <th scope="col">Category ID</th>
                <th scope="col">Names</th>
                <th scope="col">Date Time</th>
                <th scope="col">Department</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Contact Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // |$logdisplay = "SELECT * FROM `logs_info` t1 
            //                     INNER JOIN `user_info` t2 ON t1.`user_id` = t2.`user_id` 
            //                     INNER JOIN `master_item` t3 ON t1.`item_id` = t3.`item_id` 
            //                     INNER JOIN `log_action_category` t4 ON t1.`category_id` = t4.`id`";

                                

            // Bale sa tool_item ta danay nga table. Kay complex gawa ang sa `master_item`
            // Wala result kagina kay damo missing nga data sa foreign key nga columns
            $logdisplay = "SELECT * FROM `logs_info` t1 
            INNER JOIN `user_info` t2 ON t1.`user_id` = t2.`user_id` 
            INNER JOIN `tool_item` t3 ON t1.`item_id` = t3.`tool_id` 
            INNER JOIN `log_action_category` t4 ON t1.`category_id` = t4.`id`";

            
            $logresult = mysqli_query($conn, $logdisplay);
            if($logresult){
                while($row = mysqli_fetch_assoc($logresult)){
                    $qty = $row ['quantity'];
                    $relevantName = $row ['relevant_names'];
                    $department = $row ['department'];
                    $contactNumber = $row ['contact_number'];
                    $logEmail = $row ['contact_email'];
                    $time_date_added = $row ['date_time'];
                    $userID = $row ['user_id'];
                    $itemID = $row ['item_id'];
                    $categoryID = $row ['category_id'];

                    $toolName = $row['tool_name'];
                    $categoryLabel = $row['label'];
                    $name_given = $row['name_given'];
                    $name_family = $row['name_family'];

                    echo '<tr>
                    <th>'.$name_given.' '.$name_family.'</th>
                    <td>'.$toolName.'</td>
                    <td>'.$qty.'</td>
                    <td>'.$categoryLabel.'</td>
                    <td>'.$relevantName.'</td>
                    <td>'.date("m-d-Y h:i A",$time_date_added).'</td>
                    <td>'.$department.'</td>
                    <td>'.$contactNumber.'</td>
                    <td>'.$logEmail.'</td>
                    </tr>';
                }
            }
            
            ?>
            
        </tbody>
    </table>
    
</body>
</html>