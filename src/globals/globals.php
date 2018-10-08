<?php
    $strategy = array("smart", "random");


class invalidResponse {
    var $response = false;
    var $reason;

    public function __construct($reason) {
        $this->reason = $reason;
    }
}

class validNewResponse {
    var $response = true;
    var $PID;

    public function __construct($PID) {
        $this->PID = $PID;
    }
}

class playerOnlyResponse {
    var $ack_move;

    public function __construct($move, $winningRow = NULL) {
        if($move->isWin)
            $this->ack_move = array($move->slot, $move->isWin, $move->isDraw, $winningRow);
        else $this->ack_move = array($move->slot, $move->isWin, $move->isDraw);
    }
}

class defaultResponse {
    var $ack_move;
    var $move;

    public function __construct($move, $computerMove, $winningRow = NULL) {
        if($computerMove->isWin) {
            $this->ack_move = array($move->slot, $move->isWin, $move->isDraw);
            $this->move = array($computerMove->slot, $computerMove->isWin, $computerMove->isDraw, $winningRow);
        } else {
            $this->ack_move = array($move->slot, $move->isWin, $move->isDraw);
            $this->move = array($computerMove->slot, $computerMove->isWin, $computerMove->isDraw);
        }
    }
}

