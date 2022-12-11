<?php

function connect()
{
    $conn = new mysqli("localhost", "root", "", "otrsphp");
    if (!$conn) die("База данных обновлена!");
    return $conn;
}
$conn = connect();
if (!$conn) die("База данных обновляется!");

