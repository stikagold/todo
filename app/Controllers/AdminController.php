<?php

namespace App\Controllers;

use App\Core\SlimCore;
use App\Lib\Request\Request;
use App\Lib\Response\Response;
use App\Lib\Routes\Router;
use App\Middlewares\IsAdminMiddleware;
use App\Middlewares\IsSignedInMiddleware;
use App\Models\Todo;

class AdminController extends Controller
{
    public function __construct(Request $request, SlimCore $app)
    {
        $this->viewName = "admin";
        if (!IsSignedInMiddleware::touch($request)) {
            header("Location: /");die;
        } else {
            parent::__construct($request, $app);
        }
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

}
