<?php get_header(); ?>

<div class="container no_padding">
    <div class="col-md-12">
<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
<div class="articles">
	
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
</div>

<?php endwhile; ?>
<?php endif; ?>
        <div class="pagination">
<?php previous_post_link('<span>&laquo;</span> %link'); next_post_link('%link <span>&raquo;</span>'); ?>
        </div> 

		<?php comments_template(); ?>
		
        </div>
        
    </div>
<?php get_footer(); ?>