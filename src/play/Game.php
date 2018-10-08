<?php
require_once '../play/MoveStrategy.php';
require_once '../play/Board.php';


class Game {
    var $strategy;
    var $board;

    public function __construct() {
    }

    public static function newGame($strategy, $matrix = NULL) {
        $instance = new self();

        //instantiate strategy
        if($strategy === "Smart")
            $instance->strategy = new SmartStrategy();
        else
            $instance->strategy = new RandomStrategy();

        //instantiate board
        if(empty($matrix))
            $instance->board = Board::withoutMatrix();
        else
            $instance->board = Board::withMatrix($matrix);

        return $instance;
    }

    public static function fromJsonString($data){
        $gameState = json_decode($data);
        $instance = Game::newGame($gameState["strategy"], $gameState["board"]["matrix"]);
		return $instance;
	}
}