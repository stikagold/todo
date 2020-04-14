<?php


namespace App\Controllers;


use App\Core\SlimCore;
use App\Lib\Request\Request;

abstract class Controller
{
    protected $viewName = "";

    protected $app = null;
    protected $request = null;

    public function __construct(Request $request, SlimCore $app)
    {
        $this->app = $app;
        $this->request = $request;
    }

    abstract public function list();
    abstract public function create();
    abstract public function update();
    abstract public function delete();

    public function view(){
        include($this->app->getEnv('view_path').$this->viewName.".php");
    }

    public function response(){
        $method = $this->request->method();
        switch($method){
            case 'GET':{
                return $this->list();
            }
            case 'POST':{
                if($this->request->post("action")){
                    $action = $this->request->post("action");
                    return $this->$action();
                }
                return $this->create();
            }
            case 'PUT':{
                return $this->update();
            }
            case 'DELETE':{
                return $this->delete();
            }
            case 'OPTIONS':{
                return 1;
            }
            default:{
                throw new \Exception("Unknown method of request");
            }
        }
    }

}
