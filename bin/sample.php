<?php

$land = 22;

class mtgCalculator
{
    // 最大ターン数
    private $max_turn = 8;
    // デッキの枚数
    private $deck = 60;
    // 土地の枚数
    private $land;

    public function viewLandExpectation()
    {
        printf("expectation values\n",'turn');
        printf("%5s",'turn');
        for ($i = 12; $i <= 28; $i++) {
            printf("|%9s","land $i");
        }
        printf("\n");

        printf("%5s",'-----');
        for ($i = 12; $i <= 28; $i++) {
            printf("+%9s","---------");
        }
        printf("\n");
        for ($turn = 1; $turn <= $this->max_turn; $turn++) {
            printf("%5d",$turn);
            for ($i = 12; $i <= 28; $i++) {
                printf("|%9f",$this->calcurateExpectation($turn, $i));
            }
            printf("\n");
        }
    }

    public function run()
    {

    }

    private function calcurateExpectation($turn, $number)
    {
        return (6 + $turn) * $number / $this->deck;
    }

    public function __construct($land)
    {
        $this->land = $land;
    }

}


$calculator = new mtgCalculator($land);
$calculator->viewLandExpectation();
