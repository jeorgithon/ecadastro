<?php

namespace Tests\Unit;

use Tests\TestCase;
use \App\Validator\ValidatorException;
use \App\Validator\CidadeValidator;
use \App\Models\Cidade;

class CidadeTest extends TestCase
{

    public function testCidadeSemNome() {
        $this->expectException(ValidatorException::class);
        $cidade = Cidade::factory()->make(['nome'=>'']);
        $dados = $cidade->toArray();
        CidadeValidator::validate($dados);
    }

    public function testCidadeSemCompanhia() {
        $this->expectException(ValidatorException::class);
        $cidade = Cidade::factory()->make(['companhia'=>'']);
        $dados = $cidade->toArray();
        CidadeValidator::validate($dados);
    }

    public function testCidadeCorreto() {
        $cidade = Cidade::factory()->make();
        $dados = $cidade->toArray();
        CidadeValidator::validate($dados);
        $this->assertTrue(true);
    }
}
    