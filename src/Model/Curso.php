<?php

namespace Alura\Solid\Model;

class Curso
{
    private $nome;
    private $videos;
    private $feedbacks;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
        $this->videos = [];
        $this->feedbacks = [];
    }

    public function receberFeedback(int $nota, ?string $depoimento): void
    {
        if ($nota < 9 && empty($depoimento)) {
            throw new \DomainException('Depoimento obrigatório');
        }

        $this->feedbacks[] = [$nota, $depoimento];
    }

    public function adicionarVideo(Video $video)
    {
        if ($video->minutosDeDuracao() < 3) {
            throw new \DomainException('Video muito curto');
        }

        $this->videos[] = $video;
    }

    /** @return Video[] */
    public function recuperarVideos(): array
    {
        return $this->videos;
    }
}
