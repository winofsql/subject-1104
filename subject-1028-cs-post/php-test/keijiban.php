<?php
header( "Content-Type: text/html; charset=utf-8" );
require_once("model.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    writeData();
}

require_once("view.php");
?>