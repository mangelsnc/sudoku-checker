<?php declare(strict_types=1);

namespace Secture\Sudoku;

use Secture\Sudoku\Exception\InvalidLineValuesException;
use Secture\Sudoku\Exception\InvalidSudokuShapeException;
use function Lambdish\Phunctional\all;
use function Lambdish\Phunctional\apply;

final class SudokuChecker
{
    const LENGTH = 9;

    private LineChecker $lineChecker;

    public function __construct()
    {
        $this->lineChecker = new LineChecker(self::LENGTH);
    }

    public function check(array $sudoku): bool
    {
        $this->checkSudokuShape($sudoku);
        $this->checkValues($sudoku);

        $iterators = [
            new ColumnIterator(self::LENGTH, $sudoku),
            new RowIterator(self::LENGTH, $sudoku),
            new CellIterator(self::LENGTH, $sudoku),
        ];

        foreach ($iterators as $iterator) {
            while ($line = $iterator->next()) {
                if (!apply($this->lineChecker, [$line])) {
                    return false;
                }
            }
        }

        return true;
    }

    private function checkSudokuShape(array $sudoku): void
    {
        if (count($sudoku) !== self::LENGTH || array_reduce($sudoku, function ($previous, $row) {
                return $previous && count($row) === self::LENGTH;
            })) {
            throw new InvalidSudokuShapeException();
        }
    }

    private function checkValues(array $sudoku): void
    {
        foreach ($sudoku as $line) {
            if (!all(function ($item) { return is_int($item); }, $line)) {
                throw new InvalidLineValuesException();
            }
        }
    }
}
