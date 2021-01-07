<!DOCTYPE html>
<html>
<head>
         <link rel="stylesheet" href="../css/style.css">
         <link rel="stylesheet" href="../css/navigation.css">
         <style>
           .adminlogo{
        position: relative; 
        max-width: 100%;
        
        }
    .plogo{
        position: relative;
        height: 33px;
        left: 4px;
        top: 1px;  
        font-family: Poppins;
        font-style: normal;
        font-weight: 300;
        font-size: 35px;
        color: #000000;  
        text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
      }
      .people{
        position: relative;
        font-size: 15px;
        width: 100%;
        left: 190px;
        top: auto;
      }
      hr{
         border: 1px solid black;
      }
      </style>
    
</head>
    <body>
    <?php
    session_start();
    ?>

        <div class="adminlogo">
          <div class="plogo">SOCIODOX</div>
          <div class="people">For Admin</div>
        <div>
        <hr>   
   <header>
      <nav>
        <div class=""nav-wrapper">
  <?php 
   if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']==true){ ?>
            <ul>
              <li> <a href="user_list.php">Users</a></li>
              <li> <a href="donation_list.php">Donation</a></li>
              <li> <a href="admin_blog.php">Blog</a></li>
              <li> <a href="adminlogout.php">Logout</a></li>
            </ul>      
          
              <?php }?>
         </div>
       </nav>
    </header>
   
 </body>
</html>
