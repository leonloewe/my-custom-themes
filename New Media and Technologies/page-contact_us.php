<?php 

/* Template name:Contact us */

 get_header(); ?>


<div class="container no_padding">
    <div class="blu_line"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 contact">
<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>

		<div class="title">
			
			<?php the_content(); ?>
		</div>
<?php endwhile; ?>
<?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>