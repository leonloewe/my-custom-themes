<?php get_header(); ?>

	<div class="container-fluid title">
		<div class="row">
			<div class="col-sm-12">
				<h2><?php single_cat_title(); ?></h2>
				<p class="page-title-map"><a href="<?php echo home_url(); ?>">Home</a>  /  <?php single_cat_title(); ?></p>
			</div>
		</div>
	</div>
	<?php
	$cat_id = get_query_var('cat');
	$tags = get_tags_in_cat($cat_id);
	if($tags){
		echo '<div class="page-nav">';
			echo '<ul>';
				foreach($tags as $tag_id => $tag_name){
					echo '<li><a href="' . get_tag_link($tag_id) . '">' . $tag_name . '</a></li>';
				}
			echo '</ul>';
		echo '</div>';
	}?>
	<?php if ( have_posts() ) : ?>
		<div class="container-fluid title">
			<div class="row">
				<div class="col-sm-12">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="artical-anons-main">
							<?php the_post_thumbnail('full', array('class' => 'artical-img img-responsive')); ?>
							<div class="artical-head">
								<h1><?php the_title(); ?></h1>
								<?php my_list_tags(); ?>
							</div>
							<?php the_excerpt(); ?>
							<p><a href="<?php the_permalink(); ?>" class="btn btn-store btn-block read-more" style="max-width:200px">Read more</a></p>
						</div>
					<?php endwhile; ?>
					<?php wp_corenavi(); ?>
				</div>
			</div>
		</div>
	<?php else: ?>
	<div class="container-fluid title">
		<div class="row">
			<div class="col-sm-12">
				<p>In the rubric No posts</p>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php get_footer(); ?>