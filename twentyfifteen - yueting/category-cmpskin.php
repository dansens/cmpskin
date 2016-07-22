<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

		<section class="de-con order2 ">
			<h2 class="new">皮肤</h2>
			<ul class="flex wrap vlist fs4">
			
		<?php
			$args = array(
		// query_posts参数，具体参数可以参加官方文档
			
			'showposts' =>1000,
			'orderby'=> date,
			
);

		// 下面这一行代码是必须的，不然不能分页
		$arms = array_merge($args, $wp_query->query);
		query_posts($arms);
		
			// Start the loop.
			while ( have_posts() ) : the_post();
				get_template_part( 'content-cmpskin', get_post_format() );
			endwhile;
			// 重置query
			wp_reset_query();

			?>
			</ul>
		</section>
		<section class="de-con3 order1">
			<ul class="v-style">
			<li class="showall">全部<span><?php echo wt_get_category_count('cmpskin'); ?></span></li>
<?php
    $cat= single_cat_title('', false);
    $args = array( 'categories' => get_cat_ID($cat));
    $tags = get_category_tags($args);
    $content .= "";
    if(!empty($tags)) {
        foreach ($tags as $tag) {
            $content .= "<li class=\"".$tag->slug."\">".$tag->name."<span>".$tag->count."</span></li>";
        }
    }
   
    echo $content;
?>

			
			</ul>
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
