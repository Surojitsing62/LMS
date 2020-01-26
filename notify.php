<?php
$count=0;
$res=mysqli_query($link,"select * from message where reciever='$_SESSION[name]' && read1='n'");
$count=mysqli_num_rows($res);
?>