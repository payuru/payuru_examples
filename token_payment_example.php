<?php

require_once __DIR__ . '/lib/PayU.php';

// merchant_id - текстовый
$payu = new PayU('merchant_id', '', 'secret_key');

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

/**
 * Формат ответа: {code: CODE, message: MESSAGE}
 * CODE || MESSAGE
 * 1       Operation successful
 * 300     Invalid transaction
 * 400     Unknown method
 * 500     Request expired
 * 600     Invalid merchant
 * 601     Not sufficient funds
 * 602     Expired card
 * 603     Terminal is locked, please try again
 * 604     Invalid Card
 * 605     Internal error
 * 606     Transaction declined
 * 700     REF_NO must be numeric
 * 800     REC_INTERVAL must be one of the next values
 * 900     REC_MULTIPLIER must be numeric
 * 1000    REC_ITERATIONS must be numeric
 * 1100    All parameters for REC_UPDATE are mandatory and with correct values
 * 1200    Invalid signature
 * 1300    Operation not permitted
 * 1400    Error in creating new token order
 * 1500    This token is invalid
 * 1600    Invalid External Ref No
 * 1700    Maximum transactions number exceeded
 * 1800    Invalid amount type
 * 1900    Maximum amount exedeed
 * 2000    Invalid currency
 */
print_r($result);
