<div class='nested-filters akvo-sow-container'>
	<h1 class="backLined"><?php _e( $atts['title'] );?></h1>
	<?php if(  isset( $atts['primary_filter'] ) && $atts['primary_filter'] ):?>
	<nav data-behaviour='double-filters' data-target='#archive-results'>
		<?php $this->print_terms_list( $atts['primary_filter'], 'primary-filter', 'primary', $atts['label_all'] );?>
		<?php $this->print_terms_list( $atts['secondary_filter'], 'secondary-filter', 'secondary' );?>
	</nav>
	<?php endif;?>
	<div id='archive-results'>
	<?php 
		$filters = array( $atts['primary_filter'], $atts['secondary_filter'] );
		echo do_shortcode('[akvo_custom_posts filters="'.implode( ',', $filters ).'" post_type="'.$atts['post_type'].'" showposts="'.$atts['showposts'].'"]');
	?>
	</div>
</div>