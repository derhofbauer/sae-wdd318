<?php

static class DB {
    $host = '127.0.0.1';

    function getLink() {
        // ...
    } 
}

$link = DB::getLink();
echo DB::$host;

?>