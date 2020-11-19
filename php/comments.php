
<?php
include("database.php");


if (isset($_POST['user_comm']) && isset($_POST['user_name'])) {
    $comment = $_POST['user_comm'];
    $name = $_POST['user_name'];
    $insert = pg_query($conn, "insert into comment (name,comments,post_time) values('$name','$comment',CURRENT_TIMESTAMP)");
}
else{
    echo "error";
}
//close connection
pg_close($conn);

?>