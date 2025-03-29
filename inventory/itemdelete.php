<?php
include "conn.php";

if(isset($_GET['itemdeleteid'])){
   $id = $_GET['itemdeleteid'];

   $itemdelete = "DELETE FROM `master_item` WHERE `item_id`=$id";
   $result =mysqli_query($conn, $itemdelete);
   echo '<script>
   alert("Item Deleted Successfully");
   window.location.href="viewitem.php";
   </script>';
}
?>