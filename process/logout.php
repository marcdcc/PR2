<?php
ob_start();

session_start();
session_destroy();
header("location: ../view/login.php");

ob_end_flush();