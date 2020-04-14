<?php


namespace App\Middlewares;


use App\Lib\Request\Request;

abstract class BaseMiddleware
{
    abstract static function touch(Request $request);
}
