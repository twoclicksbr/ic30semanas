<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'id_type_gender' => 'required|integer',
            'id_type_group' => 'required|integer',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'whatsapp' => 'required|string|min:10',
            'cpf' => 'required|string|min:11',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'localidade' => 'required',
            'uf' => 'required'
        ]);

        try {
            $headers = [
                'username' => config('api.username'),
                'token' => config('api.token')
            ];

            // 1. Cria person
            $resPerson = Http::withHeaders($headers)->post(config('api.url') . '/person', [
                'name' => ucfirst(strtolower($request->name)),
                'birthdate' => $request->birthdate,
                'id_type_gender' => $request->id_type_gender,
                'id_type_group' => $request->id_type_group,
                'active' => 1
            ]);

            if ($resPerson->failed()) {
                return response()->json(['error' => true, 'message' => 'Erro ao salvar pessoa.'], 400);
            }

            $idPerson = $resPerson->json('id');

            // 2. Cria person_user
            $resUser = Http::withHeaders($headers)->post(config('api.url') . '/person_user', [
                'id_person' => $idPerson,
                'email' => $request->email,
                'password' => $request->password,
                'active' => 1
            ]);

            if ($resUser->failed()) {
                return response()->json(['error' => true, 'message' => 'Erro ao salvar usuário.'], 400);
            }

            // 3. Cria documento (cpf)
            Http::withHeaders($headers)->post(config('api.url') . '/document', [
                'route' => 'person',
                'id_parent' => $idPerson,
                'id_type_document' => 1,
                'name_type_document' => 'CPF',
                'value' => preg_replace('/\D/', '', $request->cpf),
                'active' => 1
            ]);

            // Eklesia se id_type_group = 1
            if ((int) $request->id_type_group === 1 && $request->filled('eklesia')) {
                Http::withHeaders($headers)->post(config('api.url') . '/document', [
                    'route' => 'person',
                    'id_parent' => $idPerson,
                    'id_type_document' => 2,
                    'name_type_document' => 'Eklesia',
                    'value' => $request->eklesia,
                    'active' => 1
                ]);
            }

            // 4. Cria contatos (email e whatsapp)
            Http::withHeaders($headers)->post(config('api.url') . '/contact', [
                'route' => 'person',
                'id_parent' => $idPerson,
                'id_type_contact' => 1,
                'name_type_contact' => 'E-mail',
                'value' => $request->email,
                'active' => 1
            ]);

            Http::withHeaders($headers)->post(config('api.url') . '/contact', [
                'route' => 'person',
                'id_parent' => $idPerson,
                'id_type_contact' => 2,
                'name_type_contact' => 'WhatsApp',
                'value' => preg_replace('/\D/', '', $request->whatsapp),
                'active' => 1
            ]);

            // 5. Cria endereço
            Http::withHeaders($headers)->post(config('api.url') . '/address', [
                'route' => 'person',
                'id_parent' => $idPerson,
                'id_type_address' => 1,
                'cep' => preg_replace('/\D/', '', $request->cep),
                'logradouro' => $request->logradouro,
                'numero' => $request->numero,
                'complemento' => $request->complemento,
                'bairro' => $request->bairro,
                'localidade' => $request->localidade,
                'uf' => strtoupper($request->uf),
                'active' => 1
            ]);

            return response()->json(['success' => true, 'redirect' => '/login']);

        } catch (\Exception $e) {
            Log::error('Erro no cadastro via API: ' . $e->getMessage());
            return response()->json(['error' => true, 'message' => 'Erro inesperado no cadastro.'], 500);
        }
    }
}