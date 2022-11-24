<?php
namespace App\Utils;
class View{

    /**
     * VARIÁVEIS PADRÕES DA VIEW
     */
    private static $vars = [];

    /**
     * VAI RECEBER UMAS VARIÁVEIS QUE VAI DEFINIR AS VARIÁVEIS "PADRÃO" DENTRO DA
     * NOSSA VIEW , OU SEJA, DEFINIR OS DADOS INICIAIS DA CLASSE
     * @param array $vars
     */
    public static function init($vars = []){
        self::$vars = $vars;
    }

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

        $vars = array_merge(self::$vars,$vars);
        
        //CHAVES DO ARRAY DE VARIÁVEIS
        $keys = array_keys($vars);
        $keys = array_map(function($item){
            return "{{" . $item . "}}";
        }, $keys);
                
        //RETORNA O CONTEÚDO RENDERIZADO
        //Vai substituir os VALORES referentes às KEYS (NAME e DESCRIPTION), 
        //na STRING BASE que é a CONTENTVIEW (Conteúdo da View).
        return str_replace($keys,array_values($vars),$contentView);
    }   
}
