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
    <link rel="stylesheet" href="css/searchbooks1.css">
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
            <a href="index.html">CTS LIBRARY</a>
        </div>
        <div class="nav-wrapper">
            <ul>
                <li><a href="stud_issue_books.php">My Issued Books</a></li>
                <li><a href="order_book.php">Order Books</a></li>
                <li><a href="messages.php">Messages</a></li>
                <li><a href="slogout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
</div>

        <div class="search">
            <form name="form1" action="" method="post">
                <input type="text" name="val" placeholder="Enter Books Name, Books Author, Books Publisher">
                <input type="submit" name="submit1" value="Search Books">
            </form>
        </div>
<h1 class="title">Display Books</h1>
    <div class="card">
            <?php
            if(isset($_POST["submit1"]))
            {
                $i=0;
                $res1 = mysqli_query($link, "select * from add_books where books like ('%$_POST[val]%') OR author like ('%$_POST[val]%') OR publisher like ('%$_POST[val]%')");
                echo "<table>";
                    echo "<tr>";
                        while ($row1 = mysqli_fetch_array($res1))
                        {
                            $i=$i+1;
                            echo "<td>"; ?> <img src="<?php echo $row1["images"]; ?>" height="180" width"120"> <?php echo "<br>";
                            echo "<b>".$row1["books"]."</b>"; echo "<br>";
                            echo "<b>".$row1["author"]."</b>"; echo "<br>";
                            echo "<b>".$row1["available_qty"]."</b>"; echo "</td>";
                            echo "<td>";?><a href="order.php?books=<?php echo $row["books"];?>">Order Here</a><?php echo "</td>";
                            if($i==6)
                            {
                                echo "</tr>";
                                echo "<tr>";
                                $i=0;
                            }
                        }
                    echo "</tr>";
                echo "</table>";
            }
            else {
                $i=0;
                $res = mysqli_query($link, "select * from add_books");
                echo "<table>";
                   echo "<tr>";
                while ($row = mysqli_fetch_array($res)) {
                    $i=$i+1;
                    echo "<td>"; ?> <img src="<?php echo $row["images"]; ?>" height="180" width="120"> <?php echo "<br>";
                    echo "<b>".$row["books"]."</b>"; echo "<br>";
                    echo "<b>".$row["author"]."</b>"; echo "<br>";
                    echo "<b>"."Available Quantity :"?><a href="order.php?books=<?php echo $row["books"];?>"><?php echo $row["available_qty"] ?></a><?php
                    echo "</td>";
                    if($i==6)
                    {
                        echo "</tr>";
                        echo "<tr>";
                        $i=0;
                    }
                }
                    echo "</tr>";
                echo "</table>";
            }
            ?>
        </div>
</body>
</html>