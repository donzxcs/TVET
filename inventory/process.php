<?php
include "conn.php";
session_start();
// Daw sala ang time nga gasulod sa database.
date_default_timezone_set("Asia/Manila");


if(isset($_POST['register'])){

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $student_id = $_POST['student_id'];
    $gname = $_POST['gname'];
    $mname = $_POST['mname'];
    $fname = $_POST['fname'];

//validate email
    $validate_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $n = mysqli_num_rows($validate_email);

    if ($n > 0) {
        echo '<script>
        alert("Change your Email Address!");
        window.location.href="form.php";
        </script>';
    } else {
 // Validate student id
    $validate_student_id = mysqli_query($conn, "SELECT * FROM user_info WHERE student_id='$student_id'");
    $y = mysqli_num_rows($validate_student_id);

    if ($y > 0) {
        echo '<script>
        alert("Change your Student ID!");
        window.location.href="form.php";
        </script>';
        } else {
            // Registration
    date_default_timezone_set('Asia/Manila');
    $time = time();
    echo($time."<br>");
    echo(date("m-d-Y h:i:s A",$time));
    
    $insertusers = "INSERT INTO `users`(`user_type`, `user_status`, `email`, `password`, `registration_date`)
    VALUES(3, 1, '$email', '$pass', $time)";
    mysqli_query($conn, $insertusers);

    $generated_user_id = mysqli_insert_id($conn);

    $insertinfo_user = "INSERT INTO `user_info`(`user_id`, `student_id`, `name_given`, `name_middle`, `name_family`)
    VALUES($generated_user_id, '$student_id', '$gname', '$mname', '$fname')";
    mysqli_query($conn, $insertinfo_user);

        echo '<script>
        alert("Account Created Successfully!");
        window.location.href="dashboard.php";
        </script>';
  }
 }
}
//login
if(isset($_POST['login'])){
    
    $process_email = $_POST['log_email'];
    $process_password = $_POST['log_pass'];
    //Login Session
    $checkAccountStatement = "SELECT * FROM `users` WHERE  `email`='$process_email'";
    $checkAccountQuery = mysqli_query($conn, $checkAccountStatement);
    $countAccount = mysqli_num_rows($checkAccountQuery);

    //Login User Types
    if($countAccount == 1){
        $rowData = mysqli_fetch_assoc($checkAccountQuery);
        $databasePassword = $rowData['password'];
        if($databasePassword == $process_password){
            $databaseUserID = $rowData['user_id'];
            $databaseUserType = $rowData['user_type'];

            $_SESSION ['sessionID'] = $databaseUserID;
            //For SuperAdmin
            if($databaseUserType == 1){
                echo'<script>
                alert("Super Admin Login Successfully!");
                window.location.href="superAdmin/dashboard.php";
                </script>';

                //ForAdmin
                }else if($databaseUserType == 2){
                echo'<script>
                alert("Admin Login Successfully!");
                window.location.href="admin/dashboard.php";
                </script>';

                //ForSecretaryUsers
                }else if($databaseUserType == 3){
                echo'<script>
                alert("Secretary Login Successfully!");
                window.location.href="secretary/secretary_Page.php";
                </script>';
                }
            echo "This will proceed to the authenticated page";
        }else{
            echo "Incorrect Password";
        }
    }else{
        echo "Please create an Account";
    }
}

//user update
if(isset($_POST['update'])){

    $id = $_POST['updateid'];
    $pass = $_POST['pass'];
    $student_id = $_POST['student_id'];
    $gname = $_POST['gname'];
    $mname = $_POST['mname'];
    $fname = $_POST['lname'];

    $updateusers ="UPDATE `users` SET `password`='$pass' WHERE `user_id`=$id";
    mysqli_query($conn,$updateusers);

    $updateinfo_user = "UPDATE `user_info` SET `student_id`='$student_id',`name_given`='$gname', `name_middle`='$mname',`name_family`='$fname' WHERE `user_id`=$id";
    mysqli_query($conn,$updateinfo_user);
    echo'<script>
        alert("Updated Successfully!");
        window.location.href="dashboard.php";
        </script>';
        }

//User Delete
if(isset($_POST['delete_id'])){
    $id=$_POST['deleteid'];

    $delete= "DELETE FROM `user_info` WHERE user_id=$id";
    $result=mysqli_query($conn, $delete);
    echo'<script>
        alert("Deleted Successfully");
        window.location.href="dashboard.php";
        </script>';
}

if(isset($_POST['delete_id'])){
    $id=$_POST['deleteid'];

    $delete= "DELETE FROM `users` WHERE user_id=$id";
    $result=mysqli_query($conn, $delete);
    echo'<script>
        alert("Deleted Successfully");
        window.location.href="dashboard.php";
        </script>';
}


//logout
if(isset($_POST['logout_process'])){
    session_start();
    session_destroy();
    
    echo'<script>
    alert("Logout");
    window.location.href="index.php";
    </script>';
}

//For adding label
if(isset($_POST['AddLabel'])){
    
    $AddLabel= $_POST['category'];
    //validation for label
    $validate_label = mysqli_query($conn, "SELECT * FROM category WHERE label='$label'");
    $x = mysqli_num_rows($validate_label);

    if($x > 0){
    echo'<script>
    alert("Label Already Exist");
    window.location.href="addcategory.php"
    </script>';
}else{
    //Add Label
    $AddCategory= "INSERT INTO `category` (`label`)
    VALUE ('$AddLabel')";
    mysqli_query($conn, $AddCategory);
    echo '<script> alert("Adding New Label");
    </script>';
}
}
//update label
if(isset($_POST['LabelUpdate'])){

    $id = $_POST['labelupdateid'];
    $label = $_POST['category'];

    //validate
    $validate_updatelabel = mysqli_query($conn, "SELECT * FROM category WHERE label='$label'");
    $validatelabel = mysqli_num_rows($validate_updatelabel);
    
    if($validatelabel > 0){     
    echo'<script>
    alert("Label Already Exist");
    window.location.href="viewcategory.php"
    </script>';
  }else{
    //update label
    $updatelabel = "UPDATE `category` SET `label`= '$label' WHERE `id`= $id";
    mysqli_query($conn, $updatelabel);
    echo '<script>
    alert("Label Updated Successfully");
    window.location.href="viewcategory.php";
    </script>';
  }   
}

//for item inventory
if(isset($_POST['add_item'])){

    $brandname = $_POST['brand_name'];
    $model = $_POST['model'];
    $part_name = $_POST['partName'];
    $description = $_POST['snumber'];
    $status = $_POST['status'];
    $userID = $_POST['userID'];

    //for no duplication of serial number
    $validate_serialnumber = mysqli_query($conn, "SELECT * FROM `master_item` WHERE `description` ='$description'");
    $y = mysqli_num_rows($validate_serialnumber);
    if ($y > 0){
        echo '<script>
        alert("Serial Number Already Existed Try Another One");
        window.location.href="itemInventory.php";
        </script>';
    }else{
        //For date
        $itemAdd_time=time();
    
        //Insert Data in Item
        $insert_item_data = "INSERT INTO `master_item`(`quantity_p`,`item_brand`,`model`,`part_name`,`description`,`part_status`,`time_date_added`)
        VALUES (1,'$brandname', '$model', '$part_name', '$description','$status',$itemAdd_time)";
        mysqli_query($conn, $insert_item_data);

// Get the ID of the last inserted item
        $generated_item_id = mysqli_insert_id($conn);

// Insert into logs_info
        $addToolLogs = "INSERT INTO `logs_info_master`(`quantity`, `relevant_names`, `department`, `date_time`, `contact_number`, `contact_email`, `category_id`, `user_id`, `item_id`)
                                                VALUES(1, 'System Admin', 'System Admin', $itemAdd_time, 'System Admin', 'System Admin', 1, '$userID', '$generated_item_id')";
        mysqli_query($conn, $addToolLogs);
    
        echo '<script>
        alert("Item Successfully Added!");
        window.location.href="itemInventory.php";
        </script>'; 
  }
}
   
if(isset($_POST['update_item'])){

    $id = $_POST['itemupdateid'];
    $brandname = $_POST['brand_name'];
    $model = $_POST['model'];
    $part_name = $_POST['partName'];
    $description = $_POST['snumber'];
    $status = $_POST['status'];
    $quantity = $_POST['quantity'];

    if ($y > 0){
    echo '<script>
    alert("Serial Number Already Existed Try Another One");
    window.location.href="itemInventory.php";
    </script>';
    }
    else
    {
         //update date
    date_default_timezone_set('Asia/Manila');
    $item_update=time();
    echo($item_update. "<br>");
    echo(date("Y-m-d h:i:s A",$item_update));

    $updateitem = "UPDATE `master_item` SET `item_brand` = '$brandname', `model`='$model', 
                  `part_name`='$part_name', `description`='$description',`part_staus`='$status',`quantity_p`='$quantity',`date_update`='$item_update' WHERE `item_id`=$id";
    mysqli_query($conn, $updateitem);
    echo '<script>
    alert("Updated Successfully");
    window.location.href="itemInventory.php"
    </script>';

}
}

if(isset($_POST['itemDeleteID'])){
    $id = $_POST['item_id'];
 
    $itemdelete = "DELETE FROM `master_item` WHERE `item_id`=$id";
    $result =mysqli_query($conn, $itemdelete);
    echo '<script>
    alert("Item Deleted Successfully");
    window.location.href="itemInventory.php";
    </script>';
 }

if(isset($_POST['toolSubmit'])){

    $toolQuantity = $_POST['qty'];
    $toolDescription = $_POST['toolDescription'];
    $toolName = $_POST['toolName'];
    $toolStatus = $_POST['toolStatus'];

    $qty = $_POST['qty'];
    $userID = $_POST['userID'];

    $validate_toolName = mysqli_query($conn, "SELECT * FROM `tool_item` WHERE `tool_name`='$toolName'");
    $x = mysqli_num_rows($validate_toolName);

    if($x > 0){
    echo'<script>
    alert("Tool Name Already Exist Try Another One");
    window.location.href="toolsInventory.php"
    </script>';
    }else{

    date_default_timezone_set('Asia/Manila');
    $time_date=time();
    echo ($time_date. "<br>");
    echo(date("m-d-Y h:i:s A",$time_date));

    $insertTool = "INSERT INTO `tool_item`(`qty`,`tool_description`, `tool_name`, `tool_status`)
    VALUES($toolQuantity, '$toolDescription', '$toolName', '$toolStatus')";
    mysqli_query($conn, $insertTool);

    $generated_user_id = mysqli_insert_id($conn);

    $addToolLogs = "INSERT INTO `logs_info`(`quantity`,`relevant_names`,`department`,`date_time`,`contact_number`,`contact_email`,`category_id`,`user_id`,`item_id`)
                                        VALUES('$qty', 'System Admin','System Admin','$time_date','System Admin',' System Admin', 1, '$userID', $generated_user_id)";
    mysqli_query($conn, $addToolLogs);

    echo '<script>
    alert("Tool Successfully Added!");
    window.location.href="toolsInventory.php";
    </script>';
}
}


if(isset($_POST['send_message'])){
    $user_id = $_POST['send'];
    $msg = $_POST['msg'];

    date_default_timezone_set('Asia/Manila');
    $msg_date=time();
    echo ($msg_date. "<br>");
    echo(date("m-d-Y h:i:s A",$msg_date)); 

    $message ="INSERT INTO `msg_posts`(`user_id`,`msg`,`msg_date`)
    VALUES($user_id,'$msg',$msg_date)";
    mysqli_query($conn, $message);

    echo'<script>
    window.location.href="messagesys.php";
    </script>';
}

if(isset($_POST['fileform_process'])){
    $processFileTitle = $_POST['form_file_title'];
    $processFileType = $_POST['form_file_type'];

    $processFileContentName = $_FILES['form_file_content']['name'];
    $processFileContentTempName = $_FILES['form_file_content']['tmp_name'];
    $processFileConsentSize = $_FILES['form_file_content']['size'];

    
        //text_doc.docx ["test_doc","dOCx"]
        $explodedFile = explode(".",$processFileContentName);
        //["dOcx"] => ["docx"]
        $fileValidateExt = strtolower(end($explodedFile));

        $allowedFormats = array("jpg", "jpeg", "gif", "webp", "png");

        if(in_array($fileValidateExt, $allowedFormats)){

        }else{
            echo"Invalid Format. This Process only accept picture files";
        }
    //File Should Not Be More than 10mb
    if($processFileConsentSize < 1000000){
        $fileImgDestination = 'uploads/'.$processFileContentName;
        move_uploaded_file($processFileContentTempName, $fileImgDestination);
        echo "File uploaded Successfully";
    }else{
    echo "File size is too big. File should only be less than 10mb";
}
}

if(isset($_POST['toolDeleteID'])){
    $id = $_POST['tool_id'];

    $deletetool = "DELETE FROM `tool_item` WHERE tool_id=$id";
    $result = mysqli_query($conn, $deletetool);
    if ($result){
        echo '<script>
        alert("Tool Deleted Successfully");
        window.location.href="toolsInventory.php";
        </script>';
    } else {
        echo '<script>
        alert("Error: Unable to delete");
        window.location.href="toolsInventory.php";
        </script>';
    }
}


if(isset($_POST['toolupdate'])){

    $id = $_POST['toolUpdate'];
    $quantity = $_POST['qty'];
    $toolName = $_POST['toolName'];
    $toolStatus = $_POST['toolStatus'];
    $toolDescription = $_POST['toolDescription'];
    
    $updatetool = "UPDATE `tool_item` SET `qty` = '$quantity', `tool_name`='$toolName', 
    `tool_status`='$toolStatus', `tool_description`='$toolDescription' WHERE `tool_id`=$id";
    mysqli_query($conn, $updatetool);
    echo '<script>
    alert("Updated Successfully");
    window.location.href="toolsInventory.php"
    </script>';
    
    }

    if(isset($_POST['submitLogs'])){

        $userID = $_POST['userID'];
        $itemID = $_POST['itemID'];
        $qty = $_POST['qty'];
        $categoryID = $_POST['categoryID'];
        $relevantName = $_POST['relevantName'];
        $department = $_POST['dept'];
        $contactNumber = $_POST['contactNumber'];
        $logEmail = $_POST['logEmail'];

        date_default_timezone_set('Asia/Manila');
        $dateTime=time();
        echo ($dateTime. "<br>");
        echo(date("m-d-Y h:i:s A",$dateTime)); 

        $logsInsert = "INSERT INTO `logs_info`(`user_id`,`item_id`,`quantity`,`category_id`,`relevant_names`,`department`,`contact_number`,`contact_email`,`date_time`)
        VALUES('$userID', '$itemID', '$qty', '$categoryID','$relevantName', '$department', '$contactNumber', '$logEmail','$dateTime')";
        mysqli_query($conn, $logsInsert);

        echo '<script>
        alert("Logs Added");
        window.location.href="logsform.php";
        </script>';
    }

    if(isset($_POST['addQty'])){

        $id = $_POST['toolUpdate'];
        $quantity = $_POST['qty'];
        $currentQuantity = $_POST['currentQuantity'];
        $userID = $_POST['userID'];

        $calculation = $currentQuantity + $quantity;

        date_default_timezone_set('Asia/Manila');
        $time_date=time();

        $addQuantity = "UPDATE `tool_item` SET `qty` = '$calculation' WHERE `tool_id`=$id";
        mysqli_query($conn, $addQuantity);



        $addQuantityLogs = "INSERT INTO `logs_info`(`quantity`,`relevant_names`,`department`,`date_time`,`contact_number`,`contact_email`,`category_id`,`user_id`,`item_id`)
                                            VALUES('$quantity', 'System Admin','System Admin', '$time_date','System Admin',' System Admin', 1, '$userID', $id)";
        mysqli_query($conn, $addQuantityLogs);

        echo '<script>
        alert("Quantity Added");
        window.location.href="toolsInventory.php"
        </script>';
    
    }

    if(isset($_POST['auditAction'])){

        $itemID = $_POST['itemID21'];
        $userID = $_POST['userID'];
        $categoryID = $_POST['compParts']; 
        $quantity23 = $_POST['qty23'];
        $auditAction = $_POST['status'];
        $borrower = $_POST['borrower'];
        $department1 = $_POST['dept'];

        date_default_timezone_set('Asia/Singapore');
        $time_date=time();

        $insertAction = "INSERT INTO `transaction`(`item_id`,`user_id`,`borrower_name`,`department1`,`timestamp_borrow`,`timestamp_return`,`status`,`transaction_code`)
                                        VALUES('$itemID','$userID','$borrower','$department1','$time_date',0,'$auditAction','$time_date')";
        mysqli_query($conn, $insertAction);

        $addQuantityLogs = "INSERT INTO `logs_info_master`(`quantity`,`relevant_names`,`department`,`date_time`,`contact_number`,`contact_email`,`category_id`,`user_id`,`item_id`)
                                            VALUES('$quantity23', 'System Admin','System Admin', '$time_date','System Admin',' System Admin', '$auditAction', '$userID', '$itemID')";
        mysqli_query($conn, $addQuantityLogs);

        echo '<script>
        alert("Audit Change");
        window.location.href="logsComputerParts.php"
        </script>';
        
    }

    if(isset($_POST['changeAudit'])){
        
        $id = $_POST['transacid'];
        $itemID = $_POST['itemID21'];
        $userID = $_POST['userID'];
        $auditAction = $_POST['status'];

        date_default_timezone_set('Asia/Manila');
        $time_date=time();

        $updateborrow = "UPDATE `transaction` SET `timestamp_return` = '$time_date', `status`='$auditAction' WHERE `transac_id`='$id'";

        mysqli_query($conn, $updateborrow);

        echo '<script>
        alert("Returned");
        window.location.href="borrowComputerparts.php"
        </script>';

    }

?>


