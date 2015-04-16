<?php

require_once dirname(__FILE__) . '/lib/PayU.php';

// merchant_name - текстовый
$payu = new PayU('', 'merchant_name', 'secret_key');

$result = $payu->sendIrnRequest(array(
    // данные IRN запроса
    'ORDER_REF' => '1',
    'ORDER_AMOUNT' => '1000',
    'ORDER_CURRENCY' => 'RUB',
    'IRN_DATE' => date('Y-m-d H:i:s'),
));

/**
 * Формат ответа: <EPAYMENT>ORDER_REF|RESPONSE_CODE|RESPONSE_MSG|IRN_DATE|ORDER_HASH</EPAYMENT>
 * RESPONSE_CODE || RESPONSE_MSG
 * 1                OK
 * 2                ORDER_REF missing or incorrect
 * 3                ORDER_AMOUNT missing or incorrect
 * 4                ORDER_CURRENCY is missing or incorrect
 * 5                IDN_DATE is not the correct format
 * 6                Error canceling order
 * 7                Order already canceled
 * 8                Unknow error
 * 9                Invalid ORDER_REF
 * 10               Invalid ORDER_AMOUNT
 * 11               Invalid ORDER_CURRENCY
 */
print_r($result);
