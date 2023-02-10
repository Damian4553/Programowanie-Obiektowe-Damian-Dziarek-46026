<?php

abstract class View{
    protected $aDane=[];
    
    public function __construct($aDane=null){
        if($aDane){
            $this->aDane=$aDane;
        }
    }
    
    public function loadModel($name, $path='model/'){
        $path=$path.$name.'Model.php';
        $name=$name.'Model';
        try{
            if(is_file($path)){
                //require($path);
                $model=new $name();
            }
            else{
                throw new Exception('No model file found '.$name.' in '.$path);
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
        return $model;
    }

    public function render($filename)
    {
        try {
            $plik = __DIR__ . '/../templates/' . $filename . '.html.php';
            if (!file_exists($plik)) {
                throw new Exception('no file ' . $plik);
            }
            foreach ($this->aDane as $key => $val) {
                ${$key} = $val;
            }
            include($plik);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function set($name, $value){
        $this->$name=$value;
        $this->aDane[$name]=$value;
    }
    
    public function get($name){
        if(isset($this->$name))
            return $this->$name;
        else
            return false;
    }
}