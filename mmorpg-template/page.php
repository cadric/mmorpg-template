<?php get_header(); ?>
    <article>
	<div id="blog">
		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		
		<div class="post">
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