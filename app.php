<?php

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/Utils.php');

use Secture\Sudoku\SudokuChecker;

$checker = new SudokuChecker();

$right = loadFromFile(__DIR__ . '/data/right.csv');
$wrong = loadFromFile(__DIR__ . '/data/wrong.csv');

var_dump($checker->check($right));
var_dump($checker->check($wrong));
