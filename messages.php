<?php
session_start();
include "connection.php";
include "notify.php";
mysqli_query($link,"update message set read1='y' where reciever='$_SESSION[name]'");
?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/studissue1.css">
    <title>Document</title>
</head>
<body>
<!-- THE NAVBAR -->
<div class="container">
    <nav>
        <input type="checkbox" id="nav" class="hidden">
        <label for="nav" class="nav-btn">
            <i></i>
            <i></i>
            <i></i>
        </label>
        <div class="logo">
            <a href="index.html">CTS</a>
        </div>
        <div class="nav-wrapper">
            <ul>
                <li><a href="stud_issue_books.php">My Issued Books</a></li>
                <li><a href="search_books.php">Display Books</a></li>
                <li><a href="order_book.php">Order Books</a></li>
                <li><a href="slogout.php">Logout</a></li>

            </ul>
        </div>
    </nav>
</div>
        <div class="card">
            <h1 class="title">Messages</h1>
            <table class="table table-bordered">
                <tr>
                    <th>User Name</th>
                    <th>Title</th>
                    <th>Messages</th>
                </tr>
                <?php
                $res1=mysqli_query($link,"select * from message where reciever='$_SESSION[name]' order by id desc");
                while($row1=mysqli_fetch_array($res1))
                {
                    $res2=mysqli_query($link,"select * from librarian where name='$row1[source]'");
                    while($row2=mysqli_fetch_array($res2))
                    {
                        $name=$row2["name"];
                    }
                    echo "<tr>";
                        echo "<td>"; echo $name; echo "</td>";
                        echo "<td>"; echo $row1["title"]; echo "</td>";
                        echo "<td>"; echo $row1["msg"]; echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
</body>
</html>