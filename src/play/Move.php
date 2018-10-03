<?php
require_once '../globals/globals.php';
require_once '../play/Game.php';
require_once '../play/FileIO.php';

class Move {
    var $slot;
    var $isWin;
    var $isDraw;
    var $win;

	 function isWin($type){
        $x = $playerMove->slot;
        $y = 5;
        $notDone = 1;
        while (Matrix[$x][$y] === 0) {
            $y --;
        }
        $i = 0;
        while ($notDone || i < 4) {
            $notDone = aux($x, $y, $type, $i);
            $i++;
        }
        return done;
    }

   private function aux($dx, $dy, $pendingName, $ind) {
        $count = 0;
        switch ($ind) {
            case 1:
                while ($dx > 0 || $dy < 5) {
                    $dx --;
                    $dy ++;
                }
                while ($dx < 6 || $dy > 0) {
                    if (Matrix[$dx][$dy] == $pendingName) {
                        $count ++;
                    } else {
                        $count = 0;
                    }
                    $dx ++;
                    $dy --;
                }
                if (count >= 4) {
                    setWinArray($dx, $dy, "NW");
                    return 1;
                }
                break;
            case 2:
                while ($dx > 0) {
                    $dx --;
                }
                while ($dx < 6) {
                    if (Matrix[$dx][$dy] == $pendingName) {
                        $count ++;
                    } else {
                        $count = 0;
                    }
                    $dx ++;
                }
                if (count >= 4) {
                    setWinArray($dx, $dy, "W");
                    return 1;
                }
                break;            
            case 3:
                while ($dx > 0 || $dy > 0) {
                    $dx --;
                    $dy --;
                }
                while ($dx < 6 || $dy < 5) {
                    if (Matrix[$dx][$dy] == $pendingName) {
                        $count ++;
                    } else {
                        $count = 0;
                    }
                    $dx ++;
                    $dy ++;
                }
                if (count >= 4) {
                    setWinArray($dx, $dy, "SW");
                    return 1;
                }
                break;            
            case 4:
                while ($dy > 0) {
                    $dy --;
                }
                while ($dy < 5) {
                    if (Matrix[$dx][$dy] == $pendingName) {
                        $count ++;
                    } else {
                        $count = 0;
                    }
                    $dy ++;
                }
                if (count >= 4) {
                    setWinArray($dx, $dy, "S");
                    return 1;
                }
                break;
            default:
                return 0;
        }
        return 0;
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
