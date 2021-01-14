<?php

declare(strict_types = 1);

class TicTacToe
{
    public function andTheWinnerIs(array $board) : string
    {
        return $this->theWinnerIsHorizontallyAligned($board[0], $board[1], $board[2]) ??
            $this->theWinnerIsVerticallyAligned([$board[0][0],$board[1][0],$board[2][0]], [$board[0][1],$board[1][1],$board[2][1]], [$board[0][2],$board[1][2],$board[2][2]]) ??
            $this->theWinnerIsDiagonallyAligned([$board[0][0],$board[1][1],$board[2][2]], [$board[0][2],$board[1][1],$board[2][0]]) ?? 'Tie';
    }

    private function searchWinnerFrom(array $line): ?string
    {
        $result = array_search(3, array_count_values($line));

        return $result !== false ? $result : null;
    }

    private function theWinnerIsVerticallyAligned(array $line0, array $line1, array $line2): ?string
    {
        return $this->searchWinnerFrom($line0) ?? $this->searchWinnerFrom($line1) ?? $this->searchWinnerFrom($line2) ?? null;
    }

    private function theWinnerIsHorizontallyAligned(array $column0, array $column1, array $column2)
    {
        return $this->searchWinnerFrom($column0) ?? $this->searchWinnerFrom($column1) ?? $this->searchWinnerFrom($column2) ?? null;
    }

    private function theWinnerIsDiagonallyAligned(array $firstDiagonal, array $secondDiagonal)
    {
        return $this->searchWinnerFrom($firstDiagonal) ?? $this->searchWinnerFrom($secondDiagonal) ?? null;
    }
}