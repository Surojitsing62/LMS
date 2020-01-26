<?php
include "connection.php";
?>
<html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/books1.css">
        <title>Students with the books</title>
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
                        <li><a href="add_books.php">Add-books</a></li>
                        <li><a href="display_books.php">Display Books</a></li>
                        <li><a href="issue_books.php">Issue Books</a></li>
                        <li><a href="return_books.php">Return Books</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    <div class="card">
        <h1 class="title">Students List with this Books</h1>
        <?php
        $res=mysqli_query($link,"select * from issue_books where books='$_GET[books]' && return_date=''");
        echo "<table>";
            echo "<tr>";
                echo "<th>"; echo "Name"; echo "</th>";
                echo "<th>"; echo "Roll"; echo "</th>";
                echo "<th>"; echo "Semester"; echo "</th>";
                echo "<th>"; echo "Department"; echo "</th>";
                echo "<th>"; echo "Books Name"; echo "</th>";
                echo "<th>"; echo "Issue Date"; echo "</th>";
            echo "</tr>";
        while($row=mysqli_fetch_array($res))
        {
            echo "<tr>";
                echo "<td>"; echo $row["name"]; echo "</td>";
                echo "<td>"; echo $row["roll"]; echo "</td>";
                echo "<td>"; echo $row["sem"]; echo "</td>";
                echo "<td>"; echo $row["dept"]; echo "</td>";
                echo "<td>"; echo $row["books"]; echo "</td>";
                echo "<td>"; echo $row["issue_date"]; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </div>
</body>
</html>