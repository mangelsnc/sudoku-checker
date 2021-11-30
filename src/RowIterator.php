<?php declare(strict_types=1);

namespace Secture\Sudoku;

final class RowIterator implements Iterator
{
    private int $currentIteration;

    public function __construct(private int $maxIterations, private array $sudoku)
    {
        $this->currentIteration = 0;
    }

    public function next(): ?array
    {
        if ($this->currentIteration >= $this->maxIterations) {
            return null;
        }

        return $this->sudoku[$this->currentIteration++];
    }
}
