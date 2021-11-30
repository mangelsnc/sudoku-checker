<?php declare(strict_types=1);

namespace Secture\Sudoku;

final class RowIterator implements Iterator
{
    private int $currentIteration;

    public function __construct(private array $sudoku)
    {
        $this->currentIteration = 0;
    }

    public function next(): ?array
    {
        if ($this->currentIteration >= count($this->sudoku)) {
            return null;
        }

        return $this->sudoku[$this->currentIteration++];
    }
}
