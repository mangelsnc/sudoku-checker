<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Secture\Sudoku\Exception\InvalidLineLengthException;
use Secture\Sudoku\Exception\InvalidLineValuesException;
use Secture\Sudoku\LineChecker;
use function Lambdish\Phunctional\apply;

final class LineCheckerTest extends TestCase
{
    /** @test */
    public function itShouldThrowExceptionIfLineHasTheWrongLenght()
    {
        $lineChecker = new LineChecker(9);

        $lineToCheck = [1, 2, 3];

        $this->expectException(InvalidLineLengthException::class);

        apply($lineChecker, [$lineToCheck]);
    }

    /** @test */
    public function itShouldThrowExceptionIfLineHasInvalidElements()
    {
        $lineChecker = new LineChecker(9);

        $lineToCheck = [1, 2, 3, 4, 5, 6, 7, 8, null];

        $this->expectException(InvalidLineValuesException::class);

        apply($lineChecker, [$lineToCheck]);
    }

    /** @test */
    public function itShouldReturnFalseIfLineIsInvalid()
    {
        $lineChecker = new LineChecker(9);

        $lineToCheck = [1, 2, 3, 4, 5, 6, 7, 8, 8];

        $this->assertFalse(apply($lineChecker, [$lineToCheck]));
    }

    /** @test */
    public function itShouldReturnTrueIfLineIsValid()
    {
        $lineChecker = new LineChecker(9);

        $lineToCheck = [1, 2, 3, 4, 5, 6, 7, 8, 9];

        $this->assertTrue(apply($lineChecker, [$lineToCheck]));

        $this->assertTrue(apply($lineChecker, [array_reverse($lineToCheck)]));
    }
}
