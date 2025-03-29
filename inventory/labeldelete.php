<?php
    include 'conn.php';

    if(isset($_GET['labeldeleteid'])){
        $id = $_GET['labeldeleteid'];

        $deletelabel = "DELETE FROM  `category` WHERE id=$id";
        $result = mysqli_query($conn, $deletelabel);
        echo '<script>
        alert("Label Deleted Successfully");
        window.location.href="viewcategory.php";
        </script>';
    }

?>