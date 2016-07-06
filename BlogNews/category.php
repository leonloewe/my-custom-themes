<?php

get_header(); ?>

<div id="MAIN_contentContainer">
	<div class="row">
		<div class="col-md-8 col-sm-8 col-xs-12">
			<div class="col-md-12 col-sm-12 no-padding post-first post">
					<?php
					// Check if there are any posts to display
					if ( have_posts() ) : ?>

						<header class="archive-header">
							<h1 class="archive-title">Category: <?php single_cat_title(); ?></h1>
							<?php
							// Display optional category description
							if ( category_description() ) : ?>
								<div class="archive-meta"><?php echo category_description(); ?></div>
							<?php endif; ?>
						</header>

						<?php while ( have_posts() ) : the_post(); ?>
							<div class="col-md-12 col-sm-12 no-padding post-all all-post-home">
								<div class="cont">
									<div class="col-md-4 col-sm-4 col-sx-12">
										<?php the_post_thumbnail('small-thumb', array( 'class'	=> "img-responsive")); ?>
									</div>
									<div class="col-md-8 col-sm-8 col-sx-12">
										<a href="<?php the_permalink(); ?>"> <h2 class="title"><?php the_title(); ?></h2></a>

										<div class="post-meta no-padding">
											<span class="small">By</span>
											<span class="author vcard">
												<span class="fn">
													<?php the_author_posts_link(); ?>
												</span>
											</span>
											<span class="small">on</span>
											<abbr class="date time published" title=""><?php the_date(); ?></abbr>
											<span class="small">in</span>
											<span class="categories">
												<?php $categories = get_the_category();
												$separator = ' ';
												$output = '';
												if (!empty($categories)) {
													foreach ($categories as $category) {
														$output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)) . '">' . esc_html($category->name) . '</a>,' . $separator;
													}
													echo trim($output, $separator);
												} ?>
											</span>
										</div>
									</div>
									<div class="entry col-md-8 padd-left">
										<span><?php the_excerpt(); ?></span>

										<div class="post-more">
											<span class="read-more">
												<a href="<?php echo get_post_permalink(); ?>"> Read more</a>
												<span class="sep">•</span>
											</span>
											<span class="post-comments comments">
												<a href="<?php echo get_comments_pagenum_link(); ?>"><?php echo comments_number(); ?></a>
											</span>
										</div>
									</div>
								</div>
							</div>

						<?php endwhile;

					else: ?>
						<p>Sorry, no posts matched your criteria.</p>
					<?php endif; ?>
				<div class="col-md-12">
					<?php if (function_exists('pagination')) {pagination(); } ?>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="blog-sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>