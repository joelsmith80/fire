<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>

<!-- Event Title -->
<?php do_action( 'tribe_events_before_the_event_title' ) ?>

<div class="card-text-space">

	<h1 class="card-title tribe-events-list-event-title">
		<a class="tribe-event-url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
			<?php the_title() ?>
		</a>
	</h1>

	<?php do_action( 'tribe_events_after_the_event_title' ) ?>

	<!-- Event Meta -->
	<?php do_action( 'tribe_events_before_the_meta' ) ?>

	<div class="card-subtitle card-event-subtitle tribe-events-event-meta">

		<!-- Schedule & Recurrence Details -->
		<div class="tribe-event-schedule-details">
			<?php echo tribe_events_event_schedule_details() ?>
		</div>

		<!-- Basic venue information -->
		<?php if ( $venue_details ) : ?>
			<div class="tribe-events-venue-details">
				<div><?php echo tribe_get_venue() . ", " . tribe_get_city();?></div>
			</div> <!-- .tribe-events-venue-details -->
		<?php endif; ?>

		<!-- Optional event facilitator(s) -->
		<?php if(get_field('vts_event_facilitator')){
			$ids = get_field('vts_event_facilitator');
			$facilitators = array();
			foreach($ids as $id){
				$facilitators[] = "<a href='" . get_permalink($id) .  "'>" . get_the_title($id) . "</a>";
			}
			echo "<div class='facilitators'>Led by " . implode(', ',$facilitators) . "</div>";
		}?>

	</div><!-- .tribe-events-event-meta -->

	<?php do_action( 'tribe_events_after_the_meta' ) ?>

	<!-- Event Content -->
	<?php do_action( 'tribe_events_before_the_content' ) ?>
	<div class="tribe-events-list-event-description tribe-events-content">
		<?php
		if(trim(get_the_content()) != ''){
			echo tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) );
		} else {
			if(has_term('beginner','tribe_events_cat')){
				echo get_field('vts_training_beginner',1788);
			}
			elseif(has_term('advanced','tribe_events_cat')){
				echo get_field('vts_training_advanced',1788);
			}
			elseif(has_term('aesthetic-thinking','tribe_events_cat')){
				echo get_field('vts_training_aesthetic',1788);
			}
			elseif(has_term('coaching','tribe_events_cat')){
				echo get_field('vts_training_coaching',1788);
			}
			elseif(has_term('oss','tribe_events_cat')){
				echo get_field('vts_training_oss',1788);
			}
			elseif(has_term('summer-institute','tribe_events_cat')){
				echo get_field('vts_training_summer_institute',1788);
			}
			else {
				echo '';
			}
		}?>
	</div><!-- .tribe-events-list-event-description -->

	<?php do_action( 'tribe_events_after_the_content' );?>

</div><!-- .card-text-space -->
