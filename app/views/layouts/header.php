<?php
	function isActive(string $route): string
	{
		return ($GLOBALS['current_route'] ?? '') === $route ? 'active' : '';
	}

	$template = ($GLOBALS['current_route'] == '') ? 'home-template' : 'subpage-template';
	$pageClass = ($GLOBALS['current_route'] == '') ? 'home-page' : $GLOBALS['current_route'].'-page';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php
      // --- build safe meta ---
      $isDetail = $GLOBALS['current_route'] == 'cakes-detail';
      $title = $isDetail? $product['itemTitle'] : $metaData[0]['itemTitle'];
      $rawDesc = $isDetail? $product['content'] : $metaData[0]['content'];
      $desc = mb_substr(strip_tags($rawDesc), 0, 155);
      $url = $isDetail? (BASE_URL. $_SERVER['REQUEST_URI']) : $metaData[0]['lineOne'];
      $img = BASE_URL. "/admin/". ($isDetail? $product['itemImage'] : $metaData[0]['itemImage']);
   	?>
    <title><?= htmlspecialchars($title)?></title>
    <meta name="description" content="<?= htmlspecialchars($desc)?>">
    <link rel="canonical" href="<?= htmlspecialchars($url)?>">

    <!-- Open Graph / Twitter -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($title)?>">
    <meta property="og:description" content="<?= htmlspecialchars($desc)?>">
    <meta property="og:url" content="<?= htmlspecialchars($url)?>">
    <meta property="og:image" content="<?= htmlspecialchars($img)?>">
    <meta name="twitter:card" content="summary_large_image">

    <meta name="theme-color" content="#ffffff">
    <link rel="icon" href="<?= BASE_URL?>/favicon.ico" sizes="any">
    <link rel="icon" type="image/svg+xml" href="<?= BASE_URL?>/favicon.svg">

    <!-- Performance hints -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="//code.jquery.com">

	<!-- CMS Defaults CSS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=ABeeZee&family=Leckerli+One&family=Merienda:wght@400;700&display=swap" onload="this.onload=null;this.rel='stylesheet'">
	<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=ABeeZee&family=Leckerli+One&family=Merienda:wght@400;700&display=swap"></noscript>
	
	

	<!-- load the full file async for the rest of the site -->
	<link rel="preload" href="<?= PUBLIC_URL ?>/assets/css/core.css?v=1" as="style">

	<link rel="preload" href="<?= PUBLIC_URL ?>/assets/css/responsive.css?v=1" as="style">
</head>
<body class="<?= $template . ' ' . $pageClass; ?>">

<!--[if lt IE 10]-->
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<!--[endif]-->
	<noscript>
        <div class="no-script">Enable JavaScript in web browser to get full functionality</div>
    </noscript>
    <header class="r2g-header header-option-one menu-option-one" data-menu-items-on-768="5" data-menu-items-on-1024="5" data-menu-items-on-1366="5" data-active-option=".header-option-one" data-active-menu=".menu-option-one">
		<div class="menu_wave"></div>
		<div class="header-wrapper container clearfix">
			<div id="branding" class="branding">
				<a href="<?= BASE_URL ?>" class="logo">
					<img class="default-logo" src="<?= PUBLIC_URL ?>/assets/images/logo.jpg" title="kakkutaika.com" alt="kakkutaika Logo" />
					<img class="on-scroll-logo" src="<?= PUBLIC_URL ?>/assets/images/logo.jpg" title="kakkutaika.com" alt="kakkutaika Logo" />
				</a>
			</div>
			<div class="top-bar">
				<div class="top-bar-wrapper">
					<div class="r2g-header-sub-component r2g-contact-options contact-phone-only" data-active-class=".contact-phone-only">
						<a class="contact-link check-empty-href" href="call:<?= CONTACT_PHONE ?>" title="Phone"><?= CONTACT_PHONE ?></a>
					</div>
					<div class="r2g-header-sub-component r2g-contact-options contact-email-only" data-active-class=".contact-email-only">
						<a class="contact-link check-empty-href" href="mailto:<?= CONTACT_EMAIL ?>" title="Email"><?= CONTACT_EMAIL ?></a>
					</div>
				</div>
			</div>
			<div class="header-bottom-bar">
				<div id="main-menu" class="main-menu">
					<nav class="clearfix">
						<ul class="">
							<li class="home first">
								<a class="<?= isActive('') ?>" href="<?= BASE_URL ?>">Home</a>
							</li>
							<li class="services">
								<a class="<?= isActive('services') ?>" href="<?= BASE_URL ?>/services">Services</a>
							</li>
							<li class="cakes">
								<a class="<?= isActive('cakes') ?> <?= isActive('cakes-detail') ?>" href="<?= BASE_URL ?>/cakes">Cakes</a>
							</li>
							<li class="about">
								<a class="<?= isActive('about') ?>" href="<?= BASE_URL ?>/about">About Us</a>
							</li>
						</ul>
					</nav>
				</div>
				<a class="primary-button check-empty-href show-popup" href="<?= BASE_URL ?>/contact" title="Order Now">Contact Us</a>
				<div class="menu-btn">
					<div class="menu-btn-inner-wrapper">
						<span class="line-one menu-line"></span>
						<span class="line-two menu-line"></span>
						<span class="line-three menu-line"></span>
					</div>
				</div>
				<div id="more-menu-wrapper" class="more-menu-wrapper">
					<div id="more-menu" class="more-menu"></div>
				</div>
			</div>
		</div>
	</header>

	<div class="main-container">
    	<main class="main-block" role="main">
