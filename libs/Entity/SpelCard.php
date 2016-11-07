<?php
require_once DIR . '/libs/Entity/Card.php';

class SpelCard extends Card
{
    public function __construct($type, $name, $mana)
    {
        parent::__construct($type, $name, $mana);
    }
}
