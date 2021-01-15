<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class TicTacToeTest extends TestCase
{
    /**
     * @dataProvider getDataSetFromAnArrayBoard
     */
    public function testAndTheWinnerIsWhenABoardIsAnArray(array $board, string $expectedResult)
    {
        $ticTac = new TicTacToe();
        $actualResult = $ticTac->andTheWinnerIs($board);
        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @dataProvider getDataSetFormAStringBoard
     */
    public function testAndTheWinnerIsWhenABoardIsAString(string $board, string $expectedResult)
    {
        $ticTac = new TicTacToe();
        $actualResult = $ticTac->andTheWinnerIs($board);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function getDataSetFromAnArrayBoard(): array
    {
        return [
            [
                [
                    ['O', 'X', 'O'],
                    ['X', 'X', 'O'],
                    ['O', 'X', 'X'],
                ],
                'X'
            ],
            [
                [
                    ['X', 'X', 'X'],
                    ['X', '0', 'O'],
                    ['O', 'X', 'X'],
                ],
                'X'
            ],
            [
                [
                    ['O', 'O', 'X'],
                    ['X', 'O', 'X'],
                    ['O', 'X', 'O'],
                ],
                'O'
            ],
            [
                [
                    ['O', 'O', 'X'],
                    ['O', 'X', 'X'],
                    ['X', 'X', 'O'],
                ],
                'X'
            ],
            [
                [
                    ['O', 'O', 'X'],
                    ['X', 'X', 'O'],
                    ['O', 'X', 'O'],
                ],
                'Tie'
            ],
            [
                [
                    ['X', 'X', 'X', 'X'],
                    ['X', '0', 'O', '0'],
                    ['O', 'X', 'X', 'X'],
                    ['O', 'X', 'X', 'X'],
                ],
                'X'
            ],
            [
                [
                    ['O', 'X', 'X', 'X', 'O'],
                    ['X', 'O', 'O', 'O', 'O'],
                    ['O', 'X', 'O', 'X', 'X'],
                    ['O', 'X', 'X', 'O', 'O'],
                    ['O', 'X', 'X', 'X', 'O'],
                ],
                'O'
            ],
            [
                [
                    ['O', 'X', 'X', 'X', 'O'],
                    ['X', 'X', 'O', 'O', 'O'],
                    ['O', 'O', 'O', 'X', 'X'],
                    ['O', 'X', 'X', 'O', 'O'],
                    ['O', 'X', 'X', 'X', 'O'],
                ],
                'Tie'
            ],
        ];
    }

    public function getDataSetFormAStringBoard(): array
    {
        return [
            [
                "O X O\nX X O\nO X X",
                'X'
            ],
            [
                "X X X\nX 0 O\nO X X",
                'X'
            ],
            [
                "O O X\nX O X\nO X O",
                'O'
            ],
            [
                "O O X\nO X X\nX X O",
                'X'
            ],
            [
                "O O X\nX X O\nO X O",
                'Tie'
            ],
        ];
    }
}