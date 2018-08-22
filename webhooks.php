

<?php

$strAccessToken = "PTKs1qARADFbxymTqYk2B2mADMAPJ3682bYxHc6bK0qJUXAWxMONLprw7WTtoAMvcMI8Pg1slbQyJNZspE40izNjimVqC0s2bmgkoLILLIy023GkqvogB3wWmEbPScWSmSsS5skK16IDMLcGsAxZzgdB04t89/1O/w1cDnyilFU=";

$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
$strUrl = "https://api.line.me/v2/bot/message/reply";
$inputtext = $arrJson['events'][0]['message']['text'];
$w = (explode(" ",$inputtext)); //ถ้าถามอากาศ เช่น อากาศ เชียงใหม่
    					    
$arrPostData = array();
	
if(($inputtext == "สวัสดี")||($inputtext == "Hi")||($inputtext == "Hello")||($inputtext == "สวัสดีครับ")||($inputtext == "สวัสดีค่ะ")||($inputtext == "อินเตอร์")) {
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "มีอะไรให้รับใช้ครับท่าน";
  
} else if (($inputtext == "ชื่ออะไร")||($inputtext == "ใคร")||($inputtext == "คุณเป็นใคร")) {
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "ชื่อ 'อินเตอร์' ครับท่าน";
  
} else if ($inputtext == "ทำอะไรได้บ้าง") {
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "เปิด ปิด ไฟ แอร์ เช็คอุณหภูมิ ครับท่าน";
  
} else if ($inputtext == "เปิดไฟนอน1") {
 // 	$mode = curl_init("http://128.199.137.43:3000/smtbot2017/mode/5/o");
  	curl_exec($mode);
  	$digital = curl_init("http://128.199.137.43:3000/smtbot2017/digital/5/1");
  	curl_exec($digital);
//	$arrPostData['messages'][0]['type'] = 'text';
//	$arrPostData['messages'][0]['text'] = "เปิดไฟแล้วครับ";
  
} else if ($inputtext == "ปิดไฟนอน1") {
 // 	$mode = curl_init("http://128.199.137.43:3000/smtbot2017/mode/5/o");
  	curl_exec($mode);
  	$digital = curl_init("http://128.199.137.43:3000/smtbot2017/digital/5/0");
  	curl_exec($digital);
//	$arrPostData['messages'][0]['type'] = 'text';
//	$arrPostData['messages'][0]['text'] = "ปิดไฟแล้วครับ";

} else if ($inputtext == "ความชื้น") {
	$s = file_get_contents("http://128.199.137.43:3000/smtbot2017/variable/humidity");
 	 $h = json_decode($s, true);
  	$hu = $h['humidity'];
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "ความชื้นสัมพัธน์ตอนนี้ " . $hu . "%";

} else if ($inputtext == "อุณหภูมิ") {
  	$s = file_get_contents("http://128.199.137.43:3000/smtbot2017/variable/temperature");
  	$h = json_decode($s, true);
  	$hu = $h['temperature'];
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "อุณหภูมิตอนนี้ " . $hu . " C";

} else if ($inputtext == "Air Condition Status") {
	//$ch = curl_init();

	$s = file_get_contents("https://178.128.24.220:9443/4c90321be6474713b4f99b51a40e3c5e/get/V1");
	//$humi = curl_setopt($ch, CURLOPT_URL,"https://178.128.24.220:9443/4c90321be6474713b4f99b51a40e3c5e/get/V2";
	//curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	//curl_setopt($ch, CURLOPT_HEADER, FALSE);
	$h = json_decode($s, true);
  	$hu = $h['V1'];
	
	//curl_exec($ch);
	//curl_close($ch);

    	//var_dump($ch);

			    
  	//$s = file_get_contents("https://178.128.24.220:9443/4c90321be6474713b4f99b51a40e3c5e/get/V1");
  	//$h = json_decode($s, true);
  	//$hu = $h['V1'];
 	//$s2 = file_get_contents("https://178.128.24.220:9443/4c90321be6474713b4f99b51a40e3c5e/get/V2");
 	//$h2 = json_decode($s2, true);
 	//$hu2 = $h2['V2'];
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "อุณหภูมิ " . $hu . " C | ความชื้น " . $humi . " %";

} else if ($inputtext == "แผนที่") {
	$arrPostData['messages'][0]['type'] = "location";
	$arrPostData['messages'][0]['title'] = "บริษัท เอ็นเอส-สยามยูไนเต็ดสตีล จำกัด";
	$arrPostData['messages'][0]['address'] = "12 Soi G2, Pakorn Songkrohraj Road,Maptaphut, Muang, Rayong 21150 Thailand";
	$arrPostData['messages'][0]['latitude'] = "12.704393";
	$arrPostData['messages'][0]['longitude'] = "101.113156";
 
} else if ($inputtext == "รายงาน") {
//	$arrPostData['messages'][0]['type'] = 'text';
//	$arrPostData['messages'][0]['text'] = "หลอดไฟ: นอน1-ปิด, นอน2-เปิด*, นอน3-ปิด | แอร์: นอน1-เปิด*, นอน2-เปิด*, นอน3-ปิด";

} else if ($inputtext == "เยี่ยม") {
	$arrPostData['messages'][0]['type'] = "sticker";
	$arrPostData['messages'][0]['packageId'] = "1";
	$arrPostData['messages'][0]['stickerId'] = "13";

} else if ($inputtext == "บาย") {
	$arrPostData['messages'][0]['type'] = "sticker";
	$arrPostData['messages'][0]['packageId'] = "1";
	$arrPostData['messages'][0]['stickerId'] = "408";

} else if ($inputtext == "ดูรูปหน่อย") {
	$arrPostData['messages'][0]['type'] = "image";
	$arrPostData['messages'][0]['originalContentUrl'] = "https://still-beach-54304.herokuapp.com/p1.jpg";
	$arrPostData['messages'][0]['previewImageUrl'] = "https://still-beach-54304.herokuapp.com/p2.jpg";

} else if (($inputtext == "ชอบวงอะไร")||($inputtext == "BNK48")||($inputtext == "น่ารัก")||($inputtext == "ร้องเพลง")) {
	$arrPostData['messages'][0]['type'] = "image";
	$arrPostData['messages'][0]['originalContentUrl'] = "https://teen.mthai.com/app/uploads/2018/01/DPZXduGUQAERaye-1.jpg";
	$arrPostData['messages'][0]['previewImageUrl'] = "https://teen.mthai.com/app/uploads/2018/01/DPZXduGUQAERaye-1.jpg";
	
} else if (($inputtext == "ขอเพลง")||($inputtext == "คุกกี้เสี่ยงทาย")) {
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "https://www.youtube.com/watch?v=mfqJyKm20Z4";
	

} else if (($inputtext == "ON Air Condition")||($inputtext == "OFF Air Condition")) {
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "ขอบคุณที่ให้ผมได้ช่วยเหลือคุณ แต่..ขณะนี้ผมยังไม่สามารถสั่งงานได้ครับ";
	
} else if (($inputtext == "ใครสร้างคุณ")||($inputtext == "ใครสร้าง")||($inputtext == "สุดยอด")||($inputtext == "เบื้องหลัง")) {
	$arrPostData['messages'][0]['type'] = 'text';
	$arrPostData['messages'][0]['text'] = "http://www.avenger-planner.com/about/suwat-logpeet/";

}else{
 	$arrPostData['messages'][0]['type'] = 'text';
 	$arrPostData['messages'][0]['text'] = "ไม่เข้าใจคำสั่งครับท่าน";
}

if ($w[0] == "อากาศ" and isset($w[1])) {
	$prov = $w[1];
  	$a = file_get_contents("http://m.smart-fttx.com/test-weather.php?prov=$prov&token=inb32XpbrlLgd8HMCzhbhZsJq7VxkqqA");
 	$arrPostData['messages'][0]['type'] = 'text';
 	$arrPostData['messages'][0]['text'] = $a;
}

$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
$arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);

?>
