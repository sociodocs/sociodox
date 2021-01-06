<?php
              if (isset($_POST['submit'])) {
                  // Escape user inputs for security 
                  $un = $_SESSION['username'];
                  $m = pg_escape_string(
                      $conn,
                      $_REQUEST['msg']
                  );
                  date_default_timezone_set('Asia/Kolkata');
                  //$ts = date('y-m-d h:ia');

                  // Attempt insert query execution 
                  $sql = "INSERT INTO finalchat (uname, msg, dt) 
                  VALUES ('$un', '$m', CURRENT_TIMESTAMP)";
                  if (pg_query($conn, $sql)) {;
                  } else {
                      echo "ERROR: Message not sent!!!";
                  }
              }
              ?>
              <html>
              <head>
              <link rel="stylesheet" href="../css/chatbox.css">
              </head>                              
              <body onload="show_func()">
                  <div id="container">
                      <main>
                          <header>
                            <div class="#">
                                <label>Select Organization</label>
                                <select name="org_name" id="org_name">
                                    <?php
                                        $result = pg_query($conn,"Select * from organization");

                                        while($row = pg_fetch_assoc($result)){
                                            $orgName = $row["org_name"];
                                    ?>
                                            <option value="<?php echo $orgName; ?>" > <?php echo "$orgName"; ?> </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <img src="logo/down-chevron.png">
                            </div>
                           <h2> Group Discussion</h2>
                           
                          </header>

                          <script>
                              function show_func() {

                                  var element = document.getElementById("chathist");
                                  element.scrollTop = element.scrollHeight;

                              }
                          </script>

                          <form id="myform" action="profile.php" method="POST">
                              <div class="inner_div" id="chathist">
                                  <?php
                                  
                                  $query = "SELECT * FROM finalchat";
                                  $run = pg_query($conn,$query);
                                  $i = 0;

                                  while ($row = pg_fetch_array($run)) :
                                      if ($i == 0) {
                                          $i = 5;
                                          $first = $row;
                                  ?>
                                          <div id="triangle1" class="triangle1"></div>
                                          <div id="message1" class="message1">
                                              <span style="color:black;float:right;">
                                                  <?php echo $row['msg']; ?></span> <br />
                                              <div>
                                                  <span style="color:black;float:left; 
              font-size:10px;clear:both;">
                                                      <?php echo $row['uname']; ?>,
                                                      <?php echo $row['dt']; ?>
                                                  </span>
                                              </div>
                                          </div>
                                          <br /><br />
                                          <?php
                                      } else {
                                          if ($row['uname'] != $first['uname']) {
                                          ?>
                                              <div id="triangle" class="triangle"></div>
                                              <div id="message" class="message">
                                                  <span style="color:black;float:left;">
                                                      <?php echo $row['msg']; ?>
                                                  </span> <br />
                                                  <div>
                                                      <span style="color:black;float:right; 
                  font-size:10px;clear:both;">
                                                          <?php echo $row['uname']; ?>,
                                                          <?php echo $row['dt']; ?>
                                                      </span>
                                                  </div>
                                              </div>
                                              <br /><br />
                                          <?php
                                          } else {
                                          ?>
                                              <div id="triangle1" class="triangle1"></div>
                                              <div id="message1" class="message1">
                                                  <span style="color:black;float:right;">
                                                      <?php echo $row['msg']; ?>
                                                  </span> <br />
                                                  <div>
                                                      <span style="color:black;float:left; 
                  font-size:10px;clear:both;">
                                                          <?php echo $row['uname']; ?>,
                                                          <?php echo $row['dt']; ?>
                                                      </span>
                                                  </div>
                                              </div>
                                              <br /><br />
                                  <?php
                                          }
                                      }
                                  endwhile;
                                  ?>
                              </div>
                              <footer>
                              <div class="send">
                                  <table>
                                      <tr>
                                          <th>
                                              <textarea id="msg" name="msg" rows='3' cols='50' placeholder="Type your message">
                                         </textarea></th>
                                         <th>
                                              <input class="input2" type="submit" id="submit" name="submit" value="send">
                                          </th>
                                      </tr>
                                  </table> 
                              </div>
                              </footer>                             
                          </form>
                      </main>
                  </div>
              </body>
              </html>