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
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/material-icons.css">
    <link rel="stylesheet" href="css/return1.css">
    <title>Return Books</title>
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
                    <li><a href="add_books.php">Add Books</a></li>
                    <li><a href="display_books.php">Books Details</a></li>
                    <li><a href="display_order.php">Display Order</a></li>
                    <li><a href="issue_books.php">Issue Books</a></li>
                    <li><a href="stud_notify.php"><i class="material-icons" aria-hidden="true">rate_review</i></a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out" style="font-size: 25px" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <h1 class="title">Return Books</h1>
    <div class="search">
        <form name="form1" action="" method="post">
            <select name="enr">
                <?php
                    $res=mysqli_query($link, "select roll from issue_books");
                    while($row=mysqli_fetch_array($res))
                    {
                        echo "<option>";
                        echo $row["roll"];
                        echo "</option>";
                    }
                ?>
            </select>
            <input type="submit" name="submit1" value="Search">
        </form>
    </div>
    <div class="card">
        <?php
        if(isset($_POST["submit1"]))
        {
            $res=mysqli_query($link, "select * from issue_books where roll='$_POST[enr]' && return_date=''");
            echo "<table>";
                echo "<tr>";
                    echo "<th>"; echo "Roll No."; echo "</th>";
                    echo "<th>"; echo "Name"; echo "</th>";
                    echo "<th>"; echo "Department"; echo "</th>";
                    echo "<th>"; echo "Semester"; echo "</th>";
                    echo "<th>"; echo "Books Name"; echo "</th>";
                    echo "<th>"; echo "Author"; echo "</th>";
                    echo "<th>"; echo "Issue Date"; echo "</th>";
                    echo "<th>"; echo "Return Date"; echo "</th>";
                echo "</tr>";
            while($row=mysqli_fetch_array($res))
            {
                echo "<tr>";
                    echo "<td>"; echo $row["roll"]; echo "</td>";
                    echo "<td>"; echo $row["name"]; echo "</td>";
                    echo "<td>"; echo $row["dept"]; echo "</td>";
                    echo "<td>"; echo $row["sem"]; echo "</td>";
                    echo "<td>"; echo $row["books"]; echo "</td>";
                    echo "<td>"; echo $row["author"]; echo "</td>";
                    echo "<td>"; echo $row["issue_date"]; echo "</td>";
                    echo "<td>"; ?> <a href="return.php?id=<?php echo $row["id"];?>">Return Books</a> <?php echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
    </div>
    </body>
</html>
