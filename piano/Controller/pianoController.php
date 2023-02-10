<?php

require_once ('controller.php');
require_once ('view/pianoView.php');
require_once ('class/board_generator.php');
require_once ('class/piano_tiles_data.php');


class pianoController extends controller
{
    public function index()
    {
        $tilesData = new piano_tiles_data(4,5);
            $board = new board_generator($tilesData->get_titles_data());
        $view = new pianoView([
            'jQueryVersion' => 'jquery-1.7.1.js',
            'board' => $board
        ]);

        $view->index();
    }
}