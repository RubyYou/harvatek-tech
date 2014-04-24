<?php include_once 'shop.c.php';?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo FWEB_TITLE;?></title>
<meta http-equiv="Content-Type" content="charset=utf-8">
</head>
<body>
<p>親愛的 <?php echo $arr_member['name'];?> 您好，以下為您的購物資料，如有任何問題，請來信/電與小島商行聯絡，謝謝</p>
<table width="767" border="1" cellpadding="5" cellspacing="0" style="color:#333333;font-family:arial;">
	<tr>
		<td rowspan="5" style="color:#AF121E">會員資料</td>
	</tr>
	<tr>
		<td width="60">姓名</td>
		<td><?php echo $arr_member['name'];?></td>
		<td width="60">手機</td>
		<td><?php echo $arr_member['account'];?></td>
	</tr>
	<tr>
		<td>市話</td>
		<td>
			<?php echo ($arr_member['tel_area'] == '')?'': $arr_member['tel_area'].'-';?>
			<?php echo $arr_member['tel'];?>
			<?php echo ($arr_member['tel_ext'] == '')?'': '#'.$arr_member['tel_ext'];?>
		</td>
		<td>傳真</td>
		<td>
			<?php echo $arr_member['fax'];?>
		</td>
	</tr>
	<tr>
		<td>地址</td>
		<td colspan="3">
			<?php echo $arr_member['area_code'];?>&nbsp;
			<?php echo $arr_member['city'];?>
			<?php echo $arr_member['area'];?>
			<?php echo $arr_member['address'];?>
		</td>
	</tr>
	<tr>
		<td>E-mail</td>
		<td colspan="3">
			<?php echo $arr_member['email'];?>
		</td>
	</tr>
	<tr>
		<td rowspan="5" style="color:#AF121E">收貨人</td>
	</tr>
	<tr>
		<td width="60">姓名</td>
		<td>
			<?php echo $arr['name'];?>
		</td>
		<td width="60">手機</td>
		<td>
			<?php echo $arr['cellphone'];?>
		</td>
	</tr>
	<tr>
		<td>市話</td>
		<td>
			<?php echo $arr['tel'];?>
		</td>
		<td>傳真</td>
		<td>
			<?php echo $arr['fax'];?>
		</td>
	</tr>
	<tr>
		<td>地址</td>
		<td colspan="3">
			<?php echo $arr['area_code'];?>
			<?php echo $arr['city'];?>
			<?php echo $arr['area'];?>
			<?php echo $arr['address'];?>
		</td>
	</tr>
	<tr>
		<td>E-mail</td>
		<td colspan="3">
			<?php echo $arr['email'];?>
		</td>
	</tr>
	<tr>
		<td rowspan="4" style="color:#AF121E">發票</td>
	</tr>
	<tr>
		<td height="40" colspan="4">
			<input type="radio" name="donate" disabled="disabled" <?php echo ($arr['donate'] == 1)?'checked="checked"':'';?>/> 捐贈
			<input type="radio" name="donate" disabled="disabled" <?php echo ($arr['donate'] == 0)?'checked="checked"':'';?>/> 我要索取紙本發票(寄送至購買人地址)
		</td>
	</tr>
	<tr>
		<td height="80" colspan="4">
			<input type="radio" name="receipt" disabled="disabled" <?php echo ($arr['receipt'] == 0)?'checked="checked"':'';?>/> 發票無需統一編號<br>
			<input type="radio" name="receipt" disabled="disabled" <?php echo ($arr['receipt'] == 1)?'checked="checked"':'';?>/> 發票需打統一編號
		</td>
	</tr>
	<tr>
		<td height="85" colspan="4">
			受買人：<?php echo $arr['receipt_title'];?>
			<br/>
			統一編號：<?php echo $arr['receipt_number'];?>
		</td>

	</tr>
	<tr>
		<td rowspan="3" style="color:#AF121E">訂單內容</td>
	</tr>
	<tr>
		<td colspan="4"><b>訂單編號:<?php echo $arr['order_number'];?></b></td>
	</tr>
	<tr>
		<td colspan="4">
			<table border="1" cellpadding="5" cellspacing="0" style="width:100%;color:#333333;font-family:arial;">
				<tr>
					<th>商品名稱</th>
					<th>單價</th>
					<th>數量</th>
					<th>金額</th>
					<th> </th>
					
				</tr>
				
				<!--row-->
				<?php echo $rows;?>
				<!--row-->
				
				<tr>
					<td colspan="3" rowspan="4"></td>
					<td>小計</td>
					<td align="right"><?php echo $cString->intToThousandSymbol($arr['stotal']);?></td>
				</tr>
				<tr>
					<td>滿額折扣</td>
					<td align="right"><?php echo $cString->intToThousandSymbol($arr['discount_money']);?></td>
				</tr>
				<tr>
					<td>運費</td>
					<td align="right"><?php echo $cString->intToThousandSymbol($arr['rate']);?></td>
				</tr>
				<tr>
					<td>總計</td>
					<td align="right"><?php echo $cString->intToThousandSymbol($arr['total']);?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
                        

</body>
</html>