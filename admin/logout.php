<?php
session_start();

if (isset($_POST['logout'])) {
    unset($_SESSION['username']);
    header("Location:index.php");
    exit;
} else {
    header("Location:../index.php");
    exit;
}