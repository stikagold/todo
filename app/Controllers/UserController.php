<?php

namespace App\Controllers;

use App\Core\SlimCore;
use App\Lib\Request\Request;
use App\Lib\Response\Response;
use App\Lib\Routes\Router;
use App\Middlewares\IsAdminMiddleware;
use App\Middlewares\IsSignedInMiddleware;
use App\Models\Todo;

class UserController extends Controller
{
    public function __construct(Request $request, SlimCore $app)
    {
        $this->viewName = "user";
        parent::__construct($request, $app);
    }

    public function test()
    {
        echo "Blin";
    }

    public function list()
    {
        $this->view();
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function login(){
        if($this->request->post("login") === "admin" && $this->request->post("password") == 123){
            $_SESSION['user'] = $this->request->post("login");
            return new Response([
                "status" => 1
            ]);
        }
        return new Response([
            "status" => 0,
            "message" => "Неправильные реквизити доступа"
        ]);
    }

    public function logout(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
        return new Response([
            "status" => 1
        ]);
    }

}
