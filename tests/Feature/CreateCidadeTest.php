<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\User;
use \App\Models\Cidade;

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
        $militar = Cidade::where('permissao', '=', 'user')
        ->where('user_id', '!=', null)->first();
        $response = $this
            ->actingAs($cidade->user)
            ->get('/cadastro/cidade')
            ->assertStatus(403);
    }

    public function testUsuarioLogadoComPermissaoCreateMilitar() {
        $cidade = Cidade::where('permissao', '=', 'admin')
        ->where('user_id', '!=', null)->first();
        $response = $this
            ->actingAs($cidade->user)
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
        $cidade = Cidade::where('permissao', '=', 'user')
        ->where('user_id', '!=', null)->first();
        $response = $this
            ->actingAs($cidade->user)
            ->post('/cadastro/cidade', $dados)
            ->assertStatus(403);
    }
}
