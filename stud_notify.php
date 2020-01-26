<?php
    session_start();
    include "connection.php";
    mysqli_query($link,"select * from student where name='$_SESSION[name]' && read1='n'");
?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/notify.css">
    <title>Admin Desk</title>
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
            <a href="index.html">CTS LIBRARY</a>
        </div>
        <div class="nav-wrapper">
            <ul>
                <li><a href="admin_desk.php">Students Info</a></li>
                <li><a href="add_books.php">Add Books</a></li>
                <li><a href="display_books.php">Books Details</a></li>
                <li><a href="display_order.php">Display Orders</a></li>
                <li><a href="issue_books.php">Issue Books</a></li>
                <li><a href="return_books.php">Return Books</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
</div>

<div class="card">
            <h1 class="title">Student Notification</h1>
            <form name="form1" action="" method="post">
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <select name="dest">
                                <?php
                                $res=mysqli_query($link,"select * from student");
                                while($row=mysqli_fetch_array($res))
                                {
                                    ?>
                                <option value="<?php echo $row["name"]?>">
                                    <?php echo $row["name"]."(".$row["roll"].")"; ?>
                                    </option><?php
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="title" placeholder="Enter Title">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea name="msg" placeholder="Enter your messages"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit1" value="Send Message"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php
if(isset($_POST["submit1"]))
{
    mysqli_query($link,"insert into message values('','$_SESSION[librarian]','$_POST[dest]','$_POST[title]','$_POST[msg]','n')") or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
        alert("Send Message Successfully!");
    </script><?php
}
?>
</body>
</html>