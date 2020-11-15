<?php
include("database.php");
    $response = " ";
    $search = $_REQUEST["s"];
    $search = preg_replace("#[^0-9a-zA-Z]#i","",strtolower($search));
    $query = pg_query($conn, "select * from organization where org_name like '%$search%'");
    $count  = pg_num_rows($query);
      if($count == 0){
          $response ='There is no search result found!';
      }else{
          while($row = pg_fetch_assoc($query))
            {
             $result = $row['org_name'];
             $response = "<span>$result</span>";
            }
          }
      echo $response;
      die;
?>