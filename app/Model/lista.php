<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class lista extends Model
{
    protected $table= 'listaprodutos';

    protected $fillable = ['quantidade', 'fkvenda', 'fkproduto'];
    public $timestamps = false;

    public function vendido()
    {
        return $this->belongsTo('App\Model\venda', 'fkvenda');
    }

}