<?php
include "conn.php";
session_start();
if(!isset($_SESSION['sessionID'])){
    include "loginpage.php";
}else{
    $loggedInID = $_SESSION['sessionID'];
    $fetchUserInfoStatement = "SELECT * FROM `user_info` WHERE `user_id` = $loggedInID";
    $fetchUserQuery = mysqli_query($conn, $fetchUserInfoStatement);
    $sessionData = mysqli_fetch_array($fetchUserQuery);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message System</title>
</head>
<body>
    <div class="main">
    <h1>
         
        -Online</h1>
        <div class="output">
            <?php
            $msg = mysqli_query ($conn, "SELECT * FROM `msg_posts` `t1` INNER JOIN `user_info` `t2` ON `t1`.`user_id` = `t2`.`user_id`"); //ari ang query
            $result = mysqli_num_rows($msg); //ang muni, para lang mag-isip kung pila kabilog ang data
            if($result > 0){
                
                //output of data for each row
                while ($row = $msg->fetch_array()) {
                    
                    echo $row['name_given'] . ": " . $row['msg'] . " --" . date("m-d-Y h:i A") . "<br>";
                    echo "<br>";
                }
            }
            else{
                echo "Start a Message";
            }
            ?>
        </div>
        <form action="process.php" method="POST">
            <textarea name="msg" placeholder="Type your message here..." class="form-control" required></textarea></p>
            <input type="hidden" name="send" value="<?php echo $loggedInID?>"> 

            <input type="submit" name="send_message" value="Send">

        </form>
    </div>
</body>
</html>
<?php
}
?>