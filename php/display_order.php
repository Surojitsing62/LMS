<?php
session_start();
if(isset($_SESSION["librarian"]))
{
    ?>
    <script type="text/javascript">
       // window.location="admin-login.php";
    </script>
    <?php
}
include "connection.php";
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
    <link rel="stylesheet" href="css/displayorder1.css">
    <title>Display Books</title>
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
                <li><a href="admin-desk.php">Students Info</a></li>
                <li><a href="add_books.php">Add-books</a></li>
                <li><a href="display-order.php">Display Orders</a></li>
                <li><a href="issue_books.php">Issue Books</a></li>
                <li><a href="return_books.php">Return Books</a></li>
                <li><a href=""><i class="material-icons" aria-hidden="true">search</i></a></li>
                <li><a href="stud_notify.php"><i class="material-icons" aria-hidden="true">rate_review</i></a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out" style="font-size: 25px" aria-hidden="true"></i></a></li>
            </
            </ul>
        </div>
    </nav>
</div>
<div class="search">
    <form name="form1" action="" method="post">
        <input type="text" name="val" placeholder="Enter Books Name, Authors, Publishers">
        <input type="submit" name="submit1" value="Search">
    </form>
</div>
<div class="card">
    <h1 class="title">Orders Books</h1>
    <?php
    if(isset($_POST["submit1"]))
    {
        $res1 = mysqli_query($link, "select * from orders where books like ('%$_POST[val]%') OR author like ('%$_POST[val]%') OR publisher like ('%$_POST[val]%')");
        echo "<table>";
            echo "<tr>";
                echo "<th>"; echo "Books Name"; echo "</th>";
                echo "<th>"; echo "Author"; echo "</th>";
                echo "<th>"; echo "Publisher"; echo "</th>";
                echo "<th>"; echo "Order Date"; echo "</th>";
                echo "<th>"; echo "Students Name"; echo "</th>";
                echo "<th>"; echo "Issue Books"; echo "</th>";
            echo "</tr>";
        while ($row = mysqli_fetch_array($res))
        {
            echo "<tr>";
                echo "<td>"; echo $row["books"]; echo "</td>";
                echo "<td>"; echo $row["author"]; echo "</td>";
                echo "<td>"; echo $row["publisher"]; echo "</td>";
                echo "<td>"; echo $row["date"]; echo "</td>";
                echo "<td>"; echo $row["name"]; echo "</td>";
                echo "<td>"; ?><a href="issue_books.php?books=<?php echo $row["books"];?>">Here</a><?php echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else
    {
        $res = mysqli_query($link, "select * from orders");
        echo "<table>";
            echo "<tr>";
                echo "<th>"; echo "Books Name"; echo "</th>";
                echo "<th>"; echo "Author"; echo "</th>";
                echo "<th>"; echo "Publisher"; echo "</th>";
                echo "<th>"; echo "Order Date"; echo "</th>";
                echo "<th>"; echo "Students Name"; echo "</th>";
                echo "<th>"; echo "Issue Books"; echo "</th>";
            echo "</tr>";
        while ($row = mysqli_fetch_array($res))
        {
            echo "<tr>";
                echo "<td>"; echo $row["books"]; echo "</td>";
                echo "<td>"; echo $row["author"]; echo "</td>";
                echo "<td>"; echo $row["publisher"]; echo "</td>";
                echo "<td>"; echo $row["date"]; echo "</td>";
                echo "<td>"; echo $row["name"]; echo "</td>";
                echo "<td>"; ?><a href="issue_books.php?books=<?php echo $row["books"];?>">Here</a><?php echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</div>
</body>
</html>
