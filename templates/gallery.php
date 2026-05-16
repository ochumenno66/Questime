<?php
/*
    Template Part: Gallery
*/

$acf_all = array_filter([
    get_field('gallery_top_1'),
    get_field('gallery_top_2'),
    get_field('gallery_top_3'),
    get_field('gallery_top_4'),
    get_field('gallery_top_5'),
    get_field('gallery_top_6'),
    get_field('gallery_bottom_1'),
    get_field('gallery_bottom_2'),
    get_field('gallery_bottom_3'),
    get_field('gallery_bottom_4'),
    get_field('gallery_bottom_5'),
    get_field('gallery_bottom_6'),
]);

$acf_all   = array_values($acf_all);
$total_acf = count($acf_all);

if ($total_acf === 0) return;

$single_photo = ($total_acf === 1) ? $acf_all[0] : null;

if (!$single_photo) {
    $top_images    = array_slice($acf_all, 0, 6);
    $bottom_images = array_slice($acf_all, 6, 6);
}
?>

<section class="gallery-slider section-special" id="gallery-slider">
  <?php if ($single_photo) : ?>
    <div class="gallery-single section-top--offset">
      <img src="<?php echo esc_url($single_photo); ?>" alt="Gallery image" />
    </div>
  <?php else : ?>
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
  <?php endif; ?>
</section>