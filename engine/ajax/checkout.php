<?php
if ($_POST['total']['payment']) {

	//Если человек отправил готовим информацию
	$order = $_POST['total']['order'];
	$orderField = 'Заказ №: ';
	$name = $_POST['contact']['name'];
	$nameField = 'Имя: ';
	$phone = $_POST['contact']['phone'];
	$phoneField = 'Телефон: ';
	$sum = number_format($_POST['total']['sum'], 0, '.', ' ') . ' грн.';
	$sumField = 'Сумма: ';
	$delivery = ($_POST['total']['delivery'] == 'courier-kiev') ? 'Курьером по Києву' : 'Новою Поштою';
	$deliveryField = 'Доставка: ';
	$adress = $_POST['contact']['adress'];
	$adressField = 'Адреса: ';
	if ($_POST['total']['payment'] == 'credit') {
		$payment = 'Кредитною картою';
	} elseif ($_POST['total']['payment'] == 'cash') {
		$payment = 'Готівкою при отриманні';
	} elseif ($_POST['total']['payment'] == 'pay-on-delivery') {
		$payment = 'Накладеним платежем';
	}
	$paymentField = 'Оплата: ';

	if ($_POST['total']['delivery'] == 'courier-kiev' && $_POST['total']['sum'] <= 1000 ) {
		$delivery_sum = 50;
	} else if ( $_POST['total']['delivery'] !== 'courier-kiev' && $_POST['total']['sum'] <= 1000) {
		$delivery_sum = 100;
	} else {
		$delivery_sum = 0;	
	}
	$product_sum = $_POST['total']['sum'] - $delivery_sum;
		
	// Готовим информацию для телеграм отправки
	/*$token = "1706424478:AAGJk507gkMvguKsLVwUYprwfX377XsN2EA";
	$chat_id = "-523688176";*/
	$token = "1706424478:AAGJk507gkMvguKsLVwUYprwfX377XsN2EA";
	$chat_id = "-529624371";

	$arr = array(
		$orderField => $order,
		$nameField => $name,
		$phoneField => $phone,
		$deliveryField => $delivery,
		$adressField => $adress,
		$paymentField => $payment,
		$sumField => $sum,
	);

	foreach($arr as $key => $value) {
		$txt .= "<b>".$key."</b> ".$value."%0A";
	};

	$txt .= '%0A<b>Детали заказа:</b>%0A';
	
	foreach ($_POST['prod'] as $prod) {
		$txt .= $prod['name'] . ' x ' . $prod['quantity'] . ' = ' . $prod['sum'] . ' ₴%0A';
	}
	
	// Отправляем сообщение в телеграм
	$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
	
	//Готовим данные для отправки СМС
	$sms_login = 'rdmarket';
	$sms_pass = '6S38CsXz3srdM';
	$alfaname = 'RD Market';
	if ( date('H') > 07 && date('H') < 19) {
		$sms_message = 'Ваше замовлення №'.$order.' прийнято. Найближчим часом менеджер RDMarket зв\'яжеться з вами для уточнення деталей.';
	} else {
		$sms_message = 'Ваше замовлення №'.$order.' прийнято. Завтра після 09-00 менеджер RDMarket зв\'яжеться з вами для уточнення деталей.';
	}
		
	// Отправляем СМС 
	$sms_message ? $sendSMS = file_get_contents("https://smsc.ua/sys/send.php?login={$sms_login}&psw={$sms_pass}&phones={$phone}&sender={$alfaname}&mes={$sms_message}") : '';

	// Готовим информацию для e-amil
	$email = "zakaz_rdim@rdim.ua, rp.mrktng@gmail.com";
	
	//$email = "ponomarenko@rdim.ua";
	$subject = 'Замовлення RDMarket №'.$order.' прийнято';
	$headers = "From: info@rdim.ua\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\n";
		
	$message = '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" style="overflow-x: visible !important;">
	<head>
		<meta charset="UTF-8">
		<meta content="width=device-width, initial-scale=1" name="viewport">
		<meta name="x-apple-disable-message-reformatting">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="telephone=no" name="format-detection">
		<!--[if (mso 16)]><style type="text/css">a {text-decoration: none;}</style><![endif]--> 
		<!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--><!--[if gte mso 9]>
		<xml><o:OfficeDocumentSettings><o:AllowPNG></o:AllowPNG><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
		<style type="text/css">#outlook a {	padding:0;}.es-button {	mso-style-priority:100!important;	text-decoration:none!important;}a[x-apple-data-detectors] {	color:inherit!important;	text-decoration:none!important;	font-size:inherit!important;	font-family:inherit!important;	font-weight:inherit!important;	line-height:inherit!important;}.es-desk-hidden {	display:none;	float:left;	overflow:hidden;	width:0;	max-height:0;	line-height:0;	mso-hide:all;}[data-ogsb] .es-button {	border-width:0!important;	padding:10px 20px 10px 20px!important;}@media only screen and (max-width:600px), screen and (max-device-width:600px) {p, ul li, ol li, a { line-height:150%!important } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120% } h1 { font-size:30px!important; text-align:center } h2 { font-size:26px!important; text-align:center } h3 { font-size:20px!important; text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:30px!important } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important } .es-menu td a { font-size:12px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:14px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:14px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button, button.es-button { font-size:20px!important; display:block!important; border-left-width:0px!important; border-right-width:0px!important } .es-adaptive table, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0!important } .es-m-p0r { padding-right:0!important } .es-m-p0l { padding-left:0!important } .es-m-p0t { padding-top:0!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-m-p5 { padding:5px!important } .es-m-p5t { padding-top:5px!important } .es-m-p5b { padding-bottom:5px!important } .es-m-p5r { padding-right:5px!important } .es-m-p5l { padding-left:5px!important } .es-m-p10 { padding:10px!important } .es-m-p10t { padding-top:10px!important } .es-m-p10b { padding-bottom:10px!important } .es-m-p10r { padding-right:10px!important } .es-m-p10l { padding-left:10px!important } .es-m-p15 { padding:15px!important } .es-m-p15t { padding-top:15px!important } .es-m-p15b { padding-bottom:15px!important } .es-m-p15r { padding-right:15px!important } .es-m-p15l { padding-left:15px!important } .es-m-p20 { padding:20px!important } .es-m-p20t { padding-top:20px!important } .es-m-p20r { padding-right:20px!important } .es-m-p20l { padding-left:20px!important } .es-m-p25 { padding:25px!important } .es-m-p25t { padding-top:25px!important } .es-m-p25b { padding-bottom:25px!important } .es-m-p25r { padding-right:25px!important } .es-m-p25l { padding-left:25px!important } .es-m-p30 { padding:30px!important } .es-m-p30t { padding-top:30px!important } .es-m-p30b { padding-bottom:30px!important } .es-m-p30r { padding-right:30px!important } .es-m-p30l { padding-left:30px!important } .es-m-p35 { padding:35px!important } .es-m-p35t { padding-top:35px!important } .es-m-p35b { padding-bottom:35px!important } .es-m-p35r { padding-right:35px!important } .es-m-p35l { padding-left:35px!important } .es-m-p40 { padding:40px!important } .es-m-p40t { padding-top:40px!important } .es-m-p40b { padding-bottom:40px!important } .es-m-p40r { padding-right:40px!important } .es-m-p40l { padding-left:40px!important } }</style>
	</head>
	<body style="width: 100%; font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; text-size-adjust: 100%; padding: 0px; margin: 0px; overflow-y: scroll !important; visibility: visible !important;">
		<div class="es-wrapper-color" style="background-color:#FFFFFF">
			<!--[if gte mso 9]><v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t"><v:fill type="tile" color="#ffffff"></v:fill></v:background><![endif]-->
			<table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#FFFFFF">
				<tbody>
					<tr>
						<td valign="top" style="padding:0;Margin:0">
							<table cellpadding="0" cellspacing="0" class="es-header" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
								<tbody>
									<tr>
										<td align="center" style="padding:0;Margin:0">
											<table bgcolor="#ffffff" class="es-header-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
												<tbody>
													<tr>
														<td class="esdev-adapt-off" align="left" style="padding:20px;Margin:0">
															<table cellpadding="0" cellspacing="0" class="esdev-mso-table" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:560px">
																<tbody>
																	<tr>
																		<td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
																			<table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
																				<tbody>
																					<tr>
																						<td class="es-m-p0r" valign="top" align="center" style="padding:0;Margin:0;width:415px">
																							<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																								<tbody>
																									<tr>
																										<td align="left" style="padding:0;Margin:0;font-size:0px"><a target="_blank" href="https://rdmarket.com.ua/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#926B4A;font-size:14px"><img src="https://rdmarket.com.ua/assets/images/logo.webp" alt="RDMarket" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="120" title="RDMarket"></a></td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																		<td style="padding:0;Margin:0;width:20px"></td>
																		<td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
																			<table cellpadding="0" cellspacing="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																				<tbody>
																					<tr>
																						<td align="left" style="padding:0;Margin:0;width:125px">
																							<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																								<tbody>
																									<tr>
																										<td style="padding:0;Margin:0">
																											<table cellpadding="0" cellspacing="0" width="100%" class="es-menu" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																												<tbody>
																													<tr class="images">
																														<td align="center" valign="top" width="33.33%" id="esd-menu-id-0" style="Margin:0;padding-left:5px;padding-right:5px;padding-top:10px;padding-bottom:10px;border:0"><a target="_blank" href="https://rdmarket.com.ua/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;display:block;color:#926B4A;font-size:14px"><img src="https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/95531620294283439.png" alt="Пункт1" title="Пункт1" width="20" style="display:inline-block !important;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;vertical-align:middle"></a></td>
																														<td align="center" valign="top" width="33.33%" id="esd-menu-id-1" style="Margin:0;padding-left:5px;padding-right:5px;padding-top:10px;padding-bottom:10px;border:0"><a target="_blank" href="https://rdmarket.com.ua/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;display:block;color:#926B4A;font-size:14px"><img src="https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/86381620294283248.png" alt="Пункт2" title="Пункт2" width="20" style="display:inline-block !important;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;vertical-align:middle"></a></td>
																														<td align="center" valign="top" width="33.33%" id="esd-menu-id-2" style="Margin:0;padding-left:5px;padding-right:5px;padding-top:10px;padding-bottom:10px;border:0"><a target="_blank" href="https://rdmarket.com.ua/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;display:block;color:#926B4A;font-size:14px"><img src="https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/29961620294283034.png" alt="Пункт3" title="Пункт3" width="20" style="display:inline-block !important;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;vertical-align:middle"></a></td>
																													</tr>
																												</tbody>
																											</table>
																										</td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
													<tr>
														<td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
															<table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																<tbody>
																	<tr>
																		<td align="center" valign="top" style="padding:0;Margin:0;width:560px">
																			<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																				<tbody>
																					<tr>
																						<td align="center" style="padding:0;Margin:0">
																							<h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#333333">Дякуємо за замовлення!</h1>
																						</td>
																					</tr>
																					<tr>
																						<td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px">
																							<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">Ваша заявка успішно прийнята. Найближчим часом ми зв\'яжемося з вами для уточнення деталей замовлення.</p>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							<table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
								<tbody>
									<tr>
										<td align="center" style="padding:0;Margin:0">
											<table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
												<tbody>
													<tr>
														<td class="esdev-adapt-off es-m-p10" align="left" background="https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/66551620375036465.png" style="padding:20px;Margin:0;background-image:url(https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/66551620375036465.png);background-repeat:no-repeat;background-position:center center">
															<table cellpadding="0" cellspacing="0" class="esdev-mso-table" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:560px">
																<tbody>
																	<tr>
																		<td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
																			<table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
																				<tbody>
																					<tr>
																						<td align="left" style="padding:0;Margin:0;width:177px">
																							<table cellpadding="0" cellspacing="0" width="100%" bgcolor="#f6e6cb" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#f6e6cb" role="presentation">
																								<tbody>
																									<tr>
																										<td align="center" style="padding:0;Margin:0;padding-top:10px;padding-left:15px;padding-right:15px;font-size:0px"><a target="_blank" href="https://rdmarket.com.ua/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#926B4A;font-size:14px"><img src="https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/60121620374838489.png" alt="" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="30"></a></td>
																									</tr>
																									<tr>
																										<td align="center" style="Margin:0;padding-top:5px;padding-bottom:10px;padding-left:10px;padding-right:10px">
																											<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">Заявка<br>'.date("d.m.y").'</p>
																										</td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																		<td style="padding:0;Margin:0;width:15px"></td>
																		<td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
																			<table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
																				<tbody>
																					<tr>
																						<td align="left" style="padding:0;Margin:0;width:177px">
																							<table cellpadding="0" cellspacing="0" width="100%" bgcolor="#efefef" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#efefef" role="presentation">
																								<tbody>
																									<tr>
																										<td align="center" style="padding:0;Margin:0;padding-top:10px;padding-left:15px;padding-right:15px;font-size:0px"><a target="_blank" href="https://rdmarket.com.ua/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#926B4A;font-size:14px"><img src="https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/85851620374838300.png" alt="" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="30"></a></td>
																									</tr>
																									<tr>
																										<td align="center" style="Margin:0;padding-top:5px;padding-bottom:10px;padding-left:10px;padding-right:10px">
																											<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">Замовлення<br>підтверждено</p>
																										</td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																		<td style="padding:0;Margin:0;width:15px"></td>
																		<td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
																			<table cellpadding="0" cellspacing="0" class="es-right" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
																				<tbody>
																					<tr>
																						<td align="left" style="padding:0;Margin:0;width:176px">
																							<table cellpadding="0" cellspacing="0" width="100%" bgcolor="#efefef" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#efefef" role="presentation">
																								<tbody>
																									<tr>
																										<td align="center" style="padding:0;Margin:0;padding-top:10px;padding-left:15px;padding-right:15px;font-size:0px"><a target="_blank" href="https://rdmarket.com.ua/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#926B4A;font-size:14px"><img src="https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/85851620374838300.png" alt="" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="30"></a></td>
																									</tr>
																									<tr>
																										<td align="center" style="Margin:0;padding-top:5px;padding-bottom:10px;padding-left:10px;padding-right:10px">
																											<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">Товар<br>надіслано</p>
																										</td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
													<tr>
														<td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
															<table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																<tbody>
																	<tr>
																		<td align="center" valign="top" style="padding:0;Margin:0;width:560px">
																			<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																				<tbody>
																					<tr>
																						<td align="center" style="padding:0;Margin:0">
																							<h2 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:24px;font-style:normal;font-weight:bold;color:#333333">Замовлення № '.$order.'</h2>
																							<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">від '.date("d/m/Y").'</p>
																						</td>
																					</tr>
																					<tr>
																						<td align="left" class="es-m-txt-c" style="padding:0;Margin:0;padding-top:20px">
																							<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#a0937d;font-size:14px">ДЕТАЛІ ЗАМОВЛЕННЯ</p>
																						</td>
																					</tr>
																					<tr>
																						<td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px;font-size:0">
																							<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																								<tbody>
																									<tr>
																										<td style="padding:0;Margin:0;border-bottom:1px solid #a0937d;background:none;height:1px;width:100%;margin:0px"></td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>';
													
													foreach ($_POST['prod'] as $prod) {

													$message .= '<tr>
														<td class="esdev-adapt-off" align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
															<table cellpadding="0" cellspacing="0" class="esdev-mso-table" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:560px">
																<tbody>
																	<tr>
																		<td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
																			<table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
																				<tbody>
																					<tr>
																						<td align="left" style="padding:0;Margin:0;width:124px">
																							<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																								<tbody>
																									<tr>
																										<td align="center" style="padding:0;Margin:0;font-size:0px"><a target="_blank" href="'.$prod['link'].'" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#926B4A;font-size:14px"><img class="adapt-img" src="https://rdmarket.com.ua'.$prod['image'].'" alt="'.$prod['name'].'" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="124" title="'.$prod['name'].'"></a></td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																		<td style="padding:0;Margin:0;width:20px"></td>
																		<td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
																			<table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
																				<tbody>
																					<tr>
																						<td align="left" style="padding:0;Margin:0;width:225px">
																							<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																								<tbody>
																									<tr>
																										<td align="left" class="es-m-p0t es-m-p0b es-m-txt-l" style="padding:0;Margin:0;padding-top:20px;padding-bottom:20px">
																											<h3 style="Margin:0;line-height:22px;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;font-size:18px;font-style:normal;font-weight:bold;color:#333333"><strong>'.$prod['name'].'</strong></h3>
																										</td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																		<td style="padding:0;Margin:0;width:20px"></td>
																		<td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
																			<table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
																				<tbody>
																					<tr>
																						<td align="left" style="padding:0;Margin:0;width:75px">
																							<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																								<tbody>
																									<tr>
																										<td align="right" class="es-m-p0t es-m-p0b" style="padding:0;Margin:0;padding-top:20px;padding-bottom:20px">
																											<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">x'.$prod['quantity'].'</p>
																										</td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																		<td style="padding:0;Margin:0;width:20px"></td>
																		<td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
																			<table cellpadding="0" cellspacing="0" class="es-right" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
																				<tbody>
																					<tr>
																						<td align="left" style="padding:0;Margin:0;width:76px">
																							<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																								<tbody>
																									<tr>
																										<td align="right" class="es-m-p0t es-m-p0b" style="padding:0;Margin:0;padding-top:20px;padding-bottom:20px">
																											<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">'.$prod['sum'].' ₴</p>
																										</td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>';

													}
													
													$message .= '<tr>
														<td align="left" style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
															<table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																<tbody>
																	<tr>
																		<td align="center" valign="top" style="padding:0;Margin:0;width:560px">
																			<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																				<tbody>
																					<tr>
																						<td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px;font-size:0">
																							<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																								<tbody>
																									<tr>
																										<td style="padding:0;Margin:0;border-bottom:1px solid #a0937d;background:none;height:1px;width:100%;margin:0px"></td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
													<tr>
														<td class="esdev-adapt-off" align="left" style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
															<table cellpadding="0" cellspacing="0" class="esdev-mso-table" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:560px">
																<tbody>
																	<tr>
																		<td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
																			<table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
																				<tbody>
																					<tr>
																						<td align="left" style="padding:0;Margin:0;width:466px">
																							<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																								<tbody>
																									<tr>
																										<td align="right" style="padding:0;Margin:0">
																											<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">Сума<br>Доставка<br><b>Загальна сума</b></p>
																										</td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																		<td style="padding:0;Margin:0;width:20px"></td>
																		<td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
																			<table cellpadding="0" cellspacing="0" class="es-right" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
																				<tbody>
																					<tr>
																						<td align="left" style="padding:0;Margin:0;width:74px">
																							<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																								<tbody>
																									<tr>
																										<td align="right" style="padding:0;Margin:0">
																											<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">₴'.$product_sum.'<br>₴'.$delivery_sum.'<br><strong></strong>₴<strong>'.$_POST['total']['sum'].'</strong><strong></strong></p>
																										</td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
													<tr>
														<td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
															<table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																<tbody>
																	<tr>
																		<td align="center" valign="top" style="padding:0;Margin:0;width:560px">
																			<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																				<tbody>
																					<tr>
																						<td align="left" class="es-m-txt-c" style="padding:0;Margin:0;padding-top:20px">
																							<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#a0937d;font-size:14px">ПОКУПЕЦЬ</p>
																						</td>
																					</tr>
																					<tr>
																						<td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px;font-size:0">
																							<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																								<tbody>
																									<tr>
																										<td style="padding:0;Margin:0;border-bottom:1px solid #a0937d;background:none;height:1px;width:100%;margin:0px"></td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
													<tr>
														<td class="esdev-adapt-off" align="left" style="padding:0;Margin:0;padding-left:20px;padding-right:20px">
															<table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																<tbody>
																	<tr>
																		<td align="left" style="padding:0;Margin:0;width:560px">
																			<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																				<tbody>
																					<tr>
																						<td align="left" style="padding:0;Margin:0">
																							<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">'.$name.'<br>Тел. '.$phone.'</p>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
													<tr>
														<td align="left" style="padding:20px;Margin:0">
															<!--[if mso]>
															<table style="width:560px" cellpadding="0" cellspacing="0">
																<tr>
																	<td style="width:270px" valign="top">
																		<![endif]-->
																		<table cellpadding="0" cellspacing="0" align="left" class="es-left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
																			<tbody>
																				<tr>
																					<td class="es-m-p20b" align="center" valign="top" style="padding:0;Margin:0;width:270px">
																						<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																							<tbody>
																								<tr>
																									<td align="left" class="es-m-txt-c" style="padding:0;Margin:0;padding-top:20px">
																										<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#a0937d;font-size:14px">ОПЛАТА</p>
																									</td>
																								</tr>
																								<tr>
																									<td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px;font-size:0">
																										<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																											<tbody>
																												<tr>
																													<td style="padding:0;Margin:0;border-bottom:1px solid #a0937d;background:none;height:1px;width:100%;margin:0px"></td>
																												</tr>
																											</tbody>
																										</table>
																									</td>
																								</tr>
																								<tr>
																									<td align="left" style="padding:0;Margin:0">
																										<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">'.$payment.'</p>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!--[if mso]>
																	</td>
																	<td style="width:20px"></td>
																	<td style="width:270px" valign="top">
																		<![endif]-->
																		<table cellpadding="0" cellspacing="0" class="es-right" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
																			<tbody>
																				<tr>
																					<td align="center" valign="top" style="padding:0;Margin:0;width:270px">
																						<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																							<tbody>
																								<tr>
																									<td align="left" class="es-m-txt-c" style="padding:0;Margin:0;padding-top:20px">
																										<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#a0937d;font-size:14px">ДОСТАВКА</p>
																									</td>
																								</tr>
																								<tr>
																									<td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px;font-size:0">
																										<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																											<tbody>
																												<tr>
																													<td style="padding:0;Margin:0;border-bottom:1px solid #a0937d;background:none;height:1px;width:100%;margin:0px"></td>
																												</tr>
																											</tbody>
																										</table>
																									</td>
																								</tr>
																								<tr>
																									<td align="left" style="padding:0;Margin:0">
																										<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px">'.$name.'<br>'.$delivery.'<br>'.$adress.'</p>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																		<!--[if mso]>
																	</td>
																</tr>
															</table>
															<![endif]-->
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							<table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
								<tbody>
									<tr>
										<td align="center" bgcolor="#fef8ed" style="padding:0;Margin:0;background-color:#fef8ed">
											<table bgcolor="#fef8ed" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#fef8ed;width:600px">
												<tbody>
													<tr>
														<td class="es-m-p10r es-m-p10l" align="left" style="Margin:0;padding-top:15px;padding-bottom:15px;padding-left:20px;padding-right:20px">
															<table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																<tbody>
																	<tr>
																		<td align="center" valign="top" style="padding:0;Margin:0;width:560px">
																			<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																				<tbody>
																					<tr>
																						<td style="padding:0;Margin:0">
																							<table cellpadding="0" cellspacing="0" width="100%" class="es-menu" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																								<tbody>
																									<tr class="links-images-left">
																										<td align="center" valign="top" width="33.33%" id="esd-menu-id-0" style="Margin:0;padding-left:5px;padding-right:5px;padding-top:10px;padding-bottom:10px;border:0"><a target="_blank" href="https://rdmarket.com.ua/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;display:block;color:#a0937d;font-size:14px"><img src="https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/58991620296762845.png" alt="ДОСТАВКА" title="ДОСТАВКА" align="absmiddle" width="25" style="display:inline-block !important;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;padding-right:15px;vertical-align:middle">ДОСТАВКА</a></td>
																										<td align="center" valign="top" width="33.33%" style="Margin:0;padding-left:5px;padding-right:5px;padding-top:10px;padding-bottom:10px;border:0;border-left:1px solid #a0937d" id="esd-menu-id-1"><a target="_blank" href="https://rdmarket.com.ua/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;display:block;color:#a0937d;font-size:14px"><img src="https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/55781620296763104.png" alt="ЯКІСТЬ" title="ЯКІСТЬ" align="absmiddle" width="25" style="display:inline-block !important;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;padding-right:15px;vertical-align:middle">ЯКІСТЬ</a></td>
																										<td align="center" valign="top" width="33.33%" style="Margin:0;padding-left:5px;padding-right:5px;padding-top:10px;padding-bottom:10px;border:0;border-left:1px solid #a0937d" id="esd-menu-id-2"><a target="_blank" href="https://rdmarket.com.ua/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;display:block;color:#a0937d;font-size:14px"><img src="https://tlr.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/88291620296763036.png" alt="ДОСВІД" title="ДОСВІД" align="absmiddle" width="25" style="display:inline-block !important;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;padding-right:15px;vertical-align:middle">ДОСВІД</a></td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							<table cellpadding="0" cellspacing="0" class="es-footer" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:#E3CDC1;background-repeat:repeat;background-position:center top">
								<tbody>
									<tr>
										<td align="center" bgcolor="#ffffff" style="padding:0;Margin:0;background-color:#ffffff">
											<table class="es-footer-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
												<tbody>
													<tr>
														<td align="left" style="padding:15px;Margin:0">
															<table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																<tbody>
																	<tr>
																		<td align="left" style="padding:0;Margin:0;width:570px">
																			<table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																				<tbody>
																					<tr>
																						<td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px;font-size:0">
																							<table cellpadding="0" cellspacing="0" class="es-table-not-adapt es-social" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
																								<tbody>
																									<tr>
																										<td align="center" valign="top" style="padding:0;Margin:0;padding-right:20px"><a target="_blank" href="https://www.facebook.com/RazumniyDom/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#926B4A;font-size:14px"><img title="Facebook" src="https://stripo.email/static/assets/img/social-icons/circle-black-bordered/facebook-circle-black-bordered.png" alt="Fb" width="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td>
																										<td align="center" valign="top" style="padding:0;Margin:0;padding-right:20px"><a target="_blank" href="https://www.instagram.com/razumnyidom/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#926B4A;font-size:14px"><img title="Instagram" src="https://stripo.email/static/assets/img/social-icons/circle-black-bordered/instagram-circle-black-bordered.png" alt="Inst" width="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td>
																										<td align="center" valign="top" style="padding:0;Margin:0;padding-right:20px"><a target="_blank" href="https://www.tiktok.com/@razumdom" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#926B4A;font-size:14px"><img title="TikTok" src="https://stripo.email/static/assets/img/social-icons/circle-black-bordered/tiktok-circle-black-bordered.png" alt="Tt" width="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td>
																										<td align="center" valign="top" style="padding:0;Margin:0;padding-right:20px"><a target="_blank" href="https://t.me/RozumniyDim" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#926B4A;font-size:14px"><img title="Telegram" src="https://stripo.email/static/assets/img/messenger-icons/circle-black-bordered/telegram-circle-black-bordered.png" alt="Telegram" width="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td>
																										<td align="center" valign="top" style="padding:0;Margin:0"><a target="_blank" href="https://www.youtube.com/c/RdimUa" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#926B4A;font-size:14px"><img title="Youtube" src="https://stripo.email/static/assets/img/social-icons/circle-black-bordered/youtube-circle-black-bordered.png" alt="Yt" width="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td>
																									</tr>
																								</tbody>
																							</table>
																						</td>
																					</tr>
																					<tr>
																						<td align="center" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px">
																							<p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:18px;color:#666666;font-size:12px">Ви отримали даного листа, так как зробили замовлення в інтернет-магазині теплої підлоги RDMarket</p>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</body>
</html>';
	// Отправляем мейл
	$sendMail = mail($email, $subject, $message, $headers);

	if (isset($_POST['contact']['e-mail'])) {
	//данные для отправки мейла пользователю
	}

	//Готовим данные для оплаты через LiqPay
	if ($_POST['total']['payment'] == 'credit') {
		$liqpay['public_key'] = 'i22825377007';
		$liqpay['version'] = '3';
		$liqpay['action'] = 'hold';
		$liqpay['amount'] = $_POST['total']['sum'];
		$liqpay['currency'] = 'UAH';
		$liqpay['description'] = 'Оплата замовлення '.$_POST['total']['order'].' на суму '.number_format($_POST['total']['sum'], 0, '.', ' ').' грн. Інтернет-магазин теплої підлоги RDMarket';
		$liqpay['order_id'] = $_POST['total']['order'];
	
		$priv_key = '0bUY5cQ2l6WPjDBmHGsT4HSOpIVPptooOVPT07Vu';

		$data = base64_encode(json_encode($liqpay));
		$signature = base64_encode(sha1($priv_key . $data . $priv_key, true));
		$red_url = 'https://www.liqpay.ua/api/3/checkout?data='.$data.'&signature='.$signature;

		echo $red_url;
	} else {
		echo '/success.html';
	}

} else {
	echo 'error';
}

?>