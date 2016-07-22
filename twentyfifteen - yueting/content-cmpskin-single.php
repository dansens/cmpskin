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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		//twentyfifteen_post_thumbnail();
	?>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title"><i class="icon-graphic_eq"skin="'.get_post_meta($post->ID, 'skin', true).'"></i>', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
		
	</header><!-- .entry-header -->
	<footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		
	</footer><!-- .entry-footer -->
	<div id="player"></div>
	<div class="skininfo flex around">
		<ul class="info-area">
			<li><b>名称</b><span class="name">loading...</span></li>
			<li><b>版本</b><span class="version">loading...</span></li>
			<li><b>作者</b><span class="author">loading...</span></li>
			<li><b>邮箱</b><span class="email">loading...</span></li>
			<li><b>主页</b><span class="url">loading...</span></li>
			<li><b>说明</b><span class="readme">loading...</span></li>
		</ul>
		<div class="bt_download"><a href="">下载皮肤</a></div>
		</div>
	<div class="entry-content">
		<?php
			
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'twentyfifteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
			
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	

</article><!-- #post-## -->
