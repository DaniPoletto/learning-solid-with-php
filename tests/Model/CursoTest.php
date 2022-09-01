<?php
namespace Alura\Solid\Tests\Model;

use Alura\Solid\Model\Curso;
use Alura\Solid\Model\Video;
use PHPUnit\Framework\TestCase;

class CursoTest extends TestCase
{
    /**
     * @var Curso
     */
    private $curso;

    protected function setUp():void 
    {
        $this->curso = new Curso("Curso PHP");
    }

    /**
     * @dataProvider criaVideoDeMenosDe3Minutos
     */
    public function testCursoNaoDeveReceberVideosComMenosDeTresMinutos(Video $video)
    {
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('Video muito curto');

        $this->curso->adicionarVideo($video);
        $videos = $this->curso->recuperarVideos();

        self::assertCount(0, $videos);
        self::assertLessThan(3, $video->minutosDeDuracao());
    }

    /**
     * @dataProvider criaVideoDeMais3MinutosOuMais
     */
    public function testCursoDeveReceberVideosCom3MinutosOuMais(Video $video)
    {
        $this->curso->adicionarVideo($video);
        $videos = $this->curso->recuperarVideos();

        self::assertCount(1, $videos);
        self::assertEquals('Aula 1', $videos[0]->recuperarNome());
        self::assertGreaterThanOrEqual(3, $videos[0]->minutosDeDuracao());
    }

    function criaVideoDeMais3MinutosOuMais()
    {
        $videoComQuatroMinuto = new Video("Aula 1", '4 minute');
        $videoComTresMinuto = new Video("Aula 1", '3 minute');

        return [
            "video-4-minutos" => [$videoComQuatroMinuto],
            "video-3-minutos" => [$videoComTresMinuto]
        ];
    }

    function criaVideoDeMenosDe3Minutos()
    {
        $videoSemMinutos = new Video("Aula 1");
        $videoComUmMinuto = new Video("Aula 1", '1 minute');
        $videoComDoisMinuto = new Video("Aula 1", '2 minute');

        return [
            "video-0-minutos" => [$videoSemMinutos],
            "video-1-minuto" => [$videoComUmMinuto],
            "video-2-minutos" => [$videoComDoisMinuto]
        ];
    }
}