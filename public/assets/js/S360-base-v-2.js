$('document').ready(function(){
	aos();
    removeCMSCommentOnEdit();
    removeEmptyElements();
    wrapImageWithLink();
    table();
});

function aos(){
	AOS.init({
		duration: 600,
		anchorPlacement: 'center-bottom',
	});
}

function table(){
    var _tableHeadings = $('table tr:first-child td'),
	_headingText = '',
	_this = '';

    $('table tr td:not(table tr:first-child td)').each(function(){
    	_headingText = $(_tableHeadings[$(this).index()]).text();
    	_this = $(this);
    
    	_this.attr('data-th', _headingText);
    	_this.wrapInner('<span class="bt-content"></span>');
    });
}

function removeCMSCommentOnEdit(){
    $('[class*="<!--"]').each(function(){
    	var $item = $(this),
    		str = $item.attr("class");
    
    	if (/\<\!\-\-(.*?)\-\-\>/i.test( str )){
    		str = str.replace(/\<\!\-\-(.*?)\-\-\>/g, function( matched ){
    			return matched.replace(/\<\!\-\-(.*?)\-\-\>/, '');
    		});
    	}
    	$item.removeClass().addClass(str);
    });
}

function removeEmptyElements(){
    $(".check-empty-text").each(function(){
    	if($(this).text()===""){
    		$(this).addClass("no-content");
    
    	}
    });
    
    $(".check-empty-href").each(function(){
    	if($(this).attr('href')===""){
    		$(this).addClass("no-content");
    	}
    });
    
    $(".check-empty-parent").each(function(){
    	var visible = false;
    	
    	$(this).children().each(function(){
    		if($(this).attr('href') === ""){
    			$(this).addClass("no-content");
    		}else if($(this).text()===""){
    			$(this).addClass("no-content");
    		}else{
    			visible = true; 
    		}
    	});
    	if(!visible){
    		$(this).addClass("no-content");
    	}
    });
    
    var _this,
    	_href,
    	_content;
    
    $('.contact-detail-row').each(function(){
    	_this = $(this);
    	_href = _this.find('.check-empty').attr('href');
    	_content = $(this).find('.contact-detail-row-inner').text().trim();
    
    	if (_href == '' || _content == '') {
    		_this.addClass('no-content');
    	}
    });
}

function wrapImageWithLink(){
    $('.wrap-image-with-link').each(function(){
        var link = jQuery(this),
            href = link.attr('href'),
            title = (link.attr('title') != null) ? link.attr('title') : '',
            target = (link.attr('target') != null) ? link.attr('target') : '',
            imageWrapper = link.parents('.xbox-wrapper');
            
        imageWrapper.find('> .image-wrapper').wrapInner('<a href="'+href+'" title="'+title+'" target="'+target+'" class="detail-link" />');
    });
}