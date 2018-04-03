$.fn.next_anchor = function(){
	return this.each(function(){
		
		var el = $(this);
		
		el.click( function( e ){
			e.preventDefault();
			
			var position = $(el.attr("href")).offset().top;

			$("body, html").animate({
				scrollTop: position
			}  );
		});
		
	});
}

$("document").ready(function() {
	
	$("[data-behaviour~=next-anchor]").next_anchor();
        
});