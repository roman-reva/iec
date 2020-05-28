<?php

function mq($query) {
    global $conn;
    $res = mysqli_query($conn, $query) or die("MySQL error occurred during execution of query: <br /><br /><pre>".$query."</pre><br /><br /> MySQL says: <b>".mysqli_error($conn)."</b>");
    return $res;
}

function prep($data) {
    return str_replace("'", "\'", $data);
}

function t($obj) {
    print_r($obj);
    exit;
}

global $conn;
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_select_db($conn, DB_NAME);

mq("SET NAMES `utf8`");

?>