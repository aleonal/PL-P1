<?php
//Antoine Leon
//Ricardo Sanchez
	require_once '../play/Game.php';
        
    class Move {
        var $slot;
        var $isWin;
        var $isDraw;
        var $row;
        
        
        function __construct($slot, &$board, $condition = NULL){
            $this->slot = $slot;
            $this->row = array();

            //player move
            if(!$condition) {
                $this->placeMove($board, $this->slot, 1);
                $this->isWin = $this->isWin($slot, $board, 1);
            } else { //computer move
                $this->placeMove($board, $this->slot, -1);
                $this->isWin = $this->isWin($slot, $board, -1);
            }

            $this->isDraw = $this->isDraw($board);

        }

        private function placeMove(&$board, $slot, $type) {
            $i = 0;

            while($board[$i][$slot] === 0) {
                $i += 1;
            }
            $board[$i - 1][$slot] = $type;
        }

        function isWin($slot, &$Matrix, $type){

            //checks for win in horizontal
            for($i = 0; $i < 6; $i++) {
                $counter = 0;
                for($j = 0; $j < 7; $j++) {
                    if($Matrix[$i][$j] == $type) {
                        $counter++;
                    } else $counter = 0;

                    if($counter == 4)
                        return TRUE;
                }
            }

            //checks for win in vertical
            for($i = 0; $i < 6; $i++) {
                $counter = 0;
                for($j = 0; $j < 7; $j++) {
                    if($Matrix[$j][$i] == $type) {
                        $counter++;
                    } else $counter = 0;

                    if($counter == 4)
                        return TRUE;
                }
            }

            //checks for diagonal (fill)
            for($i = 0; $i < 6; $i++) {
                for($j = 0; $j < 7; $j++) {
                    $counter = 0;
                    $dx = $j + 1;
                    $dy = $i - 1;

                    //top right
                    while($Matrix[$dy][$dx] == $type && $dx >= 0 && $dx < 7 && $dy >= 0 && $dy < 6) {
                        $counter += 1;
                        if($Matrix[$dy - 1][$dx + 1] == $type) {
                            $dx += 1;
                            $dy -= 1;
                        } else break;
                        if($counter == 4)
                            return TRUE;
                    }
                    $counter = 0;
                    $dx = $j - 1;
                    $dy = $i -1;

                    //top left
                    while($Matrix[$dy][$dx] == $type && $dx >= 0 && $dx < 7 && $dy >= 0 && $dy < 6) {
                        $counter += 1;
                        if($Matrix[$dy - 1][$dx - 1] == $type) {
                            $dx -= 1;
                            $dy -= 1;
                        } else break;
                        if($counter == 4)
                            return TRUE;
                    }
                    $counter = 0;
                    $dx = $j - 1;
                    $dy = $i + 1;

                    //bottom left
                    while($Matrix[$dy][$dx] == $type && $dx >= 0 && $dx < 7 && $dy >= 0 && $dy < 6) {
                        $counter += 1;
                        if($Matrix[$dy + 1][$dx - 1] == $type) {
                            $dx -= 1;
                            $dy += 1;
                        }else break;
                        if($counter == 4)
                            return TRUE;
                    }
                    $counter = 0;
                    $dx = $j + 1;
                    $dy = $i + 1;

                    //bottom right
                    while($Matrix[$dy][$dx] == $type && $dx >= 0 && $dx < 7 && $dy >= 0 && $dy < 6) {
                        $counter += 1;
                        if($Matrix[$dy + 1][$dx + 1] == $type) {
                            $dx += 1;
                            $dy += 1;
                        } else break;
                        if($counter == 4)
                            return TRUE;
                    }
                }
            }
            return FALSE;
        }
        
        function setWinArray($x, $y, $direction){
            switch ($direction) {
                case "NW":
                    for ($i = 3; $i >= 0; $i--) {
                        $win[$i * 2] = $x;
                        $win[$i * 2 + 1] = $y;
                        $y--;
                        $x++;
                    }
                    break;
                case "W":
                    for ($i = 3; $i >= 0; $i--) {
                        $win[$i * 2] = $x;
                        $win[$i * 2 + 1] = $y;
                        $x++;
                    }
                    break;
                case "SW":
                    for ($i = 3; $i >= 0; $i--) {
                        $win[$i * 2] = $x;
                        $win[$i * 2 + 1] = $y;
                        $x++;
                        $y++;
                    }
                    break;
                case "S":
                    for ($i = 3; $i >= 0; $i--) {
                        $win[$i * 2] = $x;
                        $win[$i * 2 + 1] = $y;
                        $y++;
                    }
                    break;
                default:
                    return;
            }
        }

        function isDraw($board){
            for($i=0;$i<7;$i++){
                if($board[$i][5] == 0) {
                    return FALSE;
                }
            }
            return TRUE;
        }
    }