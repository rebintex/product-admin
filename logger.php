<?php

function mylog($message) {
    file_put_contents('log.txt', $message, FILE_APPEND);
}