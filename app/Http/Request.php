<?php
    namespace App\Http;

    class Request{
        private $httpMethod;
        private $uri;
        private $queryParams = [];
        private $postVars = [];
        private $headers = [];

        public function __construct(){
            $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
            $this->uri = $_SERVER['REQUEST_URI'] ?? '';
            $this->queryParams = $_GET ?? [];
            $this->postVars = $_POST ?? [];
            $this->headers = getallheaders();
        }

        public function getHttpMethod(){
            return $this->httpMethod;
        }

        public function getUri(){
            return $this->uri;
        }

        public function getQueryParams(){
            return $this->queryParams;
        }

        public function getPostVars(){
            return $this->postVars;
        }

        public function getHeaders(){
            return $this->headers;
        }
    }
?>