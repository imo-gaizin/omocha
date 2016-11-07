<?php
class Card
{
    private $type;
    private $name;
    private $mana;

    public function __get($property)
    {
        return $this->$property;
    }

    public function getCardInfo()
    {
        return array(
            'name' => $this->name,
            'type' => $this->type,
            'mana' => $this->getManaRaw()
        );
    }

    // twig can't use __get
    public function getName()
    {
        return $this->name;
    }
    // twig can't use __get
    public function getType()
    {
        return $this->type;
    }

    public function getManaRaw()
    {
        if ($this->mana['N'] >= 1) {
            $mana_cost = $this->mana['N'];
        } else {
            $mana_cost = '';
        }
        foreach ($this->mana as $color => $count) {
            if ($color == 'total') {
                continue;
            }
            if ($color == 'N') {
                continue;
            }
            for ($i = 1; $i <= $count; $i++) {
                $mana_cost .= $color;
            }
        }
        return $mana_cost;
    }

    public function __construct($type, $name, $mana)
    {
        $this->type = $type;
        $this->name = $name;
        $this->mana = $mana;
    }
}
