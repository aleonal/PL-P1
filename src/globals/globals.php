<?php
    $strategies = array("smart", "random");

class invalidResponse {
    var $response = false;
    var $reason;

    public function __construct($reason) {
        $this->reason = $reason;
    }
}

class validNewResponse {
    var $response = true;
    var $pid;

    public function __construct($pid) {
        $this->pid = $pid;
    }
}

class playerOnlyResponse {
    var $response = true;
    var $ack_move;

    public function __construct($move) {
        $this->ack_move = $move;
    }
}

class defaultResponse {
    var $response = true;
    var $ack_move;
    var $move;

    public function __construct($move, $computerMove) {
        $this->ack_move = $move;
        $this->move = $computerMove;
    }
}
