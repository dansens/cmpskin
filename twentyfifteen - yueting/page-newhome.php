<?php

get_header(); ?>

<section class="de-con">
			<h2 class="new">更新</h2>
			<div class="sh-a">
			<ul class="flex wrap justify vlist">
			
   
    <?php
		query_posts("showposts=8&orderby=date");
			// Start the loop.
			while ( have_posts() ) : the_post();
				get_template_part( 'content-index-2', get_post_format() );
			endwhile;
			// 重置query
			wp_reset_query();
			?>
			
			</ul>
		</div>
			<div class="flex justify wrap">
				<div class="zhuce vbox shadow"><a href=""><span><i class="icon-group_add"></i>注册 / 登陆悦听有声</span></a>
免费收听本站电台内容,登录给我们提出你的建议和意见.</div>
				<div class="buy vbox shadow"><a href=""><span><i class="icon-dashboard"></i>本站主题</span>
[本主题唯一出售站点]复制一个漂亮的音乐分享网站.</a></div>
			</div>
			<h2 class="new m10">音乐</h2>
			<ul class="flex wrap justify vlist">
				
    <?php
		query_posts("cat=5&showposts=10&orderby=date&order=DESC");
			// Start the loop.
			while ( have_posts() ) : the_post();
				get_template_part( 'content-index-2', get_post_format() );
			endwhile;
			// 重置query
			wp_reset_query();
			?>
			</ul>
			<section class="flex justify m10">
				<div class="remen">
					<h2 class="remh2 m10">热门音乐
					<ul class="flex wrap justify vlist">
						<?php
		query_posts("cat=5&showposts=12&orderby=date&orderby=comment_count");
			// Start the loop.
			while ( have_posts() ) : the_post();
				get_template_part( 'content-index-3', get_post_format() );
			endwhile;
			// 重置query
			wp_reset_query();
			?>
					</ul>
				</div>
				<div class="remen anchor">
					<h2 class="remh2 m10">人气皮肤</h2>
					<ul class="flex wrap justify vlist">
						<li><img src="<?php bloginfo('template_url');?>/images/1.jpg" />玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/2.jpg" />玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/3.jpg" />玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/4.jpg" />玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/5.jpg" />玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/6.jpg" />玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/7.jpg" />玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/8.jpg" />玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/9.jpg" />玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/10.jpg" />玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/11.jpg" />玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/12.jpg" />玫瑰</li>
					</ul>
				</div>
				<div class="remen">
					<h2 class="remh2 m10">最新节目
						<span class="remh2span">Recent Content</span>
					</h2>
					<ul class="vbox2 ">
						<li><img src="<?php bloginfo('template_url');?>/images/5.jpg" /><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/6.jpg" /><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
					</ul>
					<h2 class="remh2 m10">流行专辑</h2>
					<ul class="vbox2">
						<li><img src="<?php bloginfo('template_url');?>/images/5.jpg" /><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/6.jpg" /><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/7.jpg" /><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
					</ul>
				</div>
			</section>
			<h2 class="remh2 m10">Popular Radio</h2>
			<ul class="flex wrap justify vlist">
				<li>
					<div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/1.jpg"/></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
				<li><div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/2.jpg" /></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
				<li><div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/3.jpg" /></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
				<li><div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/4.jpg" /></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
				<li><div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/5.jpg" /></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
				<li><div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/6.jpg" /></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
				<li><div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/7.jpg" /></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
				<li><div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/8.jpg" /></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
				<li><div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/17.jpg" /></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
				<li><div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/18.jpg" /></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
				<li><div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/19.jpg" /></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
				<li><div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/15.jpg" /></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
			</ul>
		</section>
		<section class="de-con2">
		
			<div class="remh2 m10">优秀电台</div>
			<ul class="flex wrap justify">
				<li>
					<div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/1.jpg"/></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
				<li><div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/2.jpg" /></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
				<li><div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/3.jpg" /></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
				<li><div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/4.jpg" /></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
				<li><div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/5.jpg" /></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
				<li><div class="maskimg">
						<i class="icon-play_circle_outline mask"></i><img src="<?php bloginfo('template_url');?>/images/6.jpg" /></div><a href="" >玫瑰花的夏天</a>主播：玫瑰</li>
			</ul>
			<div class="anchor paihang">
					<h2 class="remh2 m10">主播排行</h2>
					<ul class="flex wrap justify vlist">
						<li><img src="<?php bloginfo('template_url');?>/images/1.jpg" />玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/2.jpg" />玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/3.jpg" />玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/4.jpg" />玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/5.jpg" />玫瑰</li>
						<li><img src="<?php bloginfo('template_url');?>/images/6.jpg" />玫瑰</li>
					</ul>
				</div>
		
		</section>
<?php get_footer(); ?>