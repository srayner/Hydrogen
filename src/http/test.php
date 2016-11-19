<?php

namespace Hydrogen\Http;

include 'Response.php';

$response = new Response('500');

echo '<br>' . $response->getCode();
echo '<br>' . $response->getMessage();

var_dump($response->getCode());

