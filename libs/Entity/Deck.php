<?php

class Deck
{
    // deck list
    private $card_list = array();
    // deck yamahuda
    private $deck = array();
    // hand tehuda
    private $hand = array();


    public function getCount()
    {
        return count($this->card_list);
    }
    public function getList()
    {
        return $this->card_list;
    }

    // shuffle deck
    public function initDeck()
    {
        // hand empty
        $this->hand = array();
        // list to deck
        $this->deck = $this->card_list;
        $this->shuffleDeck();
        // drow 7 cards
        $this->draw(7);

    }
    // shuffle deck
    private function shuffleDeck()
    {
        shuffle($this->deck);
    }
    // draw card
    public function draw($number = 1)
    {
        $drows = array();
        for ($i = 1; $i <= $number; $i++) {
             $top = array_shift($this->deck);
             $this->hand[] = $top;
             $drows[] = $top;
        }
        return $drows;
    }

    // get hand classes
    public function getHand()
    {
        return $this->hand;
    }

    // get hand arrays
    public function getHandArray()
    {
        $array_list = array();
        foreach($this->hand as $card) {
            $array_list[] = $card->getCardInfo();
        }
        return $array_list;
    }

    // drow card & return array
    public function drawArray($number = 1)
    {
        $array_list = array();
        foreach($this->draw($number) as $card) {
            $array_list[] = $card->getCardInfo();
        }
        return $array_list;
    }

    public function __construct(array $card_list)
    {
        $this->card_list = $card_list;
    }
}
