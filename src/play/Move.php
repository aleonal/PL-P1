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
                $this->isWin($board, 1);
            } else { //computer move
                $this->placeMove($board, $this->slot, -1);
                $this->isWin($board, -1);
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

        function isWin($Matrix, $type){
            //checks for win in horizontal
            for($i = 0; $i < 6; $i++) {
                $counter = 0;
                for($j = 0; $j < 7; $j++) {
                    if($Matrix[$i][$j] == $type) {
                        $counter++;
                    } else $counter = 0;

                    if($counter == 4) {
                        $this->isWin = TRUE;
                        $this->setWinArray(array($j-3, $j-2, $j-1, $j), $i, "E");
                        return true;
                    }
                }
            }

            //checks for win in vertical
            for($i = 0; $i < 6; $i++) {
                $counter = 0;
                for($j = 0; $j < 7; $j++) {
                    if($Matrix[$j][$i] == $type) {
                        $counter++;
                    } else $counter = 0;

                    if($counter == 4) {
                        $this->isWin = TRUE;
                        $this->setWinArray(array($i-3, $i-2, $i-1, $i), $j, "S");
                        return true;
                    }

                }
            }

            //checks for diagonal
            for($i = 0; $i < 6; $i++) {
                for($j = 0; $j < 7; $j++) {
                    $counter = 1;
                    $dx = $j;
                    $dy = $i;

                    //top right
                    while($Matrix[$dy][$dx] == $type) {
                        if($Matrix[$dy - 1][$dx + 1] == $type) {
                            $counter += 1;
                            $dx = $j + 1;
                            $dy = $i - 1;

                        } else break;

                        if($counter == 4) {
                            $this->setWinArray($Matrix, $type, $j, "NE");
                            return true;
                        }
                    }
                    $counter = 0;
                    $dx = $j;
                    $dy = $i;

                    //top left
                    while($Matrix[$dy][$dx] == $type) {
                        if($Matrix[$dy - 1][$dx - 1] == $type) {
                            $counter += 1;
                            $dx = $j - 1;
                            $dy = $i -1;
                        } else break;

                        if($counter == 4) {
                            $this->setWinArray($Matrix, $type, $j, "NW");
                            return true;
                        }
                    }
                    $counter = 0;
                    $dx = $j;
                    $dy = $i;

                    //bottom left
                    while($Matrix[$dy][$dx] == $type) {
                        if($Matrix[$dy + 1][$dx - 1] == $type) {
                            $counter += 1;
                            $dx = $j - 1;
                            $dy = $i + 1;
                        }else break;

                        if($counter == 4) {
                            $this->setWinArray($Matrix, $type, $j, "SW");
                            return true;
                        }

                    }
                    $counter = 0;
                    $dx = $j;
                    $dy = $i;

                    //bottom right
                    while($Matrix[$dy][$dx] == $type) {
                        if($Matrix[$dy + 1][$dx + 1] == $type) {
                            $counter += 1;
                            $dx = $j + 1;
                            $dy = $i + 1;
                        } else break;

                        if($counter == 4) {
                            $this->setWinArray($Matrix, $type, $j, "SE");
                            return true;
                        }
                    }
                }
            }
            return FALSE;
        }
        
        function setWinArray($array, $index, $orientation){
            $win = array(0, 0, 0, 0, 0, 0, 0, 0);

            switch($orientation) {
                case "E": {
                    for($j = 0; $j < 3; $j++) {
                        $win[$j] = $array[$j];
                        $win[$j + 1] = $index;
                    }
                    break;
                } case "S": {
                    for($j = 0; $j < 3; $j++) {
                        $win[$j] = $index;
                        $win[$j + 1] = $array[$j];
                    }
                    break;
                }
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