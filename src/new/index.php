<?php
require_once '../globals/globals.php';
require_once '../play/Game.php';
require_once '../play/FileIO.php';

$response = false;

if(!array_key_exists(array_keys($strategy), $_GET)) {
    if(array_key_exists("Unknown", $_GET))
        $reason = "Strategy unknown.";
    elseif(array_key_exists(null, $_GET))
        $reason = "Strategy not specified.";

    echo json_encode($response, $reason);
    exit;
}

//creates game instance
$response = true;
$PID = uniqid();
$game = new Game($_GET["strategy"]);

//instantiates game file and writes game state to it
createFile($PID);
writeToFile($PID, json_encode($game));

echo json_encode($response, $PID);