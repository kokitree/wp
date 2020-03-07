<?php

//---------------------------------------------------------------------
/**
 * Iriska settings for customizer
 * @package Iriska
 *-------------------------------------------------------------------*/

/*--------------------------------------------------------------
# Custom controls for customizer
--------------------------------------------------------------*/
function iriska_custom_controls_for_customizer( $wp_customize ) {
	//--------------------------------------------------------------
	/**
	 * Slider Custom Control
	 * @author Anthony Hortin http://maddisondesigns.com
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 *------------------------------------------------------------*/
	class Iriska_Slider_Custom_Control extends WP_Customize_Control {
		// The type of control being rendered
		public $type = 'slider_control';
		// Enqueue our scripts and styles
		public function enqueue() {
			wp_enqueue_script( 'iriska-custom-controls-js', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array( 'jquery', 'jquery-ui-core' ), '1.0.0', true );
			wp_enqueue_style( 'iriska-custom-controls-css', get_template_directory_uri() . '/inc/customizer/css/customizer.css', array(), '1.0.0' );
		}
		// Render the control in the customizer
		public function render_content() {
		?>
			<div class="slider-custom-control customizer-top-divider">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span><input type="number" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value" <?php $this->link(); ?> />
				<div class="slider" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div><span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr( $this->settings['default']->default ); ?>"></span>
			</div>
		<?php
		}
	}

	//------------------------------------------------------------------------------------------
	/**
 	 * Alpha Color Picker Custom Control
 	 * @author Braad Martin http://braadmartin.com
 	 * @license http://www.gnu.org/licenses/gpl-3.0.html
 	 * @link https://github.com/BraadMartin/components/tree/master/customizer/alpha-color-picker
 	 *----------------------------------------------------------------------------------------*/
	class Iriska_Customize_Alpha_Color_Control extends WP_Customize_Control {
		// The type of control being rendered
		public $type = 'alpha-color';
		// Add support for palettes to be passed in.
		// Supported palette values are true, false, or an array of RGBa and Hex colors.
		public $palette;
		// Add support for showing the opacity value on the slider handle.
		public $show_opacity;
		// Enqueue our scripts and styles
		public function enqueue() {
			wp_enqueue_script( 'iriska-custom-controls-js', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array( 'jquery', 'wp-color-picker' ), '1.0.0', true );
			wp_enqueue_style( 'iriska-custom-controls-css', get_template_directory_uri() . '/inc/customizer/css/customizer.css', array( 'wp-color-picker' ), '1.0.0' );
		}
		// Render the control in the customizer
		public function render_content() {

			// Process the palette
			if ( is_array( $this->palette ) ) {
				$palette = implode( '|', $this->palette );
			} else {
				// Default to true.
				$palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
			}

			// Support passing show_opacity as string or boolean. Default to true.
			$show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';

			?>
				<label>
					<?php // Output the label and description if they were passed in.
					if ( isset( $this->label ) && '' !== $this->label ) {
						echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
					}
					if ( isset( $this->description ) && '' !== $this->description ) {
						echo '<span class="description customize-control-description">' . esc_html( $this->description ) . '</span>';
					} ?>
				</label>
				<input class="alpha-color-control" type="text" data-show-opacity="<?php echo $show_opacity; ?>" data-palette="<?php echo esc_attr( $palette ); ?>" data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php $this->link(); ?>  />
			<?php
		}
	}

	//--------------------------------------------------------------
	/**
	 * Toggle Switch Custom Control
	 * @author Anthony Hortin http://maddisondesigns.com
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 *------------------------------------------------------------*/
	class Iriska_Toggle_Switch_Custom_Control extends WP_Customize_Control {
		// The type of control being rendered
		public $type = 'toggle_switch';
		// Enqueue our scripts and styles
		public function enqueue() {
			wp_enqueue_style( 'iriska-custom-controls-css', get_template_directory_uri() . '/inc/customizer/css/customizer.css', array(), '1.0.0' );
		}
		// Render the control in the customizer
		public function render_content() {
		?>
			<div class="toggle-switch-control clearfix customizer-top-divider">
				<div class="customizer-switch-content-wrapper">
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php if( !empty( $this->description ) ) { ?>
						<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
					<?php } ?>
				</div>
				<div class="toggle-switch">
					<input type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" class="toggle-switch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?>>
					<label class="toggle-switch-label" for="<?php echo esc_attr( $this->id ); ?>">
						<span class="toggle-switch-inner"></span>
						<span class="toggle-switch-switch"></span>
					</label>
				</div>
			</div>
		<?php
		}
	}

	//--------------------------------------------------------------
	/**
	 * TinyMCE Custom Control
	 * @author Anthony Hortin http://maddisondesigns.com
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 *------------------------------------------------------------*/
	class Iriska_TinyMCE_Custom_Control extends WP_Customize_Control {
		// The type of control being rendered
		public $type = 'tinymce_editor';
		// Enqueue our scripts and styles
		public function enqueue(){
			wp_enqueue_script( 'iriska-custom-controls-js', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_style( 'iriska-custom-controls-css', get_template_directory_uri() . '/inc/customizer/css/customizer.css', array(), '1.0.0' );
			wp_enqueue_editor();
		}
		// Pass our TinyMCE toolbar string to JavaScript
		public function to_json() {
			parent::to_json();
			$this->json['tinymcetoolbar1'] = isset( $this->input_attrs['toolbar1'] ) ? esc_attr( $this->input_attrs['toolbar1'] ) : 'bold italic bullist numlist alignleft aligncenter alignright link';
			$this->json['tinymcetoolbar2'] = isset( $this->input_attrs['toolbar2'] ) ? esc_attr( $this->input_attrs['toolbar2'] ) : '';
		}
		// Render the control in the customizer
		public function render_content(){
		?>
			<div class="tinymce-control customizer-top-divider">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<textarea id="<?php echo esc_attr( $this->id ); ?>" class="customize-control-tinymce-editor" <?php $this->link(); ?>><?php echo esc_attr( $this->value() ); ?></textarea>
			</div>
		<?php
		}
	}
}
add_action( 'customize_register', 'iriska_custom_controls_for_customizer' );

/*--------------------------------------------------------------
# Sanitize values
--------------------------------------------------------------*/
//--------------------------------------------------------------
/**
 * Integer sanitization
 * @param string Input to be sanitized
 * @return integer Returned integer value
 *------------------------------------------------------------*/
if ( !function_exists( 'iriska_sanitize_integer' ) ) {
	function iriska_sanitize_integer( $input ) {
		return (int) $input;
	}
}

//--------------------------------------------------------------
/**
 * Float integer sanitization
 * @param string Input to be sanitized
 * @return float integer Returned float integer value
 *------------------------------------------------------------*/
if ( !function_exists( 'iriska_sanitize_float_integer' ) ) {
	function iriska_sanitize_float_integer( $input ) {
		return number_format( $input, 2, '.', '' );
	}
}

//--------------------------------------------------------------
/**
 * Alpha Color (Hex & RGBa) sanitization
 * @param string Input to be sanitized
 * @return string Sanitized input
 *------------------------------------------------------------*/
if ( !function_exists( 'iriska_hex_rgba_sanitization' ) ) {
	function iriska_hex_rgba_sanitization( $input, $setting ) {
		if ( empty( $input ) || is_array( $input ) ) {
			return $setting->default;
		}

		if ( false === strpos( $input, 'rgba' ) ) {
			// If string doesn't start with 'rgba' then santize as hex color
			$input = sanitize_hex_color( $input );
		} else {
			// Sanitize as RGBa color
			$input = str_replace( ' ', '', $input );
			sscanf( $input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
			$input = 'rgba(' . iriska_in_range( $red, 0, 255 ) . ',' . iriska_in_range( $green, 0, 255 ) . ',' . iriska_in_range( $blue, 0, 255 ) . ',' . iriska_in_range( $alpha, 0, 1 ) . ')';
		}
		return $input;
	}
}

//--------------------------------------------------------------
/**
 * Only allow values between a certain minimum & maxmium range
 * @param number Input to be sanitized
 * @return number	Sanitized input
 *------------------------------------------------------------*/
if ( ! function_exists( 'iriska_in_range' ) ) {
	function iriska_in_range( $input, $min, $max ){
		if ( $input < $min ) {
			$input = $min;
		}
		if ( $input > $max ) {
			$input = $max;
		}
	  return $input;
	}
}

//--------------------------------------------------------------
/**
 * Switch sanitization
 * @param string Switch value
 * @return integer Sanitized value
 *------------------------------------------------------------*/
if ( !function_exists( 'iriska_switch_sanitization' ) ) {
	function iriska_switch_sanitization( $input ) {
		if ( true === $input ) {
			return 1;
		} else {
			return 0;
		}
	}
}

/*--------------------------------------------------------------
 * Sanitize color for dynamic CSS
 *------------------------------------------------------------*/
if ( !function_exists( 'iriska_sanitize_color_output' ) ) {
	function iriska_sanitize_color_output( $color ) {
		if ( false === strpos( $color, 'rgba' ) ) {
			// If string doesn't start with 'rgba' then santize as hex color
			$color = sanitize_hex_color( $color );
		} else {
			// Sanitize as RGBa color
			$color = str_replace( ' ', '', $color );
			sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
			$color = 'rgba(' . iriska_in_range( $red, 0, 255 ) . ',' . iriska_in_range( $green, 0, 255 ) . ',' . iriska_in_range( $blue, 0, 255 ) . ',' . iriska_in_range( $alpha, 0, 1 ) . ')';
		}
		return $color;
	}
}

/*--------------------------------------------------------------
 * Sanitize integer for dynamic CSS
 *------------------------------------------------------------*/
if ( !function_exists( 'iriska_sanitize_integer_output' ) ) {
	function iriska_sanitize_integer_output( $number ) {
		if ( is_int( $number ) ) {
			return $number;
		} else {
			return number_format( $number, 2, '.', '' );
		}
	}
}

/*--------------------------------------------------------------
 * Custom theme settings
 *------------------------------------------------------------*/
function iriska_customizer_settings( $wp_customize ) {
	$wp_customize->get_section( 'colors' )->title = esc_html__( 'Header colors', 'iriska' );
	$wp_customize->get_section( 'colors' )->panel = 'iriska_colors_settings_panel';
	$wp_customize->get_section( 'header_image' )->panel = 'iriska_colors_settings_panel';
	$wp_customize->get_section( 'header_image' )->title = esc_html__( 'Header background image', 'iriska' );
	$wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Color for site name and description', 'iriska' );
	$wp_customize->get_control( 'header_textcolor' )->description = esc_html__( 'Changes will be visible if the display of the site name and description in the section "Site Identity" is enabled.', 'iriska' );

	// Colors
	$wp_customize->add_panel( 'iriska_colors_settings_panel', 
		array(
	    'title' => esc_html__( 'Theme Color Settings', 'iriska' ),
	    'capability' => 'edit_theme_options'
	  ) 
	);

		// Header Colors
			// Header background
	  	$wp_customize->add_setting( 'iriska_header_background',
				array(
					'default' => '#ffffff',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization',
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_header_background',
				array(
					'label' => esc_html__( 'Header background color', 'iriska' ),
					'description' => esc_html__( 'Background color of the section with menu and logo.', 'iriska' ),
					'section' => 'colors',
					'settings' => 'iriska_header_background',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Submenu background
			$wp_customize->add_setting( 'iriska_submenu_and_mobile_menu_background',
				array(
					'default' => '#ffffff',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_submenu_and_mobile_menu_background',
				array(
					'label' => esc_html__( 'Background color of submenus (only for large screens) and background color of the mobile menu', 'iriska' ),
					'description' => esc_html__( 'There are currently no settings to change the color of the links in the submenu. Therefore, select a submenu color to contrast with the color of the links in the menu. To change the color of the links in the menu there is a setting below.', 'iriska' ),
					'section' => 'colors',
					'settings' => 'iriska_submenu_and_mobile_menu_background',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Header elements color
			$wp_customize->add_setting( 'iriska_header_main_colors',
				array(
					'default' => '#ebced0',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_header_main_colors',
				array(
					'label' => esc_html__( 'Header elements color', 'iriska' ),
					'description' => esc_html__( 'The color of elements such as the open mobile menu button, the close mobile menu button and etc.', 'iriska' ),
					'section' => 'colors',
					'settings' => 'iriska_header_main_colors',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Header links color
			$wp_customize->add_setting( 'iriska_header_links_and_text_color',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_header_links_and_text_color',
				array(
					'label' => esc_html__( 'Header links color', 'iriska' ),
					'description' => esc_html__( 'The color of the links in the menu and submenu.', 'iriska' ),
					'section' => 'colors',
					'settings' => 'iriska_header_links_and_text_color',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Header links hover color
			$wp_customize->add_setting( 'iriska_menu_links_hover_color',
				array(
					'default' => '#ebced0',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_menu_links_hover_color',
				array(
					'label' => esc_html__( 'Links color in the menu when hovering', 'iriska' ),
					'section' => 'colors',
					'settings' => 'iriska_menu_links_hover_color',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Header current link color
			$wp_customize->add_setting( 'iriska_menu_current_link_color',
				array(
					'default' => '#ebced0',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_menu_current_link_color',
				array(
					'label' => esc_html__( 'The color of the current link in the menu', 'iriska' ),
					'description' => esc_html__( 'If the menu contains the current page, the link will have a different color.', 'iriska' ),
					'section' => 'colors',
					'settings' => 'iriska_menu_current_link_color',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Header shadow color
			$wp_customize->add_setting( 'iriska_header_shadow_color',
				array(
					'default' => '#dddddd',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_header_shadow_color',
				array(
					'label' => esc_html__( 'The shadow color in the header and submenu', 'iriska' ),
					'section' => 'colors',
					'settings' => 'iriska_header_shadow_color',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

		// Main colors
	  $wp_customize->add_section( 'iriska_main_settings_colors',
	  	array(
	      'title' => esc_html__( 'Main colors', 'iriska' ),
	      'panel' => 'iriska_colors_settings_panel'
	  	)
	  );

	  	// Accent color
			$wp_customize->add_setting( 'iriska_accent_color',
				array(
					'default' => '#ebced0',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_accent_color',
				array(
					'label' => esc_html__( 'Accent color', 'iriska' ),
					'description' => esc_html__( 'Buttons and other elements.', 'iriska' ),
					'section' => 'iriska_main_settings_colors',
					'settings' => 'iriska_accent_color',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Contrast color
			$wp_customize->add_setting( 'iriska_contrast_color',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_contrast_color',
				array(
					'label' => esc_html__( 'Contrast color', 'iriska' ),
					'description' => esc_html__( 'The text on the buttons and other elements.', 'iriska' ),
					'section' => 'iriska_main_settings_colors',
					'settings' => 'iriska_contrast_color',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Accent color on hover
			$wp_customize->add_setting( 'iriska_accent_color_hover',
				array(
					'default' => '#ffffff',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_accent_color_hover',
				array(
					'label' => esc_html__( 'Accent color when hovering', 'iriska' ),
					'description' => esc_html__( 'Accent color of the text changes when hovering.', 'iriska' ),
					'section' => 'iriska_main_settings_colors',
					'settings' => 'iriska_accent_color_hover',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Accent background color on hover
			$wp_customize->add_setting( 'iriska_accent_background_hover',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_accent_background_hover',
				array(
					'label' => esc_html__( 'Accent background color when hovering', 'iriska' ),
					'description' => esc_html__( 'Accent background color changes when hovering.', 'iriska' ),
					'section' => 'iriska_main_settings_colors',
					'settings' => 'iriska_accent_background_hover',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

		// Content Links Color
		$wp_customize->add_section( 'iriska_content_links_settings_colors',
	  	array(
	      'title' => esc_html__( 'Links colors in the content', 'iriska' ),
	      'panel' => 'iriska_colors_settings_panel'
	  	)
	  );

			// Content link color
	  	$wp_customize->add_setting( 'iriska_content_links_color',
				array(
					'default' => '#ebced0',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_content_links_color',
				array(
					'label' => esc_html__( 'Links color in the content', 'iriska' ),
					'description' => esc_html__( 'The color of the links in the content area. In other areas, the color of the links is equal to the text color.', 'iriska' ),
					'section' => 'iriska_content_links_settings_colors',
					'settings' => 'iriska_content_links_color',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Content link color on hover
			$wp_customize->add_setting( 'iriska_content_links_hover_color',
				array(
					'default' => '#000000',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_content_links_hover_color',
				array(
					'label' => esc_html__( 'Links color when hovering', 'iriska' ),
					'description' => esc_html__( 'The color of the links in the content area. In other areas, the color of the links is equal to the text color.', 'iriska' ),
					'section' => 'iriska_content_links_settings_colors',
					'settings' => 'iriska_content_links_hover_color',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

		// Page, Post, Blog, Archives, Search Colors
		$wp_customize->add_section( 'iriska_content_settings_colors',
	  	array(
	      'title' => esc_html__( 'Colors for pages, posts, archives', 'iriska' ),
	      'panel' => 'iriska_colors_settings_panel'
	  	)
	  );

			// Content space background and some elements color
	  	$wp_customize->add_setting( 'iriska_content_space_background',
				array(
					'default' => '#f7f7f7',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_content_space_background',
				array(
					'label' => esc_html__( 'The space background color and some elements', 'iriska' ),
					'description' => esc_html__( 'The background color of the space around the content and elements such as navigation, caption, etc.', 'iriska' ),
					'section' => 'iriska_content_settings_colors',
					'settings' => 'iriska_content_space_background',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Content and some elements color
			$wp_customize->add_setting( 'iriska_content_some_elements_color',
				array(
					'default' => '#333333',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_content_some_elements_color',
				array(
					'label' => esc_html__( 'Text color (for some elements)', 'iriska' ),
					'description' => esc_html__( 'The color of the text that is in the elements with the color settings above.', 'iriska' ),
					'section' => 'iriska_content_settings_colors',
					'settings' => 'iriska_content_some_elements_color',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Content background
			$wp_customize->add_setting( 'iriska_content_background',
				array(
					'default' => '#ffffff',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_content_background',
				array(
					'label' => esc_html__( 'Background color of the content and some elements', 'iriska' ),
					'description' => esc_html__( 'Background color for content, widgets, navigation elements, fixed buttons and etc.', 'iriska' ),
					'section' => 'iriska_content_settings_colors',
					'settings' => 'iriska_content_background',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Content color
			$wp_customize->add_setting( 'iriska_content_color',
				array(
					'default' => '#333333',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_content_color',
				array(
					'label' => esc_html__( 'Text color', 'iriska' ),
					'description' => esc_html__( 'The color of the text that is in the elements with the color settings above.', 'iriska' ),
					'section' => 'iriska_content_settings_colors',
					'settings' => 'iriska_content_color',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Borders color
			$wp_customize->add_setting( 'iriska_borders_color',
				array(
					'default' => '#dddddd',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_borders_color',
				array(
					'label' => esc_html__( 'Borders color', 'iriska' ),
					'description' => esc_html__( 'Border color for tables, widget elements (only Iriska and WordPress widgets), and other content area elements.', 'iriska' ),
					'section' => 'iriska_content_settings_colors',
					'settings' => 'iriska_borders_color',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

		// Overlay Color
		$wp_customize->add_section( 'iriska_overlay_color',
	  	array(
	      'title' => esc_html__( 'Overlay colors', 'iriska' ),
	      'panel' => 'iriska_colors_settings_panel'
	  	)
	  );

			// Overlay background
	  	$wp_customize->add_setting( 'iriska_overlay_background',
				array(
					'default' => 'rgba(0, 0, 0, 0.3)',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_overlay_background',
				array(
					'label' => esc_html__( 'Overlay background color', 'iriska' ),
					'description' => esc_html__( 'Background color of the overlay when opening the comment area, sidebar and etc.', 'iriska' ),
					'section' => 'iriska_overlay_color',
					'settings' => 'iriska_overlay_background',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);
			
		// Footer Colors
		$wp_customize->add_section( 'iriska_footer_settings_colors',
	  	array(
	      'title' => esc_html__( 'Footer colors', 'iriska' ),
	      'panel' => 'iriska_colors_settings_panel'
	  	)
	  );

			// Footer copyright area background
	  	$wp_customize->add_setting( 'iriska_footer_copyright_area_background',
				array(
					'default' => '#ffffff',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_footer_copyright_area_background',
				array(
					'label' => esc_html__( 'Footer copyright area background color', 'iriska' ),
					'section' => 'iriska_footer_settings_colors',
					'settings' => 'iriska_footer_copyright_area_background',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Footer copyright area color
			$wp_customize->add_setting( 'iriska_footer_copyright_area_color',
				array(
					'default' => '#333333',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_footer_copyright_area_color',
				array(
					'label' => esc_html__( 'Footer copyright text color', 'iriska' ),
					'section' => 'iriska_footer_settings_colors',
					'settings' => 'iriska_footer_copyright_area_color',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Footer widgets area background
			$wp_customize->add_setting( 'iriska_footer_widgets_area_background',
				array(
					'default' => '#ffffff',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_footer_widgets_area_background',
				array(
					'label' => esc_html__( 'Background color in footer widget areas', 'iriska' ),
					'description' => esc_html__( 'The background will be visible if the footer widget area is enabled (if the footer contains at least one widget). Go to Admin Panel > Appearance > Widgets (or Customizer > Widgets) to add widgets.', 'iriska' ),
					'section' => 'iriska_footer_settings_colors',
					'settings' => 'iriska_footer_widgets_area_background',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Footer widgets area color
			$wp_customize->add_setting( 'iriska_footer_widgets_area_color',
				array(
					'default' => '#333333',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_footer_widgets_area_color',
				array(
					'label' => esc_html__( 'Text color in the footer widgets', 'iriska' ),
					'section' => 'iriska_footer_settings_colors',
					'settings' => 'iriska_footer_widgets_area_color',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

			// Footer widgets area border color
			$wp_customize->add_setting( 'iriska_footer_widgets_area_border_color',
				array(
					'default' => '#dddddd',
					'sanitize_callback' => 'iriska_hex_rgba_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Customize_Alpha_Color_Control( $wp_customize, 'iriska_footer_widgets_area_border_color',
				array(
					'label' => esc_html__( 'Borders color in the footer widget areas', 'iriska' ),
					'description' => esc_html__( 'Border color for tables, widget elements (only Iriska and WordPress widgets), and other elements in the footer widget area.', 'iriska' ),
					'section' => 'iriska_footer_settings_colors',
					'settings' => 'iriska_footer_widgets_area_border_color',
					'show_opacity' => true,
					'palette'	=> array(
						'#51dcd9',
						'#70dc51',
						'#dc9b51',
						'#5d51dc',
						'#ffffff'
					)
				))
			);

	// Layout
	$wp_customize->add_panel( 'iriska_layout_settings_panel', 
		array(
	    'title' => esc_html__( 'Theme Layout Settings', 'iriska' ),
	    'capability' => 'edit_theme_options'
	  ) 
	);

		// Header Layout Settings For Large Screens
		$wp_customize->add_section( 'iriska_header_settings_layout_large_screens',
	  	array(
	      'title' => esc_html__( 'Header layout for large screens', 'iriska' ),
	      'description' => esc_html__( 'Settings for the header for large screens (from 980px and up).', 'iriska' ),
	      'panel' => 'iriska_layout_settings_panel'
	  	)
	  );

			// Header height
	  	$wp_customize->add_setting( 'iriska_header_height_large',
				array(
					'default' => 100,
					'sanitize_callback' => 'iriska_sanitize_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_header_height_large',
				array(
					'label' => esc_html__( 'Header min height (px)', 'iriska' ),
					'settings' => 'iriska_header_height_large',
					'section' => 'iriska_header_settings_layout_large_screens',
					'input_attrs' => array(
						'min' => 60,
						'max' => 200,
						'step' => 1
					)
				))
			);

			// Logo width
			$wp_customize->add_setting( 'iriska_header_logo_width_large',
				array(
					'default' => 80,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_header_logo_width_large',
				array(
					'label' => esc_html__( 'Logo width (%)', 'iriska' ),
					'settings' => 'iriska_header_logo_width_large',
					'section' => 'iriska_header_settings_layout_large_screens',
					'input_attrs' => array(
						'min' => 10,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

			// Sticky header height
			$wp_customize->add_setting( 'iriska_sticky_header_height_large',
				array(
					'default' => 80,
					'sanitize_callback' => 'iriska_sanitize_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_sticky_header_height_large',
				array(
					'label' => esc_html__( 'The min height of the fixed header (px)', 'iriska' ),
					'settings' => 'iriska_sticky_header_height_large',
					'section' => 'iriska_header_settings_layout_large_screens',
					'input_attrs' => array(
						'min' => 60,
						'max' => 200,
						'step' => 1
					)
				))
			);

			// Sticky header logo width
			$wp_customize->add_setting( 'iriska_sticky_header_logo_width_large',
				array(
					'default' => 50,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_sticky_header_logo_width_large',
				array(
					'label' => esc_html__( 'Logo width in fixed header (%)', 'iriska' ),
					'settings' => 'iriska_sticky_header_logo_width_large',
					'section' => 'iriska_header_settings_layout_large_screens',
					'input_attrs' => array(
						'min' => 10,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

		// Header Layout Settings For Medium Screens
		$wp_customize->add_section( 'iriska_header_settings_layout_medium_screens',
	  	array(
	      'title' => esc_html__( 'Header layout for medium screens', 'iriska' ),
	      'description' => esc_html__( 'Settings for the header for medium screens (from 768px to 980px).', 'iriska' ),
	      'panel' => 'iriska_layout_settings_panel'
	  	)
	  );

			// Header height
			$wp_customize->add_setting( 'iriska_header_height_medium',
				array(
					'default' => 80,
					'sanitize_callback' => 'iriska_sanitize_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_header_height_medium',
				array(
					'label' => esc_html__( 'Header min height (px)', 'iriska' ),
					'settings' => 'iriska_header_height_medium',
					'section' => 'iriska_header_settings_layout_medium_screens',
					'input_attrs' => array(
						'min' => 50,
						'max' => 200,
						'step' => 1
					)
				))
			);

			// Logo width
			$wp_customize->add_setting( 'iriska_header_logo_width_medium',
				array(
					'default' => 100,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_header_logo_width_medium',
				array(
					'label' => esc_html__( 'Logo width (%)', 'iriska' ),
					'settings' => 'iriska_header_logo_width_medium',
					'section' => 'iriska_header_settings_layout_medium_screens',
					'input_attrs' => array(
						'min' => 10,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

			// Sticky header height
			$wp_customize->add_setting( 'iriska_sticky_header_height_medium',
				array(
					'default' => 60,
					'sanitize_callback' => 'iriska_sanitize_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_sticky_header_height_medium',
				array(
					'label' => esc_html__( 'The min height of the fixed header (px)', 'iriska' ),
					'settings' => 'iriska_sticky_header_height_medium',
					'section' => 'iriska_header_settings_layout_medium_screens',
					'input_attrs' => array(
						'min' => 50,
						'max' => 200,
						'step' => 1
					)
				))
			);

			// Sticky header logo width
			$wp_customize->add_setting( 'iriska_sticky_header_logo_width_medium',
				array(
					'default' => 70,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_sticky_header_logo_width_medium',
				array(
					'label' => esc_html__( 'Logo width in fixed header (%)', 'iriska' ),
					'settings' => 'iriska_sticky_header_logo_width_medium',
					'section' => 'iriska_header_settings_layout_medium_screens',
					'input_attrs' => array(
						'min' => 10,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

		// Header Layout Settings For Small Screens
		$wp_customize->add_section( 'iriska_header_settings_layout_small_screens',
	  	array(
	      'title' => esc_html__( 'Header layout for small screens', 'iriska' ),
	      'description' => esc_html__( 'Settings for the header for small screens (up to 768px).', 'iriska' ),
	      'panel' => 'iriska_layout_settings_panel'
	  	)
	  );

			// Header height
			$wp_customize->add_setting( 'iriska_header_height_small',
				array(
					'default' => 60,
					'sanitize_callback' => 'iriska_sanitize_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_header_height_small',
				array(
					'label' => esc_html__( 'Header min height (px)', 'iriska' ),
					'settings' => 'iriska_header_height_small',
					'section' => 'iriska_header_settings_layout_small_screens',
					'input_attrs' => array(
						'min' => 50,
						'max' => 200,
						'step' => 1
					)
				))
			);

			// Logo width
			$wp_customize->add_setting( 'iriska_header_logo_width_small',
				array(
					'default' => 80,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_header_logo_width_small',
				array(
					'label' => esc_html__( 'Logo width (%)', 'iriska' ),
					'settings' => 'iriska_header_logo_width_small',
					'section' => 'iriska_header_settings_layout_small_screens',
					'input_attrs' => array(
						'min' => 10,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

			// Sticky header height
			$wp_customize->add_setting( 'iriska_sticky_header_height_small',
				array(
					'default' => 50,
					'sanitize_callback' => 'iriska_sanitize_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_sticky_header_height_small',
				array(
					'label' => esc_html__( 'The min height of the fixed header (px)', 'iriska' ),
					'settings' => 'iriska_sticky_header_height_small',
					'section' => 'iriska_header_settings_layout_small_screens',
					'input_attrs' => array(
						'min' => 50,
						'max' => 200,
						'step' => 1
					)
				))
			);

			// Sticky header logo width
			$wp_customize->add_setting( 'iriska_sticky_header_logo_width_small',
				array(
					'default' => 70,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_sticky_header_logo_width_small',
				array(
					'label' => esc_html__( 'Logo width in fixed header (%)', 'iriska' ),
					'settings' => 'iriska_sticky_header_logo_width_small',
					'section' => 'iriska_header_settings_layout_small_screens',
					'input_attrs' => array(
						'min' => 10,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

		// Mobile And Sticky Header Settings
		$wp_customize->add_section( 'iriska_header_settings_mobile_menu_and_sticky_header',
	  	array(
	      'title' => esc_html__( 'Mobile menu and fixed header', 'iriska' ),
	      'panel' => 'iriska_layout_settings_panel'
	  	)
	  );

			// Sticky header
	  	$wp_customize->add_setting( 'iriska_sticky_header',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_sticky_header',
				array(
					'label' => esc_html__( 'Fixed header', 'iriska' ), 
					'type' => 'checkbox',
					'section' => 'iriska_header_settings_mobile_menu_and_sticky_header',
					'settings' => 'iriska_sticky_header'
				))
			);

			// Mobile menu
			$wp_customize->add_setting( 'iriska_mobile_menu',
				array(
					'default' => 1200,
					'sanitize_callback' => 'iriska_sanitize_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_mobile_menu',
				array(
					'label' => esc_html__( 'Mobile menu (px)', 'iriska' ),
					'description' => esc_html__( 'Set the value at which the mobile menu will be enabled instead of the usual one.', 'iriska' ),
					'section' => 'iriska_header_settings_mobile_menu_and_sticky_header',
					'settings' => 'iriska_mobile_menu',
					'input_attrs' => array(
						'min' => 0,
						'max' => 5000,
						'step' => 1
					)
				))
			);

			// Mobile menu for all screens
			$wp_customize->add_setting( 'iriska_mobile_menu_for_all_screens',
				array(
					'default' => 0,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_mobile_menu_for_all_screens',
				array(
					'label' => esc_html__( 'Mobile menu for all screens', 'iriska' ),
					'description' => esc_html__( 'Mobile menu for all screens. Setting above will not work if you enable this setting.', 'iriska' ), 
					'type' => 'checkbox',
					'section' => 'iriska_header_settings_mobile_menu_and_sticky_header',
					'settings' => 'iriska_mobile_menu_for_all_screens'
				))
			);

		// Single Post Layout Settings
		$wp_customize->add_section( 'iriska_single_post_settings_layout',
	  	array(
	      'title' => esc_html__( 'Single post layout', 'iriska' ),
	      'panel' => 'iriska_layout_settings_panel'
	  	)
	  );

			// Show sidebar
			$wp_customize->add_setting( 'iriska_single_post_show_sidebar',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

	  	$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_single_post_show_sidebar',
				array(
					'label' => esc_html__( 'Display sidebar', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_single_post_settings_layout',
					'settings' => 'iriska_single_post_show_sidebar'
				))
			);

	  	// Show post date
	  	$wp_customize->add_setting( 'iriska_single_post_show_post_date',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

	  	$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_single_post_show_post_date',
				array(
					'label' => esc_html__( 'Display publication date', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_single_post_settings_layout',
					'settings' => 'iriska_single_post_show_post_date'
				))
			);

	  	// Show author of post
			$wp_customize->add_setting( 'iriska_single_post_show_author',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_single_post_show_author',
				array(
					'label' => esc_html__( 'Display author', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_single_post_settings_layout',
					'settings' => 'iriska_single_post_show_author'
				))
			);

			// Show comments count
			$wp_customize->add_setting( 'iriska_single_post_show_comments',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_single_post_show_comments',
				array(
					'label' => esc_html__( 'Display comments', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_single_post_settings_layout',
					'settings' => 'iriska_single_post_show_comments'
				))
			);

			// Show categories
			$wp_customize->add_setting( 'iriska_single_post_show_categories',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_single_post_show_categories',
				array(
					'label' => esc_html__( 'Display categories', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_single_post_settings_layout',
					'settings' => 'iriska_single_post_show_categories'
				))
			);

			// Show tags
			$wp_customize->add_setting( 'iriska_single_post_show_tags',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_single_post_show_tags',
				array(
					'label' => esc_html__( 'Display tags', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_single_post_settings_layout',
					'settings' => 'iriska_single_post_show_tags'
				))
			);

			// Show post navigation
			$wp_customize->add_setting( 'iriska_display_single_post_nav_links',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_display_single_post_nav_links',
				array(
					'label' => esc_html__( 'Display buttons Previous post/Next post', 'iriska' ), 
					'type' => 'checkbox',
					'section' => 'iriska_single_post_settings_layout',
					'settings' => 'iriska_display_single_post_nav_links'
				))
			);

			// Display author info of post
	  	$wp_customize->add_setting( 'iriska_display_single_post_author_info',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_display_single_post_author_info',
				array(
					'label' => esc_html__( 'Display info about the author', 'iriska' ), 
					'type' => 'checkbox',
					'section' => 'iriska_single_post_settings_layout',
					'settings' => 'iriska_display_single_post_author_info'
				))
			);

			// Display widgets area
	  	$wp_customize->add_setting( 'iriska_display_single_post_widgets_area',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_display_single_post_widgets_area',
				array(
					'label' => esc_html__( 'Display widget area on single post', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_single_post_settings_layout',
					'settings' => 'iriska_display_single_post_widgets_area'
				))
			);

			// Widgets width in the widget area
			$wp_customize->add_setting( 'iriska_single_post_widget_area_widgets_width',
				array(
					'default' => 100,
					'sanitize_callback' => 'iriska_sanitize_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_single_post_widget_area_widgets_width',
				array(
					'label' => esc_html__( 'Width of widgets in the widgets area of post', 'iriska' ),
					'settings' => 'iriska_single_post_widget_area_widgets_width',
					'section' => 'iriska_single_post_settings_layout',
					'input_attrs' => array(
						'min' => 50,
						'max' => 100,
						'step' => 50
					)
				))
			);

			// Display latest posts
			$wp_customize->add_setting( 'iriska_display_single_post_latest_posts',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_display_single_post_latest_posts',
				array(
					'label' => esc_html__( 'Display latest posts', 'iriska' ), 
					'type' => 'checkbox',
					'section' => 'iriska_single_post_settings_layout',
					'settings' => 'iriska_display_single_post_latest_posts'
				))
			);

			// Latest posts count
			$wp_customize->add_setting( 'iriska_single_post_latest_posts_count',
				array(
					'default' => 6,
					'sanitize_callback' => 'iriska_sanitize_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_single_post_latest_posts_count',
				array(
					'label' => esc_html__( 'Number of latest posts', 'iriska' ),
					'settings' => 'iriska_single_post_latest_posts_count',
					'section' => 'iriska_single_post_settings_layout',
					'input_attrs' => array(
						'min' => 2,
						'max' => 20,
						'step' => 2
					)
				))
			);

			// Latest post title length
			$wp_customize->add_setting( 'iriska_single_post_latest_title_length',
				array(
					'default' => 30,
					'sanitize_callback' => 'iriska_sanitize_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_single_post_latest_title_length',
				array(
					'label' => esc_html__( 'The length of the last posts titles', 'iriska' ),
					'settings' => 'iriska_single_post_latest_title_length',
					'section' => 'iriska_single_post_settings_layout',
					'input_attrs' => array(
						'min' => 10,
						'max' => 200,
						'step' => 1
					)
				))
			);

			// Show thumbnails in the lastest post without thumbnails
			$wp_customize->add_setting( 'iriska_single_post_latest_posts_show_thumbnails',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_single_post_latest_posts_show_thumbnails',
				array(
					'label' => esc_html__( 'Display thumbnails in posts without thumbnails', 'iriska' ),
					'description' => esc_html__( 'Accent color is displayed.', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_single_post_settings_layout',
					'settings' => 'iriska_single_post_latest_posts_show_thumbnails'
				))
			);

			// Show post date in the latest post
			$wp_customize->add_setting( 'iriska_single_post_latest_posts_show_post_date',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_single_post_latest_posts_show_post_date',
				array(
					'label' => esc_html__( 'Display publication date in latest posts.', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_single_post_settings_layout',
					'settings' => 'iriska_single_post_latest_posts_show_post_date'
				))
			);

		// Single Page Layout Settings
		$wp_customize->add_section( 'iriska_single_page_settings_layout',
	  	array(
	      'title' => esc_html__( 'Single page layout', 'iriska' ),
	      'panel' => 'iriska_layout_settings_panel'
	  	)
	  );

			// Show Sidebar
			$wp_customize->add_setting( 'iriska_single_page_show_sidebar',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

	  	$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_single_page_show_sidebar',
				array(
					'label' => esc_html__( 'Display sidebar', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_single_page_settings_layout',
					'settings' => 'iriska_single_page_show_sidebar'
				))
			);

	  // Archives Layout Settings
		$wp_customize->add_section( 'iriska_archives_settings_layout',
	  	array(
	      'title' => esc_html__( 'Archives layout', 'iriska' ),
	      'panel' => 'iriska_layout_settings_panel'
	  	)
	  );

			// Show sidebar
	  	$wp_customize->add_setting( 'iriska_archives_show_sidebar',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

	  	$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_archives_show_sidebar',
				array(
					'label' => esc_html__( 'Display sidebar', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_archives_settings_layout',
					'settings' => 'iriska_archives_show_sidebar'
				))
			);

	  	// Show thumbnails in the post without thumbnails
	  	$wp_customize->add_setting( 'iriska_archives_posts_show_thumbnails',
				array(
					'default' => 0,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_archives_posts_show_thumbnails',
				array(
					'label' => esc_html__( 'Display thumbnails in posts without thumbnails', 'iriska' ),
					'description' => esc_html__( 'Accent color is displayed.', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_archives_settings_layout',
					'settings' => 'iriska_archives_posts_show_thumbnails'
				))
			);

			// Show post date
			$wp_customize->add_setting( 'iriska_archives_posts_show_post_date',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_archives_posts_show_post_date',
				array(
					'label' => esc_html__( 'Display publication date', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_archives_settings_layout',
					'settings' => 'iriska_archives_posts_show_post_date'
				))
			);

			// Show author of post
			$wp_customize->add_setting( 'iriska_archives_posts_show_author',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_archives_posts_show_author',
				array(
					'label' => esc_html__( 'Display author', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_archives_settings_layout',
					'settings' => 'iriska_archives_posts_show_author'
				))
			);

			// Show comments
			$wp_customize->add_setting( 'iriska_archives_posts_show_comments',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_archives_posts_show_comments',
				array(
					'label' => esc_html__( 'Display comments', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_archives_settings_layout',
					'settings' => 'iriska_archives_posts_show_comments'
				))
			);

			// Show categories
			$wp_customize->add_setting( 'iriska_archives_posts_show_categories',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_archives_posts_show_categories',
				array(
					'label' => esc_html__( 'Display categories', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_archives_settings_layout',
					'settings' => 'iriska_archives_posts_show_categories'
				))
			);

			// Show tags
			$wp_customize->add_setting( 'iriska_archives_posts_show_tags',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_archives_posts_show_tags',
				array(
					'label' => esc_html__( 'Display tags', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_archives_settings_layout',
					'settings' => 'iriska_archives_posts_show_tags'
				))
			);

			// Post preview content length
			$wp_customize->add_setting( 'iriska_archives_post_preview_content_length',
				array(
					'default' => 25,
					'sanitize_callback' => 'iriska_sanitize_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_archives_post_preview_content_length',
				array(
					'label' => esc_html__( 'The length of the text in the post preview', 'iriska' ),
					'settings' => 'iriska_archives_post_preview_content_length',
					'section' => 'iriska_archives_settings_layout',
					'input_attrs' => array(
						'min' => 10,
						'max' => 100,
						'step' => 1
					)
				))
			);  

		// Content Layout Settings
		$wp_customize->add_section( 'iriska_content_settings_layout',
	  	array(
	      'title' => esc_html__( 'Content layout', 'iriska' ),
	      'panel' => 'iriska_layout_settings_panel'
	  	)
	  );

			// Content width
	  	$wp_customize->add_setting( 'iriska_content_width',
				array(
					'default' => 1170,
					'sanitize_callback' => 'iriska_sanitize_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_content_width',
				array(
					'label' => esc_html__( 'Content max width (px)', 'iriska' ),
					'settings' => 'iriska_content_width',
					'section' => 'iriska_content_settings_layout',
					'input_attrs' => array(
						'min' => 800,
						'max' => 2000,
						'step' => 1
					)
				))
			);

			// Full width content
			$wp_customize->add_setting( 'iriska_full_width_content',
				array(
					'default' => 0,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_full_width_content',
				array(
					'label' => esc_html__( 'Full width', 'iriska' ), 
					'description' => esc_html__( 'If enabled, the container will be 100% width. The "Content max width (px)" setting will not work if this setting is enabled.', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_content_settings_layout',
					'settings' => 'iriska_full_width_content'
				))
			);

			// Smooth scroll
			$wp_customize->add_setting( 'iriska_smooth_scroll',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

			$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_smooth_scroll',
				array(
					'label' => esc_html__( 'Smooth scroll', 'iriska' ), 
					'description' => esc_html__( 'Smooth scrolling through blocks (if the link contains the "id" of the block). Disable this setting if it conflicts with scripts from other plugins.', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_content_settings_layout',
					'settings' => 'iriska_smooth_scroll'
				))
			);

	  // 404 Page Layout Settings
	  $wp_customize->add_section( 'iriska_404_page_settings_layout',
	  	array(
	      'title' => esc_html__( 'Layout 404 page', 'iriska' ),
	      'panel' => 'iriska_layout_settings_panel'
	  	)
	  );

	  	// Show Sidebar
	  	$wp_customize->add_setting( 'iriska_404_page_show_sidebar',
				array(
					'default' => 1,
					'sanitize_callback' => 'iriska_switch_sanitization'
				)
			);

	  	$wp_customize->add_control( new Iriska_Toggle_Switch_Custom_Control( $wp_customize, 'iriska_404_page_show_sidebar',
				array(
					'label' => esc_html__( 'Display sidebar', 'iriska' ),
					'type' => 'checkbox',
					'section' => 'iriska_404_page_settings_layout',
					'settings' => 'iriska_404_page_show_sidebar'
				))
			);

		// Footer Layout Settings For Large Screens
		$wp_customize->add_section( 'iriska_footer_settings_layout_large_screens',
	  	array(
	      'title' => esc_html__( 'Footer layout for large screens', 'iriska' ),
	      'description' => esc_html__( 'Set the width of the widget areas for large screens (from 980px and up). To make changes visible, place widgets in these areas.', 'iriska' ),
	      'panel' => 'iriska_layout_settings_panel'
	  	)
	  );

			// Width widgets area 1
	  	$wp_customize->add_setting( 'iriska_width_footer_widgets_area_1_large_screens',
				array(
					'default' => 25,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_width_footer_widgets_area_1_large_screens',
				array(
					'label' => esc_html__( 'Widget area width 1 (%)', 'iriska' ),
					'settings' => 'iriska_width_footer_widgets_area_1_large_screens',
					'section' => 'iriska_footer_settings_layout_large_screens',
					'input_attrs' => array(
						'min' => 0,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

			// Width widgets area 2
			$wp_customize->add_setting( 'iriska_width_footer_widgets_area_2_large_screens',
				array(
					'default' => 25,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_width_footer_widgets_area_2_large_screens',
				array(
					'label' => esc_html__( 'Widget area width 2 (%)', 'iriska' ),
					'settings' => 'iriska_width_footer_widgets_area_2_large_screens',
					'section' => 'iriska_footer_settings_layout_large_screens',
					'input_attrs' => array(
						'min' => 0,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

			// Width widgets area 3
			$wp_customize->add_setting( 'iriska_width_footer_widgets_area_3_large_screens',
				array(
					'default' => 25,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_width_footer_widgets_area_3_large_screens',
				array(
					'label' => esc_html__( 'Widget area width 3 (%)', 'iriska' ),
					'settings' => 'iriska_width_footer_widgets_area_3_large_screens',
					'section' => 'iriska_footer_settings_layout_large_screens',
					'input_attrs' => array(
						'min' => 0,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

			// Width widgets area 4
			$wp_customize->add_setting( 'iriska_width_footer_widgets_area_4_large_screens',
				array(
					'default' => 25,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_width_footer_widgets_area_4_large_screens',
				array(
					'label' => esc_html__( 'Widget area width 4 (%)', 'iriska' ),
					'settings' => 'iriska_width_footer_widgets_area_4_large_screens',
					'section' => 'iriska_footer_settings_layout_large_screens',
					'input_attrs' => array(
						'min' => 0,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

		// Footer Layout Settings For Medium Screens
		$wp_customize->add_section( 'iriska_footer_settings_layout_medium_screens',
	  	array(
	      'title' => esc_html__( 'Footer layout for medium screens', 'iriska' ),
	      'description' => esc_html__( 'Set the width of the widget areas for medium screens (from 768px to 980px). To make changes visible, place widgets in these areas.', 'iriska' ),
	      'panel' => 'iriska_layout_settings_panel'
	  	)
	  );

			// Width widgets area 1
			$wp_customize->add_setting( 'iriska_width_footer_widgets_area_1_medium_screens',
				array(
					'default' => 50,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_width_footer_widgets_area_1_medium_screens',
				array(
					'label' => esc_html__( 'Widget area width 1 (%)', 'iriska' ),
					'settings' => 'iriska_width_footer_widgets_area_1_medium_screens',
					'section' => 'iriska_footer_settings_layout_medium_screens',
					'input_attrs' => array(
						'min' => 0,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

			// Width widgets area 2
			$wp_customize->add_setting( 'iriska_width_footer_widgets_area_2_medium_screens',
				array(
					'default' => 50,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_width_footer_widgets_area_2_medium_screens',
				array(
					'label' => esc_html__( 'Widget area width 2 (%)', 'iriska' ),
					'settings' => 'iriska_width_footer_widgets_area_2_medium_screens',
					'section' => 'iriska_footer_settings_layout_medium_screens',
					'input_attrs' => array(
						'min' => 0,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

			// Width widgets area 3
			$wp_customize->add_setting( 'iriska_width_footer_widgets_area_3_medium_screens',
				array(
					'default' => 50,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_width_footer_widgets_area_3_medium_screens',
				array(
					'label' => esc_html__( 'Widget area width 3 (%)', 'iriska' ),
					'settings' => 'iriska_width_footer_widgets_area_3_medium_screens',
					'section' => 'iriska_footer_settings_layout_medium_screens',
					'input_attrs' => array(
						'min' => 0,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

			// Width widgets area 4
			$wp_customize->add_setting( 'iriska_width_footer_widgets_area_4_medium_screens',
				array(
					'default' => 50,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_width_footer_widgets_area_4_medium_screens',
				array(
					'label' => esc_html__( 'Widget area width 4 (%)', 'iriska' ),
					'settings' => 'iriska_width_footer_widgets_area_4_medium_screens',
					'section' => 'iriska_footer_settings_layout_medium_screens',
					'input_attrs' => array(
						'min' => 0,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

		// Footer Layout Settings For Small Screens
		$wp_customize->add_section( 'iriska_footer_settings_layout_small_screens',
	  	array(
	      'title' => esc_html__( 'Footer layout for small screens', 'iriska' ),
	      'description' => esc_html__( 'Set the width of the widget areas for small screens (up to 768px). To make changes visible, place widgets in these areas.', 'iriska' ),
	      'panel' => 'iriska_layout_settings_panel'
	  	)
	  );

			// Width widgets area 1
			$wp_customize->add_setting( 'iriska_width_footer_widgets_area_1_small_screens',
				array(
					'default' => 100,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_width_footer_widgets_area_1_small_screens',
				array(
					'label' => esc_html__( 'Widget area width 1 (%)', 'iriska' ),
					'settings' => 'iriska_width_footer_widgets_area_1_small_screens',
					'section' => 'iriska_footer_settings_layout_small_screens',
					'input_attrs' => array(
						'min' => 0,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

			// Width widgets area 2
			$wp_customize->add_setting( 'iriska_width_footer_widgets_area_2_small_screens',
				array(
					'default' => 100,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_width_footer_widgets_area_2_small_screens',
				array(
					'label' => esc_html__( 'Widget area width 2 (%)', 'iriska' ),
					'settings' => 'iriska_width_footer_widgets_area_2_small_screens',
					'section' => 'iriska_footer_settings_layout_small_screens',
					'input_attrs' => array(
						'min' => 0,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

			// Width widgets area 3
			$wp_customize->add_setting( 'iriska_width_footer_widgets_area_3_small_screens',
				array(
					'default' => 100,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_width_footer_widgets_area_3_small_screens',
				array(
					'label' => esc_html__( 'Widget area width 3 (%)', 'iriska' ),
					'settings' => 'iriska_width_footer_widgets_area_3_small_screens',
					'section' => 'iriska_footer_settings_layout_small_screens',
					'input_attrs' => array(
						'min' => 0,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

			// Width widgets area 4
			$wp_customize->add_setting( 'iriska_width_footer_widgets_area_4_small_screens',
				array(
					'default' => 100,
					'sanitize_callback' => 'iriska_sanitize_float_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_width_footer_widgets_area_4_small_screens',
				array(
					'label' => esc_html__( 'Widget area width 4 (%)', 'iriska' ),
					'settings' => 'iriska_width_footer_widgets_area_4_small_screens',
					'section' => 'iriska_footer_settings_layout_small_screens',
					'input_attrs' => array(
						'min' => 0,
						'max' => 100,
						'step' => 0.01
					)
				))
			);

		// Fotter Copyright Area Settings
		$wp_customize->add_section( 'iriska_footer_settings_layout_copyright_area',
	  	array(
	      'title' => esc_html__( 'Footer copyright area', 'iriska' ),
	      'panel' => 'iriska_layout_settings_panel'
	  	)
	  );

			// Copyright text
			// Used the "wp_kses_post" function to save HTML tags when saved to the database.
			$wp_customize->add_setting( 'iriska_footer_copyright_text',
				array(
					// translators: %1$s: link to WordPress, %2$s: link to Iriska Theme
					'default' => sprintf( esc_html__( 'Site powered by %1$s | Theme: %2$s', 'iriska' ), '<a href="https://wordpress.org/">WordPress</a>', '<a href="http://iriska.myspaceship.space">Iriska</a>' ),
					'sanitize_callback' => 'wp_kses_post'
				)
			);

			$wp_customize->add_control( new Iriska_TinyMCE_Custom_Control( $wp_customize, 'iriska_footer_copyright_text',
				array(
					'label' => esc_html__( 'Copyright text', 'iriska' ),
					'section' => 'iriska_footer_settings_layout_copyright_area',
					'input_attrs' => array(
						'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
						'toolbar2' => 'formatselect outdent indent | blockquote charmap',
					)
				))
			);

	// Typography
	$wp_customize->add_panel( 'iriska_typography_settings_panel', 
		array(
	    'title' => esc_html__( 'Theme Typography Settings', 'iriska' ),
	    'capability' => 'edit_theme_options'
	  ) 
	);

		// Fonts
		$wp_customize->add_section( 'iriska_typography_settings_fonts',
	  	array(
	      'title' => esc_html__( 'Fonts', 'iriska' ),
	      // translators: %1$s: link to documentation
	      'description' => sprintf( esc_html__( 'Place the font link in the boxes below. Font for text and font for headlines. In the CSS field, place the CSS code (without "font-family:"). It is recommended to use Google Fonts. There you will also find the CSS code. To return the original values, copy the link and CSS code from the description of the settings and place in the desired field. %1$s', 'iriska' ), '<a href="http://iriska.myspaceship.space/documentation/" target="_blank">' . esc_html__( 'Read more in the theme documentation', 'iriska' ) . '</a>' ),
	      'panel' => 'iriska_typography_settings_panel'
	  	)
	  );

			// Content font
			$wp_customize->add_setting( 'iriska_content_font',
				array(
					'default' => 'https://fonts.googleapis.com/css?family=Montserrat:400,500',
					'sanitize_callback' => 'esc_url'
				)
			);

			$wp_customize->add_control( 'iriska_content_font',
				array(
					'label' => esc_html__( 'Content font', 'iriska' ),
					// translators: %1$s: link to Google Font
					'description' => sprintf( esc_html__( 'Initially: %1$s', 'iriska' ), 'https://fonts.googleapis.com/css?family=Montserrat:400,500' ),
					'type' => 'text',
					'section' => 'iriska_typography_settings_fonts',
					'settings' => 'iriska_content_font'
				)
			);

			// Content font css
			$wp_customize->add_setting( 'iriska_content_font_css',
				array(
					'default' => '"Montserrat", sans-serif',
					'sanitize_callback' => 'sanitize_text_field'
				)
			);

			$wp_customize->add_control( 'iriska_content_font_css',
				array(
					'label' => esc_html__( 'CSS code for content font (without "font-family:")', 'iriska' ),
					// translators: %1$s: CSS code
					'description' => sprintf( esc_html__( 'Initially: %1$s', 'iriska' ), '"Montserrat", sans-serif;' ),
					'type' => 'text',
					'section' => 'iriska_typography_settings_fonts',
					'settings' => 'iriska_content_font_css'
				)
			);

			// Content font weight
			$wp_customize->add_setting( 'iriska_content_font_weight',
				array(
					'default' => 400,
					'sanitize_callback' => 'iriska_sanitize_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_content_font_weight',
				array(
					'label' => esc_html__( 'Content font weight', 'iriska' ),
					'settings' => 'iriska_content_font_weight',
					'section' => 'iriska_typography_settings_fonts',
					'input_attrs' => array(
						'min' => 100,
						'max' => 900,
						'step' => 100
					)
				))
			);

			// Headings font
			$wp_customize->add_setting( 'iriska_headings_font',
				array(
					'default' => 'https://fonts.googleapis.com/css?family=Inconsolata',
					'sanitize_callback' => 'esc_url'
				)
			);

			$wp_customize->add_control( 'iriska_headings_font',
				array(
					'label' => esc_html__( 'Headings font', 'iriska' ),
					// translators: %1$s: link to Google Font
					'description' => sprintf( esc_html__( 'Initially: %1$s', 'iriska' ), 'https://fonts.googleapis.com/css?family=Inconsolata' ),
					'type' => 'text',
					'section' => 'iriska_typography_settings_fonts',
					'settings' => 'iriska_headings_font'
				)
			);

			// Headings font css
			$wp_customize->add_setting( 'iriska_headings_font_css',
				array(
					'default' => '"Inconsolata", monospace',
					'sanitize_callback' => 'sanitize_text_field'
				)
			);

			$wp_customize->add_control( 'iriska_headings_font_css',
				array(
					'label' => esc_html__( 'CSS code for headings font (without "font-family:")', 'iriska' ),
					// translators: %1$s: CSS code
					'description' => sprintf( esc_html__( 'Initially: %1$s', 'iriska' ), '"Inconsolata", monospace;' ),
					'type' => 'text',
					'section' => 'iriska_typography_settings_fonts',
					'settings' => 'iriska_headings_font_css'
				)
			);

			// Headings font weight
			$wp_customize->add_setting( 'iriska_headings_font_weight',
				array(
					'default' => 400,
					'sanitize_callback' => 'iriska_sanitize_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_headings_font_weight',
				array(
					'label' => esc_html__( 'Headings font weight', 'iriska' ),
					'settings' => 'iriska_headings_font_weight',
					'section' => 'iriska_typography_settings_fonts',
					'input_attrs' => array(
						'min' => 100,
						'max' => 900,
						'step' => 100
					)
				))
			);

			// Elements font weight
			$wp_customize->add_setting( 'iriska_elements_font_weight',
				array(
					'default' => 500,
					'sanitize_callback' => 'iriska_sanitize_integer'
				)
			);

			$wp_customize->add_control( new Iriska_Slider_Custom_Control( $wp_customize, 'iriska_elements_font_weight',
				array(
					'label' => esc_html__( 'Font weight of some elements', 'iriska' ),
					'settings' => 'iriska_elements_font_weight',
					'section' => 'iriska_typography_settings_fonts',
					'input_attrs' => array(
						'min' => 500,
						'max' => 900,
						'step' => 100
					)
				))
			);
}
add_action( 'customize_register', 'iriska_customizer_settings' );