<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<?php 
if ( in_category('music') ) {
	get_template_part('single-music' );
} elseif ( in_category('cmpskin')) {
	get_template_part('single-cmpskin' );
} else {
	get_template_part('single-defa' );
}
?>
	
<?php get_footer(); ?>
