<?php
class Calculator
{
    // 最大ターン数
    private $max_turn = 10;
    // デッキの枚数
    private $deck;

    public function getExpect($start = 4, $end = 28)
    {
        $result = array();
        for ($turn = 1; $turn <= $this->max_turn; $turn++) {
            for ($i = $start; $i <= $end; $i++) {
                $result[$turn][$i] = $this->calcurateExpectation($turn, $i);
            }
        }
        return $result;
    }

    private function calcurateExpectation($turn, $number)
    {
        $expect = (6 + $turn) * $number / $this->deck;
        return round($expect, 3);
    }

    public function getSpelNumbers($start = 1, $end = 12)
    {
        $result = array();
        for ($turn = 1; $turn <= $this->max_turn; $turn++) {
            for ($i = $start; $i <= $end; $i++) {
                $result[$turn][$i] = $this->calcurateSpelNumber($this->deck_list['total']['land'], $turn, $i);
            }
        }
        return $result;
    }

    private function calcurateSpelNumber($land, $cost, $expect = 1)
    {
        $number = $expect * $land / $cost;
        return round($number, 3);
    }

    public function __construct($deck = 60)
    {
        $this->deck = $deck;
    }

}
