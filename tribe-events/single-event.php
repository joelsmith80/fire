<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();?>

<section class="single-event-main">
	<div class="wrap">

		<div class="region single-event-main-region t-9 d-9 w-8">

			<header class="single-event-header page-header">
				<?php tribe_the_notices() ?>
				<a href="<?php echo esc_url( tribe_get_events_link() ); ?>" class="internal-back-link"><?php printf( '&laquo; ' . esc_html__( 'All events', 'the-events-calendar' ) ); ?></a>
				<h1 class="single-event-title page-title"><?php the_title();?></h1>
				<h2 class="single-event-dates"><?php echo tribe_events_event_schedule_details( $event_id); ?></h2>
				<h3 class="single-event-place"><?php echo tribe_get_venue() . ", " . tribe_get_city();?></h3>
				<?php if(get_field('vts_event_registration_link')) echo "<h4 class='single-event-cta'><a href='" . get_field('vts_event_registration_link') . "' target='_blank' rel='noopener' class='button'>Register</a></h1>";?>
			</header>

			<?php while ( have_posts() ) :  the_post(); ?>
			<div class="single-event-description">

				<?php
				// cut out any whitespace that might be in the content field
				// if there's something left, show it
				// otherwise, check for various event types in order to show their default descriptions
				if(trim(get_the_content()) != ''){
					the_content();
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

			</div>
			<?php endwhile;?>
		</div>

	</div><!-- .wrap -->
</section>

<section class="single-event-details feature-stripe cf">
	<div class="wrap">
		<div class="region">
			<ul class="single-event-details-list flexgrid m1-one m2-one t-three d-three w-three">
				<li><?php tribe_get_template_part( 'modules/meta/details' );?></li>
				<?php if ( tribe_has_organizer() ):?>
					<li>
						<?php tribe_get_template_part( 'modules/meta/organizer' );?>
					</li>
				<?php endif;?>
			</ul>
		</div>
	</div>
</section>

<section class="single-event-venue">
	<div class="wrap">
		<div class="region">
			<?php
			tribe_get_template_part( 'modules/meta/map' );
			tribe_get_template_part( 'modules/meta/venue' );
			if(get_field('vts_event_hotel_info')):?>
				<div class="tribe_events_single_event_hotel_info">
					<h3>Hotel Information</h3>
					<?php echo get_field('vts_event_hotel_info');?>
				</div>
			<?php endif;?>
		</div>
	</div>
</section>
