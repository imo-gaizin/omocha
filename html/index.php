<?php
// init
require_once './init.php';


// 実行結果
if (isset($_POST['run_analyze'])) {
    $form_data = $_POST['deck_list'];
} else {
    // サンプルリスト
    $form_data = "
6,L,mount,R,0
6,L,forest,G,0
4,L,SOI,RG,0
4,L,Bat,RG,0
4,L,hub,LBGRUW,0

2,C,kibanaga,1G
4,C,manakuri,1G
4,C,tuuden,RG
3,C,okann,2R
4,C,torakka-,2G
4,C,haidora,2GG
4,C,gandam,3GG

3,I,nisesyoudou,R
4,I,chikuden,1R

4,P,chandora,2RR
";

}


// 文字列を 配列に整形
$lines = explode("\n", $form_data);
foreach ($lines as $line) {
    $line_array = str_getcsv($line);
    // 要素がそろっている列は残す
    if (count($line_array) >= 4) {
        $list[] = $line_array;
    }
}
// アナライザ
require_once DIR . '/libs/DeckFactry.php';
require_once DIR . '/libs/DeckAnalyzer.php';
$class = new DeckFactry();
$deck = $class->buildDeck($list);
$class = new DeckAnalyzer($deck);
$analyze_result = $class->run();

// デッキ操作
$deck->initDeck();

// 期待値表
require_once DIR. '/libs/Calculator.php';
$calculator = new Calculator();

$displaydata = array(
    'list' => $form_data,
    'result' => $analyze_result,
    'expect_lines' => $calculator->getExpect(),
    'hands' => $deck->getHand()
);

$_SESSION['deck'] = serialize($deck);

// Twig
$loader = new Twig_Loader_Filesystem(DIR . '/templates');
//$twig = new Twig_Environment($loader, array('cache' => DIR . '/twig_cache'));
// 開発用にキャッシュを無効化
$twig = new Twig_Environment($loader, array());
echo $twig->render('analyze/analyze.tpl', $displaydata);
