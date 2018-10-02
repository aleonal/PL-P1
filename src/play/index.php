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

