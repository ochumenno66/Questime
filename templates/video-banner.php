<?php
// Template part: Video

if (!get_field('show_video')) {
    return;
}

$video = get_field('video_file');

if (!$video) {
    return;
}
?>

<section class="video section-special">
    <div class="video-single container">
        <video
            class="video-single__player"
            controls
            playsinline
            preload="metadata">
            <source
                src="<?php echo esc_url($video['url']); ?>"
                type="<?php echo esc_attr($video['mime_type']); ?>">
        </video>
    </div>
</section>