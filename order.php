<?php
session_start();
include "connection.php";
?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/order1.css">
    <title>Issue Books</title>
</head>
<body>
<div class="container">
    <nav>
        <input type="checkbox" id="nav" class="hidden">
        <label for="nav" class="nav-btn">
            <i></i>
            <i></i>
            <i></i>
        </label>
        <div class="logo">
            <a href="">CTS</a>
        </div>
        <div class="nav-wrapper">
            <ul>
                <li><a href="admin-desk.php">My Issued Books</a></li>
                <li><a href="display_books.php">Display Books</a></li>
                <li><a href="messages.php">Messages</a></li>
                <li><a href="slogout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
</div>
<h1 class="title">Orders Books</h1>
<div class="card">
    <form name="form1" method="post" action="">
    <?php
    if(isset($_GET["books"]))
    {
        $res=mysqli_query($link,"select * from add_books where books='$_GET[books]' ");
        while($row=mysqli_fetch_array($res))
        {
            $books=$row["books"];
            $author=$row["author"];
            $publisher=$row["publisher"];
        }
        $res1=mysqli_query($link,"select * from student where name='$_SESSION[name]'");
        while($row1=mysqli_fetch_array($res1))
        {
            $name=$row1["name"];
            $roll=$row1["roll"];
            $sem=$row1["sem"];
            $_SESSION["name"]=$name;
        }

    ?>
        <table>
            <input type="text" placeholder="Students Name" name="name" value="<?php echo $name; ?>" required=""/>
            <input type="text" placeholder="Roll No." name="roll" value="<?php echo $roll; ?>" required=""/>
            <input type="text" placeholder="Semester" name="sem" value="<?php echo $sem; ?>" required=""/>
            <input type="text" placeholder="Books Name" name="books" value="<?php echo $books; ?>" required=""/>
            <input type="text" placeholder="Author Name" name="author" value="<?php echo $author; ?>" required=""/>
            <input type="text" placeholder="Publisher" name="publisher" value="<?php echo $publisher; ?>" required=""/>
            <input type="text" placeholder="Date" name="date" value="<?php echo date("d-m-Y"); ?>" required=""/>
            <input type="submit" value="Orders Books" name="submit1" required=""/>
        </table>
    <?php
    }
    ?>
    </form>
    <?php
    if(isset($_POST["submit1"]))
    {
        $qty=0;
        $res1=mysqli_query($link,"select * from add_books where books='$_POST[books]'");
        while($row1=mysqli_fetch_array($res1))
        {
            $qty=$row1["available_qty"];
        }
        if($qty==0)
        {
            ?>
            <script type="text/javascript">
                alert("Sorry! At this moment the book is not available");
                window.location="search_books.php";
            </script>
            <?php
        }
        else
        {
        mysqli_query($link, "insert into orders values ('','$_POST[name]','$_POST[roll]','$_POST[sem]','$_POST[books]','$_POST[author]','$_POST[publisher]','$_POST[date]','no')");
        ?>
            <script type="text/javascript">
                alert ("Order Place Successfully");
                window.location="search_books.php";
            </script>
            <?php
        }
    }
    ?>
</div>
</body>
</html>
