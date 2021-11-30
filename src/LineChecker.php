<?php declare(strict_types=1);

namespace Secture\Sudoku;

use Secture\Sudoku\Exception\InvalidLineLengthException;
use Secture\Sudoku\Exception\InvalidLineValuesException;
use function Lambdish\Phunctional\all;

final class LineChecker
{
    const LINE_LENGTH = 9;
    const VALID_LINE_VALUES = [1, 2, 3, 4, 5, 6, 7, 8, 9];

    public function __invoke(array $line): bool
    {
        if (self::LINE_LENGTH !== count($line)) {
            throw new InvalidLineLengthException();
        }

        if (!all(function ($item) { return is_int($item); }, $line)) {
            throw new InvalidLineValuesException();
        }

        $line = array_unique($line);

        return !array_diff(self::VALID_LINE_VALUES, $line);
    }
}
