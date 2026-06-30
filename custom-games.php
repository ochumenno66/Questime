<?php
/*
Template Name: Custom games
*/

get_header();

// Hero — данные из ACF
$cg_title      = get_field('cg_hero_title')     ?: 'Custom Games';
$cg_text_1     = get_field('cg_hero_text_1')    ?: 'If you\'re facing an unusual challenge involving gamification, blending education and entertainment, team buildings and corporate events, or escape games for cities, museums and cultural institutions — you\'re in the right place.';
$cg_text_2     = get_field('cg_hero_text_2')    ?: 'We can create almost any custom project. Just tell us your goal.';
$cg_image      = get_field('cg_hero_image')     ?: get_template_directory_uri() . '/assets/images/custom-games/hero-full.jpg';
$cg_image_alt  = get_field('cg_hero_image_alt') ?: 'People playing a custom game';
$cg_btn1_text  = get_field('cg_hero_btn_1_text') ?: 'Request';
$cg_btn2_text  = get_field('cg_hero_btn_2_text') ?: 'Download the presentation';
$cg_pdf        = get_field('cg_hero_pdf')        ?: '';
$cg_bg = get_field('cg_hero_bg') ?: get_template_directory_uri() . '/assets/images/custom-games/hero-full.jpg';

// Блок Company
// First block — данные из ACF
$label_1            = get_field('label_1')   ?: 'Team';
$text_1             = get_field('text_1')    ?: 'Our team includes experienced <strong>writers, game designers, illustrators, sound designers, and specialists in chatbots and online games</strong> — everything needed to turn an idea into a complete experience.';
$scroll_bg_1        = get_template_directory_uri() . '/assets/images/roll-CG-AU.webp';
$label_border_1     = get_field('label_border_1') ?: get_template_directory_uri() . '/assets/icons/border-team-CG.svg';
$polaroid_bg_1      = get_field('polaroid_background_1') ?: get_template_directory_uri() . '/assets/images/polaroid-1-cg.png';
$photo_1            = get_field('photo_1')  ?: get_template_directory_uri() . '/assets/images/custom-games/company-1-cg.png';
$polaroid_caption_1 = get_field('polaroid_caption_1') ?: 'The Great Silent Era';

// Second block — данные из ACF
$label_2            = get_field('label_2')   ?: 'Experience';
$text_2             = get_field('text_2')    ?: 'Since <strong>2013</strong>, we have delivered <strong>150+ custom projects</strong> for clients across a wide range of industries, formats and genres.';
$scroll_bg_2        = get_template_directory_uri() . '/assets/images/roll-CG-AU.webp';
$label_border_2     = get_field('label_border_2') ?: get_template_directory_uri() . '/assets/icons/border-experience-CG.svg';
$polaroid_bg_2      = get_field('polaroid_background_2') ?: get_template_directory_uri() . '/assets/images/polaroid-2-cg.png';
$photo_2            = get_field('photo_2') ?: get_template_directory_uri() . '/assets/images/custom-games/company-2-cg.png';
$polaroid_caption_2 = get_field('polaroid_caption_2') ?: 'Monopoly: The Golden Age of Amsterdam';

// Projects (Cases) — данные из ACF
$projects_cta_text     = get_field('projects_cta_text')      ?: 'You can download our full portfolio';
$projects_cta_btn_text = get_field('projects_cta_btn_text')  ?: 'Here';
$projects_cta_file     = get_field('projects_cta_file');

?>

<main>
  <section class="hero section-special section-decorated-dark custom-games-hero" id="hero">
    <div class="custom-games-hero__bg" style="background:
          linear-gradient(0deg, rgba(25, 26, 24, 0.7), rgba(25, 26, 24, 0.7)),
          linear-gradient(180deg, #191a18 0%, rgba(25, 26, 24, 0) 49.04%, #191a18 100%),
          url('<?php echo esc_url($cg_bg); ?>') center / cover no-repeat;">
    </div>
    <div class="custom-games-hero__wrapper container">
      <?php questime_breadcrumbs(); ?>
      <div class="custom-games-hero__content">
        <h1 class="custom-games-hero__title"><?php echo esc_html($cg_title); ?></h1>

        <div class="custom-games-hero__image-wrap--mobile">
          <img
            src="<?php echo esc_url($cg_image); ?>"
            alt="<?php echo esc_attr($cg_image_alt); ?>"
            class="custom-games-hero__image" />
        </div>

        <div class="custom-games-hero__body">
          <?php if ($cg_text_1) : ?>
            <p><?php echo wp_kses_post($cg_text_1); ?></p>
          <?php endif; ?>
          <?php if ($cg_text_2) : ?>
            <p><strong><?php echo wp_kses_post($cg_text_2); ?></strong></p>
          <?php endif; ?>
        </div>

        <div class="custom-games-hero__actions">

          <button
            type="button"
            class="btn btn-secondary btn--orange open-modal"
            data-modal="request">
            <?php echo esc_html($cg_btn1_text); ?>
          </button>

          <?php if ($cg_pdf) : ?>
            <a
              href="<?php echo esc_url($cg_pdf); ?>"
              target="_blank"
              rel="noopener noreferrer"
              class="btn btn-secondary btn-download btn--transparent">
              <?php echo esc_html($cg_btn2_text); ?>
            </a>
          <?php endif; ?>

        </div>
      </div>

      <div class="custom-games-hero__image-wrap">
        <img
          src="<?php echo esc_url($cg_image); ?>"
          alt="<?php echo esc_attr($cg_image_alt); ?>"
          class="custom-games-hero__image" />
      </div>
    </div>
  </section>
  <!-- Секция Company -->
  <?php if (get_field('show_company')) : ?>
    <section class="company section-special">
      <div class="container">
        <!-- First block -->
        <div class="company__pair company__pair--right-photo">
          <div class="company__scroll company__scroll--team">
            <img class="company__scroll-bg" src="<?php echo esc_url($scroll_bg_1); ?>" alt="Scroll">
            <div class="company__scroll-label">
              <img class="company__scroll-label-svg label-border-right" src="<?php echo esc_url($label_border_1); ?>" alt="Border">
              <span class="company__scroll-label-text label-text-right">
                <?php echo esc_html($label_1); ?>
              </span>
            </div>
            <div class="company__scroll-inner company__text">
              <?php echo apply_filters('the_content', $text_1); ?>
            </div>
          </div>
          <div class="company__polaroid company__polaroid--1">
            <img class="company__polaroid-bg" src="<?php echo esc_url($polaroid_bg_1); ?>" alt="Polaroid">
            <div class="company__polaroid-content company__polaroid-content--right">
              <img class="company__polaroid-img company__polaroid-img--right" src="<?php echo esc_url($photo_1); ?>" alt="Image">
              <p class="company__polaroid-caption--right">
                <?php echo esc_html($polaroid_caption_1); ?>
              </p>
            </div>
          </div>
        </div>
        <!-- Second block -->
        <div class="company__pair company__pair--left-photo">
          <div class="company__polaroid company__polaroid--2">
            <img class="company__polaroid-bg" src="<?php echo esc_url($polaroid_bg_2); ?>" alt="Polaroid">
            <div class="company__polaroid-content company__polaroid-content--left">
              <img class="company__polaroid-img company__polaroid-img--left" src="<?php echo esc_url($photo_2); ?>" alt="Image">
              <p class="company__polaroid-caption--left">
                <?php echo esc_html($polaroid_caption_2); ?>
              </p>
            </div>
          </div>
          <div class="company__scroll company__scroll--experience">
            <img class="company__scroll-bg" src="<?php echo esc_url($scroll_bg_2); ?>" alt="Scroll">
            <div class="company__scroll-label">
              <img class="company__scroll-label-svg label-border-left" src="<?php echo esc_url($label_border_2); ?>" alt="Border">
              <span class="company__scroll-label-text label-text-left">
                <?php echo esc_html($label_2); ?>
              </span>
            </div>
            <div class="company__scroll-inner company__text">
              <?php echo apply_filters('the_content', $text_2); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <!-- Секция Gallery -->
  <?php get_template_part('templates/gallery'); ?>
  <!-- Секция Projects (Cases) -->
  <?php if (get_field('show_projects')) : ?>
    <section class="projects projects-border-1 projects-border-2 section-special" id="projects">
      <div class="projects__scene container">
        <?php $categories = get_terms([
          'taxonomy'   => 'case_category',
          'hide_empty' => true,
          'orderby'    => 'term_order',
        ]);
        if (!empty($categories) && !is_wp_error($categories)) :
          $card_index = 1;
          foreach ($categories as $cat) :
            $cat_image = get_field('case_cat_image', 'case_category_' . $cat->term_id)
              ?: get_template_directory_uri() . '/assets/images/main/hero-2.jpg';
            $frame_num = (($card_index - 1) % 4) + 1;
            $cases = new WP_Query([
              'post_type'      => 'quest_case',
              'post_status'    => 'publish',
              'posts_per_page' => -1,
              'tax_query'      => [[
                'taxonomy' => 'case_category',
                'field'    => 'term_id',
                'terms'    => $cat->term_id,
              ]],
              'orderby' => 'menu_order',
              'order'   => 'ASC',
            ]);
        ?>
            <div class="projects-card projects-card--<?php echo $card_index; ?>">
              <div class="projects-card__polaroid">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/custom-games/project-card-<?php echo $frame_num; ?>.png" alt="Project Card" class="projects-card__frame">
                <img src="<?php echo esc_url($cat_image); ?>" alt="<?php echo esc_attr($cat->name); ?>" class="projects-card__photo">
                <p class="projects-card__caption"><?php echo esc_html($cat->name); ?></p>
              </div>
              <?php if ($cases->have_posts()) : ?>
                <div class="projects-card__paper">
                  <ul class="projects-card__list">
                    <?php while ($cases->have_posts()) : $cases->the_post(); ?>
                      <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </li>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                  </ul>
                  <button class="projects-card__toggle" aria-expanded="false">
                    <span class="projects-card__toggle-text">Expand the list</span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M12 4V16.25L17.25 11L18 11.66L11.5 18.16L5 11.66L5.75 11L11 16.25V4H12Z" fill="#DEC884" />
                    </svg>
                  </button>
                </div>
              <?php endif; ?>
            </div>
          <?php
            $card_index++;
          endforeach;
        else : ?>
          <p>Cases coming soon!</p>
        <?php endif; ?>
      </div>
      <?php if ($projects_cta_file) : ?>
        <div class="projects__btn">
          <div class="projects__btn-card">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/border-portfolio-CG.svg" alt="Border" class="projects__btn-border">
            <div class="projects__btn-content">
              <?php if ($projects_cta_text) : ?>
                <p class="projects__btn-text">
                  <?php echo esc_html($projects_cta_text); ?>
                </p>
              <?php endif; ?>
              <a href="<?php echo esc_url($projects_cta_file); ?>" class="btn btn-secondary btn-projects btn--orange" target="_blank" rel="noopener noreferrer">
                <?php echo esc_html($projects_cta_btn_text ?: 'Download'); ?>
              </a>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </section>
  <?php endif; ?>
  <!-- Секция Testimonials -->
  <?php get_template_part('templates/testimonials'); ?>
  <!-- Секция Form -->
  <?php get_template_part('templates/contact-form', null, ['type' => 'gamified']); ?>
  <!--Button-->
  <section class="section-special">
    <button class="btn btn-secondary btn--orange btn-cg-request open-modal" data-modal-open type="submit">Request a custom game</button>
  </section>
</main>

<?php
get_footer();
?>