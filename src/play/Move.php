<?php
require_once '../globals/globals.php';
require_once '../play/Game.php';
require_once '../play/FileIO.php';

class Move {
    var $slot;
    var $isWin;
    var $isDraw;
    var $win;
} 

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
