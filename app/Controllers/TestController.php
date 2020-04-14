<?php
namespace App\Controllers;

use App\Core\SlimCore;
use App\Lib\Request\Request;
use App\Lib\Routes\Router;

class TestController extends Controller
{
    public function __construct(Request $request, SlimCore $app)
    {
        $this->viewName = "test";
        parent::__construct($request, $app);
    }

    public function test(){
        echo "Blin";
    }

    public function list(){

    }

    public function create(){

    }

    public function update(){

    }

    public function delete()
    {

    }

}
