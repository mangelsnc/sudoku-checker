<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Secture\Sudoku\RowIterator;

final class RowIteratorTest extends TestCase
{
    const SUDOKU_LINE = [1, 2, 3, 4, 5, 6, 7, 8, 9];

    /** @test  */
    public function itShouldReturnNextRow()
    {
        $sudoku = [
            self::SUDOKU_LINE,
            array_reverse(self::SUDOKU_LINE),
            self::SUDOKU_LINE,
        ];
        $iterator = new RowIterator(3, $sudoku);

        $this->assertEquals(self::SUDOKU_LINE, $iterator->next());
        $this->assertEquals(array_reverse(self::SUDOKU_LINE), $iterator->next());
        $this->assertEquals(self::SUDOKU_LINE, $iterator->next());
    }

    /** @test  */
    public function itShouldReturnNullIfTheresNoNextRow()
    {
        $sudoku = [
            self::SUDOKU_LINE,
            array_reverse(self::SUDOKU_LINE),
            self::SUDOKU_LINE,
        ];
        $iterator = new RowIterator(3, $sudoku);

        $this->assertEquals(self::SUDOKU_LINE, $iterator->next());
        $this->assertEquals(array_reverse(self::SUDOKU_LINE), $iterator->next());
        $this->assertEquals(self::SUDOKU_LINE, $iterator->next());
        $this->assertNull($iterator->next());
    }
}
