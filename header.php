<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<a class="screen-reader-text  skip-link" href="#content">Skip to main content</a>

	<div class="site">
		<div class="site__top">
			<header class="header" itemscope itemtype="http://schema.org/WPHeader">
				<div class="container">
					<div class="grid">
						<div class="grid__column  grid__column--6  grid__column--m-4  grid__column--l-3">
							<a href="<?php echo home_url(); ?>" title="Return to homepage">
								<img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" class="logo">
							</a>
						</div>

						<div class="grid__column  grid__column--6  grid__column--m-8  grid__column--l-9  u-text-right">
						   	<nav id="navigation" class="navigation">
								
									<button class="menu-toggle  js-cascade-toggle" aria-controls="navbar" data-label-close="Close">Menu</button>

									<div id="navbar" class="navbar  js-cascade-navbar" itemscope itemtype="http://schema.org/SiteNavigationElement">
										<?php
										wp_nav_menu( array(
											'theme_location' => 'primary',
											'container'      => false,
											'items_wrap'     => '<ul class="navbar__list">%3$s</ul>'
										) );
										?>
									</div>
								
							</nav>
							<?php if ( is_user_logged_in() ) : ?>
								<a href="<?php echo wp_logout_url( get_home_url() ); ?>" class="button  button--alt  button--login  button--wide">Log out</a>
							<?php else : ?>
								<a href="<?php echo get_theme_mod( 'login_url' ) ?: wp_login_url( get_home_url() ); ?>" class="button  button--alt  button--login  button--wide">Log in</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</header>

		</div>

		<div class="site__middle">