<?php
require_once '../globals/globals.php';
require_once '../play/Game.php';
require_once '../play/FileIO.php';

//checks if URL has strategy field
if(!array_key_exists("strategy", $_GET)) {
    echo json_encode(new invalidResponse("URL invalid."));
    exit;
}

//checks if strategy field in URL is valid strategy
if($_GET["strategy"] == "") {
    echo json_encode(new invalidResponse("Strategy not specified."));
    exit;
} elseif($_GET["strategy"] != "Smart" || $_GET["strategy"] != "Random") {
    echo json_encode(new invalidResponse("Strategy unknown."));
    exit;
}

//creates game instance
$PID = uniqid();
$game = Game::newGame($_GET["strategy"]);

//instantiates game file and writes game state to it
createFile($PID);
writeToFile($PID, json_encode($game));

echo json_encode(new validResponse($PID));
class invalidResponse {
    var $response = false;
    var $reason;

    public function __construct($reason) {
        $this->reason = $reason;
    }
}

class validResponse {
    var $response = true;
    var $PID;

    public function __construct($PID) {
        $this->PID = $PID;
    }
}