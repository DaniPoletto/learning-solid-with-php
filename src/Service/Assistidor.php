<?php

namespace Alura\Solid\Service;

use Alura\Solid\Model\Assistivel;

class Assistidor
{
    public function assisteConteudo(Assistivel $consteudo)
    {
        $consteudo->assistir();
    }
}
