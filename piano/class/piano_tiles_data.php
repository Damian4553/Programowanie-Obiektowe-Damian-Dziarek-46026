<?php

class piano_tiles_data
{
    private $letters;
    private $firstOctave;
    private $lastOctave;
    private $data;

    public function __construct($firstOctave, $lastOctave)
    {
        $this->letters = ['C', 'D', 'E', 'G', 'A', 'H'];//black tiles C D F G A
        $this->firstOctave = $firstOctave;
        $this->lastOctave = $lastOctave;
    }

    public function get_titles_data()
    {
        for ($i = $this->firstOctave; $i <= $this->lastOctave; $i++) {
            foreach ($this->letters as $letter) {
                $this->data[] = $letter.$i;
                if(in_array($letter,['C','D','F','G','A'])){
                    $this->data[] = $letter.'b'.$i;
                }
                }
        }
        return $this->data;
    }

}