<main class="main">
	<div class="title-section">
		<div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.webp')">
			<div class="container">
        			<h1 class="page-title"><?=$data['title'];?></h1>
			</div><!-- End .container -->
		</div>
	</div>

	<div class="breadcrumbs">
		<nav aria-label="breadcrumb" class="breadcrumb-nav">
			<div class="container">
				<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
				<?php foreach ($data['breads'] as $key => $breads) {
					if ($key === array_key_first($data['breads'])) {
						echo '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.$breads['url'].'" itemprop="item"><span itemprop="name">'.$breads['title'].'</span></a><meta itemprop="position" content="'.$breads['position'].'"/></li>';
					} else if ($key === array_key_last($data['breads'])) {
						echo '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><link itemprop="item" href="'.$breads['url'].'"><span itemprop="name">'.$breads['title'].'</span><meta itemprop="position" content="'.$breads['position'].'"/></li>';
					} else {
						echo '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.$breads['url'].'.html" itemprop="item"><span itemprop="name">'.$breads['title'].'</span></a><meta itemprop="position" content="'.$breads['position'].'"/></li>';
					}
				} ?>
				</ol>
			</div><!-- End .container -->
		</nav>
	</div>

	<?php if ($_GET['url'] == 'page-1') { ?>		

	<div class="page-content">
        <div class="container">
          	<div class="entry-container" data-layout="fitRows">
			<?php foreach ($data['articles'] as $art) { 
			$cat_arr =  array($txt['news'], $txt['cases'], $txt['decisions'], $txt['useful']); shuffle($cat_arr);?>
				<div class="entry-item lifestyle shopping col-sm-6 col-lg-4">
                    <article class="entry entry-mask">
                        <figure class="entry-media">
                            <a href="<?=$art['url']; ?>">
                                <img src="/assets/images/posts/<?=$art['image'];?>" alt="<?php echo $art['title']; ?>">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                <a href="<?=$art['url']; ?>"><?php echo $art['date']; ?></a>
									<span class="meta-separator">|</span>
                                <a href="<?=$art['url']; ?>"><?php echo rand(1000,9999).' '.$txt['readers']; ?></a>
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title limit-title">
                                <a href="<?=$art['url']; ?>"><?=$art['title']; ?></a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats">
                                <a href="<?=$art['url'];?>"><?=$cat_arr[0]?></a>, <a href="<?=$art['url']?>"><?=$cat_arr[1]?></a> 
                            </div><!-- End .entry-cats -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .entry-item -->
			<?php } ?>

            </div><!-- End .entry-container -->

            <div class="mb-3"></div><!-- End .mb-3 -->
		

		<?php } else { ?>

			<div class="page-content">
				<div class="container">
                    <article class="entry single-entry entry-fullwidth">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <span class="entry-author">
                                            автор <a href="#">RDMarket</a>
                                        </span>
                                        <span class="meta-separator">|</span>
                                        <a href="#"><?php echo date("d.m.Y", strtotime($data['date']));?></a>
                                        <span class="meta-separator">|</span>
                                        <a href="#"><?php echo rand(1000,9999).' '.$txt['readers']; ?></a>
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title entry-title-big">
                                        <?php echo $data['title'];?>
                                    </h2><!-- End .entry-title -->

                                    <div class="entry-cats">
                                        в <a href="#"><?php echo $txt['news'].', '.$txt['cases']; ?></a>
                                    </div><!-- End .entry-cats -->

                                    <div class="entry-content editor-content">
										<?php echo $data['full_desc'];?>
									</div><!-- End .entry-content -->

                                    <div class="entry-footer row no-gutters">
                                        <div class="col">
                                            <div class="entry-tags">
												<span>Tags:</span> <?php echo '<a href="#">'.$txt['cases'].'</a> <a href="#">'.$txt['decisions'].'</a>'; ?>
                                            </div><!-- End .entry-tags -->
                                        </div><!-- End .col -->
                                    </div><!-- End .entry-footer row no-gutters -->
                                </div><!-- End .entry-body -->
                            </div><!-- End .col-lg-11 -->

                            <div class="col-lg-1 order-lg-first mb-2 mb-lg-0">
                                <div class="sticky-content">
                                    <div class="social-icons social-icons-colored social-icons-vertical">
                                        <span class="social-label">SHARE:</span>
                                        <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        <a href="#" class="social-icon social-linkedin" title="Linkedin" target="_blank"><i class="icon-linkedin"></i></a>
                                    </div><!-- End .soial-icons -->
                                </div><!-- End .sticky-content -->
                            </div><!-- End .col-lg-1 -->
                        </div><!-- End .row -->
					</article><!-- End .entry -->


			<?php if (isset($data['related'])) { ?>				
				<div class="related-posts">
					<h3 class="title"><?php echo $txt['related_posts']; ?></h3><!-- End .title -->
					<div class="sly-related"><ul>
						<?php foreach ($data['related'] as $rel) {
							$rel_arr =  array($txt['news'], $txt['cases'], $txt['decisions'], $txt['useful']); shuffle($rel_arr);?>
				
							<li><article class="entry entry-grid">
                                <figure class="entry-media">
                                    <a href="<?=$rel['url'];?>">
                                        <img data-src="/assets/images/posts/<?=$rel['image'];?>" alt="<?php echo $rel['title']; ?>">
                                    </a>
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <a href="<?=$rel['url'];?>"><?=$rel['date'];?></a>
                                        <span class="meta-separator">|</span>
										<a href="<?=$rel['url'];?>"><?php echo rand(1000,9999).' '.$txt['readers']; ?></a>
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title">
                                        <a href="<?=$rel['url'];?>"><?php echo $rel['title']; ?></a>
                                    </h2><!-- End .entry-title -->

                                    <div class="entry-cats">
										<a href="<?=$rel['url'];?>"><?=$rel_arr[0];?></a>, <a href="<?=$rel['url'];?>"><?=$rel_arr[1];?></a>
                                    </div><!-- End .entry-cats -->
                                </div><!-- End .entry-body -->
                            </article></li><!-- End .entry -->
						<?php } ?>
					</ul></div><!-- End .owl-carousel -->
				</div><!-- End .related-posts -->
				<?php } }
				unset($reldata, $rel, $rel_link, $rel_img, $rel_date, $rel_arr); ?>		

		</div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
