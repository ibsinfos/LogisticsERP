<?php
/**
 *  Used for showing the slider
 *  @package supernova
 */

$default_slides = array(
	array(
			'thumbnail_src' => SUPERNOVA_IMG_URI . '/1.jpg',
			'attachment_id' => false,
			'post_id'       => false,
			'title'         => "Hello World",
			'excerpt'       => "This is a demo slider, it will disappear when you set your own slides..."
		),
	array(
			'thumbnail_src' => SUPERNOVA_IMG_URI . '/2.jpg',
			'attachment_id' => false,
			'post_id'       => false,
			'title'         => "Color Schemes",
			'excerpt'       => "You would need to go to your themes customizer setting and start adding slides..."
	),

);
$slides = get_theme_mod( 'sup_slides' , $default_slides );

if( ! empty($slides) && ( is_home() || is_front_page() || is_page_template( 'page-templates/slider.php' ) ) ) : ?>

<div id="sup-slider" class="sup-slider clearfix">
	<ul class="sup-slides clearfix">

		<?php foreach( $slides as $slide ) :
			$post_id       = intval($slide['post_id']);
			$link          = get_permalink( $post_id );
			$thumbnail_src = isset( $slide['thumbnail_src'] ) && $slide['thumbnail_src'] ? esc_url($slide['thumbnail_src']) : false;
			$title         = isset( $slide['title'] ) && trim($slide['title']) ? sprintf( '<h2 class="slide-title" ><a href="%s">%s</a></h2>' , esc_url( $link ), esc_html($slide['title']) ) : false;
			$excerpt       = isset( $slide['excerpt']) && trim($slide['excerpt']) ? sprintf( '<p class="slide-excerpt"><a href="%s">%s</a></p>', esc_url( $link ) , esc_html( $slide['excerpt'] ) ) : false;
			$attachment_id = isset( $slide['attachment_id'] ) && $slide['attachment_id'] ? $slide['attachment_id'] : false;
		 ?>
		<li class="sup-slide">

			<?php echo $attachment_id ? wp_get_attachment_image( $attachment_id, 'full' ) : "<img src='{$thumbnail_src}'>"; ?>

			<?php if( $title || $excerpt ){ ?>
			<div class="sup-slide-content">
				<?php echo $title . $excerpt; ?>
			</div>
			<?php } ?>

		</li>
		<?php endforeach; ?>
	</ul>
	<div class="sup-cycle-pager clearfix"></div>

	<?php if( count($slides) ) { ?>
	<div class="sup-prev sup-slider-nav"></div>
	<div class="sup-next sup-slider-nav"></div>
	<?php } ?>

</div> <!-- #sup-slider -->

<?php endif; ?>
