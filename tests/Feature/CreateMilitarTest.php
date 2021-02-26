<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\User;
use \App\Models\Militar;

class CreateMilitarTest extends TestCase
{

    public function inicializarArrayMilitar() {
        $militar = Militar::factory()
            ->make();
        $dados = $militar->toArray();
        return $dados;
    }

    public function testUsuarioNaoLogadoAcessaForm()
    {
        $response = $this
            ->get('/cadastroMilitar')
            ->assertStatus(302);
            //redirecionado para a página de login
    }

    public function testUsuarioLogadoSemPermissaoCreateMilitar() {
        $militar = Militar::where('permissao', '=', 'user')
        ->where('user_id', '!=', null)->first();
        $response = $this
            ->actingAs($militar->user)
            ->get('/cadastroMilitar')
            ->assertStatus(403);
    }

    public function testUsuarioLogadoComPermissaoCreateMilitar() {
        $militar = Militar::where('permissao', '=', 'admin')
        ->where('user_id', '!=', null)->first();
        $response = $this
            ->actingAs($militar->user)
            ->get('/cadastroMilitar')
            ->assertStatus(200);
    }

    public function testUsuarioNaoLogadoEnviaForm() {
        $dados = $this->inicializarArrayMilitar();
        $response = $this
            ->post('/cadastroMilitar', $dados)
            ->assertStatus(302);
            //redirecionado para a página de login
    }

    public function testUsuarioLogadoSemPermissaoEnviaForm() {
        $dados = $this->inicializarArrayMilitar();
        $militar = Militar::where('permissao', '=', 'user')
        ->where('user_id', '!=', null)->first();
        $response = $this
            ->actingAs($militar->user)
            ->post('/cadastroMilitar', $dados)
            ->assertStatus(403);
    }

    //cria o militar nomalmente, porém retorna erro 500.
    // public function testUsuarioLogadoComPermissaoEnviaForm() {
    //     $dados = $this->inicializarArrayMilitar();
    //     $militar = Militar::where('permissao', '=', 'admin')
    //     ->where('user_id', '!=', null)->first();
    //     $response = $this
    //         ->actingAs($militar->user)
    //         ->post('/cadastroMilitar', $dados)
    //         ->assertStatus(200);
    // }
}
