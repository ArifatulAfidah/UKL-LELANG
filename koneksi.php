<?php
$conn=mysqli_connect('localhost','root','','lelang');
if (mysqli_connect_error()){
printf("connect failed: %s\n" ,mysqli_connect_error());
exit();
}
?>
