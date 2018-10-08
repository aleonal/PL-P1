<?php
function writeToFile($PID, $data = null) {
    $file = '../writable/instances/'.$PID.'.txt';
    if($data !== null) {
        $fp = fopen($file, 'a');
        fputs($fp, $data);
        fclose($fp);
    }
}

function readFromFile($PID) {
    $file = '../writable/instances/'.$PID.'.txt';
    $fp = fopen($file, 'r');
    $data = fgets($fp);
    fclose($fp);
    return $data;
}

function createFile($PID) {
    $file = '../writable/instances/'.$PID.'.txt';
    $fp = fopen($file, 'w');
    fclose($fp);
}

function fileFound($PID) {
    $files = scandir('../writable/');
    for($i = 0; $i < count($files); $i++) {
        if($PID.'txt' === $files[$i]) return true;
    }

    return false;
}