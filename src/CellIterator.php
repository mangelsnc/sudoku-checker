<?php declare(strict_types=1);

namespace Secture\Sudoku;

final class CellIterator implements Iterator
{
    private int $currentIteration;
    private int $cellLength;

    public function __construct(private int $maxIterations, private array $sudoku)
    {
        $this->currentIteration = 0;
        $this->cellLength = (int) sqrt($this->maxIterations);
    }

    public function next(): ?array
    {
        if ($this->currentIteration >= $this->maxIterations) {
            return null;
        }

        $endRow = (int) (floor($this->currentIteration / $this->cellLength) + 1) * $this->cellLength;
        $endColumn = ($this->currentIteration % $this->cellLength + 1) * $this->cellLength;
        $cell = [];

        for ($row = $endRow - $this->cellLength; $row < $endRow; $row++) {
            for ($column = $endColumn - $this->cellLength; $column < $endColumn; $column++) {
                $cell[] = $this->sudoku[$row][$column];
            }
        }

        $this->currentIteration++;

        return $cell;
    }
}
