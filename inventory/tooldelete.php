<?php
    include 'conn.php';

    if(isset($_GET['tooldelete'])){
        $id = $_GET['tooldelete'];

        $deletetool = "DELETE FROM `tool_item` WHERE tool_id=$id";
        $result = mysqli_query($conn, $deletetool);
        echo '<script>
        alert("Label Deleted Successfully");
        window.location.href="viewtool.php";
        </script>';
    }

?>