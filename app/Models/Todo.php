<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Todo extends Eloquent{

    protected $table = "tasks";

    public $timestamps = false;

    protected $fillable = ['email', 'username', 'task'];

}
