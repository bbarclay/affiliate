<?php if ( is_home() && get_option( 'page_for_posts' ) ) : ?>
	<?php $post = get_post( get_option( 'page_for_posts' ) ); setup_postdata( $post ); ?>
	<header class="banner">
		<div class="container">
			<h1 class="banner__title">
				<?php the_title(); ?>
			</h1>

			<div class="banner__subtitle"></div>
		</div>
	</header>

	<div class="container">
		<div class="content__description">
			<?php echo apply_filters( 'the_excerpt', $post->post_excerpt ); ?>
		</div>
	</div>

	<?php wp_reset_postdata(); ?>
<?php elseif ( is_front_page()  ) : ?>
	<?php 
	    if(has_post_thumbnail()) { 
	    	$bg = get_the_post_thumbnail_url('full');
		}
	?>
	<header class="banner" style="background-image: url(http://localhost/affiliate/wp-content/uploads/2017/08/1648.60acb395ebc688895476395af828fd7d.jpeg);">
		<div class="container">
			<h1 class="banner__title">
				<?php echo get_the_title(); ?>
			</h1>

		</div>
	</header>

	<?php wp_reset_postdata(); ?>

<?php elseif ( is_post_type_archive() ) : ?>
	<header class="banner">
		<div class="container">
			<h1 class="banner__title">
				Business Blueprint<br>
				<strong><?php post_type_archive_title(); ?></strong>
			</h1>

			<div class="banner__subtitle"></div>
		</div>
	</header>
<?php elseif ( is_tax() ) :	?>
	<header class="banner" <?php cascade_the_banner_image(); ?>>
		<div class="container">
			<h1 class="banner__title">
				<?php cascade_the_banner_title(); ?>
			</h1>

			<div class="banner__subtitle"></div>
		</div>
	</header>

	<div class="container">
		<div class="content__description">
			<?php the_archive_description(); ?>
		</div>
	</div>
<?php elseif ( is_archive() ) : ?>
	<header class="banner">
		<div class="container">
			<h1 class="banner__title">
				<?php the_archive_title(); ?>
			</h1>

			<div class="banner__subtitle"></div>
		</div>
	</header>

	<div class="container">
		<div class="content__description">
			<?php the_archive_description(); ?>
		</div>
	</div>
<?php endif; ?>
