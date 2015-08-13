<?php

require_once __DIR__ . '/lib/PayU.php';

// Первый - текстовое имя ТСН 
$payu = new PayU('merchant_id', '', 'secret_key');

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

/**
 * Формат ответа: {CODE: MESSAGE}
 * CODE || MESSAGE
 * 1       Success
 * 9       PENDING (check status of transaction using API or in cPanel)
 * -1      ERROR
 * -100    Error with sending the Payout to the bank
 * -101    MerchantCode empty
 * -102    MerchantCode error (merchant does not exist on our system)
 * -103    MerchantCode error (merchant exists, no payout package activated)
 * -104    Amount error
 * -105    OuterId error
 * -106    SenderEmail error
 * -107    Transaction value is smaller than commission amount
 * -108    ClientCountry error
 * -109    CCnumber error
 * -110    Description error error
 * -111    Signature error
 * -112    No balance available
 * -113    SenderPhone error
 * -114    ClientEmail error
 * -115    ClientPhone error
 * -116    SenderFirstName error
 * -117    SenderLastName error
 * -118    ClientFirstName error
 * -119    ClientLastName error
 * -120    Currency error
 * -121    Timestamp error
 * -122    Please send only one recipient identifier (token or card)
 * -123    please send at least one recipient identifier (token or card)
 * -124    Token error
 * -125    ClientCountryCode error
 */
print_r($result);
