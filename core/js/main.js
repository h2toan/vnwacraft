$(document).ready(function(){
	$('.gallery').magnificPopup({
		type:'image',
		delegate: 'a',
		gallery:{
    	enabled:true,
		preload: [0,2], // read about this option in next Lazy-loading section
		navigateByImgClick: true,
		arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button
		tPrev: 'Previous (Left arrow key)', // title for left button
  		tNext: 'Next (Right arrow key)', // title for right button
  		tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
  		}
});
	$('.video-youtube, .video-youtube-side').magnificPopup({
		type: 'iframe',
		iframe: {
  		markup: '<div class="mfp-iframe-scaler">'+
            	'<div class="mfp-close"></div>'+
            	'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
          		'</div>', // HTML markup of popup, `mfp-close` will be replaced by the close button

  		patterns: {
			youtube: {
      		index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

      		id: 'v=', // String that splits URL in a two parts, second part should be %id%
				// Or null - full URL will be returned
				// Or a function that should return %id%, for example:
				// id: function(url) { return 'parsed id'; }

      		src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
			}
		}
		},
	});
});