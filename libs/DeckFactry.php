<?php
require_once DIR . '/libs/ValueObject/Config.php';
require_once DIR . '/libs/Entity/Deck.php';
require_once DIR . '/libs/Entity/LandCard.php';
require_once DIR . '/libs/Entity/SpelCard.php';
class DeckFactry
{
    public function buildDeck($deck_list)
    {
        $card_list = array();
        foreach ($deck_list as $card_info) {
            for ($i = 1; $i <= $card_info[0]; $i++) {
                switch ($card_info[1]) {
                    case Config::TYPE_LAND :
                        $card_list[] = new LandCard(
                            $card_info[2],
                            $this->getCostCount($card_info[3]),
                            $card_info[4]
                        );
                        break;
                    default :
                        $card_list[] = new SpelCard(
                            $card_info[1],
                            $card_info[2],
                            $this->getCostCount($card_info[3])
                        );
                        break;
                }
            }
        }
        return new Deck($card_list);
    }

    private function getCostCount($cost_string)
    {
        $result = array(
            'N' => 0,
            'B' => 0,
            'G' => 0,
            'R' => 0,
            'U' => 0,
            'W' => 0,
            'L' => 0
        );
        $cost_array = str_split($cost_string);
        foreach ($cost_array as $symbol) {
            switch ($symbol) {
                case 'B' :
                case 'G' :
                case 'R' :
                case 'U' :
                case 'W' :
                case 'L' :
                    $result[$symbol] += 1;
                    $result['total'] += 1;
                    break;
                default :
                    if (is_numeric($symbol)) {
                        $result['N'] += $symbol;
                        $result['total'] += $symbol;
                    }
                    break;
            }
        }
        return $result;
    }
}
