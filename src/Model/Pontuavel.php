<?php
namespace Alura\Solid\Model;

interface Pontuavel
{
    public function recuperarPontuacao(): int;
    public function assistir(): void;
}