<?php
require_once DIR . '/libs/ValueObject/Config.php';
require_once DIR . '/libs/Entity/Deck.php';
class DeckAnalyzer
{
    private $deck;
    private $bord;

    public function run()
    {
        $count = array();
        $land_count = 0;
        $spel_count = 0;
        foreach ($this->deck->getList() as $card){
            switch ($card->type) {
                case Config::TYPE_LAND :
                    $land_count ++;
                    $count['land'] = $this->addManaCount($count['land'], $card->mana);
                    break;
                default :
                    $spel_count ++;
                    $count['spel'] = $this->addTurnCount($count['spel'], $card->mana);
                    break;
            }
        }

        $count['count'] = array(
            'total' => $this->deck->getCount(),
            'land' => $land_count,
            'spel' => $spel_count,
        );
        ksort($count['spel']);
        return $count;
    }

    private function addManaCount($count, $mana)
    {
        foreach ($mana as $color => $value) {
            if ($color == 'total') {
                continue;
            }
            if ($color == 'N') {
                continue;
            }
            $count[$color] += $value;
        }
        return $count;
    }

    private function addTurnCount($count, $mana)
    {
        $count[$mana['total']]['count'] ++;
        foreach ($mana as $color => $value) {
            if ($color == 'total') {
                continue;
            }
            if ($color == 'N') {
                continue;
            }
            if ($count[$mana['total']][$color] <= $value) {
                $count[$mana['total']][$color] = $value;
            }
        }
        return $count;
    }

    public function __construct(Deck $deck)
    {
        $this->deck = $deck;
    }
}
