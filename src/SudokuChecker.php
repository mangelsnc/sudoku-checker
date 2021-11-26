<?php declare(strict_types=1);

namespace Secture\Sudoku;

use function Lambdish\Phunctional\all;
use function Lambdish\Phunctional\apply;

final class SudokuChecker
{
    const ROWS = 9;
    const COLUMNS = 9;

    private RowIterator $rowIterator;
    private ColumnIterator $columnIterator;
    private CellIterator $cellIterator;
    private LineChecker $lineChecker;

    public function __construct()
    {
        $this->lineChecker = new LineChecker();
    }

    public function check(array $sudoku): bool
    {

        $this->checkSudokuShape($sudoku);
        $this->checkValues($sudoku);

        $this->columnIterator = new ColumnIterator($sudoku);
        $this->rowIterator = new RowIterator($sudoku);
        $this->cellIterator = new CellIterator($sudoku);

        while ($line = $this->rowIterator->next()) {
            if (!apply($this->lineChecker, [$line])) {
                return false;
            }
        }

        while ($line = $this->columnIterator->next()) {
            if (!apply($this->lineChecker, [$line])) {
                return false;
            }
        }

        while ($line = $this->cellIterator->next()) {
            if (!apply($this->lineChecker, [$line])) {
                return false;
            }
        }

        return true;
    }

    private function checkSudokuShape(array $sudoku): void
    {
        if (count($sudoku) !== self::ROWS || array_reduce($sudoku, function ($previous, $row) {
                return $previous && count($row) === self::COLUMNS;
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
