<?php
// init
require_once './init.php';

// Session Deck
require_once DIR . '/libs/Entity/Deck.php';
require_once DIR . '/libs/Entity/LandCard.php';
require_once DIR . '/libs/Entity/SpelCard.php';

$data = json_decode(file_get_contents('php://input'), true);

if ($data['method'] == 'reset') {
    $deck = unserialize($_SESSION['deck']);
    $deck->initDeck();
    //header('Access-Control-Allow-Origin: *');
    echo json_encode(array(
        'result' => true,
        'value'  => $deck->getHandArray()
    ));
    $_SESSION['deck'] = serialize($deck);
    exit;
} elseif ($data['method'] == 'drow') {
    $deck = unserialize($_SESSION['deck']);
    //header('Access-Control-Allow-Origin: *');
    echo json_encode(array(
        'result' => true,
        'value'  => $deck->drawArray()
    ));
    $_SESSION['deck'] = serialize($deck);
    exit;
}
