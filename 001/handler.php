<?php

// set json response in header 
header("Content-Type: application/json"); 

// default variables
const OK = 200;
const BAD_REQUEST = 400;
$data = [
    'status' => 'fail',
    'result' => null
];

// default response
// https://developer.mozilla.org/ru/docs/Web/HTTP/Status
http_response_code(BAD_REQUEST);

// validate POST request
$hasPostString = !empty($_POST) && !empty($_POST['string']);
if ($hasPostString) {
    $data = [
        'status' => 'ok',
        'result' => md5($_POST['string'])
    ];

    http_response_code(OK);
}

echo json_encode($data);
