<?php
	_e('<ul class="post-list floats-in '.$atts['post_type'].'">');
	
	$the_query = new WP_Query( array( 'post_type' => $atts['post_type'], 'showposts' => $atts['showposts'], ) );
	
	if( $the_query->have_posts() ):
		
		/* CONVERT THE COMMA SEPERATED LIST INTO ARRAY */
		$filters = explode(',', $atts['filters'] );
		
		while( $the_query->have_posts() ) : $the_query->the_post();
			
			$data_str = "data-item='1'";
			
			if( count( $filters ) ){
				$terms = $this->get_the_terms( $filters, get_the_ID() );
				
				foreach( $terms as $slug => $ids ){
					$data_str .= " data-".$slug."='".implode( ' ', $ids )."'";			/* ACCUMULATING DATA STRING FROM TERMS */
				}
			}
			
			$post_class	= '';
			$post_class = apply_filters( 'custom_posts_'.$atts['post_type'].'_class', $post_class );
					
			_e( '<li class="'.$post_class.' post" id="post-'.get_the_ID().'" '.$data_str.'>' );
			
			$template_file = apply_filters( 'akvo-custom-posts-'.$atts['post_type'].'-item-template', $atts['post_type'] );
			
			if( !file_exists( $template_file ) ){
				$template_file = "custom_posts_item.php";
			}

			include( $template_file );
			
			_e('</li>');
					
		endwhile;
	endif;	
	wp_reset_query();
	_e('</ul>');