<!DOCTYPE html>
<html>
<head>
         <link rel="stylesheet" href="../css/style.css">
         <link rel="stylesheet" href="../css/navigation.css">
    
</head>
    <body>
    <?php
    session_start();
    ?>


   
   <h1 align=center>Sociodox.com</h1>
      
     
   
   <header>
      <nav>
        <div class=""nav-wrapper">
  <?php 
   if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
            <ul>
              <li> <a href="user_list.php">Users</a></li>
              <li> <a href="donation_list.php">Donation</a></li>
              <li> <a href="#">Settings</a></li>
              <li> <a href="adminlogout.php">Logout</a></li>
            </ul>      
          
              <?php }?>
         </div>
       </nav>
    </header>
   
 </body>
</html>
