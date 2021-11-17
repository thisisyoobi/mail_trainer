<?php
session_start();

$db = new mysqli("localhost", "ksj", "qhdks!321", "WebProject");
$db -> set_charset("utf8");

function mq($sql){
    global $db;
    return $db -> query($sql);
}

?>