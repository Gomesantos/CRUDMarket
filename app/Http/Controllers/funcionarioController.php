<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\funcionario;
use Illuminate\Support\Facades\Auth;


class funcionarioController extends Controller
{
    private $modelo;

    public function __construct(funcionario $funcionario)
    {
        $this->modelo = $funcionario;
    }

    public function getAll(){
        
        $funcionario=$this->modelo->all();

        if($funcionario == NULL){
            return "Não temos funcionarios cadastrados";
        }
        return response()->json($funcionario);
    }

    public function get($id){

        $funcionario = $this->modelo->find($id);

        if($funcionario == null)
        {
            return " Funcionário procurado não foi encontrado"; 
        }
        else{

        return response()->json($funcionario);

        }
    }

    public function store(Request $request){

        $this->validate($request, [
            'nome' => 'required',
            'sobrenome' => 'required',
            'cpf' => 'required|unique:funcionario,cpf',
            'email' => 'required|email',
            'senha' => 'required',
            'salario' => 'required'
        ]);
        
        funcionario:: create($request->all());

        return "Funcionário cadastrado com sucesso";
    }

    public function update($id, Request $request){
       
        $funcionario = $this->modelo->find($id);

        $this->validate($request, [
            'cpf' => "unique:funcionario,cpf"
        ]);
        
        if($funcionario == null){

            return "Funcionário a ser atualizado não foi encontrado"; 
        }
        else{

        $funcionário->update($request->all());

        return "Funcionário atualizado com sucesso";
        }
    }

    public function destroy($id){
        $funcionario = $this->modelo->find($id);

        if($funcionario == null)
        {
            return "Funcionário a ser deletado não foi encontrado"; 
        }

        else{
            $Funcionário->delete();

            return "Funcionário deletado com sucesso";
        }        
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'senha' => 'required'
        ]);

       $email=$request->only('email');
       $senha=$request->only('senha');

       $usuario=$this->modelo->where('email',$email)->first();
       $senha2=$usuario->only('senha');

       if($usuario == NULL){
            return "Usuário não foi encontrado";
       }
       else{
            
            if($senha == $senha2){
                return "Login com sucesso";
            }
            else{
                return "Senha incorreta";
            }

       
        }
    }
    //
}
?>