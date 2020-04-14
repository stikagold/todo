<?php


namespace App\Middlewares;


use App\Lib\Request\Request;

class IsAdminMiddleware extends BaseMiddleware
{
    public static function touch(Request $request)
    {
        if(($request->post('login') === "admin" && $request->post("password") === 123) || session_id())
            return true;

        return false;
    }
}
