<?php

require_once dirname(__FILE__) . '/lib/PayU.php';

// Первый - цифровой код ТСН, получаемый в PayU
// Второй - текстовое имя
$payu = new PayU('merchant_id', 'merchant_name', 'secret_key');

$formData = $payu->initPayoutLinkCardFormData(array(
    // данные формы для привязки карты (payout)
    'RequestID' => '1',
    'Email' => 'petrov@example.com',
    'FirstName' => 'Петр',
    'LastName' => 'Петров',
    'Description' => 'Привязка карты для вывода средств',
    'CardOwnerId' => '1',
    'Timestamp' => time(),
), 'http://example.com/payout_link.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Оплата заказа</title>
</head>
<body>
<form action="<?php echo PayU::PAYOUT_LINK_CARD_URL; ?>" method="post">
    <?php foreach ($formData as $formDataKey => $formDataValue): ?>
        <input type="hidden" name="<?php echo $formDataKey; ?>" value="<?php echo $formDataValue; ?>">
    <?php endforeach; ?>
    <input type="submit" value="Привязать карту">
</form>
</body>
</html>
