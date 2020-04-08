<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\venda;


class vendaController extends Controller
{
    private $modelo;

    public function __construct(venda $venda)
    {
        $this->modelo = $venda;
    }

    public function getAll(){
        
        $venda=$this->modelo->all();

        if($venda == NULL){
            return "Não temos vendas cadastradas";
        }
        return response()->json($venda);
    }

    public function get($id){

        $venda = $this->modelo->find($id);

        if($venda == null)
        {
            return "Venda procurada não foi encontrada"; 
        }
        else{

        return response()->json($venda);

        }
    }

    public function store(Request $request){

        $this->validate($request, [
            'valor' => 'required',
            'fkcliente' => 'required',
            'fkfuncionario' => 'required',
        ]);
        
        venda:: create($request->all());

        return "Venda cadastrada com sucesso";
    }

    public function update($id, Request $request){
       
        $venda = $this->modelo->find($id);

        $this->validate($request, [
            'data' => "date"
        ]);
        
        if($venda == null){

            return " Venda a ser atualizada não foi encontrado"; 
        }
        else{

        $venda->update($request->all());

        return "Venda atualizado com sucesso";
        }
    }

    public function destroy($id){
        $venda = $this->modelo->find($id);

        if($venda == null)
        {
            return "Venda a ser deletada não foi encontrado"; 
        }

        else{
            $venda->delete();

            return "Venda deletada com sucesso";
        }               
    }
    //
}
?>