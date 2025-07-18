<?php

class Controller {
    
    public function model ($model) {
        require_once 'app/models/' .$model . '.php';
        return new $model();
    }
    
    // public function view ($view, $data = []) {
    //     require_once 'app/views/' . $view .'.php';
    // }


    public function view ($view, $data = []) {
        if (!empty($data)) {
            extract($data);  
        }
        require_once 'app/views/' . $view .'.php';
    }


}


