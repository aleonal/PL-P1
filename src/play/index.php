<?php

//insert the get the pid conditionals here

if ($_GET["move"] == "") {
    echo json_encode(new invalidResponse("Move not specified"));
    exit;
}
//check if the move is outside boundaries: 0<move<6 (inclusive)
elseif($_GET["move"] < 0 || $_GET["move"] > 6) {
    echo json_encode(new invalidResponse("Invalid slot, " . $_GET["move"]));
    exit;
} 

class invalidResponse {
    var $response = false;
    var $reason;
    
    function __construct($reason) {
        $this->reason = $reason;
    }
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

class invalidResponse {
    var $response = false;
    var $reason;
    
    function __construct($reason) {
        $this->reason = $reason;
    }
}
