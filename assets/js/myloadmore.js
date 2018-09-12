jQuery(function($){
	var i = 0,
	leftHeight = 0,
	rightHeight = 0;

	$('.misha_loadmore').click(function(){

		var button = $(this),
		data = {
			'action': 'loadmore',
			'query': misha_loadmore_params.posts, // that's how we get params from wp_localize_script() function
			'page' : misha_loadmore_params.current_page
		};

		$.ajax({
			url : misha_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) {
					var arr = JSON.parse(data);

					$.map(arr, function(item, index) {
						$('.testimonials-reviews-list-col.left .testimonials-reviews-single').each(function(index, el) {
							leftHeight += $(this).height();
						});
						$('.testimonials-reviews-list-col.right .testimonials-reviews-single').each(function(index, el) {
							rightHeight += $(this).height();
						});;

						i++;
						if (i % 2 === 0 || (parseInt(leftHeight, 10) > parseInt(rightHeight, 10) + 300)) {
							$('.testimonials-reviews-list-col.right').append('<div class="testimonials-reviews-single">' +
								item['content'] +
								'</p><p class="testimonials-reviews-single-author">' + item['author'] +
								'</p></div>'
								);
						}
						else {
							$('.testimonials-reviews-list-col.left').append('<div class="testimonials-reviews-single">' +
								item['content'] +
								'</p><p class="testimonials-reviews-single-author">' + item['author'] +
								'</p></div>'
								);
						}
						rightHeight = 0;
						leftHeight = 0;
					});

					button.text( 'More posts' );//.prev().after(data); // insert new posts
					misha_loadmore_params.current_page++;

					if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page ) 
						button.remove(); // if last page, remove the button
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});
});