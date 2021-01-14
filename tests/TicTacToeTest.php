<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

class TicTacToeTest extends TestCase
{
    /**
     * @dataProvider getDataSet
     * @group tic
     */
    public function testAndTheWinnerIs(array $board, string $expectedResult)
    {
        $ticTac = new TicTacToe();
        $actualResult = $ticTac->andTheWinnerIs($board);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function getDataSet(): array
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
        ];
    }
}