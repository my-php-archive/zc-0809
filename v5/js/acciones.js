/* number_format (php.js) 906.1806 */
function number_format(a,b,e,f){a=a;b=b;var c=function(i,g){g=Math.pow(10,g);return(Math.round(i*g)/g).toString()};a=!isFinite(+a)?0:+a;b=!isFinite(+b)?0:Math.abs(b);f=typeof f==="undefined"?",":f;e=typeof e==="undefined"?".":e;var d=b>0?c(a,b):c(Math.round(a),b);c=c(Math.abs(a),b);var h;if(c>=1E3){c=c.split(/\D/);h=c[0].length%3||3;c[0]=d.slice(0,h+(a<0))+c[0].slice(h).replace(/(\d{3})/g,f+"$1");d=c.join(e)}else d=d.replace(".",e);a=d.indexOf(e);if(b>=1&&a!==-1&&d.length-a-1<b)d+=(new Array(b-(d.length- a-1))).join(0)+"0";else if(b>=1&&a===-1)d+=e+(new Array(b)).join(0)+"0";return d};
function my_number_format(numero){
	return number_format(numero, 0, ',', '.');
	//return Number(numero).toLocaleString();
}

/* empty (php.js) 1006.1915 */
function empty(a,b){var c;if(a===""||!b&&(a===0||a==="0")||a===null||a===false||typeof a==="undefined")return true;if(typeof a=="object"){for(c in a)return false;return true}return false};

/* lazyload */
(function(a){a.fn.lazyload=function(c){var b={placeHolder:'blank.gif',effect:'show',effectSpeed:0,sensitivity:0};if(c)a.extend(b,c);this.each(function(){if(a(this).attr('src')!=b.placeHolder)a(this).attr('src',b.placeHolder);a(this).one('dl',function(){if(a(this).attr('orig')&&a(this).attr('orig')!=a(this).attr('src'))a(this).hide().attr('src',a(this).attr('orig'))[b.effect](b.effectSpeed)})});var d=this;a(window).bind('scroll',function(){a(d).filter('[src$="'+b.placeHolder+'"]').each(function(){if((a(window).height()+a(window).scrollTop()>a(this).offset().top-b.sensitivity)&&(a(window).width()+a(window).scrollLeft()>a(this).offset().left-b.sensitivity)&&(a(window).scrollTop()<a(this).offset().top+a(this).height()+b.sensitivity)&&(a(window).scrollLeft()<a(this).offset().left+a(this).width()+b.sensitivity))a(this).trigger('dl')})});a(window).trigger('scroll');return this}})(jQuery);

/* scrollTo 1.4.2 by Ariel Flesler */
;(function(d){var k=d.scrollTo=function(a,i,e){d(window).scrollTo(a,i,e)};k.defaults={axis:'xy',duration:parseFloat(d.fn.jquery)>=1.3?0:1};k.window=function(a){return d(window)._scrollable()};d.fn._scrollable=function(){return this.map(function(){var a=this,i=!a.nodeName||d.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!i)return a;var e=(a.contentWindow||a).document||a.ownerDocument||a;return d.browser.safari||e.compatMode=='BackCompat'?e.body:e.documentElement})};d.fn.scrollTo=function(n,j,b){if(typeof j=='object'){b=j;j=0}if(typeof b=='function')b={onAfter:b};if(n=='max')n=9e9;b=d.extend({},k.defaults,b);j=j||b.speed||b.duration;b.queue=b.queue&&b.axis.length>1;if(b.queue)j/=2;b.offset=p(b.offset);b.over=p(b.over);return this._scrollable().each(function(){var q=this,r=d(q),f=n,s,g={},u=r.is('html,body');switch(typeof f){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(f)){f=p(f);break}f=d(f,this);case'object':if(f.is||f.style)s=(f=d(f)).offset()}d.each(b.axis.split(''),function(a,i){var e=i=='x'?'Left':'Top',h=e.toLowerCase(),c='scroll'+e,l=q[c],m=k.max(q,i);if(s){g[c]=s[h]+(u?0:l-r.offset()[h]);if(b.margin){g[c]-=parseInt(f.css('margin'+e))||0;g[c]-=parseInt(f.css('border'+e+'Width'))||0}g[c]+=b.offset[h]||0;if(b.over[h])g[c]+=f[i=='x'?'width':'height']()*b.over[h]}else{var o=f[h];g[c]=o.slice&&o.slice(-1)=='%'?parseFloat(o)/100*m:o}if(/^\d+$/.test(g[c]))g[c]=g[c]<=0?0:Math.min(g[c],m);if(!a&&b.queue){if(l!=g[c])t(b.onAfterFirst);delete g[c]}});t(b.onAfter);function t(a){r.animate(g,j,b.easing,a&&function(){a.call(this,n,b)})}}).end()};k.max=function(a,i){var e=i=='x'?'Width':'Height',h='scroll'+e;if(!d(a).is('html,body'))return a[h]-d(a)[e.toLowerCase()]();var c='client'+e,l=a.ownerDocument.documentElement,m=a.ownerDocument.body;return Math.max(l[h],m[h])-Math.min(l[c],m[c])};function p(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);

(function($){
	$.fn.inputsize = function (opts) {
		opts = $.extend({
			size: 255,
			callback: function () {}
		}, opts || {});
		this.live(
			'keypress',
			function () {
				var size = $(this).val().length;
				return opts.callback.call(this, size > opts.size, size);
			}
		);
		return this;
	}
})(jQuery);

/* jquery tooltip beta */
(function($){
	$.fn.tooltip = function (opts) {

		opts = $.extend({
			className: 'tooltip',
			content: 'title',
			mousein: function(){},
			mouseout: function(){},
			align: 'center',
			offset: [ 0, 0 ],
			inDelay: 100,
			outDelay: 100
		}, opts || {});

		var mouseOutCallback = function (obj) {
			var tooltip = $.data(obj, 'tooltip');
			if (tooltip && !$.data(tooltip[0], 'hover')) {
				opts.mouseout(obj);
				tooltip.hide();
			}
		}

		this.live('mouseenter', function () {
			var obj = this;
			setTimeout(function () {
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
					zIndex: 99999
				});
				var pos = $.extend({}, $(obj).offset(), { width: obj.offsetWidth, height: obj.offsetHeight });
				if (opts.align == 'left') {
					left = pos.left;
				} else if (opts.align == 'center') {
					left = pos.left + pos.width / 2 - tooltip[0].offsetWidth / 2;
				} else if (opts.align == 'right') {
					left = pos.left + pos.width - tooltip[0].offsetWidth;
				}
				left += opts.offset[0];
				tooltip.css({
					bottom: $('body').height() - pos.top + opts.offset[1],
					left: left
				});
				opts.mousein(obj);
			}, opts.inDelay);
		}).live('mouseleave', function () {
			var obj = this;
			setTimeout(function () {
				mouseOutCallback(obj);
			}, opts.outDelay);
		});
	}
})(jQuery);

jQuery.fn.ytEmbed = function (opts) {

	opts = $.extend(
		true,
		{
			template: {
				thumbnail: 'http://img.youtube.com/vi/%s/%d.jpg',
				video: '<iframe width="600" height="390" frameborder="0" src="http://www.youtube.com/embed/%s" allowfullscreen></iframe>'
			},
			count: 3,
			delay: 500,
			cursor: 'pointer'
		},
		opts || {}
	);

	var interval;
	var n = 1;
	var parse = {
		thumbnail: function (ytId, n) {
			return opts.template.thumbnail.replace('%s', ytId).replace('%d', n);
		},
		video: function (ytId) {
			return opts.template.video.replace('%s', ytId);
		}
	}

	return this.each(function(){
		if ($(this).attr('data-ytid')) {

			if (opts.cursor) {
				$(this).css('cursor', opts.cursor);
			}
			$(this).attr('src', parse.thumbnail($(this).attr('data-ytid'), n));
			$(this).hover(function(){
				var obj = this;
				interval = setInterval(function(){
					if (n++ == opts.count) {
						n = 1;
					}
					$(obj).attr('src', parse.thumbnail($(obj).attr('data-ytid'), n));
				}, opts.delay);
			}, function (){
				clearInterval(interval);
			}).click(function(){
				$(this).after(parse.video($(this).attr('data-ytid'))).remove();
			});

		}
	});

}

// Ajax upload
jQuery.extend({

	handleError: function () {
	},

    createUploadIframe: function(id, uri)
	{
			//create frame
            var frameId = 'jUploadFrame' + id;
            var iframeHtml = '<iframe id="' + frameId + '" name="' + frameId + '" style="position:absolute; top:-9999px; left:-9999px"';
			if(window.ActiveXObject)
			{
                if(typeof uri== 'boolean'){
					iframeHtml += ' src="' + 'javascript:false' + '"';

                }
                else if(typeof uri== 'string'){
					iframeHtml += ' src="' + uri + '"';

                }	
			}
			iframeHtml += ' />';
			jQuery(iframeHtml).appendTo(document.body);

            return jQuery('#' + frameId).get(0);			
    },
    createUploadForm: function(id, fileElementId, data)
	{
		//create form	
		var formId = 'jUploadForm' + id;
		var fileId = 'jUploadFile' + id;
		var form = jQuery('<form  action="" method="POST" name="' + formId + '" id="' + formId + '" enctype="multipart/form-data"></form>');	
		if(data)
		{
			for(var i in data)
			{
				jQuery('<input type="hidden" name="' + i + '" value="' + data[i] + '" />').appendTo(form);
			}			
		}		
		var oldElement = jQuery('#' + fileElementId);
		var newElement = jQuery(oldElement).clone();
		jQuery(oldElement).attr('id', fileId);
		jQuery(oldElement).before(newElement);
		jQuery(oldElement).appendTo(form);


		
		//set attributes
		jQuery(form).css('position', 'absolute');
		jQuery(form).css('top', '-1200px');
		jQuery(form).css('left', '-1200px');
		jQuery(form).appendTo('body');		
		return form;
    },

    ajaxFileUpload: function(s) {
        // TODO introduce global settings, allowing the client to modify them for all requests, not only timeout		
        s = jQuery.extend({}, jQuery.ajaxSettings, s);
        var id = new Date().getTime()        
		var form = jQuery.createUploadForm(id, s.fileElementId, (typeof(s.data)=='undefined'?false:s.data));
		var io = jQuery.createUploadIframe(id, s.secureuri);
		var frameId = 'jUploadFrame' + id;
		var formId = 'jUploadForm' + id;		
        // Watch for a new set of requests
        if ( s.global && ! jQuery.active++ )
		{
			jQuery.event.trigger( "ajaxStart" );
		}            
        var requestDone = false;
        // Create the request object
        var xml = {}   
        if ( s.global )
            jQuery.event.trigger("ajaxSend", [xml, s]);
        // Wait for a response to come back
        var uploadCallback = function(isTimeout)
		{			
			var io = document.getElementById(frameId);
            try 
			{				
				if(io.contentWindow)
				{
					 xml.responseText = io.contentWindow.document.body?io.contentWindow.document.body.innerHTML:null;
                	 xml.responseXML = io.contentWindow.document.XMLDocument?io.contentWindow.document.XMLDocument:io.contentWindow.document;
					 
				}else if(io.contentDocument)
				{
					 xml.responseText = io.contentDocument.document.body?io.contentDocument.document.body.innerHTML:null;
                	xml.responseXML = io.contentDocument.document.XMLDocument?io.contentDocument.document.XMLDocument:io.contentDocument.document;
				}						
            }catch(e)
			{
				jQuery.handleError(s, xml, null, e);
			}
            if ( xml || isTimeout == "timeout") 
			{				
                requestDone = true;
                var status;
                status = isTimeout != "timeout" ? "success" : "error";
                // Make sure that the request was successful or notmodified
                if ( status != "error" )
				{
                    // process the data (runs the xml through httpData regardless of callback)
                    var data = jQuery.uploadHttpData( xml, s.dataType );    
                    // If a local callback was specified, fire it and pass it the data
                    if ( s.success )
                        s.success( data, status );

                    // Fire the global callback
                    if( s.global )
                        jQuery.event.trigger( "ajaxSuccess", [xml, s] );
                 }

                // The request was completed
                if( s.global )
                    jQuery.event.trigger( "ajaxComplete", [xml, s] );

                // Handle the global AJAX counter
                if ( s.global && ! --jQuery.active )
                    jQuery.event.trigger( "ajaxStop" );

                // Process result
                if ( s.complete )
                    s.complete(xml, status);

                jQuery(io).unbind()

                setTimeout(function()
									{	try 
										{
											jQuery(io).remove();
											jQuery(form).remove();	
											
										} catch(e) 
										{
											jQuery.handleError(s, xml, null, e);
										}									

									}, 100)

                xml = null

            }
        }
        // Timeout checker
        if ( s.timeout > 0 ) 
		{
            setTimeout(function(){
                // Check to see if the request is still happening
                if( !requestDone ) uploadCallback( "timeout" );
            }, s.timeout);
        }
        try 
		{

			var form = jQuery('#' + formId);
			jQuery(form).attr('action', s.url);
			jQuery(form).attr('method', 'POST');
			jQuery(form).attr('target', frameId);
            if(form.encoding)
			{
				jQuery(form).attr('encoding', 'multipart/form-data');      			
            }
            else
			{	
				jQuery(form).attr('enctype', 'multipart/form-data');			
            }			
            jQuery(form).submit();

        } catch(e) 
		{			
            jQuery.handleError(s, xml, null, e);
        }
		
		jQuery('#' + frameId).load(uploadCallback	);
        return {abort: function () {}};	

    },

    uploadHttpData: function( r, type ) {
        var data = !type;
        data = type == "xml" || data ? r.responseXML : r.responseText;
        // If the type is "script", eval it in global context
        if ( type == "script" )
            jQuery.globalEval( data );
        // Get the JavaScript object, if JSON is used.
        if ( type == "json" )
            eval( "data = " + data );
        // evaluate scripts within html
        if ( type == "html" )
            jQuery("<div>").html(data).evalScripts();

        return data;
    }
});


// Simple JavaScript Templating John Resig http://ejohn.org/ MIT License
(function(){
  var cache = {};
 
  this.tmpl = function tmpl(str, data){
    // Figure out if we're getting a template, or if we need to
    // load the template - and be sure to cache the result.
    var fn = !/\W/.test(str) ?
      cache[str] = cache[str] ||
        tmpl(document.getElementById(str).innerHTML) :
     
      // Generate a reusable function that will serve as a template
      // generator (and which will be cached).
      new Function("obj",
        "var p=[],print=function(){p.push.apply(p,arguments);};" +
       
        // Introduce the data as local variables using with(){}
        "with(obj){p.push('" +
       
        // Convert the template into pure JavaScript
        str
          .replace(/[\r\t\n]/g, " ")
          .split("<%").join("\t")
          .replace(/((^|%>)[^\t]*)'/g, "$1\r")
          .replace(/\t=(.*?)%>/g, "',$1,'")
          .split("\t").join("');")
          .split("%>").join("p.push('")
          .split("\r").join("\\'")
      + "');}return p.join('');");
   
    // Provide some basic currying to the user
    return data ? fn( data ) : fn;
  };
})();


var Feed = {
	last: false,
	fetchLock: false,
	fetchOffset: 100,
	print: function (objects) {
		for (var i = 0, c = objects.length; i < c; ++i) {
			if (objects[i].template && $('#' + objects[i].template).length) {
				$(tmpl(objects[i].template, objects[i])).appendTo('#newsfeed');
				this.last = objects[i].feed.id;
			}
		}
	},
	fetch: function () {
		if (this.last && !this.fetchLock) {
			this.fetchLock = true;
			$('#loading-feed').show();
			ajax(
				'newsfeed',
				'fetch',
				{
					last: this.last
				},
				{
					success: function (r) {
						Feed.print(r.data);
					},
					complete: function (r) {
						$('#loading-feed').hide();
						Feed.fetchLock = false;
					}
				}
			);
			this.last = false;
		}
	}
} 

/* time utils */
var timelib = {
	current: false,
	iupd: 15,
	timetowords: function (x) {
		if (!this.current) return r;
		var r = false;
		var t = {
			s: {
				year: 'M&aacute;s de 1 a&ntilde;o',
				month: 'M&aacute;s de 1 mes',
				day: 'Ayer',
				hour: 'Hace 1 hora',
				minute: 'Hace 1 minuto',
				second: 'Menos de 1 minuto'
			},
			p: {
				year: 'M&aacute;s de $1 a&ntilde;os',
				month: 'M&aacute;s de $1 meses',
				day: 'Hace $1 d&iacute;as',
				hour: 'Hace $1 horas',
				minute: 'Hace $1 minutos',
				second: 'Menos de 1 minuto'
			}
		};
		var n = this.current - x;
		var d = {year: 31536000, month: 2678400, day: 86400, hour: 3600, minute: 60, second: 1};
		for (k in d) {
			if (n >= d[k]) {
				var c = Math.floor(n / d[k]);
				if (c == 1) r = t.s[k];
				else if (c > 1) r = t.p[k].replace('$1', c);
				else r = 'Hace mucho tiempo';
				break;
			}
		}
		return r ? r : 'Hace instantes';	
	},
	upd: function () {
		setTimeout(function(){
			if (timelib.current) {
				timelib.current = timelib.current + timelib.iupd;
				$('span[ts]').each(function(){$(this).html(timelib.timetowords($(this).attr('ts')));});
			}
			timelib.upd()
		}, this.iupd * 1000);
	}
}

/* facebook related fn */
function fb_init() {
	if (FB._apiKey == null) {
		FB.init({appId: '143125965710465', cookie: true});
	}
}
var fb_access_token = false;
function facebook_ready() {
	// FB.init({ appId: '143125965710465', cookie: true });
	FB.signin = function(act) {
		fb_init()
			FB.Event.subscribe('auth.login', function(){
			FB.callback(act);
		});
		FB.login(function(r) {
			if (typeof r.session.access_token != 'undefined') {
				fb_access_token = r.session.access_token;
			}
			if (!r.session && r.status == 'connected') {
				FB.getLoginStatus();
			} else if (r.session) {
				FB.callback(act);
			}
		}, {perms: 'email,user_birthday,user_location,publish_stream,offline_access'});
	}
	FB.unlink = function() {
		fb_init()
		$.ajax({type: 'post', url: '/social-ajax.php', data: 'cmd=Facebook::Account::unlink', dataType: 'json', success: FB.link_cb});
	}
	FB.callback = function(act) {
		fb_init()
		switch (act) {
			case 'register':
				if (fb_access_token) {
					$.getScript('https://graph.facebook.com/me?access_token='+fb_access_token+'&callback=FB.register_cb');
				}
				break;
			case 'link':
				$.ajax({type: 'post', url: '/social-ajax.php', data: 'cmd=Facebook::Account::link', dataType: 'json', success: FB.link_cb});
				break;
			case 'link_nocb':
				$.ajax({type: 'post', url: '/social-ajax.php', data: 'cmd=Facebook::Account::link', dataType: 'json'});
				$('input[name=facebook]').attr('onclick', '');
				break;
			default:
				login_ajax('home', 'facebook');
		}
	}
	FB.link_cb = function(r) {
		fb_init()
		if (typeof r.error != 'undefined' && r.error != '') {
			alert(r.error);
		} else {
			window.location.reload();
		}
	}
	FB.register_cb = function(r) {
		fb_init()
		$('#mydialog.registro').addClass('unsocial');
		$('div.social-connect').remove();
		if (typeof r.link != 'undefined') {
			var username = r.link.split('/')[3];
			if (isNaN(username) && username.substr(0, 11) != 'profile.php') {
				$('#nick').val(username)
				$('#nick').trigger('blur');
				$('#password').focus();
			} else {
				$('#nick').focus();
			}
		}
		if (typeof r.birthday != 'undefined') {
			var birthday = r.birthday.split('/');
			$('#dia').val(birthday[1]);
			$('#mes').val(parseInt(birthday[0]) === 0 ? birthday[0].substr(1) : birthday[0]);
			$('#anio').val(birthday[2]);
			$('#anio').trigger('blur');
		}
		if (typeof r.email != 'undefined') {
			$('#email').val(r.email);
			$('#email').trigger('blur');
		}
		if (typeof r.gender != 'undefined') {
			$('#sexo_'+(r.gender == 'male' ? 'm' : 'f')).attr('checked', 'checked');
			$('#sexo_'+(r.gender == 'male' ? 'm' : 'f')).trigger('blur');
		}
	}
}

var comment = {
	vote: function (obj, comid, postid, userid, score, sig) {
		ajax('comment', 'vote', {id: comid, postid: postid, userid: userid, score: score, sig: sig});
		var rel;
		if (score == 1) {
			rel = $(obj).parent('li').next('li').children('a');
		} else {
			rel = $(obj).parent('li').prev('li').children('a');
		}
		$(obj).attr('onclick', '').children('i').addClass('hover');
		rel.attr('onclick', '').addClass('ui-state-disabled');
		var container = $('#div_cmnt_' + comid + ' span.comment-votes-extra-container');
		var total = parseInt($(container).data('votes-total'));
		var positive = parseInt($(container).data('votes-positivo'));
		var negative = parseInt($(container).data('votes-negativo'));
		if (score == 1) {positive += 1;} else if(score == -1){negative +=1;}
		total = positive - negative;
		var span_text = '';
		if(total == 0) {
			$(container).hide();
			span_text = '0';
		}else{
			if(total < 0){
				$(container).removeClass('thumb-up positivo');
				$(container).addClass('thumb-down negativo');
				span_text = String(total);
			} else {
				$(container).removeClass('thumb-down negativo');
				$(container).addClass('thumb-up positivo');
				span_text = '+'+String(total);
			}
			$(container).show();
		}
		$(container).html(span_text);
		var title_text = '+'+String(positive)+' / -'+String(negative);
		$(container).attr('title', title_text);
		$(container).data('votes-total', total);
		$(container).data('votes-positivo', positive);
		$(container).data('votes-negativo', negative);
	},
	page: function (page) {
		$.scrollTo('.728x90');
		$('#comments-content').css('opacity', 0.4)
		return $.ajax({
			type: 'post',
			url: '/ajax/comment-page.php',
			data: {
				id: global_data.postid,
				p: page
			},
			success: function (r) {
				var status = parseInt(r.charAt(0)), data = r.substr(3);
				if (status == 1) {
					$('#comments').html(data);
					location.hash = 'pagina-' + page;
				} else {
					mydialog.alert('Ops!', data);
				}
			},
			error: function () {
				this.success('0: Ocurrio un error al procesar lo solicitado');
			},
			complete: function () {
				$('#comments-content').css('opacity', 1);
			}
		});
	},
	view: function(id,obj){
		var action = $(obj).attr('name');
		var c_comment = $('#div_cmnt_'+id);
		var comment_container = $('#div_cmnt_'+id+' > .comment-text > .comment-content');
		var comment_text = comment_container.text();
		if(action == 'show') {
			if( comment_container.text().trim() == '' ){
				$.ajax({
					type: 'POST',
					url: '/comentario-ver.php',
					data: 'comid=' + id + gget('postid'),
					success: function(h){
						switch(h.charAt(0)){
							case '0': //Error
								break;
							case '1': //OK
								var comment_text = h.substring(3);
								$(obj).attr('name', 'hide');
								comment_container.html(comment_text);
								c_comment.removeClass('deleted-comment');
								break;
						}
					},
					error: function(){ }
				});
			}else{
				$(obj).attr('name', 'hide');
				comment_container.html(comment_text);
				c_comment.removeClass('deleted-comment');
			}
		}else{
			$(obj).attr('name', 'show');
			c_comment.addClass('deleted-comment');
		}
		$(obj).find('span.ui-button-text > span.default-button-text').toggle();
		$(obj).find('span.ui-button-text > span.success-button-text').toggle();
	},
	quote: function(id, nick){
		var comment_container = $('#body_comm');
		var quote_container = $('#citar_comm_'+id);
		var quote_text = '';
		if(comment_container.val() != ''){
			quote_text += comment_container.val();
			quote_text += '\n';
		}
		quote_text += '[quote=' + nick + ']';
		quote_text += htmlspecialchars_decode( quote_container.html(), 'ENT_NOQUOTES');
		quote_text += '[/quote]';
		quote_text += '\n';
		comment_container.val(quote_text).click().focus();
	},
	remove: function(id, autorid){
		/* Eliminar Comentario */
			$.ajax({
				type: 'POST',
				url: '/comentario-borrar.php',
				data: 'comid=' + id + '&autor=' + autorid + gget('postid') + gget('key'),
				success: function(h){
					switch(h.charAt(0)){
						case '0': //Error
							mydialog.alert('Error', h.substring(3));
							break;
						case '1':
							$('#div_cmnt_'+id).fadeOut('normal', function(){$(this).remove();});
							break;
					}
				},
				error: function(){
					mydialog.error_500("borrar_com('"+comid+"')");
				}
			});
		}
}

var Kn3 = {
	_cache: {},
	_callback: function () {},
	_genurl: function (values) {
		var obj = this;
		key = $.param(values);
		if (!obj._cache[key]) {
			$.ajax({
				type: 'post',
				url: '/ajax/kn3/genurl',
				data: values,
				async: false,
				dataType: 'json',
				success: function (r) {
					obj._cache[key] = r.data
				}
			});
		}
		return obj._cache[key];
	},
	"import": function (url, callback) {
		var obj = this,
			url = obj._genurl({ action: 'import', url: url, callback: 'Kn3._callback' });
		obj._callback = callback;
		$.ajax({
			url: url,
			cache: true,
			dataType: 'script'
		});
	},
	upload: function (elem, callback, opts) {
		if (typeof opts == 'undefined') {
			var opts = {};
		}
		var obj = this,
			url = obj._genurl($.extend(opts, { action: 'upload' }));
		obj._callback = callback;
		document.domain = 'taringa.net';
		$.ajaxFileUpload({
			url: url,
			fileElementId: $(elem).attr('id'),
			dataType: 'json',
			success: callback
		});
	}
}

/*
 * Aux silly functions
 */
function elShow(elementId, state){
	if(!state) {
		$('#'+elementId).hide();
	}else{
		$('#'+elementId).show();
	}
}


function onblur_input(o){
	if($(o).val()==$(o).attr('title') || $(o).val()==''){
		$(o).val($(o).attr('title'));
		$(o).addClass('onblur_effect');
	}
}

var add_comment_enviado = false;
//Agregar Comentario
function nadd_comment(mostrar_resp, lastid_comm){
	if(add_comment_enviado)
		return;
	var textarea = $('#body_comm');
	var text = textarea.val();

	if(text == '' || text == textarea.attr('title')){
		textarea.focus();
		return;
	}

	$('.myComment #procesando').show();
	add_comment_enviado = true;
	$.ajax({
		type: 'POST',
		url: '/comentario3.php',
		data: 'comentario=' + encodeURIComponent(text) + '&lastid=' + lastid_comm + gget('postid') + gget('key') + '&mostrar_resp=' + mostrar_resp,
		success: function(h){
			switch(h.charAt(0)){
				case '0': //Error
					$('.myComment .error').html(h.substring(3)).show('slow');
					break;
				case '1': //OK
						textarea.attr('title', 'Escribir otra respuesta...').val('');
						onblur_input(textarea);
						$('#comments #comments-content').html($('#comments #comments-content').html()+'<div id="comments-new" style="display:none">'+h.substring(3)+'</div>');
						$('#comments #comments-content #comments-new').slideDown('fast', function(){
							$('#comments #comments-content #comments-new').removeAttr('id');
						});
					break;
			}
		},
		error: function(){
			add_comment_enviado = false;
		}
	});
}

//Agregar Comentario Novatos
function nadd_comment_novatos(mostrar_resp, lastid_comm){

	nDialog_cfg.width = 315;
	$('#action-dialogs-captcha .captcha-dialog').dialog(nDialog_cfg);
	//Boton
	$('.captcha-dialog').dialog( "option", "buttons", [
		{
			text: 'Aceptar',
			"class": 'ui-button-positive box-shadow-soft floatL',
			click: function() {
				$(this).dialog("close");
				if(add_comment_enviado)
					return;
				var textarea = $('#body_comm');
				var text = textarea.val();

				if(text == '' || text == textarea.attr('title')){
					textarea.focus();
					return;
				}

				$('.myComment #procesando').show();
				add_comment_enviado = true;

				//captcha
				var captcha_r = $("#recaptcha_response_field").val();
				var captcha_c = $("#recaptcha_challenge_field").val();


				$.ajax({
					type: 'POST',
					url: '/comentario3.php',
					data: 'comentario=' + encodeURIComponent(text) + '&lastid=' + lastid_comm + gget('postid') + gget('key') + '&mostrar_resp=' + mostrar_resp + '&captcha=' + captcha_r +'&captacha_c='+ captcha_c,
					success: function(h){
						switch(h.charAt(0)){
							case '0': //Error
								$('.myComment .error').html(h.substring(3)).show('slow');
								break;
							case '1': //OK
									textarea.attr('title', 'Escribir otra respuesta...').val('');
									onblur_input(textarea);
									$('#comments #comments-content').html($('#comments #comments-content').html()+'<div id="comments-new" style="display:none">'+h.substring(3)+'</div>');
									$('#comments #comments-content #comments-new').slideDown('slow', function(){
										$('#comments #comments-content #comments-new').removeAttr('id');
									});
								break;
						}
					},
					error: function(){
						add_comment_enviado = false;
					}
				});
			}
		},
		{
			text: 'Cancelar',
			"class": 'ui-button-neutral floatR',
			click: function() {$(this).dialog('close');}
		}
	]);
	$('.captcha-dialog').dialog('open');
}

function actualizar_comentarios(cat, nov){
	//var pais = $('#ult_comm > .filterBy a#Pais.here').length;
	$('#lastCommentsBox-data').css('opacity', 0.4);
	$.ajax({
		type: 'POST',
		url: '/ajax/comment/last',
		cache: false,
    data: 'cat='+cat+'&nov='+nov,
		//data: 'cat='+cat+'&nov='+nov+'&pais='+pais,
		success: function(h){
			$('#lastCommentsBox-data').html(h);
		},
		complete: function(){
			$('#lastCommentsBox-data').css('opacity', 1);
		}
	});
}

var add_resp_enviada = false;
function add_resp(mostrar_resp){
	if(add_resp_enviada)
		return;
	var textarea = $('#body_comm');
	var text = textarea.val();

	if(text == '' || text == textarea.attr('title')){
		textarea.focus();
		return;
	}

	$('.myComment #procesando').show();
	add_resp_enviada = true;
	$.ajax({
		type: 'POST',
		url: '/comunidades/respuesta.php',
		data: 'respuesta=' + encodeURIComponent(text) + gget('temaid') + gget('key') + '&mostrar_resp=' + mostrar_resp,
		success: function(h){
			switch(h.charAt(0)){
				case '0': //Error
					$('.myComment .error').html(h.substring(3)).show('slow');
					break;
				case '1': //OK
						textarea.val('');
						onblur_input(textarea);
						$('#comments #comments-content').html($('#comments #comments-content').html()+'<div id="comments-new" style="display:none">'+h.substring(3)+'</div>');
						$('#comments #comments-content #comments-new').slideDown('slow', function(){
							$('#comments #comments-content #comments-new').removeAttr('id');
						});
					break;
			}
		},
		error: function(){
			add_resp_enviada = false;
		}
	});
}


var Block = {

	block: function(type, id, cb, obj){
		var action = obj.attr('name');
		var datastring = '';
		if(action == 'block'){
			datastring = 'user='+id+'&bloqueado=1';
		}else{
			datastring = 'user='+id;
		}
		$.ajax({
			type: 'POST',
			url: '/bloqueados-cambiar.php',
			data: datastring+gget('key'),
			success: function(h){
				cb(h, obj);
			}
		});
	},
	userInprofileContext: function(h, obj) {
		var action = obj.attr('name');
		if(action == 'block'){
			obj.attr('name', 'uBlock');
			obj.removeClass('block-user-profile');
			obj.addClass('uBlock-user-profile');
		}else{
			obj.attr('name', 'block');
			obj.removeClass('uBlock-user-profile');
			obj.addClass('block-user-profile');
		}
		obj.find('span.default-button-text').toggle();
		obj.find('span.success-button-text').toggle();
	}
}

/*
 * Menu desplegable del usuario
 */
function user_menu_show(param){
	if(param){
		$('.my-account-links').show();
		$('#mensajes-box').hide();
		$('#notifications-box').hide();
	}else{
		$('.my-account-links').hide();
	}
}
/* FIN */

var Hovercard = {
	cache: {},
	lock: {},
	callback: function (obj) {

		var uid = $(obj).attr('data-uid'),
			template;

		if (!Hovercard.cache[uid]) {
			template = '';
			if (!Hovercard.lock[uid]) {
				Hovercard.lock[uid] = true;
				$.ajax({
					type: 'POST',
					url: '/ajax/mentions/user',
					data: 'uid=' + uid,
					dataType: 'json',
					success: function (r) {
						if (r.status == 1) {
							template = tmpl('hovercard', r.data);
							$('.hovercard-' + uid).html(template);
							Hovercard.cache[uid] = template;
						}
					}
				});
			}
		} else {
			template = Hovercard.cache[uid];
		}

		return '<div class="hovercard-' + uid + ' tooltip-hovercard">' + template + '</div>';

	}
}

/*
 * Login
 */

/* Box login */
function open_login_box(action){
	if($('#login_box').css('display') == 'block' && action!='open')
		close_login_box();
	else{
		$('#action-dialogs .login-dialog').dialog(nDialog_cfg);
		//Boton
		$('.login-dialog').dialog( "option", "buttons", [
			{
				text: 'Cancelar',
				"class": 'ui-button-neutral floatR',
				click: function() {$(this).dialog('close');}
			}
		]);
		$('.login-dialog').dialog('open');
		$('#nickname').focus();
	}
}

function close_login_box(){
	$('.login-dialog').dialog('close');
}

/* login ajax */
function login_ajax(form, connect){
	var el = new Array(), params = '';
	if (form == 'registro-logueo' || form == 'logueo-form') {
		el['nick'] = $('.reg-login .login-panel #nickname');
		el['pass'] = $('.reg-login .login-panel #password');
		el['error'] = $('.reg-login .login-panel #login_error');
		el['cargando'] = $('.reg-login .login-panel #login_cargando');
		el['cuerpo'] = $('.reg-login .login-panel .login_cuerpo');
		el['button'] = $('.reg-login .login-panel input[type="submit"]');
	} else {
		el['nick'] = $('#login_box #nickname');
		el['pass'] = $('#login_box #password');
		el['error'] = $('#login_box #login_error');
		el['cargando'] = $('#login_box #login_cargando');
		el['cuerpo'] = $('#login_box .login_cuerpo');
		el['button'] = $('#login_box input[type="submit"]');
	}
	if ($('input[name=redirect]').length) {
		var redir = '&r='+encodeURIComponent($('input[name=redirect]').val());
	} else {
		var redir = '';
	}
	if (typeof connect != 'undefined') {
		params = 'connect=facebook'+redir;
	} else {
		if (empty($(el['nick']).val())) {
			$(el['nick']).focus();
			return;
		}
		if (empty($(el['pass']).val())) {
			$(el['pass']).focus();
			return;
		}
		$(el['error']).css('display', 'none');
		$(el['cargando']).css('display', 'block');
		$(el['button']).attr('disabled', 'disabled').addClass('disabled');
		params = 'nick='+encodeURIComponent($(el['nick']).val())+'&pass='+encodeURIComponent($(el['pass']).val())+redir;
		if (form == 'logueo-form') {
			params += '&facebook=1';
		}
	}
	
	$('#action-dialogs .login-dialog').dialog(nDialog_cfg);

	$.ajax({
		type: 'post', url: '/login.php', cache: false, data: params,
		success: function (h) {
			switch(h.charAt(0)){
				case '0':
					$(el['error']).html(h.substring(3)).show();
					$(el['nick']).focus();
					$(el['button']).removeAttr('disabled').removeClass('disabled');
					break;
				case '1':
					if (form != 'registro-logueo') {
						close_login_box();
					}
					if (h.substring(3)=='Home') {
						location.href='/';
					} else if (h.substr(3) == 'Cuenta') {
						location.href = '/cuenta/';
					} else {
						location.reload();
					}
					break;
				case '2':
					$(el['cuerpo']).css('text-align', 'center').css('line-height', '150%').html(h.substring(3));
					break;
				case '3':
					$('#action-dialogs .login-dialog').html('Cargando...');
					$.ajax({
						type: 'POST',
						url: '/login-form.php',
						data: '',
						success: function(h){
							switch(h.charAt(0)){
								case '0':
									$('#action-dialogs .login-dialog').html(h.substring(3));
									$('#action-dialogs .login-dialog').dialog({ title: 'Error' });
									//Boton
									$('.login-dialog').dialog( "option", "buttons", [
										{
											text: 'Cancelar',
											"class": 'ui-button-neutral floatR',
											click: function() {$(this).dialog('close');}
										}
									]);	
									break;
								case '1':
									$('.login-dialog').dialog({ title: 'Ingresar' });
									$('.login-dialog').html(h.substring(3));
							}
						}
					});
					break;
				case '4':
					location.href = h.substr(3);
			}
		$('.login-dialog').dialog('open');
		},
		error: function() {
			$(el['error']).html(lang['error procesar']).show();
		},
		complete: function(){
			$(el['cargando']).css('display', 'none');
		}
	});
}


/* Login function */
function login(form, connect){
	var el = new Array(), params = '';
	if (form == 'registro-logueo' || form == 'logueo-form') {
		el['nick'] = $('.reg-login .login-panel #nickname');
		el['pass'] = $('.reg-login .login-panel #password');
		el['error'] = $('.reg-login .login-panel #login_error');
		el['cargando'] = $('.reg-login .login-panel #login_cargando');
		el['cuerpo'] = $('.reg-login .login-panel .login_cuerpo');
		el['button'] = $('.reg-login .login-panel input[type="submit"]');
	} else {
		el['nick'] = $('#login_box #nickname');
		el['pass'] = $('#login_box #password');
		el['error'] = $('#login_box #login_error');
		el['cargando'] = $('#login_box #login_cargando');
		el['cuerpo'] = $('#login_box .login_cuerpo');
		el['button'] = $('#login_box input[type="submit"]');
	}
	if ($('input[name=redirect]').length) {
		var redir = '&r='+encodeURIComponent($('input[name=redirect]').val());
	} else {
		var redir = '';
	}
	if (typeof connect != 'undefined') {
		params = 'connect=facebook'+redir;
	} else {
		if (empty($(el['nick']).val())) {
			$(el['nick']).focus();
			return;
		}
		if (empty($(el['pass']).val())) {
			$(el['pass']).focus();
			return;
		}
		$(el['error']).css('display', 'none');
		$(el['cargando']).css('display', 'block');
		$(el['button']).attr('disabled', 'disabled').addClass('disabled');
		params = 'nick='+encodeURIComponent($(el['nick']).val())+'&pass='+encodeURIComponent($(el['pass']).val())+redir;
		if (form == 'logueo-form') {
			params += '&facebook=1';
		}
	}
	$.ajax({
		type: 'post', url: '/login.php', cache: false, data: params,
		success: function (h) {
			switch(h.charAt(0)){
				case '0':
					$(el['error']).html(h.substring(3)).show();
					$(el['nick']).focus();
					$(el['button']).removeAttr('disabled').removeClass('disabled');
					break;
				case '1':
					if (form != 'registro-logueo') {
						close_login_box();
					}
					if (h.substring(3)=='Home') {
						location.href='/';
					} else if (h.substr(3) == 'Cuenta') {
						location.href = '/cuenta/';
					} else {
						location.reload();
					}
					break;
				case '2':
					$(el['cuerpo']).css('text-align', 'center').css('line-height', '150%').html(h.substring(3));
					break;
				case '3':
					location.href = '/registro';
					break;
				case '4':
					location.href = h.substr(3);

			}
		},
		error: function() {
			$(el['error']).html(lang['error procesar']).show();
		},
		complete: function(){
			$(el['cargando']).css('display', 'none');
		}
	});
}
/* FIN Login Functions */
function borrar_act(actid, perfilid, el){
    $.ajax({
        type: 'POST',
        url: '/ajax/ultima_actividad-borrar.php',
        data: 'actid=' + actid + '&perfilid=' + perfilid + gget('key'),
        success: function(h){
            switch(h.charAt(0)){
                case '0': //Error
                    mydialog.alert('Error', h.substring(3));
                    break;
                case '1':
					$(el).parent().parent().fadeOut('normal', function(){
						if( $(this).siblings('div').length == 0) {
							var datesep = $(this).parent();
							$(this).remove();

							$(datesep).delay(700).fadeOut('slow', function(){
								$(this).remove;
							});
						}else{
							$(this).remove();
						}
					});
                    break;
            }
        },
        error: function(){
            mydialog.error_500("borrar_act('"+actid+"')");
        }
    });
}
function filtrar_ultima_actividad(filtercode, perfilid ){
	$.ajax({
        type: 'POST',
        url: '/ajax/ultima_actividad-filtrar.php',
        data: 'filter=' + filtercode + '&perfilid=' + perfilid,
        success: function(h){
            switch(h.charAt(0)){
                case '0': //Error
                    mydialog.alert('Error', h.substring(3));
                    break;
                case '1':
					var filteredAct = h.substring(3, h.length);
					$('#last-activity-container').html(filteredAct);
                    break;
            }
        },
        error: function(){
            mydialog.error_500("filtrar_ultima_actividad('"+filtercode+"')");
        }
    });
}

function more_ultima_actividad(lastkey, perfilid, mtimes){
	$('#last-activity-view-more').remove();
	var lastulid = $('#last-activity-container .date-sep:last').attr('id');
	var filterval = $('#last-activity-filter').val();
	$.ajax({
        type: 'POST',
        url: '/ajax/ultima_actividad-more.php',
        data: 'lastkey=' + lastkey + '&perfilid=' + perfilid + '&filter=' + filterval + '&lastul=' + lastulid + '&mtimes=' + mtimes,
        success: function(h){
            switch(h.charAt(0)){
                case '0': //Error
                    mydialog.alert('Error', h.substring(3));
                    break;
                case '1':
					var moreAct = h.substring(3, h.length);
					//var newObject = jQuery.extend(true, {}, $(moreAct));
					var htmlToPrevdiv = [];
					var nmoreAct = [];
					var iteratora = 0;
					//var iteratorb = 0;
					var length = $(moreAct).size();;

					for( var a=0; a<length; a++){
						if($(moreAct).eq(a).attr('class') == 'sep'){
							//htmlToPrevdiv[iteratora++] = '<div class="sep">';
							// hack to get the complete div response
							htmlToPrevdiv[iteratora] = $('<div>').append($(moreAct).eq(a).clone()).remove().html();
							//htmlToPrevdiv[iteratora++] = '</div>';
							//$(moreAct).eq(a).remove();
						}else{
							nmoreAct[iteratora] = $('<div>').append($(moreAct).eq(a).clone()).remove().html();
						}
						iteratora++;
					}
					$('#'+lastulid).append(htmlToPrevdiv.join(''));
					$('#last-activity-container').append(nmoreAct.join(''));
                    break;
            }
        },
        error: function(){
            mydialog.error_500("filtrar_ultima_actividad('"+filtercode+"')");
        }
    });
}

/* Mensajes */
var mensajes = {

	cache: {},
	retry: Array(),

	ajax: function (param, cb, obj) {
		if (obj && obj.hasClass('loading-icon')) {
			return;
		}
		mensajes.retry.push(param);
		mensajes.retry.push(cb);
		$.ajax({
			url: '/ajax/mp/last',
			type: 'post',
			dataType: 'json',
			data: param.join('&')+gget('key'),
			success: function (r) {
				if(r.status == 1){
					if (obj) {
						obj.removeClass('loading-icon');
					}
					cb(r.data);
				}else{
					obj.removeClass('loading-icon');
				}
			}
		});
	},
	last: function () {
		var c = parseInt($('#mensajes-navitem > .bubble > a > span').html());
		if ($('#mensajes-box').css('display') != 'none') {
			$('#mensajes-box').hide();
			$('#mensajes-navitem').removeClass('active');
		} else {
			if (($('#mensajes-box').css('display') == 'none' && c > 0) || typeof mensajes.cache.last == 'undefined') {
				$('#mensajes-navitem').children('i').addClass('loading-icon');
				$('#mensajes-navitem').addClass('active');
				mensajes.ajax(
					Array('action=last'),
					function (data) {
						mensajes.cache.last = data;
						mensajes.show();
					},
					$('#mensajes-navitem')
				);
			} else {
				mensajes.show();
			}
		}
	},
	show: function () {
		//tmpl("follower_tmpl", r.data)
		if (typeof mensajes.cache.last != 'undefined') {
			$('.navpanel').hide();
			$('#mensajes-navitem > div.alerts').remove();
			$('#mensajes-navitem').addClass('active');
			$('#mensajes-navitem').children('i').removeClass('loading-icon');
			$('#mensajes-list').html( tmpl("lastmessages_tmpl", {data: mensajes.cache.last}) );
			$('#mensajes-box').show();
			$('#mensajes-box > div > div.list > div.list-element > a[title]').tipsy({gravity: 's'});
		}
	}
}
/* Fin mensajes */

/* utils */

function set_checked(obj){
	document.getElementById(obj).checked=true;
}

function is_checked(obj){
	return document.getElementById(obj) && document.getElementById(obj).checked;
}

function gget(data, sin_amp){
	var r = data+'=';
	if(!sin_amp)
		r = '&'+r;
	switch(data){
		case 'key':
			if(global_data.user_key!='')
				return r+global_data.user_key;
			break;
		case 'postid':
			if(global_data.postid!='')
				return r+global_data.postid;
			break;
		case 'comid':
			if(global_data.comid!='')
				return r+global_data.comid;
			break;
		case 'temaid':
			if(global_data.temaid!='')
				return r+global_data.temaid;
			break;
	}
	return '';
}

function el(id){
  if(document.getElementById)
    return document.getElementById(id);
  else if(window[id])
    return window[id];
  return null;
}


function keypress_intro(e){
  tecla=(document.all)?e.keyCode:e.which;
  return (tecla==13);
}

function onfocus_input(o){
	if($(o).val()==$(o).attr('title')){
		$(o).val('');
		$(o).removeClass('onblur_effect');
	}
}
function onblur_input(o){
	if($(o).val()==$(o).attr('title') || $(o).val()==''){
		$(o).val($(o).attr('title'));
		$(o).addClass('onblur_effect');
	}
}

//Imprimir editores
function print_editor(){
	//Editor de posts
	if($('#markItUp') && !$('#markItUpMarkItUp').length){
		if (location.href.match(/http:\/\/(.+?\.)?(taringa|poringa)\.net\/(agregar\/?|edicion\.form\.php\?id=[0-9]+)/)) {
			$('#markItUp').richedit({ markItUpSettings: mySettings });
		} else {
			$('#markItUp').markItUp(mySettings_comu);
		}
		$('#emoticons a').click(function(){
			emoticon = ' ' + $(this).attr("smile") + ' ';
			$.markItUp({ replaceWith:emoticon });
			return false;
		});
	}
	//Editor de posts comentarios
	if($('#body_comm') && !$('#markItUpbody_comm').length){
		$('#body_comm').markItUp(mySettings_cmt);
	}

	//Editor de respuestas comunidades
	if($('#body_resp') && !$('#markItUpbody_resp').length){
		$('#body_resp').markItUp(mySettings_cmt);
	}
}
/* FIN - Editor */


// shout delete
function shout_delete(id,owner){
		$('#deleteShout-dialog').dialog({ 
			width: 300,
			resizable: false,
			modal: true,
			buttons: [
				{
					text: 'Aceptar',
					"class": 'ui-button-positive box-shadow-soft floatL',
					click: function() {
						ajax(
							'shout',
							'delete',
							{
								id: id,
								owner: owner
							},
							{
							success: function (r) {
								if(r.status == 1){
									$('#deleteShout-dialog').dialog('close');
									$('#'+id).fadeOut('fast').remove();
								}	
							}
							}
						);
					}		
				},
				{
					text: 'Cancelar',
					"class": 'ui-button-neutral floatR',
					click: function() {
						$(this).dialog('close');
					}
				}
			]
		});
	}


/*
 *	Reply Shout
 */
var add_reply_shout_enviado = false;
//Agregar Comentario
function add_reply_shout(){
	if(add_reply_shout_enviado)
		return;
	var textarea = $('#body_comm');
	var text = textarea.val();

	if(text == '' || text == textarea.attr('title')){
		textarea.focus();
		return;
	}

	$('.myComment #procesando').show();
	add_comment_enviado = true;
	$.ajax({
		type: 'POST',
		url: '/ajax/shout-reply-add.php',
		data: 'body=' + encodeURIComponent(text) + '&parent_id=' + parent_id + '&parent_owner=' + parent_owner + gget('key'),
		success: function(h){
			var reply = jQuery.parseJSON(h);
			switch(reply.status){
				case 0: //Error
					$('.myComment .error').html(reply.data).show('slow');
					break;
				case 1: //OK
						textarea.attr('title', 'Escribir otra respuesta...').val('');
						onblur_input(textarea);
						$(tmpl('shout_reply', reply.data)).appendTo('#coments-content');
						$('#div_shout_recent_reply').slideDown('fast');
						break;
			}
		},
		error: function(){
			add_reply_shout_enviado = false;
		}
	});
}


/*
 * Delete Reply Shout
 */
function remove_reply_shout(shoutId, shoutOwner, replyId, replyOwner, modId){
		/* Eliminar Shout Reply */
			$.ajax({
				type: 'POST',
				url: '/ajax/shout-reply-delete.php',
				data: 'shout_id=' + shoutId + '&shout_owner=' + shoutOwner + '&reply_id=' + replyId + '&reply_owner=' + replyOwner + '&modId=' + modId,
				success: function(h){
					var reply = jQuery.parseJSON(h);
					switch(reply.status){
						case 0: //Error
							mydialog.alert('Error', reply.data);
							break;
						case 1:
							$('#div_shout_reply_'+replyId).fadeOut('normal', function(){$(this).remove();});
							break;
					}
				},
				error: function(){
					mydialog.error_500("borrar_com('"+comid+"')");
				}
			});
}

var mySettings_comu = {
	markupSet: [
		{name:lang['Negrita'], key:'B', openWith:'[b]', closeWith:'[/b]'},
		{name:lang['Cursiva'], key:'I', openWith:'[i]', closeWith:'[/i]'},
		{name:lang['Subrayado'], key:'U', openWith:'[u]', closeWith:'[/u]'},
		{separator:'-' },
		{name:lang['Alinear a la izquierda'], key:'', openWith:'[align=left]', closeWith:'[/align]'},
		{name:lang['Centrar'], key:'', openWith:'[align=center]', closeWith:'[/align]'},
		{name:lang['Alinear a la derecha'], key:'', openWith:'[align=right]', closeWith:'[/align]'},
		{separator:'-' },
		{name:lang['Color'], dropMenu: [
			{name:lang['Rojo oscuro'], openWith:'[color=darkred]', closeWith:'[/color]' },
			{name:lang['Rojo'], openWith:'[color=red]', closeWith:'[/color]' },
			{name:lang['Naranja'], openWith:'[color=orange]', closeWith:'[/color]' },
			{name:lang['Marron'], openWith:'[color=brown]', closeWith:'[/color]' },
			{name:lang['Amarillo'], openWith:'[color=yellow]', closeWith:'[/color]' },
			{name:lang['Verde'], openWith:'[color=green]', closeWith:'[/color]' },
			{name:lang['Oliva'], openWith:'[color=olive]', closeWith:'[/color]' },
			{name:lang['Cyan'], openWith:'[color=cyan]', closeWith:'[/color]' },
			{name:lang['Azul'], openWith:'[color=blue]', closeWith:'[/color]' },
			{name:lang['Azul oscuro'], openWith:'[color=darkblue]', closeWith:'[/color]' },
			{name:lang['Indigo'], openWith:'[color=indigo]', closeWith:'[/color]' },
			{name:lang['Violeta'], openWith:'[color=violet]', closeWith:'[/color]' },
			{name:lang['Negro'], openWith:'[color=black]', closeWith:'[/color]' }
		]},
		{name:lang['Tamano'], dropMenu :[
			{name:lang['Pequena'], openWith:'[size=9]', closeWith:'[/size]' },
			{name:lang['Normal'], openWith:'[size=12]', closeWith:'[/size]' },
			{name:lang['Grande'], openWith:'[size=18]', closeWith:'[/size]' },
			{name:lang['Enorme'], openWith:'[size=24]', closeWith:'[/size]' }
		]},
		{name:lang['Fuente'], dropMenu :[
			{name:'Arial', openWith:'[font=Arial]', closeWith:'[/font]' },
			{name:'Courier New', openWith:'[font="Courier New"]', closeWith:'[/font]' },
			{name:'Georgia', openWith:'[font=Georgia]', closeWith:'[/font]' },
			{name:'Times New Roman', openWith:'[font="Times New Roman"]', closeWith:'[/font]' },
			{name:'Verdana', openWith:'[font=Verdana]', closeWith:'[/font]' },
			{name:'Trebuchet MS', openWith:'[font="Trebuchet MS"]', closeWith:'[/font]' },
			{name:'Lucida Sans', openWith:'[font="Lucida Sans"]', closeWith:'[/font]' },
			{name:'Comic Sans', openWith:'[font="Comic Sans"]', closeWith:'[/font]' }
		]},
		{separator:'-' },
		{name:lang['Insertar video de YouTube'], beforeInsert:function(h){ markit_yt(h); }},
		//{name:lang['Insertar video de Google Video'], beforeInsert:function(h){ markit_gv(h); }},
		{name:lang['Insertar archivo SWF'], beforeInsert:function(h){ markit_swf(h); }},
		{name:lang['Insertar Imagen'], beforeInsert:function(h){ markit_img(h); }},
		{name:lang['Insertar Link'], beforeInsert:function(h){ markit_url(h); }},
		{name:lang['Citar'], beforeInsert:function(h){ markit_quote(h); }}
	]
};



/* Notificaciones */
var notifica = {

	cache: {},
	retry: Array(),

	ajax: function (param, cb, obj, nowait, process_response) {
		if (obj && obj.hasClass('loading-icon')) return;
		notifica.retry.push(param);
		notifica.retry.push(cb);
		var error = param[0]!='action=count';
		if (obj) {
			obj.addClass('loading-icon');
		}
		if(nowait !== undefined && nowait){
			if (obj) {
				obj.removeClass('loading-icon');
			}
			cb(obj);
		}else{
			nowait = false;
		}

		if(process_response !== undefined && process_response){
			$.ajax({
				url: '/notificaciones-ajax.php',
				dataType: 'json',
				type: 'post',
				data: param.join('&')+gget('key'),
				success: function (r) {
					var response_code = r.status;
					switch( response_code ){
						case 0:
							cb(obj,r,true);
							break;
						default:
							break;
					}
				}
			});
		}else{
			$.ajax({
				url: '/notificaciones-ajax.php', type: 'post', data: param.join('&')+gget('key'),
				success: function (r) {
					if(!nowait){
						if (obj) {
							obj.removeClass('loading-icon');
						}
						cb(obj, r);
					}
				}
			});
		}
	},
	last: function () {
		var c = parseInt($('#notifications-navitem > .bubble > a > span').html());
		if ($('#notifications-box').css('display') != 'none') {
			$('#notifications-box').hide();
			$('#notifications-navitem').removeClass('active');
		}
		else {
			if (($('#notifications-box').css('display') == 'none' && c > 0) || typeof notifica.cache.last == 'undefined') {
				$('#notifications-navitem').children('i').addClass('loading-icon');
				$('#notifications-navitem').addClass('active');
				notifica.ajax(
					Array('action=last'),
					function (obj, r) {
						notifica.cache['last'] = r;
						notifica.show();
					},
					$('#notifications-navitem')
				);
			} else {
				notifica.show();
			}
		}
	},
	show: function () {
		if (typeof notifica.cache.last != 'undefined') {
			$('.navpanel').hide();
			$('#notifications-navitem > div.alerts').remove();
			$('#notifications-navitem').addClass('active');
			$('#notifications-navitem').children('i').removeClass('loading-icon');
			$('#notifications-box').show().children().children('div.list').html(notifica.cache.last);
			$('#notifications-box > div > div.list > div.list-element > a[title]').tipsy({gravity: 's'});
		}
	},



	userMenuPopup: function (obj) {
		var id = $(obj).attr('userid');
		var cache_id = 'following_'+id, list = $(obj).children('ul');
		$(list).children('li.check').hide();
		if (this.cache[cache_id] == 1) {
			$(list).children('li.follow').hide();
			$(list).children('li.unfollow').show();
		}
		else {
			$(list).children('li.unfollow').hide();
			$(list).children('li.follow').show();
		}
	},
	userMenuHandle: function (r) {
		var x = r.split('-');
		if (x.length == 3 && x[0] == 0) {
			var cache_id = 'following_'+x[1];
			notifica.cache[cache_id] = parseInt(x[0]);
		}
		else if (x.length == 4) {
			mydialog.alert('Notificaciones', x[4]);
		}
	},
	// LISTO
	userIntemaContext: function (obj, r) {
		var followersCounter = $('#user-metadata-post .followers-count .data-followers-count');
		var actualFollowers = parseInt(followersCounter.data('val'));
		var action = obj.attr('name');
		var updatedFollowers = actualFollowers;
		if(action == 'follow'){
			updatedFollowers = parseInt(actualFollowers) + 1;
			notifica.updateFollowButton(obj);
		} else {
			updatedFollowers = parseInt(actualFollowers) - 1;
			notifica.updateUnfollowButton(obj);
		}
		followersCounter.data('val', updatedFollowers);
		followersCounter.hide().html(my_number_format(updatedFollowers)).show();
	},
	// LISTO
	userInpostContext: function(obj, r) { // no more ajax response
		var followersCounter = $('#user-metadata-post .followers-count .data-followers-count');
		var actualFollowers = parseInt(followersCounter.data('val'));
		var action = obj.attr('name');
		var updatedFollowers = actualFollowers;
		if(action == 'follow'){
			updatedFollowers = parseInt(actualFollowers) + 1;
			notifica.updateFollowButton(obj);
		} else {
			updatedFollowers = parseInt(actualFollowers) - 1;
			notifica.updateUnfollowButton(obj);
		}
		followersCounter.data('val', updatedFollowers);
		followersCounter.hide().html(my_number_format(updatedFollowers)).show();
	},
	// LISTO
	userInfollowersContext: function(obj, r) { // no more ajax response
		var action = obj.attr('name');
		if(action == 'follow'){
			notifica.updateFollowButton(obj);
		} else {
			notifica.updateUnfollowButton(obj);
		}
	},
	userInfollowMonitorContext: function(obj, r) { // no more ajax response
		var followersCounter = $('#user-metadata-post span.followers-count');
		var actualFollowers = parseInt(followersCounter.data('val'));
		var action = obj.attr('name');
		var updatedFollowers = actualFollowers;
		if(action == 'follow'){
			updatedFollowers = parseInt(actualFollowers) + 1;
			obj.attr('name', 'unfollow');
			obj.find('span').removeClass('add_follow');
			obj.find('span').addClass('remove_follow');
		} else {
			updatedFollowers = parseInt(actualFollowers) - 1;
			obj.attr('name', 'follow');
			obj.find('span').removeClass('remove_follow');
			obj.find('span').addClass('add_follow');
		}
		followersCounter.data('val', updatedFollowers);
		obj.find('span.ui-button-text > span.default-button-text').toggle();
		obj.find('span.ui-button-text > span.success-button-text').toggle();
		$('#user-metadata-post span.followers-count').hide().html(number_format(updatedFollowers)).show();
	},
	postInfollowMonitorContext: function(obj, r) { // no more ajax response
		var followersCounter = $('#user-metadata-post span.followers-count');
		var actualFollowers = parseInt(followersCounter.data('val'));
		var action = obj.attr('name');
		var updatedFollowers = actualFollowers;
		if(action == 'follow'){
			updatedFollowers = parseInt(actualFollowers) + 1;
			obj.attr('name', 'unfollow');
			obj.find('span').removeClass('add_follow');
			obj.find('span').addClass('remove_follow');
		} else {
			updatedFollowers = parseInt(actualFollowers) - 1;
			obj.attr('name', 'follow');
			obj.find('span').removeClass('remove_follow');
			obj.find('span').addClass('add_follow');
		}
		followersCounter.data('val', updatedFollowers);
		obj.find('span.ui-button-text > span.default-button-text').toggle();
		obj.find('span.ui-button-text > span.success-button-text').toggle();
		$('#user-metadata-post span.followers-count').hide().html(number_format(updatedFollowers)).show();
	},
	temaInfollowMonitorContext: function(obj, r) { // no more ajax response
		var followersCounter = $('#user-metadata-post span.followers-count');
		var actualFollowers = parseInt(followersCounter.data('val'));
		var action = obj.attr('name');
		var updatedFollowers = actualFollowers;
		if(action == 'follow'){
			updatedFollowers = parseInt(actualFollowers) + 1;
			obj.attr('name', 'unfollow');
			obj.find('span').removeClass('add_follow');
			obj.find('span').addClass('remove_follow');
		} else {
			updatedFollowers = parseInt(actualFollowers) - 1;
			obj.attr('name', 'follow');
			obj.find('span').removeClass('remove_follow');
			obj.find('span').addClass('add_follow');
		}
		followersCounter.data('val', updatedFollowers);
		obj.find('span.ui-button-text > span.default-button-text').toggle();
		obj.find('span.ui-button-text > span.success-button-text').toggle();
		$('#user-metadata-post span.followers-count').hide().html(number_format(updatedFollowers)).show();
	},
	comunidadInfollowMonitorContext: function(obj, r) { // no more ajax response
		var followersCounter = $('#user-metadata-post span.followers-count');
		var actualFollowers = parseInt(followersCounter.data('val'));
		var action = obj.attr('name');
		var updatedFollowers = actualFollowers;
		if(action == 'follow'){
			updatedFollowers = parseInt(actualFollowers) + 1;
			obj.attr('name', 'unfollow');
			obj.find('span').removeClass('add_follow');
			obj.find('span').addClass('remove_follow');
		} else {
			updatedFollowers = parseInt(actualFollowers) - 1;
			obj.attr('name', 'follow');
			obj.find('span').removeClass('remove_follow');
			obj.find('span').addClass('add_follow');
		}
		followersCounter.data('val', updatedFollowers);
		obj.find('span.ui-button-text > span.default-button-text').toggle();
		obj.find('span.ui-button-text > span.success-button-text').toggle();
		$('#user-metadata-post span.followers-count').hide().html(number_format(updatedFollowers)).show();
	},
	updateFollowButton: function(obj) {
		obj.attr('name', 'unfollow');
		obj.addClass('ui-button-positive');
		obj.find('span.ui-button-text > span.unfollow-button-text').removeClass('disabled');
		obj.find('span.ui-button-text > span.follow-button-text').hide();
		obj.find('span.ui-button-text > span.following-button-text').show();
		obj.mouseenter();
	},
	updateUnfollowButton: function(obj) {
		obj.attr('name', 'follow');
		obj.removeClass('ui-button-positive');
		obj.find('span.ui-button-text > span.unfollow-button-text').addClass('disabled').hide();
		obj.find('span.ui-button-text > span.following-button-text').hide();
		obj.find('span.ui-button-text > span.follow-button-text').show();
		obj.mouseenter();
	},
	// LISTO
	userInprofileContext: function (obj, r, onlyProcessResponse) {
		if(onlyProcessResponse !== undefined && onlyProcessResponse){
			var action = obj.attr('name');
			if(action == 'unfollow'){
				var followersProfileBox = $('#followers-profile-box ul.avatar-list');
				followersProfileBox.append( tmpl("follower_tmpl", r.data) );
			}else{
				$('#followers-profile-box ul.avatar-list > li[data-uid='+r.data.id+']').fadeOut('slow').remove();
			}
			// test
		}else{
			var followersCounter = $('.followers-count .data-followers-count');
			var actualFollowers = parseInt(followersCounter.data('val'));
			var action = obj.attr('name');
			var updatedFollowers = actualFollowers;

			if(action == 'follow'){
				updatedFollowers = parseInt(actualFollowers) + 1;
				notifica.updateFollowButton(obj);
			} else {
				updatedFollowers = parseInt(actualFollowers) - 1;
				notifica.updateUnfollowButton(obj);
			}
			followersCounter.data('val', updatedFollowers);
			followersCounter.hide().html(my_number_format(updatedFollowers)).show();
		}
	},
	// LISTO
	userIntopContext: function(obj, r) {
		var action = obj.attr('name');
		if(action == 'follow'){
			obj.attr('name', 'unfollow');
			obj.removeClass('ui-button-positive');
			obj.removeClass('follow-user-top');
			obj.addClass('unfollow-user-top');
			obj.find('span.default-button-text').toggle();
			obj.find('span.success-button-text').toggle();
		}else{

			obj.attr('name', 'follow');
			obj.addClass('ui-button-positive');
			obj.removeClass('unfollow-user-top');
			obj.addClass('follow-user-top');
		}
	},
	// LISTO
	userInMonitorContext: function (obj, r) {
		var followersCounter = $('monitor-data-stats .followers-count .data-followers-count');
		var actualFollowers = parseInt(followersCounter.data('val'));
		var action = obj.attr('name');
		var updatedFollowers = actualFollowers;
		if(action == 'follow'){
			updatedFollowers = parseInt(actualFollowers) + 1;
			notifica.updateFollowButton(obj);
		} else {
			updatedFollowers = parseInt(actualFollowers) - 1;
			notifica.updateUnfollowButton(obj);
		}
		followersCounter.data('val', updatedFollowers);
		followersCounter.hide().html(my_number_format(updatedFollowers)).show();
	},
	// LISTO
	postInpostContext: function (obj, r) {
		var followersCounter = $('#post-data-stats .followers-count .data-followers-count');
		var actualFollowers = parseInt(followersCounter.data('val'));
		var action = obj.attr('name');
		var updatedFollowers = actualFollowers;
		if(action == 'follow'){
			updatedFollowers = parseInt(actualFollowers) + 1;
			notifica.updateFollowButton(obj);
		} else {
			updatedFollowers = parseInt(actualFollowers) - 1;
			notifica.updateUnfollowButton(obj);
		}
		followersCounter.data('val', updatedFollowers);
		followersCounter.hide().html(my_number_format(updatedFollowers)).show();
	},
	// LISTO
	temaIntemaContext: function (obj, r) {
		var followersCounter = $('#post-data-stats .followers-count .data-followers-count');
		var actualFollowers = parseInt(followersCounter.data('val'));
		var action = obj.attr('name');
		var updatedFollowers = actualFollowers;
		if(action == 'follow'){
			updatedFollowers = parseInt(actualFollowers) + 1;
			notifica.updateFollowButton(obj);
		} else {
			updatedFollowers = parseInt(actualFollowers) - 1;
			notifica.updateUnfollowButton(obj);
		}
		followersCounter.data('val', updatedFollowers);
		followersCounter.hide().html(my_number_format(updatedFollowers)).show();
	},
	// LISTO
	comunidadIncomunityContext: function (obj, r) {
		var followersCounter = $('#comunity-data-stats .followers-count .data-followers-count');
		var actualFollowers = parseInt(followersCounter.data('val'));
		var action = obj.attr('name');
		var updatedFollowers = actualFollowers;
		if(action == 'follow'){
			updatedFollowers = parseInt(actualFollowers) + 1;
			notifica.updateFollowButton(obj);
		} else {
			updatedFollowers = parseInt(actualFollowers) - 1;
			notifica.updateUnfollowButton(obj);
		}
		followersCounter.data('val', updatedFollowers);
		followersCounter.hide().html(my_number_format(updatedFollowers)).show();
	},
	icomunidadHandle: function (r) {
		var x = r.split('-');
		if (x.length == 3 && x[0] == 0) {
			$('a.follow_comunidad, a.unfollow_comunidad').toggle();
			$('li.comunidad_seguidores').html(number_format(parseInt(x[2]))+' Seguidores');
		}
		else if (x.length == 4) {
			mydialog.alert('Notificaciones', x[3]);
		}
	},
	temaIcomunidadHandle: function (r) {
		var x = r.split('-');
		if (x.length == 3 && x[0] == 0) {
			$('div.followBox > a.follow_tema, a.unfollow_tema').toggle();
			$('span.tema_notifica_count').html(number_format(parseInt(x[2]))+' Seguidores');
		}
		else if (x.length == 4) mydialog.alert('Notificaciones', x[3]);
	},
	ruserInAdminHandle: function (r) {
		var x = r.split('-');
		if (x.length == 3 && x[0] == 0) $('.ruser'+x[1]).toggle();
		else if (x.length == 4) mydialog.alert('Notificaciones', x[3]);
	},
	listInAdminHandle: function (r) {
		var x = r.split('-');
		if (x.length == 3 && x[0] == 0) {
			$('.list'+x[1]).toggle();
			$('.list'+x[1]+':first').parent('div').parent('li').children('div:first').fadeTo(0, $('.list'+x[1]+':first').css('display') == 'none' ? 0.5 : 1);
		}
		else if (x.length == 4) mydialog.alert('Notificaciones', x[3]);
	},
	spamPostHandle: function (r) {
		var x = r.split('-');
		if (x.length == 2){
			$('#action-dialogs .sharePost-dialog-error > p').html(x[1]);
			$('.sharePost-dialog-error').dialog(nDialog_cfg);
			$('.sharePost-dialog-error').dialog('open');
		}else{
			$('.post-share-list .number-share-t').html(number_format(parseInt($('.post-share-list .number-share-t').html().replace(".", "")) + 1, 0, ',', '.'));
		}
	},
	spamTemaHandle: function (r) {
		var x = r.split('-');
		if (x.length == 2){
			$('#action-dialogs .shareTema-dialog-error > p').html(x[1]);
			$('.shareTema-dialog-error').dialog(nDialog_cfg);
			$('.shareTema-dialog-error').dialog('open');
		}else{
			$('.post-share-list .number-share-t').html(number_format(parseInt($('.post-share-list .number-share-t').html().replace(".", "")) + 1, 0, ',', '.'));
		}
	},
	follow: function (type, id, cb, obj, process_response) {
		var action = obj.attr('name');
		var nowait = true;
		if(process_response == undefined){
			process_response = false;
		}
		this.ajax(Array('action='+action, 'type='+type, 'obj='+id), cb, obj, nowait, process_response);
	},
	unfollow: function (type, id, cb, obj) {
		this.ajax(Array('action=unfollow', 'type='+type, 'obj='+id), cb, obj);
	},
	spam: function (id, cb) {
		this.ajax(Array('action=spam', 'postid='+id), cb);
	},
	c_spam: function (id, cb) {
		this.ajax(Array('action=c_spam', 'temaid='+id), cb);
	},
	sharePost: function (id) {
		$('#action-dialogs .sharePost-dialog').dialog(nDialog_cfg);
		$('.sharePost-dialog').dialog( "option", "buttons", [
			{
				text: "Aceptar",
				"class": 'ui-button-positive box-shadow-soft floatL',
				click: function() {
					notifica.spam(id, notifica.spamPostHandle);
					$(this).dialog("close");
				}
			},
			{
				text: 'Cancelar',
				"class": 'ui-button-cancel floatR',
				click: function() {$(this).dialog('close');}
			}
		]);
		$('.sharePost-dialog').dialog('open');
	},
	shareTema: function (id) {
		$('#action-dialogs .shareTema-dialog').dialog(nDialog_cfg);
		$('.shareTema-dialog').dialog( "option", "buttons", [
			{
				text: "Aceptar",
				"class": 'ui-button-positive box-shadow-soft floatL',
				click: function() {
					notifica.c_spam(id, notifica.spamPostHandle);
					$(this).dialog("close");
				}
			},
			{
				text: 'Cancelar',
				"class": 'ui-button-neutral floatR',
				click: function() { $(this).dialog('close');}
			}
		]);
		$('.shareTema-dialog').dialog('open');
	},
	check: function () {
		notifica.ajax(Array('action=count'), notifica.popup);
	},
	popup: function (r) {
		var c = parseInt($('div.alertas > a > span').html());
		if (r != c && r > 0) {
			if (!$('div.alertas').length) $('div.userInfoLogin > ul > li.monitor').append('<div class="alertas"><a><span></span></a></div>');
			$('div.alertas > a > span').html(r);
			$('div.alertas').animate({top: '-=5px'}, 100, null, function(){$('div.alertas').animate({top: '+=5px'}, 100)});
		}
		else if (r == 0) $('div.alertas').remove();
	},

	filter: function (x, obj) {
		var cls;
		switch (x) {
			case 'fav':
				cls = '.post-favorite';
				break;
			case 'comment-own':
				cls = '.post-comment-own';
				break;
			case 'points':
				cls = '.post-points';
				break;
			case 'new':
				cls = '.friend-new';
				break;
			case 'post':
				cls = '.friend-post';
				break;
			case 'thread':
				cls = '.friend-thread';
				break;
			case 'comment':
				cls = '.post-comment';
				break;
			case 'threadc':
				cls = '.com-thread';
				break;
			case 'reply':
				cls = '.com-reply';
				break;
			case 'spam':
				cls = '.post-spam';
				break;
			case 'medal':
				cls = '.medal';
		}
		if (cls) {
			$(cls).toggle();
			var site = /poringa/.test(document.domain) ? 'poringa' : 'taringa';
			var v = $(obj).attr('checked') ? 1 : 0;
			document.cookie = 'monitor['+x+']='+v+';expires=Thu, 26 Jul 2012 16:12:48 GMT;path=/;domain=.'+site+'.net';
		}
	}

}

/* Agregar post a favoritos */
var add_favoritos_agregado = false;
function add_favoritos(obj){
	if(add_favoritos_agregado)
		return;
	if(!gget('key')){
		//mydialog.alert('Login', 'Tenes que estar logueado para realizar esta operaci&oacute;n');
		return;
	}
	add_favoritos_agregado = true;
	var favoriteCounter = $('#post-data-stats .action-data > .favs-count > span');
	var actualFavorites = parseInt(favoriteCounter.data('val'));
	var action = obj.attr('name');
	var updatedFavorites = actualFavorites;
	if(action == 'favorite'){
		updatedFavorites = parseInt(actualFavorites) + 1;
		obj.attr('name', 'unfavorite');
		obj.addClass('ui-button-positive');
		obj.button('disable');
		//obj.removeClass('favorite-post-post');
		//obj.addClass('favorite-post-post');
		obj.find('span.ui-button-text > span.default-button-text').toggle();
		obj.find('span.ui-button-text > span.success-button-text').toggle();
		favoriteCounter.data('val', updatedFavorites);
		favoriteCounter.hide().html(number_format(updatedFavorites)).show();
		$.ajax({
			type: 'POST',
			url: '/favoritos-agregar.php',
			data: gget('postid', true) + gget('key'),
			success: function(h){
			/*
			switch(h.charAt(0)){
				case '0': //Error
					// do nothing ?
					obj.addClass('error');
					//$('#addtofavs-post > span').addClass('error');
					//$('#addtofavs-post > span > strong').html(h.substring(3)).fadeIn();
					//$('.post-metadata .mensajes').addClass('error').html(h.substring(3)).slideDown();
					break;
				case '1': //OK
					//$('#post-data-stats .action-data > .favs-count > span').html(number_format(parseInt($('#post-data-stats .action-data > .favs-count > span').html().replace(".", "")) + 1, 0, ',', '.'));
					break;
			}*/
			},
			error: function(){
				add_favoritos_agregado = false;
				//mydialog.error_500("nadd_favoritos()");
			}
		});
	}else{
		// not implemented
		//obj.attr('name', 'follow');
		//obj.removeClass('unfollow-post-post');
		//obj.addClass('follow-post-post');
	}
}

/* Borrar Post */
function borrar_post(aceptar){
	if(!aceptar){
			$('#action-dialogs .delPost-dialog').dialog(nDialog_cfg);
      $('.delPost-dialog p').html('&iquest;Seguro que deseas borrar este post?');
      $('.delPost-dialog' ).dialog({ title: 'Borrar Post' });
      $('.delPost-dialog').dialog("option", "buttons", [
        {
          text: "Aceptar",
          "class": 'ui-button-negative box-shadow-soft floatL',
          click: function() {
            borrar_post(2);    
          }      
        },
        {
          text: "Cancelar",
          "class": 'ui-button box-shadow-soft floatR',
          click: function() {
            $(this).dialog('close');
          }
        }
			]);
			$('.delPost-dialog').dialog('open');	
	}else if(aceptar==2){
			$('#action-dialogs .delPost-dialog').dialog(nDialog_cfg);
      $('.delPost-dialog p').html('Te pregunto de nuevo... &iquest;Seguro que deseas borrar este post?');
      $('.delPost-dialog' ).dialog({ title: 'Borrar Post' });
      $('.delPost-dialog').dialog("option", "buttons", [
        {
          text: "Aceptar",
          "class": 'ui-button-negative box-shadow-soft floatL',
          click: function() {
            borrar_post(3);    
          }      
        },
        {
          text: "Cancelar",
          "class": 'ui-button box-shadow-soft floatR',
          click: function() {
            $(this).dialog('close');
          }
        }
			]);
			$('.delPost-dialog').dialog('open');
	}else{
		$.ajax({
			type: 'POST',
			url: '/post.borrar.php',
			data: gget('postid', true) + gget('key'),
			success: function(h){
				switch(h.charAt(0)){
					case '0': //Error
						$('.delPost-dialog p').html(h.substring(3));
						$('.delPost-dialog').dialog("option", "buttons", [
							{
								text: "Aceptar",
								"class": 'ui-button box-shadow-soft floatL',
								click: function() {
									$(this).dialog('close');
								}
							}
						]);
						break;
					case '1':
						$('.delPost-dialog p').html(h.substring(3));
						$('.delPost-dialog').dialog("option", "buttons", [
							{
								text: "Aceptar",
								"class": 'ui-button box-shadow-soft floatL',
								click: function() {
									$(this).dialog('close');
									window.location.reload();
								}
							},
							{
								text: "Ir a la Home",
								"class": 'ui-button box-shadow-soft floatR',
								click: function() {
									$(this).dialog('close');
									location.href = "/";
								}
							}
						]);
						break;
				}
			},
			error: function(){
				$('.delPost-dialog p').html("Error al prcesar lo solicitado, intetalo de nuevo");
				$('.delPost-dialog').dialog("option", "buttons", [
					{
						text: "Aceptar",
						"class": 'ui-button box-shadow-soft floatL',
						click: function() {
							$(this).dialog('close');
						}
					}
				]);
			},
			complete: function(){
				//$('.delPost-dialog').dialog('close');
			}
		});
	}	
}

/* Votar post */
var votar_post_votado = false;
function nshow_votar_post(force_hide){
	if(votar_post_votado)
		return;
	if(!force_hide && $('#point-bar > ul').css('display') == 'none')
		$('#point-bar > ul').show();
	else
		$('#point-bar > ul').hide();
}
function nvotar_post(puntos, x){
	if(votar_post_votado)
		return;
	votar_post_votado = true;
	$.ajax({
		type: 'POST',
		url: '/votar.php',
		data: 'puntos=' + puntos + '&x=' + x + gget('postid'),
		success: function(h){
			/*nshow_votar_post(true);*/
			var pointbar_actual_width = $('#point-bar').width();
			$('#point-bar').width(pointbar_actual_width);
			$('#point-bar > ul').hide();
			switch(h.charAt(0)){
				case '0': //Error
					$('#points-text').addClass('error').html(h.substring(3)).show();
					break;
				case '1': //OK
					$('#points-text').addClass('success').html(h.substring(3)).show();
					$('#post-data-stats > .post-points > .total-points > span').html(number_format(parseInt($('#post-data-stats > .post-points > .total-points > span').html().replace(".", "")) + puntos, 0, ',', '.'));
					break;
			}
		},
		error: function(){
			votar_post_votado = false;
			//mydialog.error_500("nvotar_post('"+puntos+"', '"+x+"')");
		}
	});
}

function nviewmore_authorprofile(showmore)
{
	if(showmore){
		$('#post-author-box > .author > .view-more-content').show();
		$('#post-author-box > .read-more > .show-more').hide();
		$('#post-author-box > .read-more > .show-less').show();
	}else{
		$('#post-author-box > .author > .view-more-content').hide();
		$('#post-author-box > .read-more > .show-more').show();
		$('#post-author-box > .read-more > .show-less').hide();
	}
	
}

function nFlagPostSubmit()
{
	$('#flag-post-form').submit();

	var x = r.split('-');
		if (x.length == 2){
			$('#action-dialogs .sharePost-dialog-error > p').html(x[1]);
			$('.sharePost-dialog-error').dialog(nDialog_cfg);
			$('.sharePost-dialog-error').dialog('open');
		}else{
			$('.post-share-list .number-share-t').html(number_format(parseInt($('.post-share-list .number-share-t').html().replace(".", "")) + 1, 0, ',', '.'));
		}
}

function flagPost(authorid, postid) {
	if( postid != global_data.postid){
		return false;
	}
	var posttitle = $('div.post-content > h1.post-title').html();
	var authornick = $('#post-author-box h2.author-nick > a').html();
	posttitle = encodeURIComponent(posttitle);

	$.ajax({
			type: 'POST',
			url: '/denuncia-form-modal.php',
			data: 'anick='+authornick+'&aid='+authorid+'&id='+postid+'&t='+posttitle,
			success: function(h){
				$('#action-dialogs .flagPost-dialog').html(h);
				nDialog_cfg.width = 450;
				$('#action-dialogs .flagPost-dialog').dialog(nDialog_cfg);
				$('.flagPost-dialog').dialog( "option", "buttons", [
					{
						text: "Aceptar",
						"class": 'ui-button-positive box-shadow-soft floatL',
						click: function() {
							nFlagPostSubmit();
							$(this).dialog("close");
						}
					},
					{
						text: 'Cancelar',
						"class": 'ui-button-cancel floatR',
						click: function() {$(this).dialog('close');}
					}
				]);
				$('.flagPost-dialog').dialog('open');
			},
			error: function(){

			}
	});
}

function nTopsTabs(parent, tab, callerid) {
	if( $('#'+tab).css('display') == 'block') return;

	$('#'+parent+' > div > div.time-tops-filter > span').html($('#'+callerid).html());

	$('#'+parent+'-filter > li > a.active').removeClass('active');
	$('#'+parent+'-filter > li > a.'+tab).addClass('active');
	$('#'+parent+'-filter').hide();
	$('#'+parent+' > div.list:visible').hide();
	$('#'+tab).show();
}

/*
*
* Comuniadades
*
*/

var com = {

	tema_votar: function(voto, obj){
		var noajax = false;
		if (obj) {
			if( $(obj).attr("disabled")){ return false; };
			var rel;
			if (voto == -1) {
				rel = $(obj).prev();
			} else {
				rel = $(obj).next();
			}
			//$(obj).attr('onclick', '').addClass('ui-state-disabled ui-button-positive');
			//rel.attr('onclick', '').addClass('ui-state-disabled');
			//obj.attr('name', 'unfavorite');
			$(obj).addClass('ui-button-positive');
			$(obj).button('option', 'disabled', true);
			rel.button('option', 'disabled', true);
		}
		var votesCount = $('#post-data-stats .votes-count > span');
		var actualVotes = $('#post-data-stats .votes-count > span').html();
		if(!gget('key')){
			//mydialog.alert('Error al votar', 'Tenes que estar logueado para poder votar el tema');
			noajax = true;
		}
		var updatedVotes = parseInt(actualVotes)+voto;
		votesCount.hide().html(number_format(updatedVotes)).show();
		if(!noajax){
			$.ajax({
				type: 'POST',
				url: '/comunidades/tema-votar.php',
				data: 'voto='+voto+gget('temaid')+gget('key'),
				success: function(h){

				},
				error: function(){
					//$('.rateBox #actions').html(com.tema_votar_action);
					//mydialog.error_500("com.tema_votar('"+voto+"')");
				}
			});
		}
	},
	
	comunidad_eliminar: function(acepto){
		$('#action-dialogs .comunidad-dialog').dialog(nDialog_cfg);
		switch(acepto){
			case 0:
				$('.comunidad-dialog').html('&iquest;Realmente deseas eliminar la comunidad?<br />Esta opci&oacute;n no tiene retorno, es un camino de ida');
				//Boton
				$('.comunidad-dialog').dialog( "option", "buttons", [
					{
						text: 'Aceptar',
						"class": 'ui-button-negative box-shadow-soft floatL',
						click: function() {
							com.comunidad_eliminar(1);
						}
					},	
					{	
						text: 'Cancelar',
						"class": 'ui-button box-shadow-soft floatR',
						click: function() {
							$(this).dialog("close");
						}
					}	
				]);
				break;
			case 1:
				$('.comunidad-dialog').html('Te pregunto de nuevo. &iquest;Realmente deseas eliminar la comunidad?');
				//Boton
				$('.comunidad-dialog').dialog( "option", "buttons", [
					{
						text: 'Aceptar',
						"class": 'ui-button-negative box-shadow-soft floatL',
						click: function() {
							com.comunidad_eliminar(2);
						}
					},
					{
						text: 'Cancelar',
						"class": 'ui-button box-shadow-soft floatR',
						click: function() {
							$(this).dialog("close");
						}
					}	
				]);
				break;
			case 2:
				$('.comunidad-dialog').html('Una &uacute;ltima vez, &iquest;estas seguro que quieres eliminar la comunidad?<br />Este es el &uacute;ltimo paso y es el punto de no retorno');
				//Boton
				$('.comunidad-dialog').dialog( "option", "buttons", [
					{
						text: 'Aceptar',
						"class": 'ui-button-negative box-shadow-soft floatL',
						click: function() {
							com.comunidad_eliminar(3);
						}
					},	
					{
						text: 'Cancelar',
						"class": 'ui-button box-shadow-soft floatR',
						click: function() {
							$(this).dialog("close");
						}
					}	
				]);
				break;
			case 3:
				$('.comunidad-dialog').html('Eliminando...');
				$.ajax({
					type: 'POST',
					url: '/comunidades/comunidad-eliminar.php',
					data: gget('comid', true) + gget('key'),
					success: function(h){
						$('.comunidad-dialog').html('Comunidad eliminada', 'La comunidad ha sido eliminada.<br />Has dejado muchos usuarios hu&eacute;rfanos :(');
						//Boton
						$('.comunidad-dialog').dialog( "option", "buttons", [
						{
							text: 'Ir a la home',
							"class": 'ui-button box-shadow-soft floatL',
							click: function() {
								document.location.href = "/comunidades/";
							}
						}	
					]);
					},
					error: function(){
						mydialog.error_500("com.comunidad_eliminar(3)");
					},
					complete: function(){
						//mydialog.procesando_fin();
					}
				});
				break;
		}
		$('.comunidad-dialog').dialog('open');	
	},
	comunidad_reactivar: function(acepto){
		$('#action-dialogs .comunidad-dialog').dialog(nDialog_cfg);
		$('.comunidad-dialog').dialog({ title: 'Reactivar Comunidad'});
		
		switch(acepto){
			case 0:
				$('.comunidad-dialog').html('&iquest;Realmente deseas reactivar la comunidad?');
				//Boton
				$('.comunidad-dialog').dialog( "option", "buttons", [
					{
						text: 'Aceptar',
						"class": 'ui-button-negative box-shadow-soft floatL',
						click: function() {
							com.comunidad_reactivar(1);
						}
					},	
					{
						text: 'Cancelar',
						"class": 'ui-button box-shadow-soft floatR',
						click: function() {
							$(this).dialog("close");
						}
					}	
				]);
				break;
			case 1:
				$('.comunidad-dialog').html('Reactivando...');
				$.ajax({
					type: 'POST',
					url: '/comunidades/comunidad-reactivar.php',
					data: gget('comid', true) + gget('key'),
					success: function(h){
						$('.comunidad-dialog').html('La comunidad ha sido reactivada');
						//Boton
						$('.comunidad-dialog').dialog( "option", "buttons", [
							{
								text: 'Aceptar',
								"class": 'ui-button-negative box-shadow-soft floatL',
								click: function() {
									$(this).dialog('close');
								}
							}
						]);
					},
					error: function(){
						mydialog.error_500("com.comunidad_reactivar(1)");
					},
					complete: function(){
					//	mydialog.procesando_fin();
					}
				});
				break;
		}
		$('.comunidad-dialog').dialog('open');	
	},
	
	borrar_resp: function(respid, autor){
		$.ajax({
			type: 'POST',
			url: '/comunidades/respuesta-borrar.php',
			data: 'respid=' + respid + '&autor=' + autor + gget('temaid') + gget('key'),
			success: function(h){
				switch(h.charAt(0)){
					case '0': //Error
						mydialog.alert('Error', h.substring(2));
						break;
					case '1': //OK
					case '2': //La respuesta no existe o ya fue eliminada
						$('#comments #id_'+respid).fadeOut('normal', function(){ $(this).remove(); });
						break;
				}
			},
			error: function(){
				//mydialog.error_500("com.borrar_resp(" + respid + ", " + autor + ")");
			}
		});
	},
		del_tema: function(confirm){
		var causa = "";
		if(!confirm){
			$('#action-dialogs .comunidad-dialog').dialog(nDialog_cfg);
			$('.comunidad-dialog').html('Borrar tema');
			$.ajax({
				type: 'GET',
				url: '/comunidades/denuncia-publica-form.php',
				data: '',
				success: function(h){
					$('.comunidad-dialog').dialog({ title: 'Borrar Tema'});
					$('.comunidad-dialog').html(lang['html tema confirma borrar'] + '<br /><br />Causa: <input type="text" id="icausa_status" value="Causa del borrado" title="Causa del borrado" onfocus="onfocus_input(this)" onblur="onblur_input(this)" onkeypress="if(keypress_intro(event)) com.del_tema(true)" />');
					//Boton
					$('.comunidad-dialog').dialog( "option", "buttons", [
						{
							text: 'Aceptar',
							"class": 'ui-button box-shadow-soft floatL',
							click: function() {
								com.del_tema(true);
							}
						},
						{
							text: 'Cancelar',
							"class": 'ui-state-default floatR',
							click: function() {$(this).dialog('close');}
						}
					]);					
					$('#icausa_status').focus();
					$('.comunidad-dialog').dialog('open');
				}
			});	
		}else{
			if($('#icausa_status').val()=='' || $('#icausa_status').val()==$('#icausa_status').attr('title')){
				$('#icausa_status').focus();
				return;
			}
			causa = encodeURIComponent($('#icausa_status').val());
			$('.comunidad-dialog').html('Borrando...');
			$.ajax({
				type: 'POST',
				url: '/comunidades/tema-borrar.php',
				data: 'causa='+causa+gget('temaid')+gget('key'),
				success: function(h){
					if(h.charAt(0)==0){ //Error
						$('.comunidad-dialog').html('Error', h.substring(2));
						//Boton
						$('.comunidad-dialog').dialog( "option", "buttons", [
							{
								text: 'Aceptar',
								"class": 'ui-button floatL',
								click: function() {$(this).dialog('close');}
							}
						]);
					}else if(h.charAt(0)==1){ //OK
						$('.comunidad-dialog').html('Tema borrado', 'El tema fue eliminado satisfactoriamente', true);
						//Boton
						$('.comunidad-dialog').dialog( "option", "buttons", [
							{
								text: 'Aceptar',
								"class": 'ui-button floatL',
								click: function() {window.location.reload();}
							}
						]);
					}	
				},
				error: function(){
					$('.comunidad-dialog').html("Error en la solicitud");
					//Boton
						$('.comunidad-dialog').dialog( "option", "buttons", [
							{
								text: 'Aceptar',
								"class": 'ui-button floatL',
								click: function() {$(this).dialog('close');}
							}
						]);
				},
				complete: function(){
					//mydialog.procesando_fin();
				}
			});
		}
	},
	
	react_tema: function(confirm){
		if(!confirm){
			$('#action-dialogs .comunidad-dialog').dialog(nDialog_cfg);
			$('.comunidad-dialog').dialog({ title: 'Reactivar tema'});
			$('.comunidad-dialog').html('Realmente deseas reactivar este tema');
			//Boton
			$('.comunidad-dialog').dialog( "option", "buttons", [
				{
					text: 'Aceptar',
					"class": 'ui-button box-shadow-soft floatL',
					click: function() {
						com.react_tema(true);
					}
				},
				{
					text: 'Cancelar',
					"class": 'ui-state-default floatR',
					click: function() {$(this).dialog('close');}
				}
			]);
			$('.comunidad-dialog').dialog('open');
		}else{
			$('.comunidad-dialog').html('Reactivando...');
			$.ajax({
				type: "POST",
				url: '/comunidades/tema-reactivar.php',
				data: 'causa='+encodeURIComponent($('#icausa_status').val())+gget('temaid')+gget('key'),
				success: function(h){
					if(h.charAt(0)==0){ //Error
						$('.comunidad-dialog').html('Error' + h.substring(2));
						//Boton
						$('.comunidad-dialog').dialog( "option", "buttons", [
							{
								text: 'Aceptar',
								"class": 'ui-button floatL',
								click: function() {$(this).dialog('close');}
							}
						]);
					} else if(h.charAt(0)==1){ //OK
						$('.comunidad-dialog').html('Tema reactivado', 'El tema fue reactivado satisfactoriamente', true);
						//Boton
						$('.comunidad-dialog').dialog( "option", "buttons", [
							{
								text: 'Aceptar',
								"class": 'ui-button floatL',
								click: function() {window.location.reload();}
							}
						]);
					}	
				},
				error: function(){
					mydialog.error_500("com.react_tema('"+confirm+"')");
				},
				complete: function(){
					//mydialog.procesando_fin();
				}
			});
		}
	},

	error_logo: function(o){
		o.src = global_data.img + 'images/avatar.gif';
	},
  ir_a_categoria: function(cat){
		if(cat!='root' && cat!='linea')
			if(cat==-1)
				document.location.href='/' + lang['comunidades url'] + '/';
			else
				document.location.href='/' + lang['comunidades url'] + '/home/' + cat + '/';
	},
	updateMemberCounter: function(numberUpdate, obj){
		var membersCounter = $('#comunity-data-stats .members-count > span');
		var actualMembers = parseInt(membersCounter.data('val'));
		var updatedMembers = actualMembers+numberUpdate;
		membersCounter.data('val', updatedMembers);
		membersCounter.hide().html(number_format(updatedMembers)).show();
		var action = obj.attr('name');
		if(action == 'join'){
			//updatedFollowers = parseInt(actualFollowers) +1;
			obj.attr('name', 'leave');
			obj.removeClass('join-comunidad-comunity');
			obj.addClass('leave-comunidad-comunity');
		}else{
			//updatedFollowers = parseInt(actualFollowers) -1;
			obj.attr('name', 'join');
			obj.removeClass('leave-comunidad-comunity');
			obj.addClass('join-comunidad-comunity');
		}
		obj.find('span.ui-button-text > span.default-button-text').toggle();
		obj.find('span.ui-button-text > span.success-button-text').toggle();
	},
	join_comunity: function(obj){
		var action = obj.attr('name');
		if(action == 'join'){
			this.updateMemberCounter(1, obj);
			$.ajax({
				type: 'POST',
				url: '/comunidades/miembro-add.php',
				cache: false,
				data: gget('comid', true) + gget('key') + '&aceptar=1',
				success: function(h){
					window.location.reload();
				},
				error: function(){

				}
			});
		}else{
			this.updateMemberCounter(-1,obj);
			$.ajax({
				type: 'POST',
				url: '/comunidades/miembro-del.php',
				cache: false,
				data: gget('comid', true) + gget('key'),
				success: function(h){
					window.location.reload();
				},
				error: function(){

				}
			});
		}
	},
  actualizar_respuestas: function(cat){
		$('#lastCommentsBox-data').css('opacity', 0.4);
		if(gget('comid'))
			var params = gget('comid', true);
		if(cat)
			var params = cat;
		$.ajax({
			type: 'POST',
			url: '/ajax/replies/last',
			cache: false,
			data: params,
			success: function(h){
				$('#lastCommentsBox-data').html(h.substring(3));
				$('#lastCommentsBox-data').css('opacity',1);
			},
			error: function(){
				$('#lastCommentsBox-data').css('opacity', 1);
			}
		});
	},
	
	/* Crear shortnames */
	crear_shortname_key: function(val){
		$('#preview_shortname').html(val).removeClass('error').removeClass('ok');
		$('#msg_crear_shortname').html('');
	},
	crear_shortname_check_cache: new Array(),
	crear_shortname_check: function(val){
		if(val=='')
			return;
		for(i=0; i<this.crear_shortname_check_cache.length; i++){ //Verifico si ya lo busque
			if(this.crear_shortname_check_cache[i][0]===val){ //Lo tengo
				if(this.crear_shortname_check_cache[i][1]==='1'){ //Disponible
					$('#preview_shortname').removeClass('error').addClass('ok');
					$('#msg_crear_shortname').html(this.crear_shortname_check_cache[i][2]).removeClass('error').addClass('ok');
				}else{ //No disponible
					$('#preview_shortname').removeClass('ok').addClass('error');
					$('#msg_crear_shortname').html(this.crear_shortname_check_cache[i][2]).removeClass('ok').addClass('error');
				}
				return;			
			}
		}
		$('.gif_cargando#shortname').css('display', 'block');
		$.ajax({
			type: 'POST',
			url: '/comunidades/shortname_check.php',
			data: 'shortname='+encodeURIComponent(val),
			success: function(h){
				com.crear_shortname_check_cache[com.crear_shortname_check_cache.length] = new Array(val, h.charAt(0), h.substring(3)); //Guardo los datos de verificacion
				$('.gif_cargando#shortname').css('display', 'none');
				switch(h.charAt(0)){
					case '0': //Error
						$('#preview_shortname').removeClass('ok').addClass('error');
						$('#msg_crear_shortname').html(h.substring(3)).removeClass('ok').addClass('error');
						break;
					case '1': //OK
						$('#preview_shortname').removeClass('error').addClass('ok');
						$('#msg_crear_shortname').html(h.substring(3)).removeClass('error').addClass('ok');
						break;
				}
			},
			error: function(){
				$('.gif_cargando#shortname').css('display', 'none');
				$('#msg_crear_shortname').html(lang['error procesar']).removeClass('ok').addClass('error');
			}
		});
	},

	get_subcategorias_cache: new Array(),
	get_subcategorias: function(catid){
		
		catid = $('.agregar_categoria').val();
		$('.agregar_subcategoria').html('').append('<option value="-1" selected>Elegir una subcategor&iacute;a</option>').attr('disabled', 'true').val(-1);
		if(catid==-1)
			return false;
		if(this.get_subcategorias_cache[catid]){ //Lo tengo
			$.each(this.get_subcategorias_cache[catid], function(i, val){
				$('.agregar_subcategoria').append('<option value="'+i+'">'+val+'</option>');
			});
			$('.agregar_subcategoria').removeAttr('disabled');
			return true;			
		}
		$('.gif_cargando#subcategoria').css('display', 'block');
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: '/comunidades/get-subcategorias.php',
			data: 'catid='+catid,
			success: function(h){
				com.get_subcategorias_cache[catid] = h;
				$.each(h, function(i, val){
					$('.agregar_subcategoria').append('<option value="'+i+'">'+val+'</option>');
				});
				$('.agregar_subcategoria').removeAttr('disabled');
			},
			error: function(){
				$('.agregar_subcategoria').attr('disabled', 'true').val(-1);
				mydialog.error_500("com.get_subcategorias('"+catid+"')");
			},
			complete: function(){
				$('.gif_cargando#subcategoria').css('display', 'none');
			}
		});
	},

		/* rango auto */
	create_show_rango_def: function(show){
		if(show)
			$('#rango_default').slideDown('fast');
		else
			$('#rango_default').slideUp('fast');
	},
	miembros_list_section_here: 'act',
	miembros_list_pag_actual: 0,
	miembros_list: function(section){
		if(!section)
			section = this.miembros_list_section_here;
		else if(this.miembros_list_section_here==section)
			return;
		if (this.miembros_list_section_here!=section || this.miembros_list_search) this.miembros_list_pag_actual = 0;
		var params = gget('comid', true)+gget('key');
		var filename = '/comunidades/';
		$('.filterBy #'+this.miembros_list_section_here).removeClass('here');
		this.miembros_list_section_here = section;
		$('.filterBy #'+section).addClass('here');
		switch(section){
			case 'act':
			case 'susp':
				filename += 'miembros.php';
				params += '&ajax=1&section='+section+'&p='+com.miembros_list_pag_actual;
				break;
			case 'history':
				filename += 'miembros-history.php';
				break;
		}
		if (this.miembros_list_search) params += '&q='+this.miembros_list_search;
		$('.gif_cargando').css('display', 'block');
		$.ajax({
			type: 'GET',
			url: filename,
			data: params,
			success: function(h){
				switch(h.charAt(0)){
					case '0': //Error
						$('#showResult').html('<div class="warningData">'+h.substring(3)+'</div>');
						break;
					case '1': //OK
						$('#showResult').html(h.substring(3));
						break;
				}
			},
			error: function(){
				$('#showResult').html('<div class="emptyData">'+lang['error procesar']+'. <a href="javascript:com.miembros_list()">Reintentar</a></div>');
			},
			complete: function(){
				$('.gif_cargando').css('display', 'none');
			}
		});
	},
	miembros_list_search: '',
	miembros_list_search_set: function() {
	    this.miembros_list_search = $.trim($('#miembros_list_search').val());
	    this.miembros_list();
	},
	miembros_list_sig: function(){
		this.miembros_list_pag_actual++;
		this.miembros_list();
	},
	miembros_list_ant: function(){
		this.miembros_list_pag_actual--;
		this.miembros_list();
	},
	admin_users: function(userid){
		$.ajax({
			type: 'POST',
			url: '/comunidades/miembros-admin.php',
			cache: false,
			data: 'userid=' + userid + gget('comid') + gget('key'),
			success: function(h){
				nDialog_cfg.width = 450;
				$('#action-dialogs .adminuser-dialog').dialog(nDialog_cfg);
				switch(h.charAt(0)){
					case '0': //Error
						$('.adminuser-dialog').html(h.substring(3));
						$('.adminuser-dialog').dialog( "option", "buttons", [
							{
								text: 'Aceptar',
								"class": 'ui-button box-shadow-soft floatL',
								click: function() {
									$(this).dialog("close");
								}
							}
						]);
						break;
					case '1': //OK. Muestra info
						//Boton
						$('.adminuser-dialog').html(h.substring(3));
						$('.adminuser-dialog').dialog( "option", "buttons", [
							{
								text: 'Aceptar',
								"class": 'ui-button box-shadow-soft floatL',
								click: function() {
									com.admin_users_save(userid);
								}
							},
							{
								text: 'Cancelar',
								"class": 'ui-state-default floatR',
								click: function() {$(this).dialog('close');}
							}
						]);
						break;
				}
				$('.adminuser-dialog').dialog('open');
			},
			error: function(){
				$('.adminuser-dialog').html(h.substring(3));
						$('.adminuser-dialog').dialog( "option", "buttons", [
							{
								text: 'Aceptar',
								"class": 'ui-button box-shadow-soft floatL',
								click: function() {
									$(this).dialog("close");
								}
							}
						]);
			},
			complete: function(){
				//$('.adminuser-dialog').dialog('close');
			}
		});
	},
	admin_users_vermas: function(){
		if($('.suspendido_data #ver_mas').css('display') == 'none'){
			$('.suspendido_data #ver_mas').show('slow');
			$('.suspendido_data #vermas').html('&laquo; Ver menos');
		}else{
			$('.suspendido_data #ver_mas').hide('slow');
			$('.suspendido_data #vermas').html('Ver m&aacute;s &raquo;');
		}
	},
	admin_users_check: function(){
		if(is_checked('r_suspender')){
			if($('#t_causa').val()=='' || (!is_checked('r_suspender_dias1') && !is_checked('r_suspender_dias2')) || (is_checked('r_suspender_dias2') && $('#t_suspender').val()=='')){
				return false;
			}else{
				return true;
			}
		}else if(is_checked('r_rehabilitar')){
			if($('#t_causa').val()==''){
				return false;
			}else{
				return true;
			}
		}else if(is_checked('r_rango')){
			if(rango_actual == $('#s_rango').val()){
				return false;
			}else{
				return true;
			}
		}
	},
	admin_users_save: function(userid){
		if(!this.admin_users_check())
			return false;
		if(is_checked('r_suspender'))
			var action = 'suspender';
		else if(is_checked('r_rehabilitar'))
			var action = 'rehabilitar';
		else if(is_checked('r_rango'))
			var action = 'rango';
		//mydialog.procesando_inicio('Guardando...');
		var params = 'userid=' + userid + gget('comid') + gget('key');
		params += '&action='+action;
		switch(action){
			case 'suspender':
				params += '&causa=' + encodeURIComponent($('#t_causa').val()) + '&dias=' + (is_checked('r_suspender_dias1')?'0':parseInt($('#t_suspender').val()));
				break;
			case 'rehabilitar':
				params += '&causa=' + encodeURIComponent($('#t_causa').val());
				break;
			case 'rango':
				params += '&new_rango=' + $('#s_rango').val();
				break;
		}
		$.ajax({
			type: 'POST',
			url: '/comunidades/miembros-admin-save.php',
			cache: false,
			data: params,
			success: function(h){
				switch(h.charAt(0)){
					case '0': //Error
						$('.adminuser-dialog').html(h.substring(3));
						$('.adminuser-dialog').dialog( "option", "buttons", [
						{
								text: 'Aceptar',
								"class": 'ui-button box-shadow-soft floatL',
								click: function() {
									com.admin_users_save(userid);
								}
							}
						]);
						break;
					case '1': //OK
						//Boton
						$('.adminuser-dialog').html(h.substring(3));
						$('.adminuser-dialog').dialog( "option", "buttons", [
							{
								text: 'Aceptar',
								"class": 'ui-button box-shadow-soft floatL',
								click: function() {
									$(this).dialog('close');
									window.location.reload();
								}
							}
						]);
						
						if(action == 'suspender')
							$('#cont_miembros').html(parseInt($('#cont_miembros').html())-parseInt(1));
						else if(action == 'rehabilitar')
							$('#cont_miembros').html(parseInt($('#cont_miembros').html())+parseInt(1));
						if(action=='suspender' || action=='rehabilitar')
							$('#userid_'+userid).remove();
						break;
				}
			},
			error: function(){
				$('.adminuser-dialog').html('Error, intentalo de nuevo');
						$('.adminuser-dialog').dialog( "option", "buttons", [
							{
								text: 'Aceptar',
								"class": 'ui-button box-shadow-soft floatL',
								click: function() {
									$(this).dialog('close');
								}
							}
						]);
			},
			complete: function(){
				//mydialog.procesando_fin();
			}
		});
	},
	denuncia_publica: function(){
		nDialog_cfg.width = 'auto';
		$('#action-dialogs .comunidad-dialog').dialog(nDialog_cfg);
		$('.comunidad-dialog').html('Cargando Formulario de denuncias ...');
		$.ajax({
			type: 'GET',
			url: '/comunidades/denuncia-publica-form.php',
			data: '',
			success: function(h){
				$('.comunidad-dialog').dialog({ title: 'Formulario de denuncias'});
				$('.comunidad-dialog').html(h);
				//Boton
				$('.comunidad-dialog').dialog( "option", "buttons", [
					{
						text: 'Enviar Denuncia',
						"class": 'ui-button box-shadow-soft floatL',
						click: function() {
							com.denuncia_publica_send();
						}
					},
					{
						text: 'Cancelar',
						"class": 'ui-button-neutral floatR',
						click: function() {$(this).dialog('close');}
					}
				]);					
				$('#denuncia-publica #nombre').focus();
				$('.comunidad-dialog').dialog('open');
			},
			error: function(){
				$('.comunidad-dialog').html('Error al procesar la solicitud, intentalo de nuevo');
				//Boton
				$('.comunidad-dialog').dialog( "option", "buttons", [
					{
						text: 'Enviar Denuncia',
						"class": 'ui-button box-shadow-soft floatL',
						click: function() {
							com.denuncia_publica();
						}
					},
					{
						text: 'Cancelar',
						"class": 'ui-state-default floatR',
						click: function() {$(this).dialog('close');}
					}
				]);		
			},
			complete: function(){
				//mydialog.procesando_fin();
			}
		});
	},
	denuncia_publica_send: function(){
		if($('#denuncia-publica #nombre').val()==''){
			$('#denuncia-publica #error_data').html('El campo Nombre y Apellido es obligatorio').slideDown('fast');
			$('#denuncia-publica #nombre').focus();
			return;
		}else if($('#denuncia-publica #email').val()==''){
			$('#denuncia-publica #error_data').html('El campo Email es obligatorio').slideDown('fast');
			$('#denuncia-publica #email').focus();
			return;
		}else if($('#denuncia-publica #url').val()==''){
			$('#denuncia-publica #error_data').html('El campo URL de la Comunidad o Tema es obligatorio').slideDown('fast');
			$('#denuncia-publica #url').focus();
			return;
		}else if($('#denuncia-publica #email').val()==''){
			$('#denuncia-publica #error_data').html('El campo Email es obligatorio').slideDown('fast');
			$('#denuncia-publica #email').focus();
			return;
		}else if($('textarea[name="textarea_denuncia_publica"]').val()==''){
			$('#denuncia-publica #error_data').html('El campo Comentarios es obligatorio').slideDown('fast');
			$('#denuncia-publica #comentarios').focus();
			return;
		}
		
		//Datos formulario
		nombre = encodeURIComponent($('#denuncia-publica #nombre').val());
		email = encodeURIComponent($('#denuncia-publica #email').val());
		telefono = encodeURIComponent($('#denuncia-publica #telefono').val());
		horario = encodeURIComponent($('#denuncia-publica #horario').val());
		empresa = encodeURIComponent($('#denuncia-publica #empresa').val());
		url = encodeURIComponent($('#denuncia-publica #url').val());
		comentarios = encodeURIComponent($('textarea[name="textarea_denuncia_publica"]').val());
		//Cargando ...
		$('.comunidad-dialog').html('Enviando...');
		$.ajax({
			type: 'POST',
			url: '/comunidades/denuncia-publica.php',
			data: 'nombre='+nombre+'&email='+email+'&telefono='+telefono+'&horario='+horario+'&empresa='+empresa+'&url='+url+'&comentarios='+comentarios,
			success: function(h){
				$('.comunidad-dialog').html(h.substring(3));
				$('.comunidad-dialog').dialog( "option", "buttons", [
					{
						text: 'Aceptar',
						"class": 'ui-button floatL',
						click: function() {$(this).dialog('close');}
					}
				]);	
			},
			error: function(){
				$('.comunidad-dialog').html('Error al procesar la solicitud, intentalo de nuevo');
				//Boton
				$('.comunidad-dialog').dialog( "option", "buttons", [
					{
						text: 'Enviar Denuncia',
						"class": 'ui-button box-shadow-soft floatL',
						click: function() {
							com.denuncia_publica_send();
						}
					},
					{
						text: 'Cancelar',
						"class": 'ui-state-default floatR',
						click: function() {$(this).dialog('close');}
					}
				]);	
			},
			complete: function(){
				//mydialog.procesando_fin();
			}
		});		
	}
}

/* Bloquear Usuario*/
function bloquear(user, bloqueado, lugar, aceptar){
	if(!aceptar && bloqueado){
    nDialog_cfg.width = 315;
    $('#action-dialogs .bloquear-dialog').dialog(nDialog_cfg);
    //Boton
    $('.bloquear-dialog').dialog( "option", "buttons", [
      {
        text: 'Aceptar',
        "class": 'ui-button-positive box-shadow-soft floatL',
        click: function() {
          $(this).dialog("close");
          bloquear(user, true, lugar, true);
        }
      },
      {
        text: 'Cancelar',
        "class": 'ui-state-default floatR',
        click: function() {$(this).dialog('close');}
      }
    ]);
    
    $('.bloquear-dialog').dialog('open');
	}else{
    	$.ajax({
      type: 'POST',
      url: '/bloqueados-cambiar.php',
      data: 'user='+user+(bloqueado ? '&bloqueado=1' : '')+gget('key'),
      success: function(h){
        switch(lugar){
          case 'perfil':
            if(bloqueado)
              $('#bloquear_cambiar').html('Desbloquear').removeClass('bloquearU').addClass('desbloquearU').attr('href', "javascript:bloquear('"+user+"', false, '"+lugar+"')");
            else
              $('#bloquear_cambiar').html('Bloquear').removeClass('desbloquearU').addClass('bloquearU').attr('href', "javascript:bloquear('"+user+"', true, '"+lugar+"')");
            break;
          case 'respuestas':
          case 'comentarios':
            if (bloqueado) {
              $('li.desbloquear_'+user).show();
              $('li.bloquear_'+user).hide();
            }
            else {
              $('li.bloquear_'+user).show();
              $('li.desbloquear_'+user).hide();
            }
            break;
          case 'mis_bloqueados':
            if(bloqueado)
              $('.bloquear_usuario_'+user).attr('title', 'Desbloquear Usuario').removeClass('bloqueadosU').addClass('desbloqueadosU').html('Desbloquear').attr('href', "javascript:bloquear('"+user+"', false, '"+lugar+"')");
            else
              $('.bloquear_usuario_'+user).attr('title', 'Bloquear Usuario').removeClass('desbloqueadosU').addClass('bloqueadosU').html('Bloquear').attr('href', "javascript:bloquear('"+user+"', true, '"+lugar+"')");
            break;
        }
      },
      error: function(){
         $('.bloquear-dialog p').html("Error al procesar lo solicitado, por favor vuelve a intentarlo");
      },
      complete: function(){
        //mydialog.procesando_fin();
      }
    });
  }   
}

// Auxiliar function to check empty and default text
$.fn.isEmpty = function () {
	return !$.trim($(this).val()) || $.trim($(this).val()) == $(this).attr('data-default');
}

	
/*!
 * Autogrow Textarea Plugin Version v2.0
 * http://www.technoreply.com/autogrow-textarea-plugin-version-2-0
 *
 * Copyright 2011, Jevin O. Sewaruth
 *
 * Date: March 13, 2011
 */
jQuery.fn.autoGrow = function(){
	return this.each(function(){
		// Variables
		var colsDefault = this.cols;
		var rowsDefault = this.rows;

		//Functions
		var grow = function() {
			growByRef(this);
		}

		var growByRef = function(obj) {
			var linesCount = 0;
			var lines = obj.value.split('\n');

			for (var i=lines.length-1; i>=0; --i)
			{
				linesCount += Math.floor((lines[i].length / colsDefault) + 1);
			}

			if (linesCount >= rowsDefault)
				obj.rows = linesCount + 1;
			else
				obj.rows = rowsDefault;
		}

		var characterWidth = function (obj){
			var characterWidth = 0;
			var temp1 = 0;
			var temp2 = 0;
			var tempCols = obj.cols;

			obj.cols = 1;
			temp1 = obj.offsetWidth;
			obj.cols = 2;
			temp2 = obj.offsetWidth;
			characterWidth = temp2 - temp1;
			obj.cols = tempCols;

			return characterWidth;
		}

		// Manipulations
		this.style.width = "auto";
		this.style.height = "auto";
		this.style.overflow = "hidden";
		this.style.width = ((characterWidth(this) * this.cols) + 6) + "px";
		this.onkeyup = grow;
		this.onfocus = grow;
		this.onblur = grow;
		growByRef(this);
	});
};

(function($) {
    $.fn.tipsy = function(options) {

        options = $.extend({}, $.fn.tipsy.defaults, options);

        return this.each(function() {

            var opts = $.fn.tipsy.elementOptions(this, options);

            $(this).hover(function() {

                $.data(this, 'cancel.tipsy', true);

                var tip = $.data(this, 'active.tipsy');
                if (!tip) {
                    tip = $('<div class="tipsy"><div class="tipsy-inner"/></div>');
                    tip.css({position: 'absolute', zIndex: 100000});
                    $.data(this, 'active.tipsy', tip);
                }

                if ($(this).attr('title') || typeof($(this).attr('original-title')) != 'string') {
                    $(this).attr('original-title', $(this).attr('title') || '').removeAttr('title');
                }

                var title;
                if (typeof opts.title == 'string') {
                    title = $(this).attr(opts.title == 'title' ? 'original-title' : opts.title);
                } else if (typeof opts.title == 'function') {
                    title = opts.title.call(this);
                }

                tip.find('.tipsy-inner')[opts.html ? 'html' : 'text'](title || opts.fallback);

                var pos = $.extend({}, $(this).offset(), {width: this.offsetWidth, height: this.offsetHeight});
                tip.get(0).className = 'tipsy'; // reset classname in case of dynamic gravity
                tip.remove().css({top: 0, left: 0, visibility: 'hidden', display: 'block'}).appendTo(document.body);
                var actualWidth = tip[0].offsetWidth, actualHeight = tip[0].offsetHeight;
                var gravity = (typeof opts.gravity == 'function') ? opts.gravity.call(this) : opts.gravity;

                switch (gravity.charAt(0)) {
                    case 'n':
                        tip.css({top: pos.top + pos.height, left: pos.left + pos.width / 2 - actualWidth / 2}).addClass('tipsy-north');
                        break;
                    case 's':
                        tip.css({top: pos.top - actualHeight, left: pos.left + pos.width / 2 - actualWidth / 2}).addClass('tipsy-south');
                        break;
                    case 'e':
                        tip.css({top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left - actualWidth}).addClass('tipsy-east');
                        break;
                    case 'w':
                        tip.css({top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left + pos.width}).addClass('tipsy-west');
                        break;
                }

                if (opts.fade) {
                    tip.css({opacity: 0, display: 'block', visibility: 'visible'}).animate({opacity: 0.8});
                } else {
                    tip.css({visibility: 'visible'});
                }

            }, function() {
                $.data(this, 'cancel.tipsy', false);
                var self = this;

                    if ($.data(this, 'cancel.tipsy')) return;
                    var tip = $.data(self, 'active.tipsy');
                    if (opts.fade) {
                        tip.stop().fadeOut(function() {$(this).remove();});
                    } else {
                        tip.remove();
                    }


            });

        });

    };

    // Overwrite this method to provide options on a per-element basis.
    // For example, you could store the gravity in a 'tipsy-gravity' attribute:
    // return $.extend({}, options, {gravity: $(ele).attr('tipsy-gravity') || 'n' });
    // (remember - do not modify 'options' in place!)
    $.fn.tipsy.elementOptions = function(ele, options) {
        return $.metadata ? $.extend({}, options, $(ele).metadata()) : options;
    };

    $.fn.tipsy.defaults = {
        fade: false,
        fallback: '',
        gravity: 'n',
        html: false,
        title: 'title'
    };

    $.fn.tipsy.autoNS = function() {
        return $(this).offset().top > ($(document).scrollTop() + $(window).height() / 2) ? 's' : 'n';
    };

    $.fn.tipsy.autoWE = function() {
        return $(this).offset().left > ($(document).scrollLeft() + $(window).width() / 2) ? 'e' : 'w';
    };

})(jQuery);

function ajax(object, action, data, callback) {
	callback = $.extend({
		success: function () {},
		error: function () {},
		complete: function () {}
	}, callback || {});
	data.key = global_data.user_key;
	$.ajax({
		type: 'post',
		url: '/ajax/' + object + '/' + action,
		data: data,
		dataType: 'json',
		success: function (r) {
			r.status = parseInt(r.status);
			if (r.status == 1) {
				callback.success(r);
			} else {
				callback.error(r);
			}
		},
		error: callback.error,
		complete: callback.complete
	});
}


var clientPC = navigator.userAgent.toLowerCase();
var clientVer = parseInt(navigator.appVersion);

var is_ie = ((clientPC.indexOf("msie") != -1) && (clientPC.indexOf("opera") == -1));
var is_nav = ((clientPC.indexOf('mozilla')!=-1) && (clientPC.indexOf('spoofer')==-1) && (clientPC.indexOf('compatible') == -1) && (clientPC.indexOf('opera')==-1) && (clientPC.indexOf('webtv')==-1) && (clientPC.indexOf('hotjava')==-1));
var is_win = ((clientPC.indexOf("win")!=-1) || (clientPC.indexOf("16bit") != -1));
var is_mac = (clientPC.indexOf("mac")!=-1);
var is_moz = 0;


/* htmlspecialchars_decode (php.js) 909.322 */
function get_html_translation_table(d,e){var a={},f={},b=0,c="";c={};var h={},g={},i={};c[0]="HTML_SPECIALCHARS";c[1]="HTML_ENTITIES";h[0]="ENT_NOQUOTES";h[2]="ENT_COMPAT";h[3]="ENT_QUOTES";g=!isNaN(d)?c[d]:d?d.toUpperCase():"HTML_SPECIALCHARS";i=!isNaN(e)?h[e]:e?e.toUpperCase():"ENT_COMPAT";if(g!=="HTML_SPECIALCHARS"&&g!=="HTML_ENTITIES")throw new Error("Table: "+g+" not supported");a["38"]="&amp;";if(g==="HTML_ENTITIES"){a["160"]="&nbsp;";a["161"]="&iexcl;";a["162"]="&cent;";a["163"]="&pound;";a["164"]="&curren;";a["165"]="&yen;";a["166"]="&brvbar;";a["167"]="&sect;";a["168"]="&uml;";a["169"]="&copy;";a["170"]="&ordf;";a["171"]="&laquo;";a["172"]="&not;";a["173"]="&shy;";a["174"]="&reg;";a["175"]="&macr;";a["176"]="&deg;";a["177"]="&plusmn;";a["178"]="&sup2;";a["179"]="&sup3;";a["180"]="&acute;";a["181"]="&micro;";a["182"]="&para;";a["183"]="&middot;";a["184"]="&cedil;";a["185"]="&sup1;";a["186"]="&ordm;";a["187"]="&raquo;";a["188"]="&frac14;";a["189"]="&frac12;";a["190"]="&frac34;";a["191"]= "&iquest;";a["192"]="&Agrave;";a["193"]="&Aacute;";a["194"]="&Acirc;";a["195"]="&Atilde;";a["196"]="&Auml;";a["197"]="&Aring;";a["198"]="&AElig;";a["199"]="&Ccedil;";a["200"]="&Egrave;";a["201"]="&Eacute;";a["202"]="&Ecirc;";a["203"]="&Euml;";a["204"]="&Igrave;";a["205"]="&Iacute;";a["206"]="&Icirc;";a["207"]="&Iuml;";a["208"]="&ETH;";a["209"]="&Ntilde;";a["210"]="&Ograve;";a["211"]="&Oacute;";a["212"]="&Ocirc;";a["213"]="&Otilde;";a["214"]="&Ouml;";a["215"]="&times;";a["216"]="&Oslash;";a["217"]= "&Ugrave;";a["218"]="&Uacute;";a["219"]="&Ucirc;";a["220"]="&Uuml;";a["221"]="&Yacute;";a["222"]="&THORN;";a["223"]="&szlig;";a["224"]="&agrave;";a["225"]="&aacute;";a["226"]="&acirc;";a["227"]="&atilde;";a["228"]="&auml;";a["229"]="&aring;";a["230"]="&aelig;";a["231"]="&ccedil;";a["232"]="&egrave;";a["233"]="&eacute;";a["234"]="&ecirc;";a["235"]="&euml;";a["236"]="&igrave;";a["237"]="&iacute;";a["238"]="&icirc;";a["239"]="&iuml;";a["240"]="&eth;";a["241"]="&ntilde;";a["242"]="&ograve;";a["243"]= "&oacute;";a["244"]="&ocirc;";a["245"]="&otilde;";a["246"]="&ouml;";a["247"]="&divide;";a["248"]="&oslash;";a["249"]="&ugrave;";a["250"]="&uacute;";a["251"]="&ucirc;";a["252"]="&uuml;";a["253"]="&yacute;";a["254"]="&thorn;";a["255"]="&yuml;"}if(i!=="ENT_NOQUOTES")a["34"]="&quot;";if(i==="ENT_QUOTES")a["39"]="&#39;";a["60"]="&lt;";a["62"]="&gt;";for(b in a){c=String.fromCharCode(b);f[c]=a[b]}return f}function htmlspecialchars_decode(d,e){var a={},f="",b="",c="";b=d.toString();if(false===(a=this.get_html_translation_table("HTML_SPECIALCHARS",e)))return false;for(f in a){c=a[f];b=b.split(c).join(f)}return b=b.split("&#039;").join("'")};

/* markItUp 1.1.5 */
//eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(3($){$.24.T=3(f,g){E k,v,A,F;v=A=F=7;k={C:\'\',12:\'\',U:\'\',1j:\'\',1A:8,25:\'26\',1k:\'~/2Q/1B.1C\',1b:\'\',27:\'28\',1l:8,1D:\'\',1E:\'\',1F:{},1G:{},1H:{},1I:{},29:[{}]};$.V(k,f,g);2(!k.U){$(\'2R\').1c(3(a,b){1J=$(b).14(0).2S.2T(/(.*)2U\\.2V(\\.2W)?\\.2X$/);2(1J!==2a){k.U=1J[1]}})}4 G.1c(3(){E d,u,15,16,p,H,L,P,17,1m,w,1n,M,18;d=$(G);u=G;15=[];18=7;16=p=0;H=-1;k.1b=1d(k.1b);k.1k=1d(k.1k);3 1d(a,b){2(b){4 a.W(/("|\')~\\//g,"$1"+k.U)}4 a.W(/^~\\//,k.U)}3 2b(){C=\'\';12=\'\';2(k.C){C=\'C="\'+k.C+\'"\'}l 2(d.1K("C")){C=\'C="T\'+(d.1K("C").2c(0,1).2Y())+(d.1K("C").2c(1))+\'"\'}2(k.12){12=\'N="\'+k.12+\'"\'}d.1L(\'<z \'+12+\'></z>\');d.1L(\'<z \'+C+\' N="T"></z>\');d.1L(\'<z N="2Z"></z>\');d.2d("2e");17=$(\'<z N="30"></z>\').2f(d);$(1M(k.29)).1N(17);1m=$(\'<z N="31"></z>\').1O(d);2(k.1l===8&&$.X.32!==8){1l=$(\'<z N="33"></z>\').1O(d).1e("34",3(e){E h=d.2g(),y=e.2h,1o,1p;1o=3(e){d.2i("2g",35.36(20,e.2h+h-y)+"37");4 7};1p=3(e){$("1C").1P("2j",1o).1P("1q",1p);4 7};$("1C").1e("2j",1o).1e("1q",1p)});1m.2k(1l)}d.2l(1Q).38(1Q);d.1e("1R",3(e,a){2(a.1r!==7){14()}2(u===$.T.2m){Y(a)}});d.1f(3(){$.T.2m=G})}3 1M(b){E c=$(\'<Z></Z>\'),i=0;$(\'B:2n > Z\',c).2i(\'39\',\'q\');$.1c(b,3(){E a=G,t=\'\',1s,B,j;1s=(a.19)?(a.1S||\'\')+\' [3a+\'+a.19+\']\':(a.1S||\'\');19=(a.19)?\'2o="\'+a.19+\'"\':\'\';2(a.2p){B=$(\'<B N="3b">\'+(a.2p||\'\')+\'</B>\').1N(c)}l{i++;2q(j=15.6-1;j>=0;j--){t+=15[j]+"-"}B=$(\'<B N="2r 2r\'+t+(i)+\' \'+(a.3c||\'\')+\'"><a 3d="" \'+19+\' 1s="\'+1s+\'">\'+(a.1S||\'\')+\'</a></B>\').1e("3e",3(){4 7}).2s(3(){4 7}).1q(3(){2(a.2t){3f(a.2t)()}Y(a);4 7}).2n(3(){$(\'> Z\',G).3g();$(D).3h(\'2s\',3(){$(\'Z Z\',17).2u()})},3(){$(\'> Z\',G).2u()}).1N(c);2(a.2v){15.3i(i);$(B).2d(\'3j\').2k(1M(a.2v))}}});15.3k();4 c}3 2w(c){2(c){c=c.3l();c=c.W(/\\(\\!\\(([\\s\\S]*?)\\)\\!\\)/g,3(x,a){E b=a.1T(\'|!|\');2(F===8){4(b[1]!==2x)?b[1]:b[0]}l{4(b[1]===2x)?"":b[0]}});c=c.W(/\\[\\!\\[([\\s\\S]*?)\\]\\!\\]/g,3(x,a){E b=a.1T(\':!:\');2(18===8){4 7}1U=3m(b[0],(b[1])?b[1]:\'\');2(1U===2a){18=8}4 1U});4 c}4""}3 I(a){2($.3n(a)){a=a(P)}4 2w(a)}3 1g(a){J=I(L.J);1a=I(L.1a);Q=I(L.Q);O=I(L.O);2(Q!==""){q=J+Q+O}l 2(m===\'\'&&1a!==\'\'){q=J+1a+O}l{q=J+(a||m)+O}4{q:q,J:J,Q:Q,1a:1a,O:O}}3 Y(a){E b,j,n,i;P=L=a;14();$.V(P,{1t:"",U:k.U,u:u,m:(m||\'\'),p:p,v:v,A:A,F:F});I(k.1D);I(L.1D);2(v===8&&A===8){I(L.3o)}$.V(P,{1t:1});2(v===8&&A===8){R=m.1T(/\\r?\\n/);2q(j=0,n=R.6,i=0;i<n;i++){2($.3p(R[i])!==\'\'){$.V(P,{1t:++j,m:R[i]});R[i]=1g(R[i]).q}l{R[i]=""}}o={q:R.3q(\'\\n\')};11=p;b=o.q.6+(($.X.1V)?n:0)}l 2(v===8){o=1g(m);11=p+o.J.6;b=o.q.6-o.J.6-o.O.6;b-=1u(o.q)}l 2(A===8){o=1g(m);11=p;b=o.q.6;b-=1u(o.q)}l{o=1g(m);11=p+o.q.6;b=0;11-=1u(o.q)}2((m===\'\'&&o.Q===\'\')){H+=1W(o.q);11=p+o.J.6;b=o.q.6-o.J.6-o.O.6;H=d.K().1h(p,d.K().6).6;H-=1W(d.K().1h(0,p))}$.V(P,{p:p,16:16});2(o.q!==m&&18===7){2y(o.q);1X(11,b)}l{H=-1}14();$.V(P,{1t:\'\',m:m});2(v===8&&A===8){I(L.3r)}I(L.1E);I(k.1E);2(w&&k.1A){1Y()}A=F=v=18=7}3 1W(a){2($.X.1V){4 a.6-a.W(/\\n*/g,\'\').6}4 0}3 1u(a){2($.X.2z){4 a.6-a.W(/\\r*/g,\'\').6}4 0}3 2y(a){2(D.m){E b=D.m.1Z();b.2A=a}l{d.K(d.K().1h(0,p)+a+d.K().1h(p+m.6,d.K().6))}}3 1X(a,b){2(u.2B){2($.X.1V&&$.X.3s>=9.5&&b==0){4 7}1i=u.2B();1i.3t(8);1i.2C(\'21\',a);1i.3u(\'21\',b);1i.3v()}l 2(u.2D){u.2D(a,a+b)}u.1v=16;u.1f()}3 14(){u.1f();16=u.1v;2(D.m){m=D.m.1Z().2A;2($.X.2z){E a=D.m.1Z(),1w=a.3w();1w.3x(u);p=-1;3y(1w.3z(a)){1w.2C(\'21\');p++}}l{p=u.2E}}l{p=u.2E;m=d.K().1h(p,u.3A)}4 m}3 1B(){2(!w||w.3B){2(k.1j){w=3C.2F(\'\',\'1B\',k.1j)}l{M=$(\'<2G N="3D"></2G>\');2(k.25==\'26\'){M.1O(1m)}l{M.2f(17)}w=M[M.6-1].3E||3F[M.6-1]}}l 2(F===8){2(M){M.3G()}w.2H();w=M=7}2(!k.1A){1Y()}}3 1Y(){2(w.D){3H{22=w.D.2I.1v}3I(e){22=0}w.D.2F();w.D.3J(2J());w.D.2H();w.D.2I.1v=22}2(k.1j){w.1f()}}3 2J(){2(k.1b!==\'\'){$.2K({2L:\'3K\',2M:7,2N:k.1b,28:k.27+\'=\'+3L(d.K()),2O:3(a){23=1d(a,1)}})}l{2(!1n){$.2K({2M:7,2N:k.1k,2O:3(a){1n=1d(a,1)}})}23=1n.W(/<!-- 3M -->/g,d.K())}4 23}3 1Q(e){A=e.A;F=e.F;v=(!(e.F&&e.v))?e.v:7;2(e.2L===\'2l\'){2(v===8){B=$("a[2o="+3N.3O(e.1x)+"]",17).1y(\'B\');2(B.6!==0){v=7;B.3P(\'1q\');4 7}}2(e.1x===13||e.1x===10){2(v===8){v=7;Y(k.1H);4 k.1H.1z}l 2(A===8){A=7;Y(k.1G);4 k.1G.1z}l{Y(k.1F);4 k.1F.1z}}2(e.1x===9){2(A==8||v==8||F==8){4 7}2(H!==-1){14();H=d.K().6-H;1X(H,0);H=-1;4 7}l{Y(k.1I);4 k.1I.1z}}}}2b()})};$.24.3Q=3(){4 G.1c(3(){$$=$(G).1P().3R(\'2e\');$$.1y(\'z\').1y(\'z.T\').1y(\'z\').Q($$)})};$.T=3(a){E b={1r:7};$.V(b,a);2(b.1r){4 $(b.1r).1c(3(){$(G).1f();$(G).2P(\'1R\',[b])})}l{$(\'u\').2P(\'1R\',[b])}}})(3S);',62,241,'||if|function|return||length|false|true|||||||||||||else|selection||string|caretPosition|block||||textarea|ctrlKey|previewWindow|||div|shiftKey|li|id|document|var|altKey|this|caretOffset|prepare|openWith|val|clicked|iFrame|class|closeWith|hash|replaceWith|lines||markItUp|root|extend|replace|browser|markup|ul||start|nameSpace||get|levels|scrollPosition|header|abort|key|placeHolder|previewParserPath|each|localize|bind|focus|build|substring|range|previewInWindow|previewTemplatePath|resizeHandle|footer|template|mouseMove|mouseUp|mouseup|target|title|line|fixIeBug|scrollTop|rangeCopy|keyCode|parent|keepDefault|previewAutoRefresh|preview|html|beforeInsert|afterInsert|onEnter|onShiftEnter|onCtrlEnter|onTab|miuScript|attr|wrap|dropMenus|appendTo|insertAfter|unbind|keyPressed|insertion|name|split|value|opera|fixOperaBug|set|refreshPreview|createRange||character|sp|phtml|fn|previewPosition|after|previewParserVar|data|markupSet|null|init|substr|addClass|markItUpEditor|insertBefore|height|clientY|css|mousemove|append|keydown|focused|hover|accesskey|separator|for|markItUpButton|click|call|hide|dropMenu|magicMarkups|undefined|insert|msie|text|createTextRange|moveStart|setSelectionRange|selectionStart|open|iframe|close|documentElement|renderPreview|ajax|type|async|url|success|trigger|templates|script|src|match|jquery|markitup|pack|js|toUpperCase|markItUpContainer|markItUpHeader|markItUpFooter|safari|markItUpResizeHandle|mousedown|Math|max|px|keyup|display|Ctrl|markItUpSeparator|className|href|contextmenu|eval|show|one|push|markItUpDropMenu|pop|toString|prompt|isFunction|beforeMultiInsert|trim|join|afterMultiInsert|version|collapse|moveEnd|select|duplicate|moveToElementText|while|inRange|selectionEnd|closed|window|markItUpPreviewFrame|contentWindow|frame|remove|try|catch|write|POST|encodeURIComponent|content|String|fromCharCode|triggerHandler|markItUpRemove|removeClass|jQuery'.split('|'),0,{}));
/* markItUp 1.1.10 */
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(3($){$.2N.Z=3(X,28){p 6,u,A,I;u=A=I=d;6={D:\'\',1d:\'\',12:\'\',1x:\'\',1Y:l,2L:\'2M\',1r:\'~/3g/1H.27\',1m:\'\',2z:\'K\',1B:l,1G:\'\',1Z:\'\',23:{},26:{},25:{},1J:{},1n:[{}]};$.11(6,X,28);2(!6.12){$(\'3h\').1h(3(a,2l){1X=$(2l).1e(0).3i.1K(/(.*)3j\\.3f(\\.3e)?\\.3a$/);2(1X!==2p){6.12=1X[1]}})}7 L.1h(3(){p $$,c,18,16,o,F,Q,V,1g,1s,v,2B,O,1a;$$=$(L);c=L;18=[];1a=d;16=o=0;F=-1;6.1m=1j(6.1m);6.1r=1j(6.1r);3 1j(K,2i){2(2i){7 K.T(/("|\')~\\//g,"$1"+6.12)}7 K.T(/^~\\//,6.12)}3 2D(){D=\'\';1d=\'\';2(6.D){D=\'D="\'+6.D+\'"\'}f 2($$.1E("D")){D=\'D="Z\'+($$.1E("D").1o(0,1).3d())+($$.1E("D").1o(1))+\'"\'}2(6.1d){1d=\'R="\'+6.1d+\'"\'}$$.1I(\'<w \'+1d+\'></w>\');$$.1I(\'<w \'+D+\' R="Z"></w>\');$$.1I(\'<w R="3k"></w>\');$$.2b("2R");1g=$(\'<w R="3l"></w>\').2K($$);$(1P(6.1n)).24(1g);1s=$(\'<w R="3s"></w>\').1O($$);2(6.1B===l&&$.Y.3t!==l){1B=$(\'<w R="3u"></w>\').1O($$).1c("1R",3(e){p h=$$.2j(),y=e.2k,1C,1q;1C=3(e){$$.2d("2j",3r.3q(20,e.2k+h-y)+"3m");7 d};1q=3(e){$("27").1N("2h",1C).1N("2g",1q);7 d};$("27").1c("2h",1C).1c("2g",1q)});1s.2r(1B)}$$.2H(1V).3v(1V);$$.1c("21",3(e,X){2(X.1y!==d){1e()}2(c===$.Z.2c){14(X)}});$$.15(3(){$.Z.2c=L})}3 1P(1n){p C=$(\'<C></C>\'),i=0;$(\'B:2u > C\',C).2d(\'30\',\'k\');$.1h(1n,3(){p q=L,t=\'\',1D,B,j;1D=(q.17)?(q.1Q||\'\')+\' [32+\'+q.17+\']\':(q.1Q||\'\');17=(q.17)?\'2I="\'+q.17+\'"\':\'\';2(q.2e){B=$(\'<B R="36">\'+(q.2e||\'\')+\'</B>\').24(C)}f{i++;2w(j=18.8-1;j>=0;j--){t+=18[j]+"-"}B=$(\'<B R="2f 2f\'+t+(i)+\' \'+(q.34||\'\')+\'"><a 37="" \'+17+\' 1D="\'+1D+\'">\'+(q.1Q||\'\')+\'</a></B>\').1c("38",3(){7 d}).2v(3(){7 d}).1c("2Z",3(){$$.15()}).1R(3(){2(q.2t){3n(q.2t)()}2J(3(){14(q)},1);7 d}).2u(3(){$(\'> C\',L).3U();$(J).3w(\'2v\',3(){$(\'C C\',1g).2s()})},3(){$(\'> C\',L).2s()}).24(C);2(q.2n){18.3R(i);$(B).2b(\'3O\').2r(1P(q.2n))}}});18.3Q();7 C}3 2q(4){2(4){4=4.3X();4=4.T(/\\(\\!\\(([\\s\\S]*?)\\)\\!\\)/g,3(x,a){p b=a.1M(\'|!|\');2(I===l){7(b[1]!==2o)?b[1]:b[0]}f{7(b[1]===2o)?"":b[0]}});4=4.T(/\\[\\!\\[([\\s\\S]*?)\\]\\!\\]/g,3(x,a){p b=a.1M(\':!:\');2(1a===l){7 d}P=3Y(b[0],(b[1])?b[1]:\'\');2(P===2p){1a=l}7 P});7 4}7""}3 H(1i){2($.3M(1i)){1i=1i(V)}7 2q(1i)}3 1k(4){p E=H(Q.E);p 19=H(Q.19);p U=H(Q.U);p M=H(Q.M);2(U!==""){k=E+U+M}f 2(m===\'\'&&19!==\'\'){k=E+19+M}f{4=4||m;2(4.1K(/ $/)){k=E+4.T(/ $/,\'\')+M+\' \'}f{k=E+4+M}}7{k:k,E:E,U:U,19:19,M:M}}3 14(q){p z,j,n,i;V=Q=q;1e();$.11(V,{1u:"",12:6.12,c:c,m:(m||\'\'),o:o,u:u,A:A,I:I});H(6.1G);H(Q.1G);2(u===l&&A===l){H(Q.3B)}$.11(V,{1u:1});2(u===l&&A===l){W=m.1M(/\\r?\\n/);2w(j=0,n=W.8,i=0;i<n;i++){2($.3K(W[i])!==\'\'){$.11(V,{1u:++j,m:W[i]});W[i]=1k(W[i]).k}f{W[i]=""}}4={k:W.3I(\'\\n\')};G=o;z=4.k.8+(($.Y.1F)?n-1:0)}f 2(u===l){4=1k(m);G=o+4.E.8;z=4.k.8-4.E.8-4.M.8;z=z-(4.k.1K(/ $/)?1:0);z-=1v(4.k)}f 2(A===l){4=1k(m);G=o;z=4.k.8;z-=1v(4.k)}f{4=1k(m);G=o+4.k.8;z=0;G-=1v(4.k)}2((m===\'\'&&4.U===\'\')){F+=1T(4.k);G=o+4.E.8;z=4.k.8-4.E.8-4.M.8;F=$$.1f().1l(o,$$.1f().8).8;F-=1T($$.1f().1l(0,o))}$.11(V,{o:o,16:16});2(4.k!==m&&1a===d){2a(4.k);1L(G,z)}f{F=-1}1e();$.11(V,{1u:\'\',m:m});2(u===l&&A===l){H(Q.3L)}H(Q.1Z);H(6.1Z);2(v&&6.1Y){22()}A=I=u=1a=d}3 1T(4){2($.Y.1F){7 4.8-4.T(/\\n*/g,\'\').8}7 0}3 1v(4){2($.Y.2U){7 4.8-4.T(/\\r/g,\'\').8}7 0}3 2a(k){2(J.m){p 29=J.m.2x();29.1b=k}f{c.P=c.P.1l(0,o)+k+c.P.1l(o+m.8,c.P.8)}}3 1L(G,z){2(c.2m){2($.Y.1F&&$.Y.40>=9.5&&z==0){7 d}N=c.2m();N.3S(l);N.41(\'2Q\',G);N.3Z(\'2Q\',z);N.3V()}f 2(c.2P){c.2P(G,G+z)}c.1w=16;c.15()}3 1e(){c.15();16=c.1w;2(J.m){m=J.m;2($.Y.2U){p N=m.2x();p 1p=N.3y();1p.3z(c);1p.3E(\'3F\',N);p s=1p.1b.8-N.1b.8;o=s-(c.P.1o(0,s).8-c.P.1o(0,s).T(/\\r/g,\'\').8);m=N.1b}f{o=c.2O}}f{o=c.2O;m=c.P.1l(o,c.3H)}7 m}3 1H(){2(!v||v.3G){2(6.1x){v=2y.2W(\'\',\'1H\',6.1x);$(2y).3J(3(){v.1U()})}f{O=$(\'<2G R="3x"></2G>\');2(6.2L==\'2M\'){O.1O(1s)}f{O.2K(1g)}v=O[O.8-1].3D||3C[O.8-1]}}f 2(I===l){2(O){O.3N()}f{v.1U()}v=O=d}2(!6.1Y){22()}2(6.1x){v.15()}}3 22(){2E()}3 2E(){p 42;2(6.1m!==\'\'){$.2C({2F:\'3W\',2X:\'1b\',2V:d,2Y:6.1m,K:6.2z+\'=\'+3P($$.1f()),2T:3(K){1S(1j(K,1))}})}f{2(!2B){$.2C({2Y:6.1r,2X:\'1b\',2V:d,2T:3(K){1S(1j(K,1).T(/<!-- 3T -->/g,$$.1f()))}})}}7 d}3 1S(K){2(v.J){31{1W=v.J.2A.1w}33(e){1W=0}v.J.2W();v.J.35(K);v.J.1U();v.J.2A.1w=1W}}3 1V(e){A=e.A;I=e.I;u=(!(e.I&&e.u))?e.u:d;2(e.2F===\'2H\'){2(u===l){B=$("a[2I="+3p.3o(e.1z)+"]",1g).1A(\'B\');2(B.8!==0){u=d;2J(3(){B.39(\'1R\')},1);7 d}}2(e.1z===13||e.1z===10){2(u===l){u=d;14(6.25);7 6.25.1t}f 2(A===l){A=d;14(6.26);7 6.26.1t}f{14(6.23);7 6.23.1t}}2(e.1z===9){2(A==l||u==l||I==l){7 d}2(F!==-1){1e();F=$$.1f().8-F;1L(F,0);F=-1;7 d}f{14(6.1J);7 6.1J.1t}}}}2D()})};$.2N.3c=3(){7 L.1h(3(){p $$=$(L).1N().3b(\'2R\');$$.1A(\'w\').1A(\'w.Z\').1A(\'w\').U($$)})};$.Z=3(X){p 6={1y:d};$.11(6,X);2(6.1y){7 $(6.1y).1h(3(){$(L).15();$(L).2S(\'21\',[6])})}f{$(\'c\').2S(\'21\',[6])}}})(3A);',62,251,'||if|function|string||options|return|length||||textarea|false||else|||||block|true|selection||caretPosition|var|button||||ctrlKey|previewWindow|div|||len|shiftKey|li|ul|id|openWith|caretOffset|start|prepare|altKey|document|data|this|closeWith|range|iFrame|value|clicked|class||replace|replaceWith|hash|lines|settings|browser|markItUp||extend|root||markup|focus|scrollPosition|key|levels|placeHolder|abort|text|bind|nameSpace|get|val|header|each|action|localize|build|substring|previewParserPath|markupSet|substr|stored_range|mouseUp|previewTemplatePath|footer|keepDefault|line|fixIeBug|scrollTop|previewInWindow|target|keyCode|parent|resizeHandle|mouseMove|title|attr|opera|beforeInsert|preview|wrap|onTab|match|set|split|unbind|insertAfter|dropMenus|name|mousedown|writeInPreview|fixOperaBug|close|keyPressed|sp|miuScript|previewAutoRefresh|afterInsert||insertion|refreshPreview|onEnter|appendTo|onCtrlEnter|onShiftEnter|html|extraSettings|newSelection|insert|addClass|focused|css|separator|markItUpButton|mouseup|mousemove|inText|height|clientY|tag|createTextRange|dropMenu|undefined|null|magicMarkups|append|hide|call|hover|click|for|createRange|window|previewParserVar|documentElement|template|ajax|init|renderPreview|type|iframe|keydown|accesskey|setTimeout|insertBefore|previewPosition|after|fn|selectionStart|setSelectionRange|character|markItUpEditor|trigger|success|msie|global|open|dataType|url|focusin|display|try|Ctrl|catch|className|write|markItUpSeparator|href|contextmenu|triggerHandler|js|removeClass|markItUpRemove|toUpperCase|pack|markitup|templates|script|src|jquery|markItUpContainer|markItUpHeader|px|eval|fromCharCode|String|max|Math|markItUpFooter|safari|markItUpResizeHandle|keyup|one|markItUpPreviewFrame|duplicate|moveToElementText|jQuery|beforeMultiInsert|frame|contentWindow|setEndPoint|EndToEnd|closed|selectionEnd|join|unload|trim|afterMultiInsert|isFunction|remove|markItUpDropMenu|encodeURIComponent|pop|push|collapse|content|show|select|POST|toString|prompt|moveEnd|version|moveStart|phtml'.split('|'),0,{}))

mySettings_cmt = {
	nameSpace: 'markitcomment',
	resizeHandle: false,
	markupSet: [
		{name:lang['Negrita'], key:'B', openWith:'[b]', closeWith:'[/b]'},
		{name:lang['Cursiva'], key:'I', openWith:'[i]', closeWith:'[/i]'},
		{name:lang['Subrayado'], key:'U', openWith:'[u]', closeWith:'[/u]'},
		{name:lang['Insertar video de YouTube'], beforeInsert:function(h){markit_yt(h);}},
		{name:lang['Insertar Imagen'], beforeInsert:function(h){markit_img(h);}},
		{name:lang['Insertar Link'], beforeInsert:function(h){markit_url(h);}},
		{name:lang['Citar'], beforeInsert:function(h){markit_quote(h);}}
	]
};

//Funciones botones especiales
function markit_yt(h){
	var msg = prompt(lang['ingrese el id de yt'+(is_ie?' IE':'')], lang['ingrese solo el id de yt']);
	if(msg != null){
		h.replaceWith = '[swf=http://www.youtube.com/v/' + msg + ']\nlink: [url]http://www.youtube.com/watch?v=' + msg + '[/url]\n';
		h.openWith = '';
		h.closeWith = '';
	}else{
		h.replaceWith = '';
		h.openWith = '';
		h.closeWith = '';
	}
}
function markit_gv(h){
	var msg = prompt(lang['ingrese el id de gv'+(is_ie?' IE':'')], lang['ingrese solo el id de gv']);
	if(msg != null){
		h.replaceWith = '[swf=http://video.google.com/googleplayer.swf?docId=' + msg + ']\nlink: [url]http://video.google.com/videoplay?docid=' + msg + '[/url]\n';
		h.openWith = '';
		h.closeWith = '';
	}else{
		h.replaceWith = '';
		h.openWith = '';
		h.closeWith = '';
	}
}
function markit_swf(h){
	if(h.selection!='' && h.selection.substring(0,7)=='http://'){
		h.replaceWith = '[swf=' + h.selection + ']\nlink: [url]' + h.selection + '[/url]\n';
		h.openWith = '';
		h.closeWith = '';
	}else{
		var msg = prompt(lang['ingrese la url de swf'], 'http://');
		if(msg != null){
			h.replaceWith = '[swf=' + msg + ']\nlink: [url]' + msg + '[/url]\n';
			h.openWith = '';
			h.closeWith = '';
		}else{
			h.replaceWith = '';
			h.openWith = '';
			h.closeWith = '';
		}
	}
}
function markit_img(h){
	if(h.selection!='' && h.selection.substring(0,7)=='http://'){
		h.replaceWith = '';
		h.openWith = '[img=';
		h.closeWith = ']';
	}else{
		var msg = prompt(lang['ingrese la url de img'], 'http://');
		if(msg != null){
			h.replaceWith = '[img=' + msg + ']';
			h.openWith = '';
			h.closeWith = '';
		}else{
			h.replaceWith = '';
			h.openWith = '';
			h.closeWith = '';
		}
	}
}
function markit_url(h){
	if(h.selection==''){
		var msg = prompt(lang['Ingrese la URL que desea postear'], 'http://');
		if(msg != null){
			h.replaceWith = '[url]' + msg + '[/url]';
			h.openWith = '';
			h.closeWith = '';
		}else{
			h.replaceWith = '';
			h.openWith = '';
			h.closeWith = '';
		}
	}else if(h.selection.substring(0,7)=='http://' || h.selection.substring(0,8)=='https://' || h.selection.substring(0,6)=='ftp://'){
		h.replaceWith = '';
		h.openWith='[url]';
		h.closeWith='[/url]';
	}else{
		var msg = prompt(lang['Ingrese la URL que desea postear'], 'http://');
		if(msg != null){
			h.replaceWith = '';
			h.openWith='[url=' + msg + ']';
			h.closeWith='[/url]';
		}else{
			h.replaceWith = '';
			h.openWith = '';
			h.closeWith = '';
		}
	}
}

function markit_quote(h){
	if(h.selection==''){
		var msg = prompt('Ingrese el texto a citar', '');
		if(msg != null){
			h.replaceWith = '[quote]' + msg + '[/quote]';
			h.openWith = '';
			h.closeWith = '';
		}else{
			h.replaceWith = '';
			h.openWith = '';
			h.closeWith = '';
		}
	}else{
		h.replaceWith = '';
		h.openWith='[quote]';
		h.closeWith='[/quote]';
	}
}

function ir_a_categoria(cat){
	if (cat) {
		if (cat==-1) {
			document.location.href = '/';
		} else {
			document.location.href = '/' + lang['posts url categorias'] + '/' + cat + '/';
		}
	}
}

function createCookie(name, value, days){
/* Crea una cookie
	name[string] = Nombre de la cookie a guardar
	value[mixed] = Valor que se quiere guardar
	days[integer] = Cantidad de dias de expiracion
	return[void]
*/
	if(days){
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		var expires = '; expires=' + date.toGMTString();
	}
	else
		var expires = '';

	var domain = document.domain.split('.');
	domain = domain.slice(domain.length - 2).join('.');

	document.cookie = name + '=' + value + expires + '; path=/; domain=.' + domain;
}

function readCookie(name){
/* Devuelve informacion de una cookie
	name[string] = Nombre de la cookie a leer
	return[mixed] = null -> La cookie no existe
									mixed -> Valor de la cookie
*/
	var nameEQ = name + '=';
	var ca = document.cookie.split(';');
	for(var i=0, s=ca.length; i<s; ++i){
		var c = ca[i];
		while(c.charAt(0) == ' ')
			c = c.substring(1, c.length);
		if(c.indexOf(nameEQ) == 0)
			return c.substring(nameEQ.length, c.length);
	}
	return null;
}

function eraseCookie(name){
/* Elimina una cookie
	name[string] = Nombre de la cookie a eliminar
	return[void]
*/
	createCookie(name, "", -1);
}
/* FIN - Manejo de Cookies */

function px2fontSize(px) {
	var size = 7;
	if (px < 11) {
		size = 1;
	} else if (px < 14) {
		size = 2;
	} else if (px < 17) {
		size = 3;
	} else if (px < 21) {
		size = 4;
	} else if (px < 28) {
		size = 5;
	} else if (px < 40) {
		size = 6;
	}
	return size;
}

$.html2bbcode = function (data) {
	var parsedContent;
	$.ajax({
		type: 'post',
		url: '/ajax/editor/html2bbcode',
		data: 'cuerpo=' + encodeURIComponent(data),
		async: false,
		dataType: 'json',
		success: function (r) {
			parsedContent = r.data;
		}
	});
	return parsedContent;
}

$.fn.richedit = function(opts) {

	return this.each(function () {

		this.tagInsert = function (object, param) {
			if (this.view == 'html') {
				if (!param) {
					param = null;
				}
				if (!object.original) {
					object.original = [ object.replaceWith, object.openWith, object.closeWith ];
				}
				object.replaceWith = '';
				object.openWith = '';
				object.closeWith = '';
				this.exec(object.action, param);
			} else {
				if (object.original) {
					object.replaceWith = object.original[0];
					object.openWith = object.original[1];
					object.closeWith = object.original[2];
					delete object.original;
				}
			}
		}

		this.editor = $('<iframe border="0"></iframe>')[0];
		this.markItUp = $(this).markItUp(opts.markItUpSettings);

		this.refreshSwf = function () {
			if (this.editor.contentWindow.document.designMode) {
				var doc = this.editor.contentWindow.document, attr;
				doc.designMode = 'off';
				$(this.editor).contents().find('embed').each(function(){
					attr = $(this).attr('src');
					$(this).attr('src', attr);
				});
				setTimeout(function(){
					doc.designMode = 'on';
				}, 250);
			}
		}

		this.view = null;
		this.viewSource = function (init) {
			eraseCookie('wysiwyg');
			if (!init) {
				var data = $(this.editor.contentWindow.document.body).html();
				if (!data) {
					return '';
				}
				$(this).val($.html2bbcode(data));
			}
			$(this).removeClass('hide').next().show();
			$(this.editor).addClass('hide');
			$('.markItUpButton15').addClass('selected');
			this.view = 'source';
		}
		this.viewHtml = function (init) {
			if (!init) {
				createCookie('wysiwyg', 1);
			}
			var parsedContent = '';
			if ($.trim($(this).val())) {
				$.ajax({
					type: 'post',
					url: '/ajax/editor/bbcode2html',
					data: 'cuerpo=' + encodeURIComponent($(this).val()),
					async: false,
					dataType: 'json',
					success: function (r) {
						parsedContent = r.data;
					}
				});
			}
			this.editor.contentWindow.document.open();
			this.editor.contentWindow.document.write('\
				<html>\
					<head>\
						<link type="text/css" href="' + global_data.img + '/images/css/wysiwyg.css" rel="stylesheet" />\
					</head>\
					<body class="post-contenido">' + parsedContent + '</body>\
				</html>\
			');
			this.editor.contentWindow.document.close();
			$('#markItUp').get(0).refreshSwf();
			if (this.editor.contentWindow.document.designMode) {
				this.editor.contentWindow.document.designMode = 'on';
			}
			if (!$.browser.msie && !$.browser.opera) {
				this.editor.contentWindow.document.execCommand('enableObjectResizing', false, false);
			}
			$(this).addClass('hide').next().hide();
			$(this.editor).removeClass('hide');
			$('.markItUpButton15').removeClass('selected');
			this.view = 'html';
			if ($.browser.msie) { // no ie support
				this.viewSource(true);
			}
		}
		this.switchView = function () {
			if (this.view == 'html') {
				this.viewSource();
			} else {
				this.viewHtml();
			}
		}

		this.setFocus = function () {
			if (this.view == 'html') {
				$(this.editor).focus();
			} else {
				$(this).focus();
			}
		}

		this.selected = function () {
			var r = { start: 0, end: 0, text: '' }, objDocument, objWindow, object;
			if (this.view == 'html') {
				object = this.editor;
				objDocument = object.contentWindow;
				objWindow = object.contentWindow;
			} else {
				object = this;
				objDocument = document;
				objWindow = window;
			}
			if (this.view == 'source' && object.selectionStart) {
				r.start = object.selectionStart;
				r.end = object.selectionEnd;
				r.text = $(object).val().substr(r.start, r.end - r.start);
			} else {
				var tmp;
				if (objWindow.getSelection) {
					tmp = objWindow.getSelection().getRangeAt(0);
				} else if (objDocument.getSelection) {
					tmp = objDocument.getSelection().getRangeAt(0);
				} else if (objDocument.selection) {
					tmp = objDocument.selection.createRange();
				}
				if (tmp) {
					r.start = tmp.startOffset;
					r.end = tmp.endOffset;
					r.text = r.text+'';
				}
			}
			return r;
		}

		this.exec = function (action, param) {
			this.setFocus();
			if (!param) {
				param = null;
			}
			this.editor.contentWindow.document.execCommand(action, false, param);
		}

		this.execPrompt = function (action, caption, text) {
			var param = this.selected().text;
			if (!param) {
				param = prompt(caption, text);
			}
			if (param) {
				return this.exec(action, param);
			}
		}

		var properties = [ 'style', 'class' ], property;
		for (property in properties) {
			$(this.editor).attr(properties[property], $(this).attr(properties[property]));
		}
		$(this.editor).removeClass('required'); // fast fix

		$(this.editor).insertBefore(this);

		this.viewHtml(true);
		if (!readCookie('wysiwyg')) {
			this.viewSource();
		}

	});

}

// </richedit>

var mySettings = {
	markupSet: [
		{
			action: 'bold',
			name: lang['Negrita'],
			key: 'B',
			openWith: '[b]',
			closeWith: '[/b]',
			beforeInsert: function (r) {
				$('#markItUp').get(0).tagInsert(r);
			}
		},
		{
			action: 'italic',
			name: lang['Cursiva'],
			key: 'I',
			openWith: '[i]',
			closeWith: '[/i]',
			beforeInsert: function (r) {
				$('#markItUp').get(0).tagInsert(r);
			}
		},
		{
			action: 'underline',
			name: lang['Subrayado'],
			key: 'U',
			openWith: '[u]',
			closeWith: '[/u]',
			beforeInsert: function (r) {
				$('#markItUp').get(0).tagInsert(r);
			}
		},
		{
			separator: '-'
		},
		{
			action: 'justifyLeft',
			name: lang['Alinear a la izquierda'],
			openWith: '[align=left]',
			closeWith: '[/align]',
			beforeInsert: function (r) {
				$('#markItUp').get(0).tagInsert(r);
			}
		},
		{
			action: 'justifyCenter',
			name: lang['Centrar'],
			openWith: '[align=center]',
			closeWith: '[/align]',
			beforeInsert: function (r) {
				$('#markItUp').get(0).tagInsert(r);
			}
		},
		{
			action: 'justifyRight',
			name: lang['Alinear a la derecha'],
			openWith: '[align=right]',
			closeWith: '[/align]',
			beforeInsert: function (r) {
				$('#markItUp').get(0).tagInsert(r);
			}
		},
		{
			separator: '-'
		},
		{
			name: 'Color',
			dropMenu: [
				{
					action: 'foreColor',
					name: lang['Rojo oscuro'],
					openWith: '[color=darkred]',
					closeWith: '[/color]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'darkred');
					}
				},
				{
					action: 'foreColor',
					name: lang['Rojo'],
					openWith: '[color=red]',
					closeWith: '[/color]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'red');
					}
				},
				{
					action: 'foreColor',
					name: lang['Naranja'],
					openWith: '[color=orange]',
					closeWith: '[/color]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'orange');
					}
				},
				{
					action: 'foreColor',
					name: lang['Marron'],
					openWith: '[color=brown]',
					closeWith: '[/color]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'brown');
					}
				},
				{
					action: 'foreColor',
					name: lang['Amarillo'],
					openWith: '[color=yellow]',
					closeWith: '[/color]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'yellow');
					}
				},
				{
					action: 'foreColor',
					name: lang['Verde'],
					openWith: '[color=green]',
					closeWith: '[/color]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'green');
					}
				},
				{
					action: 'foreColor',
					name: lang['Oliva'],
					openWith: '[color=olive]',
					closeWith: '[/color]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'olive');
					}
				},
				{
					action: 'foreColor',
					name: lang['Cyan'],
					openWith: '[color=cyan]',
					closeWith: '[/color]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'cyan');
					}
				},
				{
					action: 'foreColor',
					name: lang['Azul'],
					openWith: '[color=blue]',
					closeWith: '[/color]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'blue');
					}
				},
				{
					action: 'foreColor',
					name: lang['Azul oscuro'],
					openWith: '[color=darkblue]',
					closeWith: '[/color]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'darkblue');
					}
				},
				{
					action: 'foreColor',
					name: lang['Indigo'],
					openWith: '[color=indigo]',
					closeWith: '[/color]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'indigo');
					}
				},
				{
					action: 'foreColor',
					name: lang['Violeta'],
					openWith: '[color=violet]',
					closeWith: '[/color]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'violet');
					}
				},
				{
					action: 'foreColor',
					name: lang['Negro'],
					openWith: '[color=black]',
					closeWith: '[/color]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'black');
					}
				}
			]
		},
				{
			name: lang['Fuente'],
			dropMenu: [
				{
					action: 'fontSize',
					name: lang['Pequena'],
					openWith: '[size=9]',
					closeWith: '[/size]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, px2fontSize(9));
					}
				},
				{
					action: 'fontSize',
					name: lang['Normal'],
					openWith: '[size=12]',
					closeWith: '[/size]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, px2fontSize(12));
					}
				},
				{
					action: 'fontSize',
					name: lang['Grande'],
					openWith: '[size=18]',
					closeWith: '[/size]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, px2fontSize(18));
					}
				},
				{
					action: 'fontSize',
					name: lang['Enorme'],
					openWith: '[size=24]',
					closeWith: '[/size]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, px2fontSize(24));
					}
				}
			]
		},
		{
			name: lang['Fuente'],
			dropMenu: [
				{
					action: 'fontName',
					name: 'Arial',
					openWith: '[font=Arial]',
					closeWith: '[/font]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'Arial');
					}
				},
				{
					action: 'fontName',
					name: 'Courier New',
					openWith: '[font=Courier New]',
					closeWith: '[/font]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'Courier New');
					}
				},
				{
					action: 'fontName',
					name: 'Georgia',
					openWith: '[font=Georgia]',
					closeWith: '[/font]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'Georgia');
					}
				},
				{
					action: 'fontName',
					name: 'Times New Roman',
					openWith: '[font=Times New Roman]',
					closeWith: '[/font]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'Times New Roman');
					}
				},
				{
					action: 'fontName',
					name: 'Verdana',
					openWith: '[font=Verdana]',
					closeWith: '[/font]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'Verdana');
					}
				},
				{
					action: 'fontName',
					name: 'Trebuchet MS',
					openWith: '[font=Trebuchet MS]',
					closeWith: '[/font]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'Trebuchet MS');
					}
				},
				{
					action: 'fontName',
					name: 'Lucida Sans',
					openWith: '[font=Lucida Sans]',
					closeWith: '[/font]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'Lucida Sans');
					}
				},
				{
					action: 'fontName',
					name: 'Comic Sans',
					openWith: '[font=Comic Sans]',
					closeWith: '[/font]',
					beforeInsert: function (r) {
						$('#markItUp').get(0).tagInsert(r, 'Comic Sans');
					}
				}
			]
		},
		{
			separator: '-'
		},
		{
			action: 'insertHtml',
			name: lang['Insertar video de YouTube'],
			beforeInsert: function (r) {
				var video = prompt(lang['ingrese el id de yt'+(is_ie?' IE':'')], lang['ingrese solo el id de yt']);
				if (video) {
					r.replaceWith = '[swf=http://www.youtube.com/v/' + video + ']\nlink: [url]http://www.youtube.com/watch?v=' + video + '[/url]\n';
					$('#markItUp').get(0).tagInsert(r, '<br /><center><embed src="http://www.youtube.com/v/' + video + '" quality=high width="640px" height="385px" type="application/x-shockwave-flash" AllowNetworking="internal" AllowScriptAccess="never" autoplay="false" wmode="transparent"></embed></center><br /><br />link: <a rel="nofollow" target="_blank" href="http://www.youtube.com/watch?v=' + video + '">http://www.youtube.com/watch?v=' + video + '</a>');
					$('#markItUp').get(0).refreshSwf();
				} else {
					r.replaceWith = '';
				}
			}
		},
		{
			action: 'insertHtml',
			name: lang['Insertar archivo SWF'],
			beforeInsert: function (r) {
				var selection = r.selection || $('#markItUp').get(0).selected().text, movie = '';
				r.replaceWith = '';
				if (selection.substr(0, 7) == 'http://') {
					movie = selection;
				} else {
					movie = prompt('Ingrese la URL', 'http://');
				}
				if (movie) {
					r.replaceWith = '[swf=' + movie + ']\nlink: [url]' + movie + '[/url]\n';
					$('#markItUp').get(0).tagInsert(r, '<br /><center><embed src="' + movie + '" quality=high width="425" height="350" TYPE="application/x-shockwave-flash" AllowNetworking="internal" AllowScriptAccess="never" autoplay="false" wmode="transparent"></embed></center><br /><br />link: <a rel="nofollow" target="_blank" href="' + movie + '">' + movie + '</a>');
					$('#markItUp').get(0).refreshSwf();
				} else {
					r.replaceWith = '';
				}
			}
		},
		{
			action: 'insertHtml',
			name: lang['Insertar Imagen'],
			beforeInsert: function (r) {
				var selection = r.selection || $('#markItUp').get(0).selected().text, img = '';
				r.replaceWith = '';
				if (selection.substr(0, 7) == 'http://') {
					img = selection;
				} else {
					img = prompt('Ingrese la URL', 'http://');
				}
				if (img) {
					r.replaceWith = '[img=' + img + ']';
					$('#markItUp').get(0).tagInsert(r, '<img class="imagen" border="0" src="' + img + '" onresizestart="return false" />');
				} else {
					r.replaceWith = '';
				}
			}
		},
		{
			action: 'createLink',
			name: lang['Insertar Link'],
			beforeInsert: function (r) {
				var selection = r.selection || $('#markItUp').get(0).selected().text, link = '', innerText = '';
				r.replaceWith = ''; r.action = 'createLink';
				if (selection.match(/^(https?|ftp):\/\//)) {
					innerText = selection;
					link = selection;
				} else {
					link = prompt('Ingrese la URL', 'http://');
					if (link) {
						if (selection) {
							innerText = selection;
						} else {
							innerText = link;
						}
					}
				}
				if (link && innerText) {
					if (link == innerText) {
						r.replaceWith = '[url]' + innerText + '[/url]';
					} else {
						r.replaceWith = '[url=' + link + ']' + innerText + '[/url]';
					}
					if ($('#markItUp').get(0).selected().text) {
						$('#markItUp').get(0).tagInsert(r, link);
					} else {
						r.action = 'insertHtml';
						$('#markItUp').get(0).tagInsert(r, '<a href="' + link + '">' + innerText + '</a>');
					}
				}
			}
		},
		{
			action: 'insertHtml',
			name: lang['Citar'],
			beforeInsert: function (r) {
				var selection = r.selection || $('#markItUp').get(0).selected().text, quote = '';
				r.replaceWith = '';
				if (selection){
					quote = selection;
				} else {
					quote = prompt('Ingrese el texto a citar');
				}
				if (quote) {
					r.replaceWith = '[quote]' + quote + '[/quote]';
					$('#markItUp').get(0).tagInsert(r, '<blockquote><div class="cita"><strong></strong> dijo:</div><div class="citacuerpo"><p>' + quote + '</p></div></blockquote>');
				}
			}
		}
	]
};

if (!$.browser.msie) {
	mySettings.markupSet.push({
		name: lang['Cambiar vista'],
		beforeInsert: function (r) {
			$('#markItUp').get(0).switchView();
		}
	});
}

/*
 * jQuery UI selectmenu
 *
 * Copyright (c) 2009 AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT (MIT-LICENSE.txt)
 * and GPL (GPL-LICENSE.txt) licenses.
 *
 * http://docs.jquery.com/UI
 * https://github.com/fnagel/jquery-ui/wiki/Selectmenu
 */

(function($) {

$.widget("ui.selectmenu", {
	getter: "value",
	version: "1.8",
	eventPrefix: "selectmenu",
	options: {
		transferClasses: true,
		typeAhead: "sequential",
		style: 'dropdown',
		positionOptions: {
			my: "left top",
			at: "left bottom",
			offset: null
		},
		width: null, 
		menuWidth: null, 
		handleWidth: 26,
		maxHeight: null,
		icons: null, 
		format: null,
		bgImage: function() {},
		wrapperElement: ""
	},

	_create: function() {
		var self = this, o = this.options;

		// set a default id value, generate a new random one if not set by developer
		var selectmenuId = this.element.attr('id') || 'ui-selectmenu-' + Math.random().toString(16).slice(2, 10);

		// quick array of button and menu id's
		this.ids = [ selectmenuId + '-button', selectmenuId + '-menu' ];

		// define safe mouseup for future toggling
		this._safemouseup = true;

		// create menu button wrapper
		this.newelement = $('<a class="' + this.widgetBaseClass + ' ui-widget ui-state-default ui-corner-all" id="' + this.ids[0] + '" role="button" href="#" tabindex="0" aria-haspopup="true" aria-owns="' + this.ids[1] + '"></a>')
			.insertAfter(this.element);
		this.newelement.wrap(o.wrapperElement);

		// transfer tabindex
		var tabindex = this.element.attr('tabindex');
		if (tabindex) {
			this.newelement.attr('tabindex', tabindex);
		}

		// save reference to select in data for ease in calling methods
		this.newelement.data('selectelement', this.element);
		
		// menu icon
		// div around arrow span by marco :)
		this.selectmenuIcon = $('<span class="' + this.widgetBaseClass + '-icon ui-icon"></span>')
			.prependTo($('<div />').prependTo(this.newelement));
			
		// append status span to button
		this.newelement.prepend('<span class="' + self.widgetBaseClass + '-status" />');
			
		// make associated form label trigger focus
		$('label[for="' + this.element.attr('id') + '"]')
			.attr('for', this.ids[0])
			.bind('click.selectmenu', function() {
				self.newelement[0].focus();
				return false;
			});	
			
		// click toggle for menu visibility
		this.newelement
			.bind('mousedown.selectmenu', function(event) {
				self._toggle(event, true);
				// make sure a click won't open/close instantly
				if (o.style == "popup") {
					self._safemouseup = false;
					setTimeout(function() { self._safemouseup = true; }, 300);
				}
				return false;
			})
			.bind('click.selectmenu', function() {
				return false;
			})
			.bind("keydown.selectmenu", function(event) {selectmenuIcon
				var ret = false;
				switch (event.keyCode) {
					case $.ui.keyCode.ENTER:
						ret = true;
						break;
					case $.ui.keyCode.SPACE:
						self._toggle(event);	
						break;
					case $.ui.keyCode.UP:
						if (event.altKey) {
							self.open(event);
						} else {
							self._moveSelection(-1);
						}
						break;
					case $.ui.keyCode.DOWN:
						if (event.altKey) {
							self.open(event);
						} else {
							self._moveSelection(1);
						}
						break;
					case $.ui.keyCode.LEFT:
						self._moveSelection(-1);
						break;
					case $.ui.keyCode.RIGHT:
						self._moveSelection(1);
						break;
					case $.ui.keyCode.TAB:
						ret = true;
						break;
					default:
						ret = true;
						self._typeAhead(event.keyCode, 'mouseup');
						break;	
				}
				return ret;
			})
			.bind('mouseover.selectmenu focus.selectmenu', function() { 
				if (!o.disabled) {
					$(this).addClass(self.widgetBaseClass + '-focus ui-state-hover');
				}
			})
			.bind('mouseout.selectmenu blur.selectmenu', function() {
				if (!o.disabled) {
					$(this).removeClass(self.widgetBaseClass + '-focus ui-state-hover');
				}
			});

		// document click closes menu
		$(document).bind("mousedown.selectmenu", function(event) {
			self.close(event);
		});

		// change event on original selectmenu
		this.element
			.bind("click.selectmenu", function() {
				self._refreshValue();
			})
			// newelement can be null under unclear circumstances in IE8 
			.bind("focus.selectmenu", function() {
				if (this.newelement) {
					this.newelement[0].focus();
				}
			});

		// original selectmenu width
		var selectWidth = this.element.width();

		// set menu button width
		this.newelement.width(o.width ? o.width : selectWidth);

		// hide original selectmenu element
		this.element.hide();		

		// create menu portion, append to body
		this.list = $('<ul class="' + self.widgetBaseClass + '-menu ui-widget ui-widget-content" aria-hidden="true" role="listbox" aria-labelledby="' + this.ids[0] + '" id="' + this.ids[1] + '"></ul>').appendTo('body');
		this.list.wrap(o.wrapperElement);				

		// transfer menu click to menu button
		this.list
			.bind("keydown.selectmenu", function(event) {
				var ret = false;
				switch (event.keyCode) {
					case $.ui.keyCode.UP:
						if (event.altKey) {
							self.close(event, true);
						} else {
							self._moveFocus(-1);
						}
						break;
					case $.ui.keyCode.DOWN:
						if (event.altKey) {
							self.close(event, true);
						} else {
							self._moveFocus(1);
						}
						break;	
					case $.ui.keyCode.LEFT:
						self._moveFocus(-1);
						break;
					case $.ui.keyCode.RIGHT:
						self._moveFocus(1);
						break;	
					case $.ui.keyCode.HOME:
						self._moveFocus(':first');
						break;		
					case $.ui.keyCode.PAGE_UP:
						self._scrollPage('up');
						break;	
					case $.ui.keyCode.PAGE_DOWN:
						self._scrollPage('down');
						break;
					case $.ui.keyCode.END:
						self._moveFocus(':last');
						break;		
					case $.ui.keyCode.ENTER:
					case $.ui.keyCode.SPACE:
						self.close(event, true);
						$(event.target).parents('li:eq(0)').trigger('mouseup');
						break;		
					case $.ui.keyCode.TAB:
						ret = true;
						self.close(event, true);
						break;	
					case $.ui.keyCode.ESCAPE:
						self.close(event, true);
						break;
					default:
						ret = true;
	
						self._typeAhead(event.keyCode,'focus');					break;	
				}
				return ret;
			});			
		
		// needed when window is resized
		$(window).bind("resize.selectmenu", function() {
			$.proxy(self._refreshPosition, this);
		});
	},

	_init: function() {
		var self = this, o = this.options;
		
		// serialize selectmenu element options	
		var selectOptionData = [];
		this.element
			.find('option')
			.each(function() {
				selectOptionData.push({
					value: $(this).attr('value'),
					text: self._formatText($(this).text()),
					selected: $(this).attr('selected'),
					classes: $(this).attr('class'),
					typeahead: $(this).attr('typeahead'),
					parentOptGroup: $(this).parent('optgroup').attr('label'),
					bgImage: o.bgImage.call($(this))
				});
			});		
				
		// active state class is only used in popup style
		var activeClass = (self.options.style == "popup") ? " ui-state-active" : "";

		// empty list so we can refresh the selectmenu via selectmenu()
		this.list.html("");

		// write li's
		for (var i = 0; i < selectOptionData.length; i++) {
					var thisLi = $('<li role="presentation"><a href="#" tabindex="-1" role="option" aria-selected="false"'+ (selectOptionData[i].typeahead ? ' typeahead="' + selectOptionData[i].typeahead + '"' : '' ) + '>'+ selectOptionData[i].text +'</a></li>')
				.data('index', i)
				.addClass(selectOptionData[i].classes)
				.data('optionClasses', selectOptionData[i].classes || '')
				.bind("mouseup.selectmenu", function(event) {
						if (self._safemouseup) {
							var changed = $(this).data('index') != self._selectedIndex();
							self.index($(this).data('index'));
							self.select(event);
							if (changed) {
								self.change(event);
							}
							self.close(event, true);
						}
					return false;
				})
				.bind("click.selectmenu", function() {
					return false;
				})
				.bind('mouseover.selectmenu focus.selectmenu', function() { 
					self._selectedOptionLi().addClass(activeClass); 
					self._focusedOptionLi().removeClass(self.widgetBaseClass + '-item-focus ui-state-hover'); 
					$(this).removeClass('ui-state-active').addClass(self.widgetBaseClass + '-item-focus ui-state-hover'); 
				})
				.bind('mouseout.selectmenu blur.selectmenu', function() { 
					if ($(this).is(self._selectedOptionLi().selector)) {
						$(this).addClass(activeClass);
					}
					$(this).removeClass(self.widgetBaseClass + '-item-focus ui-state-hover');
				});

			// optgroup or not...
			if (selectOptionData[i].parentOptGroup) {
				// whitespace in the optgroupname must be replaced, otherwise the li of existing optgroups are never found
				var optGroupName = self.widgetBaseClass + '-group-' + selectOptionData[i].parentOptGroup.replace(/[^a-zA-Z0-9]/g, "");
				if (this.list.find('li.' + optGroupName).size()) {
					this.list.find('li.' + optGroupName + ':last ul').append(thisLi);
				} else {
					$('<li role="presentation" class="' + self.widgetBaseClass + '-group ' + optGroupName + '"><span class="' + self.widgetBaseClass + '-group-label">' + selectOptionData[i].parentOptGroup + '</span><ul></ul></li>')
						.appendTo(this.list)
						.find('ul')
						.append(thisLi);
				}
			} else {
				thisLi.appendTo(this.list);
			}
			
			// this allows for using the scrollbar in an overflowed list
			this.list.bind('mousedown.selectmenu mouseup.selectmenu', function() { return false; });
			
			// append icon if option is specified
			if (o.icons) {
				for (var j in o.icons) {
					if (thisLi.is(o.icons[j].find)) {
						thisLi
							.data('optionClasses', selectOptionData[i].classes + ' ' + self.widgetBaseClass + '-hasIcon')
							.addClass(self.widgetBaseClass + '-hasIcon');
						var iconClass = o.icons[j].icon || "";						
						thisLi
							.find('a:eq(0)')
							.prepend('<span class="' + self.widgetBaseClass + '-item-icon ui-icon ' + iconClass + '"></span>');
						if (selectOptionData[i].bgImage) {
							thisLi.find('span').css('background-image', selectOptionData[i].bgImage);
						}
					}
				}
			}
		}	
				
		// we need to set and unset the CSS classes for dropdown and popup style
		var isDropDown = (o.style == 'dropdown');
		this.newelement
			.toggleClass(self.widgetBaseClass + "-dropdown", isDropDown)
			.toggleClass(self.widgetBaseClass + "-popup", !isDropDown);
		this.list
			.toggleClass(self.widgetBaseClass + "-menu-dropdown ui-corner-bottom", isDropDown)
			.toggleClass(self.widgetBaseClass + "-menu-popup ui-corner-all", !isDropDown)
			// add corners to top and bottom menu items
			.find('li:first')
			.toggleClass("ui-corner-top", !isDropDown)
			.end().find('li:last')
			.addClass("ui-corner-bottom");
		this.selectmenuIcon
			.toggleClass('ui-icon-triangle-1-s', isDropDown)
			.toggleClass('ui-icon-triangle-2-n-s', !isDropDown);

		// transfer classes to selectmenu and list
		if (o.transferClasses) {
			var transferClasses = this.element.attr('class') || '';
			this.newelement.add(this.list).addClass(transferClasses);
		}

		// original selectmenu width
		var selectWidth = this.element.width();

		// set menu width to either menuWidth option value, width option value, or select width 
		if (o.style == 'dropdown') { 
			this.list.width(o.menuWidth ? o.menuWidth : (o.width ? o.width : selectWidth)); 
		} else { 
			this.list.width(o.menuWidth ? o.menuWidth : (o.width ? o.width - o.handleWidth : selectWidth - o.handleWidth)); 
		}

		// calculate default max height
		if (o.maxHeight) {
			// set max height from option 
			if (o.maxHeight < this.list.height()) {
				this.list.height(o.maxHeight);
			}
		} else {
			if (!o.format && ($(window).height() / 3) < this.list.height()) {
				o.maxHeight = $(window).height() / 3;
				this.list.height(o.maxHeight);
			}
		}

		// save reference to actionable li's (not group label li's)
		this._optionLis = this.list.find('li:not(.' + self.widgetBaseClass + '-group)');
						
		// transfer disabled state
		if (this.element.attr('disabled') === true) {
			this.disable();
		}

		// update value
		this.index(this._selectedIndex());		

		// needed when selectmenu is placed at the very bottom / top of the page
		window.setTimeout(function() {
			self._refreshPosition();
		}, 200);
	},

	destroy: function() {
		this.element.removeData( this.widgetName )
			.removeClass( this.widgetBaseClass + '-disabled' + ' ' + this.namespace + '-state-disabled' )
			.removeAttr( 'aria-disabled' )
			.unbind( ".selectmenu" );
			
		$( window ).unbind( ".selectmenu" );
		$( document ).unbind( ".selectmenu" );
	
		// unbind click on label, reset its for attr
		$( 'label[for=' + this.newelement.attr('id') + ']' )
			.attr( 'for', this.element.attr( 'id' ) )
			.unbind( '.selectmenu' );
		
		if ( this.options.wrapperElement ) {
			this.newelement.find( this.options.wrapperElement ).remove();
			this.list.find( this.options.wrapperElement ).remove();
		} else {
			this.newelement.remove();
			this.list.remove();
		}
		this.element.show();	

		// call widget destroy function
		$.Widget.prototype.destroy.apply(this, arguments);
	},

	_typeAhead: function(code, eventType){
		var self = this, focusFound = false, C = String.fromCharCode(code);
		c = C.toLowerCase();

		if (self.options.typeAhead == 'sequential') {
			// clear the timeout so we can use _prevChar
			window.clearTimeout('ui.selectmenu-' + self.selectmenuId);

			// define our find var
			var find = typeof(self._prevChar) == 'undefined' ? '' : self._prevChar.join('');
			
			function focusOptSeq(elem, ind, char){
				focusFound = true;
				$(elem).trigger(eventType);
				typeof(self._prevChar) == 'undefined' ? self._prevChar = [char] : self._prevChar[self._prevChar.length] = char;
			}
			this.list.find('li a').each(function(i) {	
				if (!focusFound) {
					// allow the typeahead attribute on the option tag for a more specific lookup
					var thisText = $(this).attr('typeahead') || $(this).text();
					if (thisText.indexOf(find+C) == 0) {
						focusOptSeq(this,i, C)
					} else if (thisText.indexOf(find+c) == 0) {
						focusOptSeq(this,i,c)
					}
				}
			});
			
			// if we didnt find it clear the prevChar
			if (!focusFound) {
				//self._prevChar = undefined
			}

			// set a 1 second timeout for sequenctial typeahead
			//  	keep this set even if we have no matches so it doesnt typeahead somewhere else
			window.setTimeout(function(el) {
				el._prevChar = undefined;
			}, 1000, self);

		} else {
			//define self._prevChar if needed
			if (!self._prevChar){ self._prevChar = ['',0]; }

			var focusFound = false;
			function focusOpt(elem, ind){
				focusFound = true;
				$(elem).trigger(eventType);
				self._prevChar[1] = ind;
			}
			this.list.find('li a').each(function(i){	
				if(!focusFound){
					var thisText = $(this).text();
					if( thisText.indexOf(C) == 0 || thisText.indexOf(c) == 0){
							if(self._prevChar[0] == C){
								if(self._prevChar[1] < i){ focusOpt(this,i); }	
							}
							else{ focusOpt(this,i); }	
					}
				}
			});
			this._prevChar[0] = C;
		}
	},
	
	// returns some usefull information, called by callbacks only
	_uiHash: function() {
		var index = this.index();
		return {
			index: index,
			option: $("option", this.element).get(index),
			value: this.element[0].value
		};
	},

	open: function(event) {
		var self = this;
		var disabledStatus = this.newelement.attr("aria-disabled");
		if ( disabledStatus != 'true' ) {
			this._refreshPosition();
			this._closeOthers(event);
			this.newelement
				.addClass('ui-state-active');
			if (self.options.wrapperElement) {
				this.list.parent().appendTo('body');
			} else {
				this.list.appendTo('body');
			}
			this.list.addClass(self.widgetBaseClass + '-open')
				.attr('aria-hidden', false)
				.find('li:not(.' + self.widgetBaseClass + '-group):eq(' + this._selectedIndex() + ') a')[0].focus();
			if ( this.options.style == "dropdown" ) {
				this.newelement.removeClass('ui-corner-all').addClass('ui-corner-top');
			}
			this._refreshPosition();
			this._trigger("open", event, this._uiHash());
		}
	},

	close: function(event, retainFocus) {
		if ( this.newelement.is('.ui-state-active') ) {
			this.newelement
				.removeClass('ui-state-active');
			this.list
				.attr('aria-hidden', true)
				.removeClass(this.widgetBaseClass + '-open');
			if ( this.options.style == "dropdown" ) {
				this.newelement.removeClass('ui-corner-top').addClass('ui-corner-all');
			}
			if ( retainFocus ) {
				this.newelement.focus();
			}
			this._trigger("close", event, this._uiHash());
		}
	},

	change: function(event) {
		this.element.trigger("change");
		this._trigger("change", event, this._uiHash());
	},

	select: function(event) {
		this._trigger("select", event, this._uiHash());
	},

	_closeOthers: function(event) {
		$('.' + this.widgetBaseClass + '.ui-state-active').not(this.newelement).each(function() {
			$(this).data('selectelement').selectmenu('close', event);
		});
		$('.' + this.widgetBaseClass + '.ui-state-hover').trigger('mouseout');
	},

	_toggle: function(event, retainFocus) {
		if ( this.list.is('.' + this.widgetBaseClass + '-open') ) {
			this.close(event, retainFocus);
		} else {
			this.open(event);
		}
	},

	_formatText: function(text) {
		return (this.options.format ? this.options.format(text) : text);
	},

	_selectedIndex: function() {
		return this.element[0].selectedIndex;
	},

	_selectedOptionLi: function() {
		return this._optionLis.eq(this._selectedIndex());
	},

	_focusedOptionLi: function() {
		return this.list.find('.' + this.widgetBaseClass + '-item-focus');
	},

	_moveSelection: function(amt) {
		var currIndex = parseInt(this._selectedOptionLi().data('index'), 10);
		var newIndex = currIndex + amt;
		return this._optionLis.eq(newIndex).trigger('mouseup');
	},

	_moveFocus: function(amt) {
		if (!isNaN(amt)) {
			var currIndex = parseInt(this._focusedOptionLi().data('index') || 0, 10);
			var newIndex = currIndex + amt;
		}
		else {
			var newIndex = parseInt(this._optionLis.filter(amt).data('index'), 10);
		}

		if (newIndex < 0) {
			newIndex = 0;
		}
		if (newIndex > this._optionLis.size() - 1) {
			newIndex = this._optionLis.size() - 1;
		}
		var activeID = this.widgetBaseClass + '-item-' + Math.round(Math.random() * 1000);

		this._focusedOptionLi().find('a:eq(0)').attr('id', '');
		this._optionLis.eq(newIndex).find('a:eq(0)').attr('id', activeID).focus();
		this.list.attr('aria-activedescendant', activeID);
	},

	_scrollPage: function(direction) {
		var numPerPage = Math.floor(this.list.outerHeight() / this.list.find('li:first').outerHeight());
		numPerPage = (direction == 'up' ? -numPerPage : numPerPage);
		this._moveFocus(numPerPage);
	},

	_setOption: function(key, value) {
		this.options[key] = value;
		if (key == 'disabled') {
			this.close();
			this.element
				.add(this.newelement)
				.add(this.list)[value ? 'addClass' : 'removeClass'](
					this.widgetBaseClass + '-disabled' + ' ' +
					this.namespace + '-state-disabled')
				.attr("aria-disabled", value);
		}
	},

	index: function(newValue) {
		if (arguments.length) {
			this.element[0].selectedIndex = newValue;
			this._refreshValue();
		} else {
			return this._selectedIndex();
		}
	},

	value: function(newValue) {
		if (arguments.length) {
			// FIXME test for number is a kind of legacy support, could be removed at any time (Dez. 2010)
			// see this post for more info: https://github.com/fnagel/jquery-ui/issues#issue/33
			if (typeof newValue == "number") {
					this.index(newValue);
			} else if (typeof newValue == "string") {
				this.element[0].value = newValue;
				this._refreshValue();
			}
		} else {
			return this.element[0].value;
		}
	},

	_refreshValue: function() {
		var activeClass = (this.options.style == "popup") ? " ui-state-active" : "";
		var activeID = this.widgetBaseClass + '-item-' + Math.round(Math.random() * 1000);
		// deselect previous
		this.list
			.find('.' + this.widgetBaseClass + '-item-selected')
			.removeClass(this.widgetBaseClass + "-item-selected" + activeClass)
			.find('a')
			.attr('aria-selected', 'false')
			.attr('id', '');
		// select new
		this._selectedOptionLi()
			.addClass(this.widgetBaseClass + "-item-selected" + activeClass)
			.find('a')
			.attr('aria-selected', 'true')
			.attr('id', activeID);
			
		// toggle any class brought in from option
		var currentOptionClasses = (this.newelement.data('optionClasses') ? this.newelement.data('optionClasses') : "");
		var newOptionClasses = (this._selectedOptionLi().data('optionClasses') ? this._selectedOptionLi().data('optionClasses') : "");
		this.newelement
			.removeClass(currentOptionClasses)
			.data('optionClasses', newOptionClasses)
			.addClass( newOptionClasses )
			.find('.' + this.widgetBaseClass + '-status')
			.html( 
				this._selectedOptionLi()
					.find('a:eq(0)')
					.html()
			);

		this.list.attr('aria-activedescendant', activeID);
	},

	_refreshPosition: function() {
		var o = this.options;
		// if its a native pop-up we need to calculate the position of the selected li
		if (o.style == "popup" && !o.positionOptions.offset) {
			var selected = this._selectedOptionLi();
			var _offset = "0 -" + (selected.outerHeight() + selected.offset().top - this.list.offset().top);
		}
		this.list
			.css({
				zIndex: this.element.zIndex()
			})
			.position({
				// set options for position plugin
				of: o.positionOptions.of || this.newelement,
				my: o.positionOptions.my,
				at: o.positionOptions.at,
				offset: o.positionOptions.offset || _offset
			});
	}
});

})(jQuery);
/**
 * @author alexander.farkas
 * @version 1.4.1
 */
(function($){
	var baseClasses = /ui-checkbox|ui-radio/;
    $.widget('ui.checkBox', {
		options: {
	        hideInput: true,
			addVisualElement: true,
			addLabel: true,
			_delegated: false
	    },
        _create: function(){
            var that = this, 
				opts = this.options
			;
			
			if(!this.element.is(':radio,:checkbox')){
				if($.nodeName(this.element[0], 'input')){return false;}
				this._addDelegate();
				this.updateContainer();
				return false;
			}
            this.labels = $([]);
			
            this.checkedStatus = false;
			this.disabledStatus = false;
			this.hoverStatus = false;
            
            this.radio = (this.element.is(':radio'));
					
            this.visualElement = $([]);
            if (opts.hideInput) {
				this.element
					.addClass('ui-helper-hidden-accessible')
				;
				if(opts.addVisualElement){
					this.visualElement = $('<span />')
						.addClass(this.radio ? 'ui-radio' : 'ui-checkbox')
					;
					this.element.after(this.visualElement[0]);
				}
            }
			
			if(opts.addLabel){
				this.labels = $('label[for=' + this.element.attr('id') + ']')
					.addClass(this.radio ? 'ui-radio' : 'ui-checkbox')
				;
			}
			if(!opts._delegated){
				this._addEvents();
			}
			this.initialized = true;
            this.reflectUI({type: 'initialReflect'});
			return undefined;
        },
		updateContainer: function(){
			if(!this.element.is(':radio,:checkbox') && !$.nodeName(this.element[0], 'input')){
				$('input', this.element[0])
					.filter(function(){
						return !($.data(this, 'checkBox'));
					})
					.checkBox($.extend({}, this.options, {_delegated: true}))
				;
			}
		},
		_addDelegate: function(){
			var opts 		= this.options,
					
				toggleHover = function(e, that){
					if(!that){return;}
					that.hover = !!(e.type == 'focus' || e.type == 'mouseenter' || e.type == 'focusin' || e.type == 'mouseover');
					that._changeStateClassChain.call(that);
					return undefined;
				}
			;
			
			
			this.element
				.bind('click', function(e){
					if(!$.nodeName(e.target, 'input')){return;}
					var inst = ($.data(e.target) || {}).checkBox;
					if(!inst){return;}
					inst.reflectUI.call(inst, e.target, e);
				})
				.bind('focusin.checkBox focusout.checkBox', function(e){
					if(!$.nodeName(e.target, 'input')){return;}
					var inst = ($.data(e.target) || {}).checkBox;
					toggleHover(e, inst);
				})
			;
			
			if (opts.hideInput){
				this.element
					.bind('usermode', function(e){
						if(!e.enabled){return;}
						$('input', this).each(function(){
		                    var inst = ($.data(this) || {}).checkBox;
							(inst && inst.destroy.call(inst, true));
						});
	                })
				;
            }
			
			if(opts.addVisualElement){
				this.element
					.bind('mouseover.checkBox mouseout.checkBox', function(e){
						if(!$.nodeName(e.target, 'span')){return;}
						var inst = ( $.data($(e.target).prev()[0]) || {} ).checkBox;
						toggleHover(e, inst);
					})
					.bind('click.checkBox', function(e){
						if(!$.nodeName(e.target, 'span') || !baseClasses.test( e.target.className || '' )){return;}
						$(e.target).prev()[0].click();
						return false;
					})
				;
			}
			if(opts.addLabel){
				this.element
					.delegate('label.ui-radio, label.ui-checkbox', 'mouseenter.checkBox mouseleave.checkBox', function(e){
						var inst = ( $.data(document.getElementById( $(this).attr('for') )) || {} ).checkBox;
						toggleHover( e, inst );
					});
			}
			
		},
		_addEvents: function(){
			var that 		= this, 
			
				opts 		= this.options,
					
				toggleHover = function(e){
					if(that.disabledStatus){
						return false;
					}
					that.hover = (e.type == 'focus' || e.type == 'mouseenter');
					that._changeStateClassChain();
					return undefined;
				}
			;
			
			this.element
				.bind('click.checkBox', $.proxy(this, 'reflectUI'))
				.bind('focus.checkBox blur.checkBox', toggleHover)
			;
			if (opts.hideInput){
				this.element
					.bind('usermode', function(e){
	                    (e.enabled &&
	                        that.destroy.call(that, true));
	                })
				;
            }
			if(opts.addVisualElement){
					this.visualElement
						.bind('mouseenter.checkBox mouseleave.checkBox', toggleHover)
						.bind('click.checkBox', function(e){
							that.element[0].click();
							return false;
						})
					;
				}
			if(opts.addLabel){
				this.labels.bind('mouseenter.checkBox mouseleave.checkBox', toggleHover);
			}
		},
		_changeStateClassChain: function(){
			var allElements = this.labels.add(this.visualElement),
				stateClass 	= '',
				baseClass 	= 'ui-'+((this.radio) ? 'radio' : 'checkbox')
			;
				
			if(this.checkedStatus){
				stateClass += '-checked'; 
				allElements.addClass(baseClass+'-checked');
			} else {
				allElements.removeClass(baseClass+'-checked');
			}
			
			if(this.disabledStatus){
				stateClass += '-disabled'; 
				allElements.addClass(baseClass+'-disabled');
			} else {
				allElements.removeClass(baseClass+'-disabled');
			}
			if(this.hover){
				stateClass += '-hover'; 
				allElements.addClass(baseClass+'-hover');
			} else {
				allElements.removeClass(baseClass+'-hover');
			}
			
			baseClass += '-state';
			if(stateClass){
				stateClass = baseClass + stateClass;
			}
			
			function switchStateClass(){
				var classes = this.className.split(' '),
					found = false;
				$.each(classes, function(i, classN){
					if(classN.indexOf(baseClass) === 0){
						found = true;
						classes[i] = stateClass;
						return false;
					}
					return undefined;
				});
				if(!found){
					classes.push(stateClass);
				}
				this.className = classes.join(' ');
			}
			
			this.labels.each(switchStateClass);
			this.visualElement.each(switchStateClass);
		},
        destroy: function(onlyCss){
            this.element.removeClass('ui-helper-hidden-accessible');
			this.visualElement.addClass('ui-helper-hidden');
            if (!onlyCss) {
                var o = this.options;
                this.element.unbind('.checkBox');
				this.visualElement.remove();
                this.labels
					.unbind('.checkBox')
					.removeClass('ui-state-hover ui-state-checked ui-state-disabled')
				;
            }
        },
		
        disable: function(){
            this.element[0].disabled = true;
            this.reflectUI({type: 'manuallyDisabled'});
        },
		
        enable: function(){
            this.element[0].disabled = false;
            this.reflectUI({type: 'manuallyenabled'});
        },
		
        toggle: function(e){
            this.changeCheckStatus((this.element.is(':checked')) ? false : true, e);
        },
		
        changeCheckStatus: function(status, e){
            if(e && e.type == 'click' && this.element[0].disabled){
				return false;
			}
			this.element.attr({'checked': status});
            this.reflectUI(e || {
                type: 'changeCheckStatus'
            });
			return undefined;
        },
		
        propagate: function(n, e, _noGroupReflect){
			if(!e || e.type != 'initialReflect'){
				if (this.radio && !_noGroupReflect) {
					//dynamic
	                $(document.getElementsByName(this.element.attr('name')))
						.checkBox('reflectUI', e, true);
	            }
	            return this._trigger(n, e, {
	                options: this.options,
	                checked: this.checkedStatus,
	                labels: this.labels,
					disabled: this.disabledStatus
	            });
			}
			return undefined;
        },
		
        reflectUI: function(e){
			
            var oldChecked 			= this.checkedStatus, 
				oldDisabledStatus 	= this.disabledStatus
			;
            					
			this.disabledStatus = this.element.is(':disabled');
			this.checkedStatus = this.element.is(':checked');
			
			if (this.disabledStatus != oldDisabledStatus || this.checkedStatus !== oldChecked) {
				this._changeStateClassChain();
				
				(this.disabledStatus != oldDisabledStatus &&
					this.propagate('disabledChange', e));
				
				(this.checkedStatus !== oldChecked &&
					this.propagate('change', e));
			}
            
        }
    });
})(jQuery);

var mydialog = { // back compability
	error_500: function (fn) {
		$('<div><p>Ocurri&oacute; un error al procesar lo solicitado</p></div>').dialog({
			modal: true,
			resizable: false,
			title: 'Ops',
			buttons: {
				'Reintentar': function () {
					$(this).dialog('close');
					return eval(fn);
				},
				'Cancelar': function () {
					$(this).dialog('close');
				}
			}
		});
	},
	alert: function (str) {
		$('<div><div>' + str + '</p></div>').dialog({
			modal: true,
			resizable: false,
			title: 'Ops',
			buttons: {
				'Aceptar': function () {
					$(this).dialog('close');
				}
			}
		});
	}
}

var Search = {
	suggest: function (query) {
		$.getJSON(
			'http://search.yahooapis.com/WebSearchService/V1/spellingSuggestion?appid=Gs7HyLfV34FLispE.NBG7sZ_Z0XctH0zHDLRhbKFOizSoEQzPD4lXL2nbkosIzaP.T7HoQ--&output=json&callback=?&query=' + query,
			function (r) {
				if (r.ResultSet) {
					var suggest = r.ResultSet.Result
						link = $('#search-suggest').children('a').attr('href');
					$('#search-suggest')
						.show()
						.children('a')
						.html(suggest)
						.attr('href', link + '&q=' + suggest);
				}
			}
		);
	}
};

$(document).ready(function(){

	// limit textarea
	$('input.sizelimit, textarea.sizelimit').inputsize({
		size: 255,
		callback: function (limitreached, n) {
			var counter = $('span.sizelimit');
			counter.addClass('positive');
			if (limitreached) {
				counter.addClass('negative');
			}
			counter.html(255 - n);
			return true;
		}
	}).trigger('keypress');

	// tipsy comment votes title
	$('.hastipsy[title]').tipsy({gravity: 's'});

	// jQuery UI buttons
	$('button, input:submit, .ui-button').button();

	// TOP search button
	$('.fast-search , #search-big').bind(
		'keydown',
		function (e) {
			if (e.keyCode == 13) {
				$(this).next('.btn_search').click();
			}
		}
	);
		
	//Buscador	
	$('.btn_search').bind(
		'click',
		function () {
			if (typeof search_base == 'undefined') {
				search_base = '/buscar/';
			}
			var val = $.trim($(this).prev('input').val());
			var filters = $.trim($('.old-filters').val());
			if($.param($('.searchfield'))){
				if (val) {
					location.href = search_base + '?q=' + val + filters + '&' + $.param($('.searchfield'));
				}
			}else{
				if (val) {
					location.href = search_base + '?q=' + val + filters;
				}
			}
	});

	$('#show-paises-lista').click(function(){
		$('#paises-lista li a img[data-lazy]').each(function(){
			$(this).attr('src', $(this).attr('data-lazy'));
		});
		$('#paises-lista').toggle();
		if ($('#paises-lista').is(':visible')) {
			$(this).addClass('here');
		} else {
			$(this).removeClass('here');
		}
	});
	$("#paises-lista li a").click(function(){
		var pais = $(this).attr('data-country');
		eraseCookie("pais_home");
		createCookie("pais_home", pais, 1);
		pais = readCookie("pais_home");
		if (pais) {
			location.reload();
		}
	});
	
	
	var location_box_more = true;
	$('.location-box-more').click(function(){
      if (location_box_more) {
          $('#comunidades-dir').css('height', '170%');
          $(this).html("Ver menos");
          location_box_more = false;
      }
      else {
          $('#comunidades-dir').css('height', '170px');
          $(this).html("Ver más");
          location_box_more = true;
      }
	});
	
	
	// duplicate texts whenever needed
	$('.searchq').bind(
		'keyup',
		function () {
			var obj = this;
			$('.searchq').each(
				function () {
					if (this != obj) {
						$(this).val($(obj).val());
					}
				}
			);
		}
	);

	// hover filter of tops box
	$('div.time-tops-filter').hover(
		function(){
			$(this).children('ul.time-box').show();
		},
		function(){
			$(this).children('ul.time-box').hide();
		}
	);

	$('img.lazy').lazyload({ placeHolder: global_data.img + 'images/space.gif', sensitivity: 300 });

	//Botones comentarios
	mySettings_cmt = {
		nameSpace: 'markitcomment',
		resizeHandle: false,
		markupSet: [
			{name:lang['Negrita'], key:'B', openWith:'[b]', closeWith:'[/b]'},
			{name:lang['Cursiva'], key:'I', openWith:'[i]', closeWith:'[/i]'},
			{name:lang['Subrayado'], key:'U', openWith:'[u]', closeWith:'[/u]'},
			{name:lang['Insertar video de YouTube'], beforeInsert:function(h){markit_yt(h);}},
			{name:lang['Insertar Imagen'], beforeInsert:function(h){markit_img(h);}},
			{name:lang['Insertar Link'], beforeInsert:function(h){markit_url(h);}},
			{name:lang['Citar'], beforeInsert:function(h){markit_quote(h);}}
		]
	};

	var ntoHideElements = new Array();
	var ntoRemoveClassElements = new Array();

	$('body').click(function(e){
		if (!$(e.target).closest('.nohide').length) {
			$('.navpanel').hide();
		}
	});

	$('#mensajes-box, #notifications-box').click(function(){
		return true;
	});

	//Editor de posts comentarios
	$('#myComment-text-box').click(
		function(event){
			event.stopPropagation();
			if($('#markItUpBody_comm').size()){
				$('#markItUpBody_comm > div.markItUpContainer > div.markItUpHeader').show();
				$('#comment-button-text').show();
				$('#myComment-text-box').addClass('comment-focus');
				$('#body_comm').focus();
			}else{
				/* ntoHideElements.push('#markItUpNbody_comm > div.markItUpContainer > div.markItUpHeader'); */
				/* ntoHideElements.push('#comment-button-text'); */
				$('#body_comm').markItUp(mySettings_cmt);
				$('#emoticons_comm').show();

				$('#myComment-text-box').addClass('comment-active');
				$('#markItUpBody_comm > div.markItUpContainer > div.markItUpHeader').show();
				$('#myComment-text-box').addClass('comment-focus');

				$('#comment-button-text').show();
				$('#body_comm').focus();
				var commentTextBox = {'myComment-text-box' : 'comment-focus'};
				ntoRemoveClassElements.push(commentTextBox);
			}
		}
	);

	//Editor de posts comentarios de novatos
	$('#myComment-text-box-novatos').click(
		function(event){
			event.stopPropagation();
			if($('#markItUpBody_comm').size()){
				$('#comment-button-text').show();
				$('#myComment-text-box').addClass('comment-focus');
				$('#body_comm').focus();
			}else{
				$('#myComment-text-box-novatos').addClass('comment-active');
				$('#myComment-text-box-novatos').addClass('comment-focus');
				$('#comment-button-text').show();
				$('#body_comm').focus();
				var commentTextBox = {'myComment-text-box' : 'comment-focus'};
				ntoRemoveClassElements.push(commentTextBox);
			}
		}
	);

	$('.autogrow').css('max-height', '500px').autoGrow();
	$('.autogrow-big').css('max-height', '800px').autoGrow();
	
	
	/*
	 * CONFIGURE DIALOGS ON POST ACTIONS
	 */
	nDialog_cfg = {
		autoOpen: false,
		width: 300,
		modal: true,
		buttons: [
			{
				text: "Ok",
				click: function() {$(this).dialog("close");}
			}
		],
		resizable: false
	};

	// hovercards
	$('.hovercard').tooltip({
		content: Hovercard.callback,
		offset: [ 0, 16 ]
	});
	$('div.tooltip-c div.view-more a').live('click', function(){
		$(this).closest('.tooltip-c.compact').hide().next('.tooltip-c.extended').show();
	});

	// custom selects
	$('i.select-list').live('click', function(){
		$(this).next().toggle();
	});

	// hide from newsfeed
	$('div.activity-element a.feed-hide').live(
		'click',
		function () {
			var obj = $(this),
				container = obj.closest('div.activity-element'),
				id = container.attr('data-feed'),
				unfollow = '';
			if (obj.hasClass('feed-unfollow')) {
				unfollow = container.attr('data-unfollow')
			}
			ajax(
				'newsfeed',
				'hide',
				{
					id: id,
					unfollow: unfollow
				}
			);
			container.fadeOut('fast');
		}
	);

	// editor for posts
	$('#markItUp.post').richedit({markItUpSettings: mySettings});

	$('#emoticons a').unbind('click').click(function(){

		var smile = $(this).attr('data-smile').split(','),
			r = { action: 'insertHtml', replaceWith: ' ' + smile[0] + ' ' },
			editor = $('#markItUp').get(0);

		if (editor.view == 'html') {
			$('#markItUp').get(0).tagInsert(r, '<img src="' + global_data.img + 'images/smiles/' + smile[1] + '">');
		} else {
			$.markItUp(r);
		}
		return false;
	});
	
	$('#emoticons_comm a').click(function(){
		var smile = $(this).attr('data-smile');
		$.markItUp({ replaceWith:' '+smile+' ' });
		return false;
	});
	
	
	if (!readCookie('wysiwyg')) {
		$('.markItUpButton15 a').trigger('mouseenter');
		setTimeout(function(){
			$('.markItUpButton15 a').trigger('mouseleave');
		}, 5000);
	}


	$('a.following-button').mouseenter( function() {
		var unfollow_button = $(this).children('.ui-button-text').children('.unfollow-button-text:not(.disabled)');
		if(unfollow_button.length > 0){
			unfollow_button.show();
			$(this).children('.ui-button-text').children('.following-button-text').hide();
		}
	}).mouseleave( function() {
		var unfollow_button = $(this).children('.ui-button-text').children('.unfollow-button-text:not(.disabled)');
		if(unfollow_button.length > 0){
			unfollow_button.hide();
			$(this).children('.ui-button-text').children('.following-button-text').show();
		}
	});

	// last activity delete
	$('#last-activity-container div.list-element').hover(
		function(){
			$(this).children('i.remove').show();
			$(this).children('span.time').hide();
		},
		function(){
			$(this).children('i.remove').hide();
			$(this).children('span.time').show();
		}
	);

	// nice video embeding for yt
	$('.ytembed').ytEmbed();

	// autogrow
	//$('textarea[autogrow]').live('keyup',function(){$(this).attr('rows',$(this).val().split('\n').length)});

	// reshout
	$('li.s-respam a').live('click', function(){

		if ($(this).attr('disabled') == 'disabled') {
			return false;
		}

		var object = $(this),
			id = object.attr('data-id'),
			owner = object.attr('data-owner');

		$('#action-dialogs .forward-dialog').dialog(nDialog_cfg);
		$('.forward-dialog').dialog(
			'option',
			'buttons',
			[
				{
					text: 'Aceptar',
					'class': 'ui-button-positive box-shadow-soft floatL',
					click: function() {
						object.attr('disabled', 'disabled');
						ajax(
							'shout',
							'add',
							{
								parent_id: id,
								parent_owner: owner
							},
							{
								success: function (r) {
									$(tmpl(r.template, r.data)).prependTo('#shouts, #newsfeed').hide().slideDown('fast');
								}
							}
						);
						object.parent().remove();
						$(this).dialog("close");
					}
				},
				{
					text: 'Cancelar',
					'class': 'ui-button-cancel floatR',
					click: function() {
						$(this).dialog('close');
					}
				}
			]
		);
		$('.forward-dialog').dialog('open');

	});

	// shouts add
	$('#shout-add').click(function(){

		if ($(this).attr('disabled') == 'disabled') {
			return false;
		}

		var object = $(this),
			body = $.trim($('#shout-body').val()),
			attachment_type = 0,
			attachment = '',
			template = 'feed_shout_text',
			privacy = parseInt($('input[name=privacy]').val());

		switch ($('.shout-attach-link.active').attr('data-attach')) {
			case 'image': case 'image-import':
				attachment_type = 1;
				attachment = $('#shout-attach-input-image').val();
				template = 'feed_shout_image';
				break;
			case 'video':
				attachment_type = 2;
				attachment = $('#shout-attach-input-video').val();
				template = 'feed_shout_video';
				break;
			case 'link':
				attachment_type = 3;
				attachment = $('#shout-attach-input-link').val();
				template = 'feed_shout_link';
		}

		if (body || attachment_type) {

			object.button('disable');
			ajax(
				'shout',
				'add',
				{
					attachment_type: attachment_type,
					attachment: attachment,
					body: body,
					privacy: privacy
				},
				{
					success: function (r) {
						$(tmpl(template, r.data)).prependTo('#shouts, #newsfeed').hide().slideDown('fast');
						$('#shout-body, #shout-attach-input-image, #shout-attach-input-video, #shout-attach-input-link').val('');
					},
					complete: function () {
						object.button('enable');
					}
				}
			);

		}
	});

	// shout reply
	$('a.shout-reply').click(function(){
		$(this).parentsUntil('div.shout-element').parent().children('div.shout-comments').show();
	});

	$('li.make-comment input').keyup(function(event){

		if (event.keyCode == 13) {

			var link = $(this),
				body = $.trim(link.val()),
				object = link.parentsUntil('div.shout-element').parent().attr('id').split('_');
			if (body) {

				ajax(
					'shout',
					'reply-add',
					{
						id: object[1],
						owner: object[2],
						body: body
					},
					{
						success: function (r) {
							$(tmpl('tmpl_shout_reply_add', r.data)).insertBefore(link.parent());
							link.val('');
						},
						complete: function () {
							link.attr('disabled', '');
						}
					}
				);

			}

		}

	});

	// attach link
	$('a.shout-attach-link').click(function(){
		$('a.shout-attach-link').removeClass('active');
		$('div.shout-attach').hide();
		$(this).addClass('active');
		if ($(this).attr('data-attach')) {
			$('#shout-attach-' + $(this).attr('data-attach')).show();
		}
	});

	// imgupload
	$('#imgupload').change(function(){
		$('#imgupload-loading').show();
		$('#shout-add').button('disable');
		Kn3.upload(
			$('#imgupload'),
			function (imgObj) {
				if (imgObj.no == 0) {
					$('#imgpreview').attr('src', imgObj.error);
					$('#shout-attach-input-image').val(imgObj.error);
				}
				$('#imgupload-loading').hide();
				$('#shout-add').button('enable');
			}
		);
	});

	if ($.browser.msie) {
		var zIndexNumber = 10000;
		$('div').each(function() {
			$(this).css('zIndex', zIndexNumber);
			zIndexNumber -= 10;
		});
	}

	// ui related
	$('.ui-btn').button();
	$('.custom-check').checkBox();

});


/* Autocomplete 1.1 */
(function($){$.fn.extend({autocompleteold:function(urlOrData,options){var isUrl=typeof urlOrData=="string";options=$.extend({},$.Autocompleter.defaults,{url:isUrl?urlOrData:null,data:isUrl?null:urlOrData,delay:isUrl?$.Autocompleter.defaults.delay:10,max:options&&!options.scroll?10:150},options);options.highlight=options.highlight||function(value){return value;};options.formatMatch=options.formatMatch||options.formatItem;return this.each(function(){new $.Autocompleter(this,options);});},result:function(handler){return this.bind("result",handler);},search:function(handler){return this.trigger("search",[handler]);},flushCache:function(){return this.trigger("flushCache");},setOptions:function(options){return this.trigger("setOptions",[options]);},unautocomplete:function(){return this.trigger("unautocomplete");}});$.Autocompleter=function(input,options){var KEY={UP:38,DOWN:40,DEL:46,TAB:9,RETURN:13,ESC:27,COMMA:188,PAGEUP:33,PAGEDOWN:34,BACKSPACE:8};var $input=$(input).attr("autocomplete","off").addClass(options.inputClass);var timeout;var previousValue="";var cache=$.Autocompleter.Cache(options);var hasFocus=0;var lastKeyPressCode;var config={mouseDownOnSelect:false};var select=$.Autocompleter.Select(options,input,selectCurrent,config);var blockSubmit;$.browser.opera&&$(input.form).bind("submit.autocomplete",function(){if(blockSubmit){blockSubmit=false;return false;}});$input.bind(($.browser.opera?"keypress":"keydown")+".autocomplete",function(event){hasFocus=1;lastKeyPressCode=event.keyCode;switch(event.keyCode){case KEY.UP:event.preventDefault();if(select.visible()){select.prev();}else{onChange(0,true);}break;case KEY.DOWN:event.preventDefault();if(select.visible()){select.next();}else{onChange(0,true);}break;case KEY.PAGEUP:event.preventDefault();if(select.visible()){select.pageUp();}else{onChange(0,true);}break;case KEY.PAGEDOWN:event.preventDefault();if(select.visible()){select.pageDown();}else{onChange(0,true);}break;case options.multiple&&$.trim(options.multipleSeparator)==","&&KEY.COMMA:case KEY.TAB:case KEY.RETURN:if(selectCurrent()){event.preventDefault();blockSubmit=true;return false;}break;case KEY.ESC:select.hide();break;default:clearTimeout(timeout);timeout=setTimeout(onChange,options.delay);break;}}).focus(function(){hasFocus++;}).blur(function(){hasFocus=0;if(!config.mouseDownOnSelect){hideResults();}}).click(function(){if(hasFocus++>1&&!select.visible()){onChange(0,true);}}).bind("search",function(){var fn=(arguments.length>1)?arguments[1]:null;function findValueCallback(q,data){var result;if(data&&data.length){for(var i=0;i<data.length;i++){if(data[i].result.toLowerCase()==q.toLowerCase()){result=data[i];break;}}}if(typeof fn=="function")fn(result);else $input.trigger("result",result&&[result.data,result.value]);}$.each(trimWords($input.val()),function(i,value){request(value,findValueCallback,findValueCallback);});}).bind("flushCache",function(){cache.flush();}).bind("setOptions",function(){$.extend(options,arguments[1]);if("data"in arguments[1])cache.populate();}).bind("unautocomplete",function(){select.unbind();$input.unbind();$(input.form).unbind(".autocomplete");});function selectCurrent(){var selected=select.selected();if(!selected)return false;var v=selected.result;previousValue=v;if(options.multiple){var words=trimWords($input.val());if(words.length>1){var seperator=options.multipleSeparator.length;var cursorAt=$(input).selection().start;var wordAt,progress=0;$.each(words,function(i,word){progress+=word.length;if(cursorAt<=progress){wordAt=i;return false;}progress+=seperator;});words[wordAt]=v;v=words.join(options.multipleSeparator);}v+=options.multipleSeparator;}$input.val(v);hideResultsNow();$input.trigger("result",[selected.data,selected.value]);return true;}function onChange(crap,skipPrevCheck){if(lastKeyPressCode==KEY.DEL){select.hide();return;}var currentValue=$input.val();if(!skipPrevCheck&&currentValue==previousValue)return;previousValue=currentValue;currentValue=lastWord(currentValue);if(currentValue.length>=options.minChars){$input.addClass(options.loadingClass);if(!options.matchCase)currentValue=currentValue.toLowerCase();request(currentValue,receiveData,hideResultsNow);}else{stopLoading();select.hide();}};function trimWords(value){if(!value)return[""];if(!options.multiple)return[$.trim(value)];return $.map(value.split(options.multipleSeparator),function(word){return $.trim(value).length?$.trim(word):null;});}function lastWord(value){if(!options.multiple)return value;var words=trimWords(value);if(words.length==1)return words[0];var cursorAt=$(input).selection().start;if(cursorAt==value.length){words=trimWords(value)}else{words=trimWords(value.replace(value.substring(cursorAt),""));}return words[words.length-1];}function autoFill(q,sValue){if(options.autoFill&&(lastWord($input.val()).toLowerCase()==q.toLowerCase())&&lastKeyPressCode!=KEY.BACKSPACE){$input.val($input.val()+sValue.substring(lastWord(previousValue).length));$(input).selection(previousValue.length,previousValue.length+sValue.length);}};function hideResults(){clearTimeout(timeout);timeout=setTimeout(hideResultsNow,200);};function hideResultsNow(){var wasVisible=select.visible();select.hide();clearTimeout(timeout);stopLoading();if(options.mustMatch){$input.search(function(result){if(!result){if(options.multiple){var words=trimWords($input.val()).slice(0,-1);$input.val(words.join(options.multipleSeparator)+(words.length?options.multipleSeparator:""));}else{$input.val("");$input.trigger("result",null);}}});}};function receiveData(q,data){if(data&&data.length&&hasFocus){stopLoading();select.display(data,q);autoFill(q,data[0].value);select.show();}else{hideResultsNow();}};function request(term,success,failure){if(!options.matchCase)term=term.toLowerCase();var data=cache.load(term);if(data&&data.length){success(term,data);}else if((typeof options.url=="string")&&(options.url.length>0)){var extraParams={timestamp:+new Date()};$.each(options.extraParams,function(key,param){extraParams[key]=typeof param=="function"?param():param;});$.ajax({mode:"abort",port:"autocomplete"+input.name,dataType:options.dataType,url:options.url,data:$.extend({q:lastWord(term),limit:options.max},extraParams),success:function(data){var parsed=options.parse&&options.parse(data)||parse(data);cache.add(term,parsed);success(term,parsed);}});}else{select.emptyList();failure(term);}};function parse(data){var parsed=[];var rows=data.split("\n");for(var i=0;i<rows.length;i++){var row=$.trim(rows[i]);if(row){row=row.split("|");parsed[parsed.length]={data:row,value:row[0],result:options.formatResult&&options.formatResult(row,row[0])||row[0]};}}return parsed;};function stopLoading(){$input.removeClass(options.loadingClass);};};$.Autocompleter.defaults={inputClass:"ac_input",resultsClass:"ac_results",loadingClass:"ac_loading",minChars:1,delay:400,matchCase:false,matchSubset:true,matchContains:false,cacheLength:10,max:100,mustMatch:false,extraParams:{},selectFirst:true,formatItem:function(row){return row[0];},formatMatch:null,autoFill:false,width:0,multiple:false,multipleSeparator:", ",highlight:function(value,term){return value.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)("+term.replace(/([\^\$\(\)\[\]\{\}\*\.\+\?\|\\])/gi,"\\$1")+")(?![^<>]*>)(?![^&;]+;)","gi"),"<strong>$1</strong>");},scroll:true,scrollHeight:180};$.Autocompleter.Cache=function(options){var data={};var length=0;function matchSubset(s,sub){if(!options.matchCase)s=s.toLowerCase();var i=s.indexOf(sub);if(options.matchContains=="word"){i=s.toLowerCase().search("\\b"+sub.toLowerCase());}if(i==-1)return false;return i==0||options.matchContains;};function add(q,value){if(length>options.cacheLength){flush();}if(!data[q]){length++;}data[q]=value;}function populate(){if(!options.data)return false;var stMatchSets={},nullData=0;if(!options.url)options.cacheLength=1;stMatchSets[""]=[];for(var i=0,ol=options.data.length;i<ol;i++){var rawValue=options.data[i];rawValue=(typeof rawValue=="string")?[rawValue]:rawValue;var value=options.formatMatch(rawValue,i+1,options.data.length);if(value===false)continue;var firstChar=value.charAt(0).toLowerCase();if(!stMatchSets[firstChar])stMatchSets[firstChar]=[];var row={value:value,data:rawValue,result:options.formatResult&&options.formatResult(rawValue)||value};stMatchSets[firstChar].push(row);if(nullData++<options.max){stMatchSets[""].push(row);}};$.each(stMatchSets,function(i,value){options.cacheLength++;add(i,value);});}setTimeout(populate,25);function flush(){data={};length=0;}return{flush:flush,add:add,populate:populate,load:function(q){if(!options.cacheLength||!length)return null;if(!options.url&&options.matchContains){var csub=[];for(var k in data){if(k.length>0){var c=data[k];$.each(c,function(i,x){if(matchSubset(x.value,q)){csub.push(x);}});}}return csub;}else if(data[q]){return data[q];}else if(options.matchSubset){for(var i=q.length-1;i>=options.minChars;i--){var c=data[q.substr(0,i)];if(c){var csub=[];$.each(c,function(i,x){if(matchSubset(x.value,q)){csub[csub.length]=x;}});return csub;}}}return null;}};};$.Autocompleter.Select=function(options,input,select,config){var CLASSES={ACTIVE:"ac_over"};var listItems,active=-1,data,term="",needsInit=true,element,list;function init(){if(!needsInit)return;element=$("<div/>").hide().addClass(options.resultsClass).css("position","absolute").appendTo(document.body);list=$("<ul/>").appendTo(element).mouseover(function(event){if(target(event).nodeName&&target(event).nodeName.toUpperCase()=='LI'){active=$("li",list).removeClass(CLASSES.ACTIVE).index(target(event));$(target(event)).addClass(CLASSES.ACTIVE);}}).click(function(event){$(target(event)).addClass(CLASSES.ACTIVE);select();input.focus();return false;}).mousedown(function(){config.mouseDownOnSelect=true;}).mouseup(function(){config.mouseDownOnSelect=false;});if(options.width>0)element.css("width",options.width);needsInit=false;}function target(event){var element=event.target;while(element&&element.tagName!="LI")element=element.parentNode;if(!element)return[];return element;}function moveSelect(step){listItems.slice(active,active+1).removeClass(CLASSES.ACTIVE);movePosition(step);var activeItem=listItems.slice(active,active+1).addClass(CLASSES.ACTIVE);if(options.scroll){var offset=0;listItems.slice(0,active).each(function(){offset+=this.offsetHeight;});if((offset+activeItem[0].offsetHeight-list.scrollTop())>list[0].clientHeight){list.scrollTop(offset+activeItem[0].offsetHeight-list.innerHeight());}else if(offset<list.scrollTop()){list.scrollTop(offset);}}};function movePosition(step){active+=step;if(active<0){active=listItems.size()-1;}else if(active>=listItems.size()){active=0;}}function limitNumberOfItems(available){return options.max&&options.max<available?options.max:available;}function fillList(){list.empty();var max=limitNumberOfItems(data.length);for(var i=0;i<max;i++){if(!data[i])continue;var formatted=options.formatItem(data[i].data,i+1,max,data[i].value,term);if(formatted===false)continue;var li=$("<li/>").html(options.highlight(formatted,term)).addClass(i%2==0?"ac_even":"ac_odd").appendTo(list)[0];$.data(li,"ac_data",data[i]);}listItems=list.find("li");if(options.selectFirst){listItems.slice(0,1).addClass(CLASSES.ACTIVE);active=0;}if($.fn.bgiframe)list.bgiframe();}return{display:function(d,q){init();data=d;term=q;fillList();},next:function(){moveSelect(1);},prev:function(){moveSelect(-1);},pageUp:function(){if(active!=0&&active-8<0){moveSelect(-active);}else{moveSelect(-8);}},pageDown:function(){if(active!=listItems.size()-1&&active+8>listItems.size()){moveSelect(listItems.size()-1-active);}else{moveSelect(8);}},hide:function(){element&&element.hide();listItems&&listItems.removeClass(CLASSES.ACTIVE);active=-1;},visible:function(){return element&&element.is(":visible");},current:function(){return this.visible()&&(listItems.filter("."+CLASSES.ACTIVE)[0]||options.selectFirst&&listItems[0]);},show:function(){var offset=$(input).offset();element.css({width:typeof options.width=="string"||options.width>0?options.width:$(input).width(),top:offset.top+input.offsetHeight,left:offset.left}).show();if(options.scroll){list.scrollTop(0);list.css({maxHeight:options.scrollHeight,overflow:'auto'});if($.browser.msie&&typeof document.body.style.maxHeight==="undefined"){var listHeight=0;listItems.each(function(){listHeight+=this.offsetHeight;});var scrollbarsVisible=listHeight>options.scrollHeight;list.css('height',scrollbarsVisible?options.scrollHeight:listHeight);if(!scrollbarsVisible){listItems.width(list.width()-parseInt(listItems.css("padding-left"))-parseInt(listItems.css("padding-right")));}}}},selected:function(){var selected=listItems&&listItems.filter("."+CLASSES.ACTIVE).removeClass(CLASSES.ACTIVE);return selected&&selected.length&&$.data(selected[0],"ac_data");},emptyList:function(){list&&list.empty();},unbind:function(){element&&element.remove();}};};$.fn.selection=function(start,end){if(start!==undefined){return this.each(function(){if(this.createTextRange){var selRange=this.createTextRange();if(end===undefined||start==end){selRange.move("character",start);selRange.select();}else{selRange.collapse(true);selRange.moveStart("character",start);selRange.moveEnd("character",end);selRange.select();}}else if(this.setSelectionRange){this.setSelectionRange(start,end);}else if(this.selectionStart){this.selectionStart=start;this.selectionEnd=end;}});}var field=this[0];if(field.createTextRange){var range=document.selection.createRange(),orig=field.value,teststring="<->",textLength=range.text.length;range.text=teststring;var caretAt=field.value.indexOf(teststring);field.value=orig;this.selection(caretAt,caretAt+textLength);return{start:caretAt,end:caretAt+textLength}}else if(field.selectionStart!==undefined){return{start:field.selectionStart,end:field.selectionEnd}}};})(jQuery);


