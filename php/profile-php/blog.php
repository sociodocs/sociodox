
  <head>
    <link rel="stylesheet" href="../css/profile-blog.css" />
    <h2 style="text-align: center"><b>Blog</b></h2>
  </head>

  <?php
include "database.php";

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

  
    <div class="container-fluid">
      <div class="row">
        <div class="panel panel-default">
          <div class="panel-heading back">
            <h2><?php echo $row['title']; ?></h2>
            <h5><span class="glyphicon glyphicon-time"></span> Posted On:<?php echo $row['post_time'];?></h5>
          </div>
          <div class="panel-body">
            <p class="content"><?php echo $row['post']; ?></p>
            <div class="col-md-3 pull-right" style="width: 100px;height:auto;">
              <!--<img class='img-responsive img-rounded center blogimg' src="blogimage/<?php echo $row['img']; ?>">-->
              <?php
              if ($extension = '.jpg' | $extension = '.png' | $extension = '.jpeg') {
              echo "<img class='blogimg-responsive blogimg-rounded center blogimg' src='../blogimage/" . $row['filename'] . "' ";
              } else {
              echo "uploaded file is not i image";
              }
              ?>
            </div>
            <?php echo $row['imgtext']; ?>
          </div>
        </div><hr/>
        <b><p style="text-align: center">
            Author :<?php echo $row['author']; ?>
        </p></b>
      </div>
    </div> </div> 
  <?php }?>
 

