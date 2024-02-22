<?php
namespace app\Router;
use app\Controllers\MessageController;
class Router
{
    public $url;
    public $controller;
    public $method;
    public function __construct($url)
    {
        $this->url = $url;
        $this->explodeUrl($url);
    }
    public function routing()
    {
        $data = $this->getDataFromRequest($this->url);
        $instance = new MessageController;
        $method=$this->method;
        $instance->$method($data);
    }
    public  function explodeUrl($url)
    {
        $requestURI =parse_url($url, PHP_URL_PATH) ;
        $requestURI = explode('/', $requestURI);
        ($requestURI[5]=="Messages")?$this->controller ="MessageController":"";
        $this->method = $requestURI[6];
    }
    public  function getDataFromRequest($url)
    {
        $validMethods = ['set', 'delete', 'update', 'get'];
        if (in_array($this->method, $validMethods)) {
            $queryString = parse_url($url, PHP_URL_QUERY);
            parse_str($queryString, $data);
        }
        return $data;
    }

}
