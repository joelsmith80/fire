<?php

require_once( 'library/bones.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/* ====================================
LAUNCH BONES
======================================= */

function bones_ahoy() {

  // allow editor style
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // get language support going
  load_theme_textdomain( 'focustheme', get_template_directory() . '/library/translation' );

  // clean up the head
  add_action( 'init', 'bones_head_cleanup' );
  
  // clean up title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  
  // remove injected css for recent-comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );

  // launch this stuff after theme setup
  bones_theme_support();

  // add sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // clean up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  
  // clean up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

  // get rid of emoji nonsense
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');

}
add_action( 'after_setup_theme', 'bones_ahoy' );


/* ===============================
DECLARE SUPPORT FOR WOOCOMMERCE
================================== */
add_action( 'after_setup_theme', 'woocommerce_support' );
if(!function_exists('woocommerce_support')){
function woocommerce_support() {
  add_theme_support( 'woocommerce' );
}}


/* ==========================
OEMBED SIZE OPTIONS
============================= */
if ( ! isset( $content_width ) ) {
	$content_width = 640;
}


/* ====================
THUMBNAIL SIZE OPTIONS
======================= */
// Thumbnail sizes
add_image_size( 'square-375', 375, 375, true);
add_image_size( 'third-600', 600, 400, true);
add_image_size( 'max-natural', 1200, 9999, false);

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}


/* ================
THEME CUSTOMIZE
=================== */
add_action( 'customize_register', 'bones_theme_customizer' );
function bones_theme_customizer($wp_customize) {
  $wp_customize->remove_section('title_tagline');
  $wp_customize->remove_section('colors');
  $wp_customize->remove_section('background_image');
  $wp_customize->remove_section('static_front_page');
  $wp_customize->remove_section('nav');
}


/* ======================
DEBUG
========================= */
if (!function_exists('debug')) {
function debug($var = false) {
  echo "\n<pre style=\"background: #FFFF99; color: black; font-size: 10px;\">\n";
  $var = print_r($var, true);
  echo $var . "\n</pre>\n";
}}


/* ==================
WRITE TO ERROR LOG
===================== */
if (!function_exists('write_log')) {
  function write_log ( $log )  {
    if ( true === WP_DEBUG ) {
      if ( is_array( $log ) || is_object( $log ) ) {
        error_log( print_r( $log, true ) );
      } else {
        error_log( $log );
      }
    }
  }
}


/* ====================================
SHOW ALL STYLE AND SCRIPT HANDLES
======================================= */
// add_action( 'wp_head', 'show_head_scripts', 9999 );
// add_action( 'wp_footer', 'show_footer_scripts', 9999 );
function show_head_scripts(){
  global $wp_scripts;
  global $wp_styles;
  write_log($wp_scripts->done);
  write_log($wp_styles->done);

}
function show_footer_scripts(){
  global $wp_scripts;
  global $wp_styles;
  write_log($wp_scripts->done);
  write_log($wp_styles->done);
}


/* ================
ACTIVE SIDEBARS
=================== */
function bones_register_sidebars() {
  register_sidebar(array(
		'id' => 'post-page',
		'name' => __( 'Post-Page Sidebar', 'bonestheme' ),
		'description' => __( 'The sidebar area on the page template that allows a sidebar', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}


/* ===============
COMMENT LAYOUT
================== */
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/* ======================
DECLARE GOOGLE FONTS
========================= */
function bones_fonts() {
  wp_enqueue_style('googleFonts', 'https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic');
}

add_action('wp_enqueue_scripts', 'bones_fonts');

// Enable support for HTML5 markup.
add_theme_support( 'html5', array(
  'comment-list',
  'search-form',
  'comment-form'
));


/* ***********************************************
NICER NAMES FOR CERTAIN PAGES, TEMPLATES
************************************************** */

function more_body_classes( $classes ) {
  if (is_page(1814)){
    $classes[] = 'about';
  }
  if(is_page_template('page-peer-curriculum.php')){
    $classes[] = 'peer-curriculum';
  }
  if(is_page_template('page-dashboard-4.php')){
    $classes[] = 'dashboard-4';
  }
  if(is_page_template('page-dashboard-5.php')){
    $classes[] = 'dashboard-5';
  }
  if(is_page_template('page-dashboard-6.php')){
    $classes[] = 'dashboard-6';
  }
  if(is_page_template('page-dashboard-7.php')){
    $classes[] = 'dashboard-7';
  }
  if(is_page_template('page-dashboard-8.php')){
    $classes[] = 'dashboard-7';
    $classes[] = 'dashboard-8';
  }
  if(is_page_template('page-store.php')){
    $classes[] = 'store-1';
  }
  if(is_page_template('page-store-2.php')){
    $classes[] = 'store-2';
  }
  if(is_page_template('page-services.php')){
    $classes[] = 'services';
  }
  if(is_page_template('page-services-2.php')){
    $classes[] = 'services-2';
  }
  if(is_page_template('page-research.php')){
    $classes[] = 'research';
  }
  if(is_archive('vts_press')){
    $classes[] = 'press';
  }
  if(is_page_template('page-training.php')){
    $classes[] = 'training';
  }
  if(is_page_template('page-oss.php')){
    $classes[] = 'online-summer-series';
  }
  if (is_page(2002)){
    $classes[] = 'student-thinking';
  }
  if (is_page(2847)){
    $classes[] = 'readings';
  }
  if(is_singular('vts_lesson')){
    $classes[] = 'lesson-image';
  }
  if(is_singular('vts_person')){
    $classes[] = 'single-person';
  }
  if (is_page(2000)){
    $classes[] = 'facilitating';
  }
  if(is_post_type_archive('vts_curriculum')
    OR is_singular('vts_person')
    OR is_page(2239)
    OR is_page(1795)
    OR is_page(2750)){
    $classes[] = 'stripey-bottom';
  }
	return $classes;
}
add_filter( 'body_class', 'more_body_classes' );


/* =============================
ADDING FIELDS TO USER PROFILE
================================ */

/* NOTE: Two functions here. The second hooks my new custom field into the edit-account screeen,
and the first one saves the information from that field once you've hit submit on the form -- all
without having to mess with woo core. 
*/

/* Add the new fields to the form
----------------------------------- */
add_action( 'woocommerce_edit_account_form', 'show_vts_customer_fields' );
function show_vts_customer_fields() {

  $user         = new stdClass();
	$user->ID     = (int) get_current_user_id();
	$current_user = get_user_by( 'id', $user->ID );
  $meta = get_user_meta($user->ID);

  $customerType = isset($meta['_customer_type']) ? $meta['_customer_type'][0] : NULL;
  $schoolLevel = isset($meta['_school_level']) ? $meta['_school_level'][0] : NULL;
  $customerInstitution = isset($meta['_customer_institution']) ? $meta['_customer_institution'][0] : NULL;
  $customerInstitutionCountry = isset($meta['_customer_institution_country']) ? $meta['_customer_institution_country'][0] : NULL;
  $customerInstitutionState = isset($meta['_customer_institution_state']) ? $meta['_customer_institution_state'][0] : NULL;

  // THE CUSTOMER-TYPE DROPDOWN
  woocommerce_form_field( 'customer_type', array(
      'type' => 'select',
      'class' => array('form-row-wide'),
      'label' => __('Where do you use VTS?'),
      'required' => true,
      'options' => array(
        'school' => 'School',
        'museum' => 'Museum/Gallery',
        'other' => 'Other'
      )
    ),
    $customerType
  );

  // THE SCHOOL-LEVEL DROPDOWN
  woocommerce_form_field( 'school_level', array(
      'type' => 'select',
      'class' => array('form-row-wide'),
      'label' => __('If you use VTS in a school, at what grade level?'),
      'required' => false,
      'options' => array(
        '' => '',
        'pre-k' => 'Pre-K',
        'kindergarten' => 'Kindergarten',
        '1' => 'Grade 1',
        '2' => 'Grade 2',
        'year-1' => 'Grade 3-5/Year 1',
        'year-2' => 'Grade 4-5/Year 2',
        'year-3' => 'Grade 5/Year 3',
        '6-8' => 'Grades 6-8'
      )
    ),
    $schoolLevel
  );

  // THE CUSTOMER-INSTITUTION TEXT FIELD
  woocommerce_form_field( 'customer_institution', array(
      'type' => 'text',
      'class' => array('form-row-wide'),
      'label' => __("What's the name of your institution?"),
      'required' => false,
      'placeholder' => 'Jefferson Elementary'
    ),
    $customerInstitution
  );

  // THE CUSTOMER-INSTITUTION COUNTRY DROPDOWN
  woocommerce_form_field( 'customer_institution_country', array(
      'type' => 'country',
      'class' => array('form-row-wide'),
      'label' => __("What country is that in?"),
      'required' => false,
      'placeholder' => 'United States ',
      'default' => 'US'
    ),
    $customerInstitutionCountry
  );

  // THE CUSTOMER-INSTITUTION STATE DROPDOWN
  woocommerce_form_field( 'customer_institution_state', array(
      'type' => 'state',
      'class' => array('form-row-wide'),
      'label' => __("If you're in the U.S., which state?"),
      'required' => false,
      'placeholder' => 'California '
    ),
    $customerInstitutionState
  );
}

/* Add to WooCommerce's list of required fields
------------------------------------------------- */
add_filter( 'woocommerce_save_account_details_required_fields', 'add_vts_required_customer_fields');
function add_vts_required_customer_fields($array){
  $array['customer_type'] = __( 'Customer Type', 'woocommerce' );
  return $array;
}

/* Save the new account details
--------------------------------- */
add_action('woocommerce_save_account_details','save_vts_customer_fields');
function save_vts_customer_fields(){

  // get basic user info
  $user         = new stdClass();
  $user->ID     = (int) get_current_user_id();
  $current_user = get_user_by( 'id', $user->ID );

  // get the meta values
  $customerType = !empty($_POST['customer_type']) ? wc_clean($_POST['customer_type']) : '';
  $schoolLevel = !empty($_POST['school_level']) ? wc_clean($_POST['school_level']) : '';
  $customerInstitution = !empty($_POST['customer_institution']) ? wc_clean($_POST['customer_institution']) : '';
  $customerInstitutionCountry = !empty($_POST['customer_institution_country']) ? wc_clean($_POST['customer_institution_country']) : '';
  $customerInstitutionState = !empty($_POST['customer_institution_state']) ? wc_clean($_POST['customer_institution_state']) : '';

  // update the customer type
  if(get_user_meta($user->ID,'_customer_type',true) != ''){
    update_user_meta($user->ID, '_customer_type',$customerType);
  } else {
    add_user_meta($user->ID, '_customer_type',$customerType,true);
  }

  // update the school level (if relevant)
  if(get_user_meta($user->ID,'_school_level',true) != ''){
    // update school level if type is school
    if($customerType == 'school'){
      update_user_meta($user->ID, '_school_level',$schoolLevel);
    }
    // otherwise delete the school level record
    else {
      delete_user_meta($user->ID, '_school_level',$schoolLevel);
    }
  } else {
    if($customerType == 'school'){
      add_user_meta($user->ID, '_school_level',$schoolLevel,true);
    }
  }

  // update the institution
  if(get_user_meta($user->ID,'_customer_institution',true) != ''){
    update_user_meta($user->ID, '_customer_institution',$customerInstitution);
  } else {
    add_user_meta($user->ID, '_customer_institution',$customerInstitution,true);
  }

  // update the country
  if(get_user_meta($user->ID,'_customer_institution_country',true) != ''){
    update_user_meta($user->ID, '_customer_institution_country',$customerInstitutionCountry);
  } else {
    add_user_meta($user->ID, '_customer_institution_country',$customerInstitutionCountry,true);
  }

  // update the state (if relevant)
  if(get_user_meta($user->ID,'_customer_institution_state',true) != ''){
    // update state only if country is US
    if($customerInstitutionCountry == 'US'){
      update_user_meta($user->ID, '_customer_institution_state',$customerInstitutionState);
    }
    // otherwise delete the state record
    else {
      delete_user_meta($user->ID, '_customer_institution_state',$customerInstitutionState);
    }
  } else {
    if($customerInstitutionCountry == 'US'){
      add_user_meta($user->ID, '_customer_institution_state',$customerInstitutionState,true);
    }
  }
}

/* Display new account information on my-account dashboard
----------------------------------------------------------- */
add_action('vts_my_account_profile','show_vts_customer_info');
function show_vts_customer_info(){

  // get basic user info
  $user         = new stdClass();
  $user->ID     = (int) get_current_user_id();
  $current_user = get_user_by( 'id', $user->ID );

  $customerType = get_user_meta($user->ID,'_customer_type',true);
  $schoolLevel = get_user_meta($user->ID,'_school_level',true);
  $customerInstitution = get_user_meta($user->ID,'_customer_institution',true);
  $customerInstitutionCountry = get_user_meta($user->ID,'_customer_institution_country',true);
  $customerInstitutionState = get_user_meta($user->ID,'_customer_institution_state',true);

  echo "<h2>" . __('My Profile','woocommerce') . "</h2>";
  echo "<p>";
  printf( __( '<a href="%s">Edit your profile information</a>.', 'woocommerce' ),
		wc_customer_edit_account_url()
	);
  echo "</p>";
  echo "<ul>";
  echo "<li><span>" . __('Workplace Type','woocommerce') . ":</span> " . ucfirst($customerType) . "</li>";
  if($customerType == 'school' && $schoolLevel != ''){
    echo "<li><span>" . __('Grade Level','woocommerce') . ":</span> " . $schoolLevel . "</li>";
  }
  if(isset($customerInstitution)){
    echo "<li><span>" . __('Where You Work','woocommerce') . ":</span> " . $customerInstitution . "</li>";
  }
  if($customerInstitutionCountry != '' && $customerInstitutionState != ''){
    $location = $customerInstitutionState . ", " . $customerInstitutionCountry;
  } elseif($customerInstitutionCountry != ''){
    $location = $customerInstitutionCountry;
  } else {
    $location = '';
  }
  echo "<li><span>" . __('Location','woocommerce') . ":</span> " . $location . "</li>";
}


/* ========================
CHECK VIEWING PRIVILEGES
=========================== */
/* Check to see if the user should get access to membership stuff
(this goes beyond just checking for membership to also include editors
and administrators, who should be able to see this stuff regardless
of membership status) */
if(!function_exists('can_see_membership_stuff')){
function can_see_membership_stuff($user_id=null){

  // get the user
  if(!$user_id){
    $user = wp_get_current_user();
    $user_id = $user->ID;
  }

  // if user is editor or administrator, return true right away
  if(in_array('administrator',$user->roles) OR in_array('editor',$user->roles)  OR in_array('shop_manager',$user->roles)){
    return true;
  }

  // otherwise check membership status
  if(has_access_through_membership($user_id)){
    return true;
  } else {
    return false;
  }
}}


/* ===============================
CHECK FOR ANY ACTIVE MEMBERSHIP
================================== */
function has_access_through_membership($user_id=null){

  // get the user
  if(!$user_id){
    $user = wp_get_current_user();
    $user_id = $user->ID;
  }

  // look for these acceptable statuses...
  $acceptableStatuses = array(
    'status' => array(
      'active',
      'complimentary',
      'pending',
      'free_trial'
    ),
  );

  /// ... in this query
  $active_memberships = wc_memberships_get_user_memberships( $user_id, $acceptableStatuses );

  // if no active memberships were found, return false
  if(empty($active_memberships)){
    return false;
  }

  // otherwise deal with the active memberships that were returned
  else {

    // these are the access-granting membership plans
    $plans_that_grant_access = array('individual-membership','lifetime-membership','site-test-member','sponsored-membership','institutional-membership','general-membership');

    // loop through the active memberships that were found
    foreach($active_memberships as $m){
      // if the slug for any of these is in the array of access-granting membership plans, just return true right away
      if(in_array($m->plan->slug,$plans_that_grant_access)){
        return true;
      }
    }

    // otherwise we'll return false, assuming the loop didn't find anything
    return false;
  }
}


/* ==============================
CHECK FOR CERTIFICATION STATUS
================================= */
// tests whether the current user has an active certification-type membership
// returns an array of the memberships if true, false if false
function is_certified_member( $user_id=null ){

  // get the user
  if(!$user_id){
    $user = wp_get_current_user();
    $user_id = $user->ID;
  }

  // look for these acceptable statuses...
  $acceptableStatuses = array(
    'status' => array(
      'active',
      'complimentary',
      'pending',
      'free_trial'
    ),
  );

  /// ... in this query
  $active_memberships = wc_memberships_get_user_memberships( $user_id, $acceptableStatuses );

  // if no active memberships were found, return false
  if(empty($active_memberships)){
    return false;
  }

  // otherwise deal with the active memberships that were returned
  else {

    // set up an empty array to catch any certification-type memberships
    $certification_memberships = array();

    // these are the access-granting membership plans
    $certification_plans = array('certified-facilitator','certified-coach','certified-trainer');

    // loop through the active memberships that were found
    foreach($active_memberships as $m){

      // if the slug for any of these is in the array of certification-type membership plans, stuff the plan in the $certification_memberships array
      if(in_array($m->plan->slug,$certification_plans)){
        $certification_memberships[] = $m;
      }
    }

    // return false if we didn't find anything
    if(empty($certification_memberships)){
      return false;
    }

    // otherwise return an array of the certification memberships we found
    else {
      return $certification_memberships;
    }
  }
}


/* ================================
TRACK CURRICULUM VIEWING HISTORY
=================================== */

/* Track members' traffic to curriculum images
---------------------------------------------- */
add_action('wp','vts_track_curriculum_views');
function vts_track_curriculum_views(){

  // only proceed for logged-in users
  if(is_user_logged_in()){
    $user = wp_get_current_user();

    // only proceed if this is a curriculum set
    if(is_singular('vts_curriculum')){

      // only proceed if this is a member who can view the curriculum set
      if(has_access_through_membership($user->ID)){
        global $post;

        // if no record of this user viewing a set exists yet, create one
        if(get_user_meta($user->ID,'_vts_member_curriculum_views',true) == ''){
          $record = array($post->ID => 1);
          add_user_meta($user->ID, '_vts_member_curriculum_views', maybe_serialize($record), true);
        }

        // else if we already have a record of this user looking at sets
        else {

          $record = maybe_unserialize(get_user_meta($user->ID,'_vts_member_curriculum_views',true));

          // if they're already viewed this particular set, plus-one and update
          if(isset($record[$post->ID])){
            $record[$post->ID] = $record[$post->ID] + 1;
            update_user_meta($user->ID,'_vts_member_curriculum_views',maybe_serialize($record));
          }

          // else if this is their first time viewing this set, make a note of it
          else {
            $record = maybe_unserialize(get_user_meta($user->ID,'_vts_member_curriculum_views',true));
            $record[$post->ID] = 1;
            update_user_meta($user->ID,'_vts_member_curriculum_views',maybe_serialize($record));
          }
        }
      }
    }
  }
}

/* See if user has curriculum-set viewing history
----------------------------------------------------------- */
function has_vts_curriculum_view_order($user_id){
  if(get_user_meta($user_id,'_vts_member_curriculum_views',true) == ''){
    return false;
  } else {
    return true;
  }
}

/* Get user's curriculum-set viewing history
----------------------------------------------------------- */
function get_vts_curriculum_view_order($user_id,$num_posts){

  $sets = array();

  // if we don't have any history, we'll be grabbing the requested number of core sets
  if(get_user_meta($user_id,'_vts_member_curriculum_views',true) == ''){
    $num_core_posts = $num_posts;
    $num_history_posts = 0;
  }

  // else if we do have some history records, let's work out how many of each to grab
  else {

    // get the records, unserialized
    $record = maybe_unserialize(get_user_meta($user_id,'_vts_member_curriculum_views',true));

    // sort them, descending
    arsort($record);

    // rip out just the post ids
    $searchFor = array();
    foreach($record as $key=>$val){
      $searchFor[] = $key;
    }

    // if we have more than the number of sets requested, we'll just use these, without any core sets
    if(count($searchFor) >= $num_posts){
      $num_history_posts = $num_posts;
      $num_core_posts = 0;
    }

    // otherwise figure out the balance between core and history posts
    else {
      $num_history_posts = count($searchFor);
      $num_core_posts = $num_posts - $num_history_posts;
    }
  }

  // if we need to grab core posts, grab them
  if($num_core_posts > 0){
    $core = get_posts(
      array(
        'posts_per_page' => $num_core_posts,
        'post_type' => 'vts_curriculum',
        'tax_query' => array(
          array(
            'taxonomy' => 'vts_curriculum_set',
            'field' => 'slug',
            'terms' => 'core'
          )
        )
      )
    );
    $sets['core'] = $core;
  }

  if($num_history_posts > 0){
    // loop through the ids, get their posts, sock them in an array, and return it
    $i=0;foreach($searchFor as $set){
      if($i<$num_history_posts){
        $sets['history'][] = get_post($set);
      }
      $i++;
    }
  }

  return $sets;
}


/* =====================================
REMOVE EXTRANEOUS STUFF FROM SHOP PAGE
======================================== */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


/* =====================================
CHANGE THE TEXT IN THE MEMBER DISCOUNT
NOTICE THAT WOOCOMMERCE PUTS ON SINGLE 
PRODUCT PAGES
======================================== */
add_filter('wc_memberships_member_discount_badge',function($badge,$the_post,$product){
  return '<span class="onsale wc-memberships-variation-member-discount">Certified Facilitator discount!</span>';
},10,3);


/* ================================
SUSS OUT DIFFERENT USER TYPES
=================================== */

function is_customer($user=null){
  if(!$user){
    $user = wp_get_current_user();
  }
  if(in_array('customer',$user->roles)){
    return true;
  } else {
    return false;
  }
}

function is_simple_customer($user=null){
  if(!$user){
    $user = wp_get_current_user();
  }
  if(in_array('customer',$user->roles)){
    if(in_array('administrator',$user->roles) OR in_array('editor',$user->roles) OR in_array('shop_manager',$user->roles) OR has_access_through_membership($user->ID)){
      return false;
    } else {
      return true;
    }
  }
}


/* ======================================
REDIRECT LOGIN
On logging in via WooCommerce, redirect 
members to the dashboard, everybody else 
just to the normal My Account page
========================================= */
add_filter( 'woocommerce_login_redirect', 'wc_custom_user_redirect', 10, 2 );
function wc_custom_user_redirect($redirect,$user){

  // get the first of all the roles assigned to the user
  $role = $user->roles[0];

  // get the link for the dashboard
  $member_dashboard = get_permalink(1816);

  // get the link for the certification application
  $cert_application = "/certification/apply/";

  // get the link for the account page
  $myaccount = get_permalink( wc_get_page_id( 'myaccount' ) );

  // get the link for the checkout page
  $checkout = get_permalink( wc_get_page_id( 'checkout' ) );

  // only do this redirection if we're not on the checkout page
  // (if we ARE on the checkout page, we want to just return there after login)
  if($redirect !== $checkout){
    if($redirect === $cert_application){
      $redirect = $cert_application;
    } else {
      if(has_access_through_membership($user->ID)){
        $redirect = $member_dashboard;
      } else {
        if($role == 'customer'){
          $redirect = $myaccount;
        } else {
          $redirect = wp_get_referer() ? wp_get_referer() : home_url();
        }
      }
    }
  }

  return $redirect;
}


/* ==============================================
ORDERS OUTSIDE THE US
Change the text for when customers are ordering
physical products from outside of the US
================================================= */
add_filter('woocommerce_cart_no_shipping_available_html','vts_modify_shipping_message_for_foreign_customers');
add_filter('woocommerce_no_shipping_available_html','vts_modify_shipping_message_for_foreign_customers');
function vts_modify_shipping_message_for_foreign_customers(){
  return __("We're sorry, but we don't offer shipping outside of the United States. To avoid being charged, please remove any physical products from your cart.","bonestheme");
}


/* ==============================
CHECK IF A GIVEN PIECE IS FROM 
THE ASIAN ART MUSEUM COLLECTION
================================= */
if (!function_exists('is_asian_art')) {
function is_asian_art($id){
  $status = get_post_meta($id,'vts_lesson_image_asian',true);
  if($status == '' OR $status == false){
    return false;
  } else {
    return true;
  }
}}


/* ================================
DON'T WRAP POST IMAGES IN P TAGS
=================================== */
function filter_ptags_on_images($content){
 return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');


/* =========================
PUT MAX ON EXCERPT LENGTH
============================ */
if (!function_exists('the_excerpt_max')) {
function the_excerpt_max($post,$charlength) {
	$excerpt = get_the_excerpt($post->ID);
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo ' ... ';
	} else {
		echo $excerpt;
	}
}}
if (!function_exists('get_the_excerpt_max')) {
function get_the_excerpt_max($id,$charlength) {
	$excerpt = get_the_excerpt($id);
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			return mb_substr( $subex, 0, $excut ) . "... ";
		} else {
			return $subex . "... ";
		}
	} else {
		return $excerpt;
	}
}}


/* =============================
INJECT "NOTHING FOUND" MESSAGES
================================ */
if (!function_exists('nothing_found')) {
function nothing_found($message = null){
  if(!$message){
    $message = "Sorry, we couldn't find what you're looking for.";
  }?>
  <p class="none-found"><?php babel($message);?></p>
<?php }
}


/* ==================================
CLEAN UP WOO SINGLE PRODUCT TEMPLATE
===================================== */
add_action("init","cleanup_single_product");
if(!function_exists("cleanup_single_product")){
  function cleanup_single_product(){
    remove_action("woocommerce_before_single_product_summary","woocommerce_show_product_images",20);
    remove_action("woocommerce_single_product_summary","woocommerce_template_single_title",5);
    remove_action("woocommerce_single_product_summary","woocommerce_template_single_rating",10);
    remove_action("woocommerce_single_product_summary","woocommerce_template_single_excerpt",20);
    remove_action("woocommerce_single_product_summary","woocommerce_template_single_meta",40);
    remove_action("woocommerce_single_product_summary","woocommerce_template_single_sharing",50);
    remove_action("woocommerce_after_single_product_summary","woocommerce_output_product_data_tabs",10);
    remove_action("woocommerce_after_single_product_summary","woocommerce_upsell_display",15);
    remove_action("woocommerce_after_single_product_summary","woocommerce_output_related_products",20);
    remove_action("woocommerce_single_variation","woocommerce_single_variation",10);
  }
}


/* ====================================
MAKE THE CURRICULUM MENU ITEM ACTIVE
IF IN ANY CURRICULUM SET
======================================= */
/*
 * @link http://www.billerickson.net/customize-which-menu-item-is-marked-active/
 * @param array $classes, current menu classes
 * @param object $item, current menu item
 * @param object $args, menu arguments
 * @return array $classes
 */
if(!function_exists('curriculum_menu_classes')){
function curriculum_menu_classes( $classes, $item, $args ) {

  // back out if we're not talking about the account nav
  if( 'user-menu-member' !== $args->theme_location )
		return $classes;

  // apply current-menu-item class if this is single-curriculum and the title of the menu item is 'Curriculum'
  if(is_singular( 'vts_curriculum' ) && 'Curriculum' == $item->title && in_array('menu-item-has-children',$item->classes)){
		$classes[] = 'current-menu-item';
  }

	return array_unique( $classes );
}}
add_filter( 'nav_menu_css_class', 'curriculum_menu_classes', 10, 3 );


/* ====================================
GRANT MENU ACCESS TO EDITOR ROLE
======================================= */
// add_action("admin_head", "hide_appearance_menu_from_editors");
if(!function_exists("hide_appearance_menu_from_editors")){
function hide_appearance_menu_from_editors() {

  // get the current user
  $user = wp_get_current_user();

  // only apply this clamp-down to editors and shop managers
  if(in_array('editor',(array) $user->roles) OR in_array('shop_manager',(array) $user->roles)){

    // Hide theme selection page
    remove_submenu_page( "themes.php", "themes.php" );

    global $submenu;
    // Hide customize page
    unset($submenu["themes.php"][6]);
    // Hide background pages
    unset($submenu["themes.php"][20]);
  }
}}


/* ======================================
SPECIFY ORDER FOR CERTAIN ARCHIVE PAGES
========================================= */
add_action("pre_get_posts","vts_custom_query_vars");
if(!function_exists("vts_custom_query_vars")){
function vts_custom_query_vars($query){
  if(!is_admin() && $query->is_main_query()){
    if(is_post_type_archive("vts_press")){
      $query->set("meta_key","vts_press_clips_date");
      $query->set("orderby", "meta_value");
      $query->set("order" , "DESC");
    }
  }
}}


/* =====================================================
ADD A TAX-EXEMPTION NOTIFICATION TO THE CHECKOUT PAGE
======================================================== */
if(!function_exists('do_exemption_warning')){
add_action('woocommerce_review_order_before_payment','do_exemption_warning');
function do_exemption_warning(){?>
  <p class="checkout-tax-exempt-notification focus-wc-notification"><?php echo __("Note: If your organization is exempt from paying sales tax, please prepare exemption documentation and contact rmuscardini@vtshome.org to place your order.","bonestheme");?></p>
<?php }}


/* =================================================
ALLOW CERTAIN USERS TO HAVE MULTIPLE LOGIN SESSIONS
==================================================== */
// nod to: https://wordpress.org/plugins/prevent-concurrent-logins/faq/
function my_pcl_whitelist_roles( $prevent, $user_id ) {

  $whitelist = array( 'contributor', 'author', 'editor', 'administrator' ); // Provide an array of whitelisted user roles

  $user = get_user_by( 'id', absint( $user_id ) );

  $roles = ! empty( $user->roles ) ? $user->roles : array();

  return array_intersect( $roles, $whitelist ) ? false : $prevent;

}
add_filter( 'pcl_prevent_concurrent_logins', 'my_pcl_whitelist_roles', 10, 2 );


/* ====================================
AN EASY INTERNATIONALIZATION FUNCTION
======================================= */
if(!function_exists('babel')){
function babel($str){
  _e($str,'focustheme');
}}


/* ====================================
OUTPUT FORMATTED HAIRY CONTENT
======================================= */
if(!function_exists('compose')){
function compose($content){
  echo wp_kses_post(wpautop($content));
}}


/* =======================================
CHECKS IF STRING (LIKE THE_CONTENT)
IS REALLY, TRULY EMPTY
========================================== */
if(!function_exists('empty_content')){
function empty_content($str) {
  return trim(str_replace('&nbsp;','',strip_tags($str))) == '';
}}


/* ========================================
TURN ANY STRING INTO A HYPHEN-SEPARATED ONE
=========================================== */
if(!function_exists('slugify')){
function slugify($string){
  $blown_up = explode(' ',$string);
  $glued_back = implode('-',$blown_up);
  $lowered = strtolower($glued_back);
  return esc_html($lowered);
}}


/* ====================================
CHECK, SANITIZE, AND LOAD VARIABLES
FOR ALL COMMONLY USED COMPONENTS
======================================= */
function load_component($type,$args){
  switch($type){
    case "card_blog":
      $title = (isset($args['title']) && $args['title'] !== '' ) ? esc_html($args['title']) : '';
      $url = isset($args['url']) ? esc_url($args['url']) : '#';
      $has_thumb = $args['img'] ? true : false;
      $img = ($args['img']) ? esc_url($args['img']) : get_stylesheet_directory_uri() . '/library/images/icons/painting-green.png';
      $date_pretty = (isset($args['date_pretty']) && $args['date_pretty'] !== '') ? esc_html($args['date_pretty']) : '';
      $date_ugly = (isset($args['date_ugly']) && $args['date_ugly'] !== '') ? esc_html($args['date_ugly']) : '';
      $author = (isset($args['author']) && $args['author'] !== '') ? esc_html($args['author']) : '';
      $excerpt = (isset($args['excerpt']) && !empty_content($args['excerpt']) ) ? wp_kses_post($args['excerpt']) : '';
      $flag = (isset($args['flag']) && !empty_content($args['flag'])) ? esc_html($args['flag']) : null;
      include(locate_template('templates/cards/blog.php'));
      break;
    case "expando":
      $x = isset($args['x']) ? intval($args['x']) : 1;
      $c = isset($args['c']) ? intval($args['c']) : 1;
      $title = (isset($args['title']) && $args['title'] !== '' ) ? esc_html($args['title']) : '';
      $content = (isset($args['content']) && !empty_content($args['content']) ) ? wp_kses_post(wpautop($args['content'])) : '';
      include(locate_template('templates/expando.php'));
      break;
    case "offerings":
      $title = esc_html($args['title']);
      $body = (isset($args['body']) && !empty_content($args['body'])) ? wp_kses_post($args['body']) : null;
      $link = esc_url($args['link']);
      include(locate_template('templates/cards/offerings.php'));
      break;
    default:
      $url = isset($args['url']) ? esc_url($args['url']) : null;
      $img = isset($args['img']) ? esc_url($args['img']) : null;
      $title = esc_html($args['title']);
      $helem = isset($args['helem']) ? intval($args['helem']) : 3;
      $content = isset($args['content']) ? wp_kses_post(wpautop($args['content'])) : null;
      $external_link = (isset($args['external_link']) && $args['external_link'] === '1') ? true : false;
      include(locate_template('components/tpl-chunk-basic.php'));
  }
}


/* ====================================
CATCH LOGIN FAILURE AND ADD A PROMPT,
INQUIRING WHETHER USER IS TRYING TO
REDEEM A GROUP SUBSCRIPTION
======================================= */
add_action('wp_login_failed',function($username){
  add_filter( 'body_class', function($classes){
    $classes[] = 'login-failed';
    return $classes;
  });
  add_action('woocommerce_before_customer_login_form',function(){
    echo "<div class='woocommerce-message group-redemption-inquiry'>";
      babel("HINT: Are you trying to join a group subscription? ");
      echo "<a href='#group-sub-login-help'>";
        babel("We can help!");
      echo "</a>";
    echo "</div>";
  });
});


/* =============================
ADD FOOTNOTES IN BLOG POSTS
Via shortcodes in editor
(Potential for Gutenberg?)
================================ */
if(!function_exists('make_footnote')){
  add_shortcode('footnote','make_footnote');
  function make_footnote($atts){
    if(!$atts OR !isset($atts['id'])){
      return;
    } else {
      $id = intval($atts['id']);
      return "<sup><a href='#footnotes' id='footnote-source-" . $id . "' data-action='swoop-to'>" . $id . "</a></sup>";
    }
  }
}


/* ====================================
MANUALLY SPECIFY TEMPLATES FOR PAGES
======================================= */

/**
 * Attaches the specified template to the page identified by the specified name.
 *
 * @params    $page_name        The name of the page to attach the template.
 * @params    $template_path    The template's filename (assumes .php' is specified)
 *
 * @returns   -1 if the page does not exist; otherwise, the ID of the page.
 */
if (!function_exists('attach_template_to_page')) {
function attach_template_to_page( $page_id, $template_file_name ) {

    // Look for the page by the specified title. Set the ID to -1 if it doesn't exist.
    // Otherwise, set it to the page's ID.
    $page = get_post( $page_id, OBJECT);
    $page_id = null == $page ? -1 : $page->ID;

    // Only attach the template if the page exists
    if( -1 != $page_id ) {
      update_post_meta( $page_id, '_wp_page_template', $template_file_name );
    }

    return $page_id;
}}

attach_template_to_page(2847,"pg-readings.php");
attach_template_to_page(2002,"pg-thinking-assessments.php");
attach_template_to_page(1814,"pg-about.php");
attach_template_to_page(3394,"pg-home.php");
attach_template_to_page(1795,"pg-oss.php");
attach_template_to_page(3084,"pg-vts-in-video.php");
attach_template_to_page(1775,"pg-services.php");
attach_template_to_page(1788,"pg-training.php");
attach_template_to_page(2008,"pg-research.php");
attach_template_to_page(3389,"pg-publications-philip.php");
attach_template_to_page(3391,"pg-publications-abigail.php");
attach_template_to_page(2552,"pg-peer-curriculum.php");
attach_template_to_page(3107,"pg-highlighted.php");
attach_template_to_page(2239,"pg-shop.php");
attach_template_to_page(2000,"pg-facilitating.php");
attach_template_to_page(2937,"pg-aesthetic.php");
attach_template_to_page(1816,"pg-dashboard.php");
attach_template_to_page(12,"tpl-account.php");
attach_template_to_page(2750,"pg-founders.php");
attach_template_to_page(1819,"pg-printables.php");
attach_template_to_page(3307,"pg-contact.php");
attach_template_to_page(10,"pg-checkout.php");
attach_template_to_page(11,"pg-checkout.php");
attach_template_to_page(11742,"pg-philip-faqs.php");
attach_template_to_page(11864,"pg-philip-faqs.php");
/* DON'T DELETE THIS CLOSING TAG */ ?>