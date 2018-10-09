<?php
    require '../globals/globals.php';

    $info = new GameInfo(7, 6, $strategy);
    echo json_encode($info);

class GameInfo {
    var $width;
    var $height;
    var $strategies;

    public function __construct($width, $height, $strategies) {
        $this -> width = $width;
        $this -> height = $height;
        $this -> strategies = $strategies;
    }
}