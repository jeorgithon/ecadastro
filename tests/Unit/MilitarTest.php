<?php

namespace Tests\Unit;

use Tests\TestCase;
use \App\Validator\ValidatorException;
use \App\Validator\MilitarValidator;
use \App\Models\Militar;


class MilitarTest extends TestCase
{

    public function testMilitarSemNome() {
        $this->expectException(ValidatorException::class);
        $militar = Militar::factory()->make(['nomeCompleto'=>'']);
        $dados = $militar->toArray();
        MilitarValidator::validate($dados);
        
   }

   public function testMilitarEmailRepetido() {
        $this->expectException(ValidatorException::class);
        $militar1 = Militar::find(1);
        $militar2 = Militar::factory()->make(['email'=>$militar1->email]);
        $dados = $militar2->toArray();
        MilitarValidator::validate($dados);
    }

    public function testMilitarMatriculaRepetida() {
        $this->expectException(ValidatorException::class);
        $militar1 = Militar::find(1);
        $militar2 = Militar::factory()->make(['matricula'=>$militar1->matricula]);
        $dados = $militar2->toArray();
        MilitarValidator::validate($dados);
    }

    public function testMilitarCorreto() {
        $militar = Militar::factory()->make();
        $dados = $militar->toArray();
        $validador = MilitarValidator::validate($dados);
        $this->assertTrue(true);
    }
}
