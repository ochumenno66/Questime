<?php
/**
 * Cart Page — Questime theme override
 * Путь: woocommerce/cart/cart.php
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart');
?>

<section class="cart-page section-special">
  <div class="container">
    <h1 class="cart-page__title">Your Cart</h1>

    <div class="cart-page__layout">

      <!-- Левая колонка: товары -->
      <div class="cart-page__items">
        <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
          <?php do_action('woocommerce_before_cart_table'); ?>

          <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :
            $_product  = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
            $product_name = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);

            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) :
              $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
              $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image('thumbnail'), $cart_item, $cart_item_key);
          ?>

          <div class="cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

            <!-- Картинка -->
            <div class="cart-item__image">
              <?php if ($product_permalink) : ?>
                <a href="<?php echo esc_url($product_permalink); ?>"><?php echo $thumbnail; ?></a>
              <?php else : ?>
                <?php echo $thumbnail; ?>
              <?php endif; ?>
            </div>

            <!-- Название и мета -->
            <div class="cart-item__info">
              <div class="cart-item__name">
                <?php if ($product_permalink) : ?>
                  <a href="<?php echo esc_url($product_permalink); ?>"><?php echo wp_kses_post($_product->get_name()); ?></a>
                <?php else : ?>
                  <?php echo wp_kses_post($product_name); ?>
                <?php endif; ?>
              </div>
              <?php echo wc_get_formatted_cart_item_data($cart_item); ?>
              <?php if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) : ?>
                <p class="backorder_notification"><?php esc_html_e('Available on backorder', 'woocommerce'); ?></p>
              <?php endif; ?>
            </div>

            <!-- Цена -->
            <div class="cart-item__price">
              <?php echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); ?>
            </div>

            <!-- Количество -->
            <div class="cart-item__qty">
              <?php
              if ($_product->is_sold_individually()) {
                $min_qty = 1;
                $max_qty = 1;
              } else {
                $min_qty = 0;
                $max_qty = $_product->get_max_purchase_quantity();
              }
              echo apply_filters('woocommerce_cart_item_quantity',
                woocommerce_quantity_input([
                  'input_name'   => "cart[{$cart_item_key}][qty]",
                  'input_value'  => $cart_item['quantity'],
                  'max_value'    => $max_qty,
                  'min_value'    => $min_qty,
                  'product_name' => $product_name,
                ], $_product, false),
                $cart_item_key, $cart_item
              );
              ?>
            </div>

            <!-- Подытог -->
            <div class="cart-item__subtotal">
              <?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); ?>
            </div>

            <!-- Удалить -->
            <div class="cart-item__remove">
              <?php echo apply_filters('woocommerce_cart_item_remove_link',
                sprintf(
                  '<a role="button" href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                  esc_url(wc_get_cart_remove_url($cart_item_key)),
                  esc_attr(sprintf(__('Remove %s from cart', 'woocommerce'), wp_strip_all_tags($product_name))),
                  esc_attr($product_id),
                  esc_attr($_product->get_sku())
                ),
                $cart_item_key
              ); ?>
            </div>

          </div>

          <?php endif; endforeach; ?>

          <?php do_action('woocommerce_cart_contents'); ?>

          <!-- Купон и обновление -->
          <div class="cart-page__actions">
            <?php if (wc_coupons_enabled()) : ?>
            <div class="cart-page__coupon">
              <label for="coupon_code" class="screen-reader-text"><?php esc_html_e('Coupon:', 'woocommerce'); ?></label>
              <input type="text" name="coupon_code" class="contact-form__input" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>">
              <button type="submit" class="btn btn-secondary btn--transparent" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>">
                <?php esc_html_e('Apply coupon', 'woocommerce'); ?>
              </button>
              <?php do_action('woocommerce_cart_coupon'); ?>
            </div>
            <?php endif; ?>

            <button type="submit" class="btn btn-secondary btn--transparent cart-page__update" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>">
              <?php esc_html_e('Update cart', 'woocommerce'); ?>
            </button>

            <?php do_action('woocommerce_cart_actions'); ?>
            <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
          </div>

          <?php do_action('woocommerce_after_cart_contents'); ?>
          <?php do_action('woocommerce_after_cart_table'); ?>
        </form>
      </div>

      <!-- Правая колонка: итог -->
      <div class="cart-page__sidebar">
        <?php do_action('woocommerce_before_cart_collaterals'); ?>
        <div class="cart-collaterals">
          <?php do_action('woocommerce_cart_collaterals'); ?>
        </div>
      </div>

    </div>
  </div>
</section>

<?php do_action('woocommerce_after_cart'); ?>
