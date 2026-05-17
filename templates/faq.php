  <?php

    /*
    Template Part: faq
*/

    $faq_title = get_field('faq_title') ?: 'FAQ';
    ?>

  <section class="faq section-special" id="faq">
      <div class="container">
          <?php if ($faq_title): ?>
              <h2 class="faq__title text-align">
                  <?php echo esc_html($faq_title); ?>
              </h2>
          <?php endif; ?>
          <div class="faq__list">
              <div class="faq__dot"></div>
              <?php for ($i = 1; $i <= 6; $i++): ?>
                  <?php
                    $question = get_field("faq_question_$i");
                    $answer = get_field("faq_answer_$i");
                    if (!$question || !$answer) {
                        continue;
                    }
                    ?>
                  <div class="faq__item <?php echo $i === 1 ? 'is-open' : ''; ?>">
                      <button
                          class="faq__question"
                          aria-expanded="<?php echo $i === 1 ? 'true' : 'false'; ?>">
                          <img
                              class="faq__icon"
                              src="<?php echo get_template_directory_uri(); ?>/assets/icons/team-building/question.svg"
                              alt="question"
                              loading="lazy"
                              decoding="async">
                          <span class="faq__question-text">
                              <?php echo esc_html($question); ?>
                          </span>
                          <span class="faq__chevron">
                              <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path
                                      d="M31.6663 15L19.9997 25L8.33301 15"
                                      stroke="#191A18"
                                      stroke-width="2.5"
                                      stroke-linecap="round"
                                      stroke-linejoin="round" />
                              </svg>
                          </span>
                      </button>
                      <div class="faq__answer">
                          <p class="faq__answer-inner">
                              <?php echo esc_html($answer); ?>
                          </p>
                      </div>
                  </div>
              <?php endfor; ?>
          </div>
      </div>
  </section>