<?php
    session_start();
    require_once("database.php"); 
    if(!$_SESSION['username']){
?>
        <script type="text/javascript">window.location.href='../index.html';</script>
    <?php
    }
    ?>
    <?php
        if(isset($_POST["changepsw"]))
            {
                $name = $_SESSION['username'];
                $old_password = $_POST["oldpsw"];
                $newpsw= $_POST["newpsw"];
                $conpsw= $_POST["conpsw"];
                require("database.php");
                $qry1 = "SELECT * FROM users where username='$name'";
                $re = pg_query($conn,$qry1);
                $row = pg_fetch_array($re);
                $db_password = $row['password'];

                if(password_verify($old_password,$db_password))
                    {

                        if($newpsw==$conpsw)
                            {
                                $hash = password_hash("$newpsw", PASSWORD_DEFAULT);
                                $qrys="UPDATE users SET password='$hash' WHERE username='$name';";
                                $results= pg_query($conn,$qrys);
                                if($results==true)
                                {
                                session_destroy();
    ?>
                                <script>alert("Password Change Successfully");
                                window.location.href = "../index.html";
                                </script>
                                <?php
                                }else{
                                ?>
                                <script>alert("Password Not Changed");
                                window.location.href =  "profile.php#";
                                </script>
                                <?php
                                }
                                pg_close($conn);
                            }else{
                                ?>
                                <script>alert("Password Not Matched");
                                window.location.href =  "profile.php#";
                                </script>
                                <?php
                            }
                    }else{
                        ?>
                        <script>alert("Old password is wrong");
                        window.location.href = "profile.php#";
                        </script>
                        <?php
                    }
            }
?>