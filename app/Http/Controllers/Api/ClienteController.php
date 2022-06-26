<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "tudo certo";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->telefone = $request->input('telefone');
        $cliente->cpf = $request->input('cpf');
        $cliente->placa = $request->input('placa');
        $cliente->save();
        if($cliente){
            return json_encode([
                'message' => 'Cliente Cadastrado com sucesso!',
                'código' => '200'
            
            ]);
         }

         return json_encode([
            'message' => 'Cliente Não Cadastrado!',
            'código' => '404'
        
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $cliente = Cliente::find($id);
            if($cliente){
            return json_encode($cliente);
            }

        return json_encode([
            'Message' => 'Cliente não encontrado!'
        
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if($cliente){
        $cliente->nome = $request->input('nome');
        $cliente->telefone = $request->input('telefone');
        $cliente->cpf = $request->input('cpf');
        $cliente->placa = $request->input('placa');
        $cliente->save();
        return json_encode($cliente);
        }
        return "Erro ao alterar registro!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if(isset($cliente)){
            $cliente->delete();
            return response([
                'Cliente deletado com sucesso!' => '200'
            ]);
        }

        return response("Error entre em contato com o administrador!");
    }

    public function consultarPlaca($numero){
        $cliente = DB::table('clientes')
                    ->where('placa','LIKE','%'.$numero.'%')->get();
                    
        
        
        return json_encode($cliente);

    }
}
