<?php

namespace ReginaldoTeste\Classes;

use ReginaldoTeste\Classes\CallMagic;

class WordReceive extends CallMagic
{
    private $text = array();
    private $string = null;

    public function __construct($string)
    {
        if(empty($string)) {
            throw new InvalidArgumentException('Valor obrigat�rio');
        }

        $this->setString($string);
    }

    private function

}