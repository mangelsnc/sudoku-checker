<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Secture\Sudoku\ColumnIterator;

final class ColumnIteratorTest extends TestCase
{
    const SUDOKU_LINE = [1, 2, 3];

    /** @test  */
    public function itShouldReturnNextRow()
    {
        $sudoku = [
            self::SUDOKU_LINE,
            array_reverse(self::SUDOKU_LINE),
            self::SUDOKU_LINE,
        ];
        $iterator = new ColumnIterator(3, $sudoku);

        $this->assertEquals([1, 3, 1], $iterator->next());
        $this->assertEquals([2, 2, 2], $iterator->next());
        $this->assertEquals([3, 1, 3], $iterator->next());
    }

    /** @test  */
    public function itShouldReturnNullIfTheresNoNextRow()
    {
        $sudoku = [
            self::SUDOKU_LINE,
            array_reverse(self::SUDOKU_LINE),
            self::SUDOKU_LINE,
        ];
        $iterator = new ColumnIterator(3, $sudoku);

        $this->assertEquals([1, 3, 1], $iterator->next());
        $this->assertEquals([2, 2, 2], $iterator->next());
        $this->assertEquals([3, 1, 3], $iterator->next());
        $this->assertNull($iterator->next());
    }
}
