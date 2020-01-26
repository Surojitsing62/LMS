<?php
include "connection.php";
session_start();
?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=noto+sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=raleway">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/material-icons.css">
    <link rel="stylesheet" href="css/issue1.css">
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
                <a href="index.html"><i class="material-icons">import_contacts</i>CTS Library</a>
            </div>
            <div class="nav-wrapper">
                <ul>
                    <li><a href="admin_desk.php">Students Info</a></li>
                    <li><a href="add_books.php">Add-books</a></li>
                    <li><a href="display_books.php">Books Details</a></li>
                    <li><a href="display_order.php">Display Order</a></li>
                    <li><a href="return_books.php">Return Books</a></li>
                    <li><a href="stud_notify.php"><i class="material-icons" aria-hidden="true">rate_review</i></a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out" style="font-size: 25px" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <h1 class="title">Issue Books</h1>
    <div class="search">
        <form name="form1" action="" method="post">
            <select name="enr"> <?php
                $res=mysqli_query($link,"select roll from student");
                while($row=mysqli_fetch_array($res)) {
                    echo "<option>";
                    echo $row["roll"];
                    echo "</option>";
                } ?>
            </select>
            <input type="submit" value="Search" name="submit1" onclick="showDiv()"/>
            <script type="text/javascript">
                function showDiv() {
                    document.getElementById('div1').style.display = "block";
                }
            </script>
    </div>
    <div id="div1" style="display:none;" class="card">
            <?php
            if(isset($_POST["submit1"])) {
                $res5=mysqli_query($link,"select * from student where roll='$_POST[enr]' ");
                while($row5=mysqli_fetch_array($res5)) {
                    $name=$row5["name"];
                    $dept=$row5["dept"];
                    $sem=$row5["sem"];
                    $roll=$row5["roll"];
                    $phone=$row5["phone"];
                    $_SESSION["roll"]=$roll;
                }
            ?>
                <table>
                        <input type="text" placeholder="Roll No." name="roll" value="<?php echo $roll; ?>" required=""/>
                        <input type="text" placeholder="Student Name" name="name" value="<?php echo $name; ?>" required=""/>
                        <input type="text" placeholder="Department" name="dept" value="<?php echo $dept; ?>" required=""/>
                        <input type="text" placeholder="Semester" name="sem" value="<?php echo $sem; ?>" required=""/>
                        <input type="text" placeholder="Books Name" name="books" required=""/>
                        <input type="text" placeholder="Author Name" name="author" required=""/>
                        <input type="text" placeholder="Issue Date" name="issue" value="<?php echo date("d-m-Y"); ?>" required=""/>
                        <input type="submit" value="Issue Books" name="submit2" required=""/>
                </table>
                <?php
            }
            ?>
        </form>
        <?php
            if(isset($_POST["submit2"])) {
            $qty=0;
            $res1=mysqli_query($link,"select * from add_books where books='$_POST[books]'");
            while($row1=mysqli_fetch_array($res1)) {
                $qty=$row1["available_qty"];
            }
            if($qty==0) { ?>
                <script type="text/javascript">
                    alert("Sorry! At this moment the book is not available");
                    window.location.href = window.location.href;
                </script> <?php
            }
            else {
            mysqli_query($link, "insert into issue_books values ('','$_SESSION[roll]','$_POST[name]','$_POST[dept]','$_POST[sem]','$_POST[books]','$_POST[author]','$_POST[issue]','')");
            mysqli_query($link, "update add_books set available_qty=available_qty-1 where books='$_POST[books]'"); ?>
                <script type="text/javascript">
                    alert ("Books Issued Successfully");
                    window.location.href = window.location.href;
                </script> <?php
            }
        }
        ?>
    </div>
    </body>
</html>
