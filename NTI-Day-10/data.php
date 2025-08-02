<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

if($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    $data = ['data' => [["message"=>'Wrong try to get data']], 'error' => true,'mesaages'=>"Data doesn't Retrieved "];
    echo json_encode($data);
}else{

    $items=[

        "data"=>[
            [
                "name"=>"James",
                "id"=>1,
                "city"=>"New York",
            ],
            [
                "name"=>"John",
                "id"=>2,
                "city"=>"Edinburgh",
            ]
        ],
        "error"=>false,
        "mesaages"=>"Data Retrieved successfully",
    ];
    echo json_encode($items);
}
