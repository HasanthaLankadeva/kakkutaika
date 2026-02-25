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
	
	<?php if( $GLOBALS['current_route'] == 'cakes-detail' ) { ?>
		<title><?= $product['itemTitle'] ?></title>
		<meta property="og:title" content="<?= $product['itemTitle'] ?>" />
		<meta property="og:description" content="<?= $product['content'] ?>" />
		<meta property="og:url" content="https://s29.getynet.com/accounts/fkgWebSe/se/hem-fkg" />
		<meta property="og:image" content="<?= BASE_URL . "/admin/" . $product['itemImage'] ?>" />
	<?php } else { ?>
		<title><?= $metaData[0]['itemTitle'] ?></title>
		<meta property="og:title" content="<?= $metaData[0]['itemTitle'] ?>" />
		<meta property="og:description" content="<?= $metaData[0]['content'] ?>" />
		<meta property="og:url" content="<?= $metaData[0]['lineOne'] ?>" />
		<meta property="og:image" content="<?= BASE_URL . "/admin/" . $metaData[0]['itemImage'] ?>" />
	<?php } ?>

	<link rel="shortcut icon" type="image/x-icon" href="<?= BASE_URL ?>/favicon.ico" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- CMS Defaults CSS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&family=Leckerli+One&family=Merienda:wght@300..900&display=swap" rel="stylesheet">
	<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
	
	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/S360-base-v-9.css">
	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/icomoon_v-8-7_style.css">
	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/S360-theme-editor-default-v-4.css">
	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/variables.css">

	<!-- Components Default CSS -->
	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/component.css">
	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/component-media-768.css" media="(min-width: 768px)">
	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/component-media-1024.css" media="(min-width: 1024px)">
	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/component-media-1366.css" media="(min-width: 1366px)">

	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/theme.css">
	<!--link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/theme-media-480.css" media="(min-width: 480px)"-->
	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/theme-media-768.css" media="(min-width: 768px)">
	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/theme-media-1024.css" media="(min-width: 1024px)">
	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/theme-media-1366.css" media="(min-width: 1366px)">

	<!-- Project Local Override -->
	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/theme-colors-for-elements.css">
	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/project/theme.css">
	<!--link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/project/theme-media-480.css" media="(min-width: 480px)"-->
	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/project/theme-media-768.css" media="(min-width: 768px)">
	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/project/theme-media-1024.css" media="(min-width: 1024px)">
	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/css/project/theme-media-1366.css" media="(min-width: 1366px)">

	<!-- CMS Defaults JS -->
	<script src="<?= PUBLIC_URL ?>/assets/js/jquery-3.3.1.min.js"></script>
	<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="<?= PUBLIC_URL ?>/assets/js/S360-base-v-2.js"></script>
	<script src="<?= PUBLIC_URL ?>/assets/js/auto-load-libs.js"></script>

	<link rel="stylesheet" href="<?= PUBLIC_URL ?>/assets/js/libs/aos/aos.css" media="(min-width: 1366px)">
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
