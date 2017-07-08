<?php

/**
 * @file
 * Open Charity's theme implementation to display a single Drupal page.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site.
 * - .nav: for full site menu
 * - .mobile-nav: for mobile site menu (responsive version)
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['banner']: Items for the banner content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['messages']: Dynamic message text, produced by results of admin actions.
 * - $page['next_event']: Items for the next_event content region.
 * - $page['content']: The main content of the current page.
 * - $page['sub_footer']: Items for the sub_footer content region (blog carousel).
 * - $page['footer']: Items for the footer region.
 *
 */
?>
<div id="page-wrapper"><div id="page">

	<div id="header" class="<?php print $secondary_menu ? 'with-secondary-menu': 'without-secondary-menu'; ?>">
		<div id="top_section">
			<div class="section clearfix">
				<div class="structure-container">

					<?php if ($logo): ?>
						<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
							<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
						</a> <!-- /#logo -->
					<?php endif; ?>

					<?php if ($main_menu): ?>
						<div id="main_menu" class="nav">
							<?php print theme('links__system_main_menu', array(
								'links' => $main_menu,
								'attributes' => array(
									'id' => 'main_menu_links',
									'class' => array('links', 'clearfix'),
								),
								'heading' => array(
									'text' => t('Main menu'),
									'level' => 'h2',
									'class' => array('element-invisible'),
								),
							)); ?>
						</div> <!-- /.nav, ***desktop menu*** -->

						<div id="main_menu" class="mobile-nav">
							<label id="menu_btn" for="menu_check">
								<span id="menu_icon"><i class="fa fa-bars"></i></span>
							</label>
							<input type="checkbox" id="menu_check" />

							<?php print theme('links__system_main_menu', array(
								'links' => $main_menu,
								'attributes' => array(
									'id' => 'mobile_menu_links',
									'class' => array('links', 'clearfix'),
								),
								'heading' => array(
									'text' => t('Main menu'),
									'level' => 'h2',
									'class' => array('element-invisible'),
								),
							)); ?>
						</div> <!-- /.mobile-nav, ***mobile menu*** -->
					<?php endif; ?>

				</div>
			</div>
		</div> <!-- /#top_section -->

		<?php if ($page['banner']): ?>
			<div id="banner_section">
				<div id="banner_wrapper">
					
					<div class="overlay">
						<div class="section clearfix">
							
							<div class="middle-vert-outer-wrap">
								<div class="middle-vert-block">

									<div class="structure-container">

										<?php if ($site_slogan): ?>
											<div id="banner_site_slogan">
												<?php print $site_slogan; ?>
											</div>
										<?php endif; ?>

										<!-- banner content -->
										<?php print render($page['banner']); ?>

									</div>

								</div>
							</div>
							
						</div>
					</div>

					<div id="banner_bg"></div>

				</div>
			</div> <!-- /#banner_section -->
		<?php endif; ?>
	</div> <!-- /#header -->


	<?php if ($messages): ?>
		<div id="messages">
			<div class="section clearfix">
				<?php print $messages; ?>
			</div>
		</div> <!-- /#messages -->
	<?php endif; ?>

	<?php if ($page['next_event']): ?>
		<div class="light-gray-block">
			<!-- next_event content -->
			<?php print render($page['next_event']); ?>
		</div>
	<?php endif; ?>

	<div id="main_wrapper" class="clearfix">
		<div id="main" class="clearfix">

			<?php if ($page['content']): ?>
				<?php // removing default text on home page ?>
				<?php if(drupal_is_front_page()): ?>
					<?php unset($page['content']['system_main']['default_message']); ?>
				<?php endif; ?>

				<!-- selected page content -->
				<?php print render($page['content']); ?>
			<?php endif; ?>

		</div>
	</div> <!-- /#main_wrapper -->

	<?php if ($page['sub_footer']): ?>
		<div id="sub_footer">
			<div class="light-gray-block"></div>
			
			<div class="slate-gray-block"></div>

			<div class="white-block">
				<!-- sub_footer content -->
				<?php print render($page['sub_footer']); ?>
			</div>
		</div> <!-- /#sub_footer -->
	<?php endif; ?>

	<div class="dark-gray-block">
		<div id="footer" class="block-content structure-container">
			<div class="section clearfix">

				<div id="social_icons" class="highlight-teal">
					<ul class="fa-ul">
						<li>
							<a href="https://www.facebook.com" target="_blank">
								<i class="fa-li fa fa-facebook" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="https://twitter.com" target="_blank">
								<i class="fa-li fa fa-twitter" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="https://plus.google.com" target="_blank">
								<i class="fa-li fa fa-google-plus" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div>
				<hr>
				<div id="footer_text">
					<!-- footer content -->
					<?php print render($page['footer']); ?>
				</div>

			</div>
		</div> <!-- /.block-content, /#footer -->
	</div>

</div></div> <!-- /#page, /#page-wrapper -->
