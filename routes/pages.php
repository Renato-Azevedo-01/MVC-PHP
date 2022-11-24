<?php
    use \App\Http\Response;
    use \App\Controller\Pages;

    //ROTA HOME
    $obRouter->get('/', [
        function(){
            return new Response(200,Pages\Home::getHome());
        }
    ]);

    //ROTA SOBRE
    $obRouter->get('/about', [
        function(){
            return new Response(200,Pages\About::getAbout());
        }
    ]);

    //ROTA LINGUAGENS
    $obRouter->get('/linguagens', [
        function(){
            return new Response(200,Pages\Linguagens::getLinguagens());
        }
    ]);

    //ROTA DINÂMICA
    $obRouter->get('/pagina/{idPagina}/{acao}', [
        function($idPagina,$acao){
            return new Response(200,'Página ' . $idPagina . ' - ' . $acao );
        }
    ]);
