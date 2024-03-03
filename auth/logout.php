<?php
session_start();
session_destroy();

if (!isset($_SESSION['user'])) {
    header("location: auth/login.php");
}
header("location: login.php");
