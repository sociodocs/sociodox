<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scociodox Blog</title>

    <link rel="stylesheet" href="style.css" type="text/css" />

</head>

<?php

include("db.php");

$sql = "select * from BlogComment";
$comm = pg_query($conn, $sql);
while ($row = pg_fetch_array($comm)) {
    $title = $row['title'];
    $post = $row['post'];
    $time = $row['post_time'];
    $filename = $row['filename'];
    $text = $row['text'];
    $author = $row['author'];

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

?>

    <body>
        <h1><center>Blog Posts</center></h2>
        <div class="blog">
            <h2 class="title"><?= $title ?></h2>
            <hr>
            <div class="image">
                <?php
                echo "<div >";
                if ($extension = '.jpg' | $extension = '.png' | $extension = '.jpeg') {
                    echo "<img src='blog image/" . $filename . "' width='500px' height='300px'>";
                } else {
                    echo "uploaded file is not i image";
                }
                echo "<p >" . $text . "</p>";
                echo "</div>";
                ?>
            </div>
            <div class="content">
                <?= $post ?>
            </div>
            <div class="bottom">
                <table>
                    <tr>
                        <th>Author:<?= $author ?></th>

                        <td><?= date("j/m/Y g:i:sa", strtotime($time)) ?></td>
                    </tr>
                </table>
            </div>
        </div>

    <?php } ?>

    </body>

</html>