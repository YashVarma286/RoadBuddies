<?php
require "session1.php";

unset($_SESSION['login1']);
header("location:index.php");
?>