<?php
    require __DIR__ . '/vendor/autoload.php' ;

    #use \App\Controller\Pages\Linguagens; => Transferi para a pasta "routes/pages.php"
    #use \App\Controller\Pages\Home;  => Transferi para a pasta "routes/pages.php"
    #use \App\Http\Response;          => Transferi para a pasta "routes/pages.php"
    use \App\Http\Router;
    use \App\Utils\View;
    

    define('URL', 'http://localhost/MVC-PHP');
    View::init([
        'URL' => URL
    ]);
    
    #use App\Http\Request;
    #echo Linguagens::getLinguagens();
    #$obResponse = new App\Http\Response(404,'FAAAAAALA QUE EU TE ESCUTO !!!');
    #$obResponse->sendResponse();
    $obRouter = new Router(URL);
    
   include __DIR__ . '/routes/pages.php';

    /* IMPRIME O RESPONSE DA ROTA
    o $obRouter->run RECEBE UMA INSTÂNCIA DE RESPONSE, LOGO, PODEMOS 
    CHAMAR O MÉTODO ->sendResponse DA CLASSE Response */

    $obRouter->run()
             ->sendResponse();
    
?>