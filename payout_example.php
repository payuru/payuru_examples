<?php

require_once __DIR__ . '/lib/PayU.php';

$payu = new PayU('merchant_id', 'merchant_name', 'secret_key');

$result = $payu->sendPayoutRequest(array(
    // данные Payout запроса
    'amount' => '1000',
    'currency' => 'RUB',
    'clientCountryCode' => 'RU',
    'outerId' => '1',
    'desc' => 'Вывод средств',
    'senderFirstName' => 'Петр',
    'senderLastName' => 'Петров',
    'senderEmail' => 'petrov@example.com',
    'senderPhone' => '79123456789',
    'clientFirstName' => 'Петр',
    'clientLastName' => 'Петров',
    'clientEmail' => 'petrov@example.com',
    'timestamp' => time(),
), 'token_from_ipn');

print_r($result);
