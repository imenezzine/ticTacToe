## Les règles du TicTacToe

Le TicTacToe (ou Morpion) est un jeu ou deux personnes doivent poser des pions pour essayer de réaliser des lignes horizontales, verticales ou diagonales. Le premier joueur réalisant une ligne gagne la partie.

Le joueur utilisant les pions :x: commence toujours.

## :nerd_face: Comment ça marche

### Technos utilisés : 
- `PHP7` : langage de programmation
- `Composer` : outil de gestion de dépendences
- `Phpunit` : framework de test

### Description du code :
- la classe TicTacToe contient une fonction `andTheWinnerIs` :
  1. qui prend en argument une grille de `3 x 3` cases ;
  2. et retourne :
      - `"X"` si 3 :x: sont alignés verticalement, horizontalement ou dans l'une des 2 diagonales ;
      - `"O"` si 3 :o: sont alignés verticalement, horizontalement ou dans l'une des 2 diagonales ;
      - `"Tie"` si ni :x: ni :o: n'a gagné (égalité).
- la classe TicTacToeTest contient les tests unitaires de l'algortihme utilisé pour résoudre l'exercice. (Avec `getDataSet` c'est le dataProvider qui contient le jeu de données utilisés pour valider les tests)

#### :point_right:  Extrait de code de test :
```php
<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

class TicTacToeTest extends TestCase
{
    /**
     * @dataProvider getDataSet
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
}```
```
## :bulb: Comment lancer les tests
Lancer les commandes suivantes :
- composer install (composer doit être installé sur votre machine)
- vendor/bin/phpunit tests/
