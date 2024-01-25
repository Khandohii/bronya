$(function(){
	// Проверка браузера
	if ( !supportsCssVars() ) {
		$('body').addClass('lock')
		$('.supports_error').addClass('show')
	}


	// Ленивая загрузка
	setTimeout(function(){
		observer = lozad('.lozad', {
			rootMargin: '200px 0px',
			threshold: 0,
			loaded: function(el) {
				el.classList.add('loaded')
			}
		})

		observer.observe()
	}, 200)


	// Установка ширины стандартного скроллбара
	$(':root').css('--scroll_width', widthScroll() +'px')


	// Всплывающие окна
	$('.modal_link').click(function(e){
		e.preventDefault()

		$.fancybox.close()

		$.fancybox.open({
			src  : $(this).data('content'),
			type : 'inline',
			opts : {
				touch : false,
				speed : 300,
				backFocus : false,
				trapFocus : false,
				autoFocus : false,
				mobile : {
				    clickSlide: "close"
				}
			}
		})
	})


	// Моб. меню
	$('body').on('click', '.mob_menu_link', function(e) {
    	e.preventDefault()

		if( $(this).hasClass('active') ) {
			$(this).removeClass('active')

			$('body').removeClass('lock')
			$('header').removeClass('visible_menu')
			$('header .wrap_menu').removeClass('visible')
		} else {
			$(this).addClass('active')

			$('body').addClass('lock')
			$('header').addClass('visible_menu')
			$('header .wrap_menu').addClass('visible')
		}
    })


	// Маска ввода
	$('input[type=tel]').inputmask('+38 (999) 99-99-999');


    // Плавная прокрутка к якорю
	$('body').on('click', '.scroll_link', function(e) {
		e.preventDefault()

		let href = $(this).data('anchor')

		let dataOffset = 0

		if ($(this).data('offset')) {
			dataOffset = $(this).data('offset')
		}

		let marginAnchor = parseInt($(href).css('margin-top'));
		if ($(this).hasClass('marg')) {
			marginAnchor = parseInt($(href).css('margin-top')) / 2;
		} else{
			marginAnchor = 0;
		}

		let headerHeight = 0;
		if ( $(window).width() < 1024 ) {
			headerHeight = $('header').outerHeight();
		}

		$('html, body').stop().animate({
		   	scrollTop: $(href).offset().top - marginAnchor - dataOffset - headerHeight
		}, 1000)


		if ( $(window).width() < 1024 ) {
			$('.mob_menu_link').removeClass('active')

			$('body').removeClass('lock')
			$('header').removeClass('visible_menu')
			$('header .wrap_menu').removeClass('visible')
		}
	})

	// Close PopUp
	$('body').on('click', '.success_wrap [data-modal-close], .close_bg', function(e) {
		e.preventDefault()

        $('.success_wrap').removeClass('visible');
        $('.overlay').fadeOut(300);

        setTimeout(function() {
        	$('body').removeClass('lock');
        }, 300)
	})
})


$(window).load(function(){
	setTimeout(function() {
		// Увеличение картинки
		$('.fancy_img').fancybox({
			loop : true,
			mobile : {
			    clickSlide: "close"
			}
		})

		// Увеличение картинки
		$('.swiper-slide:not(.swiper-slide-duplicate) .fancy_slider').fancybox({
			backFocus : false,
			mobile : {
			    clickSlide: "close"
			}
		})

	}, 300)
})


// Вспомогательные функции
function widthScroll() {
    let div = document.createElement('div')
    div.style.overflowY = 'scroll'
    div.style.width = '50px'
    div.style.height = '50px'
    div.style.visibility = 'hidden'
    document.body.appendChild(div)

    let scrollWidth = div.offsetWidth - div.clientWidth
    document.body.removeChild(div)

    return scrollWidth
}


var supportsCssVars = function() {
    var s = document.createElement('style'),
        support

    s.innerHTML = ":root { --tmp-var: bold; }"
    document.head.appendChild(s)
    support = !!(window.CSS && window.CSS.supports && window.CSS.supports('font-weight', 'var(--tmp-var)'))
    s.parentNode.removeChild(s)

    return support
}


function setHeight(className){
    let maxheight = 0

    className.each(function() {
    	let elHeight = $(this).outerHeight()

        if( elHeight > maxheight ) {
        	maxheight = elHeight
        }
    })

    className.outerHeight( maxheight )
}