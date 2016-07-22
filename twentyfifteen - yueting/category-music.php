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
			<h2 class="new">音乐</h2>
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
				get_template_part( 'content-music', get_post_format() );
			endwhile;
			// 重置query
			wp_reset_query();

			?>
			</ul>
		</section>
		<section class="de-con3 order1">
			<ul class="v-style">
			<li class="showall">全部<span><?php echo wt_get_category_count('music'); ?></span></li>
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
<?php get_footer(); ?>
