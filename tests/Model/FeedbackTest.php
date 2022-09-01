<?php
namespace Alura\Solid\Tests\Model;

use Alura\Solid\Model\Feedback;
use PHPUnit\Framework\TestCase;

class FeedbackTest extends TestCase
{ 
    /**
     * @dataProvider criaFeedbacksComNotaMenorQ9ComDepoimento
     */
    public function testFeedbackComNotaMenorQue9DeveReceberDepoimento(
        int $nota, 
        string $depoimento
    ) {
        $this->verificarFeedbackAoReceberNotaEdepoimento($nota, $depoimento);
    }

    /**
     * @dataProvider criaFeedbacksComNotaMenorQ9SemDepoimento
     */
    public function testFeedbackComNotaMenorQue9NaoDeveReceberDepoimentoEmBranco(
        int $nota, 
        string $depoimento
    ) {
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('Depoimento obrigatório');
        $feedback = new Feedback($nota, $depoimento);
    }

    /**
     * @dataProvider criaFeedbacksComNotaMaiorOuIgual9
     */
    public function testFeedbackComNotaMaiorOuIgualA9DeveSerOpcional(
        int $nota, 
        string $depoimento
    ) {
        $this->verificarFeedbackAoReceberNotaEdepoimento($nota, $depoimento);
    }

    function verificarFeedbackAoReceberNotaEdepoimento(
        int $nota, 
        string $depoimento
    ) {
        $feedback = new Feedback($nota, $depoimento);
        $notaDoFeedback = $feedback->recuperarNota();
        $depoimentoDoFeedback = $feedback->recuperarDepoimento();

        self::assertEquals($nota, $notaDoFeedback);
        self::assertEquals($depoimento, $depoimentoDoFeedback);
    }

    function criaFeedbacksComNotaMaiorOuIgual9()
    {
        return [
            "nota-9-com-depoimento" => [9, "Curso muito bom!"],
            "nota-9-sem-depoimento" => [9, ""],
            "nota-10-com-depoimento" => [10, "Curso muito bom!"],
            "nota-10-sem-depoimento" => [10, ""],
        ];
    }

    function criaFeedbacksComNotaMenorQ9SemDepoimento()
    {
        return [
            "nota-1-sem-depoimento" => [8, ""],
            "nota-8-sem-depoimento" => [1, ""],
        ];
    }

    function criaFeedbacksComNotaMenorQ9ComDepoimento()
    {
        return [
            "nota-1-sem-depoimento" => [8, "Curso muito bom!"],
            "nota-8-sem-depoimento" => [1, "Curso muito bom!"],
        ];
    }
}