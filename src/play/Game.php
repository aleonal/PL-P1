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

	static function fromJsonString($json){
		$obj = json_decode($json);
		$strategy = $obj->{'strategy'};
		$board = $obj->{'board'};
		$game = new Game();
		$game->board = Board::fromJson($board);
		$name = $strategy->{'name'};
		$game->strategy = $name::fromJson($strategy);
		$game->strategy->board = $game->board;
		return $game;
	}
}