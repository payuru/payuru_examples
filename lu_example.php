<?php

require_once __DIR__ . '/lib/PayU.php';

$payu = new PayU('merchant_id', 'merchant_name', 'secret_key');

$formData = $payu->initLiveUpdateFormData(array(
    // Данные заказа
    'ORDER_REF' => 1,
    'ORDER_DATE' => date('Y-m-d H:i:s'),
    'ORDER_PNAME[]' => 'Apple iPhone 5C 16Gb',
    'ORDER_PCODE[]' => '1',
    'ORDER_PRICE[]' => '21990',
    'ORDER_QTY[]' => '1',
    'ORDER_VAT' => 0,
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
), 'http://example.com/order_done.php', 'PAY_BY_CLICK');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Оплата заказа</title>
</head>
<body>
<form action="<?php echo PayU::LU_URL; ?>" method="post">
    <?php foreach ($formData as $formDataKey => $formDataValue): ?>
        <input type="hidden" name="<?php echo $formDataKey; ?>" value="<?php echo $formDataValue; ?>">
    <?php endforeach; ?>
    <input type="submit" value="Оплатить заказ">
</form>
</body>
</html>
