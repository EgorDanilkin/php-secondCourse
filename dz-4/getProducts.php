<?php

$link = mysqli_connect('localhost', 'root', '855665', 'shop');

$lastItemReceived = intval(file_get_contents('php://input'));

if ($lastItemReceived | $lastItemReceived === 0) {
    if ($lastItemReceived === 0) {
        $query = mysqli_query($link, "select title, description from product limit 2");
    } else {
        $query = mysqli_query($link, "select title, description from product limit $lastItemReceived, 2");
    }

    $arr = $query->fetch_all(MYSQLI_ASSOC);
    echo json_encode($arr);
}

