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
        <link rel="stylesheet" href="../main.css">
        <link rel="stylesheet" href="../css/profile.css">
        <link rel="stylesheet" href="../css/cpass.css">
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
                            <!-- <input type="submit" value="Send" id="btn" name="btn" /> -->
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
          This is Profile
        </div>
        <div id="show-all-section">
          All Organization
        </div>
        <div id="settings-section">
          Settings
        </div>
        <div id="edit-section">
          Edit Profile
        </div>
        <div id="cpass-section">
          <center><h2>Change Password</h2></center><hr>
          <form method="post" action="cpass.php">
            <label>Current Password</label>
              <div class="#"> 
                <input type="password"  class="form-control"  onmouseover="this.type='text'" onmouseout="this.type='password'" placeholder="Current Password" name="oldpsw">
                </div> 
              <label>New Password</label>
              <div class="#"> 
                <input class="#" type="password" required=" " id="pass1" name="newpsw" placeholder="Password" onmouseover="this.type='text'" onmouseout="this.type='password'">                
              </div> 
              <label>Confirm Password</label>
              <div class="#"> 
                <input class="#" type="password" required=" " id="pass2" onkeyup="checkPass(); return false;"  onmouseover="this.type='text'" onmouseout="this.type='password'" placeholder="Confirm Password" name="conpsw">
                <span id="confirmMessage"></span>
              </div> 
              <div class="#"> 
              <input type="submit"  class="#" value="Change Password" name="changepsw" id="cp"> 
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