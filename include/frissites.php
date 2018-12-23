<?php
include "connect.php";
$projektek_szama = mysqli_fetch_assoc(mysqli_query($conn , "select COUNT(*) id FROM projektek"))["id"];
?>