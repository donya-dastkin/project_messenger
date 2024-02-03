<?php
namespace project\router;
use project\controller\messages\MessageController;

class Router {

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

    public function url_validation($controller,$method){
        $is_data =false;
        $data=[];
        $controllers = ["messages","users"];
        $methods = ["set","update","delete","get"];
        if (in_array($controller, $controllers)) {
            if (in_array($method, $methods)) {
                if($method!=="get"){
                    $data = $this->get_Data($this->url_data);
                    $is_data=true;
                }
            }
            switch ($controller) {
                case 'messages':
                    $this->controller =new MessageController;
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
        if($is_data){
            return $data;
        }
    }

    public function input_Extraction($data,$instance,$method){
        if($data!==null){
            $data_Array = array(); 
            foreach ($data as $value) {
                $data_Array[] = $value; 
            }
            if(count($data_Array)==1){
                $instance->$method($data);
            }else if(count($data_Array)==2){
                $instance->$method($data_Array[0],$data_Array[1]);
            }
        }else{
            $instance->$method();
        }


    }
    
    public function routing(){
        $data = $this->url_validation($this->controller,$this->method);
        $instance = $this->controller;
        $method = $this->method;
        $this->input_Extraction($data,$instance,$method);
    }
}