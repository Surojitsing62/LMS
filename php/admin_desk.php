<?php
include "connection.php";
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=noto+sans">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=raleway">
        <link rel="stylesheet" href="css/admin1.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="fonts/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/material-icons.css">
        <title>Admin Desk</title>
    </head>
    <body>
        <div class="container">
            <nav class="navigation">
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
                        <li><a href="add_books.php">Add Books</a></li>
                        <li><a href="display_books.php">Books Detail</a></li>
                        <li><a href="display_order.php">Display Order</a></li>
                        <li><a href="issue_books.php">Issue Books</a></li>
                        <li><a href="return_books.php">Return Books</a></li>
                        <li><a href=""><i class="material-icons" aria-hidden="true">search</i></a></li>
                        <li><a href="stud_notify.php"><i class="material-icons" aria-hidden="true">rate_review</i></a></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out" style="font-size: 25px" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        
        <div class="search">
            <form name="form1" action="" method="post">
                <input type="text" name="val" placeholder="Enter Name, Roll, Sem, Dept ">
                <input type="submit" name="submit1" value="Search">
            </form>
        </div>
            
        <div class="card animated slideInUp">
        <h1 class="title">Student Details</h1>
            <?php
            if(isset($_POST["submit1"]))
            {
                ?><div id="div1"><table id='table1'><?php
                    $res = mysqli_query($link, "select * from student where name like ('%$_POST[val]%') OR sem like ('%$_POST[val]%') OR roll like ('%$_POST[val]%') OR dept like ('%$_POST[val]') OR phone like ('%$_POST[val]%')");
                    echo "<tr>";
                    echo "<th width='30%'>"; echo "Name"; echo "</th>";
                    echo "<th width='20%'>"; echo "Department"; echo "</th>";
                    echo "<th width='20%'>"; echo "Semester"; echo "</th>";
                    echo "<th width='10%'>"; echo "Roll"; echo "</th>";
                    echo "<th width='20%'>"; echo "Phone"; echo "</th>";
                    echo "</tr>";
                    ?></table></div>
                <div id="div2"><table id='table2'><?php
                    while ($row=mysqli_fetch_array($res))
                    {
                        echo "<tr>";
                        echo "<td width='30%'>"; echo $row["name"]; echo "</td>";
                        echo "<td width='20%'>"; echo $row["dept"]; echo "</td>";
                        echo "<td width='20%'>"; echo $row["sem"]; echo "</td>";
                        echo "<td width='10%'>"; echo $row["roll"]; echo "</td>";
                        echo "<td width='20%'>"; echo $row["phone"]; echo "</td>";
                        echo "</tr>";
                    }
                    ?></table></div><?php
            }
            else
            {
                ?><div id="div1"><table id='table1'><?php
                $res = mysqli_query($link, "select * from student");
                    echo "<tr>";
                        echo "<th width='30%'>"; echo "Name"; echo "</th>";
                        echo "<th width='20%'>"; echo "Department"; echo "</th>";
                        echo "<th width='20%'>"; echo "Semester"; echo "</th>";
                        echo "<th width='10%'>"; echo "Roll"; echo "</th>";
                        echo "<th width='20%'>"; echo "Phone"; echo "</th>";
                    echo "</tr>";
                    ?></table></div>
                <div id="div2"><table id='table2'><?php
                while ($row=mysqli_fetch_array($res))
                {
                echo "<tr>";
                    echo "<td width='30%'>"; echo $row["name"]; echo "</td>";
                    echo "<td width='20%'>"; echo $row["dept"]; echo "</td>";
                    echo "<td width='20%'>"; echo $row["sem"]; echo "</td>";
                    echo "<td width='10%'>"; echo $row["roll"]; echo "</td>";
                    echo "<td width='20%'>"; echo $row["phone"]; echo "</td>";
                    echo "</tr>";
                }
                ?></table></div><?php
            }
            ?>
        </div>
    </body>
</html>