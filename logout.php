<?php
require "session.php";

unset($_SESSION['login']);
header("location:index.php");
?>