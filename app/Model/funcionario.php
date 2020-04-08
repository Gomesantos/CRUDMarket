<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class funcionario extends Model
{
    protected $table= 'funcionario';

    protected $fillable = ['nome', 'sobrenome', 'cpf', 'email', 'senha', 'salario'];
    public $timestamps = false;

}