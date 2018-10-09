<?php
function writeToFile($PID, $data = null) {
    $file = '../writable/'.$PID.'.txt';
    $fp = fopen($file, 'a');
    fputs($fp, $data);
    fputs($fp, "\n");
    fclose($fp);
}

function readFromFile($PID) {
    $file = '../writable/'.$PID.'.txt';
    $fp = fopen($file, 'r');
    $data = "";
    while(!feof($fp)) {
        $data = fgets($fp);
        fgets($fp);
        echo "Hello";
    }

    return $data;
}

function createFile($PID) {
    $file = '../writable/'.$PID.'.txt';
    $fp = fopen($file, 'w');
    fclose($fp);
}

function fileFound($PID) {
    $files = scandir('../writable/');
    for($i = 0; $i < count($files); $i++) {
        if($PID.'.txt' === $files[$i]) return true;
    }

    return false;
}