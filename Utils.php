<?php declare(strict_types=1);

function loadFromFile(string $file): array
{
    if (!is_file($file)) {
        die('Invalid file path ' . $file);
    }

    $sudoku = [];
    $fd = fopen($file, 'r');

    while ($line = fgetcsv($fd, 0, ';')) {
        $sudoku[] = array_map(function ($item) {
            return intval($item);
        }, $line);
    }

    return $sudoku;
}
