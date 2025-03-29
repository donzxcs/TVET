<?php
session_start();

session_destroy();

echo'<script>
    alert("Logout");
    window.location.href="../loginpage.php";
</script>';
?>
