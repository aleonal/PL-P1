<?php
require_once '../play/MoveStrategy.php';
require_once '../play/Board.php';


class Game {
    var $strategy;
    var $board;

    function __construct($strategy) {
        if($strategy === "Smart")
            $this->strategy = new SmartStrategy();
        else
            $this->strategy = new RandomStrategy();

        $this->board = new Board();
    }
}