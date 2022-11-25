<?php
    namespace App\Controller\Pages;

    use \App\Utils\View;
    use \App\Model\Entity\Organization;



    class Linguagens extends Page{

        public static function getLinguagens(){

            $obOrganization = new Organization;
            $contents = View::render('pages/linguagens', [
                'linguagens' => 'PHP, JS, REACT, VUE.JS e PYTHON',
                'name' => $obOrganization->name, 
                'description' => $obOrganization->description , 
                'site' => $obOrganization->site,
                'date' => date('d/m/Y'),
                'id'    => $obOrganization->id
            ]);

            return parent::getPage('MVC - Linguagens', $contents);

           
        }

        

    }

?>