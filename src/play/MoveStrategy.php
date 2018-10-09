<?php
require_once '../play/Move.php';

function smartStrategy(&$board){
    $tempMatrix = $board;
    $tempMove = new Move();
    for ($i = 0; $tempMove->isWin != FALSE; $i ++) {
        $tempMove = new Move($i, $board);
    }
    $slot = $tempMove->slot;
    if($slot == -1){
        $slot = mt_rand(2,4);
    }
    return new Move($slot, $board, TRUE);
}

function randomStrategy(&$board){
    $slot = mt_rand(0, 6);
    return new Move($slot, $board, TRUE);
}