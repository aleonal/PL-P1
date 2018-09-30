<?php

    class GameInfo {
        var $width;
        var $height;
        var $strategies;

        function __construct($width, $height, $strategies) {
            $this -> width = $width;
            $this -> height = $height;
            $this -> strategies = $strategies;
        }
    }

    $info = new GameInfo(6, 7, array("Smart" => "SmartStrategy", "Random" => "RandomStrategy"));
    echo json_encode($info);