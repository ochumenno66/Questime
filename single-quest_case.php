<?php
/*
Template Name: Case Page
*/

get_header();
?>
<main>
    <!-- Секция Hero -->
    <?php get_template_part('templates/hero-case-product'); ?>
    <!-- Секция Gallery -->
    <?php get_template_part('templates/gallery'); ?>
    <!-- Секция Experiences -->
    <?php get_template_part('templates/experience-case-product'); ?>
    <!-- Секция Testimonials -->
    <?php get_template_part('templates/testimonials'); ?>
    <!-- Секция Format -->
    <?php get_template_part('templates/format'); ?>
    <!-- Секция CTA -->
    <?php get_template_part('templates/cta'); ?>
    <!-- Секция Form -->
    <?php get_template_part('templates/contact-form', null, ['type' => 'default']); ?>
</main>

<?php
get_footer();
?>