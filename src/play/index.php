<?php
require_once '../globals/globals.php';
require_once '../play/FileIO.php';
require_once '../play/Game.php';
require_once '../play/Move.php';
require_once '../play/MoveStrategy.php';

//checks if URL has required data
if(!array_key_exists("pid", $_GET) || !array_key_exists("move", $_GET)) {
    echo json_encode(new invalidResponse("URL invalid."));
    exit;
}

//checks if PID specified is valid
if($_GET["pid"] == "") {
    echo json_encode(new invalidResponse("PID not specified."));
    exit;
} elseif(strlen($_GET["pid"]) != 13) {
    echo json_encode(new invalidResponse("PID invalid."));
    exit;
} elseif(!fileFound($_GET["pid"])) {
    echo json_encode(new invalidResponse("Unknown PID."));
    exit;
}

//checks if move specified is valid
if($_GET["move"] == "") {
    echo json_encode(new invalidResponse("Move not specified."));
    exit;
} elseif((int)$_GET["move" < 0 || (int)$_GET["move"] > 6]) {
    echo json_encode(new invalidResponse("Slot ".$_GET["move"]." is invalid."));
    exit;
}

$game = Game::fromJsonString(readFromFile($_GET["pid"]));
$playerMove = new Move($_GET["move"], $game->board);
writeToFile($_GET["pid"], json_encode($game));

//determines if player move was win or draw
if($playerMove->isWin || $playerMove->isDraw) {
    echo json_encode(new playerOnlyResponse($playerMove));
    exit;
}

//calculates computer move
if($game->strategy == "smart")
    $computerMove = smartStrategy($game->board);
else $computerMove = randomStrategy($game->board);
writeToFile($_GET["pid"], json_encode($game));

//returns result
echo json_encode(new defaultResponse($playerMove, $computerMove));