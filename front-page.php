<?php get_header(); ?>

	<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
		<?php get_template_part( 'template-parts/content/header' ); ?>

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content() ?>
				<?php endwhile; ?>
			<?php else: ?>
				<p>Sorry, nothing found that matched your criteria.</p>
			<?php endif; ?>

	</main>

<?php get_footer(); ?>