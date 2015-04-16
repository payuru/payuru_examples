<?php

require_once dirname(__FILE__) . '/lib/PayU.php';

$payu = new PayU('merchant_id', 'merchant_name', 'secret_key');

/**
 * В $_POST будут содержаться параметры, выбранные в панеле управления настройками IPN.
 */

// Обработка IPN запроса
$result = $payu->handleIpnRequest();
echo $result;
