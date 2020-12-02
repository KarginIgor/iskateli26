<?php
/**
 * Getting started section.
 *
 * @package EightyDays
 */

?>
<div id="getting-started" class="gt-tab-pane gt-is-active">
	<div class="feature-section two-col">
		<div class="col">
			<h3><?php esc_html_e( 'Implement Recommended Actions', 'eightydays-lite' ); ?></h3>
			<p>
				<?php
				/* translators: theme name. */
				echo esc_html( sprintf( __( 'We have made a list of steps for you, to make sure you will get the most of %s. They are easy to follow.', 'eightydays-lite' ), $this->theme->name ) );
				?>
			</p>
			<p>
				<a href="#actions" class="action-links button"><?php esc_html_e( 'Recommended Actions', 'eightydays-lite' ); ?></a>
			</p>

			<h3><?php esc_html_e( 'Customize The Theme', 'eightydays-lite' ); ?></h3>
			<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'eightydays-lite' ); ?></p>
			<p>
				<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button"><?php esc_html_e( 'Start Customize', 'eightydays-lite' ); ?></a>
			</p>

			<h3><?php esc_html_e( 'Read Full Documentation', 'eightydays-lite' ); ?></h3>
			<p class="about"><?php esc_html_e( 'Need any help to setup and configure the theme? Please check our full documentation for detailed information on how to use it.', 'eightydays-lite' ); ?></p>
			<p>
				<a href="<?php echo esc_url( "https://gretathemes.com/docs/{$this->slug}/{$this->utm }" ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e( 'Read Documentation', 'eightydays-lite' ); ?></a>
			</p>
		</div>

		<div class="col">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png" alt="<?php esc_attr_e( 'screenshot', 'eightydays-lite' ); ?>">
		</div>
	</div>
</div>
