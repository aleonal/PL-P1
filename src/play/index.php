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

}

if ($_GET["move"] == "") {
    echo json_encode(new invalidResponse("Move not specified"));
    exit;
}
//check if the move is outside boundaries: 0<move<6 (inclusive)
elseif($_GET["move"] < 0 || $_GET["move"] > 6) {
    echo json_encode(new invalidResponse("Invalid slot, " . $_GET["move"]));
    exit;
} 


//Once conditions are satisfied continue

$playerMove = new Move();
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