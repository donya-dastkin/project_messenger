<?php
require './asset/app/controller/messages/MessageController.php';

class Router {

    public $src=array();
    public $url_data;
    public $controller;
    public $method;

    public function __construct($url_data)
    {
        $this->url_data=$url_data;
        $this->explodeUrl($url_data);
    }

    public  function explodeUrl($url_data)
    {
        $_SERVER['REQUEST_URI_PATH'] = preg_replace('/\?.*/', '', $url_data);
        $segments = explode('/', trim($_SERVER['REQUEST_URI_PATH'], '/'));
        if(count($segments)>=2){
            $this->controller=$segments[count($segments)-2];
            $this->method=$segments[count($segments)-1];
        }
    }

    public function get_Data($url_data){
        $queryString = parse_url($url_data, PHP_URL_QUERY);
        parse_str($queryString, $data);
        return $data;
    }

    public function url_validation($controller,$method):array{
        $data=[];
        $controllers = ["messages","users"];
        $methods = ["set","update","delete","get"];
        if (in_array($controller, $controllers)) {
            if (in_array($method, $methods)) {
                if($method!=="set"){
                    $data = $this->get_Data($this->url_data);
                }
            }
            switch ($controller) {
                case 'messages':
                    $this->controller = "MessageController";
                    break;
                case 'users':
                    $this->controller = "users";
                    break;
            }
        }else if ($controller==="project_messenge"){
            // $html_content= file_get_contents('../../resource/view/index.html');
            // echo $html_content;
            echo "test";
        }
        return $data;
    }

    public function routing(){
        $data = $this->url_validation($this->controller,$this->method);
        $instance = new $this->controller();
        $method = $this->method;
        $instance->$method($data);
    }
}