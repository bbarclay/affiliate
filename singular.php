<?php get_header(); ?>

	<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'entry--full' ); ?> itemscope itemtype="http://schema.org/CreativeWork">

				<div class="container">
					<div class="entry__content  clearfix" itemprop="text">
						<?php the_content(); ?>
					</div>
				</div>
			</article>

			<div class="container">
				<?php comments_template(); ?>
			</div>
		<?php endwhile; ?>
	</main>

<?php get_footer(); ?>