<?php get_header(); ?>
<article>
	<div id="blog">
	
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category:</h2>
			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h2>Archive for <?php the_time('F jS, Y'); ?>:</h2>
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2>Archive for <?php the_time('F, Y'); ?>:</h2>
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2>Archive for <?php the_time('Y'); ?>:</h2>
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2>Author Archive</h2>
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2>Blog Archives</h2>
		<?php } ?>
	
		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		
		<div class="post">
				<div class="post-comments"><?php comments_popup_link('0', '1', '%'); ?></div> 
      		<div class="post-date"><div class="post-month"><?php the_time('M') ?></div> <div class="post-day"><?php the_time('d') ?></div></div>
			<div class="post-title">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php _e('Filed under&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?>
			</div>

			<div class="entry">
			<?php the_content(); ?>
			</div>

		</div>
		
<?php endwhile; ?>

	<div class="navigation">
		<?php posts_nav_link(); ?>
	</div>

<?php endif; ?>

</div>
</article>
<?php get_sidebar(); ?>	
<?php get_footer(); ?>