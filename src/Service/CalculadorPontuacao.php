<?php

namespace Alura\Solid\Service;

use Alura\Solid\Model\AluraMais;
use Alura\Solid\Model\Curso;

class CalculadorPontuacao
{
    public function recuperarPontuacao(Pontuavel $conteudo)
    {
        return $conteudo->recuperarPontuacao();
    }
}
