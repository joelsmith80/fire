<?php
/**
 * List View Template
 * The wrapper template for a list of events. This includes the Past Events and Upcoming Events views
 * as well as those same views filtered to a specific category.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

do_action( 'tribe_events_before_template' );
?>

<div class="wrap">

	<header class="page-header region">
		<h1 class="page-title"><?php echo _e("Upcoming Events","focustheme");?></h1>
	</header>

	<aside class="events-page-controls region t-4 d-4 w-4">
		<?php tribe_get_template_part( 'modules/bar' ); ?>
	</aside>

	<div class="events-page-content region t-8 d-8 w-8">
		<?php tribe_get_template_part( 'list/content' ); ?>
	</div>

</div>

<?php
do_action( 'tribe_events_after_template' );
