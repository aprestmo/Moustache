<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Moustache
 * @since 1.0
 * @version 1.0
 */
?></main>

<footer class="c-footer" role="contentinfo">
	<div class="mou-site-wrap mou-site-wrap--padding">
		<div class="o-grid o-section-md">
			<div class="o-grid__item u-1/1 u-text-center">
				<img class="c-footer__logo" src="<?php echo get_template_directory_uri() . $baseURL; ?>kampbart-logo.svg" alt="">
				<p class="c-footer__slogan">
					<span class="u-visually-hidden"><?php echo esc_html(bloginfo('description')); ?></span>
					<img src="<?php echo esc_url(get_template_directory_uri() . '/dist/slogan.svg'); ?>" alt="" height="26">
				</p>
				<p class="c-footer__copyright">
					<?php echo esc_html(get_bloginfo('name')); ?>
					<br>
					<?php esc_html_e('Founded 2003', 'moustache'); ?>
					<br>
					<?php esc_html_e('Copyright', 'moustache'); ?> &copy; <?php echo esc_html(get_bloginfo('name')); ?> &ndash; <?php echo esc_html(date('Y')); ?>
				</p>
				<p>Se opp for nye barter i <?php echo date('Y'); ?>!</p>
			</div>
		</div>
	</div>
</footer>

<?php get_search_form(); ?>

<?php wp_footer(); ?>

</body>

</html>