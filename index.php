<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sociodox Blog</title>
    <!--<link rel="stylesheet" href="blog (2).css" />-->
    <link rel="stylesheet" href="real.css" />

    <h2 style="text-align:center;"><b>Blog</b></h2>
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
    $text = $row['imgtext'];
    $author = $row['author'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
?>

    <body class="container-fluid">
        <div class="container-fluid">
            <div class='row'>
                <div class="panel panel-default">
                    <div class="panel-heading back">
                        <h2> <?php echo $row['title']; ?> </h2>
                        <h5><span class="glyphicon glyphicon-time"></span> Posted On <?php echo $row['post_time']; ?></h5>

                    </div>
                    <div class="panel-body">
                        <?php echo $row['post']; ?>
                        <div class="col-md-3 pull-right">
                            <!--<img class='img-responsive img-rounded center' src="blog image/<?php echo $row['img']; ?>">-->
                            <?php
                            if ($extension = '.jpg' | $extension = '.png' | $extension = '.jpeg') {
                                echo "<img class='img-responsive img-rounded center' src='blog image/" . $row['filename'] . "' ";
                            } else {
                                echo "uploaded file is not i image";
                            }
                            ?>
                        </div>
                        <?php echo $row['imgtext']; ?>
                    </div>
                </div>
                <hr>
                <b>
                    <p style="text-align: center;">Author : <?php echo $row['author']; ?></p>   
                </b>
            </div>

        </div>
        </body>
    <?php } ?>
</html>