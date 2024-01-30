<?php
require '/xampp/htdocs/project_messanger/asset/app/Controllers/MessageController.php';

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
    public  function routing()
    {
        $data = $this->getDataFromRequest($this->url);
        $instance = new $this->controller();
        $method = $this->method;
        $instance->$method($data);
    }
}
