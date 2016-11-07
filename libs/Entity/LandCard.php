<?php
require_once DIR . '/libs/Entity/Card.php';
require_once DIR . '/libs/ValueObject/Config.php';

class LandCard extends Card
{
    private $tap_in;

    public function __construct($name, $mana, $tap_in)
    {
        parent::__construct(Config::TYPE_LAND, $name, $mana);
        $this->tap_in = $tap_in;
    }
}
