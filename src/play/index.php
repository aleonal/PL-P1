<?php
require_once '../globals/globals.php';
require_once '../play/Board.php';
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

//Places player move on board
$playerMove = $board->makeMove($_GET["move"]);



$playerMove = new Move($_GET["move"]);
if($playerMove->isWin) {

    //echo valid response [ach_move(slot, iswin, isdraw, row)]
} elseif($playerMove->isDraw) {
    //echo valid response [ach_move(slot, iswin, isdraw)]
}

//computes computer move


//checks computer move


$opponentMove = new Move();

$playerMove = makePlayerMove($slot);
if ($playerMove->isWin || $playerMove->isDraw) {
    echo createResponse($playerMove);
    exit();
}

$opponentMove = makeOpponentMove();
echo createResponse($playerMove, $opponentMove);

function createResponse($playerMove, $opponentMove = null)
{
    $result = array(
        "response" => true,
        "ack_move" => $playerMove
    );
    if ($opponentMove != null) {
        $result["move"] = $opponentMove;
    }
    return json_encode($result);
}