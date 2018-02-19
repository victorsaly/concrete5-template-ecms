<!DOCTYPE html>
<html dir="ltr" lang="en-GB">
<head>
	<?=Loader::element('header_required');?>
    <meta name="author" content="Victor Saly">
	<!--  Basic Page Needs -->
	<meta charset="UTF-8" />
	<title>ecms - Foundation</title>
	<meta name="description" content="">
	<meta name="author" content="Victor Saly">

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?=$view->getThemePath()?>/img/favicon.ico" />
	<link rel="apple-touch-icon" href="<?=$view->getThemePath()?>/img/apple-touch-icon.png" />

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" media="all" href="<?=$view->getThemePath()?>/css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?=$view->getThemePath()?>/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?=$view->getThemePath()?>/css/flexslider.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?=$view->getThemePath()?>/css/font-awesome-ie7.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?=$view->getThemePath()?>/css/keyframes.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?=$view->getThemePath()?>/css/grid.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?=$view->getThemePath()?>/css/meanmenu.css" />

	<!-- Scripts -->
	<script type='text/javascript' src='<?=$view->getThemePath()?>/js/jquery.min.js'></script>
	<!--https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js<script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js'></script>-->
	<script src="<?=$view->getThemePath()?>/js/base.js"></script>

	<!-- Scripts for plugins -->
	
	<script src="<?=$view->getThemePath()?>/js/jquery.twitter.fetch.js"></script>
	<script src="<?=$view->getThemePath()?>/js/jquery.fitvids.js"></script>
	<script src="<?=$view->getThemePath()?>/js/jquery.meanmenu.js"></script>
	<script src="<?=$view->getThemePath()?>/js/jquery.flexslider-min.js"></script>
	<script src="<?=$view->getThemePath()?>/js/jquery.inview.js"></script>
	<script src="<?=$view->getThemePath()?>/js/jquery.scrollParallax.min.js"></script>

</head>
<body class="home blog two-column right-sidebar" data-twttr-rendered="true">
	<div class="<?=$c->getPageWrapperClass()?>">
        <div id="page">


		<header id="branding" class="site-header" role="banner">
			<div id="sticky_navigation">
				<div class="container_16">
					<hgroup class="fleft grid_5">
						<a href="/"><img src="<?=$view->getThemePath()?>/images/logo_global.jpg"/></a>
					</hgroup>

					<nav role="navigation" class="site-navigation main-navigation grid_11" id="site-navigation">
						<div class="menu-main-menu-container">
							<?php
							$bt = BlockType::getByHandle('autonav');
							$bt->controller->orderBy = 'display_asc';
							$bt->controller->displayPages = 'top';
							$bt->controller->displaySubPages = 'all';
							$bt->controller->displaySubPageLevels = 'custom';
							$bt->controller->displaySubPageLevelsNum = 1;
							$bt->render('templates/ecmsfoundationMenu');
							?>
                            
						</div>
					</nav>
					<!-- .site-navigation .main-navigation -->
					<div class="grid_16 mob-nav"></div>
					<div class="clear"></div>
				</div>
			</div>
		</header>
		<!-- #masthead .site-header -->

		<!-- Teaser / Slider -->

		<?php
		$a = new Area('Slider');
		$a->display();
		?>
		


		<div id="main" class="site-main container_16">
			<div class="inner">
				<?php
									$list = new \Concrete\Core\Page\PageList();
									$list->sortByPublicDateDescending();
									$list->filterByPageTypeHandle('News');
									$list->setItemsPerPage(5);
									$list->filterByIsFeatured(1);
									$pages = $list->getResults();
									if	 (sizeof($pages) > 0){
				?>
				<!-- First widget areea -->
				<div class="grid_16 first-home-widget-area">
					<aside id="flexlatestnews" class="WPlookLatestNews flex-container-news" >
						<div class="widget-title mright mleft" >
							<h3>Featured News</h3>
							<div class="clear"></div>
						</div>

						<div class="latestnews-body flexslider-news">
							<ul class="slides">

								<?php
									
									foreach ($pages as $page) {

									$blocks = $page->getBlocks("ImageArea");
									foreach ($blocks as $block) {
												if ($block->getBlockTypeHandle() == "image") {
													if (is_object($block)) {
														$tsb = $block->getInstance();
														$thumb = $tsb->getFileObject();

														if (is_object($thumb)) {
                    										$tag = Core::make('html/image', array($thumb, false))->getTag();
                    										$type = \Concrete\Core\File\Image\Thumbnail\Type\Type::getByHandle('file_manager_detail');
                    										$src = $thumb->getThumbnailURL($type->getBaseVersion());
														}
													}
												}
											}

								?>
									<li>
										<div class="image fright">
											<img class="radius img-responsive" src="<?=$src?>" alt="Image alt">
										</div>
										<div class="content fleft">
											<h3>
											<?php echo '' . $page->getCollectionName() . ''; ?>
											<?php

											?>
											</h3>
											<p class="category">
												<?php echo '' . $page->getCollectionDateAdded() . ''; ?>
											</p>
											<p class="description">
											<?php
											// load text helper
											$th = Loader::helper('text');
											// news description
											$newsDescription = $page->getCollectionDescription();
											// short version of the text to fix the long text issue in the homepage 19/02/2018
  											$newsDescription = $th->shortenTextWord($newsDescription, 200);
											
											echo '' . $newsDescription . ''; ?>
											</p>
											<div class="flex-button-red">
											<a class="radius" href="<?php echo '' . $page->getCollectionPath() . ''; ?>">Read More <i class="icon-angle-right"></i></a></div>
										</div>
										<div class="clear"></div>
									</li>
								<?php
									}
								?>
								
							</ul>

						</div>
					</aside>
				</div>
				<?php
									}
				?>
				<?php
					$list = new \Concrete\Core\Page\PageList();
									$list->sortByPublicDateDescending();
									$list->filterByPageTypeHandle('projects');
									$list->setItemsPerPage(3);
									$list->filterByIsFeatured(1);
									$pages = $list->getResults();
									if	 (sizeof($pages) > 0){
				?>
				<!-- Third widget areea -->
				<div class="grid_16 third-home-widget-area">
					<aside id="wpltfbs-f2w" class="widget WPlookCauses">
						<div class="widget-title">
							<h3>Latest Projects </h3>
							<div class="viewall fright"><a href="/index.php/projects" class="radius" title="View all chauses">View all projects</a></div>
							<div class="clear"></div>
						</div>

						<div class="widget-causes-body">
							<!-- First cause -->

							<?php
									
									$count = 1;
									foreach ($pages as $page) {

									$blocks = $page->getBlocks("ImageArea");
									foreach ($blocks as $block) {
												if ($block->getBlockTypeHandle() == "image") {
													if (is_object($block)) {
														$tsb = $block->getInstance();
														$thumb = $tsb->getFileObject();

														if (is_object($thumb)) {
                    										$tag = Core::make('html/image', array($thumb, false))->getTag();
                    										$type = \Concrete\Core\File\Image\Thumbnail\Type\Type::getByHandle('projects_thumbnails');
                    										$src = $thumb->getThumbnailURL($type->getBaseVersion());
														}
													}
												}
											}
										if ($count<=4)
										{
									?>
									<article class="cause-item">
										<figure>
											<a title="Image title" href="index.php/<?php echo '' . $page->getCollectionPath() . ''; ?>">
												<img width="272" height="150" src="<?=$src?>" class="wp-post-image">
												<div class="mask radius">
													<div class="mask-square"><i class="icon-tint"></i></div>
												</div>
											</a>
										</figure>
										<h3 class="entry-header">
											<a title="<?php echo '' . $page->getCollectionName() . ''; ?>" href="index.php/<?php echo '' . $page->getCollectionPath() . ''; ?>">
												<?php echo '' . $page->getCollectionName() . ''; ?>
												
												
											</a>
										</h3>

										<div class="short-description">
											<p>
												<?php echo '' . $page->getCollectionDescription() . ''; ?>
										   </p>
										</div>
									</article>
								<?php
										}
										$count++;
									}
								?>

						</div>
					</aside>
				</div>
				<?php
									}
				?>
				<!-- Forth widget areea -->
<div class="grid_16 forth-home-widget-area">
				<?php
					$a = new GlobalArea('WidgetArea');
					$a->display();
				?>
</div>
				
				<div class="clear"></div>

			</div>
		</div>

		<!-- Footer -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div id="tertiary" class="sidebar-container" role="complementary">
				<div class="container_16">

					<!-- First Widget Area -->
					<div class="grid_6">
						<aside id="meta-0" class="widget widget_adress">
							<h3>Contact us</h3>
							<?php
							$a = new GlobalArea('ContactUs');
							$a->display();
							?>

							<!--  -->
						</aside>
					</div>


					<!-- Second Widget Area -->
					<div class="grid_5">
						<?php 
						$list = new \Concrete\Core\Page\PageList();
									$list->sortByPublicDateDescending();
									$list->filterByPageTypeHandle('News');
									$list->setItemsPerPage(5);
									$list->filterByIsFeatured(1);
									$pages = $list->getResults();

						if ($pages.length>0){
						
						?>
						<aside id="meta-1" class="widget widget_meta">
							<h3>Latest News</h3>
							
							<ul>
								<?php
									
									foreach ($pages as $page) {
									$blocks = $page->getBlocks("ImageArea");
									$count2 = 1;
									foreach ($blocks as $block) {
												if ($block->getBlockTypeHandle() == "image") {
													if (is_object($block)) {
														$tsb = $block->getInstance();
														$thumb = $tsb->getFileObject();

														if (is_object($thumb)) {
                    										$tag = Core::make('html/image', array($thumb, false))->getTag();
                    										$type = \Concrete\Core\File\Image\Thumbnail\Type\Type::getByHandle('file_manager_detail');
                    										$src = $thumb->getThumbnailURL($type->getBaseVersion());
														}
													}
												}
											}

											if ($count2<=4)
										{

								?>
									<li>
											<a href="<?php echo '' . $page->getCollectionPath() . ''; ?>">
											<?php echo '' . $page->getCollectionName() . ''; ?>
											</a>
									</li>
								<?php
									}
									$count2++;
									}
								?>
							</ul>
						</aside>
						<?php
						}
						?>
					</div>

					
					<!-- Forth Widget Area -->
					<div class="grid_5">
						<aside id="meta-3" class="widget widget_meta">
						<h3>Latest Tweets</h3>
						
							<script>
							var configProfile = {
								  "profile": {"screenName": 'ecancer'},
								  "domId": '',
								  "maxTweets": 1,
								  "enableLinks": true, 
								  "showUser": false,
								  "showTime": true,
								  "showRetweet": false,
								  "showImages": false,
								  "customCallback": handleTweets,
								  "showInteraction": false,
								  "lang": 'en'
								};
								function handleTweets(tweets) {
									var x = tweets.length;
									var n = 0;
									var element = document.getElementById('latest-tweets-body');
									var html = '';
									while(n < x) {
									  html += '' + tweets[n] + '';
									  n++;
									}
									html += '';
									element.innerHTML = html;
								}
							twitterFetcher.fetch(configProfile);
							</script>
							 <div id="latest-tweets-body">
							 
							 </div>
							<div class="clear"></div>
							<div><a href="https://twitter.com/ecancer" target="_blank" class="radius follow">Follow @ecancer</a></div>
						</aside>
					</div>

					<div class="clear"></div>
				</div>
			</div>


			<!-- Site Info -->
			<div class="site-info">
				<div class="container_16">

					<!-- CopyRight -->
					<div class="grid_8">
						<p class="copy">
						<!-- Copyright ©  2017.  All Rights reserved.   -->
						<?php
							$a = new GlobalArea('Copyright');
							$a->display();
						?>
						</p>
					</div>

					<!-- Design By -->
					<div class="grid_8">
						<!--<p class="designby">Designed by <a href="#">eCancer Team</a></p>-->
					</div>

					<div class="clear"></div>
				</div>
			</div><!-- .site-info -->
		</footer><!-- #colophon .site-footer -->

	</div>
    </div>

	<!-- /#page -->
<?=Loader::element('footer_required'); ?>
</body>
</html>