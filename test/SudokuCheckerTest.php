<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Secture\Sudoku\Exception\InvalidLineValuesException;
use Secture\Sudoku\Exception\InvalidSudokuShapeException;
use Secture\Sudoku\SudokuChecker;

final class SudokuCheckerTest extends TestCase
{
    /** @test */
    public function itShouldThrowExceptionIfHasInvalidShape()
    {
        $sudoku = [
            [1, 2, 3],
            [1, 2, 3],
            [1, 2, 3],
        ];

        $checker = new SudokuChecker();

        $this->expectException(InvalidSudokuShapeException::class);

        $checker->check($sudoku);
    }

    /** @test */
    public function itShouldThrowExceptionIfHasNonIntegerValues()
    {
        $sudoku = [
            [1, 2, 3, 4, 5, 6, 7, 8, '9'],
            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 2, 3, 4, 5, 6, 7, 8, 9],
        ];

        $checker = new SudokuChecker();

        $this->expectException(InvalidLineValuesException::class);

        $checker->check($sudoku);
    }

    /** @test */
    public function itShouldReturnTrueIfIsValid()
    {
        $sudoku = loadFromFile(__DIR__ . '/../data/right.csv');

        $checker = new SudokuChecker();

        $this->assertTrue($checker->check($sudoku));
    }

    /** @test */
    public function itShouldReturnFalseIfIsInalid()
    {
        $sudoku = loadFromFile(__DIR__ . '/../data/wrong.csv');

        $checker = new SudokuChecker();

        $this->assertFalse($checker->check($sudoku));
    }
}
