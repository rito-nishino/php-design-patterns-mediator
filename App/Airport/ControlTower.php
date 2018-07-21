<?php

namespace App\Airport;

use App\Airport\Aircraft;

class ControlTower
{
    private $aircrafts = [];    // 管制塔が把握している旅客機
    private $landing = [        // 着陸滑走路の使用状況
        '01' => null,
        '02' => null,
        '03' => null,
    ];

    public function discovered(Aircraft $aircraft)
    {
        $aircraft->setControlTower($this);
        if (!array_key_exists($aircraft->getName(), $this->aircrafts)) {
            $this->aircrafts[$aircraft->getName()] = $aircraft;
            echo sprintf('%s をレーダーで捕捉しました<br>', $aircraft->getName());
        }
    }

    public function applyForLanding($aircraft_name)
    {
        $runway_number = array_search($aircraft_name, $this->landing);
        if ($runway_number) {
            echo sprintf('もう着陸許可は下りているわ、%s番滑走路を使って。<br>', $runway_number);
        } else {
            $allow = false;
            foreach ($this->landing as $key => $runway) {
                if (!$runway) {
                    $this->landing[$key] = $aircraft_name;
                    $allow = true;
                    echo sprintf('%s こちら管制塔。着陸を許可する。%s番滑走路を使ってください。<br>', $aircraft_name, $key);
                    return false;
                }
            }
            if (!$allow) {
                echo sprintf('%sへ、こちら管制塔。現在滑走路は埋まっているので少し待ってください。<br>', $aircraft_name);
            }
        }
    }
}