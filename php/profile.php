 <?php
 include('database.php');
 session_start();
 if (isset($_SESSION['email'])) {
 } else {
 header('location:../index.html');
 }
 ?>
<!DOCTYPE html>
<html>
     <head>
         <title>Profile-Page</title>
         <!-- <link rel="stylesheet" href="../main.css"> -->
         <link rel="stylesheet" href="../css/profile.css">
     </head>
  <body>
    <div class="profile">
      <div class="box header1">SOCIODOX
        <div class="people">For people</div>
      </div>
      <div class="box header2">
        <form action="profile.html" method="POST"> 
          <div align=center>
              <input type="search" name="search" id="search"  placeholder="Search For Organization" autocomplete="off"/>
                <img src="logo/search.png" onclick="Search()">
              </br>
              <span id="ts"></span>
          </div>
         </form>
     </div>
      <div class="box header3">
            <a id="chat" href="#"><img id="chat" src="../logo/chat.png"/></a>
            <a id="blog" href="#"><img id="post" src="../logo/post.png"/></a>
            <a id="profile" href="#"><img id="people" src="../logo/user.png"/></a>           
      </div>
      <div class="separator"><hr></div>
      <div class="box sidebar1">
        <br>
        Joined Organization
        <br>
        <button id="show-all">Show all</button>
      </div>
      <div class="box sidebar2"><br>
        <a href="php/mydonation.php" >My Donation</a>
          <span id="dn">
          </span>
          <div class="separator" id="donateline"><br><br><hr></div>
          <a href="#">Settings</a><br>
          <a href="php/logout.php">Logout</a> 
        </div>
      <div class="box main">
        <div id="chat-section">
              <!doctype html>
              <html>

              <head>

                  <link rel="stylesheet" href="css/chatbox.css"/>

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
                  ({
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
                  });
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
                  <div id="logout">
                      <a href="logout.php" >Logout</a>
                  </div>

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
                                  <input type="submit" value="Send" id="btn" name="btn" />
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
      </div>
      <div class="box footer">Sociodox.org</div>
    </div>  
    <script src="js/search.js"></script> 
    <script src="main.js"></script> 
  </body>
</html>