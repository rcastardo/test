<?php

namespace RcTeste\Test;

use RcTeste\Classes\Teste;

class TesteTest extends \PHPUnit_Framework_TestCase {


    public function testImprime()
    {
        $teste = new Teste();

        $this->assertNotEmpty($teste->imprime(), 'Está vazio');
    }
}