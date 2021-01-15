<?php

declare(strict_types=1);

class TicTacToe
{
    public function andTheWinnerIs(array|string $board): string
    {
        if (!is_array($board)) {
            $board = $this->buildABoardWhenIsAString($board);
        }

        return $this->theWinnerIsHorizontallyAligned($board) ??
            $this->theWinnerIsVerticallyAligned($board) ??
            $this->theWinnerIsDiagonallyAligned($this->sliceFirstDiagonalFromABoard($board), $this->sliceSecondDiagonalFromABoard($board)) ?? 'Tie';
    }

    private function buildABoardWhenIsAString(string $board)
    {
        return array_map(function ($item) {
            return $this->convertStringToArray(' ', $item);
        }, $this->convertStringToArray(PHP_EOL, $board));
    }

    private function convertStringToArray(string $delimiter, string $line): array
    {
        return explode($delimiter, $line);
    }

    private function theWinnerIsHorizontallyAligned(array $board): ?string
    {
        for ($line = 0; $line < count($board); $line++) {
            if ($result = $this->searchWinnerFrom($board[$line])) {
                return $result;
            }
        }

        return null;
    }

    private function theWinnerIsVerticallyAligned(array $board): ?string
    {
        for ($column = 0; $column < count($board); $column++) {
            if ($result = $this->searchWinnerFrom($this->sliceAColumnFromABoard($board, $column))) {
                return $result;
            }
        }

        return null;
    }

    private function theWinnerIsDiagonallyAligned(array $firstDiagonal, array $secondDiagonal)
    {
        return $this->searchWinnerFrom($firstDiagonal) ?? $this->searchWinnerFrom($secondDiagonal) ?? null;
    }

    private function searchWinnerFrom(array $line): ?string
    {
        $result = array_search(count($line), array_count_values($line));

        return $result !== false ? $result : null;
    }

    private function sliceAColumnFromABoard(array $board, int $column): array
    {
        $columns = [];
        for ($line = 0; $line < count($board); $line++) {
            array_push($columns, $board[$line][$column]);
        }

        return $columns;
    }

    private function sliceFirstDiagonalFromABoard(array $board): array
    {
        $diagonal = [];
        for ($diag = 0; $diag < count($board); $diag++) {
            array_push($diagonal, $board[$diag][$diag]);
        }

        return $diagonal;
    }

    private function sliceSecondDiagonalFromABoard(array $board): array
    {
        $line = 0;
        $column = count($board) - 1;
        $diagonal = [];

        while ($line < count($board) && $column >= 0) {
            array_push($diagonal, $board[$line][$column]);
            $line++;
            $column--;
        }

        return $diagonal;
    }
}