<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/loop.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php
global $post;
global $more;
$more = false;
?>

<ul class="tribe-events-loop card-set">

	<?php
	// set a starting value for the date headers
	$header = "";

	while ( have_posts() ) : the_post(); ?>

		<!-- Month / Year Headers -->
		<?php
		// tribe_events_list_the_date_headers();
		// get the year and month
		$event_year = tribe_get_start_date( $post, false, 'Y' );
		$event_month = tribe_get_start_date( $post, false, 'm' );

		// convert month to a word
    $dateObj   = DateTime::createFromFormat('!m', $event_month);
    $monthName = $dateObj->format('F');

		// put them together
		$event_header = $monthName . " " . $event_year;

		// only show the header if it doesn't equal the previous header
		if($event_header != $header){
			$header = $event_header;
			echo "<h2>" . $event_header . "</h2>";
		}?>

		<li class="card-set-item">

			<?php do_action( 'tribe_events_inside_before_loop' ); ?>

			<!-- Event  -->
			<?php
			$post_parent = '';
			if ( $post->post_parent ) {
				$post_parent = ' data-parent-post-id="' . absint( $post->post_parent ) . '"';
			}?>
			<article id="post-<?php the_ID() ?>" class="card card-event <?php tribe_events_event_classes() ?>" <?php echo $post_parent; ?>>
				<?php tribe_get_template_part( 'list/single', 'event' ) ?>
			</article>

			<?php do_action( 'tribe_events_inside_after_loop' ); ?>

		</li>

	<?php endwhile; ?>

</ul><!-- .tribe-events-loop -->
