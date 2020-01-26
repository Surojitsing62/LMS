<?php include "connection.php"; ?>

<html>
    <head>
        <title>Sk Masum</title>
        <link rel="stylesheet" type="text/css" href="css/desk.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
        <div class="header">
            <h1>Students Desk</h1>
        </div>
        <ul class=nav>
            <li class="navheader"><a class="active" href="admin-desk.php">Students Info</a></li>
            <li class="navheader"><a href="add_books.php">Add Books</a></li>
            <li class="navheader"><a href="search_books.php">Display Books</a></li>
            <li class="navheader"><a href="issue_books.php">Issue Books</a></li>
            <li class="navheader"><a href="return_books.php">Return Books</a></li>
        </ul>       
        <div class="row">
            <div class="column">
                <div class="card">
                    <h1 class="title">Books Details</h1>
                    <?php
                    {
                        $res = mysqli_query($link, "select * from add_books");
                        echo "<table>";
                            echo "<tr>";
                                echo "<th>"; echo "Books Name"; echo "</th>";
                                echo "<th>"; echo "Author"; echo "</th>";
                                echo "<th>"; echo "Publisher"; echo "</th>";
                                echo "<th>"; echo "Available Quantity"; echo "</th>";
                                echo "<th>"; echo "Students List"; echo "</th>";
                            echo "</tr>";
                        while ($row = mysqli_fetch_array($res)) {
                            echo "<tr>";
                                echo "<td>"; echo $row["books"]; echo "</td>";
                                echo "<td>"; echo $row["author"]; echo "</td>";
                                echo "<td>"; echo $row["publisher"]; echo "</td>";
                                echo "<td>"; echo $row["available_qty"]; echo "</td>";
                                echo "<td>"; ?><a href="students_of_books.php?books=<?php echo $row["books"];?>">Click</a><?php echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>