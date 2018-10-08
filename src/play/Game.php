<?php
require_once '../play/MoveStrategy.php';
require_once '../play/Board.php';


class Game {
    var $strategy;
    var $board;

    public function __construct() {
    }

    public static function newGame($strategy, $board = NULL) {
        $instance = new self();
        $instance->strategy = $strategy;

        //instantiate board
        if(empty($board)) {
            for ($i = 0; $i < 6; $i++) {
                for ($j = 0; $j < 7; $j++) {
                    $instance->board[$i][$j] = 0;
                }
            }
        } else {
            for ($i = 0; $i < 6; $i++) {
                for ($j = 0; $j < 7; $j++) {
                    $instance->board[$i][$j] = $board[$i][$j];
                }
            }
        }

        return $instance;
    }

    public static function fromJsonString($data){
        $gameState = json_decode($data);
        $instance = Game::newGame($gameState["strategy"], $gameState["board"]);
		return $instance;
	}
}