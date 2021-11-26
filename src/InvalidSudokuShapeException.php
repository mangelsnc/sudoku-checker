<?php declare(strict_types=1);

namespace Secture\Sudoku;

use DomainException;
use Throwable;

final class InvalidSudokuShapeException extends DomainException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct('Sudoku must be 9x9 shape');
    }
}
