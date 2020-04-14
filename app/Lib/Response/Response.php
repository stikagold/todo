<?php

namespace App\Lib\Response;

class Response
{

    protected $data = null;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function __toString(){
        return json_encode($this->data);
    }

}
