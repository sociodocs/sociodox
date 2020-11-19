<!doctype html>
<html>

<head>

    <link rel="stylesheet" href="../css/chatbox.css"/>

    <?php
    include('database.php');
    session_start();
    if (isset($_SESSION['username'])) {
    } else {
        header('location:index.html');
    }
    ?>

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