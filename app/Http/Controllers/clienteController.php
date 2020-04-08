<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\cliente;


class clienteController extends Controller
{
    private $modelo;

    public function __construct(cliente $cliente)
    {
        $this->modelo = $cliente;
    }

    public function getAll(){
        
        $cliente=$this->modelo->all();

        if($cliente == NULL){
            return "Não temos clientes cadastrados";
        }
        return response()->json($cliente);
    }

    public function get($id){

        $cliente = $this->modelo->find($id);

        if($cliente == null)
        {
            return " Cliente procurado não foi encontrado"; 
        }
        else{

        return response()->json($cliente);

        }
    }

    public function store(Request $request){

        $this->validate($request, [
            'nome' => 'required',
            'sobrenome' => 'required',
            'cpf' => 'required|unique:cliente,cpf',
            'email' => 'required|email'
        ]);
        
        cliente:: create($request->all());

        return "Cliente cadastrado com sucesso";
    }

    public function update($id, Request $request){
       
        $cliente = $this->modelo->find($id);

        $this->validate($request, [
            'cpf' => "unique:cliente,cpf"
        ]);
        
        if($cliente == null){

            return " Cliente a ser atualizado não foi encontrado"; 
        }
        else{

        $cliente->update($request->all());

        return "Cliente atualizado com sucesso";
        }
    }

    public function destroy($id){
        $cliente = $this->modelo->find($id);

        if($cliente == null)
        {
            return " Cliente a ser deletado não foi encontrado"; 
        }

        else{
            $cliente->delete();

            return " Cliente deletado com sucesso";
        }        
    }
    //
}
?>