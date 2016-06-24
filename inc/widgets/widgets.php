<?php
/**
 * Contains all the functions related to sidebar and widget.
 *
 * @package 99colorthemes
 * @subpackage PageLine
 * @since PageLine 1.0
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pageline_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Right', 'pageline' ),
		'id'            => 'pageline_sidebar_right',
		'description'   => esc_html__( 'Add widgets in your right sidebar of  theme.', 'pageline' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Left', 'pageline' ),
		'id'            => 'pageline_sidebar_left',
		'description'   => esc_html__( 'Add widgets in your left sidebar of  theme.', 'pageline' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
  register_sidebar( array(
    'name'          => esc_html__( 'Footer Sidebar First', 'pageline' ),
    'id'            => 'pageline_footer_section_1',
    'description'   => esc_html__( 'Add widgets in your left sidebar of  theme.', 'pageline' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Footer Sidebar Second', 'pageline' ),
    'id'            => 'pageline_footer_section_2',
    'description'   => esc_html__( 'Add widgets in your left sidebar of  theme.', 'pageline' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Footer Sidebar Third', 'pageline' ),
    'id'            => 'pageline_footer_section_3',
    'description'   => esc_html__( 'Add widgets in your left sidebar of  theme.', 'pageline' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Footer Sidebar Fourth', 'pageline' ),
    'id'            => 'pageline_footer_section_4',
    'description'   => esc_html__( 'Add widgets in your left sidebar of  theme.', 'pageline' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );
	register_sidebar( array(
		'name'          => esc_html__( 'Front page builder', 'pageline' ),
		'id'            => 'pageline_frontpage_section',
		'description'   => esc_html__( 'Add widgets in your front page content area.', 'pageline' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

  register_widget( "pageline_about_us_widget" );
  register_widget( "pageline_services_widget" );
  register_widget( "pageline_blog_posts_widget" );
  register_widget( "pageline_funs_widget" );
  register_widget( "pageline_cta_widget" );
  register_widget( "pageline_project_widget" );
  register_widget( "pageline_testimonials_widget" );
  register_widget( "pageline_contact_widget" );
  
}
add_action( 'widgets_init', 'pageline_widgets_init' );

/**
 * About Us Widget section.
 */
class pageline_about_us_widget extends WP_Widget {
  function __construct() {
  $widget_ops           = array( 
      'classname'       => 'widget_about_us_block', 
      'description'     => esc_html__( 'Display about us details of page content.', 'pageline' ) 
    );
    $control_ops        = array( 
      'width'           => 200, 
      'height'          =>250 
    );
    parent::__construct( 
      false, 
      $name             = esc_html__( 'NNC: About Us', 'pageline' ), 
      $widget_ops, 
      $control_ops
    );
  }// end of construct.

  function form( $instance ) {
    $defaults[ 'menu_id' ] = '';
    $defaults[ 'title' ] = '';
    $defaults[ 'text' ]  = '';
    $defaults[ 'page' ]  = '';
    $defaults[ 'type' ]  = 'excerpt';
    $instance            = wp_parse_args( (array) $instance, $defaults );
    $menu_id               = $instance[ 'menu_id' ];
    $title               = $instance[ 'title' ];
    $text                = $instance[ 'text' ];
    $page                = $instance[ 'page' ];
    $type                = $instance[ 'type' ];
    ?>
    <p><?php esc_html_e( 'Note: Enter the Section ID and use same for Menu item. Only used for One Page Menu.', 'pageline' ); ?>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('menu_id'); ?>"><?php esc_html_e( 'Section ID:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id('menu_id'); ?>" class="widefat" name="<?php echo $this->get_field_name('menu_id'); ?>" type="text" value="<?php echo esc_attr( $menu_id ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php esc_html_e( 'Description','pageline' ); ?>
    <textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_textarea( $text ); ?></textarea>
    <p>
      <label for="<?php echo $this->get_field_id( 'page' ); ?>"><?php esc_html_e( 'Page', 'pageline' ); ?>:</label>
      <?php wp_dropdown_pages( array(
        'class'             => 'widefat',
        'name'              => $this->get_field_name( 'page' ),
        'selected'          => $page
        )
      )
      ?>
    </p>
    <p>
    <label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php esc_html_e( 'Content Display:', 'pageline' ); ?></label>
      <input type="radio" <?php checked( $type, 'excerpt' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'type' ); ?>" value="excerpt"/><?php esc_html_e( 'Excerpt', 'pageline' );?>
      <input type="radio" <?php checked( $type,'full' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'type' ); ?>" value="full"/><?php esc_html_e( 'Full', 'pageline' );?>
    </p>
  <?php
  }// end of form function.

  function update( $new_instance, $old_instance ) {
    $instance                 = $old_instance; 
    $instance[ 'menu_id' ]      = sanitize_text_field( $new_instance[ 'menu_id' ] );
    $instance[ 'title' ]      = sanitize_text_field( $new_instance[ 'title' ] );
    $instance[ 'page' ]       = absint( $new_instance[ 'page' ] );
    $instance[ 'type' ]      = sanitize_text_field( $new_instance[ 'type' ] );

    if ( current_user_can('unfiltered_html') )
      $instance[ 'text' ]     =  $new_instance[ 'text' ];
    else
      $instance[ 'text' ]     = stripslashes( wp_filter_post_kses( addslashes( $new_instance[ 'text' ] ) ) ); 
      // wp_filter_post_kses() expects slashed
    return $instance;
  }// end of update function.

  function widget( $args, $instance ) {
    extract( $args );
    extract( $instance );

    global $post;
    $menu_id                    = isset( $instance[ 'menu_id' ] ) ? $instance[ 'menu_id' ] : '';
    $title                    = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '');
    $text                     = apply_filters( 'widget_text', empty( $instance['text' ] ) ? '' : $instance[ 'text' ], $instance );
    $page                     = isset( $instance[ 'page' ] ) ? $instance[ 'page' ] : '';
    $type                    = isset( $instance[ 'type' ] ) ? $instance[ 'type' ] : '';

    $get_pages = new WP_Query( array(
       'posts_per_page'     => 1,
       'post_type'          =>  array( 'page' ),
       'page_id'           => $page
    ) );
    ?>

    <?php echo $before_widget; ?>
    <!-- About-start -->
    <div id="<?php echo esc_attr( $menu_id ); ?>" class="nnc-about">
      <div class="nnc-container">
      <?php if ( !empty( $title ) || !empty( $text ) ) : ?>
        <div class="nnc-title">
          <?php if ( !empty( $title ) ) {
            echo '<h2>'.esc_attr( $title ).'<span></span></h2>';
          }
          ?>
          <?php if ( !empty( $text ) ) {
            echo '<p>'.esc_textarea( $text ).'</p>';
          }?>
          
        </div>
      <?php endif; ?>

      <?php if ( !empty( $page ) ) : ?>
        <div class="nnc-about-content">
        <?php while ( $get_pages->have_posts() ) : $get_pages->the_post(); ?>
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="nnc-about-img">
              <?php the_post_thumbnail( 'pageline-about' ); ?>
            </div>
          <?php endif; ?>
          <div class="nnc-about-desc">
            <h4><?php the_title(); ?></h4>
            <?php if ( $type == 'excerpt' ) {
              the_excerpt();
            } else {
              the_content();
            }?>
            <a href="<?php the_permalink(); ?>"><?php echo esc_html( 'Read More', 'pageline' ); ?></a>
          </div>
          
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        </div>
      <?php endif; ?>
        
      </div>
    </div>
    <!-- About-end -->
    <?php echo $after_widget; ?>      
  <?php 
  }// end of widdget function.
}// end of apply for action widget.

/**
 * Services Widget section.
 */
class pageline_services_widget extends WP_Widget {
  function __construct() {
  $widget_ops           = array( 
      'classname'       => 'widget_services_block', 
      'description'     => esc_html__( 'Display about us details of page content.', 'pageline' ) 
    );
    $control_ops        = array( 
      'width'           => 200, 
      'height'          =>250 
    );
    parent::__construct( 
      false, 
      $name             = esc_html__( 'NNC: Services', 'pageline' ), 
      $widget_ops, 
      $control_ops
    );
  }// end of construct.

  function form( $instance ) {
    for ( $i=1; $i<=8; $i++ ) {
      $var                = 'page_id'.$i;
      $defaults[$var]     = '';
    }
    $defaults[ 'menu_id' ]  = '';
    $defaults[ 'title' ]  = '';
    $defaults[ 'text' ]   = '';
    $instance             = wp_parse_args( (array) $instance, $defaults );
    $menu_id                = $instance[ 'menu_id' ];
    $title                = $instance[ 'title' ];
    $text                 = $instance[ 'text' ];
    ?>
    <p><?php esc_html_e( 'Note: Enter the Section ID and use same for Menu item. Only used for One Page Menu.', 'pageline' ); ?>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('menu_id'); ?>"><?php esc_html_e( 'Section ID:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id('menu_id'); ?>" class="widefat" name="<?php echo $this->get_field_name('menu_id'); ?>" type="text" value="<?php echo esc_attr( $menu_id ); ?>" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php esc_html_e( 'Description','pageline' ); ?>
    <textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_textarea( $text ); ?></textarea>
    <p>
      <?php
      $url = 'http://fontawesome.io/icons/';
      $link = sprintf( wp_kses( __( '<a href="%s" target="_blank">Refer here</a> For Icon Class', 'pageline' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( $url ) );
      echo $link;
      ?>
    </p>

    <?php for( $i=1; $i<=8; $i++) {
      if( $i%2 != 0 ){ ?>
        <p>
          <label for="<?php echo $this->get_field_id( key( $defaults ) ); ?>"><?php esc_html_e( 'Page', 'pageline' ); ?>:</label>
          <?php wp_dropdown_pages(
            array( 
              'class' => 'widefat', 
              'show_option_none' =>esc_html__( '--- select ---', 'pageline' ), 
              'name' => $this->get_field_name( key( $defaults ) ), 
              'selected' => $instance[ key( $defaults ) ] 
            ) 
          ); ?>
        </p>
      <?php }
      elseif( $i%2 == 0 ) { ?>
        <p>
          <label for="<?php echo $this->get_field_id( key( $defaults ) ); ?>"><?php esc_html_e( 'Icon Class:', 'pageline' ); ?></label>
          <input id="<?php echo $this->get_field_id( key( $defaults ) ); ?>" class="widefat" name="<?php echo $this->get_field_name( key( $defaults ) ); ?>" placeholder="fa-check" type="text" value="<?php echo $instance[ key( $defaults ) ]; ?>" />
        </p>
      <?php }
      next( $defaults );// forwards the key of $defaults array
    }
  }// end of form function.

  function update( $new_instance, $old_instance ) {
    $instance                 = $old_instance;
    $instance[ 'menu_id' ]      = sanitize_text_field( $new_instance[ 'menu_id' ] );
    $instance[ 'title' ]      = sanitize_text_field( $new_instance[ 'title' ] );
    $instance[ 'page' ]       = absint( $new_instance[ 'page' ] );
    for( $i=1; $i<=8; $i++ ) {
      $var = 'page_id'.$i;
      if( $i%2 != 0 )
        $instance[ $var]      = absint( $new_instance[ $var ] );
      elseif( $i%2 == 0 )
        $instance[ $var ]     = wp_filter_nohtml_kses( $new_instance[ $var ] );
    }
    if ( current_user_can('unfiltered_html') )
      $instance[ 'text' ]     =  $new_instance[ 'text' ];
    else
      $instance[ 'text' ]     = stripslashes( wp_filter_post_kses( addslashes( $new_instance[ 'text' ] ) ) ); 
      // wp_filter_post_kses() expects slashed
    return $instance;
  }// end of update function.

  function widget( $args, $instance ) {
    extract( $args );
    extract( $instance );

    global $post;
    $menu_id              = isset( $instance[ 'menu_id' ] ) ? $instance[ 'menu_id' ] : '';
    $title                    = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '');
    $text                     = apply_filters( 'widget_text', empty( $instance['text' ] ) ? '' : $instance[ 'text' ], $instance );
    $page_array = array();
    $icon = array();
    for( $i=1; $i<=8; $i++ ) {
      $var                    = 'page_id'.$i;
      if( $i%2 != 0 ) {
        $page_id              = isset( $instance[ $var ] ) ? $instance[ $var ] : '';
      if( !empty( $page_id ) )
        array_push( $page_array, $page_id );// Push the page id in the array
      }
      elseif( $i%2 == 0 && !( empty( $page_id ) ) ) {
        $strn                 =  $instance[ $var ];
        array_push( $icon, $strn );
      }
    }
    $get_pages = new WP_Query( array(
       'posts_per_page'        => -1,
       'post_type'             =>  array( 'page' ),
       'post__in'              => $page_array,
       'orderby'               => 'post__in'
    ) );
    ?>
    <?php echo $before_widget; ?>
    <!-- Services-start --> 
    <div id="<?php echo esc_attr( $menu_id ); ?>" class="nnc-services">
      <div class="nnc-container">
        <?php if ( !empty( $title ) || !empty( $text ) ) : ?>
        <div class="nnc-title">
          <?php if ( !empty( $title ) ) {
            echo '<h2>'.esc_attr( $title ).'<span></span></h2>';
          }
          ?>
          <?php if ( !empty( $text ) ) {
            echo '<p>'.esc_textarea( $text ).'</p>';
          }?>
        </div>
      <?php endif; ?>

      <?php if ( !empty( $page_array ) ) : $key=0;?>
        <div class="nnc-service-box">
          <?php while ( $get_pages->have_posts() ) : $get_pages->the_post(); ?>
            <div class="nnc-service">
              <?php if( !empty ( $icon[$key] ) ) : ?>
                <div class="s-icon">
                  <i class="fa <?php echo esc_attr( $icon[$key] ); ?>"></i>
                </div>
              <?php endif; ?>
              <h4><?php the_title(); ?></h4>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>"><?php echo esc_html( 'Read More', 'pageline' ); ?></a>
            </div>
          <?php $key++; endwhile;?>
          <?php wp_reset_postdata(); ?>
        </div>
      <?php endif; ?>
      </div>  
    </div>
    <!-- Services-end -->
    <?php echo $after_widget; ?>      
  <?php 
  }// end of widdget function.
}// end of apply for action widget.

/**
 * Project Widget section.
 */
class pageline_project_widget extends WP_Widget {
  function __construct() {
  $widget_ops           = array( 
      'classname'       => 'widget_project_block', 
      'description'     => esc_html__( 'Display project.', 'pageline' ) 
    );
    $control_ops        = array( 
      'width'           => 200, 
      'height'          =>250 
    );
    parent::__construct( 
      false, 
      $name             = esc_html__( 'NNC: Project', 'pageline' ), 
      $widget_ops, 
      $control_ops
    );
  }// end of construct.

  function form( $instance ) {
    $defaults[ 'menu_id' ]    = '';
    $defaults[ 'title' ]    = '';
    $defaults[ 'text' ]     = '';
    $defaults[ 'number' ]   = 3;
    $defaults[ 'category' ] = '';
    $defaults[ 'btn-txt' ] = '';
    $defaults[ 'btn-url' ] = '';
    $instance               = wp_parse_args( (array) $instance, $defaults );
    $menu_id                  = $instance[ 'menu_id' ];
    $title                  = $instance[ 'title' ];
    $text                   = $instance[ 'text' ];
    $number                 = $instance[ 'number' ];
    $category               = $instance[ 'category' ];
    $btn_txt               = $instance[ 'btn-txt' ];
    $btn_url               = $instance[ 'btn-url' ];
    ?>
    <p><?php esc_html_e( 'Note: Enter the Section ID and use same for Menu item. Only used for One Page Menu.', 'pageline' ); ?>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('menu_id'); ?>"><?php esc_html_e( 'Section ID:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id('menu_id'); ?>" class="widefat" name="<?php echo $this->get_field_name('menu_id'); ?>" type="text" value="<?php echo esc_attr( $menu_id ); ?>" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>

    <?php esc_html_e( 'Description','pageline' ); ?>
    <textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_textarea( $text ); ?></textarea>

    <p>
      <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of posts to display:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'number' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" value="<?php echo $number; ?>" size="3" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php esc_html_e( 'Select category', 'pageline' ); ?>:</label>
      <?php wp_dropdown_categories(
        array(
        'class'               => 'widefat',
        'name'                => $this->get_field_name( 'category' ), 
        'selected'            => $category 
        ) 
      ); ?>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'btn-txt' ); ?>"><?php esc_html_e( 'Button Text:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'btn-txt' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'btn-txt' ); ?>" type="text" value="<?php echo esc_attr( $btn_txt ); ?>" size="3" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'btn-url' ); ?>"><?php esc_html_e( 'Button URL:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'btn-url' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'btn-url' ); ?>" type="text" value="<?php echo esc_url( $btn_url ); ?>" size="3" />
    </p>

    <p><?php esc_html_e( 'Info: To display project from specific category, select the Category in above radio option than select the category from the drop-down list.', 'pageline' ); ?></p>
  <?php
  }// end of form function.

  function update( $new_instance, $old_instance ) {
    $instance                 = $old_instance;
    $instance[ 'menu_id' ]      = sanitize_text_field( $new_instance[ 'menu_id' ] );
    $instance[ 'title' ]      = sanitize_text_field( $new_instance[ 'title' ] );
    $instance[ 'number' ]     = absint( $new_instance[ 'number' ] );
    $instance[ 'category' ]   = absint( $new_instance[ 'category' ] );
    $instance[ 'btn-txt' ]      = sanitize_text_field( $new_instance[ 'btn-txt' ] );
    $instance[ 'btn-url' ]      = esc_url_raw( $new_instance[ 'btn-url' ] );

    if ( current_user_can('unfiltered_html') )
      $instance[ 'text' ]     =  $new_instance[ 'text' ];
    else
      $instance[ 'text' ]     = stripslashes( wp_filter_post_kses( addslashes( $new_instance[ 'text' ] ) ) ); 
      // wp_filter_post_kses() expects slashed
    return $instance;
  }// end of update function.

  function widget( $args, $instance ) {
    extract( $args );
    extract( $instance );

    global $post;
    $menu_id = isset( $instance[ 'menu_id' ] ) ? $instance[ 'menu_id' ] : '';
    $title                    = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '');
    $text                     = apply_filters( 'widget_text', empty( $instance['text' ] ) ? '' : $instance[ 'text' ], $instance );
    $number = empty( $instance[ 'number' ] ) ? 3 : $instance[ 'number' ];
    $category = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
    $btn_txt = isset( $instance[ 'btn-txt' ] ) ? $instance[ 'btn-txt' ] : '';
    $btn_url = isset( $instance[ 'btn-url' ] ) ? $instance[ 'btn-url' ] : '';

    $get_featured_posts = new WP_Query( array(
        'posts_per_page'        => $number,
        'post_type'             => 'post',
        'category__in'          => $category
        ) );
    ?>
    <?php echo $before_widget; ?>

    <!-- Portfolio-start -->
    <div id="<?php echo esc_attr( $menu_id ); ?>" class="nnc-projects">
      <div class="nnc-container"> 
        <?php if ( !empty( $title ) || !empty( $text ) ) : ?>
        <div class="nnc-title">
          <?php if ( !empty( $title ) ) {
            echo '<h2>'.esc_attr( $title ).'<span></span></h2>';
          }
          ?>
          <?php if ( !empty( $text ) ) {
            echo '<p>'.esc_textarea( $text ).'</p>';
          }?>
          
        </div>
      <?php endif; ?>
      </div>
      <div class="nnc-list-project">
        <div class="nnc-container">
        <?php while( $get_featured_posts->have_posts() ):$get_featured_posts->the_post(); ?>
          <div class="nnc-project"> 
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'pageline-project' ); ?>
            <?php endif; ?>
            <div class="nnc-dtl-hover">
              <div class="nnc-project-dtl">
                <div class="nnc-inside-dtl">
                  <h4><?php the_title(); ?></h4>
                  <?php the_excerpt(); ?>
                  <a href="<?php the_permalink(); ?>"><?php echo esc_html( 'View Project', 'pageline' ); ?></a>
                </div>
              </div>
            </div> 
          </div>
        <?php endwhile;?>
        <?php wp_reset_postdata(); ?> 
        </div> 
      </div>

      <?php if ( $btn_txt != '' ) : ?>
        <div class="nnc-view-all">
          <a href="<?php echo esc_url( $btn_url ); ?>"><?php echo esc_attr( $btn_txt ); ?></a>
        </div>
      <?php endif; ?>
    </div>
    <!-- Portfolio-end -->

    <?php echo $after_widget; ?>      
  <?php 
  }// end of widdget function.
}// end of apply for action widget.

/**
 * Funs Count Widget section.
 */
class pageline_funs_widget extends WP_Widget {
  function __construct() {
  $widget_ops           = array( 
      'classname'       => 'widget_funs_block', 
      'description'     => esc_html__( 'Display funs.', 'pageline' ) 
    );
    $control_ops        = array( 
      'width'           => 200, 
      'height'          =>250 
    );
    parent::__construct( 
      false, 
      $name             = esc_html__( 'NNC: Funs', 'pageline' ), 
      $widget_ops, 
      $control_ops
    );
  }// end of construct.

  function form( $instance ) {
    $defaults[ 'menu_id' ] = '';
    $defaults[ 'title' ] = '';
    $defaults[ 'text' ]  = '';
    $defaults[ 'funs' ]  = '';
    $instance            = wp_parse_args( (array) $instance, $defaults );
    $menu_id               = $instance[ 'menu_id' ];
    $title               = $instance[ 'title' ];
    $text                = $instance[ 'text' ];
    $funs                = $instance[ 'funs' ];
    ?>
    <p><?php esc_html_e( 'Note: Enter the Section ID and use same for Menu item. Only used for One Page Menu.', 'pageline' ); ?>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('menu_id'); ?>"><?php esc_html_e( 'Section ID:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id('menu_id'); ?>" class="widefat" name="<?php echo $this->get_field_name('menu_id'); ?>" type="text" value="<?php echo esc_attr( $menu_id ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php esc_html_e( 'Description','pageline' ); ?>
    <textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_textarea( $text ); ?></textarea>
    <p>
      <?php
      $url = 'http://fontawesome.io/icons/';
      $link = sprintf( wp_kses( __( '<a href="%s" target="_blank">Refer here</a> For Icon Class', 'pageline' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( $url ) );
      echo $link;
      ?>
    </p>
    <?php if ( !empty( $funs ) ) : ?>
      <?php foreach ( $funs as $key => $value ) { ?>
      <p>
        <label for="<?php echo $this->get_field_id( 'funs' ); ?>[<?php echo absint( $key ); ?>][text]"><?php esc_html_e( 'Text:', 'pageline' ); ?></label>
        <input id="<?php echo $this->get_field_id( 'funs' ); ?>[<?php echo absint( $key ); ?>][text]" class="widefat" name="<?php echo $this->get_field_name( 'funs' ); ?>[<?php echo absint( $key ); ?>][text]" type="text" value="<?php if( $funs[$key] !='' ) { echo esc_attr( $funs[$key][ 'text' ] ); }?>" />
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'funs' ); ?>[<?php echo absint( $key ); ?>][number]"><?php esc_html_e( 'Numbers:', 'pageline' ); ?></label>
        <input id="<?php echo $this->get_field_id( 'funs' ); ?>[<?php echo absint( $key ); ?>][number]" class="widefat" name="<?php echo $this->get_field_name( 'funs' ); ?>[<?php echo absint( $key ); ?>][number]" type="number" value="<?php if( $funs[$key] !='' ) { echo absint( $funs[$key][ 'number' ] ); }?>" />
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'funs' ); ?>[<?php echo absint( $key ); ?>][icon]"><?php esc_html_e( 'Class Icon:', 'pageline' ); ?></label>
        <input id="<?php echo $this->get_field_id( 'funs' ); ?>[<?php echo absint( $key ); ?>][icon]" class="widefat" name="<?php echo $this->get_field_name( 'funs' ); ?>[<?php echo absint( $key ); ?>][icon]" type="text" value="<?php if( $funs[$key] !='' ) { echo esc_attr( $funs[$key][ 'icon' ] ); }?>" placeholder="fa-coffee"/>
      </p>
      <?php } ?>
    <?php else: ?>
      <?php for( $i=0; $i<=3; $i++) {?>
        <p>
          <label for="<?php echo $this->get_field_id( 'funs' ); ?>[<?php echo absint( $i ); ?>][text]"><?php esc_html_e( 'Text:', 'pageline' ); ?></label>
          <input id="<?php echo $this->get_field_id( 'funs' ); ?>[<?php echo absint( $i ); ?>][text]" class="widefat" name="<?php echo $this->get_field_name( 'funs' ); ?>[<?php echo absint( $i ); ?>][text]" type="text" value="" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'funs' ); ?>[<?php echo absint( $i ); ?>][number]"><?php esc_html_e( 'Numbers:', 'pageline' ); ?></label>
          <input id="<?php echo $this->get_field_id( 'funs' ); ?>[<?php echo absint( $i ); ?>][number]" class="widefat" name="<?php echo $this->get_field_name( 'funs' ); ?>[<?php echo absint( $i ); ?>][number]" type="number" value="" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'funs' ); ?>[<?php echo absint( $i ); ?>][icon]"><?php esc_html_e( 'Class Icon:', 'pageline' ); ?></label>
          <input id="<?php echo $this->get_field_id( 'funs' ); ?>[<?php echo absint( $i ); ?>][icon]" class="widefat" name="<?php echo $this->get_field_name( 'funs' ); ?>[<?php echo absint( $i ); ?>][icon]" type="text" value="" placeholder="fa-coffee"/>
        </p>
      <?php } ?>
    <?php endif; ?>
  <?php
  }// end of form function.

  function update( $new_instance, $old_instance ) {
    $instance                 = $old_instance;
    $instance[ 'menu_id' ]      = sanitize_text_field( $new_instance[ 'menu_id' ] );
    $instance[ 'title' ]      = sanitize_text_field( $new_instance[ 'title' ] );
    $instance[ 'page' ]       = absint( $new_instance[ 'page' ] );
    $instance[ 'funs' ]       = array();
    if ( isset( $new_instance[ 'funs' ] ) ) {
      foreach ( $new_instance[ 'funs' ] as $stream_source ){
        $instance[ 'funs' ][] = $stream_source;
      }
    }

    if ( current_user_can('unfiltered_html') )
      $instance[ 'text' ]     =  $new_instance[ 'text' ];
    else
      $instance[ 'text' ]     = stripslashes( wp_filter_post_kses( addslashes( $new_instance[ 'text' ] ) ) ); 
      // wp_filter_post_kses() expects slashed
    return $instance;
  }// end of update function.

  function widget( $args, $instance ) {
    extract( $args );
    extract( $instance );

    global $post;
    $menu_id                     = isset( $instance[ 'menu_id' ] ) ? $instance[ 'menu_id' ] : '';
    $title                    = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '');
    $text                     = apply_filters( 'widget_text', empty( $instance['text' ] ) ? '' : $instance[ 'text' ], $instance );
    $page                     = isset( $instance[ 'page' ] ) ? $instance[ 'page' ] : '';
    $funs                     = isset( $instance[ 'funs' ] ) ? $instance[ 'funs' ] : '';
    ?>
    <?php echo $before_widget; ?>
    <!-- Status-start -->
    <div id="<?php echo esc_attr( $menu_id ); ?>" class="nnc-statuses">
      <div class="nnc-container"> 
        <?php if ( !empty( $title ) || !empty( $text ) ) : ?>
        <div class="nnc-title">
          <?php if ( !empty( $title ) ) {
            echo '<h2>'.esc_attr( $title ).'<span></span></h2>';
          }
          ?>
          <?php if ( !empty( $text ) ) {
            echo '<p>'.esc_textarea( $text ).'</p>';
          }?>
          
        </div>
      <?php endif; ?>
      <?php if ( !empty( $funs ) ) : ?>  
        <div class="nnc-status-block nnc-status-column-n">
        <?php foreach ( $funs as $key => $value ) { ?>
          <?php if( $value[ 'text' ] != '' || $value[ 'icon' ] != '' || $value[ 'number' ] != '' ) : ?>
          <div class="nnc-status">
            <i class="fa <?php echo esc_attr( $value[ 'icon' ] ); ?>"></i> <span class="counter"><?php echo esc_attr( $value[ 'number' ]); ?></span>
            <p><?php echo esc_attr( $value[ 'text' ] ); ?></p>
          </div>
        <?php endif; ?>
        <?php } ?>
        </div>
      <?php endif; ?>   
      </div>
    </div> 
    <!-- Status-end -->

    <?php echo $after_widget; ?>      
  <?php 
  }// end of widdget function.
}// end of apply for action widget.

/**
 * Apply For Action Widget section.
 */
class pageline_cta_widget extends WP_Widget {
  function __construct() {
	$widget_ops			     = array( 
  		'classname' 	   => 'pageline_cta_block', 
  		'description' 	 => esc_html__( 'Display title, description, image and buttons as call to action.', 'pageline' ) 
  	);
  	$control_ops 		   = array( 
  		'width' 		     => 200, 
  		'height' 		     =>250 
  	);
  	parent::__construct( 
  		false, 
  		$name 			     = esc_html__( 'NNC: Call To Aciton', 'pageline' ), 
  		$widget_ops, 
  		$control_ops
  	);
  }// end of construct.

  function form( $instance ) {
    $defaults['menu_id']   = '';
		$defaults['title']   = '';
		$defaults['text']    = '';
    $defaults['btn_text']   = '';
    $defaults['btn_url']    = '';
		$instance            = wp_parse_args( (array) $instance, $defaults );
    $menu_id               = $instance[ 'menu_id' ];
		$title               = $instance[ 'title' ];
		$text                = $instance[ 'text' ];
    $btn_text               = $instance[ 'btn_text' ];
    $btn_url                = $instance[ 'btn_url' ];
	?>
  <p>
    <?php esc_html_e( 'Note: Enter the Section ID and use same for Menu item. Only used for One Page Menu.', 'pageline' ); ?>
  </p>

  <p>
    <label for="<?php echo $this->get_field_id('menu_id'); ?>"><?php esc_html_e( 'Section ID:', 'pageline' ); ?></label>
    <input id="<?php echo $this->get_field_id('menu_id'); ?>" class="widefat" name="<?php echo $this->get_field_name('menu_id'); ?>" type="text" value="<?php echo esc_attr( $menu_id ); ?>" />
  </p>

	<p>
   	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'pageline' ); ?></label>
  	<input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<?php esc_html_e( 'Description','pageline' ); ?>
	<textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text'); ?>"><?php echo esc_textarea( $text ); ?></textarea>
  <p>
    <label for="<?php echo $this->get_field_id( 'btn_text' ); ?>"><?php esc_html_e( 'Button Text:', 'pageline' ); ?></label>
    <input id="<?php echo $this->get_field_id( 'btn_text' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'btn_text' ); ?>" type="text" value="<?php echo esc_attr( $btn_text ); ?>" />
  </p>
  <p>
    <label for="<?php echo $this->get_field_id( 'btn_url' ); ?>"><?php esc_html_e( 'Button URL:', 'pageline' ); ?></label>
    <input id="<?php echo $this->get_field_id( 'btn_url' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'btn_url' ); ?>" type="text" value="<?php echo esc_url( $btn_url ); ?>" />
  </p>

  <?php
  }// end of form function.

 	function update( $new_instance, $old_instance ) {
  	$instance = $old_instance;
    $instance[ 'menu_id' ]           = sanitize_text_field( $new_instance[ 'menu_id' ] );
  	$instance[ 'title' ]           = sanitize_text_field( $new_instance[ 'title' ] );
    $instance[ 'btn_text' ]           = sanitize_text_field( $new_instance[ 'btn_text' ] );
    $instance[ 'btn_url' ]           = esc_url_raw( $new_instance[ 'btn_url' ] );
  	if ( current_user_can( 'unfiltered_html' ) )
    	$instance[ 'text' ]            =  $new_instance[ 'text' ];
  	else
    	$instance[ 'text' ]            = stripslashes( wp_filter_post_kses( addslashes( $new_instance[ 'text' ] ) ) ); 
      // wp_filter_post_kses() expects slashed
  	return $instance;
 	}// end of update function.

 	function widget( $args, $instance ) {
  	extract( $args );
  	extract( $instance );
  	global $post;
    $menu_id = isset( $instance[ 'menu_id' ] ) ? $instance[ 'menu_id' ] : '';
  	$title                       = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '');
  	$text                        = apply_filters( 'widget_text', empty( $instance[ 'text' ] ) ? '' : $instance[ 'text' ], $instance );
    $btn_text = isset( $instance[ 'btn_text' ] ) ? $instance[ 'btn_text' ] : '';
    $btn_url = isset( $instance[ 'btn_url' ] ) ? $instance[ 'btn_url' ] : '';
  	?>
  	<?php echo $before_widget; ?>

    <!-- CTA-start -->
    <section id="<?php echo esc_attr( $menu_id );?>" class="nnc-cta">
      <div class="nnc-container">
        <?php if ( !empty( $title ) || !empty( $text ) ) : ?>
        <div class="nnc-cta-block">
          <?php if ( !empty( $title ) ) {
            echo '<h2>'.esc_attr( $title ).'</h2>';
          }
          ?>
          <?php if ( !empty( $text ) ) {
            echo '<p>'.esc_textarea( $text ).'</p>';
          }?>
          
        </div>
      <?php endif; ?>

      <?php if( !empty( $btn_text ) ) : ?>
          <div class="nnc-dtl">
            <a href="<?php echo esc_url( $btn_url ); ?>"><?php echo esc_attr( $btn_text ); ?></a>
          </div>
      <?php endif; ?>
      </div>
    </section>
    <!-- CTA-end -->

   	<?php echo $after_widget; ?>      
 	<?php 
	}// end of widdget function.
}// end of apply for action widget.

/**
 * Blog Posts Widget section.
 */
class pageline_blog_posts_widget extends WP_Widget {
  function __construct() {
  $widget_ops           = array( 
      'classname'       => 'widget_blog_posts_block', 
      'description'     => esc_html__( 'Display blog posts.', 'pageline' ) 
    );
    $control_ops        = array( 
      'width'           => 200, 
      'height'          =>250 
    );
    parent::__construct( 
      false, 
      $name             = esc_html__( 'NNC: Blog Posts', 'pageline' ), 
      $widget_ops, 
      $control_ops
    );
  }// end of construct.

  function form( $instance ) {
    $defaults[ 'menu_id' ]    = '';
    $defaults[ 'title' ]    = '';
    $defaults[ 'text' ]     = '';
    $defaults[ 'number' ]   = 3;
    $defaults[ 'type' ]     = 'latest';
    $defaults[ 'category' ] = '';
    $defaults[ 'btn-txt' ]    = '';
    $defaults[ 'btn-url' ]     = '';
    $instance               = wp_parse_args( (array) $instance, $defaults );
    $menu_id                  = $instance[ 'menu_id' ];
    $title                  = $instance[ 'title' ];
    $text                   = $instance[ 'text' ];
    $number                 = $instance[ 'number' ];
    $type                   = $instance[ 'type' ];
    $category               = $instance[ 'category' ];
    $btn_txt                = $instance[ 'btn-txt' ];
    $btn_url               = $instance[ 'btn-url' ];
    ?>
    <p>
      <?php esc_html_e( 'Note: Enter the Section ID and use same for Menu item. Only used for One Page Menu.', 'pageline' ); ?>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('menu_id'); ?>"><?php esc_html_e( 'Section ID:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id('menu_id'); ?>" class="widefat" name="<?php echo $this->get_field_name('menu_id'); ?>" type="text" value="<?php echo esc_attr( $menu_id ); ?>" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>

    <?php esc_html_e( 'Description','pageline' ); ?>
    <textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_textarea( $text ); ?></textarea>

    <p>
      <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of posts to display:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'number' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" value="<?php echo $number; ?>" size="3" />
    </p>

    <p>
      <input type="radio" <?php checked( $type, 'latest' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest"/><?php esc_html_e( 'Show latest Posts', 'pageline' );?><br />
      <input type="radio" <?php checked( $type,'category' ) ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category"/><?php esc_html_e( 'Show posts from a category', 'pageline' );?><br />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php esc_html_e( 'Select category', 'pageline' ); ?>:</label>
      <?php wp_dropdown_categories(
        array(
        'class'               => 'widefat',
        'name'                => $this->get_field_name( 'category' ), 
        'selected'            => $category 
        ) 
      ); ?>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'btn-txt' ); ?>"><?php esc_html_e( 'Button Text:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'btn-txt' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'btn-txt' ); ?>" type="text" value="<?php echo esc_attr( $btn_txt ); ?>" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'btn-url' ); ?>"><?php esc_html_e( 'Button URL:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'btn-url' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'btn-url' ); ?>" type="text" value="<?php echo esc_url( $btn_url ); ?>" />
    </p>

    <p><?php esc_html_e( 'Info: To display posts from specific category, select the Category in above radio option than select the category from the drop-down list.', 'pageline' ); ?></p>
  <?php
  }// end of form function.

  function update( $new_instance, $old_instance ) {
    $instance                 = $old_instance; 
    $instance[ 'menu_id' ]      = sanitize_text_field( $new_instance[ 'menu_id' ] );
    $instance[ 'title' ]      = sanitize_text_field( $new_instance[ 'title' ] );
    $instance[ 'number' ]     = absint( $new_instance[ 'number' ] );
    $instance[ 'type' ]       = esc_attr( $new_instance[ 'type' ] );
    $instance[ 'category' ]   = absint( $new_instance[ 'category' ] );
    $instance[ 'btn-txt' ]       = sanitize_text_field( $new_instance[ 'btn-txt' ] );
    $instance[ 'btn-url' ]       = esc_url_raw( $new_instance[ 'btn-url' ] );

    if ( current_user_can('unfiltered_html') )
      $instance[ 'text' ]     =  $new_instance[ 'text' ];
    else
      $instance[ 'text' ]     = stripslashes( wp_filter_post_kses( addslashes( $new_instance[ 'text' ] ) ) ); 
      // wp_filter_post_kses() expects slashed
    return $instance;
  }// end of update function.

  function widget( $args, $instance ) {
    extract( $args );
    extract( $instance );

    global $post;
    $menu_id = isset( $instance[ 'menu_id' ] ) ? $instance[ 'menu_id' ] : '';
    $title                    = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '');
    $text                     = apply_filters( 'widget_text', empty( $instance['text' ] ) ? '' : $instance[ 'text' ], $instance );
    $number = empty( $instance[ 'number' ] ) ? 3 : $instance[ 'number' ];
    $type = isset( $instance[ 'type' ] ) ? $instance[ 'type' ] : 'latest' ;
    $category = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
    $btn_txt = isset( $instance[ 'btn-txt' ] ) ? $instance[ 'btn-txt' ] : '';
    $btn_url = isset( $instance[ 'btn-url' ] ) ? $instance[ 'btn-url' ] : '';

    if( $type == 'latest' ) {
      $get_featured_posts = new WP_Query( array(
        'posts_per_page'        => $number,
        'post_type'             => 'post',
        'ignore_sticky_posts'   => true
        ) );
    }
    else {
      $get_featured_posts = new WP_Query( array(
        'posts_per_page'        => $number,
        'post_type'             => 'post',
        'category__in'          => $category
        ) );
    }
    ?>
    <?php echo $before_widget; ?>

    <!-- Clients-start --> 
    <div id="<?php echo esc_attr( $menu_id ); ?>" class="nnc-blogs">
      <div class="nnc-container"> 
        <?php if ( !empty( $title ) || !empty( $text ) ) : ?>
        <div class="nnc-title">
          <?php if ( !empty( $title ) ) {
            echo '<h2>'.esc_attr( $title ).'<span></span></h2>';
          }
          ?>
          <?php if ( !empty( $text ) ) {
            echo '<p>'.esc_textarea( $text ).'</p>';
          }?>
        <?php endif; ?>  
        <div class="nnc-blog-news">

        <?php while( $get_featured_posts->have_posts() ):$get_featured_posts->the_post(); ?>
          <div class="nnc-blog-block"> 
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="nnc-blog-img">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'pageline-blog-post' ); ?></a> 
                <div class="bg-black">
                <span><i class="fa fa-user"></i><?php echo esc_html( get_the_author() ); ?></span>
                  <?php
                  $time_string = '<span datetime="%1$s"><i class="fa fa-calendar"></i> %2$s</span>';
                  $time_string = printf( $time_string,
                    esc_attr( get_the_date( 'c' ) ),
                    esc_html( get_the_date( 'j F, Y' ) )
                    );
                  ?>
                </div>
              </div>
            <?php endif; ?>
            <div class="nnc-blog-desc">
              <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              <?php the_excerpt(); ?>
            </div> 
          </div>
        <?php endwhile;?>
        <?php wp_reset_postdata(); ?>
           
        </div> 
        <?php if ( $btn_txt != '' ) :?>
          <div class="nnc-view-all">
            <a href="<?php echo esc_url( $btn_url ); ?>"><?php echo esc_attr( $btn_txt ); ?></a>
          </div>
        <?php endif; ?> 
      </div>
    </div>
    <!-- Clients-end -->

    <?php echo $after_widget; ?>      
  <?php 
  }// end of widdget function.
}// end of apply for action widget.

/**
 * Testimonials Widget section.
 */
class pageline_testimonials_widget extends WP_Widget {
  function __construct() {
  $widget_ops           = array( 
      'classname'       => 'widget_testimonials_block', 
      'description'     => esc_html__( 'Display testimonials of page content.', 'pageline' ) 
    );
    $control_ops        = array( 
      'width'           => 200, 
      'height'          =>250 
    );
    parent::__construct( 
      false, 
      $name             = esc_html__( 'NNC: Testimonials', 'pageline' ), 
      $widget_ops, 
      $control_ops
    );
  }// end of construct.

  function form( $instance ) {
    $defaults       = array( 'menu_id'=>'', 'title' => '', 'text' => '', 'desc-1'=>'', 'desc-2'=>'', 'desc-3'=>'','name-1'=>'', 'name-2'=>'', 'name-3'=>'','tagby-1'=>'', 'tagby-2'=>'', 'tagby-3'=>'','image-1'=>'', 'image-2'=>'', 'image-3'=>'' );
    $instance             = wp_parse_args( (array) $instance, $defaults );
    $menu_id                = $instance[ 'menu_id' ];
    $title                = $instance[ 'title' ];
    $text                 = $instance[ 'text' ];
    for ( $i=1; $i<=3; $i++ ) {
      $desc                = 'desc-'.$i;
      $name                = 'name-'.$i;
      $tagby                = 'tagby-'.$i;
      $image                = 'image-'.$i;
      $instance[ $desc ]   = $instance[ $desc ];
      $instance[ $name ]   = $instance[ $name ];
      $instance[ $tagby ]   = $instance[ $tagby ];
      $instance[ $image ]   = $instance[ $image ];
    } 
    ?>
    <p>
      <?php esc_html_e( 'Note: Enter the Section ID and use same for Menu item. Only used for One Page Menu.', 'pageline' ); ?>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('menu_id'); ?>"><?php esc_html_e( 'Section ID:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id('menu_id'); ?>" class="widefat" name="<?php echo $this->get_field_name('menu_id'); ?>" type="text" value="<?php echo esc_attr( $menu_id ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php esc_html_e( 'Description','pageline' ); ?>
    <textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_textarea( $text ); ?></textarea>

    <?php for ( $i=1; $i<=3; $i++ ) {
      $desc = 'desc-'.$i;
      $name = 'name-'.$i;
      $tagby = 'tagby-'.$i;
      $image = 'image-'.$i;
      ?>
      <p>
          <label for="<?php echo $this->get_field_id( $desc ); ?>"><?php esc_html_e( 'Words to say ', 'pageline' ); echo esc_attr( $i.' :' ) ; ?></label>
          <textarea class="widefat" rows="5" cols="10" id="<?php echo $this->get_field_id( $desc ); ?>" name="<?php echo $this->get_field_name( $desc ); ?>"><?php echo $instance[ $desc ]; ?></textarea>
      </p>

      <p>
        <label for="<?php echo $this->get_field_id( $name ); ?>"><?php esc_html_e( 'Name ', 'pageline' ); echo esc_attr( $i.' :' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( $name ); ?>" name="<?php echo $this->get_field_name( $name ); ?>" type="text" value="<?php echo $instance[ $name ]; ?>" />
      </p>

      <p>
        <label for="<?php echo $this->get_field_id( $tagby ); ?>"><?php esc_html_e( 'Designation ', 'pageline' ); echo esc_attr( $i.' :' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( $tagby ); ?>" name="<?php echo $this->get_field_name( $tagby ); ?>" type="text" value="<?php echo $instance[ $tagby ]; ?>" />
      </p>

      <p>
         <label for="<?php echo $this->get_field_id( $image ); ?>"> <?php esc_html_e( 'Image ', 'pageline' ); echo esc_attr( $i.' :' ); ?> </label> <br />
         <div class="media-uploader" id="<?php echo $this->get_field_id( $image ); ?>">
            <div class="custom_media_preview">
               <?php if ( $instance[ $image ] != '' ) : ?>
                  <img class="custom_media_preview_default" src="<?php echo $instance[ $image ]; ?>" style="max-width:100%;" />
               <?php endif; ?>
            </div>
            <input type="text" class="widefat custom_media_input" id="<?php echo $this->get_field_id( $image ); ?>" name="<?php echo $this->get_field_name( $image ); ?>" value="<?php echo $instance[ $image ]; ?>" style="margin-top:5px;" />
            <button class="custom_media_upload button button-secondary button-large" id="<?php echo $this->get_field_id( $image ); ?>" data-choose="<?php echo esc_attr( 'Choose an image', 'pageline' ); ?>" data-update="<?php echo esc_attr( 'Use image', 'pageline' ); ?>" style="width:100%;margin-top:6px;margin-right:30px;"><?php echo esc_html( 'Select an Image', 'pageline' ); ?></button>
         </div>
      </p>
    <?php } ?>
    <p>
      <strong><?php esc_html_e( 'Note:', 'pageline'); ?></strong><br/>
      <?php esc_html_e( '1. Recommanded Image size 100 × 100 Pixels.', 'pageline' ); ?><br/>
    </p>
    
  <?php }// end of form function.

  function update( $new_instance, $old_instance ) {
    $instance                 = $old_instance;
    $instance[ 'menu_id' ]      = sanitize_text_field( $new_instance[ 'menu_id' ] );
    $instance[ 'title' ]      = sanitize_text_field( $new_instance[ 'title' ] );

    for( $i=1; $i<=3; $i++ ) {
      $desc                = 'desc-'.$i;
      $name                = 'name-'.$i;
      $tagby                = 'tagby-'.$i;
      $image                = 'image-'.$i;
      $instance[ $desc ]   = sanitize_text_field( $new_instance[ $desc ] );
      $instance[ $name ]   = sanitize_text_field( $new_instance[ $name ] );
      $instance[ $tagby ]   = sanitize_text_field( $new_instance[ $tagby ] );
      $instance[ $image ]   = esc_url_raw( $new_instance[ $image ] );
    }
    if ( current_user_can('unfiltered_html') )
      $instance[ 'text' ]     =  $new_instance[ 'text' ];
    else
      $instance[ 'text' ]     = stripslashes( wp_filter_post_kses( addslashes( $new_instance[ 'text' ] ) ) ); 
      // wp_filter_post_kses() expects slashed
    return $instance;
  }// end of update function.

  function widget( $args, $instance ) {
    extract( $args );
    extract( $instance );

    global $post;
    $menu_id              = isset( $instance[ 'menu_id' ] ) ? $instance[ 'menu_id' ] : '';
    $title                    = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '');
    $text                     = apply_filters( 'widget_text', empty( $instance['text' ] ) ? '' : $instance[ 'text' ], $instance );
    $desc_array = array();
    $name_array = array();
    $tagby_array = array();
    $image_array = array();
    
    for( $i=1; $i<=3; $i++ ) {
      $desc                = 'desc-'.$i;
      $name                = 'name-'.$i;
      $tagby                = 'tagby-'.$i;
      $image                = 'image-'.$i;

      $desc = isset( $instance[ $desc ] ) ? $instance[ $desc ] : '';
      $name = isset( $instance[ $name ] ) ? $instance[ $name ] : '';
      $tagby = isset( $instance[ $tagby ] ) ? $instance[ $tagby ] : '';
      $image = isset( $instance[ $image ] ) ? $instance[ $image ] : '';
         array_push( $desc_array, $desc );
         array_push( $name_array, $name );
         array_push( $tagby_array, $tagby );
         array_push( $image_array, $image );
         // For WPML plugin compatibility
    } ?>

    <?php echo $before_widget; ?>
    <!-- Testimonials-start --> 
    <div id="<?php echo esc_attr( $menu_id ); ?>" class="nnc-testimonials">
      <div class="nnc-container">
        <?php if ( !empty( $title ) || !empty( $text ) ) : ?>
        <div class="nnc-title">
          <?php if ( !empty( $title ) ) {
            echo '<h2>'.esc_attr( $title ).'<span></span></h2>';
          }
          ?>
          <?php if ( !empty( $text ) ) {
            echo '<p>'.esc_textarea( $text ).'</p>';
          }?>
        </div>
      <?php endif; ?>

      <?php if ( !empty( $desc_array ) ) : ?>
        <div class="nnc-testimonial">
          <div class="owl-testimonial">
          <?php for ($i=1; $i<=3; $i++) : $j = $i - 1; ?>
            <div class="testimonial item">
              <?php if ( !empty( $desc_array[$j] ) || !empty( $tagby_array[$j] ) || !empty( $name_array[$j] ) ) : ?>
                <div class="nnc-dtl-info">
                  <?php if ( !empty( $desc_array[$j] ) ) { echo '<p>'.esc_attr( $desc_array[$j] ).'</p>'; } ?>
                  <?php if ( !empty( $tagby_array[$j] ) ) { echo '<span>'.esc_attr( $tagby_array[$j] ).'</span>'; } ?>
                  <?php if ( !empty( $name_array[$j] ) ) { echo '<h4>'.esc_attr( $name_array[$j] ).'</h4>'; } ?>
                </div>
              <?php endif; ?>
                <?php if ( !empty( $image_array[$j] ) ) { echo '<img src='.esc_url( $image_array[$j] ).' alt='.esc_attr( $name_array[$j] ).'>'; } ?>
            </div>
          <?php endfor; ?>
        </div>
        </div>
      <?php endif; ?>
      </div>  
    </div>
    <!-- Services-end -->
    <?php echo $after_widget; ?>      
  <?php 
  }// end of widdget function.
}// end of apply for action widget.

/**
 * Contact us section.
 */
class pageline_contact_widget extends WP_Widget {
  function __construct() {
  $widget_ops           = array( 
      'classname'       => 'widget_contact_block', 
      'description'     => esc_html__( 'Display about us details of page content.', 'pageline' ) 
    );
    $control_ops        = array( 
      'width'           => 200, 
      'height'          =>250 
    );
    parent::__construct( 
      false, 
      $name             = esc_html__( 'NNC: Contact Us', 'pageline' ), 
      $widget_ops, 
      $control_ops
    );
  }// end of construct.

  function form( $instance ) {
    $defaults[ 'menu_id' ] = '';
    $defaults[ 'title' ] = '';
    $defaults[ 'text' ]  = '';
    $defaults[ 'page' ]  = '';
    $defaults[ 'shortcode' ]  = '';
    $instance            = wp_parse_args( (array) $instance, $defaults );
    $menu_id             = $instance[ 'menu_id' ];
    $title               = $instance[ 'title' ];
    $text                = $instance[ 'text' ];
    $page                = $instance[ 'page' ];
    $shortcode           = $instance[ 'shortcode' ];
    ?>
    <p><?php esc_html_e( 'Note: Enter the Section ID and use same for Menu item. Only used for One Page Menu.', 'pageline' ); ?>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('menu_id'); ?>"><?php esc_html_e( 'Section ID:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id('menu_id'); ?>" class="widefat" name="<?php echo $this->get_field_name('menu_id'); ?>" type="text" value="<?php echo esc_attr( $menu_id ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'pageline' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php esc_html_e( 'Description','pageline' ); ?>
    <textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_textarea( $text ); ?></textarea>
    <p>
      <label for="<?php echo $this->get_field_id( 'page' ); ?>"><?php esc_html_e( 'Page', 'pageline' ); ?>:</label>
      <?php wp_dropdown_pages( array(
        'class'             => 'widefat',
        'name'              => $this->get_field_name( 'page' ),
        'selected'          => $page
        )
      )
      ?>
    </p>
    <p>
      <?php
      $url = 'https://wordpress.org/plugins/contact-form-7/';
      $link = sprintf( wp_kses( __( '<a href="%s" target="_blank">Download Plugin</a> For Contact Form 7', 'pageline' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( $url ) );
      echo $link;
      ?>
    </p>
    <p>
    <label for="<?php echo $this->get_field_id( 'shortcode' ); ?>"><?php esc_html_e( 'Shortcode:', 'pageline' ); ?></label>
      <input type="text" id="<?php echo $this->get_field_id( 'shortcode' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'shortcode' ); ?>" value="<?php echo esc_attr( $shortcode ); ?>"/>
    </p>
  <?php
  }// end of form function.

  function update( $new_instance, $old_instance ) {
    $instance                 = $old_instance; 
    $instance[ 'menu_id' ]      = sanitize_text_field( $new_instance[ 'menu_id' ] );
    $instance[ 'title' ]      = sanitize_text_field( $new_instance[ 'title' ] );
    $instance[ 'page' ]       = absint( $new_instance[ 'page' ] );
    $instance[ 'shortcode' ]      = strip_tags( $new_instance[ 'shortcode' ] );

    if ( current_user_can('unfiltered_html') )
      $instance[ 'text' ]     =  $new_instance[ 'text' ];
    else
      $instance[ 'text' ]     = stripslashes( wp_filter_post_kses( addslashes( $new_instance[ 'text' ] ) ) ); 
      // wp_filter_post_kses() expects slashed
    return $instance;
  }// end of update function.

  function widget( $args, $instance ) {
    extract( $args );
    extract( $instance );

    global $post;
    $menu_id                    = isset( $instance[ 'menu_id' ] ) ? $instance[ 'menu_id' ] : '';
    $title                    = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '');
    $text                     = apply_filters( 'widget_text', empty( $instance['text' ] ) ? '' : $instance[ 'text' ], $instance );
    $page                     = isset( $instance[ 'page' ] ) ? $instance[ 'page' ] : '';
    $shortcode                    = isset( $instance[ 'shortcode' ] ) ? $instance[ 'shortcode' ] : '';

    $get_pages = new WP_Query( array(
       'posts_per_page'     => 1,
       'post_type'          =>  array( 'page' ),
       'page_id'           => $page
    ) );
    ?>

    <?php echo $before_widget; ?>
    <!-- About-start -->
    <div id="<?php echo esc_attr( $menu_id ); ?>" class="nnc-about">
      <div class="nnc-container">
      <?php if ( !empty( $title ) || !empty( $text ) ) : ?>
        <div class="nnc-title">
          <?php if ( !empty( $title ) ) {
            echo '<h2>'.esc_attr( $title ).'<span></span></h2>';
          }
          ?>
          <?php if ( !empty( $text ) ) {
            echo '<p>'.esc_textarea( $text ).'</p>';
          }?>
          
        </div>
      <?php endif; ?>

      <?php if ( !empty( $page ) ) : ?>
        <div class="nnc-about-content">
        <?php while ( $get_pages->have_posts() ) : $get_pages->the_post(); ?>
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="nnc-about-img">
              <?php the_post_thumbnail( 'pageline-about' ); ?>
            </div>
          <?php endif; ?>
          <div class="nnc-about-desc">
            <h4><?php the_title(); ?></h4>
            <?php the_content(); ?>
            <span class="nnc-shortcode"><?php echo esc_attr( $shortcode ); ?></span>
          </div>
          
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        </div>
      <?php endif; ?>
        
      </div>
    </div>
    <!-- About-end -->
    <?php echo $after_widget; ?>      
  <?php 
  }// end of widdget function.
}// end of apply for action widget.


