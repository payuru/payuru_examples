<?php

require_once __DIR__ . '/lib/PayU.php';

$payu = new PayU('merchant_id', 'merchant_name', 'secret_key');

// Обработка IPN запроса
$result = $payu->handleIpnRequest();
echo $result;
