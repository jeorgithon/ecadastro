<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\User;
use \App\Models\Cidade;
use \App\Models\Militar;

class CreateCidadeTest extends TestCase
{

    public function inicializarArrayCidade() {
        $cidade = Cidade::factory()
            ->make();
        $dados = $cidade->toArray();
        return $dados;
    }

    public function testUsuarioNaoLogadoAcessaForm()
    {
        $response = $this
            ->get('/cadastro/cidade')
            ->assertStatus(302);
            //redirecionado para a página de login
    }

    public function testUsuarioLogadoSemPermissaoCreateCidade() {
        $militar = Militar::where('permissao', '=', 'user')
        ->where('user_id', '!=', null)->first();
        $response = $this
            ->actingAs($militar->user)
            ->get('/cadastro/cidade')
            ->assertStatus(403);
    }

    public function testUsuarioLogadoComPermissaoCreateCidade() {
        $militar = Militar::where('permissao', '=', 'admin')
        ->where('user_id', '!=', null)->first();
        $response = $this
            ->actingAs($militar->user)
            ->get('/cadastro/cidade')
            ->assertStatus(200);
    }

    public function testUsuarioNaoLogadoEnviaForm() {
        $dados = $this->inicializarArrayCidade();
        $response = $this
            ->post('/cadastro/cidade', $dados)
            ->assertStatus(302);
            //redirecionado para a página de login
    }

    public function testUsuarioLogadoSemPermissaoEnviaForm() {
        $dados = $this->inicializarArrayCidade();
        $militar = Militar::where('permissao', '=', 'user')
        ->where('user_id', '!=', null)->first();
        $response = $this
            ->actingAs($militar->user)
            ->post('/cadastro/cidade', $dados)
            ->assertStatus(403);
    }
}
