<?php

namespace Tests\Unit;

use Tests\TestCase;
use \App\Validator\ValidatorException;
use \App\Validator\GuarnicaoValidator;
use \App\Models\Guarnicao;

class GuarnicaoTest extends TestCase
{

    public function testGuarnicaoSemPrefixo() {
        $this->expectException(ValidatorException::class);
        $guarnicao = Guarnicao::factory()->make(['prefixo'=>'']);
        $dados = $guarnicao->toArray();
        GuarnicaoValidator::validate($dados);
    }

    public function testGuarnicaoSemDescricao() {
        $this->expectException(ValidatorException::class);
        $guarnicao = Guarnicao::factory()->make(['descricao'=>'']);
        $dados = $guarnicao->toArray();
        GuarnicaoValidator::validate($dados);
    }

    public function testGuarnicaoCorreto() {
        $guarnicao = Guarnicao::factory()->make();
        $dados = $guarnicao->toArray();
        GuarnicaoValidator::validate($dados);
        $this->assertTrue(true);
    }
}
    