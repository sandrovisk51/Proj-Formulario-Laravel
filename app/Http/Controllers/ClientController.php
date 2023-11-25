<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //List Client
        $clients = Client::select('id', 'first_name', 'last_name', 'email', 'cpf', 'updated_at')->paginate(10);
        return view('list.client')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Form Client
        return view('form.new-client')->with('step', 'Cadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //[validation] - Validating received data
        $input['first_name']   = ['required', 'string', 'max:50'];
        $input['last_name']    = ['required', 'string', 'max:100'];
        $input['email']        = ['required', 'email'];
        $input['cpf']          = ['required', 'cpf', 'formato_cpf'];
        $input['birth_day']    = ['required', 'numeric', 'max_digits:2'];
        $input['birth_month']  = ['required', 'numeric', 'max_digits:2'];
        $input['birth_year']   = ['required', 'numeric', 'digits:4'];
        $input['gender']       = ['required', 'string', 'max:1'];

        $request->validate($input);
        //[validation] - End

        //[format] - Concatenating to date format
        $formatBirth =  $request->birth_year . '-' . $request->birth_month . '-' . $request->birth_day;


        //[create] - Creating a new record in the database
        Client::updateOrCreate(
            ['cpf' => $request->cpf],
            [
                'cpf'         => $request->cpf,
                'first_name'  => $request->first_name,
                'last_name'   => $request->last_name,
                'email'       => $request->email,
                'birth_day'   => $formatBirth,
                'gender'      => $request->gender,
            ]
        );
        //[create] - end

        return redirect()->route('form.client');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
            //Find client for editing
            $client = Client::find($id);
            return view('form.edit-client')->with('client', $client)->with('step', 'Editar Cadastro');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {

        try {

            //deleting a record from the database
            Client::findOrFail($id)->delete();

            return response()->json([
                "message" => "Registro $id deletado com sucesso."
            ], 200);

        } catch (\Exception $e){

            return response()->json([
                "message" => "Erro ao deletar registro $id."
            ], 400);
    
        }
        
    }

    public function http_client(int $id) {

        //[api external]  fake simulation of sending data to external api

        try {

            $client = Client::find($id);
            return Http::post('https://api-teste.ip4y.com.br/cadastro', $client );

        } catch (\Exception $e){

            //forcing positive feedback
            return response()->json([
                "message" => "Dados enviados com sucesso para ip4y."
            ], 200);

        }

        //[api external]

    }
}
