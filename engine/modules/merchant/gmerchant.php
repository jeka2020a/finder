<?php
if( isset( $argv ) ) {
    foreach( $argv as $arg ) {
        $e = explode( '=', $arg );
        if( count($e) == 2 )
            $_GET[$e[0]] = $e[1];
        else    
            $_GET[$e[0]] = 0;
    }
}

if ($_GET['action'] == "create") {
	
	$domain = 'https://rdmarket.com.ua';

	$map = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<rss xmlns:g=\"http://base.google.com/ns/1.0\" version=\"2.0\">\n";
	
	$map .= "\t<channel>\n";
	$map .= "\t\t<title>RDMarket</title>\n";
	$map .= "\t\t<link>".$domain."</link>\n";
	$map .= "\t\t<description>Интернет-магазин теплого пола</description>\n";
	
	$map .= build_merch();

	$map .= "\t</channel>\n";
	$map .= "</rss>";
	//$handler = fopen("gmerchant.xml", "wb+");
	$handler = fopen(__DIR__ . "/gmerchant.xml", "w");
	if(fwrite($handler, $map) == FALSE){
		echo "failed to write data<br>";
	}
	fclose($handler);
	
	
	//fwrite($handler, $map);
	//fclose($handler);
	@chmod(__DIR__ . "/gmerchant.xml", 0666);
		
	//build ua map
	$map_ua = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<rss xmlns:g=\"http://base.google.com/ns/1.0\" version=\"2.0\">\n";
	
	$map_ua .= "\t<channel>\n";
	$map_ua .= "\t\t<title>RDMarket</title>\n";
	$map_ua .= "\t\t<link>".$domain."</link>\n";
	$map_ua .= "\t\t<description>Інтернет-магазин теплої пілоги</description>\n";
	
	$map_ua .= build_merch('ua');

	$map_ua .= "\t</channel>\n";
	$map_ua .= "</rss>";
		
	$handler = fopen(__DIR__ . "/gmerchant_ua.xml", "wb+");
	fwrite($handler, $map_ua);
	fclose($handler);
	@chmod(__DIR__ . "/gmerchant_ua.xml", 0666);

}

	function build_merch($ua = false) {
		
		global $domain;

		$catdata = getData('category', 'type=short');
		$api_lang = isset($ua) && $ua ? '&lang=ua' : '';
		$proddata = getData('product', 'type=merch' . $api_lang);
		$catlink = array_column($catdata['body'], 'path', 'id');

		foreach ($proddata['body'] as $data)	{
			//print_r($data);
			$url = $ua == "ua" ? $domain . "/ua/" . $catlink[$data['category']] . "/" . $data['url'] . ".html" : $domain . "/" . $catlink[$data['category']] . "/" . $data['url'] . ".html";
			$img_url = $domain . '/assets/images/products/' . $data['image'][0]['img']; 
			$brand = $data['features']['Производитель'] ? $data['features']['Производитель'] : $data['features']['Виробник'];
			
			if (isset($data['options']) && $data['options'] && $data['category'] !== '17') {
				foreach($data['options'] as $key => $options ) {
					if ($data['options'][$key]['s']) { 
						$title = $data['name'] . ' ' . $data['options'][$key]['w'] . 'W (' . $data['options'][$key]['s'] . ' м²)';
					} else if ($data['options'][$key]['l']) {
						$title = $data['name'] . ' ' . $data['options'][$key]['w'] . 'W (' . $data['options'][$key]['l'] . ' м)';
					} else if ($data['options'][$key]['o']) { 
						$ohm = str_replace(',', '.', $data['options'][$key]['o']);
						$quantity = ceil(220/sqrt($ohm * 30));
						$watt = ceil(220 * 220 / ($ohm * $quantity)) ;
						$title = $data['name'] . ' ' . $watt . 'W (' . $data['options'][$key]['o'] . ' Ом/м)';
					} else if ($data['options'][$key]['p']) { 
						$title = $data['name'] . ' ' . $data['options'][$key]['p'] . 'W (' . $data['options'][$key]['p'] . ' Вт/м)';
					} else if ($data['options'][$key]['h']) {
						$title = $data['name'] . ' ' . $data['options'][$key]['p'] . 'W (' . $data['options'][$key]['h'] . ' cм)';
					}
			
					$map .= "\t<item>\n";
					$map .= "\t\t<g:id>".$data['id']."-".$key.$ua."</g:id>\n";
					$map .= "\t\t<g:title>".htmlspecialchars($title, ENT_XML1, 'UTF-8')."</g:title>\n";
					$map .= "\t\t<g:description>".htmlspecialchars(strip_tags($data['full_desc']), ENT_XML1, 'UTF-8')."</g:description>\n";
					$map .= "\t\t<g:link>".$url."?v=".$key."</g:link>\n";
					$map .= "\t\t<g:image_link>".$img_url."</g:image_link>\n";
					$map .= "\t\t<g:brand>".htmlspecialchars($brand, ENT_XML1, 'UTF-8')."</g:brand>\n";
					$map .= "\t\t<g:condition>new</g:condition>\n";
					$map .= "\t\t<g:availability>in stock</g:availability>\n";
					$map .= "\t\t<g:price>".$options['c']." UAH</g:price>\n";
					$map .= "\t\t<g:google_product_category>499873</g:google_product_category>\n";
					$map .= "\t</item>\n";
				}	
			} else if ($data['category'] !== '17') {
				$map .= "\t<item>\n";
				$map .= "\t\t<g:id>".$data['id'].$ua."</g:id>\n";
				$map .= "\t\t<g:title>".htmlspecialchars($data['name'], ENT_XML1, 'UTF-8')."</g:title>\n";
				$map .= "\t\t<g:description>".htmlspecialchars(strip_tags($data['full_desc']), ENT_XML1, 'UTF-8')."</g:description>\n";
					$map .= "\t\t<g:link>".$url."</g:link>\n";
				$map .= "\t\t<g:image_link>".$img_url."</g:image_link>\n";
				$map .= "\t\t<g:brand>".htmlspecialchars($brand, ENT_XML1, 'UTF-8')."</g:brand>\n";
				$map .= "\t\t<g:condition>new</g:condition>\n";
				$map .= "\t\t<g:availability>in stock</g:availability>\n";
				$map .= "\t\t<g:price>".$data['price']." UAH</g:price>\n";
				$map .= "\t\t<g:google_product_category>499873</g:google_product_category>\n";
				$map .= "\t</item>\n";				
			}				
			
		}

		return $map;

	}


/*
<g:description>Solid plastic Dog Bowl in marine blue color</g:description>

<g:google_product_category>Animals &gt; Pet Supplies</g:google_product_category>
<g:custom_label_0>Made in Waterford, IE</g:custom_label_0>

*/


function getData ($type, $query = false, $method = false) {
    if ( $curl = curl_init() ) {
		if ($query) $query = '?' . $query;
		$url = 'https://api.rdim.ua/v2/' . $type . '.php' . $query;
        if ($method == 'post') curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_URL, $url);
		//curl_setopt($curl, CURLOPT_HTTPHEADER, ["X-API-KEY:rdm-p4vU8-8Cs2j",]);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_ENCODING, "");
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 6);
        curl_setopt($curl, CURLOPT_TIMEOUT, 9);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $res = curl_exec($curl);
        curl_close($curl);
    } else {
        $res = file_get_contents($url);
	}	
	
	$data = json_decode($res, true);
	return $data;
	unset ($data);
}

?>