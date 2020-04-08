<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class venda extends Model
{
    protected $table= 'venda';

    protected $fillable = ['valor', 'fkcliente', 'fkfuncionario', 'data'];
    public $timestamps = false;

    public function listagem()
    {
        return $this->hasMany('App\Model\lista');
    }

}