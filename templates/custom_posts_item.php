<?php
	
	global $post;
	
	$url = "";
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
	if( is_array( $thumbnail ) ){
		$url = $thumbnail[0];
	}
	
	/* MAKE THE HTML MARKUP SIMILAR TO THE ONE IN REGIONAL PAGES, SO THAT IT CAN BE REUSED THERE ALSO */
	
?>
<a href='<?php the_permalink();?>'>
	<div class="imageWrapper" style='background-image: url("<?php echo $url;?>");'></div>
	<div class="hovercontent"><?php the_excerpt();?></div>
	<!-- Display Title and Name -->
	<div class="title"><?php the_title(); ?></div>
</a>
	