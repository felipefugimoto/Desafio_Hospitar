<?php

namespace App\Http\Controllers;

use App\Http\Resources\PacienteResource;
use App\Models\Paciente;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        return PacienteResource::collection(Paciente::all());
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "nome" => 'required',
            "nascimento" => 'required',
            "codigo" => 'required|numeric',
            "guia" => 'required|numeric',
            "entrada" => 'required',
            "saida" => 'nullable',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        Paciente::create([
            "nome" => $request->nome,
            "nascimento" => $request->nascimento,
            "codigo" => $request->codigo,
            "guia" => $request->guia,
            "entrada" => $request->entrada,
            "saida" => $request->saida,
        ]);
        return response(["Enviado com sucesso"], 200);
    }

    public function show($id)
    {
        $paciente = Paciente::find($id);
        if (!$paciente) {
            return response()->json(["error" => "Paciente não encontrado"], 404);
        }
        return new PacienteResource($paciente);
    }

    public function update(Request $request)
    {

        $paciente = Paciente::find($request->id);

        $paciente->nome = $request->nome;
        $paciente->nascimento = $request->nascimento;
        $paciente->codigo = $request->codigo;
        $paciente->guia = $request->guia;
        $paciente->entrada = $request->entrada;

        $paciente->save();

        return response("Alterado com sucesso", 200);
    }
    public function delete(Request $request)
    {

        $paciente = Paciente::find($request->id);

        $paciente->delete();
        return response("Paciente apagado com sucesso", 200);
    }
}
