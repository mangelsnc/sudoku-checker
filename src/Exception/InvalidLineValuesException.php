<?php declare(strict_types=1);

namespace Secture\Sudoku\Exception;

use DomainException;

final class InvalidLineValuesException extends DomainException
{

    public function __construct()
    {
        parent::__construct('Line has invalid values');
    }
}
