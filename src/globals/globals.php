<?php
    $strategy = array("Smart" => "SmartStrategy", "Random" => "RandomStrategy");


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