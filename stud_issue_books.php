<?php
    session_start();
    include "connection.php";
    include "notify.php";
?>

<html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/studissue1.css">
        <title>My Issued Books</title>
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
                    <a href="index.html">CTS Library</a>
                </div>
                <div class="nav-wrapper">
                    <ul>
                        <li><a href="search_books.php">Display Books</a></li>
                        <li><a href="messages.php">Notification</a></li>
                        <li><a href="order_book.php">Orders Books</a></li>
                        <li><a href="slogout.php">Logout</a></li>
                    </ul>
                </div>
                <div class="nav-wrapper">
                    <ul>
                        <li role="presentation" class="dropdown">
                            <a href="messages.php" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge bg-green" onclick="window.location='messages.php';"><?php echo $count; ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- SECTION -->
        <div class="card">
            <h1 class="title">My Issued Books</h1>
            <table>
                <th>Students Roll</th>
                <th>Books Name</th>
                <th>Author Name</th>
                <th>Issue Date</th>
                <th>Return Date</th>
                <?php
                    $res=mysqli_query($link,"select * from issue_books where name='$_SESSION[name]'");
                    while($row=mysqli_fetch_array($res))
                    {
                        echo "<tr>";
                            echo "<td>"; echo $row["roll"]; echo "</td>";
                            echo "<td>"; echo $row["books"]; echo "</td>";
                            echo "<td>"; echo $row["author"]; echo "</td>";
                            echo "<td>"; echo $row["issue_date"]; echo "</td>";
                            echo "<td>"; echo $row["return_date"]; echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </body>
</html>