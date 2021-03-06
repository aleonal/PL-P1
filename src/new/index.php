<?php
require_once '../globals/globals.php';
require_once '../play/Game.php';
require_once '../play/FileIO.php';

//checks if URL has required data
if(!array_key_exists("strategy", $_GET)) {
    echo json_encode(new invalidResponse("URL invalid."));
    exit;
}


//checks if strategy field in URL is valid strategy
if($_GET["strategy"] == NULL) {
    echo json_encode(new invalidResponse("Strategy not specified"));
    exit;
} elseif($_GET["strategy"] !== "smart" && $_GET["strategy"] !== "random") {
    echo json_encode(new invalidResponse("Unknown strategy"));
    exit;
}

//creates game instance
$PID = uniqid();
$game = Game::newGame($_GET["strategy"]);

//instantiates game file and writes game state to it
createFile($PID);
writeToFile($PID, json_encode($game));

echo json_encode(new validNewResponse($PID));


