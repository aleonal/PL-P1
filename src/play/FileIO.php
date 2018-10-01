<?php
function writeToFile($PID, $data = null) {
    $file = '../writable/instances/'.$PID;
    if($data !== null) {
        $fp = fopen($file, 'a');
        fputs($fp, $data);
        fclose($fp);
    }
}

function readFromFile($PID) {
    $file = '../writable/instances/'.$PID;
    $fp = fopen($file, 'r');
    $data = fgets($fp);
    fclose($fp);
    return $data;
}

function createFile($PID) {
    $file = '../writable/instances/'.$PID;
    $fp = fopen($file, 'w');
    fclose($fp);
}