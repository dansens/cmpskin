<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<section class="de-con4">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			get_template_part( 'content-music-single', get_post_format() );

		endwhile;
		?>
</section>
<section class="de-con3">

			<?php get_sidebar();?>
	</section>
		

<?php get_footer(); ?>
