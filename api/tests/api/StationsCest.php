<?php

namespace api\tests;

use common\fixtures\RailroadStationFixture;

class StationsCest
{
    public function _fixtures(): array
    {
        return [
            'station' => [
                'class' => RailroadStationFixture::class,
                'dataFile' => codecept_data_dir() . 'railroad_station.php'
            ],
        ];
    }

    // tests
//    public function getStationsTest(ApiTester $I): void
//    {
//        $I->sendGet('stations');
//        $I->seeResponseCodeIs(200);
//        $I->seeResponseIsJson();
//        $I->seeResponseContainsJson([
//            [
//                "Код" => "0000111",
//                "Наименование" => "ст.Курская",
//            ]
//        ]);
//    }
}
