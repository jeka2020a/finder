<?php

session_start();
if (! empty($_POST["action"])) {
    switch ($_POST["action"]) {
        case "notify":
			$page = $_POST['page']; 
			$informer = getCartInformer($page);
			
			$return_array = array('success' => true, 'informer' => $informer);
			echo json_encode($return_array);

			break;
		case "popup":
			$popup = getCartPopup();

			$return_array = array('success' => true,  'popup' => $popup);
			echo json_encode($return_array);

			break;
        case "add":
            addToCart();       			
			$informer = getCartInformer();
			$popup = getCartPopup();
			
			$return_array = array('success' => true, 'informer' => $informer,  'popup' => $popup);
			echo json_encode($return_array);

			break;
			
        case "edit":
            $total_price = editCart();
			$informer = getCartInformer();
			$popup = updateCartPopup();
			$cart_body = getCartbody();
			
			$return_array = array('success' => true, 'informer' => $informer,  'popup' => $popup, 'cart' => $cart_body, 'total_price' => $total_price);
			echo json_encode($return_array);

			break;
			
        case "remove":
            $total_price = removeFromCart();
			$informer = getCartInformer();
			$popup = updateCartPopup();
			$cart_body = getCartbody();
			
			$return_array = array('success' => true, 'informer' => $informer,  'popup' => $popup, 'cart' => $cart_body, 'total_price' => $total_price);
			echo json_encode($return_array);

			break;

        case "empty":
            $cartModel->emptyCart();
            break;
    }
}

/* functions */
function addToCart() {
	if (!isset($_SESSION["cart_item"])) {
		setcookie("activecart", "checked", 0, "/");
	}

    if (isset($_POST)) {
        $productCode = $_POST["id"];
		
		$_SESSION["cart_item"][$productCode]["code"] = $_POST["id"];
		$_SESSION["cart_item"][$productCode]["name"] = $_POST["title"];
		if (!$_SESSION["cart_item"][$productCode]["quantity"]){
			$_SESSION["cart_item"][$productCode]["quantity"] = $_POST["quantity"];
		}
		$_SESSION["cart_item"][$productCode]["price"] = $_POST["price"];
		$_SESSION["cart_item"][$productCode]["image"] = $_POST["image"];
		$_SESSION["cart_item"][$productCode]["link"] = $_POST["link"];
	}
	/* old logic
    if (isset($_POST)) {
        $productCode = $_POST["id"];
        $productTitle = $_POST["title"];
        $poductQuantity = $_POST["quantity"];
        $productPrice = $_POST["price"];
        $productImage = $_POST["image"];
        $productLink = $_POST["link"];
    }

    $cartItem = array(
        'code' => $productCode,
        'name' => $productTitle,
        'quantity' => $poductQuantity,
        'price' => $productPrice,
        'image' => $productImage,
        'link' => $productLink
    );

    $_SESSION["cart_item"][$productCode] = $cartItem; 
	*/
}

function editCart() {
    if (! empty($_SESSION["cart_item"])) {
        $total_price = 0;
        foreach ($_SESSION["cart_item"] as $k => $v) {
            if ($_POST["id"] == $k) {
                $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
            }
			$total_price = $total_price + ($_SESSION["cart_item"][$k]["quantity"] * $_SESSION["cart_item"][$k]["price"]);
		}
    return $total_price;
	unset ($total_price);
    }
}

function removeFromCart() {
	if (! empty($_SESSION["cart_item"])) {
		$total_price = 0;
        foreach ($_SESSION["cart_item"] as $k => $v) {
            if ($_POST["id"] == $k) unset($_SESSION["cart_item"][$k]);
            if (empty($_SESSION["cart_item"])) {
				unset($_SESSION["cart_item"]);
				setcookie("activecart", "", 0, "/");
			}
			$total_price = $total_price + ($_SESSION["cart_item"][$k]["quantity"] * $_SESSION["cart_item"][$k]["price"]);
        }
    }
	return $total_price;
	unset ($total_price);
}

function emptyCart() {
	unset($_SESSION["cart_item"]);
	setcookie("activecart", "", 0, "/");
	$this->cartSessionItemCount = 0;
}

function getCartbody() {
	
	$cart_body = ''; $i=0;
	foreach ($_SESSION["cart_item"] as $item) {
	$cart_body .= '<tr>
		<td class="product-col">
			<div class="product">
				<figure class="product-media">
					<a href="' . $item['link'] . '>">
						<input type="hidden" name="prod['.$i.'][link]" value="'.$item['link'].'">
						<img src="' . $item['image'] . '" alt="prod['.$i.'][name]">
						<input type="hidden" name="prod['.$i.'][image]" value="'.$item['image'].'">
					</a>
				</figure>
				<h3 class="product-title">
					<a href="' . $item['link'] . '>">' . $item['name'] . '</a>
						<input type="hidden" name="prod['.$i.'][name]" value="'.$item['name'].'">
				</h3><!-- End .product-title -->
			</div><!-- End .product -->
		</td>
		<td class="price-col">' . number_format($item['price'], 0, '.', ' ') . ' ₴</td>
		<input type="hidden" name="prod['.$i.'][price]" value="'.$item['price'].'">
		<td class="quantity-col">
			<div class="cart-product-quantity">
				<div class="input-group input-spinner">
					<div class="input-group-prepend"><button style="min-width: 26px" class="btn btn-decrement btn-spinner" type="button"><i class="icon-minus"></i></button></div>
					<input type="text" style="text-align: center" class="form-control" name="prod['.$i.'][quantity]" value="' . $item['quantity'] . '" data-id="' . $item['code'] . '">
					<div class="input-group-append"><button style="min-width: 26px" class="btn btn-increment btn-spinner" type="button"><i class="icon-plus"></i></button></div>
				</div>
			</div><!-- End .cart-product-quantity -->
		</td>
		<td class="total-col">' . number_format($item['quantity'] * $item['price'], 0, '.', ' ') . ' ₴</td>
		<input type="hidden" name="prod['.$i.'][sum]" value="'.$item['quantity'] * $item['price'].'">';
		$i++;
		$cart_body .= '<td class="remove-col"><span class="btn-remove" data-id="' . $item['code'] . '"><i class="icon-close"></i></span></td>
	</tr>';
	}
	
	return $cart_body;
	unset($cart_body);
}

function getCartInformer($page =  false) {
	$informer = '';

	if (isset($_SESSION["cart_item"]) && count($_SESSION["cart_item"]) > 0) {
		if ($page !== '/cart.html' && $page !== '/ua/cart.html') $p_class = ' cart-popup-btn';
		$informer .= '<div class="dropdown-toggle'.$p_class.'">
			<div class="icon position-relative">
				<i class="icon-shopping-cart"></i>
				<span class="cart-count">' . count($_SESSION["cart_item"]) . '</span>
			</div>
		</div>';
	} else {
		$informer .= '<div class="dropdown-toggle">
			<div class="icon position-relative">
				<i class="icon-shopping-cart"></i>
			</div>
		</div>';
	}
	
	return $informer;
	unset($informer);
}


function getCartPopup() {
	$popup = '';
	$lang = explode('/', $_SERVER['HTTP_REFERER'])[3] == 'ua' ? 'ua' : 'ru';
	$cart_header = $lang == "ua" ? 'Кошик товарів' : 'Корзина товаров';
	$cart_link = $lang == "ua" ? '/ua/cart.html' : '/cart.html';
	$total_title = $lang == "ua" ? 'Всього' : 'Итого';
	$checkout_title = $lang == "ua" ? 'Оформити замовлення' : 'Оформить заказ';
	
	if (isset($_SESSION["cart_item"]) && count($_SESSION["cart_item"]) > 0) {


$popup .= '<!-- Modal -->
<div class="modal fade" style="display: block;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">'.$cart_header.'</h5>
		<button title="Close" type="button" class="mfp-close"><span>×</span></button>
      </div>
      <div class="modal-body">
  
		<table class="table table-cart table-mobile">
			<tbody class="cart-popup">';

		$item_total = 0; $i = 1;
		foreach ($_SESSION["cart_item"] as $item) {
	$popup .= '<tr>
		<td class="product-col">
			<div class="product">
				<figure class="product-media">
					<a href="' . $item['link'] . '">
						<img src="' . $item['image'] . '" alt="'.$item['name'].'">	
					</a>
				</figure>
				<h3 class="product-title">
					<a href="' . $item['link'] . '">' . $item['name'] . '</a>
				</h3><!-- End .product-title -->
			</div><!-- End .product -->
		</td>
		<td class="quantity-col">
			<div class="cart-product-quantity">
				<div class="input-group input-spinner">
					<div class="input-group-prepend"><button style="min-width: 26px" class="btn btn-p-decrement btn-spinner" type="button"><i class="icon-minus"></i></button></div>
					<input type="text" style="text-align: center" class="form-control" name="quantity" value="' . $item['quantity'] . '" data-id="' . $item['code'] . '">
					<div class="input-group-append"><button style="min-width: 26px" class="btn btn-p-increment btn-spinner" type="button"><i class="icon-plus"></i></button></div>
				</div>
			</div><!-- End .cart-product-quantity -->
		</td>
		<td class="total-col">' . number_format($item['quantity'] * $item['price'], 0, '.', ' ') . ' ₴</td>';
		++$i;
		$popup .= '<td class="remove-col"><span class="btn-p-remove" data-id="' . $item['code'] . '"><i class="icon-close"></i></span></td>
	</tr>';
		$total_popup += ($item["price"] * $item['quantity']);
	}

      $popup .= '</tbody>
</table>

	</div>
      <div class="cart-footer">
        <span class="btn"><span class="total-title">'.$total_title.':</span> <span class="total-price"><span class="total">' . number_format($total_popup, 0, '.', ' ') . '</span> ₴</span></span>
        <a href="'.$cart_link.'"><button type="button" class="btn btn-primary">'.$checkout_title.'</button></a>
      </div>
    </div>
  </div>
</div>';

	}
	return $popup;
	unset($popup);
	
} 

function updateCartPopup() {
	$popup = '';

	if (isset($_SESSION["cart_item"]) && count($_SESSION["cart_item"]) > 0) {


		$item_total = 0; $i = 1;
		foreach ($_SESSION["cart_item"] as $item) {
	$popup .= '<tr>
		<td class="product-col">
			<div class="product">
				<figure class="product-media">
					<a href="' . $item['link'] . '">
						<img src="' . $item['image'] . '" alt="'.$item['name'].'">	
					</a>
				</figure>
				<h3 class="product-title">
					<a href="' . $item['link'] . '">' . $item['name'] . '</a>
				</h3><!-- End .product-title -->
			</div><!-- End .product -->
		</td>
		<td class="quantity-col">
			<div class="cart-product-quantity">
				<div class="input-group input-spinner">
					<div class="input-group-prepend"><button style="min-width: 26px" class="btn btn-p-decrement btn-spinner" type="button"><i class="icon-minus"></i></button></div>
					<input type="text" style="text-align: center" class="form-control" name="quantity" value="' . $item['quantity'] . '" data-id="' . $item['code'] . '">
					<div class="input-group-append"><button style="min-width: 26px" class="btn btn-p-increment btn-spinner" type="button"><i class="icon-plus"></i></button></div>
				</div>
			</div><!-- End .cart-product-quantity -->
		</td>
		<td class="total-col">' . number_format($item['quantity'] * $item['price'], 0, '.', ' ') . ' ₴</td>';
		$popup .= '<td class="remove-col"><span class="btn-p-remove" data-id="' . $item['code'] . '"><i class="icon-close"></i></span></td>
	</tr>';
	}

	}
	return $popup;
	unset($popup);
	
} 

?>
