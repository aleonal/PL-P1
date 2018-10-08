<?php
class Board {
	var $matrix;

	public function __construct(){
	}

	public static function withMatrix($matrix) {
	    $instance = new self();
	    $instance->setBoard($matrix);
        return $instance;
    }

	public static function withoutMatrix() {
	    $instance = new self();
	    $instance->matrix = array(array());
        for ($i = 0; $i < 6; $i++) {
            for ($j = 0; $j < 7; $j++) {
                $instance->matrix[$i][$j] = 0;
            }
        }
        return $instance;
    }

    public function setBoard($matrix) {
        for ($i = 0; $i < 6; $i++) {
            for ($j = 0; $j < 7; $j++) {
                $this->matrix[$i][$j] = $matrix[$i][$j];
            }
        }
    }

}