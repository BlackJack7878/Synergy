jQuery(document).ready(function($) {
	$('.header .fa-bars').click(function(event) {
		if (!$(this).hasClass('open')) {
			$(this).addClass('open');
			$('.header-mob').css('display', 'block');
		}
		else {
			$(this).removeClass('open');
			$('.header-mob').css('display', 'none');
		}
	});
});
jQuery(document).ready(function($) {
	
	if (exists($('#main-review-slider'))) {
		var swiperNews = new Swiper('#main-review-slider', {
			speed: 400,
			slidesPerView: 1,
			pagination: '.main-slider-review-dots',
			paginationClickable: true
		});
	}

	$('.main-spend').waypoint(function(e, direction){
		$(this['element']).each(function(index, el) {
			$('.main-spend-line-circle').css('animation', 'SpendCircle 2s forwards');
			$('.main-spend-line-passed').css('animation', 'SpendLine 2s forwards');
		});
	}, {offset: '90%'});

});
jQuery(document).ready(function($) {
	
	if (exists($('#about-info-slider'))) {
		var swiperNews = new Swiper('#about-info-slider', {
			speed: 400,
			slidesPerView: 1,
			spaceBetween: 20,
			offsetBefore: 20,
			offsetAfter: 20,
			pagination: '.about-info-slider-dots',
			paginationClickable: true
		});
	}
	
});
jQuery(document).ready(function($) {
	
	if ($('#map').length) {
		$.getScript( 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDt1nWMlSHgj-_PosxbleoARGKOsalntFg', function( data, textStatus, jqxhr ) {
			MapSetup();
		});
	}

});
jQuery(document).ready(function($) {
	
	const num_separator = $.animateNumber.numberStepFactories.separator(',');

	$('.main-spend').waypoint(function(e, direction) {
		$(this['element']).each(function(index, el) {
			$('.main-spend-line-text span').each(function(index, el) {
				$(this).animateNumber({
					number: $(this).data("number"),
					numberStep: num_separator
				}, 1500);
			});
		});
	}, {offset: '90%'});

	$('.main-intro form input, .quote form .your-zip input').on('input', function(event) {
		if ($(this).val().length > 5) {
			$(this).val($(this).val().slice(0,5)); 
		}
	});

	$('.main-intro form').on('submit', function(event) {
		event.preventDefault();
		var zip = $(this).find('input').val();
		$('.quote form .your-zip input').val(zip);
	});

	$('.quote .fa-times').click(function(event) {
		$('.quote').css('display', 'none');
	});

	$('.header-col .en-button, .main-why .en-button, .main-intro form .en-button').click(function(event) {
		$('.quote').css('display', 'block');
	});

});

function MapSetup() {
	var map,
	map_location_main = {
		lat: 37.920634,
		lng: -121.685428
	},
	map_center = {
		lat: 37.920718,
		lng: -121.689776
	};

	if( jQuery(window).width() <= 768 ) {
		map_center = map_location_main;
	}

	map = new google.maps.Map(document.getElementById('map'), {
		center: map_center,
		scrollwheel: false,
		zoom: 17,
		minZoom: 2,
		maxZoom: 20,
		zoomControl: true,
		mapTypeControl: false,
		scaleControl: false,
		streetViewControl: false,
		rotateControl: false,
		fullscreenControl: false
	});

	var marker = new google.maps.Marker({
		position: map_location_main,
		map: map,
	});

	var center = map.getCenter();

	google.maps.event.addDomListener(window, 'resize', function() {
		map.setCenter(center);
	});

	if( jQuery('html').hasClass('touchevents') ) {
		map.setOptions({ 'draggable': false });
	}
}

function exists(el){
	if (el.length) {
		return true;
	}
	else {
		return false;
	}
}