<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $apiUrl;
    protected $client;

    public function __construct()
    {
        $this->apiUrl = 'http://localhost:4000/users';
        $this->client = new Client([
            'timeout' => 3,
            'connect_timeout' => 3,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    public function index()
{
    $users = []; // Inicializa como array vazio

    try {
        $response = $this->client->get($this->apiUrl);
        
        if ($response->getStatusCode() === 200) {
            $users = json_decode($response->getBody(), true) ?? [];
        }

    } catch (\Exception $e) {
        Log::error('Erro na listagem: ' . $e->getMessage());
        return view('users.index', [
            'users' => [],
            'error' => 'Serviço temporariamente indisponível'
        ]);
    }

    return view('users.index', compact('users'));
}


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|max:100',
            'email' => 'required|email',
            'cpf' => 'required|size:11'
        ]);

        try {
            $response = $this->client->post($this->apiUrl, [
                'json' => $this->formatUserData($request)
            ]);

            return redirect()->route('users.index')
                ->with('success', 'Usuário criado com sucesso!');

        } catch (\Exception $e) {
            Log::error('Erro ao criar: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Erro ao salvar usuário');
        }
    }

    public function edit($id)
{
    try {
        $response = $this->client->get("{$this->apiUrl}/{$id}");
        $user = json_decode($response->getBody(), true);

        // Garante a estrutura completa
        $user = array_merge([
            'nome' => '',
            'dataNascimento' => '',
            'cpf' => '',
            'endereco' => []
        ], $user);

        return view('users.edit', compact('user'));

    } catch (\Exception $e) {
        return redirect()->route('users.index')
            ->with('error', 'Usuário não encontrado');
    }
}

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|max:100',
            'email' => 'required|email',
            'cpf' => 'required|size:11'
        ]);

        try {
            $this->client->put("{$this->apiUrl}/{$id}", [
                'json' => $this->formatUserData($request)
            ]);

            return redirect()->route('users.index')
                ->with('success', 'Usuário atualizado!');

        } catch (\Exception $e) {
            Log::error('Erro ao atualizar: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Falha na atualização');
        }
    }

    public function destroy($id)
    {
        try {
            $this->client->delete("{$this->apiUrl}/{$id}");
            return redirect()->route('users.index')
                ->with('success', 'Usuário excluído!');

        } catch (\Exception $e) {
            Log::error('Erro ao excluir: ' . $e->getMessage());
            return back()->with('error', 'Falha na exclusão');
        }
    }

    private function formatUserData($request)
    {
        return [
            'nome' => $request->nome,
            'dataNascimento' => $request->dataNascimento,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'fone' => $request->fone,
            'endereco' => [
                'rua' => $request->rua,
                'cep' => $request->cep,
                'bairro' => $request->bairro,
                'numero' => $request->numero,
                'cidade' => $request->cidade,
                'estado' => $request->estado,
            ]
        ];
    }
}