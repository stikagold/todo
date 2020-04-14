<?php


namespace App\Middlewares;


use App\Lib\Request\Request;

class IsSignedInMiddleware extends BaseMiddleware
{
    public static function touch(Request $request)
    {
        return isset($_SESSION['user']) && !empty($_SESSION['user']);
    }
}
