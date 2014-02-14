<?php

require_once __DIR__ . '/lib/PayU.php';

$payu = new PayU('merchant_id', 'merchant_name', 'secret_key');

$result = $payu->createTokenPayment(array(
    // Данные платежа
    'AMOUNT' => '1000',
    'EXTERNAL_REF' => '1',
    'TIMESTAMP' => date('YmdHis'),
    // Данные плательщика
    'BILL_FNAME' => 'Петр',
    'BILL_LNAME' => 'Петров',
    'BILL_EMAIL' => 'petrov@example.com',
    'BILL_PHONE' => '79123456789',
    'BILL_ADDRESS' => 'пл. Победы 1, кв. 1',
    'BILL_CITY' => 'Москва',
    // Данные получателя
    'DELIVERY_FNAME' => 'Петр',
    'DELIVERY_LNAME' => 'Петров',
    'DELIVERY_PHONE' => '79123456789',
    'DELIVERY_ADDRESS' => 'пл. Победы 1, кв. 1',
    'DELIVERY_CITY' => 'Москва',
), 'token_from_ipn');

print_r($result);
