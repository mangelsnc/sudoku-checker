<?php declare(strict_types=1);

namespace Secture\Sudoku;

final class ColumnIterator
{
    private int $currentIteration;

    public function __construct(private array $sudoku)
    {
        $this->currentIteration = 0;
    }

    public function next(): ?array
    {
        if ($this->currentIteration >= count($this->sudoku[0])) {
            return null;
        }

        return array_column($this->sudoku, $this->currentIteration++);
    }
}
