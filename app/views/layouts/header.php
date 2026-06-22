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
	
	<style>
	/* paste ~10-15KB of critical CSS here - header, nav, hero text, variables */
	/* variables */
:root {
    --number__df__header-more-menu-width: 100%;
    --number__df__header-more-menu-padding: 20px 20px 20px 20px;
    --number__tp-tl__header-main-navigation-active-border-width: 0 0 2px;
    --number__tp-tl__header-fixed-main-navigation-active-border-width: 0 0 2px;
    --number__tp-tl__header-main-navigation-sub-menu-width: 150px;
    --number__tp-tl__header-main-navigation-sub-menu-border-width: 0;
    --number__tp-tl__header-main-navigation-sub-menu-padding: 10px 15px;
    --number__tp-tl__header-more-menu-width: 320px;
    --number__tp-tl__header-more-menu-border-width: 0;
    --number__tp-tl__header-more-menu-padding: 30px 30px 30px 30px;
    --number__tp-tl__header-more-menu-branding-width: 230px;
    --number__tl-dt__header-main-navigation-active-border-width: 0 0 2px;
    --number__tl-dt__header-fixed-main-navigation-active-border-width: 0 0 2px;
    --number__tl-dt__header-main-navigation-sub-menu-width: 150px;
    --number__tl-dt__header-main-navigation-sub-menu-border-width: 0;
    --number__tl-dt__header-main-navigation-sub-menu-padding: 10px 15px;
    --number__tl-dt__header-more-menu-width: 320px;
    --number__tl-dt__header-more-menu-border-width: 0;
    --number__tl-dt__header-more-menu-padding: 30px 30px 30px 30px;
    --number__dt-ls__header-main-navigation-active-border-width: 0 0 2px;
    --number__dt-ls__header-fixed-main-navigation-active-border-width: 0 0 2px;
    --number__dt-ls__header-main-navigation-sub-menu-width: 150px;
    --number__dt-ls__header-main-navigation-sub-menu-border-width: 0;
    --number__dt-ls__header-main-navigation-sub-menu-padding: 12px 20px 15px 20px;
    --number__dt-ls__header-more-menu-width: 350px;
    --number__dt-ls__header-more-menu-border-width: 0;
    --number__dt-ls__header-more-menu-padding: 30px 30px 30px 40px;
    --number__df__footer-padding: 30px 0 0;
    --number__df__footer-items-wrapper-width: 100%;
    --number__df__footer-items-wrapper-padding: 0;
    --number__df__footer-items-wrapper-margin: 0;
    --number__df__footer-copyright-padding: 20px 0;
    --number__tp-tl__footer-padding: 30px 0 0;
    --number__tp-tl__footer-items-wrapper-width: 100%;
    --number__tp-tl__footer-items-wrapper-padding: 0;
    --number__tp-tl__footer-items-wrapper-margin: 0;
    --number__tp-tl__footer-copyright-padding: 20px 0;
    --number__tl-dt__footer-padding: 100px 0;
    --number__tl-dt__footer-items-wrapper-width: 100%;
    --number__tl-dt__footer-items-wrapper-padding: 0;
    --number__tl-dt__footer-items-wrapper-margin: 0;
    --number__tl-dt__footer-copyright-padding: 20px 0;
    --number__dt-ls__footer-padding: 100px 0;
    --number__dt-ls__footer-items-wrapper-width: 100%;
    --number__dt-ls__footer-items-wrapper-padding: 0;
    --number__dt-ls__footer-items-wrapper-margin: 0;
    --number__dt-ls__footer-copyright-padding: 20px 0;
    --number__df__main-visual-slogan-wrapper-padding: 20px 0 50px;
    --number__df__main-visual-slogan-wrapper-container-padding: 0 20px;
    --number__df__main-visual-pager-wrapper-bottom: 26px;
    --number__tp-tl__main-visual-slogan-wrapper-padding: 16px 0;
    --number__tp-tl__main-visual-slogan-wrapper-bottom: 60px;
    --number__tp-tl__main-visual-slogan-wrapper-container-padding: 0 20px;
    --number__tp-tl__main-visual-pager-wrapper-bottom: 20px;
    --number__tl-dt__main-visual-slogan-wrapper-padding: 16px 0;
    --number__tl-dt__main-visual-slogan-wrapper-bottom: 60px;
    --number__tl-dt__main-visual-slogan-wrapper-container-padding: 0 20px;
    --number__tl-dt__main-visual-pager-wrapper-bottom: 20px;
    --number__dt-ls__main-visual-slogan-wrapper-padding: 16px 0;
    --number__dt-ls__main-visual-slogan-wrapper-bottom: 60px;
    --number__dt-ls__main-visual-slogan-wrapper-container-padding: 0 20px;
    --number__dt-ls__main-visual-pager-wrapper-bottom: 20px;
    --number__df__xbox-main-strip-image-wrapper-width: 100%;
    --number__df__xbox-main-strip-content-wrapper-width: 100%;
    --number__df__xbox-main-strip-content-wrapper-padding: 20px 0 0;
    --number__tp-tl__xbox-main-strip-image-wrapper-width: 100%;
    --number__tp-tl__xbox-main-strip-content-wrapper-width: 100%;
    --number__tp-tl__xbox-main-strip-content-wrapper-padding: 60px 60px 0;
    --number__tl-dt__xbox-main-strip-image-wrapper-width: 50%;
    --number__tl-dt__xbox-main-strip-content-wrapper-width: 50%;
    --number__tl-dt__xbox-main-strip-content-wrapper-padding: 0 0 0 40px;
    --number__dt-ls__xbox-main-strip-image-wrapper-width: 50%;
    --number__dt-ls__xbox-main-strip-content-wrapper-width: 50%;
    --number__dt-ls__xbox-main-strip-content-wrapper-padding: 0 0 0 60px;
    --number__df__xbox-sub-flex-wrapper-padding: 20px 0;
    --number__tp-tl__xbox-sub-flex-wrapper-padding: 20px;
    --number__tl-dt__xbox-sub-flex-wrapper-padding: 20px;
    --number__dt-ls__xbox-sub-flex-wrapper-padding: 25px;
    --number__df__r2g-flex-xlist-main-strip-xlist-item-gap: 20px;
    --number__tp-tl__r2g-flex-xlist-main-strip-xlist-item-gap: 20px;
    --number__tl-dt__r2g-flex-xlist-main-strip-xlist-item-gap: 20px;
    --number__dt-ls__r2g-flex-xlist-main-strip-xlist-item-gap: 20px;
    --number__df__rotator-main-strip-slick-slide-margin-left: 0;
    --number__df__rotator-main-strip-slick-slide-margin-right: 0;
    --number__tp-tl__rotator-main-strip-slick-slide-margin-left: 20px;
    --number__tp-tl__rotator-main-strip-slick-slide-margin-right: 20px;
    --number__tl-dt__rotator-main-strip-slick-slide-margin-left: 20px;
    --number__tl-dt__rotator-main-strip-slick-slide-margin-right: 20px;
    --number__dt-ls__rotator-main-strip-slick-slide-margin-left: 20px;
    --number__dt-ls__rotator-main-strip-slick-slide-margin-right: 20px;
    --number__df__content-sub-padding: 0 30px 30px;
    --number__tp-tl__content-sub-padding: 0 30px;
    --number__tl-dt__content-sub-padding: 0 30px;
    --number__dt-ls__content-sub-padding: 0 30px;
    --number__df__breadcrumb-breadcrumb-wrapper-padding: 15px 0;
    --number__df__breadcrumb-seperator-padding: 0;
    --number__df__breadcrumb-seperator-margin: 0 12px;
    --number__tp-tl__breadcrumb-breadcrumb-wrapper-padding: 15px 0;
    --number__tp-tl__breadcrumb-seperator-padding: 0;
    --number__tp-tl__breadcrumb-seperator-margin: 0 12px;
    --number__tl-dt__breadcrumb-breadcrumb-wrapper-padding: 15px 0;
    --number__tl-dt__breadcrumb-seperator-padding: 0;
    --number__tl-dt__breadcrumb-seperator-margin: 0 12px;
    --number__dt-ls__breadcrumb-breadcrumb-wrapper-padding: 15px 0;
    --number__dt-ls__breadcrumb-seperator-padding: 0;
    --number__dt-ls__breadcrumb-seperator-margin: 0 12px;
    --number__df__main-content-strip-content-wrapper-width: 100%;
    --number__tp-tl__main-content-strip-content-wrapper-width: 100%;
    --number__tl-dt__main-content-strip-content-wrapper-width: 585px;
    --number__dt-ls__main-content-strip-content-wrapper-width: 585px;
    --number__df__tab-mainstrip-accordion-title-padding: 10px;
    --number__df__tab-mainstrip-accordion-content-padding: 30px 0 0;
    --number__df__tab-mainstrip-accordion-title-content-width: 0;
    --number__tp-tl__tab-mainstrip-tab-titles-wrapper-padding: 0;
    --number__tp-tl__tab-mainstrip-vertical-tab-titles-wrapper-width: 280px;
    --number__tp-tl__tab-mainstrip-vertical-tab-titles-wrapper-padding: 20px;
    --number__tp-tl__tab-mainstrip-accordion-title-padding: 10px;
    --number__tp-tl__tab-mainstrip-accordion-content-padding: 30px 0 0;
    --number__tp-tl__tab-mainstrip-horizontal-tab-titles-padding: 10px 15px;
    --number__tp-tl__tab-mainstrip-horizontal-tab-titles-margin: 0;
    --number__tp-tl__tab-mainstrip-vertical-tab-titles-padding: 12px 0;
    --number__tp-tl__tab-mainstrip-tab-content-wrapper-padding: 0;
    --number__tp-tl__tab-mainstrip-vertical-tab-content-wrapper-padding: 0;
    --number__tl-dt__tab-mainstrip-tab-titles-wrapper-padding: 0;
    --number__tl-dt__tab-mainstrip-vertical-tab-titles-wrapper-width: 280px;
    --number__tl-dt__tab-mainstrip-vertical-tab-titles-wrapper-padding: 20px;
    --number__tl-dt__tab-mainstrip-accordion-title-padding: 10px;
    --number__tl-dt__tab-mainstrip-accordion-content-padding: 40px 0 0;
    --number__tl-dt__tab-mainstrip-horizontal-tab-titles-padding: 10px 15px;
    --number__tl-dt__tab-mainstrip-horizontal-tab-titles-margin: 0;
    --number__tl-dt__tab-mainstrip-vertical-tab-titles-padding: 12px 0;
    --number__tl-dt__tab-mainstrip-tab-content-wrapper-padding: 0;
    --number__tl-dt__tab-mainstrip-vertical-tab-content-wrapper-padding: 0;
    --number__dt-ls__tab-mainstrip-tab-titles-wrapper-padding: 0;
    --number__dt-ls__tab-mainstrip-vertical-tab-titles-wrapper-width: 350px;
    --number__dt-ls__tab-mainstrip-vertical-tab-titles-wrapper-padding: 20px;
    --number__dt-ls__tab-mainstrip-accordion-title-padding: 10px;
    --number__dt-ls__tab-mainstrip-accordion-content-padding: 30px 0 0;
    --number__dt-ls__tab-mainstrip-horizontal-tab-titles-padding: 10px 15px;
    --number__dt-ls__tab-mainstrip-horizontal-tab-titles-margin: 0;
    --number__dt-ls__tab-mainstrip-vertical-tab-titles-padding: 12px 0;
    --number__dt-ls__tab-mainstrip-tab-content-wrapper-padding: 0;
    --number__dt-ls__tab-mainstrip-vertical-tab-content-wrapper-padding: 0;
    --number__df__form-main-strip-form-wrapper-width: 100%;
    --number__tp-tl__form-main-strip-form-wrapper-width: 100%;
    --number__tl-dt__form-main-strip-form-wrapper-width: 90%;
    --number__dt-ls__form-main-strip-form-wrapper-width: 80%
}
.ui-icon,svg:not(:root) {
    overflow: hidden
}

html {
    font-family: sans-serif;
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%
}

body {
    font-size: 16px;
    margin: 0
}

article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary {
    display: block
}
.pager-wrapper .pager-count,.pager-wrapper .slickNumber,.ui-helper-hidden,[hidden],template {
    display: none
}

a {
    background-color: transparent
}
b,optgroup,span.bold,strong {
    font-weight: 700
}
img {
    max-width: 100%;
    vertical-align: middle;
    border: 0
}
.container {
    position: relative;
    width: 100%;
    margin: 0 auto;
    padding: 0 20px;
    box-sizing: border-box;
    max-width: 1170px
}
.clearfix:after,.clearfix:before,.form-group:before {
    content: " ";
    display: table
}

.clearfix:after,.form-group:after,.ui-helper-clearfix:after {
    clear: both
}
.strip-row {
    margin-bottom: 75px
}
.list-style-none {
    list-style: none;
    padding: 0;
    margin: 0
}
[class*=" icon-"]:before,[class^=icon-]:before {
    font-family: icomoon!important;
    speak: none;
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale
}
.icon-i-39-e-mail-fill:before {
    content: "\e974"
}
.icon-i-45-facebook-circle-fill:before {
    content: "\e986"
}
.icon-i-55-instagram-02-fill:before {
    content: "\e9a4"
}
.icon-i-65-locate-place-fill:before {
    content: "\e9c2"
}
.icon-i-84-phone-call-fill:before {
    content: "\e9fb"
}
.icon-i-324-right-arrow-fill:before {
    content: "\ec43"
}
body,h1 {
    color: #212121
}
html {
    font-family: sans-serif
}

body {
    font-size: 16px;
    background-color: #fff;
    font-weight: 400
}

h1 {
    margin: 0 auto 40px
}

h2 {
    color: #616161;
    margin: 0 auto 38px
}

h3 {
    color: #757575;
    margin: 0 auto 35px
}
ol,p,table,ul {
    margin: 0 0 20px
}
.arrows-wrapper .slick-arrow,.link-option-1 {
    border-style: solid;
    box-sizing: border-box
}
a {
    transition: .4s ease-in-out
}

.strip-row {
    margin-bottom: 75px
}

.link-option-1 {
    border-width: 0 0 1px;
    padding: 0
}
.link-as-button-option-1,.link-as-button-option-2,.link-as-button-option-3,.primary-button,.secondary-button,button,button.primary-button,button.secondary-button {
    border-style: solid;
    border-width: 1px;
    padding: 6px 16px;
    box-sizing: border-box;
    display: inline-block
}

.pager-wrapper li,.primary-button,.secondary-button,button {
    -webkit-transition: .4s;
    -ms-transition: .4s;
    transition: .4s
}
.r2g-flex-xlist-sub-component.flex-with-rotator .rotatorElement .pager-wrapper ul,.r2g-header ul {
    list-style-type: none
}

.main-visual-default .slider-item:first-child,.no-js .r2g-xlist-accordion-sub-component .sub-item>.inner-wrapper,.r2g-contact-options a,.r2g-rotator-sub-component.pager-as-fraction .pager-wrapper .pager-count,.r2g-tabs-main-strip .tab-content-wrapper>li.active .next-level>ul>li.active>.accordion-content,.r2g-tabs-main-strip .tab-content-wrapper>li.active>.accordion-content,.r2g-tabs-main-strip:not(.tabs-initialized) .tab-content-wrapper>li:first-child .next-level>ul>li:first-child>.accordion-content,.r2g-tabs-main-strip:not(.tabs-initialized) .tab-content-wrapper>li:first-child>.accordion-content {
    display: block
}

.main-visual-default .slider-item .mv-item-video.hidden,.r2g-contact-options .sm-label,.r2g-flex-xlist-main-strip.masonry-grid.has-filter .filters .fb-checkbox-helper:before,.r2g-flex-xlist-sub-component.flex-with-rotator .rotatorElement .pager-wrapper .pager-count,.r2g-flex-xlist-sub-component.flex-with-rotator .rotatorElement .pager-wrapper .slickNumber,.r2g-footer-social-media.icon-only ul a span:not(.icon),.r2g-header .main-menu,.r2g-header .more-menu-wrapper .logo-wrapper .default-logo,.r2g-header .r2g-header-social-media h3,.r2g-header .top-bar .r2g-header-social-media li,.r2g-header .top-bar .r2g-top-bar-menu,.r2g-header .top-bar-wrapper>.r2g-header-social-media,.r2g-header-social-media.icon-only ul a span:not(.icon),.r2g-header.no-more-menu .menu-btn,.r2g-rotator-main-strip .xList-item:nth-of-type(n+2),.r2g-rotator-sub-component .pager-wrapper .slickNumber,.r2g-rotator-sub-component.pager-as-thumbs .pager-wrapper,.r2g-rotator-sub-component[data-mobile="1"] .xList-item:nth-of-type(n+2),.r2g-tabs-main-strip .tab-titles-wrapper .arrows-wrapper,.r2g-tabs-main-strip .tab-titles-wrapper .bottom-content,.r2g-tabs-main-strip .tab-titles-wrapper .intro-content,.r2g-tabs-main-strip .tab-titles-wrapper .tab-items-wrapper {
    display: none
}

.r2g-contact-options .icon,.r2g-footer-social-media .sm-item span {
    vertical-align: middle
}
.r2g-footer-social-media.horizontal ul li,.r2g-header-social-media.horizontal ul li {
    margin-left: 10px
}

.r2g-footer-social-media.horizontal ul li:first-child,.r2g-header .top-bar .r2g-header-sub-component:last-child,.r2g-header-social-media.horizontal ul li.item-1 {
    margin-left: 0
}
.r2g-footer-social-media ul a .icon,.r2g-header-social-media ul a .icon {
    padding-right: 6px
}
.r2g-header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: var(--number__df__header-height);
    z-index: 10;
    -webkit-transition: .4s;
    -ms-transition: .4s;
    transition: .4s
}
.r2g-header .container {
    padding: 0 20px;
    height: 100%;
    position: relative;
    box-sizing: border-box
}
.r2g-header .branding {
    width: var(--number__df__header-branding-width);
    height: var(--number__df__header-branding-height);
    margin: var(--number__df__header-branding-margin);
    position: relative;
    float: left;
    -webkit-transition: .4s;
    -ms-transition: .4s;
    transition: .4s
}
.r2g-header .branding .logo {
    display: block;
    vertical-align: top;
    height: 100%;
    width: 100%;
    line-height: 0
}

.r2g-header .branding img {
    -webkit-transition: opacity 1s ease-in-out;
    -ms-transition: opacity 1s ease-in-out;
    transition: opacity 1s ease-in-out
}

.r2g-header .branding .on-scroll-logo {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 1
}

.main-visual-default .play-video .image-wrapper img,.main-visual-load:before,.r2g-form-main-strip input[type=file],.r2g-header .branding .default-logo,.r2g-header .menu-btn.menu-close-btn .menu-line.line-two {
    opacity: 0
}

.r2g-header .top-bar {
    position: absolute;
    top: 50%;
    right: 60px;
    left: auto;
    margin-top: 2px;
    margin-right: 12px;
    line-height: 1;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%)
}

.r2g-header .top-bar .r2g-header-sub-component {
    display: inline-block;
    vertical-align: middle;
    margin: 0 0 0 12px
}

.r2g-header .header-bottom-bar {
    float: right;
    clear: right
}

.r2g-header .header-bottom-bar .primary-button {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    padding: 6px;
    height: auto;
    text-align: center;
    box-sizing: border-box;
    z-index: 1
}

.r2g-header .menu-btn {
    width: 40px;
    height: 40px;
    position: absolute;
    cursor: pointer;
    float: none;
    display: inline-block;
    vertical-align: middle;
    top: 50%;
    right: 20px;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%)
}

.r2g-header .menu-btn-inner-wrapper {
    width: 60%;
    height: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%)
}

.r2g-header .menu-line {
    display: block;
    width: 100%;
    border-top-width: 2px;
    border-top-style: solid;
    position: absolute;
    left: 0
}

.r2g-header .line-one.menu-line {
    top: 0
}

.r2g-header .line-two.menu-line {
    top: 9px;
    -webkit-transition: opacity .1s .5s;
    -ms-transition: opacity .1s .5s;
    transition: opacity .1s .5s
}

.r2g-header .line-three.menu-line {
    top: 18px
}
.r2g-header .menu-btn .menu-line.line-one,.r2g-header .menu-btn .menu-line.line-three {
    transition: top .5s,transform .5s .6s;
    -ms-transition: top .5s,-ms-transform .5s .6s
}
.r2g-header .header-wrapper a,.r2g-header .main-menu,.r2g-rotator-main-strip .slick-arrow,.r2g-rotator-main-strip .slick-arrow .line-one,.r2g-rotator-main-strip .slick-arrow .line-one:after,.r2g-rotator-sub-component .slick-arrow,.r2g-rotator-sub-component .slick-arrow .line-one,.r2g-rotator-sub-component .slick-arrow .line-one:after {
    -webkit-transition: .4s;
    -ms-transition: .4s;
    transition: .4s
}

.r2g-header ul {
    margin: 0;
    padding: 0
}

.r2g-header .more-menu-wrapper {
    display: block;
    position: fixed;
    text-align: left;
    top: var(--number__df__header-more-menu-top);
    z-index: 1;
    width: var(--number__df__header-more-menu-width);
    height: calc(100% - var(--number__df__header-more-menu-top));
    right: 0;
    padding: var(--number__df__header-more-menu-padding);
    pointer-events: none;
    opacity: 0;
    box-sizing: border-box;
    -webkit-transition: .4s;
    -ms-transition: .4s;
    transition: .4s
}
.r2g-header .more-menu-wrapper .logo-wrapper {
    margin-bottom: 20px;
    display: none
}

.r2g-header .more-menu nav li {
    padding-left: 0;
    margin: 0;
    width: auto;
    height: auto
}
.r2g-header .more-menu nav li a {
    width: auto;
    box-sizing: border-box;
    padding: 10px 0;
    display: inline-block
}
.default-slogan-left .main-visual-slogan-wrapper,.r2g-contact-details.text-align-left,.r2g-content-main-strip.text-align-left *,.r2g-flex-xlist-main-strip.text-align-left>.container>.intro-content,.r2g-flex-xlist-sub-component.text-align-left>.intro-content,.r2g-flex-xlist-sub-xlist.text-align-left>.intro-content,.r2g-footer-menu.text-align-left,.r2g-footer-social-media.text-align-left,.r2g-rotator-main-strip.text-align-left>.container>.content-wrapper,.r2g-rotator-main-strip.text-align-left>.container>.intro-content,.r2g-rotator-sub-component.text-align-left>.container>.content-wrapper,.r2g-rotator-sub-component.text-align-left>.container>.intro-content,.r2g-tabs-main-strip.text-align-left>.tabs-wrapper>.container>.intro-content,.r2g-xbox-main-strip.text-align-left .flex-container,.r2g-xbox-main-strip.text-align-left .intro-content,.r2g-xbox-sub-component.text-align-left .content-wrapper,.r2g-xbox-sub-component.text-align-left .intro-content,.r2g-xlist-accordion-sub-component.text-align-left>.intro-content,.text-align-left.r2g-content-sub *,.text-align-left.r2g-form-footer-component .intro-content,.text-align-left.r2g-form-main-strip .intro-content {
    text-align: left
}

.default-slogan-center .main-visual-slogan-wrapper,.r2g-contact-details.text-align-center,.r2g-content-main-strip.text-align-center *,.r2g-flex-xlist-main-strip.text-align-center>.container>.intro-content,.r2g-flex-xlist-sub-component.flex-with-rotator .rotatorElement .pager-wrapper,.r2g-flex-xlist-sub-component.text-align-center>.intro-content,.r2g-flex-xlist-sub-xlist.text-align-center>.intro-content,.r2g-footer-menu.text-align-center,.r2g-footer-social-media.text-align-center,.r2g-rotator-main-strip .pager-wrapper,.r2g-rotator-main-strip.text-align-center>.container>.content-wrapper,.r2g-rotator-main-strip.text-align-center>.container>.intro-content,.r2g-rotator-sub-component .rotatorElement .pager-wrapper,.r2g-rotator-sub-component.text-align-center>.container>.content-wrapper,.r2g-rotator-sub-component.text-align-center>.container>.intro-content,.r2g-tabs-main-strip.text-align-center>.tabs-wrapper>.container>.intro-content,.r2g-xbox-main-strip.text-align-center .flex-container,.r2g-xbox-main-strip.text-align-center .intro-content,.r2g-xbox-sub-component.text-align-center .content-wrapper,.r2g-xbox-sub-component.text-align-center .intro-content,.r2g-xlist-accordion-sub-component.text-align-center>.intro-content,.text-align-center.r2g-content-sub *,.text-align-center.r2g-form-footer-component .intro-content,.text-align-center.r2g-form-main-strip .intro-content {
    text-align: center
}
.r2g-contact-details,.r2g-footer-menu,.r2g-tabs-main-strip .select-box-wrapper,.r2g-tabs-main-strip .select-box-wrapper select {
    width: 100%
}

.r2g-footer-menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-flow: row wrap;
    justify-content: space-between;
    width: 100%
}

.r2g-footer-social-media ul,.r2g-xbox-main-strip .xbox-wrapper {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex
}

.r2g-footer-menu ul li {
    position: relative;
    z-index: 1;
    width: 100%;
    padding: 6px 0
}
.r2g-footer-social-media ul {
    display: flex;
    list-style: none;
    position: relative;
    z-index: 1;
    margin: 0;
    padding: 0;
    flex-flow: column wrap
}

.r2g-footer-social-media.horizontal ul {
    flex-flow: row wrap
}

.r2g-footer-social-media ul li {
    position: relative;
    z-index: 1;
    padding: 0 0 8px
}

.r2g-footer-social-media ul a {
    position: relative;
    z-index: 1;
    display: inline-block
}

.r2g-flex-xlist-main-strip.flex-justify-center .flex-xlist>.xList-items,.r2g-flex-xlist-sub-xlist.flex-justify-center .flex-xlist>.xList-items,.r2g-footer-social-media.horizontal.text-align-center ul {
    justify-content: center
}
.r2g-rotator-main-strip.pager-as-bullets .rotatorElement .rotator-wrapper,.r2g-rotator-main-strip.pager-as-fraction .rotatorElement .rotator-wrapper,.r2g-rotator-main-strip.pager-as-thumbs .rotatorElement .rotator-wrapper,footer .cms-form .form-group {
    margin-bottom: 20px
}
.copyright-bar p:last-child,.main-visual-default .slick-dots,.main-visual-default .slider-item,.main-visual-default .slider-wrapper,.main-visual-default .slogan,.main-visual-default .slogan-read-more,.r2g-content-main-strip .content-wrapper :last-child,.r2g-content-sub .content-wrapper :last-child,.r2g-form-main-strip .form-group:last-child,.r2g-xbox-main-strip .content-wrapper :last-child,.r2g-xbox-sub-component .content-wrapper :last-child,.r2g-xlist-accordion-sub-component .sub-item:not(.active):last-child>.accordion-title,footer .cms-form .form-group:last-child {
    margin-bottom: 0
}
.r2g-footer {
    border-width: var(--number__df__footer-border-width);
    border-style: solid;
    padding: var(--number__df__footer-padding)
}

.r2g-footer .footer-items {
    list-style: none;
    width: var(--number__df__footer-items-wrapper-width);
    padding: var(--number__df__footer-items-wrapper-padding);
    margin: var(--number__df__footer-items-wrapper-margin);
    border-width: var(--number__df__footer-items-border-width);
    border-top-style: solid
}

.r2g-footer .footer-items .footer-item {
    padding: 0 0 20px;
    border: var(--number__df__footer-item-border-width);
    border-top-style: solid;
    width: 100%;
    box-sizing: border-box;
    float: left
}

.r2g-footer .footer-items .item-4 {
    padding-bottom: 0
}

.copyright-bar {
    border-width: var(--number__df__footer-copyright-border-width);
    border-style: solid;
    padding: var(--number__df__footer-copyright-padding)
}

.copyright-bar p {
    margin-top: 0;
    text-align: center
}

.main-visual-default,.main-visual-default .slick-list {
    width: 100%;
    height: 100%;
    position: relative;
    z-index: 1
}

.main-visual-default .main-visual-slogan-wrapper {
    border-style: solid;
    box-sizing: border-box;
    padding: var(--number__df__main-visual-slogan-wrapper-padding);
    border-width: var(--number__df__main-visual-slogan-wrapper-border-width)
}

.main-visual-default .container {
    padding: var(--number__df__main-visual-slogan-wrapper-container-padding);
    box-sizing: border-box
}
.default-slogan-center .main-visual-default .container {
    border-width: 0
}
.main-visual-default .main-visual-arrow-wrapper {
    display: none;
    position: absolute;
    top: 50%;
    height: 0;
    width: calc(100% - 40px);
    margin-top: -10px;
    padding: 0 20px;
    -webkit-transform: translate(0,-50%);
    -ms-transform: translate(0,-50%);
    transform: translate(0,-50%)
}

.main-visual-default .slider-navigation {
    border-style: solid;
    margin: 0;
    position: relative;
    box-sizing: border-box;
    cursor: pointer;
    border-radius: 0;
    padding: 0;
    -webkit-transition: .4s;
    -ms-transition: .4s;
    transition: .4s
}

.main-visual-default .main-visual-arrow-wrapper .prev,.r2g-rotator-main-strip .rotator-wrapper>.xList-item {
    float: left
}

.main-visual-default .main-visual-arrow-wrapper .next {
    float: right
}
.main-visual-default .main-visual-pager-wrapper {
    position: absolute;
    bottom: var(--number__df__main-visual-pager-wrapper-bottom);
    width: 100%;
    left: 0;
    z-index: 1;
    text-align: center
}

.main-visual-default .main-visual-pager-wrapper .slick-dots {
    margin: 0;
    padding: 0;
    list-style: none
}

.main-visual-default .main-visual-pager-wrapper li {
    display: inline-block;
    width: var(--number__df__main-visual-pager-width);
    height: var(--number__df__main-visual-pager-height);
    border-radius: var(--number__df__main-visual-pager-border-radius);
    margin: var(--number__df__main-visual-pager-margin);
    cursor: pointer;
    border-width: var(--number__df__main-visual-pager-border-width);
    border-style: solid;
    -webkit-transition: .4s;
    -ms-transition: .4s;
    transition: .4s
}

.main-visual-default .main-visual-pager-wrapper .slick-active,.r2g-rotator-main-strip .pager-wrapper .slick-active,.r2g-rotator-sub-component .pager-wrapper .slick-active,.r2g-xlist-accordion-sub-component .sub-item.active>.accordion-title,.r2g-xlist-accordion-sub-component.single-active .sub-item.active>.accordion-title {
    cursor: default
}
.main-visual-default .slick-list,.r2g-xbox-main-strip .container,.r2g-xbox-main-strip .xbox-wrapper,.r2g-xbox-sub-component,.r2g-xbox-sub-component .image-wrapper,.r2g-xbox-sub-component .xbox-wrapper {
    height: 100%
}
.default-banner-full-height .image-wrapper {
    background-repeat: no-repeat;
    background-position: center bottom;
    background-size: cover;
    position: relative;
    padding-top: 0;
    overflow: hidden;
    box-sizing: border-box
}

.default-banner-full-height .image-wrapper img {
    object-fit: cover;
    width: 100%;
    height: 100%;
    object-position: center bottom
}
.main-visual-default .slider-item {
    display: none;
    vertical-align: top;
    position: relative
}
.main-visual-arrow-wrapper {
    -webkit-transition: opacity 1s cubic-bezier(.3, 0, 0, 1);
    -ms-transition: opacity 1s cubic-bezier(.3, 0, 0, 1);
    transition: opacity 1s cubic-bezier(.3, 0, 0, 1);
    opacity: 1
}
.r2g-breadcrumb,.r2g-breadcrumb .breadcrumb-nav,.r2g-breadcrumb .container,.r2g-content-main-strip,.r2g-content-main-strip .container,.r2g-content-main-strip .content-wrapper,.r2g-content-sub,.r2g-content-sub .content-wrapper,.r2g-form-main-strip,.r2g-form-main-strip .container,.r2g-form-main-strip .form-wrapper,.r2g-form-main-strip>.container>.intro-content,.r2g-rotator-sub-component,.r2g-rotator-sub-component .bottom-content,.r2g-rotator-sub-component .intro-content,.r2g-rotator-sub-component .rotator-wrapper,.r2g-rotator-sub-component .rotatorElement .slick-slide,.r2g-tabs-main-strip,.r2g-tabs-main-strip .bottom-content,.r2g-tabs-main-strip .container,.r2g-tabs-main-strip .tab-content-wrapper .accordion-content,.r2g-tabs-main-strip .tab-content-wrapper .accordion-title,.r2g-tabs-main-strip .tabs-inner-wrapper,.r2g-tabs-main-strip>.container>.intro-content,.r2g-xbox-main-strip,.r2g-xbox-main-strip .container,.r2g-xbox-main-strip .content-wrapper,.r2g-xbox-main-strip .flex-container,.r2g-xbox-main-strip .image-wrapper,.r2g-xbox-main-strip .intro-content,.r2g-xbox-main-strip .xbox-wrapper,.r2g-xbox-sub-component,.r2g-xbox-sub-component .content-wrapper,.r2g-xbox-sub-component .flex-container,.r2g-xbox-sub-component .image-wrapper,.r2g-xbox-sub-component .intro-content,.r2g-xbox-sub-component .xbox-wrapper,.r2g-xlist-accordion-sub-component,.r2g-xlist-accordion-sub-component .intro-content,.r2g-xlist-accordion-sub-component .sub-item>.accordion-title,.r2g-xlist-accordion-sub-component .sub-item>.inner-wrapper {
    border-style: solid;
    box-sizing: border-box
}

.r2g-xbox-main-strip {
    border-width: var(--number__df__xbox-main-strip-border-width)
}

.r2g-xbox-main-strip .container {
    border-width: var(--number__df__xbox-main-strip-container-border-width)
}

.r2g-xbox-main-strip .intro-content {
    border-width: var(--number__df__xbox-main-strip-intro-content-border-width)
}

.r2g-xbox-main-strip .xbox-wrapper {
    display: flex;
    align-items: stretch;
    flex-flow: column;
    position: relative;
    border-width: var(--number__df__xbox-main-strip-xbox-wrapper-border-width)
}

.r2g-xbox-main-strip .image-wrapper {
    width: var(--number__df__xbox-main-strip-image-wrapper-width);
    border-width: var(--number__df__xbox-main-strip-image-wrapper-border-width)
}
.r2g-xbox-sub-component {
    display: flex;
    flex-flow: column;
    border-width: var(--number__df__xbox-sub-border-width)
}

.r2g-xbox-sub-component .intro-content {
    border-width: var(--number__df__xbox-sub-intro-wrapper-border-width)
}

.r2g-xbox-sub-component .xbox-wrapper {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    align-items: stretch;
    flex-flow: column;
    position: relative;
    border-width: var(--number__df__xbox-sub-xbox-wrapper-border-width)
}

.r2g-xbox-sub-component .image-wrapper {
    border-width: var(--number__df__xbox-sub-image-wrapper-border-width)
}

.r2g-xbox-sub-component .image-wrapper img {
    max-width: none;
    width: 100%;
    height: 100%;
    object-fit: cover
}

.r2g-xbox-sub-component .flex-container {
    display: flex;
    flex-flow: row wrap;
    align-items: center;
    justify-content: start;
    border-width: var(--number__df__xbox-sub-flex-wrapper-border-width);
    padding: var(--number__df__xbox-sub-flex-wrapper-padding)
}

.r2g-xbox-sub-component .content-wrapper {
    width: 100%;
    border-width: var(--number__df__xbox-sub-content-wrapper-border-width)
}

.r2g-flex-xlist-main-strip,.r2g-flex-xlist-main-strip .bottom-content,.r2g-flex-xlist-main-strip .container,.r2g-flex-xlist-main-strip .intro-content,.r2g-flex-xlist-main-strip .xlist-strip,.r2g-flex-xlist-sub-xlist,.r2g-flex-xlist-sub-xlist .bottom-content,.r2g-flex-xlist-sub-xlist .intro-content,.r2g-flex-xlist-sub-xlist .xlist-sub,.r2g-rotator-main-strip,.r2g-rotator-main-strip .bottom-content,.r2g-rotator-main-strip .container,.r2g-rotator-main-strip .intro-content,.r2g-rotator-main-strip .rotator-wrapper,.r2g-rotator-main-strip .thumb-wrapper .slick-current .rotatorThumbs,.r2g-rotator-sub-component .thumb-wrapper .slick-current .rotatorThumbs {
    border-style: solid
}

.r2g-flex-xlist-main-strip {
    border-width: var(--number__df__r2g-flex-xlist-main-strip-border-width)
}

.r2g-flex-xlist-main-strip .container {
    border-width: var(--number__df__r2g-flex-xlist-main-strip-container-border-width)
}

.r2g-flex-xlist-main-strip>.container>.intro-content {
    border-width: var(--number__df__r2g-flex-xlist-main-strip-intro-content-border-width)
}

.r2g-flex-xlist-main-strip .xlist-strip {
    border-width: var(--number__df__r2g-flex-xlist-main-strip-xlist-wrapper-border-width)
}

.r2g-flex-xlist-main-strip .flex-xlist>.xList-items,.r2g-flex-xlist-sub-xlist .flex-xlist>.xList-items {
    box-sizing: border-box;
    display: flex;
    flex-flow: row wrap
}

.r2g-flex-xlist-main-strip.flex-align-top .flex-xlist>.xList-items,.r2g-flex-xlist-sub-xlist.flex-align-top .flex-xlist>.xList-items {
    align-items: start
}
.r2g-flex-xlist-main-strip .xlist-strip>.strip-xlist .xList-item,.r2g-flex-xlist-sub-xlist .xlist-sub>.sub-xlist .xList-item {
    box-sizing: border-box;
    width: 100%;
    margin: 0
}

.r2g-flex-xlist-main-strip.with-gap .xlist-strip>.strip-xlist .xList-item {
    margin: 0 0 var(--number__df__r2g-flex-xlist-main-strip-xlist-item-gap)
}
.r2g-flex-xlist-sub-xlist {
    border-width: var(--number__df__r2g-flex-xlist-sub-border-width)
}

.r2g-flex-xlist-sub-xlist .xlist-sub {
    border-width: var(--number__df__r2g-flex-xlist-sub-xlist-wrapper-border-width)
}
.r2g-rotator-main-strip {
    border-width: var(--number__df__rotator-main-strip-border-width)
}

.r2g-rotator-main-strip .container {
    border-width: var(--number__df__rotator-main-strip-container-border-width)
}

.r2g-rotator-main-strip .intro-content {
    border-width: var(--number__df__rotator-main-strip-intro-content-border-width)
}

.r2g-flex-xlist-sub-component.flex-with-rotator .rotatorElement,.r2g-rotator-main-strip .rotatorElement,.r2g-rotator-sub-component .rotatorElement {
    position: relative;
    z-index: 1
}

.r2g-rotator-main-strip .rotatorElement .rotator-wrapper {
    border-width: var(--number__df__rotator-main-strip-rotator-wrapper-border-width);
    margin-left: calc(-(var(--number__df__rotator-main-strip-slick-slide-margin-left)));
    margin-right:calc(-(var(--number__df__rotator-main-strip-slick-slide-margin-right)))
}
.r2g-rotator-main-strip .rotator-wrapper .slick-slide {
    margin-left: var(--number__df__rotator-main-strip-slick-slide-margin-left);
    margin-right: var(--number__df__rotator-main-strip-slick-slide-margin-right)
}
.r2g-rotator-main-strip .arrows-wrapper {
    position: absolute;
    z-index: 3;
    width: 150px;
    bottom: 12px;
    margin: auto;
    left: 0;
    right: 0
}
.r2g-rotator-main-strip .pager-wrapper .pager-count {
    display: inline-block
}

.r2g-rotator-main-strip .thumb-wrapper {
    position: relative;
    height: 0;
    overflow: hidden
}
.r2g-rotator-main-strip .bottom-content {
    border-width: var(--number__df__rotator-main-strip-bottom-content-border-width)
}

.r2g-footer-xbox .xbox-wrapper {
    display: flex;
    flex-flow: row wrap
}

.r2g-footer-xbox .flex-container {
    box-sizing: border-box;
    padding: 30px 0 0
}
.r2g-content-main-strip {
    border-width: var(--number__df__main-content-strip-border-width)
}

.r2g-content-main-strip .container {
    border-width: var(--number__df__main-content-strip-container-border-width)
}

.r2g-content-main-strip .content-wrapper {
    border-width: var(--number__df__main-content-strip-content-wrapper-border-width)
}

.r2g-content-main-strip.text-align-center .content-wrapper {
    width: var(--number__df__main-content-strip-content-wrapper-width);
    margin: 0 auto
}
.slick-slide {
    outline: 0
}
:root {
    --color__default-text-color: #4b4342;
    --color__on-bg-text-color: #fff;
    --color__default-background-color: #fff;
    --color__primary-background-color: #0a142d;
    --color__secondary-background-color: #4b4342;
    --color__site-background-color: var(--color__default-background-color);
    --color__df__main-strip-background-color: transparent;
    --number__df__strip-row-margin: 0 auto 50px;
    --number__df__rotator-arrow-border-width: 0;
    --number__df__rotator-arrow-border-radius: 100%;
    --color__df__rotator-arrow-border-color: #4b4342;
    --color__df__rotator-arrow-background-color: #4b4342;
    --color__df__rotator-arrow-color: #ffffff;
    --number__df__rotator-pager-border-width: 2px;
    --number__df__rotator-pager-width: 10px;
    --number__df__rotator-pager-height: 10px;
    --number__df__rotator-pager-margin: 0 6px;
    --color__df__rotator-pager-border-color: rgba(250,250,250,0.6);
    --color__df__rotator-active-pager-border-color: #ffffff;
    --color__df__rotator-active-pager-background-color: #ffffff;
    --number__df__close-button-padding: 0 5px;
    --number__df__close-button-border-width: 1px;
    --color__df__close-button-icon-color: #fff;
    --color__df__close-button-border-color: #fff;
    --color__df__close-button-background-color: rgba(0,0,0,0.2);
    --number__df__heading-one-margin: 0 auto 35px;
    --number__df__heading-two-margin: 0 auto 30px;
    --number__df__heading-three-margin: 0 auto 25px;
    --number__df__heading-four-margin: 0 auto 25px;
    --number__df__heading-five-margin: 0 auto 25px;
    --number__df__heading-six-margin: 0 auto 25px;
    --number__link-option-one-padding: 0;
    --color__link-option-one-border-color: transparent;
    --color__link-option-one-background-color: transparent;
    --color__on-hover-link-option-one-border-color: transparent;
    --color__on-hover-link-option-one-background-color: transparent;
    --number__link-option-two-padding: 0 20px 0 0;
    --color__link-option-two-border-color: transparent;
    --color__link-option-two-background-color: transparent;
    --color__on-hover-link-option-two-border-color: transparent;
    --color__on-hover-link-option-two-background-color: transparent;
    --number__link-option-three-padding: 0 25px 0 0;
    --color__link-option-three-border-color: transparent;
    --color__link-option-three-background-color: transparent;
    --color__on-hover-link-option-three-border-color: transparent;
    --color__on-hover-link-option-three-background-color: transparent;
    --number__link-as-button-option-one-padding: 15px 25px;
    --number__link-as-button-option-one-border-width: 1px;
    --number__link-as-button-option-one-border-radius: 5px;
    --color__link-as-button-option-one-border-color: #4b4342;
    --color__link-as-button-option-one-background-color: #4b4342;
    --color__on-hover-link-as-button-option-one-border-color: #7a3548;
    --color__on-hover-link-as-button-option-one-background-color: #7a3548;
    --number__link-as-button-option-two-padding: 20px 30px;
    --number__link-as-button-option-two-border-width: 1px;
    --number__link-as-button-option-two-border-radius: 5px;
    --color__link-as-button-option-two-border-color: #ffffff;
    --color__link-as-button-option-two-background-color: #ffffff;
    --color__on-hover-link-as-button-option-two-border-color: #0379BF;
    --color__on-hover-link-as-button-option-two-background-color: #0379BF;
    --number__link-as-button-option-three-padding: 8px 18px;
    --number__link-as-button-option-three-border-width: 1px;
    --number__link-as-button-option-three-border-radius: 0;
    --color__link-as-button-option-three-border-color: #c2a945;
    --color__link-as-button-option-three-background-color: transparent;
    --color__on-hover-link-as-button-option-three-border-color: #c2a945;
    --color__on-hover-link-as-button-option-three-background-color: #c2a945;
    --color__table-row-background-color: #fffbeb;
    --number__df__input-height: 60px;
    --number__df__textarea-height: 38px;
    --number__df__input-padding: 6px 10px;
    --number__df__input-border-width: 1px;
    --number__df__input-border-radius: 10px;
    --color__df__input-background-color: transparent;
    --color__df__input-border-color: #d1d1d1;
    --color__df__input-icon-color: #4b4342;
    --color__df__input-on-focus-border-color: #d1d1d1;
    --number__df__form-main-strip-border-width: 0;
    --number__df__form-main-strip-container-border-width: 0;
    --number__df__form-main-strip-intro-content-border-width: 0;
    --number__df__form-main-strip-form-wrapper-border-width: 0;
    --number__df__form-main-strip-form-group-border-width: 0;
    --color__df__form-main-strip-border-color: transparent;
    --color__df__form-main-strip-background-color: transparent;
    --color__df__form-main-strip-container-border-color: transparent;
    --color__df__form-main-strip-container-background-color: transparent;
    --color__df__form-main-strip-intro-content-border-color: transparent;
    --color__df__form-main-strip-intro-content-background-color: transparent;
    --color__df__form-main-strip-form-wrapper-border-color: transparent;
    --color__df__form-main-strip-form-wrapper-background-color: transparent;
    --color__df__form-main-strip-form-group-border-color: transparent;
    --color__df__form-main-strip-form-group-background-color: transparent;
    --color__df__datepicker-border-color: #e3e3e2;
    --color__df__datepicker-background-color: #e3e3e2;
    --color__df__datepicker-table-body-background-color: #fff;
    --color__df__datepicker-table-heading-color: #fff;
    --number__df__datepicker-default-padding: 5px 8px;
    --number__df__datepicker-default-border-radius: 100%;
    --number__df__datepicker-default-border-width: 1px;
    --color__df__datepicker-default-border-color: transparent;
    --color__df__datepicker-default-color: #383838;
    --color__df__datepicker-default-background-color: transparent;
    --color__df__datepicker-disabled-border-color: transparent;
    --color__df__datepicker-disabled-color: #a6a6a6;
    --color__df__datepicker-disabled-background-color: transparent;
    --color__df__datepicker-table-heading-background-color: #c2a945;
    --color__df__datepicker-today-background-color: #007ea7;
    --color__df__datepicker-today-color: #fff;
    --color__df__datepicker-highlight-background-color: #00a8e8;
    --color__df__datepicker-highlight-color: #fff;
    --number__df__header-height: 62px;
    --number__df__header-fixed-height: 62px;
    --number__df__header-fixed-shadow-border: 0px 10px 30px;
    --number__df__header-branding-width: 60px;
    --number__df__header-branding-height: auto;
    --number__df__header-fixed-branding-width: 60px;
    --number__df__header-fixed-branding-height: auto;
    --number__df__header-branding-margin: 1px auto;
    --number__df__header-more-menu-top: 62px;
    --number__df__header-bottom-bar-primary-button-padding: 15px 25px;
    --color__df__header-background-color: var(--color__default-background-color);
    --color__df__header-fixed-background-color: var(--color__default-background-color);
    --color__df__header-fixed-shadow-color: rgba(0, 23, 31, 0.3);
    --color__df__header-main-navigation-active-border-color: #4b4342;
    --color__df__header-fixed-main-navigation-active-border-color: #4b4342;
    --color__df__header-main-navigation-drop-down-arrow-color: #fff;
    --color__df__header-fixed-main-navigation-drop-down-arrow-color: #333;
    --color__df__header-main-navigation-active-drop-down-arrow-color: var(--color__df__header-main-navigation-active-border-color);
    --color__df__header-fixed-main-navigation-active-drop-down-arrow-color: var(--color__df__header-fixed-main-navigation-active-border-color);
    --color__df__header-submenu-background-color: rgba(0,0,0,0.8);
    --color__df__header-fixed-submenu-background-color: #fff;
    --color__df__header-submenu-border-color: rgba(0,0,0,0.8);
    --color__df__header-fixed-submenu-border-color: #fff;
    --color__df__header-bottom-bar-primary-button-border-color: #4b4342;
    --color__df__header-bottom-bar-primary-button-background-color: #4b4342;
    --color__df__header-bottom-bar-primary-button-on-hover-border-color: #7a3548;
    --color__df__header-bottom-bar-primary-button-on-hover-background-color: #7a3548;
    --color__df__header-hamburger-icon-color: #333;
    --color__df__header-fixed-hamburger-icon-color: #333;
    --color__df__header-more-menu-close-icon-color: #333;
    --color__df__header-more-menu-background-color: var(--color__secondary-background-color);
    --color__df__header-more-menu-border-color: var(--color__secondary-background-color);
    --color__df__header-more-menu-drop-down-arrow-color: #333;
    --color__df__header-more-menu-active-drop-down-arrow-color: #c2a945;
    --color__df__header-more-menu-scrollbar-dragger-background-color: rgba(0, 0, 0, 0.6);
    --color__df__header-more-menu-scrollbar-background-color: rgba(0,0,0,.4);
    --number__df__main-visual-margin: 62px 0 30px;
    --number__df__main-visual-slogan-wrapper-border-width: 0;
    --number__df__main-visual-slogan-wrapper-container-border-width: 0;
    --number__df__main-visual-pager-border-width: 0;
    --number__df__main-visual-pager-border-radius: 10px;
    --number__df__main-visual-pager-width: 20px;
    --number__df__main-visual-pager-height: 4px;
    --number__df__main-visual-pager-margin: 0 2px;
    --color__df__main-visual-video-icon-color: #fff;
    --color__df__main-visual-slogan-wrapper-border-color: transparent;
    --color__df__main-visual-slogan-wrapper-background-color: #46463e;
    --color__df__main-visual-container-border-color: transparent;
    --color__df__main-visual-container-background-color: transparent;
    --color__df__main-visual-arrow-color: #fff;
    --color__df__main-visual-arrow-border-color: transparent;
    --color__df__main-visual-arrow-background-color: transparent;
    --color__df__main-visual-pager-border-color: transparent;
    --color__df__main-visual-pager-background-color: rgba(255, 255, 255, 1);
    --color__df__main-visual-active-pager-border-color: transparent;
    --color__df__main-visual-active-pager-background-color: #f98193cc;
    --number__df__breadcrumb-border-width: 0;
    --number__df__breadcrumb-margin: 0 0 30px;
    --number__df__breadcrumb-container-border-width: 0;
    --number__df__breadcrumb-breadcrumb-wrapper-border-width: 0;
    --color__df__breadcrumb-border-color: transparent;
    --color__df__breadcrumb-background-color: transparent;
    --color__df__breadcrumb-container-border-color: transparent;
    --color__df__breadcrumb-container-background-color: transparent;
    --color__df__breadcrumb-breadcrumb-wrapper-border-color: transparent;
    --color__df__breadcrumb-breadcrumb-wrapper-background-color: transparent;
    --number__df__xbox-main-strip-border-width: 0;
    --number__df__xbox-main-strip-container-border-width: 0;
    --number__df__xbox-main-strip-intro-content-border-width: 0;
    --number__df__xbox-main-strip-xbox-wrapper-border-width: 0;
    --number__df__xbox-main-strip-image-wrapper-border-width: 0;
    --number__df__xbox-main-strip-flex-wrapper-border-width: 0;
    --number__df__xbox-main-strip-content-wrapper-border-width: 0;
    --color__df__xbox-main-strip-background-color: transparent;
    --color__df__xbox-main-strip-border-color: transparent;
    --color__df__xbox-main-strip-container-background-color: transparent;
    --color__df__xbox-main-strip-container-border-color: transparent;
    --color__df__xbox-main-strip-intro-content-background-color: transparent;
    --color__df__xbox-main-strip-intro-content-border-color: transparent;
    --color__df__xbox-main-strip-xbox-wrapper-background-color: transparent;
    --color__df__xbox-main-strip-xbox-wrapper-border-color: transparent;
    --color__df__xbox-main-strip-image-wrapper-background-color: transparent;
    --color__df__xbox-main-strip-image-wrapper-border-color: transparent;
    --color__df__xbox-main-strip-flex-wrapper-background-color: transparent;
    --color__df__xbox-main-strip-flex-wrapper-border-color: var(--color__primary-background-color);
    --color__df__xbox-main-strip-content-wrapper-background-color: transparent;
    --color__df__xbox-main-strip-content-wrapper-border-color: transparent;
    --number__df__xbox-sub-border-width: 0;
    --number__df__xbox-sub-intro-wrapper-border-width: 0;
    --number__df__xbox-sub-xbox-wrapper-border-width: 0;
    --number__df__xbox-sub-image-wrapper-border-width: 0;
    --number__df__xbox-sub-flex-wrapper-border-width: 0;
    --number__df__xbox-sub-content-wrapper-border-width: 0;
    --color__df__xbox-sub-border-color: transparent;
    --color__df__xbox-sub-background-color: transparent;
    --color__df__xbox-sub-intro-wrapper-border-color: transparent;
    --color__df__xbox-sub-intro-wrapper-background-color: transparent;
    --color__df__xbox-sub-xbox-wrapper-border-color: transparent;
    --color__df__xbox-sub-xbox-wrapper-background-color: transparent;
    --color__df__xbox-sub-image-wrapper-border-color: transparent;
    --color__df__xbox-sub-image-wrapper-background-color: transparent;
    --color__df__xbox-sub-flex-wrapper-border-color: transparent;
    --color__df__xbox-sub-flex-wrapper-background-color: transparent;
    --color__df__xbox-sub-content-wrapper-border-color: transparent;
    --color__df__xbox-sub-content-wrapper-background-color: transparent;
    --number__df__main-content-strip-border-width: 0;
    --number__df__main-content-strip-container-border-width: 0;
    --number__df__main-content-strip-content-wrapper-border-width: 0;
    --color__df__main-content-strip-border-color: transparent;
    --color__df__main-content-strip-background-color: transparent;
    --color__df__main-content-strip-container-border-color: transparent;
    --color__df__main-content-strip-container-background-color: transparent;
    --color__df__main-content-strip-content-wrapper-border-color: transparent;
    --color__df__main-content-strip-content-wrapper-background-color: transparent;
    --number__df__rotator-main-strip-border-width: 0;
    --number__df__rotator-main-strip-container-border-width: 0;
    --number__df__rotator-main-strip-intro-content-border-width: 0;
    --number__df__rotator-main-strip-rotator-wrapper-border-width: 0;
    --number__df__rotator-main-strip-bottom-content-border-width: 0;
    --color__df__rotator-main-strip-border-color: transparent;
    --color__df__rotator-main-strip-background-color: transparent;
    --color__df__rotator-main-strip-container-border-color: transparent;
    --color__df__rotator-main-strip-container-background-color: transparent;
    --color__df__rotator-main-strip-intro-content-border-color: transparent;
    --color__df__rotator-main-strip-intro-content-background-color: transparent;
    --color__df__rotator-main-strip-rotator-wrapper-border-color: transparent;
    --color__df__rotator-main-strip-rotator-wrapper-background-color: transparent;
    --color__df__rotator-main-strip-bottom-content-border-color: transparent;
    --color__df__rotator-main-strip-bottom-content-background-color: transparent;
    --number__df__tab-mainstrip-border-width: 0;
    --number__df__tab-mainstrip-container-border-width: 0;
    --number__df__tab-mainstrip-intro-content-border-width: 0;
    --number__df__tab-mainstrip-tabs-wrapper-border-width: 0;
    --number__df__tab-mainstrip-accordion-title-border-width: 0 0 1px;
    --number__df__tab-mainstrip-accordion-title-content-border-width: 0;
    --number__df__tab-mainstrip-bottom-content-border-width: 0;
    --color__df__tab-mainstrip-border-color: transparent;
    --color__df__tab-mainstrip-background-color: transparent;
    --color__df__tab-mainstrip-container-border-color: transparent;
    --color__df__tab-mainstrip-container-background-color: transparent;
    --color__df__tab-mainstrip-intro-content-border-color: transparent;
    --color__df__tab-mainstrip-intro-content-background-color: transparent;
    --color__df__tab-mainstrip-tabs-wrapper-border-color: transparent;
    --color__df__tab-mainstrip-tabs-wrapper-background-color: transparent;
    --color__df__tab-mainstrip-accordion-title-border-color: #7a3548;
    --color__df__tab-mainstrip-accordion-title-background-color: transparent;
    --color__df__tab-mainstrip-accordion-title-content-border-color: transparent;
    --color__df__tab-mainstrip-accordion-title-content-background-color: transparent;
    --color__df__tab-mainstrip-bottom-content-border-color: transparent;
    --color__df__tab-mainstrip-bottom-content-background-color: transparent;
    --number__df__r2g-flex-xlist-main-strip-border-width: 0;
    --number__df__r2g-flex-xlist-main-strip-container-border-width: 0;
    --number__df__r2g-flex-xlist-main-strip-intro-content-border-width: 0;
    --number__df__r2g-flex-xlist-main-strip-xlist-wrapper-border-width: 0;
    --number__df__r2g-flex-xlist-sub-xlist-item-gap: 20px;
    --number__df__r2g-flex-xlist-main-strip-bottom-content-border-width: 0;
    --color__df__r2g-flex-xlist-main-strip-border-color: transparent;
    --color__df__r2g-flex-xlist-main-strip-background-color: transparent;
    --color__df__r2g-flex-xlist-main-strip-container-border-color: transparent;
    --color__df__r2g-flex-xlist-main-strip-container-background-color: transparent;
    --color__df__r2g-flex-xlist-main-strip-intro-content-border-color: transparent;
    --color__df__r2g-flex-xlist-main-strip-intro-content-background-color: transparent;
    --color__df__r2g-flex-xlist-main-strip-xlist-wrapper-border-color: transparent;
    --color__df__r2g-flex-xlist-main-strip-xlist-wrapper-background-color: transparent;
    --color__df__r2g-flex-xlist-main-strip-bottom-content-border-color: transparent;
    --color__df__r2g-flex-xlist-main-strip-bottom-content-background-color: transparent;
    --number__df__r2g-flex-xlist-sub-border-width: 0;
    --number__df__r2g-flex-xlist-sub-intro-content-border-width: 0;
    --number__df__r2g-flex-xlist-sub-xlist-wrapper-border-width: 0;
    --number__df__r2g-flex-xlist-sub-bottom-content-border-width: 0;
    --color__df__r2g-flex-xlist-sub-border-color: transparent;
    --color__df__r2g-flex-xlist-sub-background-color: transparent;
    --color__df__r2g-flex-xlist-sub-intro-content-border-color: transparent;
    --color__df__r2g-flex-xlist-sub-intro-content-background-color: transparent;
    --color__df__r2g-flex-xlist-sub-xlist-wrapper-border-color: transparent;
    --color__df__r2g-flex-xlist-sub-xlist-wrapper-background-color: transparent;
    --color__df__r2g-flex-xlist-sub-bottom-content-border-color: transparent;
    --color__df__r2g-flex-xlist-sub-bottom-content-background-color: transparent;
    --number__df__content-sub-border-width: 0;
    --number__df__content-sub-content-wrapper-border-width: 0;
    --color__df__content-sub-border-color: #efefef;
    --color__df__content-sub-background-color: transparent;
    --color__df__content-sub-content-wrapper-border-color: transparent;
    --color__df__content-sub-content-wrapper-background-color: transparent;
    --number__df__xlist-grid-main-strip-border-width: 0;
    --number__df__xlist-grid-main-strip-container-border-width: 0;
    --number__df__xlist-grid-main-strip-intro-content-border-width: 0;
    --number__df__xlist-grid-main-strip-xlist-wrapper-border-width: 0;
    --color__df__xlist-grid-main-strip-border-color: transparent;
    --color__df__xlist-grid-main-strip-background-color: transparent;
    --color__df__xlist-grid-main-strip-container-border-color: transparent;
    --color__df__xlist-grid-main-strip-container-background-color: transparent;
    --color__df__xlist-grid-main-strip-intro-content-border-color: transparent;
    --color__df__xlist-grid-main-strip-intro-content-background-color: transparent;
    --color__df__xlist-grid-main-strip-xlist-wrapper-border-color: transparent;
    --color__df__xlist-grid-main-strip-xlist-wrapper-background-color: transparent;
    --number__df__rotator-sub-component-border-width: 0;
    --number__df__rotator-sub-component-intro-content-border-width: 0;
    --number__df__rotator-sub-component-rotator-wrapper-border-width: 0;
    --number__df__rotator-sub-component-slick-slide-border-width: 0;
    --number__df__rotator-sub-component-slick-slide-margin-left: 10px;
    --number__df__rotator-sub-component-slick-slide-margin-right: 10px;
    --number__df__rotator-sub-component-bottom-content-border-width: 0;
    --color__df__rotator-sub-component-border-color: transparent;
    --color__df__rotator-sub-component-background-color: transparent;
    --color__df__rotator-sub-component-intro-content-border-color: transparent;
    --color__df__rotator-sub-component-intro-content-background-color: transparent;
    --color__df__rotator-sub-component-rotator-wrapper-border-color: transparent;
    --color__df__rotator-sub-component-rotator-wrapper-background-color: transparent;
    --color__df__rotator-sub-component-slick-slide-border-color: transparent;
    --color__df__rotator-sub-component-slick-slide-background-color: transparent;
    --color__df__rotator-sub-component-bottom-content-border-color: transparent;
    --color__df__rotator-sub-component-bottom-content-background-color: transparent;
    --number__df__accordion-main-strip-border-width: 0;
    --number__df__accordion-main-strip-container-border-width: 0;
    --number__df__accordion-main-strip-intro-content-border-width: 0;
    --number__df__accordion-main-strip-accordion-wrapper-border-width: 0;
    --number__df__accordion-main-strip-accordion-title-border-width: 0 0 1px;
    --number__df__accordion-main-strip-accordion-content-wrapper-border-width: 0;
    --color__df__accordion-main-strip-border-color: transparent;
    --color__df__accordion-main-strip-background-color: transparent;
    --color__df__accordion-main-strip-container-border-color: transparent;
    --color__df__accordion-main-strip-container-background-color: transparent;
    --color__df__accordion-main-strip-intro-content-border-color: transparent;
    --color__df__accordion-main-strip-intro-content-background-color: transparent;
    --color__df__accordion-main-strip-accordion-wrapper-border-color: transparent;
    --color__df__accordion-main-strip-accordion-wrapper-background-color: transparent;
    --color__df__accordion-main-strip-accordion-title-border-color: #aa8235;
    --color__df__accordion-main-strip-accordion-title-background-color: transparent;
    --color__df__accordion-main-strip-accordion-content-wrapper-border-color: transparent;
    --color__df__accordion-main-strip-accordion-content-wrapper-background-color: transparent;
    --number__df__expandable-xlist-border-width: 0;
    --number__df__expandable-xlist-main-content-wrapper-border-width: 0;
    --number__df__expandable-xlist-main-content-border-width: 0;
    --number__df__expandable-xlist-panel-wrapper-border-width: 0;
    --number__df__expandable-xlist-panel-item-border-width: 0;
    --number__df__expandable-xlist-intro-content-border-width: 0;
    --number__df__expandable-xlist-full-content-border-width: 0;
    --color__df__expandable-xlist-border-color: transparent;
    --color__df__expandable-xlist-background-color: #f9f9f9;
    --color__df__expandable-xlist-main-content-wrapper-border-color: transparent;
    --color__df__expandable-xlist-main-content-wrapper-background-color: transparent;
    --color__df__expandable-xlist-main-content-border-color: transparent;
    --color__df__expandable-xlist-main-content-background-color: transparent;
    --color__df__expandable-xlist-panel-wrapper-border-color: transparent;
    --color__df__expandable-xlist-panel-wrapper-background-color: transparent;
    --color__df__expandable-xlist-panel-item-border-color: transparent;
    --color__df__expandable-xlist-panel-item-background-color: transparent;
    --color__df__expandable-xlist-intro-content-border-color: transparent;
    --color__df__expandable-xlist-intro-content-background-color: transparent;
    --color__df__expandable-xlist-full-content-border-color: transparent;
    --color__df__expandable-xlist-full-content-background-color: transparent;
    --color__df__expandable-xlist-arrow-background-color: transparent;
    --color__df__expandable-xlist-arrow-color: #a7a7a7;
    --number__df__gallery-main-strip-border-width: 0;
    --number__df__gallery-main-strip-container-border-width: 0;
    --number__df__gallery-main-strip-intro-content-border-width: 0;
    --number__df__gallery-main-strip-xlist-wrapper-border-width: 0;
    --number__df__gallery-main-strip-item-border-width: 0;
    --color__df__gallery-main-strip-border-color: transparent;
    --color__df__gallery-main-strip-background-color: transparent;
    --color__df__gallery-main-strip-container-border-color: transparent;
    --color__df__gallery-main-strip-container-background-color: transparent;
    --color__df__gallery-main-strip-intro-content-border-color: transparent;
    --color__df__gallery-main-strip-intro-content-background-color: transparent;
    --color__df__gallery-main-strip-xlist-wrapper-border-color: transparent;
    --color__df__gallery-main-strip-xlist-wrapper-background-color: transparent;
    --color__df__gallery-main-strip-item-border-color: transparent;
    --color__df__gallery-main-strip-item-background-color: transparent;
    --color__df__gallery-main-strip-download-icon-color: #b49006;
    --color__df__gallery-main-strip-download-icon-border-color: #fff;
    --color__df__gallery-main-strip-download-icon-background-color: #fff;
    --color__df__googlemap-main-strip-border-color: transparent;
    --color__df__googlemap-main-strip-background-color: transparent;
    --color__df__googlemap-main-strip-intro-content-border-color: transparent;
    --color__df__googlemap-main-strip-intro-content-background-color: transparent;
    --color__df__googlemap-main-strip-category-wrapper-border-color: transparent;
    --color__df__googlemap-main-strip-category-wrapper-background-color: transparent;
    --color__df__googlemap-main-strip-content-wrapper-border-color: transparent;
    --color__df__googlemap-main-strip-content-wrapper-background-color: transparent;
    --color__df__googlemap-main-strip-map-wrapper-border-color: transparent;
    --number__df__horizontal-menu-menu-wrapper-padding: 20px 0;
    --number__df__horizontal-menu-menu-inner-wrapper-padding: 0 40px;
    --number__df__horizontal-menu-menu-item-link-padding: 5px 0;
    --color__df__horizontal-menu-border-color: transparent;
    --color__df__horizontal-menu-background-color: transparent;
    --color__df__horizontal-menu-container-border-color: transparent;
    --color__df__horizontal-container-menu-background-color: transparent;
    --color__df__horizontal-menu-menu-wrapper-border-color: transparent;
    --color__df__horizontal-menu-wrapper-menu-background-color: transparent;
    --color__df__horizontal-menu-menu-inner-wrapper-border-color: transparent;
    --color__df__horizontal-menu-inner-wrapper-menu-background-color: transparent;
    --color__df__horizontal-menu-menu-item-border-color: transparent;
    --color__df__horizontal-menu-menu-item-background-color: transparent;
    --color__df__horizontal-menu-menu-item-link-border-color: transparent;
    --color__df__horizontal-menu-menu-item-link-background-color: transparent;
    --number__df__accordion-sub-border-width: 0;
    --number__df__accordion-sub-intro-content-border-width: 0;
    --number__df__accordion-sub-accordion-wrapper-border-width: 0;
    --number__df__accordion-sub-accordion-title-border-width: 0 0 1px;
    --number__df__accordion-sub-accordion-content-wrapper-border-width: 0;
    --color__df__accordion-sub-border-color: transparent;
    --color__df__accordion-sub-background-color: transparent;
    --color__df__accordion-sub-intro-content-border-color: transparent;
    --color__df__accordion-sub-intro-content-background-color: transparent;
    --color__df__accordion-sub-accordion-wrapper-border-color: transparent;
    --color__df__accordion-sub-accordion-wrapper-background-color: transparent;
    --color__df__accordion-sub-accordion-title-border-color: #aa8235;
    --color__df__accordion-sub-accordion-title-background-color: transparent;
    --color__df__accordion-sub-accordion-content-wrapper-border-color: transparent;
    --color__df__accordion-sub-accordion-content-wrapper-background-color: transparent;
    --number__df__form-sub-border-width: 0;
    --number__df__form-sub-intro-content-border-width: 0;
    --number__df__form-sub-form-wrapper-border-width: 0;
    --number__df__form-sub-form-group-border-width: 0;
    --color__df__form-sub-border-color: transparent;
    --color__df__form-sub-background-color: transparent;
    --color__df__form-sub-intro-content-border-color: transparent;
    --color__df__form-sub-intro-content-background-color: transparent;
    --color__df__form-sub-form-wrapper-border-color: transparent;
    --color__df__form-sub-form-wrapper-background-color: transparent;
    --color__df__form-sub-form-group-border-color: transparent;
    --color__df__form-sub-form-group-background-color: transparent;
    --number__df__cookie-border-width: 0;
    --number__df__cookie-wrapper-border-width: 0;
    --number__df__cookie-content-wrapper-border-width: 0;
    --number__df__cookie-button-wrapper-border-width: 0;
    --color__df__cookie-border-color: transparent;
    --color__df__cookie-background-color: rgb(193, 192, 192);
    --color__df__cookie-wrapper-border-color: transparent;
    --color__df__cookie-wrapper-background-color: transparent;
    --color__df__cookie-content-wrapper-border-color: transparent;
    --color__df__cookie-content-wrapper-background-color: transparent;
    --color__df__cookie-button-wrapper-border-color: transparent;
    --color__df__cookie-button-wrapper-background-color: transparent;
    --number__df__footer-border-width: 0;
    --number__df__footer-items-wrapper-border-width: 0;
    --number__df__footer-item-border-width: 0;
    --number__df__footer-copyright-border-width: 1px 0 0 0;
    --number__df__footer-input-border-width: 1px;
    --number__df__footer-input-height: 38px;
    --number__df__footer-button-padding: 0 15px;
    --color__df__footer-input-border-color: #fff;
    --color__df__footer-input-background-color: #fff;
    --color__footer-background-color: #292929;
    --color__footer-border-color: #292929;
    --color__footer-items-wrapper-background-color: transparent;
    --color__footer-items-wrapper-border-color: transparent;
    --color__footer-item-background-color: transparent;
    --color__footer-item-border-color: transparent;
    --color__footer-copyright-background-color: #292929;
    --color__footer-copyright-border-color: #292929
}

html {
    font-size: 10px
}

body {
    font-family: ABeeZee,sans-serif;
    font-size: 1.7rem;
    line-height: 2.9rem;
    color: var(--color__default-text-color);
    font-weight: 400;
    background-color: var(--color__site-background-color)
}

h1,h2 {
    font-size: 3.4rem;
    line-height: 4.6rem;
    text-transform: uppercase;
    color: var(--color__default-text-color);
    font-family: Merienda,cursive
}

h1 {
    font-weight: 700;
    margin: var(--number__df__heading-one-margin)
}

h2,h3,h4,h5,h6 {
    font-weight: 400
}

h2 {
    margin: var(--number__df__heading-two-margin)
}

h3 {
    font-family: Merienda,cursive;
    font-size: 2.5rem;
    line-height: 3rem;
    color: var(--color__default-text-color);
    margin: var(--number__df__heading-three-margin)
}
.link-option-1:hover,.link-option-1:hover .icn-arrow,.r2g-header .main-menu .active,.r2g-header .main-menu a:hover,.r2g-header .top-bar .active a,.r2g-header .top-bar a:hover,.r2g-header.header-fixed .main-menu .active,.r2g-header.header-fixed .main-menu .active>a,.r2g-header.header-fixed .main-menu a:hover,a,a:hover {
    color: #7a3548
}
.link-as-button-option-1:hover,.link-as-button-option-2:hover,.link-as-button-option-3:hover,.on-bg .link-as-button-option-1,.on-bg .link-as-button-option-1:hover,.on-bg .link-as-button-option-2,.on-bg .link-as-button-option-2:hover,.on-bg .link-as-button-option-3:hover,.on-bg .primary-button,.on-bg .primary-button:focus,.on-bg .primary-button:hover,.on-bg .secondary-button,.on-bg .secondary-button:focus,.on-bg .secondary-button:hover,.on-bg a:hover,.on-bg button.primary-button,.on-bg button.primary-button:focus,.on-bg button.primary-button:hover,.on-bg button.secondary-button,.on-bg button.secondary-button:focus,.on-bg button.secondary-button:hover,.on-bg button:focus,.on-bg button:hover,.primary-button:focus,.primary-button:hover,.r2g-header .header-bottom-bar .primary-button:hover,.r2g-header.header-fixed .header-bottom-bar .primary-button,.secondary-button:focus,.secondary-button:hover,button.primary-button:focus,button.primary-button:hover,button.secondary-button:focus,button.secondary-button:hover,button:focus,button:hover,footer,footer .fb-cr input:checked~.fb-checkbox-helper:after,footer .fb-cr input:checked~.fb-radio-helper:after,footer h3,footer label {
    color: #fff
}
.strip-row {
    margin: var(--number__df__strip-row-margin);
    background-color: var(--color__df__main-strip-background-color)
}
.r2g-header .top-bar {
    font-family: Merienda,cursive;
    font-size: 1.4rem;
    line-height: 1.5;
    color: #00171f
}

.r2g-header .top-bar a {
    font-family: Merienda,cursive;
    font-size: 1.4rem;
    line-height: 1.5;
    color: #00171f;
    text-decoration: none
}
.r2g-header .r2g-contact-options .icon,.r2g-header .r2g-header-social-media .icon,footer li,footer p {
    font-size: 1.6rem
}

.more-menu-wrapper a,footer a {
    color: #fff;
    text-decoration: none
}
.copyright-bar p {
    font-size: 1.4rem
}

.link-option-1 {
    font-family: Merienda,cursive;
    font-weight: 700;
    color: #ff91a4;
    text-decoration: none;
    text-transform: capitalize;
    padding: var(--number__link-option-one-padding);
    border-color: var(--color__link-option-one-border-color);
    background-color: var(--color__link-option-one-background-color)
}
.link-as-button-option-1,.primary-button,button.primary-button {
    font-family: Merienda,cursive;
    border-radius: .6rem;
    font-size: 1.6rem;
    font-weight: 400;
    color: #fff;
    line-height: 2rem;
    text-decoration: none;
    text-transform: uppercase
}

.link-as-button-option-2,.secondary-button,button.secondary-button {
    font-family: Merienda,cursive;
    font-size: 2rem;
    font-weight: 400;
    color: #4b4342;
    line-height: 2rem;
    text-decoration: none;
    text-transform: uppercase
}
.r2g-header .header-bottom-bar .primary-button {
    font-family: Inter,sans-serif;
    font-weight: 400;
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    padding: var(--number__df__header-bottom-bar-primary-button-padding);
    border-color: var(--color__df__header-bottom-bar-primary-button-border-color);
    background-color: var(--color__df__header-bottom-bar-primary-button-background-color)
}
.main-visual-default .main-visual-slogan-wrapper p {
    font-family: Inter;
    font-weight: 400;
    font-size: 2rem;
    line-height: 3rem;
    color: #fff
}
.r2g-flex-xlist-main-strip .intro-content {
    border: 0
}
.r2g-footer-social-media .icon {
    font-size: 4.55rem
}
.link-as-button-option-1,.primary-button,button.primary-button {
    border-radius: var(--number__link-as-button-option-one-border-radius);
    padding: var(--number__link-as-button-option-one-padding);
    border-color: var(--color__link-as-button-option-one-border-color);
    background-color: var(--color__link-as-button-option-one-background-color)
}
.link-as-button-option-1,.primary-button,button.primary-button {
    border-radius: var(--number__link-as-button-option-one-border-radius);
    padding: var(--number__link-as-button-option-one-padding);
    border-color: var(--color__link-as-button-option-one-border-color);
    background-color: var(--color__link-as-button-option-one-background-color)
}
	</style>

	<!-- load the full file async for the rest of the site -->
	<link rel="preload" href="<?= PUBLIC_URL ?>/assets/css/core.css?v=1">
	<link rel="preload" href="<?= PUBLIC_URL ?>/assets/css/responsive.css?v=1">
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
