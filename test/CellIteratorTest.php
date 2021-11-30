<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Secture\Sudoku\CellIterator;

final class CellIteratorTest extends TestCase
{
    const SUDOKU_LINE = [1, 2, 3, 4, 5, 6, 7, 8, 9];

    /** @test  */
    public function itShouldReturnNextRow()
    {
        $sudoku = [
            self::SUDOKU_LINE,
            self::SUDOKU_LINE,
            self::SUDOKU_LINE,
            self::SUDOKU_LINE,
            self::SUDOKU_LINE,
            self::SUDOKU_LINE,
            self::SUDOKU_LINE,
            self::SUDOKU_LINE,
            self::SUDOKU_LINE,
        ];
        $iterator = new CellIterator(9, $sudoku);

        $this->assertEquals([1, 2, 3, 1, 2, 3, 1, 2, 3], $iterator->next());
        $this->assertEquals([4, 5, 6, 4, 5, 6, 4, 5, 6], $iterator->next());
        $this->assertEquals([7, 8, 9, 7, 8, 9, 7, 8, 9, ], $iterator->next());
        $this->assertEquals([1, 2, 3, 1, 2, 3, 1, 2, 3], $iterator->next());
        $this->assertEquals([4, 5, 6, 4, 5, 6, 4, 5, 6], $iterator->next());
        $this->assertEquals([7, 8, 9, 7, 8, 9, 7, 8, 9, ], $iterator->next());
        $this->assertEquals([1, 2, 3, 1, 2, 3, 1, 2, 3], $iterator->next());
        $this->assertEquals([4, 5, 6, 4, 5, 6, 4, 5, 6], $iterator->next());
        $this->assertEquals([7, 8, 9, 7, 8, 9, 7, 8, 9, ], $iterator->next());
    }

    /** @test  */
    public function itShouldReturnNullIfTheresNoNextRow()
    {
        $sudoku = [
            self::SUDOKU_LINE,
            self::SUDOKU_LINE,
            self::SUDOKU_LINE,
            self::SUDOKU_LINE,
            self::SUDOKU_LINE,
            self::SUDOKU_LINE,
            self::SUDOKU_LINE,
            self::SUDOKU_LINE,
            self::SUDOKU_LINE,
        ];
        $iterator = new CellIterator(9, $sudoku);

        $this->assertEquals([1, 2, 3, 1, 2, 3, 1, 2, 3], $iterator->next());
        $this->assertEquals([4, 5, 6, 4, 5, 6, 4, 5, 6], $iterator->next());
        $this->assertEquals([7, 8, 9, 7, 8, 9, 7, 8, 9, ], $iterator->next());
        $this->assertEquals([1, 2, 3, 1, 2, 3, 1, 2, 3], $iterator->next());
        $this->assertEquals([4, 5, 6, 4, 5, 6, 4, 5, 6], $iterator->next());
        $this->assertEquals([7, 8, 9, 7, 8, 9, 7, 8, 9, ], $iterator->next());
        $this->assertEquals([1, 2, 3, 1, 2, 3, 1, 2, 3], $iterator->next());
        $this->assertEquals([4, 5, 6, 4, 5, 6, 4, 5, 6], $iterator->next());
        $this->assertEquals([7, 8, 9, 7, 8, 9, 7, 8, 9, ], $iterator->next());
        $this->assertNull($iterator->next());
    }
}
