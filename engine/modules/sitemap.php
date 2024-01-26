<?php

if ($_GET['action'] == "create") {
	
	$domain = 'https://rdmarket.com.ua';

	$map = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
	
	$map .= "\t<sitemap>\n";
	$map .= "\t\t<loc>" . $domain . "/sitemap-ru.xml</loc>\n";
	$map .= "\t\t<changefreq>weekly</changefreq>\n";
	$map .= "\t</sitemap>\n";

	$map .= "\t<sitemap>\n";
	$map .= "\t\t<loc>" . $domain . "/sitemap-ua.xml</loc>\n";
	$map .= "\t\t<changefreq>weekly</changefreq>\n";
	$map .= "\t</sitemap>\n";
	
	$map .= "</sitemapindex>";
		
	$handler = fopen("../../sitemap/sitemap.xml", "wb+");
	fwrite($handler, $map);
	fclose($handler);
	
	@chmod("../../sitemap/sitemap.xml", 0666);
	
	$map_ru = build_map();

	$handler = fopen("../../sitemap/sitemap-ru.xml", "wb+");
	fwrite($handler, $map_ru);
	fclose($handler);
	
	@chmod("../../sitemap/sitemap-ru.xml", 0666);


	$map_ua = build_map('ua');
	
	$handler = fopen("../../sitemap/sitemap-ua.xml", "wb+");
	fwrite($handler, $map_ua);
	fclose($handler);
	
	@chmod("../../sitemap/sitemap-ua.xml", 0666);
	
}

	function build_map($ua = false) {
		
		global $domain;

		$catdata = getData('category', 'type=short');
		$proddata = getData('product');
		$artdata = getData('article');
		$catlink = array_column($catdata, 'path', 'id');

		$map = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
		
		$loc = $ua == "ua" ? $domain . "/ua/" : $domain . "/";
		$map .= "\t<url>\n";
		$map .= "\t\t<loc>" . $loc . "</loc>\n";
		$map .= "\t\t<changefreq>weekly</changefreq>\n";
		$map .= "\t</url>\n";
		
		foreach ($catdata as $data)	{
			$loc = $ua == "ua" ? $domain . "/ua/" . $data['path'] . ".html" : $domain . "/" . $data['path'] . ".html";
			$map .= "\t<url>\n";
			$map .= "\t\t<loc>" . $loc . "</loc>\n";
			$map .= "\t\t<changefreq>weekly</changefreq>\n";
			$map .= "\t</url>\n";
		}

		foreach ($proddata as $data)	{
			$loc = $ua == "ua" ? $domain . "/ua/" . $catlink[$data['category']] . "/" . $data['url'] . ".html" : $domain . "/" . $catlink[$data['category']] . "/" . $data['url'] . ".html";
			$map .= "\t<url>\n";
			$map .= "\t\t<loc>" . $loc . "</loc>\n";
			$map .= "\t\t<changefreq>weekly</changefreq>\n";
			$map .= "\t</url>\n";
		}

		foreach ($artdata as $data)	{
			$loc = $ua == "ua" ? $domain . "/ua/article/" . $data['url'] . ".html" : $domain . "/article/" . $data['url'] . ".html";
			$map .= "\t<url>\n";
			$map .= "\t\t<loc>" . $loc . "</loc>\n";
			$map .= "\t\t<changefreq>weekly</changefreq>\n";
			$map .= "\t</url>\n";
		}
		
		$map .= "</urlset>";

		return $map;

	}

function getData ($type, $query = false) {
    if ( $curl = curl_init() ) 
	{
		if ($query) $query = '?' . $query;
		$url = 'https://api.rdim.ua/v1/' . $type . '/' . $query;
        curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, ["X-API-KEY:rdm-p4vU8-8Cs2j",]);
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