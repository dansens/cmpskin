<?php

get_header(); ?>

<section class="de-con">
			<h2 class="new">皮肤</h2>
			<div class="sh-a">
			<ul class="flex wrap justify vlist">
			
   
   <?php
		query_posts("category_name=cmpskin&showposts=10&orderby=date");
			// Start the loop.
			while ( have_posts() ) : the_post();
			  $attachments = get_attached_media( '', $post->ID );  
				get_template_part( 'content-cmpskin', get_post_format() );
			endwhile;
			// 重置query
			wp_reset_query();
			?>
			</ul>
		</div>
			
			<h2 class="new m10">音乐</h2>
			<ul class="flex wrap justify vlist">
				
    <?php
		query_posts("category_name=music&showposts=10&orderby=date");
			// Start the loop.
			while ( have_posts() ) : the_post();
				get_template_part( 'content-music', get_post_format() );
			endwhile;
			// 重置query
			wp_reset_query();
			?>
			</ul>
			<section class="flex justify m10">
				<div class="hotmusic">
					<h2 class="remh2 m10">热门音乐</h2>
					<ul class="flex wrap justify">
						<?php
		query_posts("category_name=music&showposts=12&orderby=comment_count");
			// Start the loop.
			while ( have_posts() ) : the_post();
				get_template_part( 'content-index-3', get_post_format() );
			endwhile;
			// 重置query
			wp_reset_query();
			?>
					</ul>
				</div>
				<div class="hotmusic anchor">
					<h2 class="remh2 m10">人气皮肤</h2>
					<ul class="flex wrap justify">
						<?php
								query_posts("category_name=cmpskin&showposts=12&orderby=comment_count");
									// Start the loop.
									while ( have_posts() ) : the_post();
										get_template_part( 'content-index-3', get_post_format() );
									endwhile;
									// 重置query
									wp_reset_query();
							?>
					</ul>
				</div>
				<div class="hotmusic">
					<h2 class="remh2 m10">最新节目
						<span class="remh2span">Recent Content</span>
					</h2>
					<ul class="vbox2 ">
						<?php
								query_posts("showposts=2&orderby=date");
									// Start the loop.
									while ( have_posts() ) : the_post();
										get_template_part( 'content-index-3', get_post_format() );
									endwhile;
									// 重置query
									wp_reset_query();
							?>
					</ul>
					<h2 class="remh2 m10">流行专辑</h2>
					<ul class="vbox2">
						<?php
								query_posts("category_name=music&showposts=3&orderby=comment_count");
									// Start the loop.
									while ( have_posts() ) : the_post();
										get_template_part( 'content-index-3', get_post_format() );
									endwhile;
									// 重置query
									wp_reset_query();
							?>
					</ul>
				</div>
			</section>
			
		</section>
		<section class="de-con2">
		
			<div class="remh2 m10">本站推荐</div>
			<ul class="flex justify wrap">
			<?php
		$args = array(
	'posts_per_page' => -1,
	'post__in'  => get_option( 'sticky_posts' ),
	'showposts' => 4
);
	$sticky_posts = new WP_Query( $args ); 
			// Start the loop.
			while ( $sticky_posts->have_posts() ) : $sticky_posts->the_post();
				get_template_part( 'content-index-2', get_post_format() );
			endwhile;
			// 重置query
			wp_reset_query();
			?>
			</ul>
			<div class="anchor paihang">
					<h2 class="remh2 m10">主播排行</h2>
					<ul class="flex wrap justify">
						<?php
		$args = array(
	'tag' => gufeng,
	'showposts' => 4
);
	$sticky_posts = new WP_Query( $args ); 
			// Start the loop.
			while ( $sticky_posts->have_posts() ) : $sticky_posts->the_post();
				get_template_part( 'content-index-2', get_post_format() );
			endwhile;
			// 重置query
			wp_reset_query();
			?>
					</ul>
				</div>
		
		</section>
				<div class="loading">正在加载CMP,请稍候...</div>
<div id="cmplayer" class="flex around">
	<div class="cmp-mask"></div>
	<div class="flex cmpskin">
		<div class="bt_close"><i class="icon-close"></i></div>
		<span class="icon-navigate_before prevskin"></span>
		<span class="icon-navigate_next nextskin"></span>
		<span class="skintips"></span>
		<div id="player"></div>
		<div class="skininfo">
		<div class="skintitle entry-title">title</div>
		<ul class="info-area">
			<li><b>名称</b><span class="name">loading...</span></li>
			<li><b>版本</b><span class="version">loading...</span></li>
			<li><b>作者</b><span class="author">loading...</span></li>
			<li><b>邮箱</b><span class="email">loading...</span></li>
			<li><b>主页</b><span class="url">loading...</span></li>
			<li><b>说明</b><span class="readme">loading...</span></li>
		</ul>
		<!--<div id="comment">评论加载中...</div>-->
		<div class="bt_download"><a href="">下载皮肤</a></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>