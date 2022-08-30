<?php

namespace Alura\Solid\Service;

use Alura\Solid\Model\Pontuavel;

class Assistidor
{
    public function assisteConteudo(Pontuavel $consteudo)
    {
        $consteudo->assistir();
    }
}
