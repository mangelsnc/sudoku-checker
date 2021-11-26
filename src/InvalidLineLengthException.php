<?php declare(strict_types=1);

namespace Secture\Sudoku;

use DomainException;

final class InvalidLineLengthException extends DomainException
{
    public function __construct()
    {
        parent::__construct('Invalid line length');
    }
}
