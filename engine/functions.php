<?php
function getApiData ($url) {
    if ( $curl = curl_init() ) 
	{
        curl_setopt($curl, CURLOPT_URL, $url);
		//curl_setopt($curl, CURLOPT_HTTPHEADER, ["X-API-KEY:08b43ae5-801a-4691-9430-9b8ff3f06367",]);
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
}


function get_breadcrumbs($curr_url) {
	
	global $txt, $breaddata, $proddata;

	$breadname = array_column($breaddata, 'name', 'url');
	$list = $temp = array();
	$pos = 2;

	$lang_url = $_GET['lang'] ? '/' . $lang : '';
	$cat_url = $_GET['cat'] ? '/' . $_GET['cat'] : '';
	$subcat1_url = $_GET['subcat1'] ? '/' . $_GET['subcat1'] : '';
	$subcat2_url = $_GET['subcat2'] ? '/' . $_GET['subcat2'] : '';
	$prod_url = $_GET['prod'] ? '/' . $_GET['prod'] : '';
	
	$list[] = "<li itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\" class=\"breadcrumb-item brsc_phone\"><link itemprop=\"item\" href=\"/contact.html\"><span itemprop=\"name\">&#9742; 0 800 300 131</span><meta itemprop=\"position\" content=\"{pos}\"/></li>";
	
	if ($_GET['prod']) { $list[] = "<li class=\"breadcrumb-item\" itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\"><link itemprop=\"item\" href=\"" . $lang_url . $cat_url . $subcat1_url . $subcat2_url . $prod_url . '.html' . "\"><span itemprop=\"name\">" . $proddata['name'] . "</span><meta itemprop=\"position\" content=\"{pos}\"/></li>"; }

	if ($_GET['subcat2'] && $_GET['subcat2'] == $curr_url) { $list[] = "<li class=\"breadcrumb-item\" itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\"><link itemprop=\"item\" href=\"" . $lang_url . $cat_url . $subcat1_url . $subcat2_url . '.html' . "\"><span itemprop=\"name\">" . $breadname[$_GET['subcat2']] . "</span><meta itemprop=\"position\" content=\"{pos}\"/></li>"; }
	else if ($_GET['subcat2'] && $_GET['subcat2'] !== $curr_url) { $list[] = "<li class=\"breadcrumb-item\" itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\"><a href=\"" . $lang_url . $cat_url . $subcat1_url . $subcat2_url . '.html' . "\" itemprop=\"item\"><span itemprop=\"name\">" . $breadname[$_GET['subcat2']] . "</span></a><meta itemprop=\"position\" content=\"{pos}\"/></li>";}

	if ($_GET['subcat1'] && $_GET['subcat1'] == $curr_url) { $list[] = "<li class=\"breadcrumb-item\" itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\"><link itemprop=\"item\" href=\"" . $lang_url . $cat_url . $subcat1_url . '.html' . "\"><span itemprop=\"name\">" . $breadname[$_GET['subcat1']] . "</span><meta itemprop=\"position\" content=\"{pos}\"/></li>"; }
	else if ($_GET['subcat1'] && $_GET['subcat1'] !== $curr_url) { $list[] = "<li class=\"breadcrumb-item\" itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\"><a href=\"" . $lang_url . $cat_url . $subcat1_url . '.html' . "\" itemprop=\"item\"><span itemprop=\"name\">" . $breadname[$_GET['subcat1']] . "</span></a><meta itemprop=\"position\" content=\"{pos}\"/></li>"; }

	if ($_GET['cat'] && $_GET['cat'] == $curr_url) { $list[] = "<li class=\"breadcrumb-item\" itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\"><link itemprop=\"item\" href=\"" . $lang_url . $cat_url . '.html' . "\"><span itemprop=\"name\">" . $breadname[$_GET['cat']] . "</span><meta itemprop=\"position\" content=\"{pos}\"/></li>"; } 
	else if ($_GET['cat'] && $_GET['cat'] !== $curr_url) { $list[] = "<li class=\"breadcrumb-item\" itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\"><a href=\"" . $lang_url . $cat_url . '.html' . "\" itemprop=\"item\"><span itemprop=\"name\">" . $breadname[$_GET['cat']] . "</span></a><meta itemprop=\"position\" content=\"{pos}\"/></li>"; }
	
	if(count($list)) {
		$list = array_reverse($list);
		foreach($list as $value) {
			$temp[] = str_replace("{pos}", $pos, $value);
			$pos ++;
		}
		$list = $temp;
	}
	
	return implode("", $list);
}

function sanitize_output($buffer) {
    $search = array( '/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s', '/<!--(.*?)-->/', '/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s');
    $replace = array('>', '<', '\\1', '', '>', '<', '\\1');
    $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}

function display_prods($ids) {
	global $api_domain, $breaddata;
	
	$prodsapi = $api_domain . 'product/?id=' . $ids[2];
	$prodsdata = getApiData($prodsapi);
	$caturl = array_column($breaddata, 'path', 'id');

	$result = ''; 
	$result .= '<div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow owl-prod-inc">';
	foreach ($prodsdata as $prod) {
		$prod_link = $caturl[$prod['category']] . '/' . $prod['url'] . '.html';
		$image = $prod['image']['image1'];
		$prod_title = $prod['name'];
		$price = $prod['price'];
		$id = $prod['id'];
		
		$result .= '<div class="product product-7 text-center">
				<figure class="product-media">
					<a href="' . $prod_link . '">
						<img src="' . $image . '" alt="' . $prod_title .'" width="280" height="250" class="product-image">
					</a>
					<div class="product-action">';
					
					
		if ($prod['options']) {
			$result .= '<button class="btn-product btn-cart btn-select" onclick="window.open (\'' . $prod_link . '\');return false"><span>Выберите опцию</span></button>';
		} else {
			$result .= '<button class="btn-product btn-cart" data-id="'.$id.'" data-title="'.$prod_title.'" data-price="'.$price.'" data-image="'.$image.'" data-link="'.$prod_link.'"><span>В корзину</span></button>';		
		}
		
        $result .= '</div><!-- End .product-action -->
				</figure><!-- End .product-media -->
				<div class="product-body">
					<h3 class="product-title"><a href="' . $prod_link . '">' . $prod_title . '</a></h3>
					<div class="product-price">
						<span class="new-price">' . $price  . ' грн.</span>
					</div>
				</div><!-- End .product-body -->
			</div>';		
		}

	$result .= '</div>';
		
	return $result;
		
}


function display_cats($ids) {
	global $api_domain, $breaddata;
	
	$catsapi = $api_domain . 'category/?id=' . $ids[2];
	$catsdata = getApiData($catsapi);
	//$caturl = array_column($breaddata, 'path', 'id');

	$result = ''; 
	$result .= '<div class="owl-carousel owl-simple carousel-with-shadow owl-cat-inc">';
	foreach ($catsdata as $cat) {
		$cat_link = $cat['path'] . '.html';
		$cat_name = $cat['name'];
		$image = $cat['image'];
		
		
		$result .= '<article class="entry entry-display">
			<figure class="entry-media">
				<a href="' . $cat_link . '">
					<img src="' . $image . '" alt="' . $cat_name . '">
                </a>
            </figure><!-- End .entry-media -->

            <div class="entry-body text-center">
				<h3 class="entry-title">
					<a href="' . $cat_link . '">' . $cat_name . '</a>
				</h3><!-- End .entry-title -->

                <div class="entry-content">
					<a href="' . $cat_link . '" class="read-more">Continue Reading</a>
                </div><!-- End .entry-content -->
            </div><!-- End .entry-body -->
        </article><!-- End .entry -->';


	}
	$result .= '</div>';

	return $result;

}

function display_articles($ids) {
	global $api_domain, $breaddata;

	return $ids[2];
}