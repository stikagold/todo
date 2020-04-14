<?php

namespace App\Lib\Request;

class Request
{
    protected $_get = [];
    protected $_post = [];
    protected $_request = [];

    public function __construct()
    {
        $this->_get = $_GET;
        $this->_post = $_POST;
        $this->_request = $_REQUEST;
    }

    public function method(){
        return $_SERVER['REQUEST_METHOD'];
    }

    public function isAjax(){
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        ){
            return true;
        }
        return false;
    }

    public function post($field = null){
        if($field) {
            if(isset($this->_post[$field])){
                return $this->_post[$field];
            }
            return null;
        }
        return $this->_post;
    }

    public function get($field = null){
        if($field) {
            return $this->_get[$field];
        }
        return $this->_get;
    }

    public function request($field = null){
        if($field) {
            return $this->_request[$field];
        }
        return $this->_request;
    }

}
