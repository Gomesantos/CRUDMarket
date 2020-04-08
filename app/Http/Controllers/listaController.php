<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\lista;


class listaController extends Controller
{
    private $modelo;

    public function __construct(lista $lista)
    {
        $this->modelo = $lista;
    }

    public function getAll(){
        
        $lista=$this->modelo->all();

        if($lista == NULL){
            return "Não temos produtos vendidos";
        }
        return response()->json($lista);
    }

    public function getbyvenda($fkvenda){

        $lista=$this->modelo->all()->where('fkvenda',$fkvenda);

        if($lista == null)
        {
            return "Item da venda procurada não foi encontrado"; 
        }
        else{

        return response()->json($lista);

        }
    }

    public function store(Request $request){

        $this->validate($request, [
            'quantidade' => 'required',
            'fkvenda' => 'required',
            'fkproduto' => 'required'
        ]);
        
        lista:: create($request->all());

        return "Venda de produto cadastrado com sucesso";
    }

    public function update($id, Request $request){
       
        $lista = $this->modelo->find($id);
        
        if($lista == null){

            return "Item da lista a ser atualizado não foi encontrado"; 
        }
        else{

        $lista->update($request->all());

        return "Item da lista atualizado com sucesso";
        }
    }

    public function destroy($id){
        $lista = $this->modelo->find($id);

        if($lista == null)
        {
            return "Item da lsita a ser deletado não foi encontrado"; 
        }

        else{
            $lista->delete();

            return "Item da lista deletado com sucesso";
        }        
    }
    //
}
?>