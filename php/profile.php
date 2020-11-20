<?php
    include('database.php');
    session_start();
    if(isset($_SESSION['email'])) {
    } else {
      header('location:../index.html');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile-Page</title>
        <link rel="stylesheet" href="../css/profile.css">
    </head>
  <body>
    <div class="profile">
      <div class="box header1">
        <div class="logo">SOCIODOX</div>
        <div class="people">For people</div>
      </div>
      <div class="box header2">
        <form action="#" method="POST"> 
          <div align=center class="search">
               <div id="sbar"><input type="search" name="search" id="search"  placeholder="Search For Organization" autocomplete="off"/></div>
               <div id="slogo"><img src="../logo/search.png" onclick="Search()"></div></br>
              <div id="ts"></div>
          </div>
        </form>
      </div>
      <div class="box header3">
            <a id="chat" href="#"><img id="chat" src="../logo/chat.png"/></a>
            <a id="blog" href="#"><img id="post" src="../logo/post.png"/></a>
            <a id="profile" href="#"><img id="user" src="../logo/user.png"/></a>           
      </div>
      <div class="separator"><hr></div>
      <div class="box sidebar1"><br>
          <h4>Joined Organization</h4><br>
        <div id="j-org">
                <!doctype html>
                <html>
                  <body>
                    <?php
                        $username=$_SESSION['username'];
                          $sql = "SELECT org_name FROM organization";
                        /*$sql = "SELECT org_name FROM organization where org_id =
                        (
                            select org_id from organization where org_id = 
                            (select users_organization.org_id from users_organization where users_organization.username='$username')
                        )";
                        */
                        $result = pg_query($conn,$sql);
                        $exists = pg_num_rows($result); 
                        if ($exists > 0){
                        while($row = pg_fetch_assoc($result)) {
                    ?>
                        <table>              
                            <tr> 
                                <td class="jorg">
                                  <img id="people" src="../logo/people.png"/>
                                  <div class="org"> <?php echo $row["org_name"];?></div>
                                  <img id="ar" src="../logo/right-arrow.png"/>
                                </td><br>
                            </tr>
                        </table>
                    <?php
                          }
                        }
                    ?>
                  </body>
                </html>
        </div><br>
        <button id="show-all">Show all</button>
      </div>
      <div class="box sidebar2"><br>
        <a id="settings" href="#">Settings</a><br>
          <div id="inside">
            <a id="edit" href="#">Edit Profile</a><br>
            <a id="cpass" href="#">Change Password</a><br>
          </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
           
            <a style="color:red;" href="logout.php">Logout</a> 
        </div>
      <div class="box main">
        <div id="chat-section">
              <!doctype html>
              <html>
              <head>
                <link rel="stylesheet" href="../css/chatbox.css"/>
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                  <script>
                      $(document).ready(function() {
                        $(document).bind('keypress', function(e) {
                          if (e.keyCode == 13) {
                            $('#my_form').submit();
                            $('#comment').val("");
                            }
                          });
                      });
                  </script>
                <script type="text/javascript">
                  function post()
                  {
                      var comment = document.getElementById("comment").value;
                      var name = document.getElementById("username").value;
                      if(comment && name)
                      {
                        $.ajax
                      (
                        {
                          type: 'post',
                          url: 'comments.php',
                          data: 
                          {
                            user_comm:comment,
                            user_name:name
                          },
                          success: function (response) 
                          {
                          document.getElementById("comment").value="";
                          }
                        }
                      );
                    }
                    return false;
                  }
                </script>
                <script>
                  function autoRefresh_div()
                    {
                      $("#result").load("load.php").show();// a function which will load data from other file after x seconds
                    }              
                    setInterval('autoRefresh_div()', 2000);
                </script>
              </head>
            <body>
              <div id="container">
                <div id="session-name">
                  Your Name: <input type="text" value="<?= $_SESSION['username'] ?>" class="session-text" disabled>
                </div>
                <div id="result-wrapper">
                  <div id="result">
                    <?php
                      include("load.php");
                    ?>
                  </div>
                </div>
                <form method='post' action="#" onsubmit="return post();" id="my_form" name="my_form">
                  <div id="form-container">
                    <div class="form-text">
                      <input type="text" style="display:none" id="username" value="<?= $_SESSION['username'] ?>">
                      <textarea id="comment"></textarea>
                      </div>
                        <div class="form-btn">
                          <button type="submit" ><img id="send" src="../logo/right-arrow.png"/></button>                           
                        </div>
                      </div>
                </form>
              </div>
            </body>
          </html>
        </div>
        <div id="blog-section">
          This is blog
        </div>
        <div id="profile-section">           
          <div class="dprofile-card">
              <div class="dprofile">
                <img src="<?php echo $_SESSION['dp'];?>" class="dprofile-dp">
                <h3 class="user-name"> <?php echo $_SESSION['username'];?> </h3>
                <h5> <?php echo $_SESSION['first_name'];echo " "; echo $_SESSION['last_name'];?> </h5>
              </div>
          </div>
              <div class="p-details">
                <div class="j">
                        <?php
                        $username=$_SESSION['username'];
                          $j = "SELECT count(org_name) as j FROM organization";
                        /*$sql = "SELECT org_name FROM organization where org_id =
                        (
                            select org_id from organization where org_id = 
                            (select users_organization.org_id from users_organization where users_organization.username='$username')
                        )";
                        */
                        $join = pg_query($conn,$j);
                        $row = pg_fetch_assoc($join);
                        $joined = $row['j'];
                        echo $joined;
                        ?>
                        <h5>Joined</h5>
                </div>
                <div class="c">
                  <h5>Comments</h5>
                </div>
                <div class="d">
                    <?php
                     $semail=$_SESSION['email'];
                     $smobile=$_SESSION['mobile_no'];
                     $dsql = pg_query($conn,"select sum(amount) as amount_sum from donation where email='$semail' and mobile_no='$smobile'");                    
                         $row = pg_fetch_assoc($dsql);
                         $sum = $row['amount_sum'];                        
                         echo $sum.".Rs";
                    ?>
                  <h5>Donation</h5>                
                </div>
              </div>          
        </div>
        <div id="show-all-section">
          All Organization
        </div>
        <div id="settings-section">
          Settings
        </div>
        <div id="edit-section">          
          <div class="dprofile-card">
              <div class="dprofile">
                <img src="<?php echo $_SESSION['dp'];?>" class="dprofile-dp">
              </div>
          </div>         
          <div class="edit-p">
            <form method="POST" action="editprofile.php" enctype="multipart/form-data">
              <div id="ep"><input type="file" name="p" id="p"></div>
                <div id="row1">
                  <div>First Name</div>
                  <div>Last Name</div>
                </div>
                <div id="row2">
                  <div><input type="text" id="pfn" name="first_name" placeholder="<?php echo $_SESSION['first_name'];?>"/></div>                
                  <div><input type="text" id="pln" name="last_name" placeholder="<?php echo $_SESSION['last_name'];?>"/></div>
                </div>
                <div id="row3">
                  <div>Email</div>
                  <div>Mobile</div>
                </div>
                <div id="row4">
                  <div><input type="text" id="pemail" name="email" placeholder="<?php echo $_SESSION['email'];?>"/></div>
                  <div><input type="text" id="pmobile" name="mobile_no" placeholder="<?php echo $_SESSION['mobile_no'];?>"/></div>
                </div>
                <div id="row5">
                  <div>Username</div>
                </div>
                <div id="row6">
                  <div><input type="text" id="pusername" placeholder="<?php echo $_SESSION['username'];?>" name="username" required onkeyup="showHint(this.value)"></div>
                </div>
                <div id="row8"><input type="submit" name="submit" value="Save"/></div>                
                <div id="row9"><span id="txtHint"></span></div>
            </form>          
          </div>
        </div>
        <div id="cpass-section">
          <center><h2>Change Password</h2></center><hr>
          <form method="post" action="cpass.php">
            <div class="cpwd">
                <label>Current Password</label>
                <div class="cp"> 
                  <input type="password" id="oldp" class="form-control"  onmouseover="this.type='text'" onmouseout="this.type='password'"  name="oldpsw">
                  </div> 
                <label>New Password</label>
                <div class="np"> 
                  <input class="#" type="password" required=" " id="pass1" name="newpsw"  onmouseover="this.type='text'" onmouseout="this.type='password'">                
                </div> 
                <label>Confirm Password</label>
                <div class="dp"> 
                  <input class="#" type="password" required=" " id="pass2" onkeyup="checkPass(); return false;"  onmouseover="this.type='text'" onmouseout="this.type='password'" name="conpsw">
                  <span id="confirmMessage"></span>
                </div> 
                <div class="ok"> 
                <input type="submit"  class="cok" value="Change Password" name="changepsw" id="cp"> 
                </div>
            </div> 
          </form>
        </div>
      </div>
      <div class="box footer">copyright sociodox.org</div>
    </div>  
    <script src="../js/search.js"></script> 
    <script src="../main.js"></script> 
  </body>
</html>