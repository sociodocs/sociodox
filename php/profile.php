<?php
    include('database.php');
    session_start();
    if(isset($_SESSION['email'])) {
    } else {
      header('location:../index.html');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Profile-Page</title>
      <link rel="stylesheet" href="../css/profile.css">
      <link rel="stylesheet" href="../main.css">
  </head>
  <body>
    <div class="profile">
      <div class="box header1">
        <div class="plogo">SOCIODOX</div>
        <div class="people">For people</div>
      </div>
      <div class="box header2">
        <form action="#" method="POST"> 
          <div align=center class="search">
                <div id="sbar"><input type="search" name="search" id="search"  placeholder="Search For Organization" autocomplete="off" onkeyup="Search()"/></div>               
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
        </div><br>
        <a id="show-all">Show all</a>
      </div>
      <div class="box sidebar2"><br>
        <a id="settings" href="#"><h3>Settings</h3></a><br>
          <div id="inside">
            <img id="elogo" src="../logo/edit.png"/>
            <a id="edit" href="#">Edit Profile</a><br><br>
            <img id="elogo" src="../logo/padlock.png"/>
            <a id="cpass" href="#">Change Password</a><br>
          </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>           
            <a id="lout" href="logout.php">Logout</a> 
        </div>
      <div class="box main">        
        <div id="chat-section">        
            <?php include("profile-php/chat.php");?>
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
                      <?php
                        $username=$_SESSION['username'];
                          $c = "SELECT count(msg) as c FROM finalchat";                        
                        $comme = pg_query($conn,$c);
                        $row = pg_fetch_assoc($comme);
                        $comment = $row['c'];
                        echo $comment;
                        ?>
                  <h5>Comments</h5>
                </div>
                <div class="d">
                    <?php
                     $semail=$_SESSION['email'];
                     $smobile=$_SESSION['mobile_no'];
                     $dsql = pg_query($conn,"select sum(amount) as amount_sum from donation where email='$semail' and mobile_no='$smobile'");                    
                         $row = pg_fetch_assoc($dsql);
                         $sum = $row['amount_sum'];                        
                         ?>
                         <h4><?php echo $sum;?></h4>
                  <h5>Donation</h5>                
                </div>
              </div>          
        </div>
        <div id="show-all-section">
          All Organization
          <div id="show-joined-org">
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
          </div>
        </div>
        <div id="sorg-section">
            <h3>Selected Organization details:</h3>
        </div>
        <div id="settings-section">
          Settings
        </div>
        <div id="edit-section">          
          <div class="dprofile-card">
              <div class="dprofile">
                <img src="<?php echo $_SESSION['dp'];?>" class="dprofile-dp">
                <img id="editdp" src="../logo/edit-DP.png"/>
              </div>
          </div>         
          <div class="edit-p">
            <form method="POST" action="editprofile.php" enctype="multipart/form-data">
              <div id="ep"><input type="file" name="p" id="p" default="$_SESSION['dp']"/></div>
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
                <!-- <div id="row5">
                  <div>Username</div>
                </div>
                <div id="row6">
                  <div><input type="text" id="pusername" placeholder="" name="username" onkeyup="showHint(this.value)"></div>
                </div> -->
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