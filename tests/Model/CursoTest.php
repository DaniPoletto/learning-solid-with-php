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

    /**
     * @dataProvider criaArrayDeVideos
     */
    public function testCursoPodeSerAssistido(array $videosParaAssitir)
    {
        foreach ($videosParaAssitir as $video) {
            $this->curso->adicionarVideo($video);
        }

        $videos = $this->curso->recuperarVideos();
        foreach ($videos as $videoQueSeraAssistido) {
            self::assertEquals(false, $videoQueSeraAssistido->recuperarAssistido());
        }

        $this->curso->assistir();
        foreach ($videos as $videoAssistido) {
            self::assertEquals(true, $videoAssistido->recuperarAssistido());
        }

        self::assertCount(count($videosParaAssitir), $videos);
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

    function criaArrayDeVideos()
    {
        $video1 = new Video("Aula 1", '4 minute');
        $video2 = new Video("Aula 2", '3 minute');
        $video3 = new Video("Aula 3", '10 minute');

        return [
            "1-video" => [
                [$video3]
            ],
            "2-videos" => [
                [$video1, $video2]
            ]
        ];
    }
}