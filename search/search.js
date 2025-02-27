/* empty (php.js) 911.1619 */
function empty(a){var b;if(a===""||a===0||a==="0"||a===null||a===false||typeof a==="undefined")return true;if(typeof a=="object"){for(b in a)return false;return true}return false};

/* Search */
var search = {
	autor_intro: function(e, href, query, value, true_empty){
	  t = document.all ? e.keyCode : e.which;
	  if(t==13){
			this.autor_submit(href, query, value, true_empty);
		}
	},
	autor_submit: function(href, query, value, true_empty){
		if(empty(value) && !true_empty)
			return false;
		//Borro si habia algun filtro por user: anterior
		query = $.trim(query.replace(/(?:user|usuario):(?: )?([a-zA-Z0-9_]{5,35})/g, ''));
		if(empty(value))
			window.location.href = href + '&q=' + encodeURIComponent(query);
		else
			window.location.href = href + '&q=' + encodeURIComponent(query) + '&autor=' + encodeURIComponent(value);
	},

	categoria: function(href, query, value){
		//Borro si habia algun filtro por categoria: anterior
		query = $.trim(query.replace(/(?:cat|categoria):(?: )?([a-zA-Z0-9_]{3,21})/g, ''));
		if(value==-1)
			window.location.href = href + '&q=' + encodeURIComponent(query);
		else
			window.location.href = href + '&q=' + encodeURIComponent(query) + '&cat=' + encodeURIComponent(value);
	},

	pais: function(href, query, value){
		//Borro si habia algun filtro por categoria: anterior
		query = $.trim(query.replace(/(?:pais):(?: )?([a-zA-Z]{2,2})/g, ''));
		if(value==-1)
			window.location.href = href + '&q=' + encodeURIComponent(query);
		else
			window.location.href = href + '&q=' + encodeURIComponent(query) + '&pais=' + encodeURIComponent(value);
	},

	home_change_actual: 'posts',
	home_change: function (select, a) {
		if (this.home_change_actual == select) {
			return false;
		}
		$('body').attr('class', 'home '+select);
		$('.search-options li').removeClass('active');
		$(a).parent().addClass('active');
		$('form[name="search-box"] input[name="q"]').focus();
		$('.search-btn-option').show();
		$('.filterSearch > div, #homeEmpleos').hide();

		switch (select) {
			case 'internet':
				$('form[name="search-box"]').attr('action', '/web');
				$('.filter-adv').hide();
				break;
			case 'posts':
				$('form[name="search-box"]').attr('action', '/posts');
				$('#filterPosts').show();
				$('.filter-adv').show();
				break;
			case 'comunidades':
				$('form[name="search-box"]').attr('action', '/comunidades');
				$('#filterComunidades').show();
				$('.filter-adv').show();
				break;
			case 'empleos':
				$('form[name="search-box"]').attr('action', '/empleos/argentina');
				$('.search-btn-option').hide();
				$('#homeEmpleos, .filter-adv').show();
				break;
		}
		this.home_change_actual = select;
	},
	
	onsubmit: function(){
		switch(this.home_change_actual){
			case 'internet':
				break;
			case 'posts':
				//Usando el filtro por categoria
				if($('#filterPosts .filterCategoria').val()!=-1)
					$('form[name="search-box"]').append('<input type="hidden" value="' + encodeURI($('#filterPosts .filterCategoria').val()) + '" name="cat" />');
				//Usando el filtro por autor
				if(!empty($('#filterPosts .filterAutor').val()))
					$('form[name="search-box"]').append('<input type="hidden" value="' + encodeURI($('#filterPosts .filterAutor').val()) + '" name="autor" />');
				break;
			case 'comunidades':
				//Tipo de buscador
				if($('#filterComunidades input[name=tipo_buscador]:checked').val()!='temas')
					$('form[name="search-box"]').append('<input type="hidden" value="comunidades" name="type" />');
				//Usando el filtro por categoria
				if($('#filterComunidades .filterCategoria').val()!=-1)
					$('form[name="search-box"]').append('<input type="hidden" value="' + encodeURI($('#filterComunidades .filterCategoria').val()) + '" name="cat" />');
				break;
			case 'usuarios':
				break;
		}
	},
	
	filterSearch_show: function(){
		var es_visible = $('.filterSearch').is(':visible');
		if(es_visible){
			$('.filter-adv').addClass('open');
			$('.filterSearch').hide();
		}else{
			$('.filter-adv').removeClass('open');
			$('.filterSearch').show();
		}
		var dominio = document.domain.split('.');
		dominio = dominio.slice(dominio.length - 2).join('.');
		document.cookie='search_filterSearch=' + (+!es_visible) + ';expires=Thu, 26 Jul 2012 16:12:48 GMT;path=/;domain=.'+dominio;
	},

	q_focus: function(){
		$('form[name="search-box"] input[name="q"]').focus();
	},
	intro_submit: function(e){
		tecla=(document.all)?e.keyCode:e.which;
		if(tecla==13)
			$('form[name="search-box"]').submit();
	},

	suggest: function(q_url, q_original, q, href){
		$.getJSON("http://search.yahooapis.com/WebSearchService/V1/spellingSuggestion?appid=Gs7HyLfV34FLispE.NBG7sZ_Z0XctH0zHDLRhbKFOizSoEQzPD4lXL2nbkosIzaP.T7HoQ--&output=json&callback=?&query=" + q_url,
			function(data){
				if(!empty(data.ResultSet.Result)){
					var suggest = data.ResultSet.Result;
					$('.suggest a').attr('href', href + encodeURIComponent(q_original.replace(q, suggest))).html(suggest);
					$('.suggest').fadeIn('slow');
				}
			});
	}
}

$(document).ready(function(){
	if(global_location=='posts' || global_location=='comunidades' || global_location=='empleos'){
		var ads_effect = {
			hideAll: function(){
				$('#results ol').hide();
				$('.paginadorBuscador').hide();
				$('.footer').hide();
			},
			showAll: function(){
				$('#results ol').show();
				$('.paginadorBuscador').show();
				$('.footer').show();
			},

			height: $('#avisosTop').css('height'),
			intentos: 1,
			time: setInterval(function(){
				ads_effect.check(ads_effect.intentos++);
			}, 100),

			check: function(intentos){
				if(intentos >= 15 || ads_effect.height != $('#avisosTop').css('height')){
					this.showAll();
					clearInterval(ads_effect.time);
				}
			}
		}
	}
	$('li.vermas').bind('click', function(){
		$(this).parent('ul').children('li').addClass('show');
		$(this).remove();
	});
    $('input[name=q]').keyup(function(e){
        if (search.home_change_actual == 'internet') {
            if (e.keyCode != 13 && e.keyCode != 38 && e.keyCode != 40) {
                var val = $.trim($(this).val());
                if (val.length >= 1) {
                    $.getScript('http://suggestqueries.google.com/complete/search?hl=es&q='+encodeURIComponent(val)+'&cp='+val.length);
                }
                else $('#suggest').hide();
            }
        }
    });
    $('input[name=q]').bind($.browser.msie ? 'keydown' : 'keypress', function(e){
        if (search.home_change_actual == 'internet') {
            if (e.keyCode == 13) {
                if ($('#suggest > ul > li.hover').length && $('#suggest').css('display') != 'none') {
                    e.preventDefault();
                    $('#suggest > ul > li.hover').click();
                }
            }
            else if (e.keyCode == 38) {
                if ($('#suggest > ul > li.hover').prev().length) {
                    var sel = $('#suggest > ul > li.hover').prev();
                    suggest_hover_clear();
                    suggest_hover(sel);
                }
                else {
                    suggest_hover_clear();
                    suggest_hover($('#suggest > ul > li:last'));
                }
            }
            else if (e.keyCode == 40) {
                if ($('#suggest > ul > li.hover').next().length) {
                    var sel = $('#suggest > ul > li.hover').next();
                    suggest_hover_clear();
                    suggest_hover(sel);
                }
                else {
                    suggest_hover_clear();
                    suggest_hover($('#suggest > ul > li:first'));
                }
            }
        }
    });
    $('#suggest > ul > li').live('click', function(){ suggest_set(this); $('form[name=search-box]').submit(); }).live('mouseleave', function(){ $(this).removeClass('hover'); }).live('mouseenter', function(){ suggest_hover_clear(); suggest_hover(this, true); });
    $('*').live('click', function(){ $('#suggest').hide(); });
});

function suggest_hover(el, nochange) {
    if (typeof nochange == 'undefined') var nochange = false;
    $(el).addClass('hover');
    if (!nochange) suggest_set(el);
}
function suggest_hover_clear() { $('#suggest > ul > li.hover').removeClass('hover'); }
function suggest_set(el) { $('input[name=q]').val($(el).html().replace(/<(?:\/)?span>/ig, '')); }

var google = {
	ac: {
	    h: function (data) {
	        var c = data[1].length, cls;
	        if (c) {
    	        $('#suggest').html('<ul></ul>').show();
    	        $('#suggest > ul').append('<li class="hidden hover">'+$.trim($('input[name=q]').val())+'</li>');
                for (var i = 0; i < c; ++i) {
                    $('#suggest > ul').append('<li>'+data[1][i][0]+'</li>');
                }
                $('#suggest > ul > li').each(function(){ $(this).html($(this).html().replace(new RegExp('('+$('input[name=q]').val()+')'), '<span>$1</span>')); });
            }
        }
    }
}

var lang = Array();
lang['error procesar'] = 'Ocurrio un error intenta nuevamente mas tarde';
function open_login_box() {
    $('li.identificate').addClass('active');
    $('li.identificate a').attr('href', 'javascript:close_login_box()');
    $('#login_box').show();
    $('#nickname').focus();
}
function close_login_box() {
    $('li.identificate').removeClass('active');
    $('li.identificate a').attr('href', 'javascript:open_login_box()');
    $('#login_box').hide();
}
function login_ajax(){
	if (!$('#nickname').val()) {
	    $('#nickname').focus();
		return;
	}
	if (!$('#password').val()) {
		$('#password').focus();
		return;
	}
	$('#login_error').hide();
	$('#login_cargando').show();
	$.ajax({
		type: 'post', url: '/login.php', cache: false, data: 'nick='+encodeURIComponent($('#nickname').val())+'&pass='+encodeURIComponent($('#password').val())+'&ajax=1',
		success: function (r) {
			if ($('#login_box').css('display') == 'block') {
				$('#login_cargando').hide();
				if (r.charAt(0) == '0') {
					$('#login_error').html(r.substring(3));
					$('#login_error').show();
					$('#nickname').focus();
					return;
				}
				if (r.charAt(0) == '2'){
					$('.login_cuerpo').css('text-align','center');
					$('.login_cuerpo').css('line-height','150%');
					$('.login_cuerpo').html(r.substring(3));
					return;
				}
			}
			if (r.charAt(0) == '1'){
				close_login_box();
				if (r.substring(3) == 'Home') location.href='/';
				else location.reload();
			}
		},
		error: function(){
			$('#login_error').html(lang['error procesar']);
			$('#login_error').show();
		}
	});
}

// jQuery UI / Widget / Mouse / Slider
(function(c){c.ui=c.ui||{};if(!c.ui.version){c.extend(c.ui,{version:"1.8.2",plugin:{add:function(a,b,d){a=c.ui[a].prototype;for(var e in d){a.plugins[e]=a.plugins[e]||[];a.plugins[e].push([b,d[e]])}},call:function(a,b,d){if((b=a.plugins[b])&&a.element[0].parentNode)for(var e=0;e<b.length;e++)a.options[b[e][0]]&&b[e][1].apply(a.element,d)}},contains:function(a,b){return document.compareDocumentPosition?a.compareDocumentPosition(b)&16:a!==b&&a.contains(b)},hasScroll:function(a,b){if(c(a).css("overflow")==
"hidden")return false;b=b&&b=="left"?"scrollLeft":"scrollTop";var d=false;if(a[b]>0)return true;a[b]=1;d=a[b]>0;a[b]=0;return d},isOverAxis:function(a,b,d){return a>b&&a<b+d},isOver:function(a,b,d,e,f,g){return c.ui.isOverAxis(a,d,f)&&c.ui.isOverAxis(b,e,g)},keyCode:{ALT:18,BACKSPACE:8,CAPS_LOCK:20,COMMA:188,COMMAND:91,COMMAND_LEFT:91,COMMAND_RIGHT:93,CONTROL:17,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,INSERT:45,LEFT:37,MENU:93,NUMPAD_ADD:107,NUMPAD_DECIMAL:110,NUMPAD_DIVIDE:111,NUMPAD_ENTER:108,
NUMPAD_MULTIPLY:106,NUMPAD_SUBTRACT:109,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SHIFT:16,SPACE:32,TAB:9,UP:38,WINDOWS:91}});c.fn.extend({_focus:c.fn.focus,focus:function(a,b){return typeof a==="number"?this.each(function(){var d=this;setTimeout(function(){c(d).focus();b&&b.call(d)},a)}):this._focus.apply(this,arguments)},enableSelection:function(){return this.attr("unselectable","off").css("MozUserSelect","")},disableSelection:function(){return this.attr("unselectable","on").css("MozUserSelect",
"none")},scrollParent:function(){var a;a=c.browser.msie&&/(static|relative)/.test(this.css("position"))||/absolute/.test(this.css("position"))?this.parents().filter(function(){return/(relative|absolute|fixed)/.test(c.curCSS(this,"position",1))&&/(auto|scroll)/.test(c.curCSS(this,"overflow",1)+c.curCSS(this,"overflow-y",1)+c.curCSS(this,"overflow-x",1))}).eq(0):this.parents().filter(function(){return/(auto|scroll)/.test(c.curCSS(this,"overflow",1)+c.curCSS(this,"overflow-y",1)+c.curCSS(this,"overflow-x",
1))}).eq(0);return/fixed/.test(this.css("position"))||!a.length?c(document):a},zIndex:function(a){if(a!==undefined)return this.css("zIndex",a);if(this.length){a=c(this[0]);for(var b;a.length&&a[0]!==document;){b=a.css("position");if(b=="absolute"||b=="relative"||b=="fixed"){b=parseInt(a.css("zIndex"));if(!isNaN(b)&&b!=0)return b}a=a.parent()}}return 0}});c.extend(c.expr[":"],{data:function(a,b,d){return!!c.data(a,d[3])},focusable:function(a){var b=a.nodeName.toLowerCase(),d=c.attr(a,"tabindex");return(/input|select|textarea|button|object/.test(b)?
!a.disabled:"a"==b||"area"==b?a.href||!isNaN(d):!isNaN(d))&&!c(a)["area"==b?"parents":"closest"](":hidden").length},tabbable:function(a){var b=c.attr(a,"tabindex");return(isNaN(b)||b>=0)&&c(a).is(":focusable")}})}})(jQuery);
(function(b){var j=b.fn.remove;b.fn.remove=function(a,c){return this.each(function(){if(!c)if(!a||b.filter(a,[this]).length)b("*",this).add(this).each(function(){b(this).triggerHandler("remove")});return j.call(b(this),a,c)})};b.widget=function(a,c,d){var e=a.split(".")[0],f;a=a.split(".")[1];f=e+"-"+a;if(!d){d=c;c=b.Widget}b.expr[":"][f]=function(h){return!!b.data(h,a)};b[e]=b[e]||{};b[e][a]=function(h,g){arguments.length&&this._createWidget(h,g)};c=new c;c.options=b.extend({},c.options);b[e][a].prototype=
b.extend(true,c,{namespace:e,widgetName:a,widgetEventPrefix:b[e][a].prototype.widgetEventPrefix||a,widgetBaseClass:f},d);b.widget.bridge(a,b[e][a])};b.widget.bridge=function(a,c){b.fn[a]=function(d){var e=typeof d==="string",f=Array.prototype.slice.call(arguments,1),h=this;d=!e&&f.length?b.extend.apply(null,[true,d].concat(f)):d;if(e&&d.substring(0,1)==="_")return h;e?this.each(function(){var g=b.data(this,a),i=g&&b.isFunction(g[d])?g[d].apply(g,f):g;if(i!==g&&i!==undefined){h=i;return false}}):this.each(function(){var g=
b.data(this,a);if(g){d&&g.option(d);g._init()}else b.data(this,a,new c(d,this))});return h}};b.Widget=function(a,c){arguments.length&&this._createWidget(a,c)};b.Widget.prototype={widgetName:"widget",widgetEventPrefix:"",options:{disabled:false},_createWidget:function(a,c){this.element=b(c).data(this.widgetName,this);this.options=b.extend(true,{},this.options,b.metadata&&b.metadata.get(c)[this.widgetName],a);var d=this;this.element.bind("remove."+this.widgetName,function(){d.destroy()});this._create();
this._init()},_create:function(){},_init:function(){},destroy:function(){this.element.unbind("."+this.widgetName).removeData(this.widgetName);this.widget().unbind("."+this.widgetName).removeAttr("aria-disabled").removeClass(this.widgetBaseClass+"-disabled ui-state-disabled")},widget:function(){return this.element},option:function(a,c){var d=a,e=this;if(arguments.length===0)return b.extend({},e.options);if(typeof a==="string"){if(c===undefined)return this.options[a];d={};d[a]=c}b.each(d,function(f,
h){e._setOption(f,h)});return e},_setOption:function(a,c){this.options[a]=c;if(a==="disabled")this.widget()[c?"addClass":"removeClass"](this.widgetBaseClass+"-disabled ui-state-disabled").attr("aria-disabled",c);return this},enable:function(){return this._setOption("disabled",false)},disable:function(){return this._setOption("disabled",true)},_trigger:function(a,c,d){var e=this.options[a];c=b.Event(c);c.type=(a===this.widgetEventPrefix?a:this.widgetEventPrefix+a).toLowerCase();d=d||{};if(c.originalEvent){a=
b.event.props.length;for(var f;a;){f=b.event.props[--a];c[f]=c.originalEvent[f]}}this.element.trigger(c,d);return!(b.isFunction(e)&&e.call(this.element[0],c,d)===false||c.isDefaultPrevented())}}})(jQuery);
(function(c){c.widget("ui.mouse",{options:{cancel:":input,option",distance:1,delay:0},_mouseInit:function(){var a=this;this.element.bind("mousedown."+this.widgetName,function(b){return a._mouseDown(b)}).bind("click."+this.widgetName,function(b){if(a._preventClickEvent){a._preventClickEvent=false;b.stopImmediatePropagation();return false}});this.started=false},_mouseDestroy:function(){this.element.unbind("."+this.widgetName)},_mouseDown:function(a){a.originalEvent=a.originalEvent||{};if(!a.originalEvent.mouseHandled){this._mouseStarted&&
this._mouseUp(a);this._mouseDownEvent=a;var b=this,e=a.which==1,f=typeof this.options.cancel=="string"?c(a.target).parents().add(a.target).filter(this.options.cancel).length:false;if(!e||f||!this._mouseCapture(a))return true;this.mouseDelayMet=!this.options.delay;if(!this.mouseDelayMet)this._mouseDelayTimer=setTimeout(function(){b.mouseDelayMet=true},this.options.delay);if(this._mouseDistanceMet(a)&&this._mouseDelayMet(a)){this._mouseStarted=this._mouseStart(a)!==false;if(!this._mouseStarted){a.preventDefault();
return true}}this._mouseMoveDelegate=function(d){return b._mouseMove(d)};this._mouseUpDelegate=function(d){return b._mouseUp(d)};c(document).bind("mousemove."+this.widgetName,this._mouseMoveDelegate).bind("mouseup."+this.widgetName,this._mouseUpDelegate);c.browser.safari||a.preventDefault();return a.originalEvent.mouseHandled=true}},_mouseMove:function(a){if(c.browser.msie&&!a.button)return this._mouseUp(a);if(this._mouseStarted){this._mouseDrag(a);return a.preventDefault()}if(this._mouseDistanceMet(a)&&
this._mouseDelayMet(a))(this._mouseStarted=this._mouseStart(this._mouseDownEvent,a)!==false)?this._mouseDrag(a):this._mouseUp(a);return!this._mouseStarted},_mouseUp:function(a){c(document).unbind("mousemove."+this.widgetName,this._mouseMoveDelegate).unbind("mouseup."+this.widgetName,this._mouseUpDelegate);if(this._mouseStarted){this._mouseStarted=false;this._preventClickEvent=a.target==this._mouseDownEvent.target;this._mouseStop(a)}return false},_mouseDistanceMet:function(a){return Math.max(Math.abs(this._mouseDownEvent.pageX-
a.pageX),Math.abs(this._mouseDownEvent.pageY-a.pageY))>=this.options.distance},_mouseDelayMet:function(){return this.mouseDelayMet},_mouseStart:function(){},_mouseDrag:function(){},_mouseStop:function(){},_mouseCapture:function(){return true}})})(jQuery);
(function(d){d.widget("ui.slider",d.ui.mouse,{widgetEventPrefix:"slide",options:{animate:false,distance:0,max:100,min:0,orientation:"horizontal",range:false,step:1,value:0,values:null},_create:function(){var a=this,b=this.options;this._mouseSliding=this._keySliding=false;this._animateOff=true;this._handleIndex=null;this._detectOrientation();this._mouseInit();this.element.addClass("ui-slider ui-slider-"+this.orientation+" ui-widget ui-widget-content ui-corner-all");b.disabled&&this.element.addClass("ui-slider-disabled ui-disabled");
this.range=d([]);if(b.range){if(b.range===true){this.range=d("<div></div>");if(!b.values)b.values=[this._valueMin(),this._valueMin()];if(b.values.length&&b.values.length!==2)b.values=[b.values[0],b.values[0]]}else this.range=d("<div></div>");this.range.appendTo(this.element).addClass("ui-slider-range");if(b.range==="min"||b.range==="max")this.range.addClass("ui-slider-range-"+b.range);this.range.addClass("ui-widget-header")}d(".ui-slider-handle",this.element).length===0&&d("<a href='#'></a>").appendTo(this.element).addClass("ui-slider-handle");
if(b.values&&b.values.length)for(;d(".ui-slider-handle",this.element).length<b.values.length;)d("<a href='#'></a>").appendTo(this.element).addClass("ui-slider-handle");this.handles=d(".ui-slider-handle",this.element).addClass("ui-state-default ui-corner-all");this.handle=this.handles.eq(0);this.handles.add(this.range).filter("a").click(function(c){c.preventDefault()}).hover(function(){b.disabled||d(this).addClass("ui-state-hover")},function(){d(this).removeClass("ui-state-hover")}).focus(function(){if(b.disabled)d(this).blur();
else{d(".ui-slider .ui-state-focus").removeClass("ui-state-focus");d(this).addClass("ui-state-focus")}}).blur(function(){d(this).removeClass("ui-state-focus")});this.handles.each(function(c){d(this).data("index.ui-slider-handle",c)});this.handles.keydown(function(c){var e=true,f=d(this).data("index.ui-slider-handle"),g,h,i;if(!a.options.disabled){switch(c.keyCode){case d.ui.keyCode.HOME:case d.ui.keyCode.END:case d.ui.keyCode.PAGE_UP:case d.ui.keyCode.PAGE_DOWN:case d.ui.keyCode.UP:case d.ui.keyCode.RIGHT:case d.ui.keyCode.DOWN:case d.ui.keyCode.LEFT:e=
false;if(!a._keySliding){a._keySliding=true;d(this).addClass("ui-state-active");g=a._start(c,f);if(g===false)return}break}i=a.options.step;g=a.options.values&&a.options.values.length?(h=a.values(f)):(h=a.value());switch(c.keyCode){case d.ui.keyCode.HOME:h=a._valueMin();break;case d.ui.keyCode.END:h=a._valueMax();break;case d.ui.keyCode.PAGE_UP:h=a._trimAlignValue(g+(a._valueMax()-a._valueMin())/5);break;case d.ui.keyCode.PAGE_DOWN:h=a._trimAlignValue(g-(a._valueMax()-a._valueMin())/5);break;case d.ui.keyCode.UP:case d.ui.keyCode.RIGHT:if(g===
a._valueMax())return;h=a._trimAlignValue(g+i);break;case d.ui.keyCode.DOWN:case d.ui.keyCode.LEFT:if(g===a._valueMin())return;h=a._trimAlignValue(g-i);break}a._slide(c,f,h);return e}}).keyup(function(c){var e=d(this).data("index.ui-slider-handle");if(a._keySliding){a._keySliding=false;a._stop(c,e);a._change(c,e);d(this).removeClass("ui-state-active")}});this._refreshValue();this._animateOff=false},destroy:function(){this.handles.remove();this.range.remove();this.element.removeClass("ui-slider ui-slider-horizontal ui-slider-vertical ui-slider-disabled ui-widget ui-widget-content ui-corner-all").removeData("slider").unbind(".slider");
this._mouseDestroy();return this},_mouseCapture:function(a){var b=this.options,c,e,f,g,h,i;if(b.disabled)return false;this.elementSize={width:this.element.outerWidth(),height:this.element.outerHeight()};this.elementOffset=this.element.offset();c={x:a.pageX,y:a.pageY};e=this._normValueFromMouse(c);f=this._valueMax()-this._valueMin()+1;h=this;this.handles.each(function(j){var k=Math.abs(e-h.values(j));if(f>k){f=k;g=d(this);i=j}});if(b.range===true&&this.values(1)===b.min){i+=1;g=d(this.handles[i])}if(this._start(a,
i)===false)return false;this._mouseSliding=true;h._handleIndex=i;g.addClass("ui-state-active").focus();b=g.offset();this._clickOffset=!d(a.target).parents().andSelf().is(".ui-slider-handle")?{left:0,top:0}:{left:a.pageX-b.left-g.width()/2,top:a.pageY-b.top-g.height()/2-(parseInt(g.css("borderTopWidth"),10)||0)-(parseInt(g.css("borderBottomWidth"),10)||0)+(parseInt(g.css("marginTop"),10)||0)};e=this._normValueFromMouse(c);this._slide(a,i,e);return this._animateOff=true},_mouseStart:function(){return true},
_mouseDrag:function(a){var b=this._normValueFromMouse({x:a.pageX,y:a.pageY});this._slide(a,this._handleIndex,b);return false},_mouseStop:function(a){this.handles.removeClass("ui-state-active");this._mouseSliding=false;this._stop(a,this._handleIndex);this._change(a,this._handleIndex);this._clickOffset=this._handleIndex=null;return this._animateOff=false},_detectOrientation:function(){this.orientation=this.options.orientation==="vertical"?"vertical":"horizontal"},_normValueFromMouse:function(a){var b;
if(this.orientation==="horizontal"){b=this.elementSize.width;a=a.x-this.elementOffset.left-(this._clickOffset?this._clickOffset.left:0)}else{b=this.elementSize.height;a=a.y-this.elementOffset.top-(this._clickOffset?this._clickOffset.top:0)}b=a/b;if(b>1)b=1;if(b<0)b=0;if(this.orientation==="vertical")b=1-b;a=this._valueMax()-this._valueMin();return this._trimAlignValue(this._valueMin()+b*a)},_start:function(a,b){var c={handle:this.handles[b],value:this.value()};if(this.options.values&&this.options.values.length){c.value=
this.values(b);c.values=this.values()}return this._trigger("start",a,c)},_slide:function(a,b,c){var e;if(this.options.values&&this.options.values.length){e=this.values(b?0:1);if(this.options.values.length===2&&this.options.range===true&&(b===0&&c>e||b===1&&c<e))c=e;if(c!==this.values(b)){e=this.values();e[b]=c;a=this._trigger("slide",a,{handle:this.handles[b],value:c,values:e});this.values(b?0:1);a!==false&&this.values(b,c,true)}}else if(c!==this.value()){a=this._trigger("slide",a,{handle:this.handles[b],
value:c});a!==false&&this.value(c)}},_stop:function(a,b){var c={handle:this.handles[b],value:this.value()};if(this.options.values&&this.options.values.length){c.value=this.values(b);c.values=this.values()}this._trigger("stop",a,c)},_change:function(a,b){if(!this._keySliding&&!this._mouseSliding){var c={handle:this.handles[b],value:this.value()};if(this.options.values&&this.options.values.length){c.value=this.values(b);c.values=this.values()}this._trigger("change",a,c)}},value:function(a){if(arguments.length){this.options.value=
this._trimAlignValue(a);this._refreshValue();this._change(null,0)}return this._value()},values:function(a,b){var c,e,f;if(arguments.length>1){this.options.values[a]=this._trimAlignValue(b);this._refreshValue();this._change(null,a)}if(arguments.length)if(d.isArray(arguments[0])){c=this.options.values;e=arguments[0];for(f=0;f<c.length;f+=1){c[f]=this._trimAlignValue(e[f]);this._change(null,f)}this._refreshValue()}else return this.options.values&&this.options.values.length?this._values(a):this.value();
else return this._values()},_setOption:function(a,b){var c,e=0;if(d.isArray(this.options.values))e=this.options.values.length;d.Widget.prototype._setOption.apply(this,arguments);switch(a){case "disabled":if(b){this.handles.filter(".ui-state-focus").blur();this.handles.removeClass("ui-state-hover");this.handles.attr("disabled","disabled");this.element.addClass("ui-disabled")}else{this.handles.removeAttr("disabled");this.element.removeClass("ui-disabled")}break;case "orientation":this._detectOrientation();
this.element.removeClass("ui-slider-horizontal ui-slider-vertical").addClass("ui-slider-"+this.orientation);this._refreshValue();break;case "value":this._animateOff=true;this._refreshValue();this._change(null,0);this._animateOff=false;break;case "values":this._animateOff=true;this._refreshValue();for(c=0;c<e;c+=1)this._change(null,c);this._animateOff=false;break}},_value:function(){var a=this.options.value;return a=this._trimAlignValue(a)},_values:function(a){var b,c;if(arguments.length){b=this.options.values[a];
return b=this._trimAlignValue(b)}else{b=this.options.values.slice();for(c=0;c<b.length;c+=1)b[c]=this._trimAlignValue(b[c]);return b}},_trimAlignValue:function(a){if(a<this._valueMin())return this._valueMin();if(a>this._valueMax())return this._valueMax();var b=this.options.step>0?this.options.step:1,c=a%b;a=a-c;if(Math.abs(c)*2>=b)a+=c>0?b:-b;return parseFloat(a.toFixed(5))},_valueMin:function(){return this.options.min},_valueMax:function(){return this.options.max},_refreshValue:function(){var a=
this.options.range,b=this.options,c=this,e=!this._animateOff?b.animate:false,f,g={},h,i,j,k;if(this.options.values&&this.options.values.length)this.handles.each(function(l){f=(c.values(l)-c._valueMin())/(c._valueMax()-c._valueMin())*100;g[c.orientation==="horizontal"?"left":"bottom"]=f+"%";d(this).stop(1,1)[e?"animate":"css"](g,b.animate);if(c.options.range===true)if(c.orientation==="horizontal"){if(l===0)c.range.stop(1,1)[e?"animate":"css"]({left:f+"%"},b.animate);if(l===1)c.range[e?"animate":"css"]({width:f-
h+"%"},{queue:false,duration:b.animate})}else{if(l===0)c.range.stop(1,1)[e?"animate":"css"]({bottom:f+"%"},b.animate);if(l===1)c.range[e?"animate":"css"]({height:f-h+"%"},{queue:false,duration:b.animate})}h=f});else{i=this.value();j=this._valueMin();k=this._valueMax();f=k!==j?(i-j)/(k-j)*100:0;g[c.orientation==="horizontal"?"left":"bottom"]=f+"%";this.handle.stop(1,1)[e?"animate":"css"](g,b.animate);if(a==="min"&&this.orientation==="horizontal")this.range.stop(1,1)[e?"animate":"css"]({width:f+"%"},
b.animate);if(a==="max"&&this.orientation==="horizontal")this.range[e?"animate":"css"]({width:100-f+"%"},{queue:false,duration:b.animate});if(a==="min"&&this.orientation==="vertical")this.range.stop(1,1)[e?"animate":"css"]({height:f+"%"},b.animate);if(a==="max"&&this.orientation==="vertical")this.range[e?"animate":"css"]({height:100-f+"%"},{queue:false,duration:b.animate})}}});d.extend(d.ui.slider,{version:"1.8.2"})})(jQuery);
