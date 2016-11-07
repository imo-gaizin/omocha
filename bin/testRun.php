<?php
define('DIR','/var/www/mtg');

require_once DIR . '/libs/DeckFactry.php';
require_once DIR . '/libs/DeckController.php';
/**
 * // LAND
 * array(
 * 		'0' => number of card
 * 		'1' => card type           // 0 : land
 * 		'2' => name of card
 * 		'3' => Can put out mana    // ex, aetel hab : LBGRUW
 * 		'4' => tapin or untap      // 0 : un tap in 1 : tap in
 * )
 *
 * // SPEL
 * array(
 * 		'0' => number of card
 * 		'1' => card type          // ex, 1 : CREATURE, 5 : INSTANT
 * 		'2' => name of card
 * 		'3' => cost of mana       // ex, 3LBGRUW
 * )
 */
$list = array(
    array(5, 0, 'mount', 'R', 0),
    array(5, 0, 'forest', 'G', 0),
    array(4, 0, 'SOI', 'RG', 0),
    array(4, 0, 'Bat', 'RG', 0),
    array(4, 0, 'hub', 'LBGRUW', 0),

    array(4, 1, 'minarai', 'R'),
    array(2, 1, 'ono', 'R'),
    array(4, 1, 'kibanaga', '1G'),
    array(4, 1, 'tuuden', 'RG'),
    array(4, 2, 'koputer', '2'),
    array(4, 5, 'chikuden', '1R'),
    array(4, 1, 'heriyon', '2R'),
    array(4, 1, 'sai', '2G'),
    array(4, 2, 'kousoku', '4'),
    array(2, 1, 'gandam', '3GG'),
    array(2, 6, 'nissa', '3GG'),
);

$class = new DeckFactry();
$deck = $class->buildDeck($list);
var_dump($deck->getCount());
$class = new DeckController($deck);
var_dump($class->analyze());


// end
