<?php

include 'conn.php';

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $delete = "DELETE from `user_info` WHERE user_id=$id";
    $result =mysqli_query($conn,$delete);
    echo'<script>
        alert("Deleted Successfully");
        window.location.href="dashboard.php";
        </script>';
}


?>