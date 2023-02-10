<?php

require_once 'black_tile.php';
require_once 'white_tile.php';

class board_generator
{
    private $tiles;

    public function __construct($aTiles)
    {
        $this->generate_tiles($aTiles);
    }

    private function generate_tiles($aTiles)
    {
        foreach ($aTiles as $tile) {
            if (mb_strlen($tile) === 3) {
                $this->tiles[] = new black_tile($tile);
            } elseif (mb_strlen($tile) === 2) {
                $this->tiles[] = new white_tile($tile);
            } else {
                echo 'there is only two colors lol';
                break;
            }
        }
    }

    public function generate_board(){
        echo'<div class="background">';
        foreach ($this->tiles as $tile){
            echo $tile->get_tile();
        }
        echo'</div>';
    }

}