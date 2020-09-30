<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat application</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".register-box").hide();
            $("#show").click(function() {
                $(".login-box").hide();
                $(".register-box").fadeIn(200);
            });
            $("#hide").click(function() {
                $(".login-box").fadeIn(200);
                $(".register-box").hide();
            });
        });
    </script>
    <?php
    include("db.php");
    ?>
</head>

<body>
    <div class="login-block login-box">
        <center>
            <form action="check-login.php" method="post">
                <input type="text" placeholder="Username" id="username" name="username" class="username" /><br>
                <input type="password" placeholder="Password" id="password" name="password" class="password" /><br>
                <input type="submit" value="Log In" id="loginbutton" name="loginbutton" class="login" />
            </form>
        </center>
        <p style="text-align:center; font-size:14px">Not registered ? <strong style="color:#ff656c" id="show">Create an
                account</strong></p>
    </div>
    <div class="login-block register-box">
        <center>
            <form action="" method="post">
                <input type="text" placeholder="Full Name" id="reg_fullname" name="reg_fullname" class="fullname" /><br>
                <input type="text" placeholder="Username" id="reg_username" name="reg_username" class="username" /><br>
                <input type="password" placeholder="Password" id="reg_password" name="reg_password" class="password" /><br>
                <input type="submit" value="Register" id="newreg" name="newreg" class="login" />
            </form>
            <p style="text-align:center; font-size:14px">Have an account ? <strong style="color:#08C400" id="hide">Sign
                    In</strong></p>
        </center>

        <?php
        if (isset($_REQUEST["newreg"])) {
            $rf = $_POST["reg_fullname"];
            $ru = $_POST["reg_username"];
            $rp = $_POST["reg_password"];

            $q = "insert into user (regfullname,regusername,regpassword) values ('$rf','$ru','$rp')";
            header('location:index.php');
            mysqli_query($conn, $q);
           
        }
        ?>
    </div>
</body>

</html>