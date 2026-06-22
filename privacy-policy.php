<?php
/*
Template Name: Privacy Policy
*/
get_header();
?>

<main class="privacy-policy__content container">
    <div class="privacy container">
        <div class="privacy-content">
            <?php the_field('privacy_policy_content'); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>