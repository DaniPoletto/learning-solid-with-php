<?php
namespace Alura\Solid\Tests\Model;

use PHPUnit\Framework\TestCase;
use Alura\Solid\Model\AluraMais;

class AluraMaisTest extends TestCase
{
    /**
     * @var AluraMais
     */
    private $alura;

    protected function setUp():void 
    {
        $this->aluraMais = new AluraMais("Video sobre PHP", "PHP");
    }

    function testAluramaisDeveRecuperarAPontuacaoComoSendoODobroDaSuaDuracao()
    {
        $pontuacao = $this->aluraMais->recuperarPontuacao();
        $duracao = $this->aluraMais->minutosDeDuracao();

        self::assertEquals($duracao * 2, $pontuacao);
    }

    function testAluramaisDeveRecuperarUrlComCategoria()
    {
        $url = $this->aluraMais->recuperarUrl();
        self::assertEquals('http://videos.alura.com.br/php', $url);
    }
}