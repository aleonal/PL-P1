<?php
require_once '../globals/globals.php';
require_once '../play/Game.php';
require_once '../play/FileIO.php';

class Move {
    var $slot;
    var $isWin;
    var $isDraw;
    var $win;

	 function isWin($type)
    {
        $x = $playerMove->slot;
        $y = 5;
        $notDone = 1;
        while (Matrix[$x][$y] === 0) {
            $y --;
        }
        $i = 0;
        while ($notDone || i < 4) {
            $notDone = aux($x, $y, $type, $i);
            $i++;
        }
        return done;
    }

	 private function aux($dx, $dy, $pendingName, $ind)
    {
        $count = 0;
        while ($dx > 0 || $dy < 5) {
            $dx --;
            $dy ++;
        }
        while ($dx < 6 || $dy > 0) {
            if (Matrix[$dx][$dy] == $pendingName) {
                $count ++;
            } else {
                $count = 0;
            }
        }
        if (count >= 4) {
            setWinArray($dx, $dy, "NW");
            return 1;
        }
        return 0;
    }
} 
/*
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
*/