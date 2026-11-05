<?php
/**
 * Site footer: brand, social links, and the year set by scripts/year.js.
 *
 * @package Discover_Orem
 */

$discover_orem_social = array(
	'facebook'  => 'Facebook',
	'instagram' => 'Instagram',
	'youtube'   => 'YouTube',
);
?>
	<footer class="site-footer">
		<div class="container site-footer__inner">
			<a class="brand brand--footer" href="<?php echo esc_url( discover_orem_section_url( 'hero' ) ); ?>">
				<img class="brand__mark" src="<?php echo esc_url( get_theme_file_uri( 'img/logo.svg' ) ); ?>" alt="" width="28" height="21" loading="lazy">
				<span class="brand__name">OREM</span>
			</a>

			<section class="social">
				<?php foreach ( $discover_orem_social as $icon => $network ) : ?>
					<a href="#" target="_blank" rel="noopener" aria-label="Orem on <?php echo esc_attr( $network ); ?>"><img src="<?php echo esc_url( get_theme_file_uri( 'img/icon-' . $icon . '.svg' ) ); ?>" alt="" width="16" height="16"></a>
				<?php endforeach; ?>
			</section>

			<p class="site-footer__copy">
				&copy; <span id="currentyear"></span> &bull; Discover Orem &bull; DWDD 2610
			</p>
		</div>
	</footer>
<?php wp_footer(); ?>
</body>
</html>
