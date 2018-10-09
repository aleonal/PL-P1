<?php
function writeToFile($PID, $data = null) {
    $file = '../writable/'.$PID.'.txt';
    $fp = fopen($file, 'a');
    fputs($fp, $data);
    fclose($fp);
}

function readFromFile($PID) {
    $file = '../writable/'.$PID.'.txt';
    $fp = fopen($file, 'r');
    $data = fgets($fp);

    while(!feof($fp)) {
        if(fgets($fp) === NULL) {
            fclose($fp);
            return $data;
        } else {
            $data = fgets($fp);
        }
    }
}

function createFile($PID) {
    $file = '../writable/'.$PID.'.txt';
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