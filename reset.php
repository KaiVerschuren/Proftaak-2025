<?php
include 'inc/php/functions.php';
include 'inc/php/dbconnect.php';

initSession();
session_destroy();
header("Location: index.php");