<?php
    session_start();
    include "connection.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/login1.css">
    <link rel="stylesheet" href="css/animate.css">
</head>

<body>
    <div class="login animated slideInUp">
        <img src="log.jpg" class="avatar"/>
        <h1>Admin Login</h1>
        <form action="" method="post">
            <p>Name</p>
            <input name="name" class="form-control" type="text" placeholder="Enter your name" autocomplete="off">
            <p>Password </p>
            <input name="password" class="form-control" type="password" placeholder="Enter your password">
            <input type="submit" name="submit1" value="Login">
        </form>
    </div>
    <?php
    if(isset($_POST["submit1"]))
    {
        $count=0;
        $res=mysqli_query($link,"select * from librarian where name='$_POST[name]' && password='$_POST[password]'");
        $count=mysqli_num_rows($res);
        echo $count;
        if($count==0)
        {
            ?>
             <script type="text/javascript">
                 alert("Invalid user or password!!");
             </script>
    <?php
        }
        else
        {
            $_SESSION["librarian"]=$_POST["name"];
            ?>
            <script type="text/javascript">
                window.location="admin_desk.php";
            </script>
    <?php
        }
    }
    ?>
</body>
</html>