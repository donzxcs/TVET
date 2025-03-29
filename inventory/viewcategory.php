<?php
include 'conn.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Category</title>
</head>
<body>
    <table>
        <thead>
        <tr>
            <th>#<th>
            <th>Label</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $labeldisplay = "SELECT * FROM `category`";
        $LabelResult = mysqli_query($conn, $labeldisplay);
        if($LabelResult){
            while($row = mysqli_fetch_assoc($LabelResult)){
                $id = $row['id'];
                $label = $row['label'];

                echo '<tr>
                <th>'.$id.'</th>
                <td>'.$label.'</td>
                <td>
                <button><a href="labelupdate.php?labelupdateid='.$id.'">Update</a></button>
                <button><a href="labeldelete.php?labeldeleteid='.$id.'">Delete</a></button>
                </td>
                </tr>';

            }
        }
        ?>
        </tbody>
    </table>
</body>
</html>