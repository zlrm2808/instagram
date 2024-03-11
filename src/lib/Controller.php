<?php

    namespace Zlrm2\Instagram\lib;

    use Zlrm2\Instagram\lib\View;
    
    class Controller{

        private View $view;

        public function __construct(){
            $this->view = new View();
        }

        protected function render(string $name, array $data = []){
            $this->view->render($name, $data);
        }

        protected function post(string $param){
            if(!isset($_POST[$param])){
                return NULL;
            }
            return $_POST[$param];
        }

        protected function get(string $param){
            if(!isset($_GET[$param])){
                return NULL;
            }
            return $_GET[$param];
        }

        protected function file(string $param){
            if(!isset($_FILES[$param])){
                return NULL;
            }
            return $_FILES[$param];
        }

    }