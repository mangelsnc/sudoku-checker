<?php declare(strict_types=1);

namespace Secture\Sudoku;

use Secture\Sudoku\Exception\InvalidLineLengthException;
use Secture\Sudoku\Exception\InvalidLineValuesException;
use function Lambdish\Phunctional\all;

final class LineChecker
{
    private array $validLineValues;

    public function __construct(private int $length)
    {
        $this->validLineValues = range(1, $this->length);
    }

    public function __invoke(array $line): bool
    {
        if ($this->length !== count($line)) {
            throw new InvalidLineLengthException();
        }

        if (!all(function ($item) { return is_int($item); }, $line)) {
            throw new InvalidLineValuesException();
        }

        $line = array_unique($line);

        return !array_diff($this->validLineValues, $line);
    }
}
