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

$.fn.double_filters = function(){
	return this.each(function(){
		
		var $el 			= $( this ),
			$target 		= $( $el.data('target') ),
			secondary_tax 	= $el.find('[data-filter~=secondary]').first().data('tax'),
			html 			= $target.html();
		
		
		
		/* ACTIVE MENU ITEM */
		$el.active_menu_item = function( ev ){
			ev.preventDefault();																			/* PREVENT DEFAULT EVENT */
			var $menu_target = $( ev.target );																/* GET MENU ITEM */
			$el.find('[data-filter~=' + $menu_target.data('filter') + '].active').removeClass('active');	/* REMOVE PREVIOUS ACTIVE MENU ITEMS */
			$menu_target.addClass('active');																/* ACTIVATE MENU ITEM */			
			$el.filter_items();																				/* FILTER ITEMS */
			
		};
		/* ACTIVE MENU ITEM */
		
		/* FILTER SELECTOR TEXT */
		$el.filter_selector = function( filter_type ){
			$active_filter = $el.find('[data-filter~=' + filter_type + '].active');
			
			var tax 		= $active_filter.data('tax'),
				id 			= $active_filter.data('id'),
				selector 	= '';
			
			
			if( tax != undefined && id != undefined ){
				selector = "[data-" + tax + "~=" + id + "]";
			}
			
			return selector;
		}
		/* FILTER SELECTOR TEXT */
		
		/* FILTER ITEMS */
		$el.filter_items = function(){
			
			var $primary_filter 	= '',
				$secondary_filter 	= '';
			
			/* BUILD PRIMARY FILTER */
			if( $el.find('[data-filter~=primary].active').length ){ $primary_filter = $el.filter_selector('primary'); }
			
			/* BUILD SECONDARY FILTER */
			if( $el.find('[data-filter~=secondary].active').length ){ $secondary_filter = $el.filter_selector('secondary'); }
			
			$target.html( html );						/* reset html elements */
			
			
			/* unveil the images instantly */
			//$target.find('[data-behaviour~=unveil]').unveil( 0 );
			//$target.find('[data-behaviour~=unveil]').trigger("unveil");
			/* unveil the images instantly */
			
			/* console.log( $primary_filter ); console.log( $secondary_filter ); */
			
			
			if( $primary_filter || $secondary_filter ){
				
				/* REMOVE THE IRRELEVANT POSTS - ONLY WHEN EITHER THE FILTERS WERE NOT SELECTED */
				$target.find('[data-item]:not(' + $primary_filter + $secondary_filter + ")" ).remove();
			}
			
			/* 
			*	HIDE ALL THE SECONDARY FILTERS THAT ARE NOT AVAILABLE IN THE 
			* 	PRIMARY FILTERS SELECTION - ONLY TO BE ACTIVE WHEN THE PRIMARY FILTER
			*	IS SELECTED AND THE SECONDARY FILTER HAS NOT BEEN ENABLED.  
			*/
			
			if( ! $secondary_filter ){
			
				var secondary_tax_in_posts = [];
				
				$el.find('[data-filter~=secondary]').show();			/* SHOW THE ENTIRE SECONDARY FILTERS LIST */
				
				$target.find('[data-item]').each( function(){			/* ITERATE THROUGH POSTS THAT ARE SHOWN */
					
					var $item = $( this );
					
					var item_tax_str = $item.data( secondary_tax ); 
					
					if( item_tax_str ){
						
						item_tax_str = item_tax_str.toString();
						
						//console.log( item_tax_str );
						
						var item_tax_arr = item_tax_str.split(' ');
						
						$.each( item_tax_arr, function( i, item_tax ){
							if( $.inArray( parseInt( item_tax ), secondary_tax_in_posts ) === -1 ){
								secondary_tax_in_posts.push( parseInt( item_tax )  );		/* STORE UNIQUE SECONDARY FILTERS THAT ARE AVAILABLE IN THE POSTS */
							}
						});
					}
					
				});
				
				//console.log( secondary_tax_in_posts );
				
				$el.find('[data-filter~=secondary]').each( function(){	/* ITERATE THROUGH EACH SECONDARY FILTERS AND HIDE THE IRRELEVANT ONES */
					
					var $secondary_el 	= $( this );
					
					//console.log( $secondary_el.data( 'id' ) );
					
					if( $.inArray( $secondary_el.data( 'id' ), secondary_tax_in_posts ) === -1 ){
						$secondary_el.hide();
					}
					
					
					
				});
				
				
				//console.log( secondary_tax_in_posts );
			
			}
			
		};
		/* FILTER ITEMS */
		
		/* HANDLE CLICK EVENTS */
		$el.find('[data-filter~=primary]').click( function( ev ){
			$el.find('[data-filter~=secondary].active').removeClass('active');	/* RESET SECONDARY FILTER */
			$el.active_menu_item( ev );											/* ACTIVE MENU ITEM - PRIMARY */
		});
		$el.find('[data-filter~=secondary]').click( function( ev ){
			$el.active_menu_item( ev );											/* ACTIVE MENU ITEM - SECONDARY */
		});
		/* HANDLE CLICK EVENTS */
		
		// BY DEFAULT SELECT THE FIRST PRIMARY FILTER THAT IS AVAILABLE
		$el.find('[data-filter~=primary]').first().click();
		
	});
}

$("document").ready(function() {
	
	$("[data-behaviour~=next-anchor]").next_anchor();
    
	$('[data-behaviour~=double-filters]').double_filters();
    
});