<?php
/*
    Template Part: Gallery Slider
*/

$dir = get_template_directory_uri();

// Дефолтные фото
$default_top = [
    $dir . '/assets/images/gallery/gallery-1.webp',
    $dir . '/assets/images/gallery/gallery-3.webp',
    $dir . '/assets/images/gallery/gallery-2.webp',
    $dir . '/assets/images/gallery/gallery-3.webp',
    $dir . '/assets/images/gallery/gallery-2.webp',
    $dir . '/assets/images/gallery/gallery-3.webp',
];

$default_bottom = [
    $dir . '/assets/images/gallery/gallery-1.webp',
    $dir . '/assets/images/gallery/gallery-4.webp',
    $dir . '/assets/images/gallery/gallery-1.webp',
    $dir . '/assets/images/gallery/gallery-4.webp',
    $dir . '/assets/images/gallery/gallery-1.webp',
    $dir . '/assets/images/gallery/gallery-4.webp',
];

$acf_top = array_filter([
    get_field('gallery_top_1'),
    get_field('gallery_top_2'),
    get_field('gallery_top_3'),
    get_field('gallery_top_4'),
    get_field('gallery_top_5'),
    get_field('gallery_top_6'),
]);

$acf_bottom = array_filter([
    get_field('gallery_bottom_1'),
    get_field('gallery_bottom_2'),
    get_field('gallery_bottom_3'),
    get_field('gallery_bottom_4'),
    get_field('gallery_bottom_5'),
    get_field('gallery_bottom_6'),
]);

function fill_images($acf_images, $default_images, $total = 6) {
    $acf_images     = array_values($acf_images);
    $default_images = array_values($default_images);
    $result         = $acf_images;
    $default_index  = 0;

    while (count($result) < $total) {
        $result[] = $default_images[$default_index % count($default_images)];
        $default_index++;
    }

    return $result;
}

$top_images    = fill_images($acf_top,    $default_top);
$bottom_images = fill_images($acf_bottom, $default_bottom);
?>

<section class="gallery-slider section-special" id="gallery-slider">
  <div class="gallery-slider__wrapper">
    <div class="slider-track__horizontal" id="slider-track__horizontal">
      <?php foreach ($top_images as $url): ?>
        <div class="slide-top">
          <img src="<?php echo esc_url($url); ?>" alt="Gallery image" />
        </div>
      <?php endforeach; ?>
    </div>
    <div class="slider-track__vertical" id="slider-track__vertical">
      <?php foreach ($bottom_images as $url): ?>
        <div class="slide-bottom">
          <img src="<?php echo esc_url($url); ?>" alt="Gallery image" />
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>