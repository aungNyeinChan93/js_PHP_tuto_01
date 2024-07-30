<?php 
echo "<pre>";
session_start();
echo session_id() ."<br>";
echo $_SESSION["key"];