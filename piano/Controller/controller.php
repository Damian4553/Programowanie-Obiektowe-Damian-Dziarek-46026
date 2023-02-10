<?php

abstract class Controller
{

    public $allowed = [];

    public function __construct()
    {
    }

    /**
     *
     * @param string $url
     * @return void
     */
    public function redirect($url)
    {
        header('Location: ' . $url);
        exit();
    }

    /**
     * @return object
     */
    public function loadView($name, $data = NULL)
    {
        $path = $path . $name . 'View.php';
        $name = $name . 'View';
        try {
            //if(is_file($path)){
            //require($path);
            $widok = new $name();
            $widok->set('dane', $data);
            //}
            /*else{
                throw new Exception('Brak pliku widoku '.$name.' w '.$path);
            }*/
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $widok;
    }

    /**
     * @return object
     */
    public function loadModel($name, $path = 'model/')
    {
        $path = $path . $name . 'Model.php';
        $name = $name . 'Model';
        try {
            if (is_file($path)) {
                require($path);
                $model = new $name();
            } else {
                throw new Exception('Brak pliku modelu ' . $name . ' w ' . $path);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
        return $model;

    }

    public function validate($aData)
    {
        $aErrors = [];
        foreach ($aData as $pole => $aRules) {
            $wartosc = $_REQUEST[$pole];
            foreach ($aRules as $rule) {
                if (!$this->checkRule($rule, $wartosc)) {
                    $aErrors[$pole][] = $rule;
                }
            }
        }
        return $aErrors;
    }

    public function checkRule($rule, $wartosc)
    {
        if ($rule == 'required') {
            return $wartosc !== '' && $wartosc !== NULL;
        }
        if (strpos($rule, 'later_than') !== false) {
            $data_od = strtotime($wartosc);
            $data_do = strtotime($_REQUEST[explode('|', $rule)[1]]);
            if ($data_od !== false && $data_do !== false) {
                return $data_od < $data_do;
            }
        }
        return false;
    }
}

?>