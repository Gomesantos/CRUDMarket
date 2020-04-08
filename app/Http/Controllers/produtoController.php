<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\produto;


class produtoController extends Controller
{
    private $modelo;
    //private $lista = New lista;   

    public function __construct(produto $produto)
    {
        $this->modelo = $produto;
    }

    public function getAll(){
        
        $produto=$this->modelo->all();

        if($produto == NULL){
            return "Não temos produtos cadastrados";
        }
        return response()->json($produto);
    }

    public function get($id){

        $produto = $this->modelo->find($id);
        if($produto == NULL)
        {
            return "Produto procurado não foi encontrado"; 
        }
        else{

        return response()->json($produto);

        }
    }

    public function store(Request $request){

        $this->validate($request, [
            'nome' => 'required',
            'categoria' => 'required',
            'preco' => 'required'
        ]);
        
        produto:: create($request->all());

        return "Produto cadastrado com sucesso";
    }

    public function update($id, Request $request){
       
        $produto = $this->modelo->find($id);
        
        if($produto == null){

            return " Produto a ser atualizado não foi encontrado"; 
        }
        else{

        $produto->update($request->all());

        return "Produto atualizado com sucesso";
        }
    }

    public function destroy($id){
        $produto = $this->modelo->find($id);

        if($produto == null)
        {
            return "Produto a ser deletado não foi encontrado"; 
        }

        else{
            $produto->delete();

            return "Produto deletado com sucesso";
        }               
    }
    //
}
?>