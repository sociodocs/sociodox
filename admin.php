<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>

    
</head>

<body>
    <div class="admin">
        <h2>Post on blog</h2> 
        <form action="" method="post" enctype="multipart/form-data" class="frm">
            <label class="lab">Select Image File to upload in blog:</label>
            <input type="file" name="image" class="bar"><br>
            <label class="lab">Type text to show below the image:</label>
            <textarea name="text" cols="20" rows="2" class="bar"></textarea><br>
            <label class="lab">Title of post:</label>
            <input type="text" name="title" class="bar" /><br>
            <label class="lab">Description of post:</label>
            <input type="text" id="text" name="desc" class="bar" /><br>
            <label class="lab">author of post:</label>
            <input type="text" id="author" name="author" class="bar" /><br>
            <input type="submit" value="post" id="post" name="post" class="btn"/>
        </form>
    </div>

</body>
</html>

<?php
include("db.php");
$msg = "";
if (isset($_POST["post"])) {

    $desc = $_POST['desc'];
    $post = $_POST['post'];
    $title = $_POST['title'];
    $author = $_POST['author'];

    // Get file info 
    $filename = $_FILES['image']['name'];
    $text = $_POST['text'];

    $target = "blog image/" . basename($filename);
    // Insert image content into database 
    // $insert = pg_query($conn, "INSERT into images(filename,text) VALUES ('$filename','$text')");
    $sql = "insert into BlogComment(post,post_time,title,filename,imgtext,author) values ('$desc',CURRENT_TIMESTAMP,'$title','$filename','$text','$author')";
    pg_query($conn, $sql);

    //uploading file
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "file uploaded succesfully";
    } else {
        $msg = "not succeed";
    }
}
?>