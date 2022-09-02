<?php
namespace Alura\Solid\Tests\Model;

use Alura\Solid\Model\Video;
use PHPUnit\Framework\TestCase;

class VideoTest extends TestCase
{
    /**
     * @dataProvider criaVideo
     */
    function testVideoDeveRecuperarUrlComNome(Video $video, string $NomeEsperadoNaUrl)
    {
        $urlDoVideo = $video->recuperarUrl();
        self::assertEquals('http://videos.alura.com.br/'.$NomeEsperadoNaUrl, $urlDoVideo);
    }

    public function testVideoDevePoderSerAssistido()
    {
        $video = new Video("Aula 2");

        $assistido = $video->recuperarAssistido();
        self::assertEquals(false, $assistido);

        $video->assistir();
        $assistido = $video->recuperarAssistido();
        self::assertEquals(true, $assistido);
    }

    /**
     * @dataProvider criaVideoComDuracao
     */
    public function testVideoDeveRecuperarMinutosDeDuracao(Video $video, int $duracao)
    {
        $minutos = $video->minutosDeDuracao();
        self::assertEquals($duracao, $minutos);
    }

    function criaVideo()
    {
        $video = new Video("Aula 1");
        $video2 = new Video("Aula PHP");
        $video3 = new Video("Aula ç");

        return [
            "video-com-numero-no-nome" => [$video, "nome=Aula+1"],
            "video-com-letras-no-nome" => [$video2, "nome=Aula+PHP"],
            "video-com-caracteres-especiais-no-nome" => [$video3, "nome=Aula+%C3%A7"]
        ];
    }

    function criaVideoComDuracao()
    {
        $video = new Video("Aula 1");
        $video2 = new Video("Aula PHP", '10 minute');

        return [
            "video-com-0-minutos" => [$video, 0],
            "video-com-10-minutos" => [$video2, 10]
        ];   
    }
}