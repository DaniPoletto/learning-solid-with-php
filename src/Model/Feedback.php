<?php
namespace Alura\Solid\Model;

class Feedback
{
    /** @var int */
    private $nota;
    /** @var string|null */
    private $depoimento;

    public function __construct(int $nota, ?string $depoimento)
    {
        if ($this->ehNotaMenorQue9SemDepoimento($nota, $depoimento)) {
            throw new \DomainException('Depoimento obrigatório');
        }

        $this->nota = $nota;
        $this->depoimento = $depoimento;
    }

    public function recuperarNota(): int
    {
        return $this->nota;
    }

    public function recuperarDepoimento(): ?string
    {
        return $this->depoimento;
    }

    private function ehNotaMenorQue9SemDepoimento(int $nota, int $depoimento)
    {
        return $nota < 9 && empty($depoimento);
    }
}