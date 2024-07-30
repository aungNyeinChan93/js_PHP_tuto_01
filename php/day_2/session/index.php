<?php 
echo "<pre>";
session_start();
session_id();
$_SESSION["key"] = "testing session";

var_dump($_SESSION);