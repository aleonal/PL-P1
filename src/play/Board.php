<?php
class Board {
	var $matrix;

	function __construct(){
	$this->matrix = array(array());	
	for ($i = 0; $i < 6; $i++) {
            for ($j = 0; $j < 7; $j++) {
                $this->matrix[i][j] = 0;
            }
        }
	}
}