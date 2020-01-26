<?php
    session_start();
    include "connection.php";
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student login</title>
        <link rel="stylesheet" href="css/login1.css">
        <link rel="stylesheet" href="css/animate.css">
        <script type="text/javascript" src="js/animate.js"></script>
    </head>

    <body>
        <div class="login animated slideInUp">
            <img src="log.jpg" class="avatar"/>
            <h1>Student Login</h1>
            <form action="" method="post">
                <p>Name</p>
                <input name="name" type="text" placeholder="Enter your name" autocomplete="off">
                <p>Password </p>
                <input name="password" type="password" placeholder="Enter your password" >
                <input name="submit1" type="submit" value="Submit" id="submit">
                <a href="stud_reg.php">Create a new account</a>
            </form>
        </div>
        <?php
    if (isset($_POST["submit1"]))
    {
        $count=0;
        $res=mysqli_query($link,"select * from student where name='$_POST[name]' && password='$_POST[password]'");
        $count=mysqli_num_rows($res);
        echo $count;
        if($count==0)
        {
            ?>
        <script type="text/javascript">
            alert("Invalid Password");
        </script>
    <?php
    }
    else
    {
        $_SESSION["name"]=$_POST["name"];
        ?>
            <script type="text/javascript">
                window.location="stud_issue_books.php";
            </script>
        <?php
    }
    }
    ?>
    </body>
</html>
