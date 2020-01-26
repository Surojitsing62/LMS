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
        <link rel="stylesheet" href="css/style1.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="fonts/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/material-icons.css">
        <script type="text/javascript">
            document.querySelector("html").classList.add('js');
            var fileInput = document.querySelector(".input-file"),
                button = document.querySelector(".input-file-trigger"),
                the_return = document.querySelector(".file-return");
            button.addEventListener("keydown",function (event) {
                if (event.keyCode == 13 || event.keycode ==32) {
                    fileInput.focus();
                }
            });
            button.addEventListener("click", function(event) {
                fileInput.focus();
                return false;
            });
            fileInput.addEventListener("change", function (event) {
                the_return.innerHTML = this.value;
            })
        </script>
        <title>Add Books</title>
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
                        <li><a href="display_books.php">Books Details</a></li>
                        <li><a href="display_order.php">Display Order</a></li>
                        <li><a href="issue_books.php">Issue Books</a></li>
                        <li><a href="return_books.php">Return Books</a></li>
                        <li><a href="stud_notify.php"><i class="material-icons" aria-hidden="true">rate_review</i></a></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out" style="font-size: 25px" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="card animated slideInUp">
            <h1 class="title">Add Books</h1>
            <form name="form1" action="" method="post" enctype="multipart/form-data">
                <label>Books Name</label>
                <input name="books"   type="text" placeholder="Enter the book name" required=""/>
                <label>Author</label>
                <input name="author" type="text" placeholder="Enter author name" required=""/>
                <label>Publisher</label>
                <input name="publisher" type="text" placeholder="Enter the publisher name" required=""/>
                <label>Quantity</label>
                <input name="qty" type="text" placeholder="Enter the quantity of books" required=""/><br/>
                <label>Purcahse Date</label>
                <input name="date" type="text" placeholder="Enter the purchase date of books" value=  <?php echo date("d-m-y"); ?> required=""/>
                <table>
                    <tr>
                        <td>
                            <div class="input-file-container">
                                <input class="input-file" id="my-file" type="file">
                                <label tabindex="0" for="my-file" class="input-file-trigger"><i class="material-icons" aria-hidden="true">cloud_upload</i>Upload Image</label>
                                <p class="file-return"></p>
                            </div>
                        </td>
                        <td>
                            <input type="submit" name="submit1" value="Add Books">
                        </td>
                    </tr>
                </table>



            </form>
        </div>

        <?php
        if (isset($_POST["submit1"]))

        {
            $tm=md5(time());
            $fnm=$_FILES["f1"]["name"];
            $dst="./images/".$tm.$fnm;
            $dst1="images/".$tm.$fnm;
            move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);
            mysqli_query($link,"insert into add_books values ('','$_POST[books]','$dst1','$_POST[author]','$_POST[publisher]','$_POST[date]','$_POST[qty]','')");
            mysqli_query($link,"update add_books set available_qty=total_qty+0 where books='$_POST[books]'");
            ?>
                <script>
                    alert ("Books Added Successfully!!");
                </script>
            <?php
        }
        ?>
    </body>
</html>