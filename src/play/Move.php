<?php
	require_once '../play/Game.php';
        
    class Move {
        var $slot;
        var $isWin;
        var $isDraw;
        var $win;
        
        
        function __construct(){
            $this->slot = -1;
            $this->isWin = FALSE;
            $this->isDraw = FALSE;
            $this->row = array(array());
        }
        
        function __construct($val, &$board){
            $this->row = array(array());
            $this->slot = $val;
            $this->isWin = isWin($board,1);
            $this->isDraw = isDraw();
        }
        
        function __construct($val, &$board, $cond){
            $this->row = array(array());
            $this->slot = $val;
            $this->isWin = isWin($board,-1);
            $this->isDraw = isDraw();
        }
        
        function isWin(&$Matrix,$type){
            $x = $playerMove->slot;
            $y = 5;
            $notDone = 1;
            while ($Matrix[$x][$y] == 0) {
                $y --;
            }
            $i = 0;
            while ($notDone || i < 4) {
                $notDone = aux($x, $y, $Matrix, $type, $i);
                $i++;
            }
            return $notDone;
        }
        
        private function aux($dx, $dy, &$Matrix, $pendingName, $ind) {
            $count = 0;
            switch ($ind) {
                case 1:
                    while ($dx > 0 || $dy < 5) {
                        $dx --;
                        $dy ++;
                    }
                    while ($dx < 6 || $dy > 0) {
                        if ($Matrix[$dx][$dy] == $pendingName) {
                            $count ++;
                        } else {
                            $count = 0;
                        }
                        $dx ++;
                        $dy --;
                    }
                    if ($count >= 4) {
                        setWinArray($dx, $dy, "NW");
                        return TRUE;
                    }
                    break;
                case 2:
                    while ($dx > 0) {
                        $dx --;
                    }
                    while ($dx < 6) {
                        if ($Matrix[$dx][$dy] == $pendingName) {
                            $count ++;
                        } else {
                            $count = 0;
                        }
                        $dx ++;
                    }
                    if ($count >= 4) {
                        setWinArray($dx, $dy, "W");
                        return TRUE;
                    }
                    break;
                case 3:
                    while ($dx > 0 || $dy > 0) {
                        $dx --;
                        $dy --;
                    }
                    while ($dx < 6 || $dy < 5) {
                        if ($Matrix[$dx][$dy] == $pendingName) {
                            $count ++;
                        } else {
                            $count = 0;
                        }
                        $dx ++;
                        $dy ++;
                    }
                    if ($count >= 4) {
                        setWinArray($dx, $dy, "SW");
                        return TRUE;
                    }
                    break;
                case 4:
                    while ($dy > 0) {
                        $dy --;
                    }
                    while ($dy < 5) {
                        if ($Matrix[$dx][$dy] == $pendingName) {
                            $count ++;
                        } else {
                            $count = 0;
                        }
                        $dy ++;
                    }
                    if ($count >= 4) {
                        setWinArray($dx, $dy, "S");
                        return TRUE;
                    }
                    break;
                default:
                    return FALSE;
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
                    return 0;
            }
        }
        
    }
    