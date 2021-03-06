<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package 99colorthemes
 * @subpackage PageLine
 * @since PageLine 1.0
 */
if ( ! class_exists( 'WP_Customize_Control' ) )
  return NULL;

/**
 * Class theme important links starts.
 */
   class PageLine_Important_Links extends WP_Customize_Control {

      public $type = "pageline-important-links";

      public function render_content() {
         //Add Theme instruction, Support Forum, Demo Link, Rating Link
         $important_links = array(
            'theme-info' => array(
               'link' => esc_url('http://99colorthemes.com/themes/pageline/'),
               'text' => esc_html__('Theme Info', 'pageline'),
            ),
            'support' => array(
               'link' => esc_url('http://99colorthemes.com/support-forum/'),
               'text' => esc_html__('Support Forum', 'pageline'),
            ),
            'documentation' => array(
               'link' => esc_url('http://docs.99colorthemes.com/pageline/'),
               'text' => esc_html__('Documentation', 'pageline'),
            ),
            'demo' => array(
               'link' => esc_url('http://demo.99colorthemes.com/pageline/'),
               'text' => esc_html__('View Demo', 'pageline'),
            ),
            'rating' => array(
               'link' => esc_url('http://wordpress.org/support/view/theme-reviews/pageline?filter=5'),
               'text' => esc_html__('Rate this theme', 'pageline'),
            ),
         );
         foreach ($important_links as $important_link) {
            echo '<p><a target="_blank" href="' . esc_url( $important_link['link'] ) . '" >' . esc_attr($important_link['text']) . ' </a></p>';
         }
      }

   }

/**
 * Class PageLine_Image_Radio_Control
 */
class PageLine_Image_Radio_Control extends WP_Customize_Control {

	public function render_content() {

	if ( empty( $this->choices ) )
		return;

	$name = '_customize-radio-' . $this->id;

	?>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

	<ul class="controls" id = 'pageline-img-container'>

	<?php	foreach ( $this->choices as $value => $label ) :

			$class = ($this->value() == $value)?'pageline-radio-img-selected pageline-radio-img-img':'pageline-radio-img-img';

			?>

			<li style="display: inline;">

			<label>

				<input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />

				<img src = '<?php echo esc_html( $label ); ?>' class = '<?php echo esc_attr( $class) ; ?>' />

			</label>

			</li>

			<?php	endforeach;	?>

	</ul>

	<?php
	}
}
