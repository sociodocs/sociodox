<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/navigation.css">
    <style>
        .admin{
            box-sizing: border-box;
            background: #E5E5E5;
            font-size: 25px;
        }
    </style>
    
</head>

<body>
    <?php
    session_start();
    include("adminheader1.php"); ?>
    <div class="admin" align="center">
        <h2>Post on blog</h2> 
        <form action="" method="post" enctype="multipart/form-data" class="frm">
            <label class="lab">Select Image File to upload in blog:</label>
            <input type="file" name="image" class="bar"><br>
            <label class="lab">Type text to show below the image:</label>
            <input name="text" cols="20" rows="2" class="bar"/><br>
            <label class="lab">Title of post:</label>
            <input type="text" name="title" class="bar" /><br>
            <label class="lab">Description of post:</label>
            <textarea rows='2' id="text" name="desc" class="bar" /></textarea><br>
            <label class="lab">author of post:</label>
            <input type="text" id="author" name="author" class="bar" /><br>
            <input type="submit" value="post" id="post" name="post" class="btn"/>
        </form>
    </div>

</body>
</html>

<?php
include("database.php");
$msg = "";
if (isset($_POST["post"])) {

    $desc = $_POST['desc'];
    $post = $_POST['post'];
    $title = $_POST['title'];
    $author = $_POST['author'];

    // Get file info 
    $filename = $_FILES['image']['name'];
    $text = $_POST['text'];

    $target = "../blogimage/" . basename($filename);
    // Insert image content into database 
    // $insert = pg_query($conn, "INSERT into images(filename,text) VALUES ('$filename','$text')");
    $sql = "insert into BlogComment(post,post_time,title,filename,imgtext,author) values ('$desc',CURRENT_TIMESTAMP,'$title','$filename','$text','$author')";
    $result=pg_query($conn, $sql);

    //uploading file
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "file uploaded succesfully";
    } else {
        $msg = "not succeed";
    }

    if($result){
        Print '<script>alert("Successfully Posted!");</script>'; 
        Print '<script>window.location.assign("admin_blog.php");</script>'; 
        }
     else {
         echo "error";
     }
}
?>