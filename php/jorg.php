
 <!doctype html>
 <html>
    <body>
        <?php
        include("database.php");
        $sql = "SELECT org_name FROM organization";
        $result = pg_query($conn,$sql);
        $exists = pg_num_rows($result); 
        if ($exists > 0){
        while($row = pg_fetch_assoc($result)) {
        ?>
        <table border="1">              
            <tr>
                <td><?php echo $row["org_name"];?></td>
            </tr>
        </table>
        <?php
        }
     }
    ?>
   </body>
</html>