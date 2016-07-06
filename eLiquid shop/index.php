<?php get_header(); ?>
    <div class="container productlist">
        <div class="row">
            <?php
            $bClassNumber = 1;
            $args = array( 'post_type' => 'product', 'stock' => 1, 'posts_per_page' => 6, 'orderby' =>'date','order' => 'DESC' );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
                global $product;
                ?>
                <div  class="col-sm-6">
                    <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID,'full', 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="65px" height="115px" />'; ?>
                        <span class="productlist-price-container">
                            <span class="product-price">
                                <span class="price"><?php echo $product->get_price_html(); ?></span>
                            </span>
                        </span>
                    </a>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        </div><!-- /row-fluid -->
    </div><!-- /recent -->
    <!--<div class="container-fluid productlist">
        <div class="row">
            <div class="col-sm-12 text-center show-more">
                <?php /*$ourShop = get_the_permalink(30); */?>
                <a href="<?php /*echo $ourShop; */?>" class="btn btn-outline" >See more</a>
            </div>
        </div>
    </div>-->
<?php get_footer(); ?>