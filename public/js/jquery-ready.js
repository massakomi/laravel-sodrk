$(document).ready(function(){
	$('.slider_main, .other_slider').slick({
        autoplay: true,
        infinite: true,
        autoplaySpeed: 5000,
        dots: true,
        arrows: true
    });

	/*$('#iview').iView({
		pauseTime: 4000,
		pauseOnHover: true,
		directionNav: false,
		directionNavHide: false,
		controlNav: true,
		controlNavNextPrev: false,
		controlNavThumbs: true,
		timer: "none",
		timerDiameter: 120,
		timerPadding: 3,
		timerStroke: 4,
		timerBarStroke: 0,
		timerColor: "#0F0",
		timerPosition: "bottom-right",
		timerX: 15,
		timerY: 60
	});

	
	$("#index_catalog_list .sub_catalog_list.level_2").each(function(){
		var li = $(this).parents(".sub_catalog_item.level_1");
		var li_0 = $(this).parents(".sub_catalog_item.level_0");
		li.addClass("sub_catalog_subhide").find("> span").after($("<span class=\"open_sub_list\"><b/></span>").click(function(){
			var li_2 = $(".sub_catalog_list.level_2", li);
			var pos = li_0.position();
			var s = li.data("open");
			var heights = [];
			$(".sub_catalog_item.level_0").each(function() {
				var p = $(this).position();
				if (pos.left == p.left && pos.top < p.top) {
					var n = p.top - li_2.outerHeight(true) * (s ? 1 : -1);
					$(this).css({top: n + "px"});
					p.top = n;
				}
				heights.push(p.top + $(this).outerHeight());
			});
			var max_height = 0;
			for(var h in heights) {
				if (heights[h] > max_height) {
					max_height = heights[h];
				}
			}
			$("#index_catalog_list").height(max_height);
			li.toggleClass("sub_catalog_subhide").data("open", !s);
		}));
	});
	$("#index_catalog_list").fluid_columns();
	*/

	// seo text
	var _sh = $('.seo_txt_wrap .wysiwyg').height();
	if(_sh<72){
		$('.btn_txt_show').hide();
	}
	$('.btn_txt_show span').click(function(){
		if(!$('.seo_txt_wrap').is('.vis')){
			$('.seo_txt_wrap').addClass('vis');
			$(this).addClass('open');
			$(this).find('b').text('Скрыть');
		} else {
			$('.seo_txt_wrap').removeClass('vis');
			$(this).removeClass('open');
			$(this).find('b').text('Подробнее');

		}
	});
    $('i.subaction').each(function (){
        $(this).after($('<a/>').attr({'href': $(this).data('h'), 'target': '_blank', 'class': 'sales'}).data('c', $(this).data('c')));
    });
	
	$('div.basket').on('focus.code', 'div.card :text', function () {
		$(this).parent().find(':radio').trigger('click');
	});

	$('.level_1 b').click(function(){
		$(this).next().slideToggle(300);
		$(this).parent().toggleClass('sub_catalog_subhide');
	});
	
	$(".unzip .open_all").click(function() {
		$("#index_catalog_list li.sub_catalog_subhide > .open_sub_list").trigger('click');
	});
	$(".unzip .close_all").click(function() {
		$("#index_catalog_list li:not(.sub_catalog_subhide) > .open_sub_list").trigger('click');
	});

	$('.product_credit__popup span').click(function(){
		$('.product_credit__content').fadeIn(300);
	})

	$('.product_credit__cross').click(function(){
		$('.product_credit__content').fadeOut(300);
	})
	
	$('div.price-slider').each(function () {
		var vs = $(this).data('values'),
			mm = $(this).data('mm'),
			inpts = $(this).parent().find('input:text'),
			step = ($(this).data('step') ? $(this).data('step') : 1);
		$(this).slider({
			range: true,
			min: mm[0],
			max: mm[1],
			values: [vs[0], vs[1]],
			step: step,
			slide: function( event, ui ) {
				inpts.eq(0).val(String(ui.values[0]).split( /(?=(?:\d{3})+$)/ ).join(' '));
				inpts.eq(1).val(String(ui.values[1]).split( /(?=(?:\d{3})+$)/ ).join(' '));
			}
		});
	});
	
	$('.checkbox input, .radio input').ezMark();

	$('.select select').css({'opacity': 0, 'position': 'absolute', 'top': '-10000px', 'right': '1000px'}).chosen({
		disable_search: true,
		width: '100%'
	});
	
	$('.tab_links a').click(function(e) {
		e.preventDefault();
		var click_id=$(this).attr('id');
		if (click_id != $('.tab_links a.active').attr('id') ) {
			$('.tab_links a').removeClass('active');
			$(this).addClass('active');
			$('.tab').removeClass('active');
			$('#con_' + click_id).addClass('active');
		}
	});

	$('.c3 a').click(function(e){
		e.preventDefault();
		var _t = $(this);
		var _v = _t.parents('.c_one').next();
		if(!_v.is(':visible')){
			$('.c_one_details').hide();
			$('.c3 a').html('Посмотреть');
			_t.html('Свернуть');
			_v.show();
		} else {
			$('.c_one_details').hide();
			_t.html('Посмотреть');
		}
	});
	
	if ($('div.contacts_all div.map-canvas').length) {
		var iw =[], ms = [];
		ymaps.ready(function () {
			$('div.contacts_all div.map-canvas').each(function () {
				if ($(this).data('x') && $(this).data('y')) {
					var m = $(this),
						//c = new google.maps.LatLng(m.data('x'), m.data('y')),
						/*map = new google.maps.Map(m[0], {
							zoom: m.data('zoom') ? m.data('zoom') : 16,
							center: c,
							mapTypeId: google.maps.MapTypeId.ROADMAP
						}),*/
						map = new ymaps.Map(m[0], {
							zoom: m.data('zoom') ? m.data('zoom') : 16,
							center: [m.data('x'), m.data('y')],
							controls: ['typeSelector', 'fullscreenControl', 'zoomControl']
						});
						map.behaviors.disable(['scrollZoom']);
						o = m;
					if ($('div.map div.m-opts').length) {
						o = $('div.map div.m-opts');
					}
					o.each(function (i) {
						var a = $(this);
						/*iw[i] = new google.maps.InfoWindow({
							content: a.data('c')
						});
						ms[i] = new google.maps.Marker({
							position: new google.maps.LatLng(a.data('x'), a.data('y')),
							map: map,
							icon: '/img/pointer.png'
						});*/
						map.geoObjects.add(new ymaps.Placemark([a.data('x'), a.data('y')], {
							balloonContentBody: a.data('c')
						}, {
							iconLayout: 'default#image',
							iconImageHref: '/img/pointer.png',
							iconImageSize: [51, 41],
							//iconImageOffset: [0, 0],
						}));
						/*if (a.data('c') != '') {
							google.maps.event.addListener(ms[i], 'click', function() {
								iw[i].open(map, ms[i]);
							});
						}*/
					});
				}
			});
		});
	}
	$('div.contacts_all a.lnk:not(.map)').click(function (e) {
		//e.preventDefault();
		var i = $('div.contacts_all a.lnk').index(this) + 1;
		$('#rec').show()[0].options[i].selected = true;
		$('#rec').trigger('chosen:updated');
	});
	$('div.map').on('click.lnk', 'a.lnk.map', function (e) {
		var j = $(this).data('i'), s = 0;
		$('#rec option').each(function (i) {
			if ($(this).val() == '1-' + j) {
				s = i;
				return false;
			}
		});
		$('#rec').show()[0].options[s].selected = true;
		$('#rec').trigger('chosen:updated');
	});
	$('div.select.change select').change(function () {
		var s = $(':selected', this);
		if (s.data('url')) {
			window.location.href = s.data('url');
		}
	});
	
	if ($('div.gallery_wrap div.gallery_one').length > 1) {
		var g_click = false;
		$('div.gallery div.ctrl > div').click(function () {
			if (g_click) {
				return ;
			}
			g_click = true;
			var c = $('div.gallery div.gallery_one.current'),
				n = c.next(),
				a = $('div.gallery div.ctrl > span'),
				m = a.text().match(new RegExp('(\\d+)(\\D+\\d+)', 'i'));
			if ($(this).is('.next')) {
				a.text((Number(m[1]) + 1) + m[2]);
				if (!n.length) {
					a.text('1' + m[2]);
					n = $('div.gallery div.gallery_one').first();
				}
			} else if ($(this).is('.prev')) {
				n = c.prev();
				a.text((Number(m[1]) - 1) + m[2]);
				if (!n.length) {
					a.text(m[2].replace(/\D+/, '') + m[2]);
					n = $('div.gallery div.gallery_one').last();
				}
			}
			n.addClass('current').hide().fadeIn();
			c.fadeOut(function () {
				$(this).removeClass('current');
				g_click = false;
			});
		})
	}
    $('.sitemap li i').on('click', function(){
        var i = $(this),
            ul = i.closest('li').find('ul');
        i.toggleClass('open');
        ul.slideToggle();
    });
	$('div.l_catalog:not(.list) > ul:not(.border-top) > li > a:not(.sub), ul.catalog > ul > li > a:not(.sub)').click(function (e) {
		e.preventDefault();
		var ul = $(this).next();
		if (!ul.length) {
			return ;
		}
		$(this).toggleClass('open');
		ul.slideToggle();
	});
	$('div.l_catalog p.lnk').click(function () {
		$(this).toggleClass('open').next('form,ul').slideToggle();
	});
	$('div.l_catalog li a.sub').click(function (e) {
		e.preventDefault();
		$(this).toggleClass('open').next('div').slideToggle();
	});
	$('div.l_catalog div.buttons :reset').click(function (e) {
		e.preventDefault();
		$(this).parents('form').append($('<input/>').attr('type', 'hidden').attr('name', 'reset').attr('value', true)).submit();
	});
	$('div.profile div.fields.edit div.btn_ok').click(function () {
		var b = $(this),
			p = b.parents('div.fields.edit'),
			i = p.find(':text');
		$(p.find('p.error').remove());
		if ($(this).is('.ed')) {
			i.removeData('tv').attr('disabled', true).removeClass('focus');
			if (!i.data('c') && (i.val() == '' || i.val() == i.data('tv'))) {
				b.removeClass('ed');
				return ;
			} else {
				if (b.data('d') && i.val() != '') {
					$('div.bg_overlay').fadeIn(function () {
						$('div.popup.discount').css({'top': Math.round(($(window).height() - $('div.popup.discount').height()) / 2) + $(document).scrollTop()}).fadeIn();
					});
				} else {
					$.post('/cabinet/bg/save', {'field': i.attr('name'), 'val': i.val()}, function (response) {
						if (response.e) {
							i.after($('<p/>').addClass('error').css({'display': 'block'}).text(response.e));
						}
						b.removeClass('ed');
					}, 'json');
				}
			}
		} else {
			if (!i.data('tv')) {
				i.data('tv', i.val());
			}
			b.addClass('ed');
			i.removeAttr('disabled').addClass('focus').select();
		}
	});
	$('body').on('click.popup-close', 'div.popup div.close, div.bg_overlay', function () {
		$('div.profile div.fields.edit div.btn_ok.ed').removeClass('ed');
		$('div.popup').fadeOut(function () {
			$(this).find(':text').val('');
			$('div.bg_overlay').fadeOut();
		});
	}).on('mouseenter', 'i.sales,a.sales', function () {
        var txt = 'Узнать подробности';
        if ($(this).data('c')) {
            txt = $(this).data('c');
        }
		$(this).before($('<div/>').addClass('sale-info').text(txt));
		if (!$(this).parent('a').length) {
			$(this).wrap($('<a/>').attr({'href': $(this).data('h'), 'target': '_blank'}));
		}
	}).on('mouseleave', 'i.sales,a.sales', function () {
		$('div.sale-info').remove();
	});
	$('div.popup.discount button').click(function (e) {
		e.preventDefault();
		var i = $('div.profile div.btn_ok.ed').prev(),
			n = $('div.popup.discount input:text').val();
		if (!i.length) {
			i = $('div.basket div.card :text:first');
		}
		i.parent().find('p.error').remove();
		if (!n) {
			return ;
		}
		$.post('/cabinet/bg/save', {'field': i.attr('name'), 'val': i.val(), 'n': n}, function (response) {
			if (response.r == 1 && i.attr('name') == 'card') {
				$.get('/order/cart', {}, function (html) {
					$('div.basket table').html($('div.basket table', html).html());
					$('div.basket div.card').html($('div.basket div.card', html).html());
					$('div.basket div.total.sec').html($('div.basket div.total.sec', html).html());
					$('div.basket > :not(div.order_head, div.ord_info)').find(':radio,:checkbox').ezMark();
				}, 'html');
			}
			if (response.e) {
				i.after($('<p/>').addClass('error').css({'display': 'block'}).text(response.e));
			}
			$('div.profile div.btn_ok.ed').removeClass('ed');
			$('div.popup div.close').trigger('click');
		}, 'json');
	});
	
	$('div.profile div.fields.edit input.btn_ok.activate').click(function (e) {
		var i = $(this);
		$('p.error').remove();
		$.post($(this).data('action'), {'_type': 'post', 'code': i.prev().val()}, function (response) {
			if (typeof(response) == 'object') {
				if (response.r == 0) {
					i.after('<p class="error" style="display: block;">Неверный код подтверждения!</p>');
				} else if (response.r == 1 && response.h != '') {
					window.location.href = response.h;
				}
			}
		}, 'json');
	});
	$('button.add-to-cart, input.add-to-cart, div.category .status_wrap a.add').click(function (e) {
		e.preventDefault();
		var b = $(this),
			tb = $('div.top_head li.t_b');
		if (b.data('src')) {
			$('div.bsk_info.choice').fadeOut(100);
			$.post(b.data('src'), {'_type': 'post'}, function (response) {
				if (typeof(response) == 'object' && response.r == 1) {
					if (b.is('input') || b.is('a.add')) {
						if (b.is('a.add')) {
							b.parents('li').eq(0).find('div.bsk_info.choice').fadeIn(100);
						} else {
							b.prev('div.bsk_info.choice').fadeIn(100);
						}
						//b.val(response.q + ' в корзине');
					} else {
						b.html(response.q + ' в корзине <i></i>');
						$('div.bsk_info.choice.item').fadeIn(100);
					}
					tb.html('<i></i><a href="' + tb.data('h') + '"><span class="count">' + response.c + '</span>' + response.t + '<b></b></a>');
				}
			}, 'json');
		}
	});
	$('div.catalog_item div.buttons, div.catalog_list3 div.buttons, div.category').on('click.close', 'div.bsk_info a.close_bsk_info, div.bsk_info div.close', function (e) {
		e.preventDefault();
		$('div.bsk_info.choice').fadeOut(100);
	});
	$('div.basket').on('click.cnt', 'div.cnt div', function () {
		var d = $(this),
			i = $(this).parent().children('input'),
			v = Number(i.val());
		if (d.is('.less')) {
			if (v > 1) {
				v --;
			}
		} else {
			v ++;
		}
		i.val(v);
	});
	$('div.basket').on('click.calc', 'a.btn_calc', function (e) {
		e.preventDefault();
		var t = $('div.basket div.card :text:first');
		//if ($('div.basket div.number :text').length && $('div.basket div.number :text').val() != '') {
		if ($('div.basket div.card :checked').val() == 0 && t.val() != '' && (!t.data('c') || t.data('c') != t.val())) {
			$('div.bg_overlay').fadeIn(function () {
				$('div.popup.discount').css({'top': Math.round(($(window).height() - $('div.popup.discount').height()) / 2) + $(document).scrollTop()}).fadeIn();
			});
		} else {
			$.post($(this).data('src'), $('div.basket table input:text, div.basket div.card input').serialize(), function (response) {
				if (typeof(response) == 'object' && response.r == 1) {
					var t = $('div.total span', response.html),
						tb = $('div.top_head li.t_b'),
						a = 0, b = 0;
					if (t.length) {
						a = t.eq(0).text();
						b = t.eq(1).text();
					}
					if ($('div.basket table', response.html).length) {
						/*$('div.basket table').html($('div.basket table', response.html).html());
						$('div.basket div.card').html($('div.basket div.card', response.html).html());
						$('div.basket div.total.sec').html($('div.basket div.total.sec', response.html).html());
						$('div.basket > :not(div.order_head, div.ord_info)').find(':radio,:checkbox').ezMark();
						$('div.basket div.select select').css({'opacity': 0, 'position': 'absolute', 'top': '-10000px', 'right': '1000px'}).chosen({
							disable_search: true,
							width: '100%'
						});*/
                        $('div.basket').html($('div.basket', response.html).html());
                        $('div.basket').find(':radio').ezMark().end().find('select').chosen({
                            disable_search: true,
							width: '100%'
                        });
					} else {
						$('div.basket').html($('div.basket', response.html).html());
					}
					tb.html('<i></i><a href="' + tb.data('h') + '"><span class="count">' + a + '</span>' + b + '<b></b></a>');
				}
			}, 'json');
		}
	}).on('click.removeCard', '#remove-card', function (e) {
		e.preventDefault();
		$.post($(this).data('href'), {}, function (response) {
			if (typeof(response) == 'object' && response.r == 1) {
				var t = $('div.total span', response.html),
					tb = $('div.top_head li.t_b');
				$('div.basket').html($('div.basket', response.html));
				$('div.basket div.checkbox input, .radio input').ezMark();
				$('div.basket div.select select').css({'opacity': 0, 'position': 'absolute', 'top': '-10000px', 'right': '1000px'}).chosen({
					disable_search: true,
					width: '100%'
				});
				tb.html('<a href="' + tb.data('h') + '"><span class="count">' + t.eq(0).text() + '</span>' + t.eq(1).text() + '<b></b></a>');
			}
		}, 'json');
	});
	$('div.basket').on('click.toggle', 'td div.add, td div.delete', function () {
		var d = $(this);
		$.post(d.data('href'), {'_type': 'post'}, function (response) {
			if (typeof(response) == 'object' && response.r == 1) {
				if (response.s) {
					d.removeClass('delete').addClass('add').parents('tr').addClass('deleted');
				} else {
					d.removeClass('add').addClass('delete').parents('tr').removeClass('deleted');
				}
			}
		}, 'json');
	}).on('click.acc-links', 'div.ord_links a', function (e) {
		e.preventDefault();
		var a = $(this),
			i = $('div.basket div.ord_links a').removeClass('cur').index(this);
		a.addClass('cur');
		$('div.basket div.ord_info').remove();
		$.get(a.attr('href'), {}, function (response) {
			$('div.basket div.ord_links').after($('div.ord_info', response));
			//$('div.basket').html($('div.basket', response.h).html());
			$('div.ord_info div.checkbox input, div.ord_info div.radio input').ezMark();
			$('div.ord_info div.select select').css({'opacity': 0, 'position': 'absolute', 'top': '-10000px', 'right': '1000px'}).chosen({
				disable_search: true,
				width: '100%'
			});
		}, 'html');
	}).on('submit.acc-sbmt', 'div.ord_info form', function (e) {
		var f = $(this),
			er = 0;
		if (f.data('action')) {
			$('div.p_inf.req input:visible,div.addr input:visible').each(function () {
				if ($(this).val() == '' || ($(this).attr('name') == 'email' && !/.+@.+\..+/i.test($(this).val()))) {
					er = 1;
					return false;
				}
			});
			if (!er) {
				yaCounter6742378.reachGoal('order');
			}
			return ;
		}
		e.preventDefault();
		$('div.ord_info p.error').remove();
		$.post(f.attr('action'), f.serialize(), function (response) {
			if (typeof(response) == 'object') {
				var ci = $('div.row_sec.captcha img');
				if (ci.length) {
					ci.attr('src', ci.attr('src').replace(/\?.+/, '') + '?r=' + Math.random());
				}
				if (response.r == 0) {
					if (response.e) {
						$('div.ord_info input').each(function () {
							var t = $(this);
							for (i in response.e) {
								if (t.attr('name') == i) {
									t.before($('<p/>').addClass('error').show().text(response.e[i]));
								}
							}
						});
					} else {
						$('div.ord_info input[type="password"]').after('<p class="error" style="display: block;">Неверный логин или пароль!</p>');
					}
				} else if (response.r == 1 && response.h != '') {
					$('div.basket').html($('div.basket', response.h).html());
					if (typeof(response.t) == 'string' && response.t != '') {
						$('div.top_head li:last').html(response.t);
					}
					$('div.basket div.checkbox input, .radio input').ezMark();

					$('div.basket div.select select').css({'opacity': 0, 'position': 'absolute', 'top': '-10000px', 'right': '1000px'}).chosen({
						disable_search: true,
						width: '100%'
					});
				}
			}
		}, 'json');
	}).on('click.activate', 'div.ord_info input.btn_ok.activate', function (e) {
		e.preventDefault();
		if ($(this).data('action')) {
			$.post($(this).data('action'), {'_type': 'post', 'code': $(this).prev().val(), 'c': 1}, function (response) {
				$('div.ord_info p.error').remove();
				if (typeof(response) == 'object') {
					if (response.r == 0) {
						$('div.ord_info input.btn_ok').after('<p class="error" style="display: block;">Неверный код подтверждения!</p>');
					} else if (response.r == 1 && response.h != '') {
						$('div.basket').html($('div.basket', response.h).html());
						$('div.basket div.checkbox input, div.basket div.radio input').ezMark();

						$('div.basket div.select select').css({'opacity': 0, 'position': 'absolute', 'top': '-10000px', 'right': '1000px'}).chosen({
							disable_search: true,
							width: '100%'
						});
					}
				}
			}, 'json');
		}
	}).on('change.delivery', 'div.delivery :radio', function () {
		
		var i = $('div.basket div.delivery :radio').index(this),
                    di = $('#d-price');
                if (i==2) {
                        $('div.pay div.radio:eq(0), div.pay div.radio.credit').hide();
                        $('div.pay div.radio:gt(0):not(.credit)').show();
                } else if (!i) {
                        $('div.pay div.radio:eq(0), div.pay div.radio:eq(1), div.pay div.radio.credit').show();
                        $('div.pay div.radio:eq(2)').hide();
                } else {
                        $('div.pay div.radio:eq(0), div.pay div.radio:eq(1)').show();
                        $('div.pay div.radio:gt(1)').hide();
                }
                if (i) {
                        $('div.row_sec.point').hide();
                        $('div.row_sec.addr').show();
                } else {
                        $('div.row_sec.point').show().find('select').trigger('change.point');
                        $('div.row_sec.addr').hide();
                }
		$('div.pay div.radio :radio').prop('checked', false);
		$('div.pay div.radio:visible:first :radio').trigger('click');
		$.post(di.data('action'), {'v': $(this).val()}, function (response) {
			if (typeof (response) == 'object') {
				$('#d-price span').text(response.p);
			}
		}, 'json');
	}).on('change.point', 'div.row_sec.point select', function () {
		var o = $(':selected', this);
		/*$('div.row_sec.point div.availability:visible').hide();
		$('div.row_sec.point div.availability.store-' + o.val()).show();*/
    /*##########
		if ($.inArray(Number(o.val()), $('div.pay').data('stores')) != -1) {
			$('div.pay div.radio:eq(1)').show();
		} else {
			$('div.pay div.radio:eq(1)').hide();
		}
    */
        if (!o.data('c')) {
            $('div.pay div.radio:visible:first :radio').attr('checked', true).trigger('click');
        }
	}).on('change.utype', 'div.utype :radio', function () {
		var s = $('div.row_sec.point div.select');
        if ($(this).val() == 1) {
            $('div.d_inf.pay').hide();
			$('div.row_sec.org').show();
			s.eq(0).hide().find('select').attr('name', '_point');
			s.eq(1).show().find('select').attr('name', 'point');
        } else {
            $('div.d_inf.pay').show();
			$('div.row_sec.org').hide();
			s.eq(0).show().find('select').attr('name', 'point');
			s.eq(1).hide().find('select').attr('name', '_point');
        }
    }).on('change.payment', 'div.pay :radio', function () {
        $('div.delivery div.radio:gt(0)').show();
        $(this).closest('div.pay').next().find('div.select:visible select option').prop('disabled', false).closest('select').trigger('chosen:updated');
        if ($(this).val() == 2) {
            $('div.row_sec.rec-f').show();
        } else if ($(this).val() == 4) {
            $('div.delivery div.radio:gt(0)').hide();
            $(this).closest('div.pay').next().find('div.select:visible select option').each(function () {
                if (!$(this).data('c')) {
                    $(this).prop('disabled', true);
                }
            }).not(':disabled').eq(0).prop('selected', true).closest('select').trigger('chosen:updated');
        } else {
            $('div.row_sec.rec-f').hide();
        }
    });
	$('div.item_ph div.thumb_one a').click(function (e) {
		e.preventDefault();
		var i = $('div.item_ph div.thumb_one a').index(this);
		if ($(this).is('.current')) {
			return ;
		}
		$('div.item_ph div.thumb_one.current').removeClass('current');
		$(this).parent().addClass('current');
		$('div.item_ph div.img_full a').hide().eq(i).show();
	});
	if ($('a.fancybox').length) {
		$('a.fancybox').fancybox({
			prevEffect: 'fade',
			nextEffect: 'fade',
			helpers: {
				thumbs: {
					width: 50,
					height: 50
				}
			}
		});
	}
	//##########################
	$('div.calc-block').on('click.count', 'div.total a.btn', function (e) {
		e.preventDefault();
		var f = $('div.calc-block form');
		$('#_inptsave').remove();
		$.post(f.attr('action'), f.serialize(), function (response) {
			$('div.calc-block').html($('div.calc-block', response).html());
			$('div.calc div.radio input, div.calc div.checkbox input').ezMark();
			$('div.calc div.select select').css({'opacity': 0, 'position': 'absolute', 'top': '-10000px', 'right': '1000px'}).chosen({
				disable_search: true,
				width: '100%'
			});
		}, 'html');
	}).on('change.count', 'div.check :checkbox', function () {
		var p = $('div.quantity p.price:last').data('v');
		if ($(this).is(':checked')) {
			$(this).parents('div.row_checkbox').children('p').html($(this).val() + '<i></i>');
		} else {
			$(this).parents('div.row_checkbox').children('p').html('0.00<i></i>');
		}
	}).on('click.print-form', 'div.row_sec.buttons a.btn.print', function (e) {
        e.preventDefault();
        window.print();
    }).on('click.view-send-form', 'div.row_sec.buttons a.btn.send', function (e) {
		e.preventDefault();
		$('#send-form').slideDown();
	}).on('submit', 'form', function (e) {
		e.preventDefault();
		//
		yaCounter6742378.reachGoal('calc');
		//
		var f = $('div.calc-block form');
		$('#_inptsave').remove();
		f.append($('<input/>').attr('type', 'hidden').attr('name', '_save').attr('id', '_inptsave').val(1));
		$.post(f.attr('action'), f.serialize(), function (response) {
			$('div.calc-block').html($('div.calc-block', response).html());
			$('div.calc div.radio input, div.calc div.checkbox input').ezMark();
			$('div.calc div.select select').css({'opacity': 0, 'position': 'absolute', 'top': '-10000px', 'right': '1000px'}).chosen({
				disable_search: true,
				width: '100%'
			});
		}, 'html');
	});
	$('#check-receipt').submit(function (e) {
		e.preventDefault();
		var c = $('#check-receipt img'),
			d = $('div.srv_r.form_fields');
		$('#check-receipt p.error, #check-receipt .success, #overlay-block, #overlay-img').remove();
		$('<div/>').attr('id', 'overlay-block').css({'position': 'absolute', 'background-color': '#fff', 'opacity': 0.7, 'top': d.offset().top, 'left': d.offset().left, 'width': d.outerWidth(), 'height': d.outerHeight(), 'z-index': 999}).appendTo('body');
		$('body').append($('<img/>').attr('src', '/img/ajax-loader.gif').attr('id', 'overlay-img').attr('alt', '').css({'position': 'absolute', 'z-index': 9999, 'top': d.offset().top + d.outerHeight() / 2- 16, 'left': d.offset().left + d.outerWidth() / 2 - 16}));
		$.post($(this).attr('action'), $(this).serialize(), function (response) {
			c.attr('src', c.attr('src').replace(/\?.+/, '') + '?r=' + Math.random());
			$('#overlay-block, #overlay-img').remove();
			if (typeof(response) == 'object') {
				if (response.e['num']) {
					$('#check-receipt input.num').after($('<p/>').addClass('error').show().text(response.e['num']));
				}
				if (response.e['captcha']) {
					$('#check-receipt input.captcha').after($('<p/>').addClass('error').show().text(response.e['captcha']));
				}
				if (response.r == 1) {
					//$('#check-receipt').after($('<p/>').addClass('success').text('Результат проверки: ' + response.s));
					$('#check-receipt').append('<div class="row_sec success"><div class="txt">Результат проверки:</div><div class="fields" style="padding-top: 6px">'+response.s+'</div>');
				}
			}
		}, 'json');
	});
	if ($('#calc-options').length) {
		
		/*$.getScript($('#calc-options').data('src'), function () {
			var c = $('#calc-options'),
				q = $('div.row_sec.comp_count .quantity :text'),
				p1 = $('div.row_sec.comp_count p.price');
			for (i in s) {
				c.append($('<div/>').addClass('row_checkbox').append($('<div/>').addClass('checkbox').append($('<input/>').attr('type', 'checkbox').attr('id', i).attr('name', i)).append($('<label/>').attr('for', i).text(s[i].t))).append($('<p/>').addClass('price').addClass('pull-right').text('0.00').append($('<i/>'))).append($('<div/>').addClass('clear')));
			}
			$('div.checkbox input', c).ezMark();
			$('div.row_sec.comp_count :text').blur(function () {
				var v = $('div.radio :radio:checked').val();
				if (isNaN(q.val()) || q.val() <= 0) {
					q.val(1);
				}
				p1.eq(0).html('x ' + k.tariffs[v] + '<i></i>');
				p1.eq(1).html(Math.round(k.tariffs[v] * q.val()));
			});
			$('div.radio :radio').change(function () {
				var v = $(this).val();
				p1.eq(0).html('x ' + k.tariffs[v] + '<i></i>');
				p1.eq(1).html(Math.round(k.tariffs[v] * q.val()));
			});
		});*/
	}
	$('.category a .icon_wrap i, .icon_wrap div, .catalog_list3 .icon div').hover(function(){
		$(this).parents('li').css({'z-index':'1'});
		$(this).find('span').show();
	}, function(){
		$(this).find('span').hide();
		$(this).parents('li').css({'z-index':'0'});
	});
	
	//new popup
	$('.open_p').click(function(s){
        var d = $(".popup.form"),
			t,
			s = $(this);
		$.get(s.data('h'), {}, function (r) {
			d.html(r);
			t = Math.round(($(window).height() - d.outerHeight()) / 2);
			if (t < 25) { t = 25; };
			if (d.length) {
				d.add('.bg_overlay').fadeIn(300);
				d.css({'top': $(document).scrollTop() + t}).fadeIn(300);
			}
		}, 'html');
    });
	$('div.popup.form').on('submit.request', 'form', function (e) {
		e.preventDefault();
		var f = $(this);
		$.post(f.attr('action'), f.serialize(), function (r) {
			$('div.popup.form').html(r);
		}, 'html');
	});
    $('#dc-order-btn').click(function (e) {
        e.preventDefault();
        var a = new Array(),
            b = $('#dc-order');
        $('#dc-order div').each(function () {
            a[a.length] = {id: String($(this).data('id')), price: String($(this).data('p')), type: $(this).data('c'), count: $(this).data('q'), name: $(this).data('n')};
        });
        DCLoans(partnerID, 'delProduct', false, function(result){
            if (result.status == true) {
                DCLoans(partnerID, 'addProduct', { products : a }, function(result){
                    console.log(result);
                    if (result.status == true) {
                        DCLoans(partnerID, 'saveOrder', { order : String(b.data('order')), phone: String(b.data('phone')), promo: '0010', codeTT: 'proxy_' + partnerID }, function(result){
                            console.log(result);
                        }, debug);
                    }
                }, debug);
            }
        }, debug);
    });
    if ($('#dc-order').length) {
        $('#dc-order').each(function () {
            var a = new Array(),
                b = $(this);
            $('#dc-order div').each(function () {
                a[a.length] = {id: String($(this).data('id')), price: String($(this).data('p')), type: $(this).data('c'), count: $(this).data('q'), name: $(this).data('n')};
            });
            DCLoans(partnerID, 'delProduct', false, function(result){
                if (result.status == true) {
                    DCLoans(partnerID, 'addProduct', { products : a }, function(result){
                        console.log(result);
                        if (result.status == true) {
                            DCLoans(partnerID, 'saveOrder', { order : String(b.data('order')), phone: String(b.data('phone')), promo: '0010', codeTT: 'proxy_' + partnerID }, function(result){
                                console.log(result);
                            }, debug);
                        }
                    }, debug);
                }
            }, debug);
        });
    }
});
            
    function DCCheckStatus(result) {
        var o = $('#dc-order');
        console.log(result);
        $.post(o.data('src'), {order: o.data('order'), result: result}, function (r) {
            $('div.done-block').html(r);
            $('#dc-order').remove();
        }, 'html');
    }