<?php
$video_meta = get_post_meta( get_the_ID(), 'qodef_post_format_video_url', true );

if ( ! empty( $video_meta ) ) {
	$oembed = wp_oembed_get( $video_meta );
	if ( ! empty( $oembed ) ) {
		echo wp_oembed_get( $video_meta );
	} else { ?>

        <div class="qodef-e-media-video">

			<?php
			// Video player settings
			$settings = apply_filters( 'touchup_filter_video_post_format_settings', array(
				'width'  => 1300, // Aspect ration is 16:9
				'height' => 731,
				'loop'   => true
			) );

			// Init video player
			echo wp_video_shortcode( array_merge( array( 'src' => esc_url( $video_meta ) ), $settings ) ); ?>

        </div>

	<?php }
} else {
	// Include featured image
	touchup_template_part( 'blog', 'templates/parts/post-info/image' );
} ?>