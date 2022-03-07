jQuery(document).ready(function() {
	jQuery(".designhubs_install_plugins").click(function(){  
		var $this = jQuery(this);
		var nonce = $this.attr('data-nonce');
		var demo_import_page = $this.attr('data-redirect');

		jQuery.ajax({
			type : "post",
			url : ajaxurl,
			data : {
				action: "designhubs_install_plugins", 
				nonce: nonce
			},
			beforeSend: function() {
				
				$this.css({
					'pointer-events' : 'none'
				}); // Disable button

				jQuery('.theme-info-wrapper .designhubs_dismiss').css({
					'pointer-events' : 'none'
				}); // Disable button

				$this.find('span').css({
					'padding-left' : '5px'
				}).text( 'Processing ... Please wait' );

				$this.find('.lodear_img').show();
				jQuery('.lodear_img').css({"width": "20px", "vertical-align": "middle"});
		    },
		    success: function() {
		     	window.location.href = demo_import_page;
		    }
		})
	});
	
});