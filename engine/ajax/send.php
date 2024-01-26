<?php

    if ($_SERVER['REQUEST_METHOD'] === 'GET' || !empty($_POST['email']) ) {
        // Если робот заполнил мейл
        echo 'botcheck error';
    } else {
		//Если прошла проверка - готовим поля
		$source = strip_tags($_POST['source']);
		$sourceField = 'Тема: ';
		$name = strip_tags($_POST['name']);
		$nameField = 'Имя: ';
		$phone = strip_tags($_POST['phone']);
		$phoneField = 'Телефон: ';
		$pageurl = strip_tags($_POST['pageurl']);
		$pageurlField = 'Url заявки: ';

		// Готовим информацию для телеграм отправки
		
		/*$token = "1706424478:AAGJk507gkMvguKsLVwUYprwfX377XsN2EA";
		$chat_id = "-523688176";*/

		$token = "1706424478:AAGJk507gkMvguKsLVwUYprwfX377XsN2EA";
		$chat_id = "-529624371";
		
		$arr = array(
			$sourceField => $source,
			$nameField => $name,
			$phoneField => $phone,
			$pageurlField => $pageurl,
		);

		foreach($arr as $key => $value) {
			$txt .= "<b>".$key."</b> ".$value."%0A";
		};
		
		// Готовим информацию для e-amil
		$email = "zakaz_rdim@rdim.ua, rp.mrktng@gmail.com";
		$subject = 'Запрос с посадочной Rdmarket.com.ua';
		$headers = "From: info@rdim.ua\nMIME-Version: 1.0\nContent-Type: text/html; charset=utf-8\n";
		
		$message = '<html><body>';
		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$message .= '<tr><td><strong>Тема:</strong> </td><td>' . $source . '</td></tr>';
		$message .= '<tr style="background: #eee;"><td><strong>Имя:</strong> </td><td>' . $name . '</td></tr>';
		$message .= '<tr><td><strong>Телефон:</strong> </td><td>' . $phone . '</td></tr>';
		$message .= '<tr><td><strong>URL заявки:</strong> </td><td>' . $pageurl . '</td></tr>';
		$message .= '</table>';
		$message .= '</body></html>';
		
		//Готовим информацию для отправки в битрикс24
		require_once ('/var/www/api.rdim.ua/public_html/rd_scripts/b24_rest_api.php');

		$arFields = [
			'TITLE'          => 'Заявка RDMarket: ' . implode(' ', [$name, $phone]),
			'NAME'           => (!empty($name)) ? $name : 'Без имени',
			'PHONE'          => (!empty($phone)) ? array(array('VALUE' => $phone, 'VALUE_TYPE' => 'WORK')) : array(),
			'SOURCE_ID'		 => 'Посадочные ТП',	
			'ASSIGNED_BY_ID' => '113'
		];
    
		$arLeadDuplicate = [];
		if(!empty($phone)){//проверка дубликата по номеру телефона
			$arResultDuplicate = CRest::call('crm.duplicate.findbycomm',[
				"entity_type" => "LEAD",
				"type" => "PHONE",
				"values" => array($phone)
			]);
			if(!empty($arResultDuplicate['result']['LEAD'])){
				$arLeadDuplicate = array_merge ($arLeadDuplicate,$arResultDuplicate['result']['LEAD']);
			}
		}
    
		if(!empty($arLeadDuplicate)){//get converted duplicate lead and filling $arFields COMPANY_ID or CONTACT_ID
			$arDuplicateLead = CRest::call('crm.lead.list',[
				"filter" => [
					'=ID' => $arLeadDuplicate,
					'STATUS_ID' => 'CONVERTED',
				],
				'select' => [
					'ID', 'COMPANY_ID', 'CONTACT_ID'
				]
			]);
        
			if(!empty($arDuplicateLead['result'])){
				$sCompany = reset(array_diff(array_column($arDuplicateLead['result'],'COMPANY_ID','ID'),['']));
				$sContact = reset(array_diff(array_column($arDuplicateLead['result'],'CONTACT_ID','ID'),['']));
				if($sCompany > 0)
					$arFields['COMPANY_ID'] = $sCompany;
				if($sContact > 0)
					$arFields['CONTACT_ID'] = $sContact;
			}
		}
		
		// Отправляем мейл
		$sendMail = mail($email, $subject, $message, $headers);

		// Отправляем сообщение в телеграм
		$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
		
		$sms_login = 'rdmarket';
		$sms_pass = '6S38CsXz3srdM';
		$alfaname = 'RD Market';
		if(date('D') == 'Sat' || date('D') == 'Sun' || (date('D') == 'Fri' && date('H') > 18) ) {
			$sms_message = 'Дякуємо, ваша заявка прийнята. В понеділок після 09-00 менеджер RDMarket зв\'яжеться з вами та відповість на всі запитання.';
		} elseif ( date('H') >= 08 && date('H') <= 18) {
			$sms_message = 'Дякуємо, ваша заявка прийнята. Найближчим часом менеджер RDMarket зв\'яжеться з вами та відповість на всі запитання.';
		} else {
			$sms_message = 'Дякуємо, ваша заявка прийнята. Завтра після 09-00 менеджер RDMarket зв\'яжеться з вами та відповість на всі запитання.';
		}
		
		// Отправляем СМС 
		$sendSMS = file_get_contents("https://smsc.ua/sys/send.php?login={$sms_login}&psw={$sms_pass}&phones={$phone}&sender={$alfaname}&mes={$sms_message}");
		
		// Создаем лид в битрикс24
		/*$result = CRest::call('crm.lead.add',
			[
				'fields'    =>  $arFields
			]
		);*/

		// Код при успешной проверки капчи
        echo 'success';
    }
?>