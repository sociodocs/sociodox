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
           <link rel="stylesheet" href="../css/profile1.css">
     </head>
  <body>
    <div class="profile">
        <nav>
            <div class="logo">SOCIODOX</div>
            <div class="people">For people</div>
            <div class="search">
                <form action="profile1.php" method="POST"> 
                    <div id="sbar"><input type="search" name="search" id="search"  placeholder="Search For Organization" autocomplete="off"/></div>
                    <div id="slogo"><img src="../logo/search.png" onclick="Search()"></div>
                    </br>
                    <span id="ts"></span>
                </form>
            </div>
            <div class="header3">
                <a id="chat" ><img id="chat" src="../logo/chat.png"/></a>
                <a id="blog" ><img id="post" src="../logo/post.png"/></a>
                <a id="profile" ><img id="user" src="../logo/user.png"/></a>
            </div>
        </nav>
        <div class="separator"><hr></div>
        <div class="sidebar1">
            <br><h3>Joined Organization</h3><br>
            <div id="j-org">
                    <!doctype html>
                    <html>
                        <body>
                            <?php
                                $username=$_SESSION['username'];
                                $sql = "SELECT org_name FROM organization where org_id =
                                (
                                    select org_id from organization where org_id = 
                                    (select users_organization.org_id from users_organization where users_organization.username='$username')
                                )";
                                
                                $result = pg_query($conn,$sql);
                                $exists = pg_num_rows($result); 
                                if ($exists > 0){
                                while($row = pg_fetch_assoc($result)) {
                                ?>
                                <table class="jorg">              
                                    <tr>
                                        <td><img id="people" src="../logo/people.png"/><?php echo $row["org_name"];?><img id="ar" src="../logo/right-arrow.png"/></td>
                                    </tr>
                                </table>
                                <?php
                                }
                            }
                            ?>
                        </body>
                    </html>
                </div>
                <br>
                <button id="show-all">Show all</button>
            </div>
        </div>
        <main>Main</main>
        <div class="sidebar2">
            <br>
            <a href="#">Settings</a><br>
            <div id="dn"></div>         
            <a href="logout.php">Logout</a> 
        </div>
        </div>
        <footer>Footer</footer>
    </div>    
 
    <script src="../js/search.js"></script> 
    <script src="../main.js"></script> 
  </body>
</html>