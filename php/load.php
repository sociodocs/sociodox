<?php
include("database.php");
session_start();
$sql = "select * from comment";
$comm = pg_query($conn, $sql);
while ($row = pg_fetch_array($comm)) {
    $name = $row['name'];
    $comment = $row['comments'];
    $time = $row['post_time'];
?>
    <div class="chats"><strong><?= $name ?>:</strong> <?= $comment ?> <p style="float:right"><?= date("j/m/Y g:i:sa", strtotime($time)) ?></p>
    </div>
<?php
}
?>
