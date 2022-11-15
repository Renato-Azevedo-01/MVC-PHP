<?php
    namespace App\Controller\Pages;

    use \App\Utils\View;


    class Linguagens extends Page{

        public static function getLinguagens(){

            $contents = View::render('pages/linguagens', ['linguagens' => 'PHP, JS, REACT, VUE.JS e PYTHON']);

            return parent::getPage('MVC - Linguagens', $contents);

           
        }

        

    }

?>