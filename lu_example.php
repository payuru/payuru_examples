<?php

require_once dirname(__FILE__) . '/lib/PayU.php';

$payu = new PayU('', 'merchant_name', 'secret_key');
//Первый параметр нужно оставлять пустым, если вы не используете Payout (выплаты на карты)

$order_pnames = array(
	"Тестовый товар 1",
	"Тестовый товар 2"
);

$order_pcodes = array(
	"Code0001",
	"Code0002"
);

$order_prices = array(
	1.01,
	1.02
);

$order_qtys = array(
	1,
	5
);

$order_vats = array(
	0,
	19
);

$order_ptype = array(
	'NET',
	'GROSS'
);

$formData = $payu->initLiveUpdateFormData(array(
    // Данные заказа
    'ORDER_REF' => 1,
    'ORDER_DATE' => date('Y-m-d H:i:s'),
    'ORDER_PNAME[]' => $order_pnames,
    'ORDER_PCODE[]' => $order_pcodes,
    'ORDER_PRICE[]' => $order_prices,
    'ORDER_QTY[]' => $order_qtys,
    'ORDER_VAT[]' => $order_vats,
    'ORDER_SHIPPING' => 100,
    'PRICES_CURRENCY' => 'RUB',
    'DISCOUNT' => 10,
    'TESTORDER' => 'TRUE',
    'AUTOMODE' => 1,
    'ORDER_PRICE_TYPE[]' => $order_ptype,
    // Данные плательщика
    'BILL_FNAME' => 'Петр',
    'BILL_LNAME' => 'Петров',
    'BILL_EMAIL' => 'petrov@example.com',
    'BILL_PHONE' => '79123456789',
    'BILL_ADDRESS' => 'ул. Шторная, д. 1',
    'BILL_CITY' => 'Москва',
    // Данные получателя
    'DELIVERY_FNAME' => 'Петр',
    'DELIVERY_LNAME' => 'Петров',
    'DELIVERY_PHONE' => '79123456789',
    'DELIVERY_ADDRESS' => 'ул. Шторная, д. 1',
    'DELIVERY_CITY' => 'Москва',
), 'http://example.com/order_done.php', 'PAY_BY_CLICK');


function makeString ($name, $val)
{	
	if (!is_array($val)) 
		echo '<input type="hidden" name="'.$name.'" value="'.htmlspecialchars($val).'">'."\n";
	else
		foreach ($val as $v) makeString($name, $v);
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Оплата заказа</title>
</head>
<body>
<form action="<?php echo PayU::LU_URL; ?>" method="post">
    <?php
          foreach ($formData as $formDataKey => $formDataValue)
        	makeString($formDataKey, $formDataValue);
    ?>
    <input type="submit" value="Оплатить заказ">
</form>
</body>
</html>
