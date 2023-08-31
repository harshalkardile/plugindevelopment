<?php
/*
Plugin Name: Hello World, Yo
Description: My first wordpress plugin
Version: 1.0
Author: Harshal k
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: hello-world-yo
*/
if( !defined('ABSPATH') ) 
    die('No scripts please');

    define ('HWY_PLUGIN_FILE', __FILE__);
    define ('HWY_VERSION', '1.0');

    require_once dirname(__FILE__) . '/includes/wp_requirements.php';
    $plugin_checks= new HWY_Requirements('Hello World YO', HWY_PLUGIN_FILE, array(
        'PHP' => '7.4.1',
        'WordPress' => '6.3.1',
    ));
    if(false===$plugin_checks->pass()){
        $plugin_checks->halt();
        return;
    }

    require_once dirname(__FILE__) . '/includes/news_meta_box.php';
    require_once dirname(__FILE__) . '/includes/shortcode.php';
    require_once dirname(__FILE__) . '/includes/custom_post_type.php';
    require_once dirname(__FILE__) . '/includes/admin_settings.php';
    require_once dirname(__FILE__) . '/includes/news_content.php';
    require_once dirname(__FILE__) . '/includes/add_content.php';
    require_once dirname(__FILE__) . '/includes/enqueue.php';
    require_once dirname(__FILE__) . '/includes/news_location.php';
    require_once dirname(__FILE__) . '/includes/test_api_calls.php';
    require_once dirname(__FILE__) . '/includes/welcome_screen.php';


   

    // function hwy_add_content_on_activation(){
    //     if(get_option('hwy_page_id', false)){
    //         return;
    //     }
    //     $post_id = wp_insert_post( array(
    //         'post_title' => 'Hello world confirmation',
    //         'post_status' =>  'publish',
    //         'post_type' => 'page',
    //         'post_content' => '[my-test-shortcode]',
    //     ) );
    //     update_option('hwy_page_id', $post_id);
    // }
    // register_activation_hook(HWY_PLUGIN_FILE, 'hwy_add_content_on_activation');
    
    // function hwy_add_content_on_activation(){
    //     if( get_option('hwy_page_id', false ) ){
    //         return;
    //     }
    //     $post_id = wp_insert_post( array(
    //         'post_title'   => 'Hello world confirmation',
    //         'post_status'  => 'publish',
    //         'post_type'    => 'page',
    //         'post_content' => '[my-test-shortcode]'
    //     ) );
    //     if ($post_id !== 0) {
    //         update_option('hwy_page_id', $post_id );
    //     }
    // }
    // register_activation_hook( HWY_PLUGIN_FILE, 'hwy_add_content_on_activation' );
    

    
    //variables
    /* <?php
     $class = 'notice'; 
     var_dump( $class);?> 
     <div class='<?= $class; ?>'>Hello world, yo</div> this is my text
     <?php
     die();*/

     
    //foreach loop
    /*
    $my_array = array( 'first' => 1, 'second' => 2, 'third' => 3);
    
    $x = 1;
    while($x < 10) {
        $x *= 1;
    }
    
    foreach($my_array as $key => $value) {
        ?>
        <div><?php echo $value; ?></div>
        <?php
    }
    die();
    */
     
    
    //function and classes example
    /*
    $my_array = array( 'first' => 1, 'second' => 2, 'third' => 3 );
    
    class HWY_Plugin {
         function __construct() {
            echo "starting my plugin";
        }
        public function show_array_values( $my_array) {
            foreach($my_array as $key => $value) {
                $this->print_value( $value );
            }
        }
        private function print_value( $value) { 
        ?>
         <div><?php echo $value; ?></div>
         <?php
       }    
    }
    $my_plugin = new HWY_Plugin();
    $my_plugin->show_array_values( $my_array );
    die();
    */


    //gLobals and superglobals examples
     /*
    $my_array = array( 'first' => 1, 'second' => 2, 'third' => 3 );
    
    class HWY_Plugin {
         function __construct() {
            echo "starting my plugin";
        }
        public function show_array_values( $my_array ) {
            foreach($my_array as $key => $value) {
                $this->print_value( $value );
            }
        }
        
        private function print_value( $value) { 
        ?>
         <div><?php echo $value; ?></div>
         <?php
       }    
    }
    $GLOBALS['my_plugin'] = new HWY_Plugin();
    $GLOBALS['my_plugin'] -> show_array_values( $my_array );
    die();
    */

    //Strings
    /*
    $content = "another";
    $test = 'testing';
    $my_array = array( 'first' => 1, 'second' => 2 );
    $my_string = print_r( $my_array, true);
    $my_string = sprintf('%s %d || %.2f || %s', $test, $my_array['second']); 
    $my_json = json_encode( $my_array );
    $my_array = json_decode( $my_json );
    substr($test, start: 0, length: 4 );
    */


    //Filters example
    /*
    function hwy_change_my_array( $value, **$value2, $value3**) {
        $value['fourth'] = 4;
        return $value;
    }
    add_filter( 'hwy_my_array', 'hwy_change_my_array', **10, 3**);
    
    function hwy_change_my_array_again( $value, **$value2, $value3**) {
        $value['second'] = 200;
        return $value;
    }
    add_filter( 'hwy_my_array', 'hwy_change_my_array_again', **10, 3**);

    $my_array = apply_filters( 'hwy_my_array', array( 'first' => 1, 'second' => 2, 'third' => 3 ), **$value2, $value3**);
    
    var_dump($my_array );
    die();
    */

    
    //Action example
    /*
    function hwy_add_additional_content() {
        echo 'Additional content';
    }
    add_action( 'hwy_template_end', 'hwy_add_additional_content' );
    ?>
    <div id="template">
        <?php do_action( tag: 'hwy_template_start' ); ?> 
          <h2>Heading</h2>
          <p>Content</p>
        <?php do_action( tag: 'hwy_template_end' ); ?>
    </div>
    <?php
    die();
    */


    //Action and Filter by using other plugin 
    /*
    function hwy_change_address( $address, $venue_id, $includeVenueName) {
         return '<span class="hwy_address">' . $address. '</span>';
    }
    add_filter('tribe_get_full_address', 'hwy_change_address', 10, 3 );

    function hwy_add_venue_disclaimer() {
    ?>
    <div class="disclaimer">
        NOTE: This venue is subject to change.
    </div>
    <?php
    }
    add_action( 'tribe_events_single_meta_venue_section_end', 'hwy_add_venue_disclaimer' );
    */

    //Action and Filter implement with Classes by using other Plugin .
    /*
    class HWY_Plugin{
        function __construct(){
            add_filter('tribe_get_full_address', array($this, 'hwy_change_address'), 10, 3 );
            add_action( 'tribe_events_single_meta_venue_section_end', array($this, 'hwy_add_venue_disclaimer') );
        }

        function hwy_change_address( $address, $venue_id, $includeVenueName) {
            return '<span class="hwy_address">' . $address. '</span>';
        }
       

        function hwy_add_venue_disclaimer() {
            ?>
            <div class="disclaimer">
                NOTE: This venue is subject to change.
            </div>
            <?php
        }
    }
   $my_plugin = new HWY_Plugin();
    */

 
    // shortcode and for loop example
    /*
    function hwy_handle_test_shortcode( $atts, $content = ''){
        $atts = shortcode_atts ( array(
            'color' => '#0a0a0a',
        ), $atts );
        ob_start();
        ?>
        <div class="test">
            <h2><?php echo $content; ?> (<?php echo get_the_ID() ?>)</h2> 
            <span style="color:<?php echo $atts['color'] ?>">testing</span>
        </div>
        <?php
        return ob_get_clean();
    }
    add_shortcode( 'my-test-shortcode', 'hwy_handle_test_shortcode' ); 

    function hwy_inject_advertisement( $posts) {
        if (is_home() && is_main_query()) {
            $ad_page = get_page_by_title('Advertisement' );
            array_splice( $posts, 1, 0, array( $ad_page ) );
        }
        return $posts;
    }
    add_filter('the_posts', 'hwy_inject_advertisement' );
    */