<?php
                        $username=$_SESSION['username'];
                          $sql = "SELECT org_name FROM organization";                        
                        $result = pg_query($conn,$sql);
                        $exists = pg_num_rows($result);
                        $count = 0;
                        if ($exists > 0){                          
                        while($row = pg_fetch_assoc($result)) {                          
                    ?>
                                <div class="all-org">
                                  <img id="b-people" src="../logo/people.png"/><br>
                                  <a class="b-org" id="sorg"> <?php echo $row["org_name"];?></a>                                  
                                </div>                            
                    <?php
                          }
                        }
                    ?>