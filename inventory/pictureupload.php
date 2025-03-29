<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Picture Upload</title>
</head>
<body>
    <h1>Upload your Picture Here</h1>
    <form action="process.php" method="POST" enctype="multipart/form-data">

        Enter File Text Here: <input type="text" name="form_file_title" required><br/>
        Enter Extension Type: <input type="text" name="form_file_type" ><br/>

        <input type="file" name="form_file_content" required><br/><br/>
        <input type="submit" name="fileform_process" value="Upload File">
    </form>
    
</body>
</html>