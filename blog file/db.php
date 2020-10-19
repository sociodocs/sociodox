<?php

$conn=pg_connect("host=localhost dbname=postgres user=postgres port=5432 password=1234");
//or die("Could not connect to server\n");
if(!$conn){
    echo "error";
}

?>