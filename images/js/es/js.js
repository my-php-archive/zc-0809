/* tipsy 0.1.2 */
(function($) {
    $.fn.tipsy = function(opts) {

        opts = $.extend({
        	fade: false,
        	css: false,
        	gravity: 'n',
        	title: 'title'
        }, opts || {});
        var tip = null, cancelHide = false;

        this.hover(function() {
            
            $.data(this, 'cancel.tipsy', true);

            var tip = $.data(this, 'active.tipsy');
			if (!tip) {
				var title;
				if (typeof opts.title == 'string' && $(this).attr(opts.title) != 'undefined' && $(this).attr(opts.title) != '') {
					title = $(this).attr(opts.title);
				} else if (typeof opts.title == 'function') {
					title = opts.title(this);
				}
				tip = $('<div class="tipsy"><div class="tipsy-inner">' + title + '</div></div>');
				tip.css({position: 'absolute', zIndex: 100000});
				if (opts.css) tip.addClass(opts.css);
				$(this).attr('title', '');
				$.data(this, 'active.tipsy', tip);
			}
            
            var pos = $.extend({}, $(this).offset(), {width: this.offsetWidth, height: this.offsetHeight});
            tip.remove().css({top: 0, left: 0, visibility: 'hidden', display: 'block'}).appendTo(document.body);
            var actualWidth = tip[0].offsetWidth, actualHeight = tip[0].offsetHeight;
            
            switch (opts.gravity.charAt(0)) {
                case 'n':
                    tip.css({top: pos.top + pos.height, left: pos.left + pos.width / 2 - actualWidth / 2}).addClass('tipsy-north');
                    break;
                case 's':
                    tip.css({top: pos.top - actualHeight - 1, left: pos.left + pos.width / 2 - actualWidth / 2}).addClass('tipsy-south');
                    break;
                case 'e':
                    tip.css({top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left - actualWidth}).addClass('tipsy-east');
                    break;
                case 'w':
                    tip.css({top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left + pos.width}).addClass('tipsy-west');
                    break;
            }

            if (opts.fade) {
                tip.css({opacity: 0, display: 'block', visibility: 'visible'}).animate({opacity: 1});
            } else {
                tip.css({visibility: 'visible'});
            }

        }, function() {
            $.data(this, 'cancel.tipsy', false);
            var self = this;
            if ($.data(this, 'cancel.tipsy')) return;
            var tip = $.data(self, 'active.tipsy');
            if (opts.fade) {
                tip.stop().fadeOut(function() { $(this).remove(); });
            } else {
                tip.remove();
            }          
        });

    };
})(jQuery);

/* jquery tooltip beta */
(function ($) {
	$.fn.tooltip = function (opts) {

		opts = $.extend({
			className: 'tooltip',
			content: 'title',
			offset: [ 0, 0 ],
			align: 'center',
			inDelay: 100,
			outDelay: 100
		}, opts || {});

		var mouseOutCallback = function (obj) {
			var tooltip = $.data(obj, 'tooltip');
			if (tooltip && !$.data(tooltip[0], 'hover')) {
				tooltip.hide();
			}
		}

		this.live('mouseenter', function () {
			var obj = this;
			setTimeout(function () {
				var pos = $.extend({}, $(obj).offset(), { width: obj.offsetWidth, height: obj.offsetHeight });
				if (!$.data(obj, 'tooltip')) {
					var title;
					if (typeof opts.content == 'string' && $(obj).attr(opts.content) != 'undefined' && $(obj).attr(opts.content) != '') {
						title = $(obj).attr(opts.content);
					} else if (typeof opts.content == 'function') {
						title = opts.content(obj);
					}
					var tooltip = $('<div class="' + opts.className + '">' + title + '</div>').appendTo(document.body);
					$.data(obj, 'tooltip', tooltip);
					tooltip.hover(function () {
						$.data(this, 'hover', true);
					}, function () {
						$.removeData(this, 'hover');
						setTimeout(function () {
							mouseOutCallback(obj);
						}, opts.outDelay);
					});
				} else {
					var tooltip = $.data(obj, 'tooltip').show();
				}
				tooltip.css({
					display: 'block',
					position: 'absolute',
					zIndex: 99999,
					top: 0,
					left: 0
				});
				var left;
				if (opts.align == 'left') {
					left = pos.left;
				} else if (opts.align == 'center') {
					left = pos.left + pos.width / 2 - tooltip[0].offsetWidth / 2;
				} else if (opts.align == 'right') {
					left = pos.left + pos.width - tooltip[0].offsetWidth;
				}
				left += opts.offset[1];
				tooltip.css({
					top: pos.top + opts.offset[0],
					left: left
				});
			}, opts.inDelay);
		}).live('mouseleave', function () {
			var obj = this;
			setTimeout(function () {
				mouseOutCallback(obj);
			}, opts.outDelay);
		});
	}
})(jQuery);




var trend_load = false;
$(document).ready(function(){
	$('.numbersvotes .overview').live('click', function(){ $(this).hide(); $(this).next().show(); });
	$('.numbersvotes .stats').live('click', function(){ $(this).hide(); $(this).prev().show(); });
    var location_box_more = false;
    $('.location-box-more').click(function(){
        if (location_box_more) {
            $('.location-box ul').css('height', '170px');
            $(this).html("Ver más");
            location_box_more = false;
        }
        else {
            $('.location-box ul').css('height', '170%');
            $(this).html("Ver menos");
            location_box_more = true;
        }
    });

	$('.hovercard').tooltip({
		offset: [ -130, 0 ],
		content: hovercardCallback
	});
	$('.hovercard-avatar').tooltip({
		offset: [ -145, 5 ],
		content: hovercardCallback
	});
	
	
	
});

function hovercardCallback(obj) {
	var userData = $(obj).attr('data-hovercard').split(';'), r;
		if(global_data.user_key){
			var action = 'onclick="notifica.follow(\'user\', ' + userData[0] + ', notifica.userInPostHandle, $(this).children(\'span\'))"';
		} else {
			var action = 'href="/registro"';
		}
	r = '<div class="tooltip-c"><img class="avatartool" src="' + userData[6] + '" width="48" height="48" /><div class="user-t-info clearfix"><a href="/perfil/' + userData[1] + '"><strong>' + userData[1] + '</strong></a>' + userData[2] + '<br /><img style="float:left;padding-top:3px" width="16" hspace="3" height="11" align="absmiddle" alt="' + userData[3] + '" src="' + global_data.img + 'images/flags/' + userData[4] + '.png" title="' + userData[3] + '" class="country-name" /><a href="/mensajes/a/'+ userData[1] +'" title="Enviar mensaje a ' + userData[1] + '"><div style="float:left;padding-top:3px;width:16px;height:11px;background:url(' + global_data.img + 'images/big2v1.png?1.0) 0 -221px;"></div></div>';
	if (parseInt(userData[5]) == 1) {
		r += '</a><span class="alreadys"></span>';
	} else if (userData[1] == $('.username').text() ){
		r += '</a><span class="alreadys">Este eres t&uacute;</span>';
	} else if (parseInt(userData[5]) == 2) {
		r += '<a href="/registro" class="btn_g follow_user_post"><span class="icons follow">Seguir Usuario</span></a>';
	} else {
		r += '<a '+action+' class="btn_g follow_user_post"><span class="icons follow">Seguir Usuario</span></a>';
	}
	r += '</div><div class="arrow-t"></div>';
	return r;
}

function search_set(obj, x) { $('div.search-in > a').removeClass('search_active'); $(obj).addClass('search_active'); $('form[name=top_search_box]').attr('action', 'http://buscar.taringa.net/'+x); $('#ibuscadorq').focus(); }

// hoverIntent by Brian Cherne
(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY;};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev]);}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob);},cfg.interval);}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev]);};var handleHover=function(e){var p=(e.type=="mouseover"?e.fromElement:e.toElement)||e.relatedTarget;while(p&&p!=this){try{p=p.parentNode;}catch(e){p=this;}}if(p==this){return false;}var ev=jQuery.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);}if(e.type=="mouseover"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob);},cfg.interval);}}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob);},cfg.timeout);}}};return this.mouseover(handleHover).mouseout(handleHover);};})(jQuery);

