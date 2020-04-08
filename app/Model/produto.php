<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    protected $table= 'produto';

    protected $fillable = ['nome', 'categoria', 'preco'];
    public $timestamps = false;

}