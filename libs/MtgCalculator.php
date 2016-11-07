<?php
class mtgCalculator
{
    // 最大ターン数
    private $max_turn = 10;
    // デッキの枚数
    private $deck;

    // デッキリスト
    private $deck_list;

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

    public function getCardConfig($type, $cost, $nunber)
    {
        return array(
            'type' => $type,
            'cost' => $cost,
            'number' => $nunber,
        );
    }

    public function buildDeckList($card_list)
    {
        $deck_list = array();
        foreach ($card_list as $card) {
            for ($i = 1; $i <= $card['number']; $i++) {
                $deck_list['card_list'][] = $card;
            }
            $deck_list['count'][$card['type']]['total'] += $card['number'];
            $deck_list['count'][$card['type']][$card['cost']] += $card['number'];
            $deck_list['total']['count'] += $card['number'];
        }
        $this->deck_list = $deck_list;
    }

    public function getDeckExpect($start = 4, $end = 28)
    {
        $result = array();
        for ($turn = 1; $turn <= $this->max_turn; $turn++) {
            for ($i = $start; $i <= $end; $i++) {
                $result[$turn][$i] = $this->calcurateExpectation($turn, $i);
            }
        }
        return $result;
    }

    public function __construct($deck = 60)
    {
        $this->deck = $deck;

    }

}
