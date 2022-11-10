<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Home {

    /**
     * Método responsável por retornar o conteúdo (view) da nossa home
     * @return string
     * a função será STATIC porque a instância não será tão necessária aqui
     */
    public static function getHome(){
        //return 'Olá mundo!';
        return View::render('pages/home', ['name' => 'Renato', 'description' => 'Estudo de MVC com PHP' , 'data' => date('d/m/Y')]);
    }
}