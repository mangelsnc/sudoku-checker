<?php declare(strict_types=1);

namespace Secture\Sudoku;

final class CellIterator
{
    const MAX_ITERATIONS = 9;
    const CELL_HEIGHT = 3;
    const CELL_WIDTH = 3;
    const ROW_LENGTH = 9;

    private int $currentIteration;

    public function __construct(private array $sudoku)
    {
        $this->currentIteration = 0;
    }

    public function next(): ?array
    {
        if ($this->currentIteration >= self::MAX_ITERATIONS) {
            return null;
        }

        $initialRowValue = floor($this->currentIteration / self::CELL_HEIGHT) * self::CELL_HEIGHT;
        $endRowValue = $initialRowValue + 2;
        $initialColumnValue = ($this->currentIteration * self::CELL_WIDTH) % self::ROW_LENGTH;
        $endColumnValue = $initialColumnValue + 2;
        $cell = [];

        for ($row = $initialRowValue; $row <= $endRowValue; $row++) {
            for ($column = $initialColumnValue; $column <= $endColumnValue; $column++) {
                $cell[] = $this->sudoku[$row][$column];
            }
        }

        $this->currentIteration++;

        return $cell;
    }
}
