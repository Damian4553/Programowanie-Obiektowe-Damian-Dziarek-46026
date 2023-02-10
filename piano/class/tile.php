<?php

abstract class tile
{
    protected $color;
    protected $name;



    public function __construct($color, $name)
    {
        $this->name = $name;
        $this->color = $color;
    }
    public function get_tile(): string
    {
        return '<div class="tile ' . $this->color .'" id="'.$this->name.'"></div>';
    }
}