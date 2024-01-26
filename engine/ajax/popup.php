<?php
$lang = explode('/', $_SERVER['HTTP_REFERER'])[3] == 'ua' ? 'ua' : 'ru';
include_once(realpath(__DIR__ . '/../../').'/lang/' . $lang . '.php');

if ($_POST['name'] == 'general') { ?>
<div class="modal fade" style="display: block;">
  <div class="modal-dialog modal-dialog-centered">
  
    <div class="modal-content">

	<div class="container newsletter-popup-container">
		<div class="row justify-content-center">
			
				<div class="row no-gutters bg-white newsletter-popup-content">
					<div class="banner-content-wrap">
						<button title="Закрыть" type="button" class="mfp-close"><span>×</span></button>
						<div class="banner-content text-center">
							<img src="/assets/images/popup-logo.webp" class="logo" alt="logo" width="60" height="15">
							<h2 class="banner-title smallest-title"><?php echo $txt['popup_general_header']; ?></h2>
							<p class="bigger-text"><?php echo $txt['popup_general_subheader']; ?></p>
							<form method="post" action="">
								<div class="input-group input-group-round">
									<input type="text" class="form-control form-control-white" placeholder="<?php echo $txt['name']; ?>" name="name" aria-label="<?php echo $txt['name']; ?>" required>
									<input type="tel" class="form-control form-control-white phone-num" placeholder="<?php echo $txt['phone']; ?>" name="phone" aria-label="<?php echo $txt['phone']; ?>" required>
									<input type="hidden" name="source" value="Попап с баннером об ошибке <?php echo $lang; ?>">
									<input type="hidden" name="pageurl" value="<?php echo $_SERVER['HTTP_REFERER'];?>" />
									<input type="hidden" name="email" value="" />
									<input type="hidden" name="event" value="send-general-modal">
									<div class="input-group-append">
										<button class="btn" type="submit" id="send-general-modal"><span><i class="icon-long-arrow-right"></i></span></button>
									</div><!-- .End .input-group-append -->
								</div><!-- .End .input-group -->
							</form>
							<div class="custom-control custom-checkbox"></div><!-- End .custom-checkbox -->
							
					</div>
				</div>
			</div>
		</div>
	</div>
	
			</div>
		</div>
	</div>
	
<?php } else if ($_POST['name'] == 'credit') { ?>

<div class="modal fade" style="display: block;">
  <div class="modal-dialog modal-dialog-centered">
  
    <div class="modal-content">

	<div class="container newsletter-popup-container">
		<div class="row justify-content-center">
			
				<div class="row no-gutters bg-white newsletter-popup-content">
					<div class="banner-content-wrap">
						<button title="Закрыть" type="button" class="mfp-close"><span>×</span></button>
						<div class="banner-content text-center">
							<img src="/assets/images/popup-logo.webp" class="logo" alt="logo" width="60" height="15">
							<h2 class="banner-title smallest-title"><?php echo $txt['popup_credit_header']; ?></h2>
							<p class="bigger-text"><?php echo $txt['popup_credit_subheader']; ?></p>
							<form method="post" action="">
								<div class="input-group input-group-round">
									<input type="text" class="form-control form-control-white" placeholder="<?php echo $txt['name']; ?>" name="name" aria-label="<?php echo $txt['name']; ?>" required>
									<input type="tel" class="form-control form-control-white phone-num" placeholder="<?php echo $txt['phone']; ?>" name="phone" aria-label="<?php echo $txt['phone']; ?>" required>
									<input type="hidden" name="source" value="Попап на запрос кредита <?php echo $lang; ?>">
									<input type="hidden" name="pageurl" value="<?php echo $_SERVER['HTTP_REFERER'];?>" />
									<input type="hidden" name="email" value="" />
									<input type="hidden" name="event" value="send-general-modal">
									<div class="input-group-append">
										<button class="btn" type="submit" id="send-general-modal"><span><i class="icon-long-arrow-right"></i></span></button>
									</div><!-- .End .input-group-append -->
								</div><!-- .End .input-group -->
							</form>
							<div class="custom-control custom-checkbox"></div><!-- End .custom-checkbox -->
							
					</div>
				</div>
			</div>
		</div>
	</div>
	
			</div>
		</div>
	</div>
	
<?php } else if ($_POST['name'] == 'sale') { ?>

<div class="modal fade" style="display: block;">
  <div class="modal-dialog modal-dialog-centered">
  
    <div class="modal-content">

	<div class="container newsletter-popup-container">
		<div class="row justify-content-center">
			
				<div class="row no-gutters bg-white newsletter-popup-content">
					<div class="banner-content-wrap">
						<button title="Закрыть" type="button" class="mfp-close"><span>×</span></button>
						<div class="banner-content text-center">
							<img src="/assets/images/popup-logo.webp" class="logo" alt="logo" width="60" height="15">
							<h2 class="banner-title smallest-title"><?php echo $txt['popup_sale_header']; ?></h2>
							<p class="bigger-text"><?php echo $txt['popup_sale_subheader']; ?></p>
							<form method="post" action="">
								<div class="input-group input-group-round">
									<input type="text" class="form-control form-control-white" placeholder="<?php echo $txt['name']; ?>" name="name" aria-label="<?php echo $txt['name']; ?>" required>
									<input type="tel" class="form-control form-control-white phone-num" placeholder="<?php echo $txt['phone']; ?>" name="phone" aria-label="<?php echo $txt['phone']; ?>" required>
									<input type="hidden" name="source" value="Попап на запрос кредита <?php echo $lang; ?>">
									<input type="hidden" name="pageurl" value="<?php echo $_SERVER['HTTP_REFERER'];?>" />
									<input type="hidden" name="email" value="" />
									<input type="hidden" name="event" value="send-general-modal">
									<div class="input-group-append">
										<button class="btn" type="submit" id="send-general-modal"><span><i class="icon-long-arrow-right"></i></span></button>
									</div><!-- .End .input-group-append -->
								</div><!-- .End .input-group -->
							</form>
							<div class="custom-control custom-checkbox"></div><!-- End .custom-checkbox -->
							
					</div>
				</div>
			</div>
		</div>
	</div>
	
			</div>
		</div>
	</div>
	
<?php } else if ($_POST['name'] == 'success') { ?>

<div class="modal fade" style="display: block;">
  <div class="modal-dialog modal-dialog-centered">
  
    <div class="modal-content">

	<div class="container newsletter-popup-container">
		<div class="row justify-content-center">

				<div class="row no-gutters bg-white newsletter-popup-content">
					<div class="banner-content-wrap">
						<button title="Закрыть" type="button" class="mfp-close"><span>×</span></button>
						<div class="banner-content text-center">
							<img src="/assets/images/popup-logo.webp" class="logo" alt="logo" width="60" height="15">
							<h2 class="banner-title"><?php echo $txt['popup_ok_header']; ?></h2>
							<p><?php echo $txt['popup_ok_subheader']; ?></p>
							<div class="custom-control custom-checkbox"></div><!-- End .custom-checkbox -->
					</div>
				</div>
			</div>
		</div>
	</div>
	
			</div>
		</div>
	</div>

<?php } else if ($_POST['name'] == 'thanks') { ?>
						<img src="/assets/images/popup-logo.webp" class="logo" alt="logo" width="60" height="15">
						<h2 class="banner-title"><?php echo $txt['popup_ok_header']; ?></h2>
						<p><?php echo $txt['popup_ok_subheader']; ?></p>
						<div class="custom-control custom-checkbox">
						</div><!-- End .custom-checkbox -->
<?php }?>
	