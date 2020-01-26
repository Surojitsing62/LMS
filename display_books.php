<?php
session_start();
include "connection.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=noto+sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=raleway">
    <link rel="stylesheet" href="css/display1.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/material-icons.css">
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
                    <li><a href="admin_desk.php">Student Info</a></li>
                    <li><a href="add_books.php">Add Book</a></li>
                    <li><a href="display_order.php">Display Order</a></li>
                    <li><a href="issue_books.php">Issue Book</a></li>
                    <li><a href="return_books.php">Return Book</a></li>
                    <li><a href="stud_notify.php"><i class="material-icons" aria-hidden="true">rate_review</i></a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out" style="font-size: 25px" aria-hidden="true"></i></a></li>
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
        <h1 class="title">Display Books</h1>
        <?php
            if(isset($_POST["submit1"]))
            {
                ?><div id="div1"><table id='table1'><?php
                $res1 = mysqli_query($link, "select * from add_books where books like ('%$_POST[val]%') OR author like ('%$_POST[val]%') OR publisher like ('%$_POST[val]%')");
                echo "<tr>";
                echo "<th width='20%'>"; echo "Books Name"; echo "</th>";
                echo "<th width='20%'>"; echo "Author"; echo "</th>";
                echo "<th width='20%'>"; echo "Publisher"; echo "</th>";
                echo "<th width='8%'>"; echo "Purchase"; echo "</th>";
                echo "<th width='6%'>"; echo "Total Quantity"; echo "</th>";
                echo "<th width='6%'>"; echo "Available Quantity"; echo "</th>";
                echo "<th width='10%'>"; echo "Students Details"; echo "</th>";
                echo "<th width='10%'>"; echo "Delete"; echo "</th>";
                echo "</tr>";
                ?></table></div>
                <div id="div2"><table id='table2'><?php
                while ($row1=mysqli_fetch_array($res1))
                {
                    echo "<tr>";
                    echo "<td width='20%'>"; echo $row1["books"]; echo "</td>";
                    echo "<td width='20%'>"; echo $row1["author"]; echo "</td>";
                    echo "<td width='20%'>"; echo $row1["publisher"]; echo "</td>";
                    echo "<td width='8%'>"; echo $row1["purchase_date"]; echo "</td>";
                    echo "<td width='6%'>"; echo $row1["total_qty"]; echo "</td>";
                    echo "<td width='6%'>"; echo $row1["available_qty"]; echo "</td>";
                    echo "<td width='10%'>"; ?><a href="students_of_books.php?books=<?php echo $row["books"];?>">Check Here</a><?php echo "</td>";
                    echo "<td width='10%'>"; ?> <a href="delete_books.php?id=<?php echo $row1["id"]; ?>">Delete Books</a> <?php echo "</td>";
                    echo "</tr>";
                }
                ?></table></div><?php
            }
            else
            {
                ?><div id="div1"><table id='table1'><?php
                $res = mysqli_query($link, "select * from add_books");
                echo "<tr>";
                echo "<th width='20%'>"; echo "Books Name"; echo "</th>";
                echo "<th width='20%'>"; echo "Author"; echo "</th>";
                echo "<th width='20%'>"; echo "Publisher"; echo "</th>";
                echo "<th width='8%'>"; echo "Purchase"; echo "</th>";
                echo "<th width='6%'>"; echo "Total Quantity"; echo "</th>";
                echo "<th width='6%'>"; echo "Available Quantity"; echo "</th>";
                echo "<th width='10%'>"; echo "Students Details"; echo "</th>";
                echo "<th width='10%'>"; echo "Delete"; echo "</th>";
                echo "</tr>";
                ?></table></div>
                 <div id="div2"><table id='table2'><?php
                while ($row = mysqli_fetch_array($res))
                {
                    echo "<tr>";
                    echo "<td width='20%'>"; echo $row["books"]; echo "</td>";
                    echo "<td width='20%'>"; echo $row["author"]; echo "</td>";
                    echo "<td width='20%'>"; echo $row["publisher"]; echo "</td>";
                    echo "<td width='8%'>"; echo $row["purchase_date"]; echo "</td>";
                    echo "<td width='6%'>"; echo $row["total_qty"]; echo "</td>";
                    echo "<td width='6%'>"; echo $row["available_qty"]; echo "</td>";
                    echo "<td width='10%'>"; ?><a href="students_of_books.php?books=<?php echo $row["books"];?>">Check Here</a><?php echo "</td>";
                    echo "<td width='10%'>"; ?> <a href="delete_books.php?id=<?php echo $row["id"]; ?>">Delete</a> <?php echo "</td>";
                    echo "</tr>";
                }
                ?></table></div><?php
            }
            ?>
        </div>
    </div>
</body>
</html>
