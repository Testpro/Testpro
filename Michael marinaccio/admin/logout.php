<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['usertype']);
session_destroy();
header("location:index.htm");
?>