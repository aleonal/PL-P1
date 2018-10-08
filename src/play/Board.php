<?php
class Board {
	var $matrix;

	public function __construct(){
	}

	public static function withMatrix($matrix) {
	    $instance = new self();

        for ($i = 0; $i < 6; $i++) {
            for ($j = 0; $j < 7; $j++) {
                $instance->matrix[$i][$j] = $matrix[$i][$j];
            }
        }

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
}