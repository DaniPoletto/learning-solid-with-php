<?php

namespace Alura\Solid\Service;

use Alura\Solid\Model\AluraMais;
use Alura\Solid\Model\Curso;

class CalculadorPontuacao
{
    public function recuperarPontuacao($conteudo)
    {
        if ($conteudo instanceof Curso) {
            return 100;
        } else if ($conteudo instanceof AluraMais) {
            return $conteudo->minutosDeDuracao() * 2;
        } else {
            throw new \DomainException('Apenas Cursos e videos Alura+ possuem pontuações');
        }
    }
}
