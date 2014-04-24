<?php
include_once '../../config/config.main.front.php';
if(isset($_GET['o']))
{
	$DB = new MyDb();
	$cOrder = new Order();
	$cOrder->setDB($DB);
	$arr = $cOrder->getOrder($_GET['o']);
	if($arr['order_number'] == '')
	{
		exit;
	}
	else
	{
		$cMember = new Member();
		$cMember->setDB($DB);
		$arr_member = $cMember->getMember($arr['account']);
		$arr_detail = $cOrder->getOrderDetail($_GET['o']);
		$rows = '';
		$cString = new String();
		foreach($arr_detail as $key => $val)
		{
			$name = $arr_detail[$key]['name'];
			$price = $arr_detail[$key]['price'];
			$price_dot = $cString->intToThousandSymbol($price);
			$quantity = $arr_detail[$key]['quantity'];
			$total = $arr_detail[$key]['total'];
			$total_dot = $cString->intToThousandSymbol($total);
			$rows .= <<< EOF
					<tr>
						<td>$name</td>
						<td>$ $price_dot</td>
						<td>$quantity</td>
						<td>$ $total</td>
						<td></td>
					</tr>
EOF;
		}
	}
}





?>