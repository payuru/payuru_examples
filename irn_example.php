<?php

require_once __DIR__ . '/lib/PayU.php';

$payu = new PayU('merchant_id', 'merchant_name', 'secret_key');

$result = $payu->sendIrnRequest(array(
    // данные IRN запроса
    'ORDER_REF' => '1',
    'ORDER_AMOUNT' => '1000',
    'IRN_DATE' => date('Y-m-d H:i:s'),
));

print_r($result);
