<!doctype html>
                <html>
                  <body>
                    <?php
                        $username=$_SESSION['username'];
                          $sql = "SELECT org_name FROM organization";
                        // $sql = "SELECT org_name FROM organization where org_id =
                        // (
                        //     select org_id from organization where org_id = 
                        //     (select users_organization.org_id from users_organization where users_organization.username='$username')
                        // )";
                        
                        $result = pg_query($conn,$sql);
                        $exists = pg_num_rows($result);
                        $count = 0;
                        if ($exists > 0){                          
                        while($row = pg_fetch_assoc($result)) {                          
                    ?>
                        <table>              
                            <tr> 
                                <td class="jorg">
                                  <img id="people" src="../logo/people.png"/>
                                  <a class="org" id="sorg"> <?php echo $row["org_name"];?></a>
                                  <img id="ar" src="../logo/right-arrow.png"/>
                                </td><br>
                            </tr>
                        </table>
                    <?php
                        $count++;
                          if($count==6)
                            break;
                          }
                        }
                    ?>
                  </body>
                </html>