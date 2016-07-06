<?php get_header(); ?>

    <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 error-404 text-center">
        <h1>404</h1>
        <p class="strong">Oh dear, like the page you are looking for is not available!</p>
        <p>Let's get back on track...</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 action-bar">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa fa-home"></i></a>
            </div>
            <div class="col-sm-4 action-bar">
                <?php $ourShop = get_the_permalink(30); ?>
			        <a href="<?php echo $ourShop; ?>"><i class="fa fa-shopping-cart"></i></a>
            </div>
            <div class="col-sm-4 action-bar">
                <?php $contact = get_the_permalink(25); ?>
				    <a href="<?php echo $contact; ?>"><i class="fa fa-envelope"></i></a>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->

<?php get_footer(); ?>