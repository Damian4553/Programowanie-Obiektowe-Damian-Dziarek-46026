<?php

require_once 'tile.php';


/**
 * @property $name
 * @property string $color
 */

class white_tile extends tile
{

    public function __construct($name)
    {
        $this->name = $name;
        $this->color = 'white';
    }

}