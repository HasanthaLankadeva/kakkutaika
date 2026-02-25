var _host = window.location.host;
var _base_path = (_host == 'localhost') ? '/kakkutaika/public/assets/' : '/public/assets/';

/** START R2G Header Contact Options **/
jQuery(document).ready(function(){
    jQuery('.r2g-contact-options').each(function(){
        
        var activeClass = jQuery(this).attr('data-active-class').split(".")[1],
            iconClass = '';
        
        switch(activeClass) {
          case 'contact-address-only':
            iconClass = 'icon-i-320-location-circle-fill';
            break;
          case 'contact-email-only':
            iconClass = 'icon-i-39-e-mail-fill';
            break;
          default:
            iconClass = 'icon icon-i-84-phone-call-fill';
        } 
        if(jQuery(this).find('a .sm-label').length == 0){
            jQuery(this).find('a').wrapInner('<span class="sm-label" data-cse_class_to_apply=".r2g-contact-options.'+activeClass+' .sm-label" data-cse_name="Contact Option Label"></span>').prepend('<span class="icon '+iconClass+'" data-cse_class_to_apply=".r2g-contact-options.'+activeClass+' .icon" data-cse_name="Contact Option Icon"></span>');
        }
    });
});
/** END R2G Header Contact Options **/

/** START R2G Header Social Media **/
jQuery(document).ready(function(){
    r2gHeaderSocialMedia();
});
function r2gHeaderSocialMedia(){
    var _this = '',
        _smName = '',
        _smIcon;

    jQuery('.r2g-header-social-media ul a')
        .wrapInner('<span></span>')
        .prepend('<span class="icon"></span>')
        .each(function(){
            _this = $(this);
            _smName = _this.parent('li').attr('data-name');
            _smIcon = _this.find('.icon');
            _smIcon.addClass(_smName);
        });
        
    /* set top-bar smo items */
    _smoItems   = jQuery('.r2g-header-social-media').attr('data-topbar-smo-items');
    jQuery('.r2g-header-social-media').find('.sm-item').slice(_smoItems).hide();
}
/** END R2G Header Social Media **/

/** START R2G Header - CSE **/
jQuery(document).ready(function(){
    
    var wW = $(window).width(),
        _header     = jQuery('header'),
        _moreMenu   = jQuery('#more-menu nav > ul'),
        _mainMenu   = jQuery('#main-menu nav > ul'),
        _topBarMenu = jQuery('.r2g-top-bar-menu nav > ul'),
        _menuItems  = _mainMenu.find('> li').length,
        _itemsOn768     = _header.attr('data-menu-items-on-768'),
        _itemsOn1024    = _header.attr('data-menu-items-on-1024'),
        _itemsOn1366    = _header.attr('data-menu-items-on-1366'),
        
        _topBarmenuItems  = _topBarMenu.find('> li').length,
        _topBaritemsOn768     = _header.find('.r2g-top-bar-menu').attr('data-menu-items-on-768'),
        _topBaritemsOn1024    = _header.find('.r2g-top-bar-menu').attr('data-menu-items-on-1024'),
        _topBaritemsOn1366    = _header.find('.r2g-top-bar-menu').attr('data-menu-items-on-1366');
    
    var smo     = _header.find('.r2g-header-social-media').clone(),
        logo    = _header.find('#branding .logo').clone();

    jQuery('#more-menu-wrapper').append( smo );
    jQuery(logo).wrap('<div class="logo-wrapper"></div>').parent().prependTo('#more-menu-wrapper');
    
    jQuery('#more-menu-wrapper .logo-wrapper').attr({
        'data-cse_class_to_apply':' .more-menu-wrapper .logo-wrapper', 
        'data-cse_name':'More Menu Branding Wrapper'
    });
    
    jQuery('#more-menu-wrapper .r2g-header-social-media').removeAttr('data-cse_blockid');
    
    jQuery('#more-menu-wrapper .r2g-header-social-media').attr({
        'data-cse_class_to_apply':' .more-menu-wrapper .r2g-header-social-media', 
        'data-cse_name':'More Menu Social Wrapper'
    });
    
    var socialItem = 0;
    jQuery('#more-menu-wrapper .r2g-header-social-media li').each(function(){
        
        if(socialItem == 0){
            jQuery(this).attr({
                'data-cse_class_to_apply':' .more-menu-wrapper .sm-item', 
                'data-cse_name':'More Menu All Social Items'
            });
        } else {
            jQuery(this).removeAttr('style');
            jQuery(this).attr({
                'data-cse_class_to_apply':' .more-menu-wrapper .sm-item.item-'+socialItem, 
                'data-cse_name':'More Menu Social Item '+socialItem
            });
        }

        socialItem++;
    });
        
    _header.find('#main-menu nav > ul > li').slice(0, _itemsOn768).addClass('show-on-768');
    _header.find('#main-menu nav > ul > li').slice(0, _itemsOn1024).addClass('show-on-1024');
    _header.find('#main-menu nav > ul > li').slice(0, _itemsOn1366).addClass('show-on-1366');
    
    _header.find('#more-menu').prepend(_header.find('#main-menu').html());
    
    /* set top-bar menu */
    _topBarMenu.find('> li').slice(0, _topBaritemsOn768).addClass('show-on-768');
    _topBarMenu.find('> li').slice(0, _topBaritemsOn1024).addClass('show-on-1024');
    _topBarMenu.find('> li').slice(0, _topBaritemsOn1366).addClass('show-on-1366');
    
    _header.find('#more-menu').append(_header.find('.r2g-top-bar-menu').html());
    
    if((_menuItems > _itemsOn768) || (_topBarmenuItems > _topBaritemsOn768)){
        _header.find('.menu-btn').addClass('show-btn-768');
    } 
    if((_menuItems > _itemsOn1024) || (_topBarmenuItems > _topBaritemsOn1024)){
        _header.find('.menu-btn').addClass('show-btn-1024');
    } 
    if((_menuItems > _itemsOn1366) || (_topBarmenuItems > _topBaritemsOn1366)){
        _header.find('.menu-btn').addClass('show-btn-1366');
    }
    
    _header.find('nav li ul').each(function(){
    
        var _this       = jQuery(this),
            _children   = _this.children(),
            h           = _this.prop('scrollHeight');
        
        _this.parent().attr('data-height', h).addClass('has-submenu');
        
        _children.each(function(){
            var _thisChild = jQuery(this);
            if(_thisChild.hasClass('active')){
                _this.parent().addClass('sub-menu-active');
            }
        });
        
        if(_this.siblings('.sub-menu-arrow').length == 0){
            jQuery('<span class="sub-menu-arrow"></span>').insertBefore(_this);
        }
        
    });
    
    _header.find('#main-menu li > a, #more-menu li > a').on('click', function(e){
        if(jQuery(this).parent().hasClass('has-submenu')){
            if( jQuery(this).attr('href') == '#' && jQuery(this).attr('href') == '') {
                e.preventDefault();
                e.stopPropagation();
                if(!jQuery(this).parent().hasClass('sub-menu-open')){     
                    jQuery(this).parent().addClass('sub-menu-open');
                    jQuery(this).parent().find('>ul').slideDown();
                } else {
                    jQuery(this).parent().removeClass('sub-menu-open');
                    jQuery(this).parent().find('>ul').slideUp();
                } 
            }
        }
    });
    
    _header.find('#main-menu li, #more-menu li').on('click', '.sub-menu-arrow', function(e){
        if(!jQuery(this).parent().hasClass('sub-menu-open')){     
            jQuery(this).parent().addClass('sub-menu-open');
            jQuery(this).parent().find('>ul').slideDown();
        } else {
            jQuery(this).parent().removeClass('sub-menu-open');
            jQuery(this).parent().find('>ul').slideUp();
        } 
        
        jQuery("header .more-menu, .full-width-menu .more-menu").mCustomScrollbar('update');
    });

    scrollWindow(jQuery(window));
    
    /* header option */
    if(wW > 767 && (_header.hasClass('header-option-three') || _header.hasClass('header-option-four'))){
        splitTopBar();
    }
    if(wW > 767 && _header.hasClass('header-option-four')){
        splitBottomBar();
    }
    
    /* menu option */
    if(wW > 767 && _header.hasClass('menu-option-two')){
        headerPerspective();
    }
    
    _header.find('.menu-btn').on('click', function(){
        if(jQuery('body').hasClass('menu-open')){
            jQuery('body').removeClass('menu-open');
            jQuery(this).addClass('menu-open-btn').removeClass('menu-close-btn');
            jQuery('.r2g-header.menu-option-three .more-menu-wrapper').removeClass('transition-end');
        }else{
            jQuery('body').addClass('menu-open');
            
            if(wW < 767 || !_header.hasClass('menu-option-two')){
                jQuery(this).addClass('menu-close-btn').removeClass('menu-open-btn');
            }
            
            if( _header.hasClass('menu-option-three')){
                _header.find('.more-menu-wrapper').on('transitionend webkitTransitionEnd oTransitionEnd', function(){
                    if(jQuery('body').hasClass('menu-open')){
                        jQuery(this).addClass('transition-end');
                    }   
                });
            }
        }
    });
});

jQuery(window).on('resize', function(){
    jQuery('header #more-menu-wrapper #more-menu').removeAttr('style');
    setMoreMneuHeight(); 
});

jQuery(window).on('load', function(){

    jQuery('header .main-menu .has-submenu').hover(
       function(){
            jQuery(this).addClass('sub-menu-open');
            if(jQuery(this).parents().hasClass('more-menu-wrapper')){
                jQuery(this).find('>ul').stop().slideDown();
            }
        },
        function(){
            jQuery(this).removeClass('sub-menu-open');
            if(jQuery(this).parents().hasClass('more-menu-wrapper')){
                jQuery(this).find('>ul').stop().slideUp();
            }
        }
    );
  
});

function splitTopBar() {
    var topBarItems = jQuery('header .top-bar .top-bar-wrapper > .r2g-header-sub-component').length;
    var colOneOtems = Math.round(topBarItems / 2);
    
    jQuery('header .top-bar .top-bar-wrapper > .r2g-header-sub-component').slice(0, colOneOtems).wrapAll('<div class="top-bar-left" data-cse_class_to_apply="top-bar .top-bar-left" data-cse_name="Top Bar Left Wrapper" />');
    jQuery('header .top-bar .top-bar-wrapper > .r2g-header-sub-component').slice(0, topBarItems).wrapAll('<div class="top-bar-right" data-cse_class_to_apply="top-bar .top-bar-right" data-cse_name="Top Bar Right Wrapper" />');
    
    setTopBarWith();
    
    jQuery(window).on('resize', function(){
        var windowW = jQuery(window).width();
        if(windowW > 767){
            setTopBarWith();
        }
    });
    
    function setTopBarWith(){
        var brandingWidth = jQuery('.branding').width();
        var windowWidth = (jQuery(window).width() / 10 * 9);
        jQuery('.top-bar-left, .top-bar-right').css({'width':((windowWidth - brandingWidth - 40) / 2)});
    }
    
}

function splitBottomBar() {
    var itemsLengthOn768 = jQuery('header #main-menu nav > ul > li.show-on-768').length,
        itemsLengthOn1024 = jQuery('header #main-menu nav > ul > li.show-on-1024').length,
        itemsLengthOn1366 = jQuery('header #main-menu nav > ul > li.show-on-1366').length;
    
    var showItemsOn768 = Math.round(itemsLengthOn768 / 2),
        showItemsOn1024 = Math.round(itemsLengthOn1024 / 2),
        showItemsOn1366 = Math.round(itemsLengthOn1366 / 2);
    
    var mainMenu = jQuery('header #main-menu nav'),
        clonedMenu = mainMenu.clone(),
        branding = jQuery('header #branding').clone();
    
    if(jQuery('.menu-section').length == 0){
        mainMenu.wrap('<div class="menu-section left-menu" data-cse_class_to_apply="header-bottom-bar .left-menu" data-cse_name="Bottom Bar Left Wrapper"></div>');
        branding.insertAfter('header #main-menu .menu-section.left-menu');
        jQuery('<div class="menu-section right-menu" data-cse_class_to_apply="header-bottom-bar .right-menu" data-cse_name="Bottom Bar Right Wrapper"></div>').append(clonedMenu).appendTo('header #main-menu');
    }
    
    jQuery('.menu-section').each(function(){
    
        var $this = $(this);
        
        $this.find('.show-on-768').slice(0, showItemsOn768).addClass('show-on-left-768');
        $this.find('.show-on-768').slice(showItemsOn768, itemsLengthOn768).addClass('show-on-right-768');
    
        $this.find('.show-on-1024').slice(0, showItemsOn1024).addClass('show-on-left-1024');
        $this.find('.show-on-1024').slice(showItemsOn1366, itemsLengthOn1024).addClass('show-on-right-1024');
    
        $this.find('.show-on-1366').slice(0, showItemsOn1366).addClass('show-on-left-1366');
        $this.find('.show-on-1366').slice(showItemsOn1366, itemsLengthOn1366).addClass('show-on-right-1366');
    
    });
    
    var headerRightMenu = jQuery('.header-bottom-bar .menu-section.right-menu > nav > ul'),
    	headerBottomBarBtn = jQuery('header .header-bottom-bar .primary-button').clone(),
    	headerMenuBtn = jQuery('header .header-bottom-bar .menu-btn').clone();
    
    jQuery('<li class="bottom-bar-btn"></li>').append(headerBottomBarBtn).appendTo(headerRightMenu);
    jQuery('<li class="bottom-bar-menu-btn"></li>').append(headerMenuBtn).appendTo(headerRightMenu);
    
    /* remove CSE data attributes */
    jQuery('header .header-bottom-bar > .menu-btn, header .header-bottom-bar > .primary-button, header .header-wrapper > .branding').removeAttr('data-cse_class_to_apply data-cse_name');

    setBottomBarWith();
    
    jQuery(window).on('resize', function(){
        var windowW = jQuery(window).width();
        if(windowW > 767){
            setBottomBarWith();
        }
    });
    
    function setBottomBarWith(){
        var brandingWidth = jQuery('.branding').width();
        var windowWidth = (jQuery(window).width() / 10 * 9);
        jQuery('.menu-section').css({'width':((windowWidth - brandingWidth - 40) / 2)});
    }
}

function headerPerspective() {
    var docElem = $('html'),
        docscroll = 0,
        header    = jQuery('header').clone(true),
        itemsOn768     = header.attr('data-menu-items-on-768'),
        itemsOn1024    = header.attr('data-menu-items-on-1024'),
        itemsOn1366    = header.attr('data-menu-items-on-1366'),
        dataID      = jQuery('header').attr('data-cse_blockid'),
        dataOption  = jQuery('header').attr('data-active-option').split(".")[1],
        dataMenu    = jQuery('header').attr('data-active-menu').split(".")[1];

    header.find('#main-menu nav > ul > li').slice(0, itemsOn768).addClass('show-on-768');
    header.find('#main-menu nav > ul > li').slice(0, itemsOn1024).addClass('show-on-1024');
    header.find('#main-menu nav > ul > li').slice(0, itemsOn1366).addClass('show-on-1366');

    jQuery('.main-container, footer').wrapAll('<div id="holder" data-cse_blockid="'+dataID+'" class="'+dataOption+' '+dataMenu+'"><div class="holder-inner-wrapper"><div class="scroll-container"></div></div></div>');
    jQuery('#holder').prepend(jQuery('header'));
    
    insertBefore(jQuery('header').find('.more-menu-wrapper'));
    
    header.find('.more-menu-wrapper').wrapAll('<div class="full-width-menu"></div>').parents('.full-width-menu').appendTo('#holder');
    
    function scrollY() {
        return window.pageYOffset || docElem[0].scrollTop;
    }
    
    function init() {
        var showMenu = jQuery('.menu-btn'),
            perspectiveWrapper = jQuery('#holder'),
            container = perspectiveWrapper.find('.holder-inner-wrapper'),
            contentWrapper = container.find('.scroll-container'),
            close = jQuery('.full-width-menu .menu-close-btn');

        showMenu.on('click', function(e) {
            e.stopPropagation();
            e.preventDefault();
            jQuery(window).unbind('scroll');
            var isWindowScrolled = (jQuery('body').hasClass('window-scrolled')) ? 'window-scrolled' : '';
            docscroll = scrollY();
            
            //perspectiveWrapper.removeClass('perspective-end-start perspective-end-finish')
            contentWrapper.css('top', docscroll * -1 + 'px');
            perspectiveWrapper.addClass('perspective-modal-view');
            
            if(docscroll > 0){
                jQuery('body').addClass('perspective-menu-open');
                jQuery('header').addClass('perspective-header-fixed');
            }
            
            setTimeout( function() { 
                perspectiveWrapper.addClass('perspective-animate');
            }, 25 );
            
        });

        close.on('click', function(e) {

            if(perspectiveWrapper.hasClass('perspective-animate')) {
                var onEndTransFn = function(e) {
                    jQuery(this).unbind('transitionend webkitTransitionEnd oTransitionEnd');
                    perspectiveWrapper.removeClass('perspective-modal-view');
                    document.body.scrollTop = document.documentElement.scrollTop = docscroll;
                    contentWrapper.css('top', '0px');
                };

                perspectiveWrapper.bind('transitionend webkitTransitionEnd oTransitionEnd', onEndTransFn);
                perspectiveWrapper.removeClass('perspective-animate');
                jQuery('body').removeClass('menu-open');
                
                setTimeout( function() { 
                    jQuery('body').removeClass('perspective-menu-open');
                    jQuery('header').removeClass('perspective-header-fixed');
                }, 1400 );
            }
            
            jQuery(window).bind('scroll', function(e){  
				var el = jQuery(window);
				scrollWindow(el);
			});			
        });
    }

    init();
}

function scrollWindow(el){
    var $window = el,
        $body = jQuery('body'),
        $windowWidth = jQuery(window).width();
    
    function check_if_scroll() {
        var scrollcontrol = $window.scrollTop(),
            $headerHeight = jQuery('header .header-bottom-bar').height();
        
        if(scrollcontrol > 0){
            
            if(!jQuery('header').hasClass('header-option-three') && !jQuery('header').hasClass('header-option-four')){
                $body.addClass('window-scrolled scrolled header-fixed');
                jQuery('header').addClass('header-fixed');
            }
            
            if(!$body.hasClass('header-fixed') && (jQuery('header').hasClass('header-option-three') || jQuery('header').hasClass('header-option-four'))){
                $body.addClass('window-scrolled scrolled header-animate-up');
                
                if($body.hasClass('header-animate-up')){
                    setTimeout(function(){
                        $body.addClass('header-fixed').removeClass('header-animate-up');
                        jQuery('header').addClass('header-fixed');
                    },600);
                }
            }
            
            if($body.hasClass('menu-open')){
                jQuery('.menu-btn').trigger('click');
                $body.removeClass('menu-open');
            }
            
        } else {
            
            if(!jQuery('header').hasClass('header-option-three') && !jQuery('header').hasClass('header-option-four')){
                $body.removeClass('window-scrolled scrolled header-fixed');
                jQuery('header').removeClass('header-fixed');
            }
            
            if($body.hasClass('header-fixed') && (jQuery('header').hasClass('header-option-three') || jQuery('header').hasClass('header-option-four'))){
                $body.removeClass('window-scrolled scrolled');
                
                if(!$body.hasClass('menu-open')){
                    $body.addClass('header-animate-up');
                }
                
                if($body.hasClass('header-animate-up')){
                    setTimeout(function(){
                        $body.removeClass('header-fixed header-animate-up');
                        jQuery('header').removeClass('header-fixed');
                    },600);
                }
            }
        }
    }
    
    $window.on('scroll', function() {
        check_if_scroll();
    });
}

addToAutoLoadLibs(_base_path+'js/libs/custom-scrollbar/jquery.mousewheel.min.js');
addToAutoLoadLibs(_base_path+'js/libs/custom-scrollbar/jquery.mCustomScrollbar.min.css');
addToAutoLoadLibs(_base_path+'js/libs/custom-scrollbar/jquery.mCustomScrollbar.min.js', moreMenuScroll);

function moreMenuScroll(){
    
    setMoreMneuHeight();
    
    jQuery("header .more-menu, .full-width-menu .more-menu").mCustomScrollbar({
        documentTouchScroll: true,
        scrollTo: 'top',
        contentTouchScroll: 15
    });
    
    /*setTimeout(function(){
        jQuery("header .more-menu, .full-width-menu .more-menu").mCustomScrollbar("scrollTo","0px");
    },100);*/
}

function setMoreMneuHeight() {
    var windowWidth = jQuery(window).width(),
        windowHeight = jQuery(window).height(),
        headerHeight = (windowWidth > 767 && jQuery('header').hasClass('menu-option-three')) ? 0 : jQuery('header').height(),
        moreMenuHeight = jQuery('header .more-menu').height(),
        BottomBarPrimaryButton = (jQuery('header .header-bottom-bar .primary-button').is(':visible')) ? jQuery('header .header-bottom-bar .primary-button').height() : 0,
        moreMenuLogo = (jQuery('header .more-menu-wrapper .logo-wrapper').is(':visible')) ? jQuery('header .more-menu-wrapper .logo-wrapper').outerHeight(true) : 0,
        moreMenuSMO = jQuery('header .more-menu-wrapper .r2g-header-social-media').outerHeight(true);
        
    /* menu option two */
    var moreMenuWrapperH = jQuery('.full-width-menu .more-menu-wrapper').height(),
        moreMenuLogoH = (jQuery('.full-width-menu .logo-wrapper').is(':visible')) ? jQuery('.full-width-menu .logo-wrapper').outerHeight(true) : 0,
        moreMenuH = jQuery('.full-width-menu .more-menu').height(),
        moreMenuSMOH = jQuery('.full-width-menu .r2g-header-social-media').outerHeight(true);
    
    if(windowWidth < 768){
        if(windowHeight < (headerHeight + BottomBarPrimaryButton + moreMenuHeight + moreMenuLogo + moreMenuSMO)){
            jQuery('header .more-menu-wrapper .more-menu').css({'height': (windowHeight - (headerHeight + moreMenuLogo + moreMenuSMO + BottomBarPrimaryButton + 60))});
        }
    } else {
        if(jQuery('header').hasClass('menu-option-two')){
            if(moreMenuWrapperH < (moreMenuH + moreMenuLogoH + moreMenuSMOH + 60)){
                jQuery('.full-width-menu .more-menu-wrapper .more-menu').css({'height': (moreMenuWrapperH - (moreMenuLogoH + moreMenuSMOH + 60))});
            }
        } else {
            if(windowHeight < (headerHeight + moreMenuHeight + moreMenuLogo + moreMenuSMO + 60)){
                jQuery('header .more-menu-wrapper .more-menu').css({'height': (windowHeight - (headerHeight + moreMenuLogo + moreMenuSMO + 60))});
            }
        }
    }
}
/** END R2G Header - CSE **/

/** START R2G Footer Social Media - CSE **/
jQuery(document).ready(function(){
    r2gFooterSocialMedia();
});
function r2gFooterSocialMedia(){
    var _this = '',
        _smName = '',
        _smIcon;

    jQuery('.r2g-footer-social-media ul a')
        .wrapInner('<span></span>')
        .prepend('<span class="icon"></span>')
        .each(function(){
            _this = $(this);
            _smName = _this.parent('li').attr('data-name');
            _smIcon = _this.find('.icon');
            _smIcon.addClass(_smName);
        });
}
/** END R2G Footer Social Media - CSE **/

/** START R2G Form ( Sub Component ) **/
addToAutoLoadLibs(_base_path+'js/libs/jquery-ui/jquery-ui.min.js', formsScript);
addToAutoLoadLibs(_base_path+'js/libs/jquery-validation/jquery.validate.min.js', formValidation);


function formsScript(){
	var dpFields = $( ".init-dp" );

	if( dpFields.length > 0 ){
		if( $.datepicker ){
			dpFields.each(function(){

				var dp = $(this),
					opt = {},
					dateFormat = dp.data('altformat'),
					altFormat = dp.data('dateformat');

				if( dateFormat ){
					opt.dateFormat = dateFormat;
				}

				if( altFormat ){
					opt.altFormat = altFormat;
				}
				dp.datepicker(opt);
			});
		}else{
			console.error('CMS Forms - Datepicker is not defined. Please load Datepicker first.');
		}
	}
}

function formValidation(){
    $.validator.setDefaults({ignore: []});

    //Email validation
    $.validator.addMethod("laxEmail", function(value, element) {
        return this.optional( element ) || /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test( value );
    }, 'Please enter a valid email address.');


    $('.cms-form').each(function(){
        var $form = $(this);
        $form.validate({

            errorPlacement: function( error, ele ) {

                var type = ele[0].type.toLowerCase();
                if ( type == 'radio' ) {
                    error.appendTo( ele.parents('.radio-group') );
                } else if (type == 'checkbox') {
                    if (ele.parents('.checkbox-group').length) {
                        error.appendTo( ele.parents('.checkbox-group') );
                    } else {
                        error.appendTo( ele.parents('.checkbox.fb-cr') );
                    }
                } else {
                    error.appendTo( ele.parents('.form-group') ); 
                }

            }

        });
    });

    $.validator.addClassRules({
        required: {
            required: true
        }

    });
}
/** END R2G Form ( Sub Component ) **/

/** START R2G Footer - CSE **/
jQuery(document).ready(function(){
    jQuery('.r2g-footer .copyright-year').text(new Date().getFullYear());
});
/** END R2G Footer - CSE **/

/** START R2G Main Visual - CSE **/
addToAutoLoadLibs(_base_path+'js/libs/slick/slick.min.js', bannerSlick);
addToAutoLoadLibs(_base_path+'js/libs/slick/slick.min.css');

function bannerSlick() {
    jQuery('.r2g-main-visual').each(function(){
        var $this = jQuery(this),
            $that = $this.find('.slider-wrapper'),
            $fullWidthWrapper = $this.find('.slider-item'),
            $arrowsDiv = $this.find('.main-visual-arrow-wrapper'),
            $dotsDiv = $this.find('.main-visual-pager-wrapper');

        var attibutes = $this.data();
        
        if(attibutes.arrows){
            var prevArrow = "<div class='prev float-l slider-navigation nav-left' data-cse_class_to_apply=' .main-visual-arrow-wrapper .prev' data-cse_name='Left Arrow'><span class='line-one' data-cse_class_to_apply=' .main-visual-arrow-wrapper .prev .line-one' data-cse_name='Left Arrow Icon'></span><span class='line-two'></span></div>";
            var nextArrow = "<div class='next float-r slider-navigation nav-right' data-cse_class_to_apply=' .main-visual-arrow-wrapper .next' data-cse_name='Right Arrow'><span class='line-one' data-cse_class_to_apply=' .main-visual-arrow-wrapper .next .line-one' data-cse_name='Right Arrow Icon'></span><span class='line-two'></span></div>";
        } else {
            var prevArrow = "<div class='prev float-l slider-navigation nav-left'><span class='line-one'></span><span class='line-two'></span></div>";
            var nextArrow = "<div class='next float-r slider-navigation nav-right'><span class='line-one'></span><span class='line-two'></span></div>";
        }
        
        $that.slick({
            autoplay: attibutes.autoplay,
            autoplaySpeed: attibutes.autoplayspeed,
            dots: attibutes.pager,
            arrows: attibutes.arrows,
            fade: attibutes.fade,
            speed: attibutes.speed,
            cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
            appendDots: $dotsDiv,
            appendArrows: $arrowsDiv,
            adaptiveHeight: true,
            customPaging: function(slick, index) {
                return  '<span class="visualPager"></span>';
            },
            prevArrow: prevArrow,
            nextArrow: nextArrow
        });
        
        $this.find('.main-visual-default').addClass('main-visual-load');
        
        /* hero video */
        
        $this.find('.slider-item[data-video]').each(function() {
                if(removeVarVideo(jQuery(this).attr('data-video'))){
                        jQuery(this).append('<a class="main-visual-play" data-cse_class_to_apply=" .main-visual-play" data-cse_name="Play Icon" href="#"></a>');
                }
        });
        
        var loop = (!attibutes.autoplay && attibutes.loopvideo) ? 'loop' : '';
        
        $this.addClass(loop);
        
        $this.find('.slider-item').on('click', '.main-visual-play', function(e) {
            e.preventDefault();
            
            if($this.find('.slider-wrapper').hasClass('play-video')){
                $this.find('.slider-wrapper').removeClass('play-video').addClass('pause-video');
                jQuery(this).parents('.slider-item').find('video').get(0).pause();
            } else {
                $this.find('.slider-wrapper').slick('slickPause').addClass('play-video');
           
                if(!jQuery(this).parents('.slider-item').find('video').length) {
                  jQuery(this).parents('.slider-item').find('.image-wrapper').append('<video playsinline autoplay muted preload="none" '+loop+' class="hero-video"><source src="'+ jQuery(this).parents().data('video') +'" type="video/mp4"></video>');
                }
                
                jQuery(this).parents('.slider-item').addClass('show-video');
                jQuery(this).parents('.slider-item').find('video').get(0).play();
            }
            
        });
        
        $this.find('.slider-wrapper').on("beforeChange", function (event, slick, currentSlide,  nextSlide){
            if(jQuery(this).find('[data-slick-index="'+currentSlide+'"] .slider-item.show-video').length > 0) {
                
                jQuery(this).find('[data-slick-index="'+currentSlide+'"] .slider-item.show-video video').get(0).pause();
                
                jQuery(this).removeClass('play-video');
                
                if(attibutes.autoplay){
                    $this.find('.slider-wrapper').slick('slickPlay');
                }
            }
        });
        
        $this.find('.slider-wrapper').on("afterChange", function (event, slick, currentSlide,  nextSlide){
            var playBtn = jQuery(this).find('[data-slick-index="'+currentSlide+'"] .main-visual-play');
            
            if(attibutes.autoplayvideo && playBtn.length > 0){
                jQuery(this).find('[data-slick-index="'+currentSlide+'"] .main-visual-play').trigger('click');
            }
        });
        
        if(attibutes.autoplayvideo){
            $this.find('.slider-item.item-1 .main-visual-play').trigger('click');
        }

        $this.find('.slick-current .hero-video').on('ended',function(){           
            $this.find('.slider-wrapper').removeClass('play-video');
            
            if(attibutes.autoplay){
                $this.find('.slider-wrapper').slick('slickPlay');
            } else {
                $this.find('.slick-current .main-visual-play').addClass('main-visual-play-show');
            }
            
        });
    });
    
    jQuery(window).on('scroll', function(){
        var scrollcontrol = jQuery(window).scrollTop(),
            vh = jQuery(window).height(),
            videoEl = jQuery('.main-visual-default .slick-slide.slick-current .hero-video'),
            video = videoEl.get(0);
            attibutes = jQuery('.r2g-main-visual').data(),
            status = false;
        
        if(videoEl.length > 0 && scrollcontrol > (vh / 2)){
            if (!video.paused) {
                video.pause();
                jQuery('.main-visual-default .slider-wrapper').removeClass('play-video').addClass('pause-video');
                status = true;
            }
        } else {
            if(videoEl.length > 0 && status && attibutes.autoplayvideo){
                jQuery('.main-visual-default .slider-wrapper').removeClass('pause-video').addClass('play-video');
                video.play();
            }
        }
    });
    
    function removeVarVideo(src){
        src = src.replace(/<!--{var-(.*?)-->/gm, '');
        src = src.replace(/<!--var-(.*?)}-->/gm, '');
        return src;
    }
}
/** END R2G Main Visual - CSE **/

/** START R2G xBox Sub Component - CSE **/
jQuery(document).ready(function(){
    var wW = jQuery(window).width();
    
    if(wW > 1200){
        jQuery('.r2g-xbox-sub-component .xbox-wrapper').mouseover(function() {
            jQuery(this).parents('.r2g-xbox-sub-component').addClass('mouse-over');
        }).mouseout(function() {
            jQuery(this).parents('.r2g-xbox-sub-component').removeClass('mouse-over');
        });
    }
    
});

addToAutoLoadLibs(_base_path+'js/libs/picturefill/picturefill.min.js', responsiveImg);

function responsiveImg() {
    picturefill();
}

addToAutoLoadLibs(_base_path+'js/libs/glightbox/glightbox.min.js', popUpBox);
addToAutoLoadLibs(_base_path+'js/libs/glightbox/glightbox.min.css');

function popUpBox() {
    
jQuery('[data-popup-image]').each(function(){
    
        var popupXbox       = jQuery(this),
            popUp           = (popupXbox.attr('data-popup-image') == 'true') ? true : false,
            imageEl         = popupXbox.find('.image-wrapper img'),
            thumbImage      = imageEl.attr('src'),
            largeImage      = popupXbox.attr('data-large-image'),
            caption         = popupXbox.attr('data-caption'),
            group           = popupXbox.attr('data-group');
            
        if(popUp){
            
            fancyboxImg = (largeImage == undefined || largeImage == '') ? thumbImage : largeImage;
            
            if(isImage(largeImage)){
                popupXbox.addClass('has-video');
            };
            
            imageEl.wrap('<a class="glightbox" href="' + fancyboxImg + '" data-fancybox="' + group + '" data-caption="' + caption + '"></a>');
        }
        
    });
    
    function isImage(url){
        if(url.trim()){
            var arr = [ "jpeg", "jpg", "gif", "png" ];
            var ext = url.substring(url.lastIndexOf(".")+1);
                        
            if(jQuery.inArray(ext, arr) === -1){
                return true;
            }
        }
    }

    const lightbox = GLightbox({
        touchNavigation: true,
        loop: true,
        autoplayVideos: true
    });
}
/** END R2G xBox Sub Component - CSE **/

/** START R2G xBox Main Strip - CSE **/
jQuery(document).ready(function(){
    
    var windowW = jQuery(window).width();
    
    if(windowW > 1260){
        jQuery('.r2g-xbox-main-strip.with-parallax .image-wrapper.parent img').each(function(){
            var img = jQuery(this);
            var imgParent = jQuery(this).parent();
            function parallaxImg () {
                //var speed = img.data('speed');
                var speed = 2;
                var imgY = imgParent.offset().top;
                var winY = jQuery(this).scrollTop();
                var winH = jQuery(this).height();
                var parentH = imgParent.innerHeight();
                
                
                // The next pixel to show on screen      
                var winBottom = winY + winH;
                
                // If block is shown on screen
                if (winBottom > imgY && winY < imgY + parentH) {
                    // Number of pixels shown after block appear
                    var imgBottom = ((winBottom - imgY) * speed);
                    // Max number of pixels until block disappear
                    var imgTop = winH + parentH;
                    // Porcentage between start showing until disappearing
                    var imgPercent = ((imgBottom / imgTop) * 100) + (0 - (speed * 50));
                }
                img.css({
                    top: imgPercent + 'px'
                });
            }
            jQuery(document).on({
                scroll: function () {
                    parallaxImg();
                }, ready: function () {
                    parallaxImg();
                }
            });
        });
    }
    
});
/** END R2G xBox Main Strip - CSE **/

/** START R2G Flex xList Main Strip - CSE **/

addToAutoLoadLibs(_base_path+'js/libs/masonry/masonry.pkgd.min.js', flexMasonryMS);

function flexMasonryMS() {
	if ($.fn.masonry) {
        jQuery('.r2g-flex-xlist-main-strip.masonry-grid').each(function(){
        	jQuery(this).find('.xList-items').masonry({
        		columnWidth: '.xList-item',
        		itemSelector: '.xList-item'
        	});
        	
        	/* set filter */
        	var $this       = jQuery(this),
                $filter     = ($this.hasClass('has-filter') ? true : false),
                $multiSelect = ($this.hasClass('multiple-select') ? true : false),
                $wrapper    = $this.find('.xList.xlist-strip');
                
            if($filter){
                $wrapper.prepend('<div class="cat-items filters"><span style="display:none;"></span><span style="display:none;" ></span><span style="display:none;"></span><span style="display:none;"></span><div class="checkbox fb-cr cat-item active all"><span class="fb-helper fb-checkbox-helper fa"></span><label>All</label></div></div>');
                
                var catArray = {};
                    
                $wrapper.find('> .xList-items .xList-item').each(function(){
                    var $this = jQuery(this),
                        $data = $this.attr('data-cat'),
                        $catArr = $data.split('||');
                    
                    if($catArr[1]){
                        //var $catLabelArr = $catArr[1].split('|');
                        var $catLabelArr = $catArr[1].split('|');
                        $.each($catLabelArr, function( key, value ) {
                            var $cat = value.replace(/[^a-zA-Z0-9]/g, "");
                            if(value == '*'){
                                $this.addClass('map-all');
                            } else if($catArr){
                                $this.addClass($cat);
                                catArray[value] = $catArr[0];
                            }
                        });
                    } else {
                        $this.addClass('map-all');
                    }
                });
                
                $.each(catArray, function( key, value ) {
                    var button = '<div class="checkbox fb-cr cat-item"><input type="checkbox" value="' + key + '" /><span class="fb-helper fb-checkbox-helper fa"></span><label>' + value + '</label></div>';
                    $wrapper.find('.cat-items').append(button);
                });
                
                /* filter */
                var $filters    = $this.find('.xList.xlist-strip > .cat-items.filters'),
                    $mContainer = $this.find('.xList.xlist-strip > .xList-items'),
                    $selector   = $mContainer.find('> .xList-item'),
                    $filterButton = $this.find('.cat-items.filters .cat-item'),
                    cache = [],
                    items = [];
                    
                $selector.addClass('filter-items');
                
                $selector.each(function(){
                    var _this = $(this);
                    cache.push(_this);
                });
                
                $mContainer.find('.xList-item').animate({
                    "opacity": 1
                }, 2000);
                
                $filterButton.find("input").change(function(){

                    if(!$multiSelect){
                        jQuery('.cat-items.filters .cat-item input:checked').not(this).prop('checked',false);
                    }

                    var selectedItems = jQuery('.cat-items.filters .cat-item input:checked'),
                        selectedItemsLength = selectedItems.length,
                        result=[];
                        
                    $(cache).each(function(item){
                        $(selectedItems).each(function(index,sel) {
                            if(cache[item].is('.'+sel.value) || cache[item].is('.map-all')){
                                if($.inArray(cache[item], result) === -1) result.push(cache[item]);
                            }
                        });
                    });
    
                    $mContainer.empty();
                    
                    $(result).each(function(){
                        $($mContainer).append($(this));
                    });
                    
                    if(!$multiSelect){
                        jQuery('.cat-items.filters .cat-item').removeClass('active')
                    }

                    jQuery(this).parent().toggleClass("active");
                    jQuery('.cat-items.filters .cat-item.all').removeClass('active');
                    
                    if(selectedItemsLength == 0){
                        $mContainer.empty();
                            $(cache).each(function(){
                                $($mContainer).append($(this));
                            });
                          
                        $filters.find('.cat-item.all').addClass('active');
                    }
                    
                    setTimeout(function(){
                        $mContainer.masonry({
                    		columnWidth: '.xList-item',
                    		itemSelector: '.xList-item'
                    	});
                    },100);
    
                });
                
                $filters.find('.cat-item.all').on('click', function(){
                    $mContainer.empty();
                    $(cache).each(function(){
                        $($mContainer).append($(this));
                    });
    
                    if(!$multiSelect){
                        jQuery('.cat-items.filters .cat-item.active input').prop('checked',false);
                        jQuery('.cat-items.filters .cat-item.active').removeClass('active');
                    }else{
                        jQuery('.cat-items.filters .cat-item.active input').click(); 
                    }
                    
                    jQuery(this).addClass('active');
                    
                    setTimeout(function(){
                        $mContainer.masonry({
                    		columnWidth: '.xList-item',
                    		itemSelector: '.xList-item'
                    	});
                    },100);
                });
            }
        });
	}
}
/** END R2G Flex xList Main Strip - CSE **/

/** START R2G Rotator Main Strip - CSE **/
addToAutoLoadLibs(_base_path+'js/libs/slick/slick.min.js', rotatorMS);
addToAutoLoadLibs(_base_path+'js/libs/slick/slick.min.css');

function rotatorMS(){
    jQuery('.r2g-rotator-main-strip').each(function(){
        var wW = jQuery(window).width(),
            $that = jQuery(this),
            attibutes =  $that.data(),
            dataPagerClass = $that.attr('data-active-pager-class').split('.')[1],
            dataArrowClass = $that.attr('data-active-arrow-class').split('.')[1];

        var $sliderPDiv = $that.find('> .container > .rotatorElement > ul.xList-items'),
            $pagerDiv = $that.find('> .container > .rotatorElement .pager-wrapper'),
            $countDiv = $that.find('> .container > .rotatorElement .pager-wrapper .pager-count'),
            $arrowDiv = $that.find('> .container > .rotatorElement .arrows-wrapper'),
            $thumbDiv = $that.find('> .container > .rotatorElement .thumb-wrapper');
            $thumbInnerDiv = $that.find('> .container > .rotatorElement .thumb-wrapper .thumb-inner-wrapper');
        
        if(attibutes.pager && !$that.hasClass('pager-as-thumbs')){
            $pagerDiv.attr({
                'data-cse_class_to_apply':'.r2g-rotator-main-strip.'+dataPagerClass+' .pager-wrapper', 
                'data-cse_name':'Pager Wrapper'
            });
            
            if($that.hasClass('pager-as-bullets')){
                $pagerDiv.append('<span style="display:none;" data-cse_class_to_apply=".r2g-rotator-main-strip.'+dataPagerClass+' .pager-wrapper .slick-dots" data-cse_name="Slick Dots Wrapper"></span><span style="display:none;" data-cse_class_to_apply=".r2g-rotator-main-strip.'+dataPagerClass+' .pager-wrapper li" data-cse_name="All Pagers"></span><span style="display:none;" data-cse_class_to_apply=".r2g-rotator-main-strip.'+dataPagerClass+' .pager-wrapper .slick-active" data-cse_name="Active Pager"></span>');
            }
        }
        
        if(attibutes.arrows){
            $arrowDiv.attr({
                'data-cse_class_to_apply':'.r2g-rotator-main-strip.'+dataArrowClass+'.'+dataPagerClass+' .arrows-wrapper', 
                'data-cse_name':'Arrow Wrapper'
            });
        }
        
        if(attibutes.pager == true && $that.hasClass('pager-as-thumbs')){
            $thumbDiv.attr({
                'data-cse_class_to_apply':'.r2g-rotator-main-strip .thumb-wrapper', 
                'data-cse_name':'Thumb Wrapper'
            });
            
            $thumbDiv.prepend('<span style="display:none;" data-cse_class_to_apply=".r2g-rotator-main-strip .thumb-wrapper .rotatorThumbs" data-cse_name="All Thumbs"></span><span style="display:none;" data-cse_class_to_apply=".r2g-rotator-main-strip .thumb-wrapper .slick-current .rotatorThumbs" data-cse_name="Active Thumb"></span>');
        }
        
        $sliderPDiv.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
            if($pagerDiv.children('.slick-dots').length){
                var $totalCount = $pagerDiv.find('ul.slick-dots li').length,
                    i = $pagerDiv.find('ul.slick-dots li.slick-active').index() + 1;
                $activeCount = (i < 10) ? "0"+i : i;
                $totalCount = ($totalCount < 10) ? "0"+$totalCount : $totalCount;
                $countDiv.html('<span class="slideCountItem">' + $activeCount + '</span> ' + '<span class="separator">/</span>' + ' <span class="slideCountAll">' + $totalCount + '</span>');
            }
            
            if($arrowDiv.find('.slick-arrow').length > 0 && $that.hasClass('arrows-with-icon-and-image')){
                var prevImg = $sliderPDiv.find('.slick-slide.slick-active').first().prev('.slick-slide').find('.image-wrapper img').attr('src');
                var nextImg = $sliderPDiv.find('.slick-slide.slick-active').last().next('.slick-slide').find('.image-wrapper img').attr('src');
                
                var prevIcon = '<span style="background-image: url('+prevImg+')" class="arrow-image prev-img" data-cse_class_to_apply=".r2g-rotator-main-strip.arrows-with-icon-and-image .nav-left .arrow-image" data-cse_name="Left Arrow Thumb"></span>';
                var nextIcon = '<span style="background-image: url('+nextImg+')" class="arrow-image next-img" data-cse_class_to_apply=".r2g-rotator-main-strip.arrows-with-icon-and-image .nav-right .arrow-image|.r2g-rotator-main-strip.arrows-with-icon-and-image .mouse-over .arrow-image" data-cse_name="Right Arrow Thumb | On Mouse Over Arrow Thumb"></span>';

                if($arrowDiv.find('.prev .arrow-image').length == 0){
                    $arrowDiv.find('.prev').prepend(prevIcon);
                } else {
                    $arrowDiv.find('.prev .arrow-image').css({
                      'backgroundImage' : 'url('+prevImg+')'
                    });
                }
                
                if($arrowDiv.find('.next .arrow-image').length == 0){
                    $arrowDiv.find('.next').prepend(nextIcon);
                } else {
                    $arrowDiv.find('.next .arrow-image').css({
                      'backgroundImage' : 'url('+nextImg+')'
                    });
                }
            }
        });
        
        if(attibutes.pager == true && $that.hasClass('pager-as-fraction')){
            $pagerDiv.children('.pager-count').attr({
                'data-cse_class_to_apply':'.r2g-rotator-main-strip .slideCountItem|.r2g-rotator-main-strip .separator|.r2g-rotator-main-strip .slideCountAll', 
                'data-cse_name':'Active Slide Index | Pager Separator | Total Slide Count'
            });
        }
        
        var $pagNav = '';
        
        if(attibutes.pager == true && $that.hasClass('pager-as-thumbs')){
            $pagNav = $thumbInnerDiv;
        }else{
            $pagNav = $pagerDiv;
        }

        $sliderPDiv.slick({
            infinite: attibutes.infinite,
            fade: attibutes.fade,
            autoplay: attibutes.auto,
            autoplaySpeed: attibutes.autoplaySpeed,
            vertical: attibutes.vertical,
            verticalSwiping: attibutes.vertical,
            centerMode: attibutes.centerMode,
            centerPadding: attibutes.centerPadding,
            dots: attibutes.pager,
            arrows: attibutes.arrows,
            slidesToShow: attibutes.desktop,
            slidesToScroll: attibutes.scrollDesktop,
            adaptiveHeight: attibutes.adaptiveHeight,
            speed: attibutes.speed,
            appendDots: $pagerDiv,
            appendArrows: $arrowDiv,
            rows: attibutes.desktopRows,
            slidesPerRow: attibutes.desktopRowItems,
            customPaging: function(slider, index) {
                if($that.hasClass('pager-as-thumbs')){
                    if(jQuery(slider.$slides[index]).find(".image-wrapper img").length){
                        $this = jQuery(slider.$slides[index]).find(".image-wrapper img");
                        
                        var thumb = '',
                            attr = $this.attr('data-img-src');
                        if (typeof attr !== typeof undefined && attr !== false) {   
                            thumb = $this.attr('data-img-src');
                        }else{
                            thumb = $this.attr('src');
                        }
                        if(!$thumbInnerDiv.hasClass('slick-initialized')){
                            $thumbInnerDiv.append('<div class="thumb"><div class="rotatorThumbs" data-index="'+index+'" data-src="'+thumb+'" style="background-image:url('+thumb+')"></div></div>');
                        }
                        return false;
                    }
                } else {
                    return  '<span class="slickNumber" data-slick-index="' + index + '">' + (index+1) + '</span>';
                }               
            },
            prevArrow: '<div class="prev nav-left" data-cse_class_to_apply=".r2g-rotator-main-strip.'+dataArrowClass+' .nav-arrow-group .nav-left" data-cse_name="Left Arrow"><span class="line-one" data-cse_class_to_apply=".r2g-rotator-main-strip.'+dataArrowClass+' .arrows-wrapper .line-one" data-cse_name="Left Arrow Icon"></span><span class="line-two"></span></div>',
            nextArrow: '<div class="next nav-right" data-cse_class_to_apply=".r2g-rotator-main-strip.'+dataArrowClass+' .nav-arrow-group .nav-right" data-cse_name="Right Arrow"><span class="line-one" data-cse_class_to_apply=".r2g-rotator-main-strip.'+dataArrowClass+' .arrows-wrapper .line-one|.r2g-rotator-main-strip.'+dataArrowClass+' .arrows-wrapper .mouse-over.slick-arrow|.r2g-rotator-main-strip.'+dataArrowClass+' .arrows-wrapper .mouse-over .line-one" data-cse_name="Right Arrow Icon | On Mouse Over Arrow | On Mouse Over Arrow Icon"></span><span class="line-two"></span></div>',
            responsive: [
                {
                    breakpoint: 1366,
                    settings: {
                        slidesToShow:attibutes.landscape,
                        slidesToScroll:attibutes.scrollLandscape,
                        rows:attibutes.landscapeRows,
                        slidesPerRow:attibutes.landscapeRowItems,
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow:attibutes.portrait,
                        slidesToScroll:attibutes.scrollPortrait,
                        rows:attibutes.portraitRows,
                        slidesPerRow:attibutes.portraitRowItems,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow:attibutes.mobile,
                        slidesToScroll:attibutes.scrollMobile,
                        rows:attibutes.mobileRows,
                        slidesPerRow:attibutes.mobileRowItems,
                    }
                }
            ]
        });
        if(attibutes.pager == true && $that.hasClass('pager-as-thumbs')){
            $sliderPDiv.slick("slickSetOption", "asNavFor", $pagNav);
            $pagerDiv.find('.slick-dots').remove();
        
            $thumbDiv.append('<div class="arrows-wrapper"></div>');
            var $thumbArrowDiv = $thumbDiv.find('.arrows-wrapper');
            
            $thumbInnerDiv.slick({
                slidesToShow:attibutes.thumbsDesktop,
                slidesToScroll: 1,
                asNavFor: $sliderPDiv,
                dots: false,
                focusOnSelect: true,
                appendArrows: $thumbArrowDiv,
                prevArrow: '<div class="prev nav-left" data-cse_class_to_apply=".r2g-rotator-main-strip .thumb-wrapper .slick-arrow|.r2g-rotator-main-strip .thumb-wrapper .slick-arrow .line-one" data-cse_name="Thumb Arrow | Thumb Arrow Icon"><span class="line-one"></span><span class="line-two"></span></div>',
                nextArrow: '<div class="next nav-right"><span class="line-one"></span><span class="line-two"></span></div>',
                responsive: [
                {
                    breakpoint: 1366,
                    settings: {
                        slidesToShow:attibutes.thumbsLandscape,
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow:attibutes.thumbsPortrait,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow:attibutes.thumbsMobile,
                    }
                }
            ]
            });
        }
        
        if(wW > 1200 && attibutes.arrows){
            $that.find('.arrows-wrapper .nav-left, .arrows-wrapper .nav-right').each(function(){
                jQuery(this).mouseover(function() {
                    jQuery(this).addClass('mouse-over');
                }).mouseout(function() {
                    jQuery(this).removeClass('mouse-over');
                });
            });
        }
     });
}
/** END R2G Rotator Main Strip - CSE **/

/** START R2g Tab Main Strip - CSE **/
addToAutoLoadLibs(_base_path+'js/libs/slick/slick.min.css');
//addToAutoLoadLibs(_base_path+'js/libs/custom-scrollbar/v-3-1-5/jquery.mCustomScrollbar.min.css');
//addToAutoLoadLibs(_base_path+'js/libs/custom-scrollbar/v-3-1-5/jquery.mousewheel.min.js', scroll);
//addToAutoLoadLibs(_base_path+'js/libs/custom-scrollbar/v-3-1-5/jquery.mCustomScrollbar.min.js', scroll);
addToAutoLoadLibs(_base_path+'js/libs/slick/slick.min.js', r2gTabsMainStrip);

//function scroll(){}
function r2gTabsMainStrip(){
    
    var windowW = jQuery(window).width();
    
    jQuery('.r2g-tabs-main-strip').each(function(){
        console.log('a');
        var tabMS = jQuery(this),
            firstLevelItems = tabMS.find('.first-level > li'),
            nextLevelItems = firstLevelItems.find('.next-level > ul > li'),
            tabTitles = tabMS.find('.tab-titles-wrapper'),
            tabContentWrapper = tabMS.find('.tab-content-wrapper'),
            direction = (tabMS.hasClass('vertical-tabs')) ? true : false,
            dataClass = tabMS.attr('data-class');

            var html =  '';
            
            html += '<ul class="tab-items-wrapper list-style-none top-level">';
                
            var i = 1;
            
            firstLevelItems.each(function(){
                var firstLevelItem = jQuery(this),
                    firstLevelItemTitle = firstLevelItem.attr('data-title'),
                    nextLevelClass = (firstLevelItem.find('.next-level').length > 0) ? 'has-sub-level' : 'no-sub-level',
                    subLevelHTML = '';
                
                firstLevelItem.wrapInner( '<div class="accordion-content"></div>');
                
                firstLevelItem.addClass('item-'+i).attr('data-id','item-'+i);

                var activeClass = (i == 1) ? 'active' : '';
                    
                    html += '<li id="item-' + i + '" class="tab-title first-level-tab-title item-' + i + ' ' + nextLevelClass + ' ' + activeClass + '"><span class="first-level-label" data-cse_class_to_apply=".r2g-tabs-main-strip'+dataClass+' .first-level-tab-title.item-'+i+' .first-level-label" data-cse_name="First Level Tab Item '+i+'">' + firstLevelItemTitle + '</span>';
                    
                    
                    
                    firstLevelItem.prepend('<h3 class="accordion-title" data-cse_class_to_apply=".r2g-tabs-main-strip'+dataClass+' .first-level > .item-'+i+' .accordion-title" data-cse_name="First Level Accordion Title '+i+'">' + firstLevelItemTitle + '<span class="icon-i-213-down-arrow-bold"></span></h3>');
                    
                    if(firstLevelItem.find('.next-level').length > 0){
                        
                        firstLevelItem.addClass('has-sub-level');
                        
                        var subLevelItems = firstLevelItem.find('> .accordion-content .next-level > ul > li');
                        
                        subLevelHTML += '<div class="sub-tab-titles-wrapper"><ul class="tab-items-wrapper list-style-none sub-level level-' + i + '">';
                          
                        var j = 1;
                        
                        subLevelItems.each(function(){
                            var subLevelItem = jQuery(this),
                                subLevelItemTitle = subLevelItem.attr('data-title');
                                
                            subLevelItem.addClass('item-' + i + '-' + j).attr('data-id','item-' + i + '-' + j);
                            
                            var activeClass = (j == 1) ? 'active' : '';
                            
                            subLevelItem.wrapInner( '<div class="accordion-content"></div>');
                            
                            subLevelItem.prepend('<h3 class="sub-l accordion-title" data-cse_class_to_apply=".r2g-tabs-main-strip'+dataClass+' .next-level > .item-' + i + '-' + j +' .accordion-title" data-cse_name="Next Level Accordion Title '+i+'">' + subLevelItemTitle + '<span class="icon-i-213-down-arrow-bold"></span></h3>');
                            
                            subLevelHTML += '<li id="item-' + i + '-' + j +'" class="tab-title sub-level-tab-title item-' + i + '-' + j +'"><span class="next-level-label" data-cse_class_to_apply=".r2g-tabs-main-strip'+dataClass+' .sub-level-tab-title.item-'+j+' .next-level-label" data-cse_name="Second Level Tab Item '+j+'">' + subLevelItemTitle + '</span>';
                            
                            j++;
                            
                        });
                        
                        subLevelHTML += '</ul>';
                        subLevelHTML += '<div class="arrows-wrapper sub-level-arrows-wrapper" data-cse_class_to_apply=".r2g-tabs-main-strip'+dataClass+' .sub-level-arrows-wrapper" data-cse_name="Second Level Arrows Wrapper"></div></div>';
                        
                        if(windowW < 767 || tabMS.hasClass('horizontal-tabs')){
                            firstLevelItem.prepend( subLevelHTML );
                        } else {
                            html += subLevelHTML;
                        }
                    }
                    html += '</li>';
                    
                i++;
                    
            });
            
            html += '</ul>';
            
            if(windowW > 767 && tabMS.hasClass('horizontal-tabs')){
                html += '<div class="arrows-wrapper top-level-arrows-wrapper" data-cse_class_to_apply=".r2g-tabs-main-strip'+dataClass+' .top-level-arrows-wrapper" data-cse_name="Arrows Wrapper"></div>';
            }
        
            tabTitles.html( html );
            
            if((tabMS.hasClass('show-as-tabs-on-768') || tabMS.hasClass('show-as-tabs-on-1024')) && windowW > 767 && direction){
                /* vertical */
                var introContent = tabMS.find('> .tabs-wrapper > .container > .intro-content').clone(),
                    bottomContent = tabMS.find('> .tabs-wrapper > .container > .bottom-content').clone();
                    
                tabMS.find('.tab-titles-wrapper').prepend( introContent );
                tabMS.find('.tab-titles-wrapper').append( bottomContent );
                
                tabMS.find('.tab-titles-wrapper .intro-content').attr({
                    'data-cse_class_to_apply':'.r2g-tabs-main-strip.vertical-tabs .tab-titles-wrapper .intro-content', 
                    'data-cse_name':'Tab Titles Intro Content'
                });
                tabMS.find('.tab-titles-wrapper .bottom-content').attr({
                    'data-cse_class_to_apply':'.r2g-tabs-main-strip.vertical-tabs .tab-titles-wrapper .bottom-content', 
                    'data-cse_name':'Tab Titles Bottom Content'
                });
            }
            
            var topLevelArrowsDiv = tabTitles.find('.top-level-arrows-wrapper');
            var attributes = tabMS.data();

            if(tabMS.hasClass('horizontal-tabs-with-rotator') && !direction || (tabMS.hasClass('horizontal-tabs-with-rotator') && tabMS.find('.sub-tab-titles-wrapper').length == 0 && direction)){
                tabMS.find('.tab-items-wrapper.top-level').slick({
                    infinite: false,
                    slidesToShow: attributes.largeDesktop,
                    speed: 1000,
                    dots: false,
                    arrows: true,
                    vertical: direction,
                    loop: true,
                    appendArrows: topLevelArrowsDiv,
                    prevArrow : '<div class="prev nav-left"><span class="line-one"></span><span class="line-two"></span></div>',
                    nextArrow : '<div class="next nav-right"><span class="line-one"></span><span class="line-two"></span></div>',
                    responsive: [
                        {
                          breakpoint: 1600,
                          settings: {
                            slidesToShow: attributes.desktop
                          }
                        },
                        {
                          breakpoint: 1280,
                          settings: {
                            slidesToShow: attributes.landscape
                          }
                        },
                        {
                          breakpoint: 1024,
                          settings: {
                            slidesToShow: attributes.portrait
                          }
                        },
                        {
                          breakpoint: 768,
                          settings: {
                            slidesToShow: attributes.mobile
                          }
                        }
                    ]
                });
            } else if(direction) {
                var hash = window.location.hash,
                    activeItem   = tabMS.find('.tab-content-wrapper .xList-item[data-url="'+hash+'"]'),
                    activeItemID = activeItem.attr('data-id');
                //$.when( $.ajax( "/libs/custom-scrollbar/v-3-1-5/jquery.mousewheel.min.js" ), $.ajax( "/libs/custom-scrollbar/v-3-1-5/jquery.mCustomScrollbar.min.js" ) ).done(function( mousewheel, mCustomScrollbar ) {
                    /*tabMS.find(".tab-titles-wrapper").mCustomScrollbar({
                        documentTouchScroll: true,
                        scrollTo: 'top',
                        contentTouchScroll: 15,
                        callbacks:{
                            onInit:function(){
                                $(".tab-titles-wrapper").mCustomScrollbar("scrollTo", '#'+activeItemID);
                            }
                        }
                    });*/
                //});
            }
            
            tabMS.find('.sub-tab-titles-wrapper').each(function(){
                var subLevelArrowsDiv = jQuery(this).find('.sub-level-arrows-wrapper');
                
                if(tabMS.hasClass('horizontal-tabs-with-rotator') || direction){
                    jQuery(this).find('.tab-items-wrapper').slick({
                        infinite: false,
                        slidesToShow: attributes.secondLevelLargeDesktop,
                        speed: 1000,
                        dots: false,
                        arrows: true,
                        vertical: direction,
                        appendArrows: subLevelArrowsDiv,
                        prevArrow : '<div class="prev nav-left"><span class="line-one"></span><span class="line-two"></span></div>',
                        nextArrow : '<div class="next nav-right"><span class="line-one"></span><span class="line-two"></span></div>',
                        responsive: [
                            {
                              breakpoint: 1600,
                              settings: {
                                slidesToShow: attributes.secondLevelDesktop
                              }
                            },
                            {
                              breakpoint: 1280,
                              settings: {
                                slidesToShow: attributes.secondLevelLandscape
                              }
                            },
                            {
                              breakpoint: 1024,
                              settings: {
                                slidesToShow: attributes.secondLevelPortrait
                              }
                            },
                            {
                              breakpoint: 768,
                              settings: {
                                slidesToShow: attributes.secondLevelMobile
                              }
                            }
                        ]
                    });
                }
            });
        
        var seoUrl = '';
        
        tabMS.find('> .tabs-wrapper').on('click', '.tab-items-wrapper .tab-title > span', function(){
            var currentItem = jQuery(this).parent('li'),
                thisID = currentItem.attr('id');

            currentItem.siblings().removeClass('active');
            currentItem.closest('.slick-slide').siblings().find('.tab-title').removeClass('active');
            currentItem.addClass('active');
            
            tabContentWrapper.find('.'+thisID).siblings().removeClass('active');
            tabContentWrapper.find('.'+thisID).addClass('active');
            
            if(currentItem.hasClass('has-sub-level')){
                
                if(tabMS.hasClass('vertical-tabs')){
                    var firstLevelFirstItem = currentItem.parents('.first-level-tab-title').attr('id'); 
                    tabContentWrapper.find('.'+firstLevelFirstItem).addClass('active');
                }
                
                if(windowW > 767 && direction){
                    /* vertical */
                    var nextLevelFirstItem = currentItem.find('.tab-items-wrapper .'+thisID+'-1 > span');
                    nextLevelFirstItem.trigger('click');
                    
                } else {
                    /* horizontal */
                    var activeContent = tabContentWrapper.find('.'+thisID),
                        nextLevelFirstItem = activeContent.find('.tab-items-wrapper .'+thisID+'-1 > span');
                    
                    nextLevelFirstItem.trigger('click');
                    
                    if(tabMS.hasClass('horizontal-tabs-with-rotator')){
                        tabMS.find('.tab-content-wrapper .'+thisID+' .sub-tab-titles-wrapper .tab-items-wrapper').slick('slickGoTo', 0);
                    }
                    
                }
            } else {
                seoUrl = removeVarTabUrl(tabContentWrapper.find('.xList-item.'+thisID).attr('data-url'));
            }
            
            var activeItem = jQuery(this).parents('.slick-active');

            if(windowW > 767 && !direction && !activeItem.hasClass('slick-current')){
                activeItem.parents('.tab-items-wrapper').siblings('.arrows-wrapper').find('.next').trigger('click');
            }
            
            if(typeof seoUrl != 'undefined' && seoUrl){
                window.location.hash = seoUrl;
            }
            
        });
        
        tabMS.find('.tab-content-wrapper .accordion-title').on('click', function(){
            var currentItem = jQuery(this),
                headerH = (jQuery(window).width() < 768 && jQuery('.header-bottom-bar .primary-button').is(':visible')) ? jQuery('header').height() + jQuery('.header-bottom-bar .primary-button').height() : jQuery('header').height(),
                seoUrl = removeVarTabUrl(currentItem.parent('.xList-item').attr('data-url'));
            
            if(typeof seoUrl != 'undefined' && seoUrl){
                window.location.hash = seoUrl;
            }
            
            currentItem.parent('.xList-item').siblings().find('> .accordion-content').slideUp(function(){
                jQuery(this).parent('.xList-item').removeClass('active');
            });
            currentItem.siblings('.accordion-content').slideDown(function(){
                var currentItemTop = currentItem.offset().top;
                
                jQuery(this).parent('.xList-item').addClass('active');
                jQuery("html, body").animate({ scrollTop: (currentItemTop - headerH - 50)});
            });
            
            if(currentItem.siblings('.accordion-content').find('.next-level').length > 0){
                currentItem.siblings('.accordion-content').find('.next-level > ul > li').first().find('.accordion-title').click();
            }
            
            var id = currentItem.parent('.xList-item').attr('data-id');
            jQuery(this).parents('.tabs-wrapper').find('.tab-items-wrapper #'+id+' > span').trigger('click');
        });
        
        if(windowW > 767){
            jQuery('.sub-tab-titles-wrapper').each(function(){
                var arrows = jQuery(this).find('.slick-arrow').length > 0;
                if(arrows){
                    jQuery(this).addClass('with-arrows');
                }
            });
        }
        
        var hash = window.location.hash;
        
        if(typeof hash != 'undefined' && hash){
            var activeItem   = tabMS.find('.tab-content-wrapper .xList-item[data-url="'+hash+'"]'),
                activeItemID = activeItem.attr('data-id'),
                firstLevel  = activeItem.parents('.xList-item'),
                firstLevelID = firstLevel.attr('data-id');
            
            firstLevel.addClass('active');
            firstLevel.parents('.r2g-tabs-main-strip').find('#'+firstLevelID).addClass('active');
            
            var parentTab = firstLevel.parents('.r2g-tabs-main-strip');
            
            jQuery('.tab-items-wrapper #'+activeItemID+' > span').trigger('click');
            
        } else {
            jQuery('.tab-items-wrapper #item-1 > span').trigger('click');
        }
        
        tabMS.addClass('tabs-initialized');
        
    });

    jQuery(window).on('resize', function(){
        
        setTimeout(function(){
            var windowW = jQuery(window).width();
        
            if(windowW > 767){
                jQuery('.sub-tab-titles-wrapper').each(function(){
                    var arrows = jQuery(this).find('.slick-arrow').length > 0;
                    if(arrows){
                        jQuery(this).addClass('with-arrows');
                    }else{
                        jQuery(this).removeClass('with-arrows');
                    }
                });
                
                jQuery('.r2g-tabs-main-strip .tab-content-wrapper .accordion-content').removeAttr('style');
            }
            
        },800);
                
    });
    
    function removeVarTabUrl(src){
        src = src.replace(/<!--{var-(.*?)-->/gm, '');
        src = src.replace(/<!--var-(.*?)}-->/gm, '');
        return src;
    }
    
}
/** END R2g Tab Main Strip - CSE **/

/** START R2G Form Main Strip - CSE **/
jQuery(document).ready(function(){
    jQuery('.r2g-form-main-strip').each(function(){
       
        var formStrip = jQuery(this),
            formGroup = formStrip.find('.form-group'),
            success = formStrip.find('.form-wrapper .success'),
            failed = formStrip.find('.form-wrapper .failed');
        
        /* scroll down to success or failed message */
        if(success.length > 0 || failed.length > 0){
            $("html, body").animate({ scrollTop: '10px' }, 10);
            
            setTimeout(function(){
                var headerH = jQuery('.r2g-header').height(),
                    branding = jQuery('.r2g-header #branding').height(),
                    fixedHeaderH = (headerH > branding) ? headerH : branding,
                    stripTop = formStrip.offset().top;
    
                
                    $("html, body").animate({ scrollTop: (stripTop - fixedHeaderH) }, 800);
                
            },10);
        }
        
        
        /* CSE */
        if(formGroup.length > 0){
            
            var i = 1;
            formGroup.each(function(){
                jQuery(this).addClass('item-'+i);
                
                jQuery(this).attr({
                    'data-cse_class_to_apply':'.r2g-form-main-strip .form-group.item-'+i, 
                    'data-cse_name':'Form Group'+i
                });
                
                i++;
            });
            
            if(formStrip.find('.primary-button').length > 0){
                formStrip.find('.primary-button').parent('.fb-button').addClass('fb-primary-button');
            }
            
            if(formStrip.find('.secondary-button').length > 0){
                formStrip.find('.secondary-button').parent('.fb-button').addClass('fb-secondary-button');
            }
            
        }
       
   });
    
});

addToAutoLoadLibs(_base_path+'js/libs/jquery-ui/jquery-ui.min.js', formsScript);
addToAutoLoadLibs(_base_path+'js/libs/jquery-validation/jquery.validate.min.js', formValidation);


function formsScript(){
    jQuery('.r2g-form').each(function(){
        
    	var formStrip = jQuery(this),
    	    dpFields = formStrip.find( ".init-dp" );
    
    	if( dpFields.length > 0 ){
    		if( $.datepicker ){
    			dpFields.each(function(){
                    
                    var dateToday = new Date();
    				var dp = $(this),
    					opt = {
    					    minDate: (formStrip.hasClass('disable')) ? dateToday : ''
    					},
    					dateFormat = dp.data('altformat'),
    					altFormat = dp.data('dateformat');
    
    				if( dateFormat ){
    					opt.dateFormat = dateFormat;
    				}
    
    				if( altFormat ){
    					opt.altFormat = altFormat;
    				}
    				
    				dp.datepicker(opt);
    			});
    		}else{
    			console.error('CMS Forms - Datepicker is not defined. Please load Datepicker first.');
    		}
    	}
    });
}

function formValidation(){
    $.validator.setDefaults({ignore: []});

    //Email validation
    $.validator.addMethod("laxEmail", function(value, element) {
        return this.optional( element ) || /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test( value );
    }, 'Please enter a valid email address.');
    
    var fileInputs = document.querySelectorAll( '.fb-file .form-control' );
        Array.prototype.forEach.call( fileInputs, function( input )
        {
            var label    = input.nextElementSibling,
                labelVal = label.innerHTML;
        
            input.addEventListener( 'change', function( e )
            {
                var fileName = '';
                if( this.files && this.files.length > 1 )
                    fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                else
                    fileName = e.target.value.split( '\\' ).pop();
        
                if( fileName )
                    label.querySelector( 'span' ).innerHTML = fileName;
                else
                    label.innerHTML = labelVal;
            });
        });


    $('.cms-form').each(function(){
        var $form = $(this);
        $form.validate({

            errorPlacement: function( error, ele ) {

                var type = ele[0].type.toLowerCase();
                if ( type == 'radio' ) {
                    error.appendTo( ele.parents('.radio-group') );
                } else if (type == 'checkbox') {
                    if (ele.parents('.checkbox-group').length) {
                        error.appendTo( ele.parents('.checkbox-group') );
                    } else {
                        error.appendTo( ele.parents('.checkbox.fb-cr') );
                    }
                } else {
                    error.appendTo( ele.parents('.form-group') ); 
                }

            }

        });
    });

    $.validator.addClassRules({
        required: {
            required: true
        }

    });
}
/** END R2G Form Main Strip - CSE **/

/** START R2G xList Accordion Sub Component - CSE **/
jQuery(document).ready(function(){
    jQuery('.r2g-xlist-accordion-sub-component').each(function(){
        
        var accordion = jQuery(this),
            collapsible = (accordion.hasClass('multiple-active')) ? true : false,
            item = accordion.find('> .accordion-xlist > .sub-accordion-wrapper > li');

        var i = 0;
        item.each(function(){
            jQuery(this).attr('id', 'item-'+i);
            i++;
        });
        
        item.find('> .accordion-title').on('click', function(){
            var activeItem = jQuery(this);
            
            if(collapsible || item.length == 1){
                activeItem.parent().toggleClass('active');
                activeItem.siblings('.inner-wrapper').slideToggle();
            } else {
                activeItem.parent().siblings('.xList-item').find('.inner-wrapper').slideUp(function(){
                    activeItem.parent().siblings('.xList-item').removeClass('active');
                    activeItem.parent().addClass('active');
                    
                    var hasSlick = (activeItem.siblings('.inner-wrapper').find('.slick-initialized').length > 0 && !activeItem.siblings('.inner-wrapper').find('.slick-initialized').hasClass('slick-refreshed')) ? true : false;
                    
                    activeItem.siblings('.inner-wrapper').slideDown(function(){
                        
                        if(hasSlick){
                            activeItem.siblings('.inner-wrapper').find('.slick-slider').addClass('slick-refreshed');
                            activeItem.siblings('.inner-wrapper').find('.slick-slider').slick('refresh');
                        }
                        
                    });
                });
            }
        });
        
        accordion.find('#item-0 > .accordion-title').trigger('click');
        
    });
});
/** END R2G xList Accordion Sub Component - CSE **/

addToAutoLoadLibs(_base_path+'js/libs/custom-scrollbar/jquery.mousewheel.min.js');
addToAutoLoadLibs(_base_path+'js/libs/custom-scrollbar/jquery.mCustomScrollbar.min.css');
addToAutoLoadLibs(_base_path+'js/libs/custom-scrollbar/jquery.mCustomScrollbar.min.js', bookaSession);

function bookaSession(){
    $('.popup-box .form-wrapper').mCustomScrollbar();
}

/** START R2G Rotator Sub Component - CSE **/
addToAutoLoadLibs(_base_path+'js/libs/slick/slick.min.js', rotatorSC);
addToAutoLoadLibs(_base_path+'js/libs/slick/slick.min.css');
function rotatorSC() {
    jQuery('.r2g-rotator-sub-component').each(function() {
        var d = jQuery(window).width()
          , a = jQuery(this)
          , e = a.data()
          , o = a.attr('data-active-pager-class').split('.')[1]
          , s = a.attr('data-active-arrow-class').split('.')[1]
          , i = a.find('> .rotatorElement > ul.xList-items')
          , r = a.find('> .rotatorElement .pager-wrapper')
          , c = a.find('> .rotatorElement .pager-wrapper .pager-count')
          , t = a.find('> .rotatorElement .arrows-wrapper')
          , n = a.find('> .rotatorElement .thumb-wrapper');
        $thumbInnerDiv = a.find('> .rotatorElement .thumb-wrapper .thumb-inner-wrapper');
        if (e.pager && !a.hasClass('pager-as-thumbs')) {
            r.attr({
                'data-cse_class_to_apply': '.r2g-rotator-sub-component.' + o + ' .pager-wrapper',
                'data-cse_name': 'Pager Wrapper'
            });
            if (a.hasClass('pager-as-bullets')) {
                r.append('<span style="display:none;" data-cse_class_to_apply=".r2g-rotator-sub-component.' + o + ' .pager-wrapper .slick-dots" data-cse_name="Slick Dots Wrapper"></span><span style="display:none;" data-cse_class_to_apply=".r2g-rotator-sub-component.' + o + ' .pager-wrapper li" data-cse_name="All Pagers"></span><span style="display:none;" data-cse_class_to_apply=".r2g-rotator-sub-component.' + o + ' .pager-wrapper .slick-active" data-cse_name="Active Pager"></span>')
            }
        }
        ;if (e.arrows) {
            t.attr({
                'data-cse_class_to_apply': '.r2g-rotator-sub-component.' + s + '.' + o + ' .arrows-wrapper',
                'data-cse_name': 'Arrow Wrapper'
            })
        }
        ;if (e.pager == !0 && a.hasClass('pager-as-thumbs')) {
            n.attr({
                'data-cse_class_to_apply': '.r2g-rotator-sub-component  .thumb-wrapper',
                'data-cse_name': 'Thumb Wrapper'
            });
            n.prepend('<span style="display:none;" data-cse_class_to_apply=".r2g-rotator-sub-component  .thumb-wrapper .rotatorThumbs" data-cse_name="All Thumbs"></span><span style="display:none;" data-cse_class_to_apply=".r2g-rotator-sub-component  .thumb-wrapper .slick-current .rotatorThumbs" data-cse_name="Active Thumb"></span>')
        }
        ;i.on('init reInit afterChange', function(e, s, o, l) {
            if (r.children('.slick-dots').length) {
                var n = r.find('ul.slick-dots li').length
                  , p = r.find('ul.slick-dots li.slick-active').index() + 1;
                $activeCount = (p < 10) ? '0' + p : p;
                n = (n < 10) ? '0' + n : n;
                c.html('<span class="slideCountItem">' + $activeCount + '</span> <span class="separator">/</span> <span class="slideCountAll">' + n + '</span>')
            }
            ;if (t.find('.slick-arrow').length > 0 && a.hasClass('arrows-with-icon-and-image')) {
                var d = i.find('.slick-slide.slick-active').first().prev('.slick-slide').find('.image-wrapper img').attr('src')
                  , u = i.find('.slick-slide.slick-active').last().next('.slick-slide').find('.image-wrapper img').attr('src')
                  , m = '<span style="background-image: url(' + d + ')" class="arrow-image prev-img" data-cse_class_to_apply=".r2g-rotator-sub-component.arrows-with-icon-and-image .nav-left .arrow-image" data-cse_name="Left Arrow Thumb"></span>'
                  , f = '<span style="background-image: url(' + u + ')" class="arrow-image next-img" data-cse_class_to_apply=".r2g-rotator-sub-component.arrows-with-icon-and-image .nav-right .arrow-image|.r2g-rotator-sub-component.arrows-with-icon-and-image .mouse-over .arrow-image" data-cse_name="Right Arrow Thumb | On Mouse Over Arrow Thumb"></span>';
                if (t.find('.prev .arrow-image').length == 0) {
                    t.find('.prev').prepend(m)
                } else {
                    t.find('.prev .arrow-image').css({
                        'backgroundImage': 'url(' + d + ')'
                    })
                }
                ;if (t.find('.next .arrow-image').length == 0) {
                    t.find('.next').prepend(f)
                } else {
                    t.find('.next .arrow-image').css({
                        'backgroundImage': 'url(' + u + ')'
                    })
                }
            }
        });
        var l = '';
        if (e.pager == !0 && a.hasClass('pager-as-thumbs')) {
            l = $thumbInnerDiv
        } else {
            l = r
        }
        ;i.slick({
            infinite: e.infinite,
            fade: e.fade,
            autoplay: e.auto,
            autoplaySpeed: e.autoplaySpeed,
            vertical: e.vertical,
            verticalSwiping: e.vertical,
            centerMode: e.centerMode,
            centerPadding: e.centerPadding,
            dots: e.pager,
            arrows: e.arrows,
            slidesToShow: e.desktop,
            slidesToScroll: e.scrollDesktop,
            adaptiveHeight: e.adaptiveHeight,
            speed: e.speed,
            appendDots: r,
            appendArrows: t,
            rows: e.desktopRows,
            slidesPerRow: e.desktopRowItems,
            customPaging: function(e, t) {
                if (a.hasClass('pager-as-thumbs')) {
                    if (jQuery(e.$slides[t]).find('.image-wrapper img').length) {
                        $this = jQuery(e.$slides[t]).find('.image-wrapper img');
                        var r = ''
                          , s = $this.attr('data-img-src');
                        if (typeof s !== typeof undefined && s !== !1) {
                            r = $this.attr('data-img-src')
                        } else {
                            r = $this.attr('src')
                        }
                        ;if (!$thumbInnerDiv.hasClass('slick-initialized')) {
                            $thumbInnerDiv.append('<div class="thumb"><div class="rotatorThumbs" data-index="' + t + '" data-src="' + r + '" style="background-image:url(' + r + ')"></div></div>')
                        }
                        ;return !1
                    }
                } else {
                    return '<span class="slickNumber" data-slick-index="' + t + '">' + (t + 1) + '</span>'
                }
            },
            prevArrow: '<div class="prev nav-left" data-cse_class_to_apply=".r2g-rotator-sub-component.' + s + ' .nav-arrow-group .nav-left" data-cse_name="Left Arrow"><span class="line-one" data-cse_class_to_apply=".r2g-rotator-sub-component.' + s + ' .arrows-wrapper .line-one" data-cse_name="Left Arrow Icon"></span><span class="line-two"></span></div>',
            nextArrow: '<div class="next nav-right" data-cse_class_to_apply=".r2g-rotator-sub-component.' + s + ' .nav-arrow-group .nav-right" data-cse_name="Right Arrow"><span class="line-one" data-cse_class_to_apply=".r2g-rotator-sub-component.' + s + ' .arrows-wrapper .line-one|.r2g-rotator-sub-component.' + s + ' .arrows-wrapper .mouse-over.slick-arrow|.r2g-rotator-sub-component.' + s + ' .arrows-wrapper .mouse-over .line-one" data-cse_name="Right Arrow Icon | On Mouse Over Arrow | On Mouse Over Arrow Icon"></span><span class="line-two"></span></div>',
            responsive: [{
                breakpoint: 1366,
                settings: {
                    slidesToShow: e.landscape,
                    slidesToScroll: e.scrollLandscape,
                    rows: e.landscapeRows,
                    slidesPerRow: e.landscapeRowItems,
                }
            }, {
                breakpoint: 1024,
                settings: {
                    slidesToShow: e.portrait,
                    slidesToScroll: e.scrollPortrait,
                    rows: e.portraitRows,
                    slidesPerRow: e.portraitRowItems,
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: e.mobile,
                    slidesToScroll: e.scrollMobile,
                    rows: e.mobileRows,
                    slidesPerRow: e.mobileRowItems,
                }
            }]
        });
        if (e.pager == !0 && a.hasClass('pager-as-thumbs')) {
            i.slick('slickSetOption', 'asNavFor', l);
            r.find('.slick-dots').remove();
            n.append('<div class="arrows-wrapper"></div>');
            var p = n.find('.arrows-wrapper');
            $thumbInnerDiv.slick({
                slidesToShow: e.thumbsDesktop,
                slidesToScroll: 1,
                asNavFor: i,
                dots: !1,
                focusOnSelect: !0,
                appendArrows: p,
                prevArrow: '<div class="prev nav-left"><span class="line-one"></span><span class="line-two"></span></div>',
                nextArrow: '<div class="next nav-right"><span class="line-one"></span><span class="line-two"></span></div>',
                responsive: [{
                    breakpoint: 1366,
                    settings: {
                        slidesToShow: e.thumbsLandscape,
                    }
                }, {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: e.thumbsPortrait,
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: e.thumbsMobile,
                    }
                }]
            })
        }
        ;if (d > 1200 && e.arrows) {
            a.find('.arrows-wrapper .nav-left, .arrows-wrapper .nav-right').each(function() {
                jQuery(this).mouseover(function() {
                    jQuery(this).addClass('mouse-over')
                }).mouseout(function() {
                    jQuery(this).removeClass('mouse-over')
                })
            })
        }
    })
}
/** END R2G Rotator Sub Component - CSE **/