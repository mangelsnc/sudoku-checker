<?php declare(strict_types=1);


namespace Secture\Sudoku;


interface Iterator
{
    public function next(): ?array;
}
