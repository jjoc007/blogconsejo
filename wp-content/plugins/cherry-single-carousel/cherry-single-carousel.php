<?php
/*
  Plugin Name: Cherry single carousel
  Version: 1.0.0
  Plugin URI: http://www.cherryframework.com/
  Description: Create carousel with one item and with image
  Author: Cherry Team.
  Author URI: http://www.cherryframework.com/
  Text Domain: cherry-single-carousel
  Domain Path: languages/
  License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
if ( ! defined( 'ABSPATH' ) )
exit;

class cherry_single_carousel {
  
  public $version = '1.0.0';

  function __construct() {
    add_action( 'wp_enqueue_scripts', array( $this, 'assets' ) );
    add_shortcode( 'cherry_single_carousel', array( $this, 'single_carousel_shortcode' ) );
  }

  function assets() {
    wp_enqueue_script( 'images_loaded', $this->url('js/imagesloaded.pkgd.min.js'), array('jquery'), '', '3.1.8', true);
    wp_enqueue_script( 'mobile_events', $this->url('js/jquery.mobile.events.js'), array('jquery'), '', '2.0', true);
    wp_enqueue_script( 'image_transformer', $this->url('js/imageTransformer.js'), array( 'jquery' ), '', '1.0', true);
    wp_enqueue_script( 'smoothing_scroll',  $this->url('js/smoothing-scroll.js'), array( 'jquery' ), '', '1.0', true);
    wp_enqueue_script( 'fullwidth_stretcher',  $this->url('js/fullwidth-stretcher.js'), array( 'jquery' ), '', '1.0', true);
    wp_enqueue_script( 'destaque', $this->url('js/jquery.destaque.custom.js'), array( 'jquery' ), '', '1.0', true);
    wp_enqueue_style( 'single_carousel_style', $this->url('css/single-carousel.css'), '', $this->version );
  }

  /**
   * return plugin url
   */
  function url( $path = null ) {
    $base_url = untrailingslashit( plugin_dir_url( __FILE__ ) );
    if ( !$path ) {
      return $base_url;
    } else {
      return esc_url( $base_url . '/' . $path );
    }
  }

  /**
   * return plugin dir
   */
  function dir( $path = null ) {
    $base_dir = untrailingslashit( plugin_dir_path( __FILE__ ) );
    if ( !$path ) {
      return $base_dir;
    } else {
      return esc_url( $base_dir . '/' . $path );
    }
  }

  /**
   * Shortcode
   */
  function single_carousel_shortcode( $atts, $content = null ) {
    extract(shortcode_atts( array(
        'title'              => '',
        'type'               => 'portfolio',
        'posts_count'        => -1,
        'movement'           => '20',
        'parallax'           => 'true',
        'buffer_ratio'       => 1.5,
        'autoplay'           => 'false',
        'autoplay_delay'     => '3000',
        'stop_on_mouse_over' => 'true',
        'controls'           => 'true',
        'pagination'         => 'false',
        'fullwidth'          => 'false',
        'excerpt_count'      => '',
        'custom_class'       => ''
      ),
      $atts,
      'cherry_single_carousel'
    ));

    $posts_count = intval( $posts_count );

    $output = '<div class="cherry-single-carousel-wrapper '.$custom_class.' loading">';
      if($title != '') $output .= '<div class="cherry-single-carousel-main-title"><h2>'.$title.'</h2></div>';

      $output .= '<div class="cherry-single-carousel-container">';

        // WP_Query arguments
        $args = array(
          'post_type'        => $type,
          'posts_per_page'   => $posts_count
        );

        // The Query
        $cherry_single_carousel_query = new WP_Query( $args );

        $index = 0;

        if ( $cherry_single_carousel_query->have_posts()) :
          while ( $cherry_single_carousel_query->have_posts() ) : $cherry_single_carousel_query->the_post();
            $post_id = $cherry_single_carousel_query->post->ID;
            $output .= '<div class="cherry-single-carousel-item">';
              $output .= '<div class="background">';
                $output .= get_the_post_thumbnail( $post_id, 'cherry-single-carousel-image' );
              $output .= '</div>';
              $output .= '<div class="foreground">';
                $output .= '<div class="cherry-single-carousel-content-holder">';
                  $output .= '<div class="element">';
                    $output .= '<h3 class="cherry-single-carousel-item-title">' .esc_html( get_the_title( $post_id ) ). '</h3>';
                    if($excerpt_count > 0 && $excerpt_count != ''){
                      $excerpt = get_the_excerpt();
                      $output .= '<div class="cherry-single-carousel-item-excerpt">' .my_string_limit_words($excerpt,$excerpt_count). '</div>';
                    }
                  $output .= '</div>';
                $output .= '</div>';
              $output .= '</div>';
            $output .= '</div>';
            $index ++;
          endwhile;
        endif; 
      $output .= '</div>';

      if($controls == 'true'){
        $output .= '<div class="cherry-single-carousel-controls">';
          $output .= '<a class="prev" href="#" rel="prev"></a><a class="next" href="#" rel="next"></a>';
        $output .= '</div>';
      }
      if($pagination == 'true'){
        $output .= '<div class="cherry-single-carousel-pagination">';
          for($i = 0; $i < $index; $i++){
            $output .= '<a href="#"></a>';
          }
        $output .= '</div>';
      }

      $output .= '<script>(function($) {
        $(document).ready(function() 
          {             
              var parallaxSlider = $(".cherry-single-carousel-wrapper"),
                  parallaxSliderContaine = $(".cherry-single-carousel-container", parallaxSlider);

              if('.$fullwidth.') parallaxSlider.fullwidth_stretcher();
              
              parallaxSliderContaine.imagesLoaded( function() {
                  parallaxSlider.removeClass("loading");
                  parallaxSliderContaine.destaque({
                      slideMovementPercent: '.$movement.',
                      slideSpeed: 1000,
                      autoSlide: '.$autoplay.',
                      stopOnMouseOver:'.$stop_on_mouse_over.',
                      autoSlideDelay : '.$autoplay_delay.',
                      easingType: "easeInOutQuart",
                      itemSelector: ".cherry-single-carousel-item",
                      itemBackgroundSelector: ".background",
                      elementSpeed: 1100,
                      itemForegroundElementSelector: ".foreground .element",
                      controlsSelector: ".cherry-single-carousel-controls a",
                      paginationSelector: ".cherry-single-carousel-pagination a",
                      parallax:'.$parallax.',
                      bufferRatio:'.$buffer_ratio.'
                  });
              });
          });
        })(jQuery);
      </script>';

    $output .= '</div>';

    return $output;
  }

}

new cherry_single_carousel();
?>