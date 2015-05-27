<?php

/**
 * Creates a toggle control
 */
class Kirki_Controls_Toggle_Control extends WP_Customize_Control {

	public $type = 'toggle';

	public function enqueue() {

		$config   = Kirki_Toolkit::config()->get_all();
		$root_url = ( '' != $config['url_path'] ) ? esc_url_raw( $config['url_path'] ) : KIRKI_URL;

        wp_enqueue_script( 'kirki-switch', trailingslashit( $root_url ) . 'assets/js/kirki-switch.js', array( 'jquery' ) );

    }

	/**
	 * Render the control's content.
	 */
	protected function render_content() { ?>
		<label>
			<div class="switch-info">
				<input style="display: none;" type="checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> />
			</div>
			<span class="customize-control-title">
				<?php echo esc_attr( $this->label ); ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<?php // The description has already been sanitized in the Fields class, no need to re-sanitize it. ?>
					<span class="description customize-control-description"><?php echo $this->description; ?></span>
				<?php endif; ?>
			</span>
			<?php $classes = ( esc_attr( $this->value() ) ) ? ' On' : ' Off'; ?>
			<?php $classes .= ' Round'; ?>
			<div class="Switch <?php echo $classes; ?>">
				<div class="Toggle"></div>
			</div>
		</label>
		<?php
	}
}
