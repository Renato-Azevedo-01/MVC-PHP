<?php

namespace App\Utils;

class View{

    /**
     * Método responsável por retornar o conteúdo de uma view
     * @param string $view
     * @return string
     */ 
    private static function getContentView($view){
        $file = __DIR__ . '/../../resources/view/' .$view . '.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }

    /**
     * Método responsável por retornar o conteúdo RENDERIZADO de uma view
     * @param string $view
     * @param array $vars (strings/numeric)
     * @return string
     */
    public static function render($view, $vars = []){
        //RETORNA O CONTEÚDO DA VIEW
        $contentView = self::getContentView($view);
        //CHAVES DO ARRAY DE VARIÁVEIS
        $keys = array_keys($vars);
        $keys = array_map(function($item){
            return "{{" . $item . "}}";
        }, $keys);
        #var_dump($keys);

        //RETORNA O CONTEÚDO RENDERIZADO
        //Vai substituir os VALORES referentes às KEYS (NAME e DESCRIPTION), 
        //na STRING BASE que é a CONTENTVIEW
        return str_replace($keys,array_values($vars),$contentView);
    }   
}
