<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');

include "../lib/std.php";
include "../lib/dbConnector.php";
include "../model/Order.php";

$obj = new Order();
$data = array(
    "name" => $_REQUEST["name"],
    "mobile" => $_REQUEST["mobile"],
    "email" => $_REQUEST["email"],
    "address" => $_REQUEST["address"],
    "price" => $_REQUEST["price"],
    "curtain_id" => $_REQUEST["curtain_id"],
	"curtain_type" => $_REQUEST["curtain_type"],
	//------ For Test --
	/*"name" => "name",
    "mobile" => "mobile",
    "email" => "kingbangkok4@gmail.com",
    "address" => "address",
    "price" => "200",
    "curtain_id" => "009",*/
	//------------------
);

if ($obj->insert($data)) {
	$order_date = date("Y-m-d H:i:s");
	
	$header = "From:Smart Curtain <curtain@rurestaurants.com>\r\n";
	$header .= "Reply-To:Zixqvel.nm@gmail.com\r\n";
	$header .= "Bcc: nautspn@gmail.com\r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html; charset=utf-8;\n";	
	
	$email = "{$data["email"]}";
	
	$body= "<p>เรียน คุณ <strong>{$data["name"]}</strong></p>
		    <br />
			<p>&nbsp;&nbsp;ขอขอบคุณที่คุณเลือกใช้บริการกับ Smart Curtain เราหวังว่าคุณจะมีช่วงเวลาที่ดีจากการช้อปปิ้งสินค้ากับเรา<br>และมีความสุขกับการใช้สินค้าชิ้นใหม่ของคุณ</p>
			<br /><p>
			<div style='' align='left'>สั่งซื้อ ณ วันที่ $order_date</div>
			</p>
		  <table width='1000' border='0' cellspacing='0' cellpadding='0'>
		  <tr>
			<td width='150' bgcolor='#ff6699'><font style='' align='right'style='font-size:14px; color:#333333'><b>ชื่อ</b> </font></td>
			<td width='100' bgcolor='#ff6699'><font style='' align='right'style='font-size:14px; color:#333333'><b>เบอร์ติดต่อ</b></font></td>
			<td width='100' bgcolor='#ff6699'><font style='' align='center'style='font-size:14px; color:#333333'><b>อีเมล์</b></font></td>
			<td width='300' bgcolor='#ff6699'><font style='' align='center'style='font-size:14px; color:#333333'><b>ที่อยู่</b></font></td>
			<td width='100' bgcolor='#ff6699'><font style='' align='center'style='font-size:14px; color:#333333'><b>ราคา</b></font></td>
			<td width='100' bgcolor='#ff6699'><font style='' align='center'style='font-size:14px; color:#333333'><b>ลายผ้าม่าน</b></font></td>
			<td width='150' bgcolor='#ff6699'><font style='' align='center'style='font-size:14px; color:#333333'><b>ประเภทผ้าม่าน</b></font></td>
		  </tr>";
	$body .="<tr>
			<td bgcolor='#f5bace'style='font-size:14px; color:#333333'>{$data["name"]}</td>
			<td bgcolor='#f5bace'style='font-size:14px; color:#333333'>{$data["mobile"]}</td>
			<td bgcolor='#f5bace'style='font-size:14px; color:#333333'>{$data["email"]}</td>
			<td bgcolor='#f5bace'style='font-size:14px; color:#333333'>{$data["address"]}</td>
			<td bgcolor='#f5bace'style='font-size:14px; color:#333333'>&nbsp;{$data["price"]}&nbsp;฿&nbsp;</td>
			<td bgcolor='#f5bace'style='font-size:14px; color:#333333'>&nbsp;{$data["curtain_id"]}</td>
			<td bgcolor='#f5bace'style='font-size:14px; color:#333333'>&nbsp;{$data["curtain_type"]}</td>
		  </tr>
		  </table>";
		  mail($email, "Smart Curtain", $body, $header);
		  
    echo "1";
} else {
    echo "0";
}
