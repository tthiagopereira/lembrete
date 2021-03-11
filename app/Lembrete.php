<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lembrete extends Model
{
    protected $fillable = ['nome','email','data','hora','repeticao','status'];
}
