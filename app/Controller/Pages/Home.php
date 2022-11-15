<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Home extends Page{

    /**
     * Método responsável por retornar o conteúdo (view) da nossa home
     * @return string
     * a função será STATIC porque a instância não será tão necessária aqui
     */
    public static function getHome(){

        //INSERINDO A MODEL ORGANIZATION.PHP NA VIEW::RENDER DA HOME
        $obOrganization = new Organization;

        //VIEW DA HOME DENTRO DA VARIÁVEL DA SUPERCLASSE PAGE
        $content =  View::render('pages/home', [
            'name' => $obOrganization->name, 
            'description' => $obOrganization->description , 
            'site' => $obOrganization->site,
            'date' => date('d/m/Y')]);

        //RETORNA A VIEW DA PÁGINA
        //Como estou EXTENDIDO, USAMOS O "parent::" ou o "self::"(neste caso se somente houver apenas um método).
        return parent::getPage('HOME-PHP', $content);
    }
}