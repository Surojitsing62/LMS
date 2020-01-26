<?php
    include "connection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studentlogin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=noto+sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=raleway">
    <link rel="stylesheet" href="css/registration1.css">
</head>

<body>
    <div class="login">
        <h1>Create a new Account</h1>
        <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label>Name</label>
                    <input name="name" class="form-control" type="text" placeholder="Enter your name" required=""/>
                </td>
                <td>
                    <label>Password </label>
                    <input type="password" name="password" placeholder="Enter your password" required=""/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Department</label>
                    <input name="dept" class="form-control" type="text" placeholder="Enter your department" required=""/>
                </td>
                <td>
                    <label>Semester</label>
                    <input name="sem" class="form-control" type="text" placeholder="Enter your Semester" required=""/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Roll No.</label>
                    <input name="roll" class="form-control" type="text" placeholder="Enter your roll no." required=""/>
                </td>
                <td>
                    <label>Phone Number</label>
                    <input name="phone" class="form-control" type="text" placeholder="Enter your phone number" required=""/>
                </td>
            </tr>
        </table>
            <a href="stud_login.php">Already have a account?</a>
            <input type="submit" name="submit1" value="Sign Up">

        </form>
    </div>

    <?php
    if (isset($_POST["submit1"]))
    {
        mysqli_query($link,"insert into student values ('','$_POST[name]','$_POST[dept]','$_POST[sem]','$_POST[roll]','$_POST[phone]','$_POST[password]')");
    ?>
        <script type="text/javascript">
            alert("Accounts Create Successfully");
        </script>
    <?php
    }
    ?>
</body>

</html>