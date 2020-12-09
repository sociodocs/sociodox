<?php

$conn=pg_connect("host=localhost dbname=postgres user=postgres port=5432 password=1998")
or $conn=pg_connect("host=localhost dbname=postgres user=postgres port=5432 password=1234")
or $conn=pg_connect("host=localhost dbname=venom user=utkarsh port=5432 password=264064")
or die("Could not connect");

?>