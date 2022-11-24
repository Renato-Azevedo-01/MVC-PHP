<?php
namespace App\Http;
use \Closure;
use \Exception; #Para não precisar ficar digitando BARRA la embaixo
use ReflectionFunction;

class Router{

    private $url = '';
    private $prefix = '';
    private $routes = [];
    private $request;   #É UMA INSTÂNCIA DE REQUEST

    public function __construct($url){
        $this->request  = new Request();
        $this->url      = $url;
        $this->setPrefix() ;
    }

    private function setPrefix(){
        $parseUrl = parse_url($this->url);
        $this->prefix = $parseUrl['path'] ?? '';
        
    }

    /**
     * Método responsável por adicionar uma rota na classe
     * @param string $method
     * @param string $route
     * @param array $params
     * Ela será adicionada à variável(array) $route, a qual identificaremos onde
     * estamos no projeto
     */
    private function addRoute($method,$route,$params = []){

        /* VALIDAÇÃO DOS PARÂMETROS*/

        foreach($params as $key=>$value){
            if($value instanceof Closure){
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        // VARIÁVEIS DA ROTA
        $params['variables'] = [];

        //PADRÃO DE VALIDAÇÃO DAS VARIÁVEIS DAS ROTAS 
        $patternVariable = '/{(.*?)}/';
        if(preg_match_all($patternVariable, $route, $matches)){
            $route = preg_replace($patternVariable,'(.*?)', $route);
            $params['variables'] = $matches[1];
        }


        /* PADRÃO DE VALIDAÇÃO DA URL */
        $patternRoute ='/^' . str_replace('/','\/', $route) . '$/';       

               
        /* ADICIONA A ROTA DENTRO DA CLASSE - EXISTE UM PADRÃO PARA
        ADICIONAR TAMBÉM */
        $this->routes[$patternRoute][$method] = $params;       
    }

    /**
     * Método responsável por definir uma rota de GET
     * @param string $route
     * @param array $params
     * 
     */
    public function get($route,$params = []){
        return $this->addRoute('GET',$route,$params);
    }

     /**
     * Método responsável por definir uma rota de POST
     * @param string $route
     * @param array $params
     * 
     */
    public function post($route,$params =[]){
        return $this->addRoute('POST',$route,$params);
    }

     /**
     * Método responsável por definir uma rota de PUT
     * @param string $route
     * @param array $params
     * 
     */
    public function put($route,$params =[]){
        return $this->addRoute('PUT',$route,$params);
    }

     /**
     * Método responsável por definir uma rota de DELETE
     * @param string $route
     * @param array $params
     * 
     */
    public function delete($route,$params=[]){
        return $this->addRoute('DELETE',$route,$params);
    }

      /**
     * Método responsável por retornar a URI , DESCONSIDERANDO O PREFIXO
     * @return string
     */
    private function getUri(){
        //URI
        $uri = $this->request->getUri();
        
        //fatia a URI com o prefixo
        $xUri = strlen($this->prefix) ? explode($this->prefix,$uri) : [$uri];
        return end($xUri);
    }
    
     /**
     * Método responsável por retornar OS DADOS da ROTA ATUAL
     * @return array
     */
    private function getRoute(){
        //URI
        $uri = $this->getUri();

        //METHOD
        $httpMethod = $this->request->getHttpMethod();       
        
        //VALIDA AS URLs(AS ROTAS, NO CASO)
        foreach($this->routes as $patternRoute => $methods){
            //VERIFICA SE A URI BATE COM O PADRÃO
            if(preg_match($patternRoute,$uri, $matches)){
                //VERIFICA O MÉTODO
                if(isset($methods[$httpMethod])){
                    //REMOVE A PRIMEIRA POSIÇÃO    
                    unset($matches[0]);
                   
                    //CHAVES (variáveis processadas)
                    $keys = $methods[$httpMethod]['variables'];
                    $methods[$httpMethod]['variables'] = array_combine($keys,$matches);
                    $methods[$httpMethod]['variables']['request'] = $this->request;
                    
                    //RETORNO DOS PARÂMETROS DA ROTA
                    return $methods[$httpMethod];

                }
                //MÉTODO NÃO PERMITIDO/DEFINIDO
                throw new Exception("Método não é permitido", 405);
            }          
        }
        //URL NÃO ENCONTRADA
        throw new Exception("URL não encontrada", 404);            
    }

     /**
     * Método responsável por EXECUTAR a ROTA ATUAL
     * 
     * @return instância de Response
     */
    public function run(){
        try{
            #OBTEM A ROTA ATUAL
            $route = $this->getRoute();

            #VERIFICA O CONTROLADOR
            if (!isset($route['controller'])){
                throw new Exception('A URL não pode ser processada',500);
            }
            #ARGUMENTOS DA FUNÇÃO
            $args = [];

            //REFLECTION
            $reflection = new ReflectionFunction($route['controller']);
            
            foreach($reflection->getParameters() as $parameter){
                $name = $parameter->getName();
                $args[$name] = $route['variables'][$name] ?? ''; 
            }

            #RETORNA A EXECUÇÃO DA FUNÇÃO
            return call_user_func_array($route['controller'], $args);

        }catch(Exception $e){
            return new Response($e->getCode(),$e->getMessage());
        }
    }

}
?>