<?php

namespace App\Http\Controllers;

use App\Http\Resources\PacienteResource;
use App\Models\Paciente;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    // Método que retorna todos os pacientes
    public function index()
    {
        // Retorna uma coleção de todos os pacientes, formatados como recursos
        return PacienteResource::collection(Paciente::all());
    }

    // Método para cadastrar um novo paciente
    public function store(Request $request)
    {
        // Valida os dados recebidos no request
        $validator = Validator::make($request->all(), [
            "nome" => 'required', // Nome é obrigatório
            "nascimento" => 'required', // Data de nascimento é obrigatória
            "codigo" => 'required|numeric', // Código é obrigatório e deve ser numérico
            "guia" => 'required|numeric', // Guia é obrigatório e deve ser numérico
            "entrada" => 'required', // Data de entrada é obrigatória
            "saida" => 'nullable', // Data de saída é opcional (pode ser nula)
        ]);

        // Se a validação falhar, retorna os erros com código de status 400
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Cria um novo registro de paciente com os dados validados
        Paciente::create([
            "nome" => $request->nome,
            "nascimento" => $request->nascimento,
            "codigo" => $request->codigo,
            "guia" => $request->guia,
            "entrada" => $request->entrada,
            "saida" => $request->saida,
        ]);

        // Retorna uma resposta de sucesso com código 200
        return response(["Enviado com sucesso"], 200);
    }

    // Método para exibir um paciente específico pelo ID
    public function show($id)
    {
        // Busca o paciente pelo ID
        $paciente = Paciente::find($id);

        // Se o paciente não for encontrado, retorna uma mensagem de erro
        if (!$paciente) {
            return response()->json(["error" => "Paciente não encontrado"], 404);
        }

        // Se encontrado, retorna o paciente como um recurso
        return new PacienteResource($paciente);
    }

    // Método para atualizar os dados de um paciente
    public function update(Request $request)
    {
        // Busca o paciente pelo ID fornecido no request
        $paciente = Paciente::find($request->id);

        // Atualiza os dados do paciente com os novos valores
        $paciente->nome = $request->nome;
        $paciente->nascimento = $request->nascimento;
        $paciente->codigo = $request->codigo;
        $paciente->guia = $request->guia;
        $paciente->entrada = $request->entrada;

        // Salva as alterações no banco de dados
        $paciente->save();

        // Retorna uma mensagem de sucesso
        return response("Alterado com sucesso", 200);
    }

    // Método para deletar um paciente
    public function delete(Request $request)
    {
        // Busca o paciente pelo ID fornecido no request
        $paciente = Paciente::find($request->id);

        // Exclui o paciente do banco de dados
        $paciente->delete();

        // Retorna uma mensagem de sucesso
        return response("Paciente apagado com sucesso", 200);
    }
}
