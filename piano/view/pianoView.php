<?php

require_once ('view.php');

class pianoView extends view
{
    public function index()
    {
        $this->render('piano/index');
    }
}