  $(document).ready(function() {    

    $('input').blur(function(){
    		$('.contact-us').removeClass("focus");
    	})
             .focus(function() {		
    	         $('.contact-us').addClass("focus")
    	});
        

});
