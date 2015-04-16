<?php

require_once dirname(__FILE__) . '/lib/PayU.php';

// merchant_name - текстовый
$payu = new PayU('', 'merchant_name', 'secret_key');

$result = $payu->sendIosRequest(1);

/**
 * Пример ответа.
 *
 * <order>
 * <order_date>2006-10-26 10:15:00</order_date>
 * <refno>1</refno>
 * <refnoext>EPAY10425</refnoext>
 * <order_status>PAYMENT_AUTHORIZED</order_status>
 * <paymethod>Credit/debit card (Visa/MasterCard)</paymethod>
 * </order>
 */
echo $result;
