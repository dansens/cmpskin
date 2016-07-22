<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="maskimg"> 
		<i class="icon-play_circle_outline mask" skin="<?php echo get_post_meta($post->ID, 'skin', true);?>"></i>
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?> 
	
	</div>
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' );
			endif;
		?>
		<span class="aut"><?php the_author();?></span>
<!-- .entry-header -->
</li><!-- #post-## -->
