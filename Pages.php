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
					
						<div class="grid_16 mob-nav"></div>
						<div class="clear"></div>
					</div>
				</div>
			</header>

			<div class="item teaser-page-list">
				<div class="container_16">
					<aside class="grid_10">
						<h1 class="page-title">
							<?php
							$page = Page::getCurrentPage();
							echo $page->getCollectionName();
							?>
						</h1>
					</aside>
					<?php
						$breadcrumbs = BlockType::getByHandle('autonav');
						$breadcrumbs->controller->orderBy = 'display_asc';
						$breadcrumbs->controller->displayPages = 'top'; 
						$breadcrumbs->controller->displaySubPages = 'relevant_breadcrumb'; 
						$breadcrumbs->controller->displaySubPageLevels = 'all';
						$breadcrumbs->render('templates/ecmsBreadcrumb');
					?>
					<div class="clear"></div>
				</div>
			</div>

			<div id="main" class="site-main container_16">
				<div class="inner">
					<!-- Third widget areea -->
					<div class="grid_16">
						<div class="widget-title">
								<h3>
								<?php
									echo $page->getCollectionName();
								?>
								</h3>							
								<div class="clear"></div>
						</div>
					</div>
					<div class="grid_10 first-home-widget-area">
					<?php
					$blocks = $page->getBlocks('Main');
					foreach($blocks as $block) {
						$btHandle = $block->getBlockTypeHandle();
						if ($btHandle == 'content') {
							$block->display();
						}
					}
					?>						
					<?php
						
						$a = new Area('Content');
						$a->display();
						?>
						<?php
						$bt = BlockType::getByHandle('autonav');
						$bt->controller->displayPages = 'below';
						$bt->controller->orderBy = 'display_asc';
						$bt->controller->displaySubPages = 'relevant'; 
						$bt->controller->displaySubPageLevels = 'custom';
						$bt->controller->displaySubPageLevelsNum = 1;
						$bt->render('templates/ecmsfoundationSubMenu'); 
						?>
						
					</div>


					
					<div class="grid_6 first-home-widget-area">
						<?php
						$a = new Area('ImageArea');
						$a->display();
						?>
					</div>

					<!-- Forth widget areea -->
					<div class="grid_16 forth-home-widget-area responsive_img">
					<?php
						$a = new GlobalArea('WidgetArea');
						$a->display();
					?>
					</div>
					
					<div class="clear"></div>
				</div>
			</div>

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div id="tertiary" class="sidebar-container" role="complementary">
					<div class="container_16">
						
						
						<div class="grid_6">
							<aside id="meta-0" class="widget widget_adress">
								<h3>Contact us</h3>
								<?php
								$a = new GlobalArea('ContactUs');
								$a->display();
								?>
							</aside>
						</div>


						
						<div class="grid_5">
						<?php 
						$list = new \Concrete\Core\Page\PageList();
									$list->sortByPublicDateDescending();
									$list->filterByPageTypeHandle('news');
									$list->setItemsPerPage(3);
									
									$pages = $list->getResults();

						
						
						?>
						<aside id="meta-1" class="widget widget_meta">
							<h3>Latest News</h3>
							
							<ul>
								<?php
									
									foreach ($pages as $page) {
									$blocks = $page->getBlocks("ImageArea");
									

								?>
									<li>
											<a href="<?php echo '' . $page->getCollectionPath() . ''; ?>">
											<?php echo '' . $page->getCollectionName() . ''; ?>
											</a>
									</li>
								<?php
									
									}
								?>
							</ul>
						</aside>
						
					</div>
						
					
						
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
				<div class="site-info">
					<div class="container_16">
						
						
						<div class="grid_8">
							<p class="copy">
							Copyright ©  2017.  All Rights reserved.  
							<?php
								$a = new GlobalArea('Copyright');
								$a->display();
							?>
							</p>
						</div>

						
						<div class="grid_8">
							<!--<p class="designby">Designed by <a href="#">eCancer Team</a></p>-->
						</div>

						<div class="clear"></div>
					</div>
				</div>
			</footer>

		</div>
    </div>
<?=Loader::element('footer_required'); ?>
</body>
</html>