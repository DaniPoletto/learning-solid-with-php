<?php

namespace Alura\Solid\Model;

use Alura\Solid\Model\Video;
use Alura\Solid\Model\Feedback;
use Alura\Solid\Model\Pontuavel;
use Alura\Solid\Model\Assistivel;

class Curso implements Pontuavel, Assistivel
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

    public function receberFeedback(Feedback $feedback): void
    {
        $this->feedbacks[] = $feedback;
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

    /** @return Feedback[] */
    public function recuperarFeedbacks(): array
    {
        return $this->feedbacks;
    }

    public function recuperarPontuacao(): int
    {
        return 100;
    }

    public function assistir(): void
    {
        foreach ($this->recuperarVideos() as $video) {
            $video->assistir();
        }
    }
}
