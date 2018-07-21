<?php
require_once 'autoload.php';

use App\Airport\ControlTower;
use App\Airport\Aircraft;

// 管制塔インスタンス
$control_tower = new ControlTower();

// 旅客機インスタンス
$aircraft_1 = new Aircraft('A001便');
$aircraft_2 = new Aircraft('B002便');
$aircraft_3 = new Aircraft('C003便');
$aircraft_4 = new Aircraft('D004便');
$aircraft_5 = new Aircraft('E005便');

// 管制塔がレーダーで旅客機を捕捉しました
$control_tower->discovered($aircraft_1);
$control_tower->discovered($aircraft_2);
$control_tower->discovered($aircraft_3);
$control_tower->discovered($aircraft_4);
$control_tower->discovered($aircraft_5);

echo '<hr>';

// 着陸許可を求める機長たち
$aircraft_1->applyForLanding();
$aircraft_2->applyForLanding();
$aircraft_3->applyForLanding();
$aircraft_4->applyForLanding();
$aircraft_5->applyForLanding();

echo '<hr>';

// 「無線の調子がおかしい、返答が良く聞こえなかったな。」
// 「もう一度管制塔へ連絡してみよう。」
$aircraft_1->applyForLanding();
