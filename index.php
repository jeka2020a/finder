<?php
/*
@error_reporting ( E_ALL ^ E_WARNING ^ E_DEPRECATED ^ E_NOTICE );
@ini_set ( 'error_reporting', E_ALL ^ E_WARNING ^ E_DEPRECATED ^ E_NOTICE );

@ini_set ( 'display_errors', true );
@ini_set ( 'html_errors', false );
*/
define ( 'ROOT_DIR', dirname ( __FILE__ ) );
define ( 'ENGINE_DIR', ROOT_DIR . '/engine' );

$domain = 'https://rdmarket.com.ua';
$ver = date('hdy');

$browser_lang = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : '';
$lang = (isset($_GET['lang']) && $_GET['lang'] == 'ua') ? 'ua' : 'ru';
$lang = (!isset($_GET['lang'])) ? 'ru' : $lang;
$url = end(explode('/', $_GET['url']));

if (!isset($_COOKIE["lang"])) {
	setcookie("lang", $lang, strtotime('+30 days'), "/"); 
}
if (!isset($_GET['lang']) && !isset($_COOKIE["lang"]) && ($browser_lang == 'ua')) {
	header('Location: ' . $browser_lang);
	die();
}

$url_lang = $lang == 'ua' ? '/ua' : '';
include_once(ROOT_DIR.'/data/'. $lang.'/lang.php');

if ($_GET['view'] == 'category') {
	if (file_exists(ROOT_DIR.'/data/'.$lang.'/page/'.$url.'.php')) {
		$page = 'page';
		include_once(ROOT_DIR.'/data/'. $lang.'/page/'.$url.'.php');
	} else if (file_exists(ROOT_DIR.'/data/'.$lang.'/product/'.$url.'.php') || $_GET['url'] == 'product') {
		$page = 'product';
		include_once(ROOT_DIR.'/data/'. $lang.'/product/'.$url.'.php');
	} else {
		$page = 'category';
		include_once(ROOT_DIR.'/data/'. $lang.'/category/'.$url.'.php');		
	}
} else {
	$page = 'main';
	include_once(ROOT_DIR. '/data/' . $lang . '/' . $page . '.php');
}

if ($_GET['view'] == 'article') {
	if (file_exists(ROOT_DIR.'/data/'.$lang.'/article/'.$url.'.php')) {
		$page = 'article';
		include_once(ROOT_DIR.'/data/'. $lang.'/article/'.$url.'.php');
	}
}

//read temaplate
include_once(ROOT_DIR . '/template/header.php');	
include_once(ROOT_DIR . '/template/' . $page . '.php');
include_once(ROOT_DIR . '/template/footer.php');


unset($page, $path, $lang, $breaddata, $artdata, $catdata, $proddata);

?>